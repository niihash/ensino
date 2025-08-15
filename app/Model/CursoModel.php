<?php

namespace Plataforma\Ensino\app\Model;

use Plataforma\Ensino\Database\Database;
use PDO;

class CursoModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    public function insert(object $params): int | null
    {

        $sql = "INSERT INTO cursos (titulo, descricao) VALUES (:titulo, :descricao)";

        $stmt = $this->pdo->getConnection()->prepare($sql);

        $stmt->bindParam(':titulo', $params->titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $params->descricao, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $this->pdo->getLastID();
        } else {
            // Exibir erros de execução, caso haja
            echo "Erro ao inserir curso.";
            print_r($stmt->errorInfo());
            return null;
        }
    }

    public function update(object $params): bool
    {

        $sql = 'UPDATE cursos SET titulo = :titulo, descricao = :descricao WHERE id = :id';

        $stmt = $this->pdo->getConnection()->prepare($sql);

        $stmt->bindParam(':titulo', $params->titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $params->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':id', $params->id, PDO::PARAM_STR);

        return $stmt->execute();

    }

    public function getAll(): array | null
    {
        $sql = 'SELECT id, titulo, descricao FROM cursos';

        $rows = $this->pdo->execQuery($sql);

        $listCursos = null;

        foreach ($rows as $row) {
            $listCursos[] = $this->arrayToObject($row);
        }

        return $listCursos;
    }

    public function getById(int $id): object
    {
        $sql = 'SELECT id, titulo, descricao FROM cursos WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        $rows = $this->pdo->execQueryOneRow($sql, $param);

        return $this->arrayToObject($rows);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM cursos WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        return $this->pdo->execNonQuery($sql, $param);
    }

    private function arrayToObject($param): object
    {
        return (object)[
            'id' => $param['id'] ?? null,
            'titulo' => $param['titulo'] ?? null,
            'descricao' => $param['descricao'] ?? null
        ];
    }
}
