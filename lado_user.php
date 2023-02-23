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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <!--links do caontainer de notificações-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jscript.js" ></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery_busca.js"></script>
    <!--termina a animação do container de notificaçao--> 
</head>


<!--links do caontainer de notificações-->
<body style="background: #f0f0e6;">
    <!--inico do container para barra de navegação-->
    <div style="margin:0 auto; margin:0px; border:none;z-index: 1;">
        <div class="navbar" style="background:#746b0a;  width: 100%;height:30%;position: absolute;">
            <img src="img/logo.png" width="220px" height="150px" style="margin-left: 3%;">
            <!--<img src="img/livres.jpg" border="0" style="width: 100%; height:500px; opacity:0.8;position: absolute; margin-top:5%;">-->
        </div>
        <div class="input-group " style=" position:absolute;top:10%; left:25%; width:50%;outline:3px solid #32CD32;">
            <div class="input-group-prepend">
                <span class="input-group-text rounded-0" id="basic-addon1"><img src="icones/lupa-busca.png" width="20px" height="20px"></span>
            </div>
            <input type="search" class="input-search form-control  border-white rounded-0" alt="lista-clientes" placeholder="Buscar..." id="filtro_tabela" style="box-shadow: 0 0 0 0; border:0 none;outline: 0;">
        </div>
    </div>

    <div class="cont">



        <br style="clear:both">

        <?php
        // Conexão ao banco
        $servidor ='localhost';
        $usuario ='root';
        $senha ='';
        $banco ='integracao';

        $link = mysqli_connect('localhost','root','','integracao');

        // Seleciona o Banco de dados através da conexão acima

        $conexao = mysqli_select_db($link,'integracao'); if($conexao){

            $sql = "SELECT ID,LIVRO,AUTOR,EDITORA FROM livros";

            $consulta = mysqli_query($link,$sql);

            echo '<table class="lista-clientes table  table-hover table-striped table-bordered shadow" style="background: #fff; width: 50%; align-content: center;position :absolute; margin-left:25%;margin-top:100px;z-index: 100;">' ;

            echo '<thead class="thead-dark" style="background:#bbab4c;">';

            echo '<tr>';

            echo '<td>CODIGO</td>';

            echo '<td>LIVRO</td>';

            echo '<td>AUTOR</td>';

            echo '<td>EDITORA</td>';

            echo '<td>LEVAR</td>';

            echo '</tr>';

            echo '</thead>';

            // Armazena os dados da consulta em um array associativo

            #while($registro = mysql_fetch_assoc($consulta))
            $result= mysqli_query($link,$sql);
            while($tbl = mysqli_fetch_array($result)){

                echo '<tbody>';

                echo '<tr>';

                echo '<td>'.$tbl["ID"].'</td>';

                echo '<td>'.$tbl["LIVRO"].'</td>';

                echo '<td>'.$tbl["AUTOR"].'</td>';

                echo '<td>'.$tbl["EDITORA"].'</td>';
                    // Cria um formulário para enviar os dados para a página de edição 
                    // Colocamos os dados dentro input hidden
                echo "<td>";

                echo "<button type='button'class='btn btn-outline-light' data-toggle='modal' data-target='#ModalLevarLivro'>
                <img src='icones/book.png' width='32px' height='32px'>
                </button>";

                echo "</td>";


                echo "</tr>";

                echo '</tbody>';
            }

            echo '</table>';

        }

        ?>

    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalLevarLivro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"> Emprestimo de livro</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </button>
</div>
<div class="modal-body">

    <p><h6>Preencha os campos abaixo para levar o seu livro:</h6></p>
    <form method="post" action="UserEmprestimoCadastrar.php?acao=adicionar" >
        <table class="table table-borderless table-hover">
            <tr>
                <td>Nome do livro:</td>
            </tr>
            <tr>

                <td><input class="form-control" name="LivroEmprestado" maxlength="64" placeholder="Tema do livro" required></td>
            </tr>
            <tr>
                <td>Nome:</td>
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
</div>
</div>
<div style="margin-left:2%; margin-top:53%;">
    <p style="color:#808080; font-size: 12px;">Essa aplicação faz parte de um projeto desenvolvido por <b>NATANAEL ALVES DA COSTA</b> formado em <b> TEC.INFORMATICA</b> na instituição <b>OLEGARIO MACIEL</b> no ano 2018. Email: costaalvesn16@gmail.com ou manut.negocio@gmail.com </p>

</div>
<script>

    $('#myModal').modal('show');

</script>

</body>
</html>