<?php
session_start();
include("conexao.php");

$usuario = $_POST['email'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$dataNascimento = $_POST['dataNascimento'];
$cpf = $_POST['cpf'];
$turma = $_POST['turma'];
$nomeSocial = $_POST['nomeSocial'];


$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	echo  "<script>alert('Email cadastrado');</script>";
	
	header("refresh: 1; ../cadastro.html");
	exit;
}

$sqlEmail = "select count(*) as total from tb_email where email = '$email'";
$resultEmail = mysqli_query($conexao, $sqlEmail);
$rowEmail = mysqli_fetch_assoc($resultEmail);

if($rowEmail['total'] == 1) {
	if(isset($_POST["submit"])) {
		$targetDirectory = "uploads/"; // Diretório onde os arquivos serão armazenados
		$targetFile = $targetDirectory . basename($_FILES["arquivo"]["name"]); // Caminho completo do arquivo
		$arquivo = str_replace(' ', '', $targetFile); 
		move_uploaded_file($_FILES["arquivo"]["tmp_name"], $arquivo);
		
	$sql = "INSERT INTO usuario (usuario, nome, telefone, email, senha, dataNascimento, cpf, turma, nomeSocial, arquivos) 
			VALUES ('$usuario','$nome','$telefone','$email','$senha','$dataNascimento','$cpf','$turma','$nomeSocial','$arquivo')";
	}
	
	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}
}else{
	echo  "<script>alert('Email não existe no nosso cadastrado');</script>";
	header("refresh: 1; ../cadastro.html");
	exit;
}



$conexao->close();
echo  "<script>alert('Email cadastrado');</script>";
header("refresh: 1; ../index.html");
exit;
?>