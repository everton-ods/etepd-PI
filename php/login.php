<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: ../index.html');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['id'] = $usuario_bd['id'];
	$_SESSION['nome'] = $usuario_bd['nome'];
	$_SESSION['email'] = $usuario_bd['email'];
	$_SESSION['turma'] = $usuario_bd['turma'];
	$_SESSION['cpf'] = $usuario_bd['cpf'];
	header('Location: painel.php');
	exit();
} else {
	header('Location: ../index.html');
	exit();
}
