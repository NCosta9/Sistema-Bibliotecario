<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Biblioteca</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "img/favicon.icon"/>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!--links do caontainer de notificações-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jscript.js" ></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"/></script>
	<!--termina a animação do container de notificaçao--> 
</head>
<body style="background: #f0f0e6;">
		<!--inico do container para barra de navegação-->
		<div style="margin:0 auto; margin:0px; border:none;z-index: 1;">
		<div class="navbar" style="background:#746b0a;  width: 100%;height:30%;position: absolute;">
			 <img src="img/logo.png" width="220px" height="150px" style="margin-left: 3%;">
			<!--<img src="img/livres.jpg" border="0" style="width: 100%; height:500px; opacity:0.8;position: absolute; margin-top:5%;">-->
		</div>
		<div class="navicon" style=" position:absolute;top:3%; left:80%; ">
			<ul id="nav" >

				<li>
					<a href="inserir.php" title="Volta a pagina ínicial" style="color:#fff; "><img src="icones/home.png" alt="ínicio"></a>
				</li>

				<!-- campo de notificações de livros emprestados-->
				<li id="notification_li">
					<span  id="notification_count"></span>
					<a href="#" id="notificationLink" title="Notificaçoes"><img src="icones/notification.png" alt="Notificações"></span></a>
					<div id="notificationContainer">
						<div id="notificationTitle">Notificações</div>
						<!--corpo da caixa de notificação onde fica todo o conteudo-->
						<div id="notificationsBody" class="notifications" style="overflow: auto;z-index: 1000;">
							<?php 
								include("notificacao.php");//insere o arquivo notificação.php
								?>
								
							</div>
							
						</div>
					</li>
					<!--continua a barra de navegaçao-->

					<li>
						<a href="emprestimo.php" title="Emprestimo" style="color:#fff; "><img src="icones/user.png"></a>
					</li>
					<li>
						<a href="consulta.php" title="Consulta livro" style="color:#fff;">
							<img src="icones/lista.png" alt="Consultar"></a>
						</li>
					</ul>
				</div>
		</div>
		
		<div class="card text-center text-secondary border shadow" style="background: #D3D3D3; width: 50%; align-content: center;position :absolute; margin-left:25%;margin-top:100px; z-index: 100;  ">
			<div class="card-header" style="height:10px; background:#bbab4c; "></div>
			<div class=" card-body" style="background: #fff;color: #000; ">
				<h2>Emprestimo de livro</h2>
				<p><h5>Preencha os campos abaixo para levar o seu livro:</h5></p>
				<form method="post" action="emprestimo_cadastro.php?acao=adicionar" >
					<table class="table table-borderless table-hover">
						<tr>
							<td>Nome do livro:</td>
						</tr>
						<tr>
							
							<td><input class="form-control" name="LivroEmprestado" maxlength="64" placeholder="Tema do livro" required></td>
						</tr>
						<tr>
							<td>Seu Nome Completo:</td>
						</tr>
						<tr>
							<td><input class="form-control" name="NomePessoa" maxlength="32" placeholder="Ex: Nome Sobrenome " required></td>
						</tr>
						
						<tr>
							<td>Endereço Fisíco: </td>
						</tr>
						<tr>
							<td><input class="form-control" name="Endereco" maxlength="64" placeholder=" Ex: Cidade-Estado, rua ,n° Casa, Bairro" required></td>
						</tr>
						<tr>
							<td>Telefone: </td>
						</tr>
						<tr>
							<td><input class="form-control" id="telefone"  type="tel"  name="Telefone" maxlength="15" placeholder="Ex: (DD) 90000-0000" ></td>
							 <script type="text/javascript">$("#telefone").mask("(00) 00000-0000");</script>
							 <!--https://codigofonte.com.br/codigos/mascara-para-telefones-de-8-e-9-digitos-jquery-->
						</tr>
						<tr>
							<td>Endereço de E-mail: </td>
						</tr>
						<tr>
							<td><input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="Ex: nome@email.com" required></td>
						</tr>
						<tr>
							<td colspan="2" >
								<button class="btn shadow" type="reset" name="Limpar">Limpar</button>
								<button class="btn btn-primary shadow" data-toggle="modal" data-target="#modal_emprestimo" type="submit" name="Cadastrar">Enviar</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	 <script type="text/javascript" src="js/js_notification.js"></script>

</body>
</html>