<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$env = parse_ini_file(__DIR__ . '/../.env');

// constantes do banco de dados.
require_once(__DIR__ . '/../config/config.php');

use Plataforma\Ensino\Database\Database;

$pdo = new Database();

try {
    echo "Criando tabela cursos...\n";
    $pdo->execNonQuery("
        create table if not exists cursos (
            id int auto_increment primary key,
            titulo varchar(255) not null,
            descricao varchar(255)
        );
    ");

    echo "Criando tabela alunos...\n";
    $pdo->execNonQuery("
        create table if not exists alunos(
            id int auto_increment primary key,
            nome varchar(255) not null,
            email varchar(255) not null unique,
            dataNasc date
        );
    ");

    echo "Criando tabela matriculas...\n";
    $pdo->execNonQuery("
        create table if not exists matriculas (
            id int auto_increment primary key,
            aluno_id int,
            curso_id int,
            foreign key (aluno_id) references alunos(id),
            foreign key (curso_id) references cursos(id)
        );
    ");

    echo "Todas as tabelas foram criadas com sucesso.\n";
} catch (Exception $e) {
    echo "Erro ao criar tabelas: " . $e->getMessage() . "\n";
}
