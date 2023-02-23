<?php
// Conexão ao banco
$servidor ='localhost';
$usuario ='root';
$senha ='';
$banco ='integracao';

$link = mysqli_connect('localhost','root','','integracao');

// Seleciona o Banco de dados através da conexão acima

$conexao = mysqli_select_db($link,'integracao'); if($conexao){

    $sql = "SELECT ID,LIVRO_EMPRESTADO,NOME_PESSOA,ENDERECO,TELEFONE,EMAIL,DATE_FORMAT( `DATA` , '%d/%m/%Y às %H:%i:%s' ) AS `DATA` FROM tb_emprestimo";


// Armazena os dados da consulta em um array associativo

    $result= mysqli_query($link,$sql);
        while($registro = mysqli_fetch_array($result)){


        echo '<ul class="list-group">';

        echo '<li class="list-group-item list-group-item-light"><b>'.$registro["NOME_PESSOA"].'</b> em '.$registro["DATA"].' pegou o livro "'.$registro["LIVRO_EMPRESTADO"]. '". <br>Tel.: '.$registro["TELEFONE"].' <br>Email: '.$registro["EMAIL"]. ' <br>End.: '.$registro["ENDERECO"];

        echo "<br>";

        echo "<a href='exclui_notificacao.php?id=".$registro['ID']."'>";
        echo "<button class='btn btn-danger' style='border-radius:50px;'><img src='icones/delete.png'></button>";
        echo "</a>";
        echo "</li>";
        echo '</ul>';

    }

}

?>
