<?php

namespace Plataforma\Ensino\app\Controller;

use Plataforma\Ensino\app\Model\AlunoModel;

class AlunoController
{

    private $aluno;

    public function __construct()
    {
        $this->aluno = new AlunoModel();
    }

    public function index()
    {
        // listagem
        $listAluno = $this->aluno->getAll();
        require_once(BASE_PATH . "/../app/View/aluno/index.view.php");
    }

    public function create()
    {
        // Exibe formulario de criacao
        require_once(BASE_PATH . "/../app/View/aluno/create.view.php");
    }

    public function store()
    {
        // armazena no banco

        $data = $_POST['dataNasc'] !== '' ? $_POST['dataNasc'] : null;

        $params = (object) [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'dataNasc' => $data
        ];
        if ($this->aluno->insert($params) >= 0) {
            header('Location: /alunos');
            exit;
        }
    }

    public function show($id)
    {
        // exibe um aluno em especifico
        $aluno = $this->aluno->getById($id);
        require_once(BASE_PATH . "/../app/View/aluno/show.view.php");
    }

    public function edit($id)
    {
        // exie o formulario para alterar um aluno em especifico
        $aluno = $this->aluno->getById($id);
        require_once(BASE_PATH . "/../app/View/aluno/edit.view.php");
    }

    public function update($id)
    {
        $data = $_POST['dataNasc'] !== '' ? $_POST['dataNasc'] : null;

        // atualiza os dados de um aluno
        $params = (object) [
            'id' => $id,
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'dataNasc' => $data
        ];
        $this->aluno->update($params);
        header('Location: /alunos');
        exit;
    }

    public function destroy($id)
    {
        // deleta um aluno em especifico
        $this->aluno->delete($id);
        header('Location: /alunos');
        exit;
    }
}
