<?php 
/**
 * ARQUIVO DE BUSCA DAS NOTIFICAÇÕES AÇÃO
 */

/**
 * SISTEMA DE NOTIFICAÇÕES
 
/**
 * INCLUI A CONEXÃO COM O BANCO DE DADOS
 */

include "conexao.php";

/**
 * FAZ A CONSULTA AO BANCO DE DADOS POR UMA QUERY VERIFICANDO SE HÁ ALGUMA NOTIFICAÇÃO ATIVA 
 */
// Conexão ao banco
$servidor ='localhost';
$usuario ='root';
$senha ='';
$banco ='integracao';

$link = mysqli_connect('localhost','root','','integracao');

// Seleciona o Banco de dados através da conexão acima

$conexao = mysqli_select_db($link,'integracao'); if($conexao){

    $sql = "SELECT ID,LIVRO_EMPRESTADO,NOME_PESSOA,ENDERECO,TELEFONE,EMAIL,DATA FROM tb_emprestimo";


// Armazena os dados da consulta em um array associativo

    $result= mysqli_query($link,$sql);
/**
 * CONTA QUANTAS NOSTIFICAÇÕES ATIVAS HÁ NO BANCO DE DADOS
 */}

$conta = mysqli_num_rows($result);

/**
 * INICIA LAÇO DE VERIFICAÇÃO DE NUMERO DE NOTIFICAÇÃO
 */

if($conta == "0"){

/**
 * SE NÃO HÁ NOTIFICAÇÃO IMPRIME ISSO
 */
echo '<span class="text-light">0</span>';

}elseif($conta == "1"){

/**
 * SE HÁ UMA NOTIFICAÇÃO IMPRIME ISSO
 */

echo '<span class="text-light">1</span>';

}else{

/**
 * SE HÁ MAIS DE UMA NOTIFICAÇÃO IMPRIME ISSO
 */
echo '<span class="text-light">'.$conta.' </span>';
}

/**
 * RETORNA A MENSAGEM QUE HÁ NO BANCO DE DADOS DESDE QUE A NOTIFICAÇÃO ESTEJA ATIVA 
 */

//while ($row = mysql_fetch_object($sql)) {
//    echo '<h4>'.$row->msg.'</h4>';
//}


?>