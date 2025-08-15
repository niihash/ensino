<?php

namespace Plataforma\Ensino\app\Model;

use Plataforma\Ensino\Database\Database;
use PDO;
use PDOException;

class AlunoModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    public function insert(object $params): int | null
    {

        $sql = "INSERT INTO alunos (nome, email, dataNasc) VALUES (:nome, :email, :dataNasc)";

        $stmt = $this->pdo->getConnection()->prepare($sql);

        $stmt->bindParam(':nome', $params->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $params->email, PDO::PARAM_STR);
        $stmt->bindParam(':dataNasc', $params->dataNasc, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $this->pdo->getLastID();
        } else {
            // Exibir erros de execução, caso haja
            echo "Erro ao inserir aluno.";
            print_r($stmt->errorInfo());
            return null;
        }
    }

    public function update(object $params): bool
    {

        $sql = 'UPDATE alunos SET nome = :nome, email = :email, dataNasc = :dataNasc WHERE id = :id';

        $stmt = $this->pdo->getConnection()->prepare($sql);

        $stmt->bindParam(':nome', $params->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $params->email, PDO::PARAM_STR);
        $stmt->bindParam(':dataNasc', $params->dataNasc, PDO::PARAM_STR);
        $stmt->bindParam(':id', $params->id, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll(): array | null
    {
        $sql = 'SELECT id, nome, email, dataNasc FROM alunos';

        $rows = $this->pdo->execQuery($sql);

        $listAlunos = null;

        foreach ($rows as $row) {
            $listAlunos[] = $this->arrayToObject($row);
        }

        return $listAlunos;
    }

    public function getById(int $id): object
    {
        $sql = 'SELECT id, nome, email, dataNasc FROM alunos WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        $rows = $this->pdo->execQueryOneRow($sql, $param);

        return $this->arrayToObject($rows);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM alunos WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        return $this->pdo->execNonQuery($sql, $param);
    }

    private function arrayToObject($param): object
    {
        return (object)[
            'id' => $param['id'] ?? null,
            'nome' => $param['nome'] ?? null,
            'email' => $param['email'] ?? null,
            'dataNasc' => $param['dataNasc'] ?? null
        ];
    }
}
