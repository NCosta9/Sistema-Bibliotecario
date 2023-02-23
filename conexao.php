<?php 
/**
 * ARQUIVO DE CONFIGURAÇÃO E CONEXÃO COM O BANCO DE DADOS
 */

/**
 * SISTEMA DE NOTIFICAÇÕES
 * IGR Sistemas
 * Site:  www.igrsistemas.com
 * Email: igrsysten@gmail.com - suporte@igrsistemas.com
 */

//NOME DO SEU HOST
$servidor ='localhost';
//NOME DE USUÁRIO DO MYSQL
 $usuario ='root';
//SENHA DO MYSQL
 $senha ='';
//NOME DO BANCO DE DADOS
$banco ='integracao';
//NOME DA TABELA DE NOTIFICACAO
$tabela = 'tb_emprestimo';

/**
 * APARTIR DAQUI NÃO HÁ MAIS NADA A EDITAR, A NÃO SER QUE VOCÊ QUEIRA É CLARO.. 
 * @var [type]
 * 
 * CONEXÃO
 */ 
   $link = mysqli_connect('localhost','root','','integracao');

// Seleciona o Banco de dados através da conexão acima

  $conexao = mysqli_select_db($link,'integracao');

?>
