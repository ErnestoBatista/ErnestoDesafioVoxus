<?php
session_start();

include_once("conexao.php");
$conexao = new mysqli("localhost", "root", "", "clientes");
$email = filter_input(INPUT_POST, 'userEmail');
$usuario = "SELECT * FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($conexao, $usuario);

if(($resultado) AND ($resultado->num_rows != 0)){
    $userName = filter_input(INPUT_POST, 'userEmail');
    $_SESSION['userName'] = $userName;
    $resultado = 'main.php';
    echo $resultado;
}else{
    $resultado = 'Erro';
    echo(json_encode($resultado));
}
