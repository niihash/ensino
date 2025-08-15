<?php

require_once __DIR__ . '/../vendor/autoload.php';

$env = parse_ini_file(__DIR__ . '/../.env');

// constantes do banco de dados e de ENV
require_once(__DIR__ . '/../config/config.php');

use Plataforma\Ensino\app\Model\AlunoModel;
use Plataforma\Ensino\Database\Database;

$db = new Database();
$alunoModel = new AlunoModel();

echo "==== Testes AlunoModel ====\n";

$db->beginTransaction();

try {
    // Teste de Insert
    $aluno = (object)[
        'nome' => 'Teste',
        'email' => 'teste@teste.com',
        'dataNasc' => '2003-10-01'
    ];
    $id = $alunoModel->insert($aluno);
    echo ($id ? "[OK] Insert funcionou\n" : "[FAIL] Insert falhou\n");
    
    // Teste de busca pelo ID
    $alunoDb = $alunoModel->getById($id);
    echo ($alunoDb->nome === 'Teste' ? "[OK] getById funcionou\n" : "[FAIL] getById falhou\n");

    // Teste de Update
    $alunoDb->nome = 'Teste Atualizado';
    $alunoModel->update($alunoDb);
    $alunoAtualizado = $alunoModel->getById($id);
    echo ($alunoAtualizado->nome === 'Teste Atualizado' ? "[OK] Update funcionou\n" : "[FAIL] Update falhou\n");
    
    // Teste da funcionalidade de busca por nome ou email
    $resultado = $alunoModel->search('Atualizado');
    echo (count($resultado) > 0 ? "[OK] Search funcionou\n" : "[FAIL] Search falhou\n");
    
    // Teste do delete
    $alunoModel->delete($id);
    $excluido = $alunoModel->getById($id);
    echo (is_null($excluido->id) ? "[OK] Delete funcionou\n" : "[FAIL] Delete falhou\n");

    $db->rollBack();
} catch (Exception $e) {
    $db->rollBack();
    echo "[ERROR] Exceção: " . $e->getMessage() . "\n";
}
