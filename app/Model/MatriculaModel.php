<?php

namespace Plataforma\Ensino\app\Model;

use Plataforma\Ensino\Database\Database;
use PDO;

class MatriculaModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    public function insert(object $params): int | null
    {
        // Evitar duplicidade
        $checkSql = "SELECT COUNT(*) as total FROM matriculas WHERE aluno_id = :aluno_id AND curso_id = :curso_id";

        $stmtCheck = $this->pdo->getConnection()->prepare($checkSql);
        $stmtCheck->bindParam(':aluno_id', $params->aluno_id, PDO::PARAM_INT);
        $stmtCheck->bindParam(':curso_id', $params->curso_id, PDO::PARAM_INT);
        $stmtCheck->execute();
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($result['total'] > 0) {
            // Matrícula já existe
            // echo "O aluno já está matriculado neste curso.";
            return null;
        }

        // Inserção normal

        $sql = "INSERT INTO matriculas (aluno_id, curso_id) VALUES (:aluno_id, :curso_id)";

        $stmt = $this->pdo->getConnection()->prepare($sql);

        $stmt->bindParam(':aluno_id', $params->aluno_id, PDO::PARAM_STR);
        $stmt->bindParam(':curso_id', $params->curso_id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $this->pdo->getLastID();
        } else {
            // Exibir erros de execução, caso haja
            echo "Erro ao inserir matricula.";
            print_r($stmt->errorInfo());
            return null;
        }
    }

    public function update(object $params): bool
    {
        // Evitar duplicidade
        $checkSql = "SELECT COUNT(*) as total FROM matriculas WHERE aluno_id = :aluno_id AND curso_id = :curso_id";

        $stmtCheck = $this->pdo->getConnection()->prepare($checkSql);
        $stmtCheck->bindParam(':aluno_id', $params->aluno_id, PDO::PARAM_INT);
        $stmtCheck->bindParam(':curso_id', $params->curso_id, PDO::PARAM_INT);
        $stmtCheck->execute();
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($result['total'] > 0) {
            // Matrícula já existe
            // echo "O aluno já está matriculado neste curso.";
            return false;
        }

        // Update normal

        $sql = 'UPDATE matriculas SET aluno_id = :aluno_id, curso_id = :curso_id WHERE id = :id';

        $stmt = $this->pdo->getConnection()->prepare($sql);

        $stmt->bindParam(':aluno_id', $params->aluno_id, PDO::PARAM_STR);
        $stmt->bindParam(':curso_id', $params->curso_id, PDO::PARAM_STR);
        $stmt->bindParam(':id', $params->id, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll(): array | null
    {
        //$sql = 'SELECT id, aluno_id, curso_id FROM matriculas';

        $sql = 'SELECT 
                    m.id,
                    m.aluno_id,
                    a.nome AS aluno_nome,
                    m.curso_id,
                    c.titulo AS curso_titulo
                FROM matriculas m
                INNER JOIN alunos a ON a.id = m.aluno_id
                INNER JOIN cursos c ON c.id = m.curso_id';

        $rows = $this->pdo->execQuery($sql);

        $listMatriculas = null;

        foreach ($rows as $row) {
            $listMatriculas[] = $this->arrayToObject($row);
        }

        return $listMatriculas;
    }

    public function getById(int $id): object
    {
        // $sql = 'SELECT id, aluno_id, curso_id FROM matriculas WHERE id = :id';

        $sql = 'SELECT 
                    m.id,
                    m.aluno_id,
                    a.nome AS aluno_nome,
                    m.curso_id,
                    c.titulo AS curso_titulo
                FROM matriculas m
                INNER JOIN alunos a ON a.id = m.aluno_id
                INNER JOIN cursos c ON c.id = m.curso_id
                WHERE m.id = :id';

        $param = [
            ':id' => $id
        ];

        $rows = $this->pdo->execQueryOneRow($sql, $param);

        return $this->arrayToObject($rows);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM matriculas WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        return $this->pdo->execNonQuery($sql, $param);
    }

    private function arrayToObject($param): object
    {
        return (object)[
            'id' => $param['id'] ?? null,
            'aluno_id' => $param['aluno_id'] ?? null,
            'aluno_nome' => $param['aluno_nome'] ?? null,
            'curso_id' => $param['curso_id'] ?? null,
            'curso_titulo' => $param['curso_titulo'] ?? null
        ];
    }
}
