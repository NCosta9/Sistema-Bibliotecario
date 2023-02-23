<html>
<head>
    <title>Editar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--links do caontainer de notificações-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jscript.js" ></script>

    <!--termina a animação do container de notificaçao--> 
    <style type="text/css">
        input{
            display: block;
            margin-bottom: 1em;
            padding: 5px
        }
    </style>
    <?php 
        //Recebe os dados a serem editados
        $ID = filter_input(INPUT_POST, 'ID');
        $LIVRO = filter_input(INPUT_POST, 'LIVRO');
        $AUTOR = filter_input(INPUT_POST, 'AUTOR');
        $EDITORA = filter_input(INPUT_POST, 'EDITORA');
    ?>
</head>
   <body style="background: #f0f0e6;">
    <div style="margin:0 auto; margin:0px; border:none;z-index: 1;">
        <div class="navbar" style="background:#746b0a;  width: 100%;height:30%;position: absolute;">
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

                <!--card da pagina onde se localiza todo o conteudo-->
                <div class="card text-center text-secondary border shadow" style="background: #D3D3D3; width: 50%; align-content: center;position :absolute; margin-left:25%;margin-top:100px; z-index: 100;">
                    <div class="card-header" style="height:10px; background:#bbab4c;"></div>
                    <!--<img class="card-img-top" src="img/livres.jpg" alt="Imagem de capa do card" height="300px">-->
                    <div class=" card-body" style="background: #fff;color: #000">
                    <h2> Editar dados do livro </h2>
                    <form action="salva.php" method="post">
                        <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
                        <table class="table table-borderless table-hover">
                            <tr>
                                <td>
                                    <input class="form-control" type="hidden" name="ID" value="<?php echo $ID; ?>" placeholder="Altere aqui o Codigo ...">
                                </td>
                            </tr>
                            <tr>
                                            <td>
                                    <input class="form-control" type="text" name="LIVRO"   value="<?php echo $LIVRO; ?>" placeholder="Altere aqui o Livro ...">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <input class="form-control" type="text" name="AUTOR" value="<?php echo $AUTOR; ?>" placeholder="Altere aqui o Autor ..."> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" type="text" name="EDITORA" value="<?php echo $EDITORA; ?>" placeholder="Altere aqui a Editora ...">
                                </td>
                            </tr> 
                            <tr>
                                <td align="center">
                                    <button class="btn btn-success" type="submit" value="Salvar alterações"> Salvar Alterações</button>
                                </td>
                            </tr> 
                         </table>
                    </form>
                </div>
            </div>
        </div>
        
        
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/js_notification.js"></script>

    </body>
</html>