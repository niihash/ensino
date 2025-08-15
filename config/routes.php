<?php

// Arquivo com todas as rotas para serem adicionadas ao roteador

// Rotas de acesso
$router->get("/", "\Plataforma\Ensino\app\Controller\AdminController@login", [\Plataforma\Ensino\Middleware\GuestMiddleware::class]);
$router->post("/", "\Plataforma\Ensino\app\Controller\AdminController@auth", [\Plataforma\Ensino\Middleware\GuestMiddleware::class]);
$router->post("/logout", "\Plataforma\Ensino\app\Controller\AdminController@logout", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/dashboard", "\Plataforma\Ensino\app\Controller\AdminController@dashboard", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);

// Rotas para alunos
$router->get("/alunos", "\Plataforma\Ensino\app\Controller\AlunoController@index", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/alunos/create", "\Plataforma\Ensino\app\Controller\AlunoController@create", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->post("/alunos/create", "\Plataforma\Ensino\app\Controller\AlunoController@store", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/alunos/{id}", "\Plataforma\Ensino\app\Controller\AlunoController@show", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/alunos/{id}/edit", "\Plataforma\Ensino\app\Controller\AlunoController@edit", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->patch("/alunos/{id}/edit", "\Plataforma\Ensino\app\Controller\AlunoController@update", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->delete("/alunos/{id}", "\Plataforma\Ensino\app\Controller\AlunoController@destroy", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);

// Rotas para cursos
$router->get("/cursos", "\Plataforma\Ensino\app\Controller\CursoController@index", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/cursos/create", "\Plataforma\Ensino\app\Controller\CursoController@create", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->post("/cursos/create", "\Plataforma\Ensino\app\Controller\CursoController@store", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/cursos/{id}", "\Plataforma\Ensino\app\Controller\CursoController@show", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/cursos/{id}/edit", "\Plataforma\Ensino\app\Controller\CursoController@edit", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->patch("/cursos/{id}/edit", "\Plataforma\Ensino\app\Controller\CursoController@update", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->delete("/cursos/{id}", "\Plataforma\Ensino\app\Controller\CursoController@destroy", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);

// Rotas das matriculas
$router->get("/matriculas", "\Plataforma\Ensino\app\Controller\MatriculaController@index", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/matriculas/create", "\Plataforma\Ensino\app\Controller\MatriculaController@create", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->post("/matriculas/create", "\Plataforma\Ensino\app\Controller\MatriculaController@store", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/matriculas/{id}", "\Plataforma\Ensino\app\Controller\MatriculaController@show", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->get("/matriculas/{id}/edit", "\Plataforma\Ensino\app\Controller\MatriculaController@edit", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->patch("/matriculas/{id}/edit", "\Plataforma\Ensino\app\Controller\MatriculaController@update", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);
$router->delete("/matriculas/{id}", "\Plataforma\Ensino\app\Controller\MatriculaController@destroy", [\Plataforma\Ensino\Middleware\HostMiddleware::class]);