<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$env = parse_ini_file(__DIR__ . '/../.env');
require_once(__DIR__ . '/../config/config.php');

use Plataforma\Ensino\Database\Database;

$pdo = new Database();

try {
    echo "Populando tabela cursos...\n";

    $cursos = [
        ['titulo' => 'Biologia', 'descricao' => 'Curso de Biologia'],
        ['titulo' => 'Química', 'descricao' => 'Curso de Química'],
        ['titulo' => 'Física', 'descricao' => 'Curso de Física']
    ];

    foreach ($cursos as $curso) {
        $pdo->execNonQuery(
            "INSERT INTO cursos (titulo, descricao) VALUES (:titulo, :descricao)",
            [
                ':titulo' => $curso['titulo'],
                ':descricao' => $curso['descricao']
            ]
        );
    }

    echo "Populando tabela alunos...\n";

    $alunos = [
        ['nome' => 'Aline', 'email' => 'aline@email.com', 'dataNasc' => '2000-01-01'],
        ['nome' => 'Bruna', 'email' => 'bruna@email.com', 'dataNasc' => '2001-05-12'],
        ['nome' => 'Carol', 'email' => 'carol@email.com', 'dataNasc' => '2002-08-23']
    ];

    foreach ($alunos as $aluno) {
        $pdo->execNonQuery(
            "INSERT INTO alunos (nome, email, dataNasc) VALUES (:nome, :email, :dataNasc)",
            [
                ':nome' => $aluno['nome'],
                ':email' => $aluno['email'],
                ':dataNasc' => $aluno['dataNasc']
            ]
        );
    }

    echo "Populando tabela matriculas...\n";

    $matriculas = [
        ['aluno_id' => 1, 'curso_id' => 1],
        ['aluno_id' => 1, 'curso_id' => 2],
        ['aluno_id' => 2, 'curso_id' => 2],
        ['aluno_id' => 2, 'curso_id' => 3],
        ['aluno_id' => 3, 'curso_id' => 3],
        ['aluno_id' => 3, 'curso_id' => 1],
    ];

    foreach ($matriculas as $matricula) {
        $pdo->execNonQuery(
            "INSERT INTO matriculas (aluno_id, curso_id) VALUES (:aluno_id, :curso_id)",
            [
                ':aluno_id' => $matricula['aluno_id'],
                ':curso_id' => $matricula['curso_id']
            ]
        );
    }


    echo "Dados populados com sucesso!\n";
} catch (Exception $e) {
    echo "Erro ao popular dados: " . $e->getMessage() . "\n";
}
