<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["acao"])){
    if ($_POST["acao"]=="Inserir"){
    InserirCliente(); 
    }
    if($_POST["acao"]=="editar"){
        EditarCliente();
    }
    if($_POST["acao"]=="excluir") {
        ExcluirCliente();
    }
}

function AbrirBanco() {
    $conexao = new mysqli("localhost", "root", "", "clientes");
    return $conexao;
}

function InserirCliente(){
    $banco = AbrirBanco();
    $sql = "INSERT INTO tasks(nome, descricao, anexos, prioridade, usuario)"
            . "VALUES ('{$_POST["nome"]}','{$_POST["descricao"]}','{$_POST["anexos"]}',"
            . "'{$_POST["prioridade"]}', '{$_POST["usuario"]}')";
    $banco->query($sql);
    $banco->close();
    RetornarMain();
}

function EditarCliente(){
    $banco = AbrirBanco();
    $sql = "UPDATE tasks SET nome='{$_POST["nome"]}',"
            . "descricao='{$_POST["descricao"]}',anexos='{$_POST["anexos"]}',"
            . " prioridade='{$_POST["prioridade"]}', usuario='{$_POST["usuario"]}' "
            . "WHERE id='{$_POST["id"]}'";
    $banco->query($sql);
    $banco->close();
    RetornarMain();
}

function ExcluirCliente(){
    $banco = AbrirBanco();
    $sql = "DELETE FROM tasks WHERE id='{$_POST["id"]}'";
    $banco->query($sql);
    $banco->close();
    RetornarMain();
}

function SelecaoTodosClientes(){
    $banco = AbrirBanco();
    $sql = "SELECT * FROM tasks ORDER BY nome";
    $resultado = $banco->query($sql);
    $banco->close();
    while($row = mysqli_fetch_array($resultado)){
        $grupo[] = $row;
    }
    return $grupo;
}

function SelecaoIdClientes($id){
    $banco = AbrirBanco();
    $sql = "SELECT * FROM tasks WHERE id ='{$_POST["id"]}'";
    $resultado = $banco->query($sql);
    $banco->close();
    $pessoa = mysqli_fetch_assoc($resultado);
    return $pessoa;
    
}

function RetornarMain(){
    header("Location: main.php");
}
