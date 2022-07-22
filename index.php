<?php

//carrega um usuario

require_once("config.php");
/*$root = new Usuario();
$root->loadbyId(5);
echo $root;*/

//carrega uma lista de usuarios

/*$lista = Usuario::getList();
echo json_encode($lista);*/

//carrega uma lista de usuarios buscando pelo login

/*$search = Usuario::search("ma");
echo json_encode($search);*/

//carrega um usuario usando o login e a senha

/*$usuario = new Usuario();
$usuario->login("carlos"," 123345656");
echo $usuario;*/

//criando um novo usuario

/*$aluno = new Usuario("","" );

$aluno->insert();

echo $aluno;*/

//alterando usuario
/*$usuario = new Usuario();

$usuario->loadById(3);
$usuario->update("ale", "245868");
echo $usuario;*/

//apagando usuario

$usuario = new Usuario();

$usuario->loadById(5);

$usuario->delete();

echo $usuario;

?>