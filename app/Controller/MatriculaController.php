<?php

namespace Plataforma\Ensino\app\Controller;

use Plataforma\Ensino\app\Model\AlunoModel;
use Plataforma\Ensino\app\Model\CursoModel;
use Plataforma\Ensino\app\Model\MatriculaModel;

class MatriculaController
{

    private $matricula;
    private $curso;
    private $aluno;

    public function __construct()
    {
        $this->matricula = new MatriculaModel();
        $this->curso = new CursoModel();
        $this->aluno = new AlunoModel();
    }

    public function index()
    {
        $listAluno = $this->aluno->getAll();
        $listCurso = $this->curso->getAll();

        // listar matriculas
        $listMatricula = $this->matricula->getAll();
        require_once(BASE_PATH . "/../app/View/matricula/index.view.php");
    }

    public function create(){
        $listAluno = $this->aluno->getAll();
        $listCurso = $this->curso->getAll();

        // Exibe formulario de criacao
        require_once(BASE_PATH . "/../app/View/matricula/create.view.php");
    }

    public function store(){
        //store here
        $params = (object) [
            'aluno_id' => $_POST['aluno_id'],
            'curso_id' => $_POST['curso_id']
        ];
        if ($this->matricula->insert($params) >= 0) {
            header('Location: /matriculas');
            exit;
        }
    }

    public function show($id){
        $listAluno = $this->aluno->getAll();
        $listCurso = $this->curso->getAll();
        // exibe uma matricula em especifico
        $matricula = $this->matricula->getById($id);
        require_once(BASE_PATH . "/../app/View/matricula/show.view.php");
    }

    public function edit($id)
    {
        $listAluno = $this->aluno->getAll();
        $listCurso = $this->curso->getAll();
        // exibe o formulario para alterar uma matricula em especifico
        $matricula = $this->matricula->getById($id);
        require_once(BASE_PATH . "/../app/View/matricula/edit.view.php");
    }

    public function update($id)
    {
        // atualiza os dados de uma matricula
        $params = (object) [
            'id' => $id,
            'aluno_id' => $_POST['aluno_id'],
            'curso_id' => $_POST['curso_id']
        ];
        $this->matricula->update($params);
        header('Location: /matriculas');
        exit;
    }

    public function destroy($id)
    {
        // deleta uma matricula em especifico
        $this->matricula->delete($id);
        header('Location: /matriculas');
        exit;
    }
}
