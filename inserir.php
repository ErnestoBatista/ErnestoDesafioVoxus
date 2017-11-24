<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<meta charset="UTF-8">
<form name = "dadostasks" action = "conexao.php" method = "POST">
    <table border="1">
    
        <tbody>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="" /></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><input type="text" name="descricao" value="" /></td>
            </tr>
            <tr>
                <td>Anexos:</td>
                <td>
                <input type="file" name="anexos" value="" />
                </td>
            </tr>
            <tr>
                <td>Prioridade:</td>
                <td><input type="text" name="prioridade" value="" /></td>
            </tr>
           
            <tr>
                <td>Usuário:</td>
                <td><input type="text" name="usuario" value="" /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="acao" value="Inserir" /></td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>

</form>