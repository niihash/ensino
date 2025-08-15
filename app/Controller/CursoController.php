<?php

namespace Plataforma\Ensino\app\Controller;

use Plataforma\Ensino\app\Model\CursoModel;

class CursoController
{

    private $curso;

    public function __construct()
    {
        $this->curso = new CursoModel();
    }

    public function index()
    {
        // listar cursos
        $listCurso = $this->curso->getAll();
        require_once(BASE_PATH . "/../app/View/curso/index.view.php");
    }

    public function create(){
        // Exibe formulario de criacao
        require_once(BASE_PATH . "/../app/View/curso/create.view.php");
    }

    public function store(){
        //store here
        $params = (object) [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao']
        ];
        if ($this->curso->insert($params) >= 0) {
            header('Location: /cursos');
            exit;
        }
    }

    public function show($id){
        // exibe um curso em especifico
        $curso = $this->curso->getById($id);
        require_once(BASE_PATH . "/../app/View/curso/show.view.php");
    }

    public function edit($id)
    {
        // exie o formulario para alterar um curso em especifico
        $curso = $this->curso->getById($id);
        require_once(BASE_PATH . "/../app/View/curso/edit.view.php");
    }

    public function update($id)
    {
        // atualiza os dados de um curso
        $params = (object) [
            'id' => $id,
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao']
        ];
        $this->curso->update($params);
        header('Location: /cursos');
        exit;
    }

    public function destroy($id)
    {
        // deleta um curso em especifico
        $this->curso->delete($id);
        header('Location: /cursos');
        exit;
    }
}
