

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
       <div class="navicon" style=" position:absolute;top:3%; left:70%; ">
        <ul id="nav" >

            <li>
                <a href="inserir.php" title="Volta a pagina ínicial" style="color:#fff; " style="z-index: 1;"><img src="icones/home.png" alt="ínicio"></a>
            </li>
            <li>
                <form id="btn-pesquisa">
                    <input type="search" class="input-search" alt="lista-clientes" placeholder="Buscar..." id="filtro_tabela">
                </form>
            </li>  
            <!-- campo de notificações de livros emprestados-->
            <li id="notification_li" >
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

        <!--<div class="card text-center text-secondary border shadow" style="background: #D3D3D3; width: 50%; align-content: center;position :absolute; margin-left:25%;margin-top:100px; z-index: 100;  ">
            <div class="card-header" style="height:10px; background:#bbab4c; "></div>
            <div class=" card-body" style="background: #fff;color: #000; ">-->
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

                        echo '<td>EDITAR</td>';

                        echo '<td>REMOVER</td>';

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

                            echo "<form action='edita.php' method='post'>";

                            echo "<input name='ID' type='hidden' value='" .$tbl['ID']. "'>";

                            echo "<input name='LIVRO' type='hidden' value='" .$tbl['LIVRO']. "'>";

                            echo "<input name='AUTOR' type='hidden' value='" .$tbl['AUTOR']. "'>"; 

                            echo "<input name='EDITORA' type='hidden' value='" .$tbl['EDITORA']. "'>"; 

                            echo "<button class='btn btn-warning' style='border-radius:50px; color:#fff; '><img src='icones/pencil-edit.png'></button>";
                            echo "</form>";
                            echo "</td>";

                    // Cria um formulário para remover os dados 
                    // Colocamos o id dos dados a serem removidos dentro do input hidden
                            echo "<td>";
                            echo "<a href='remove.php?id=".$tbl['ID']."'>";
                            echo "<button class='btn btn-danger' style='border-radius:50px;'><img src='icones/remove.png'></button>";
                            echo "</a>";

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

        <script type="text/javascript" src="js/js_notification.js"></script>
    </body>
    </html>