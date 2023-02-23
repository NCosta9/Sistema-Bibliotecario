<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Biblioteca</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container theme-showcase" role="main">
            <div class="page-header">
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title" id="myModalLabel"><img src="icones/alert.png"></span></h1>
                    </div>
                    <div class="modal-body">
                       <H3>Livro Cadastrado Com Sucesso!</H3>
                    </div>
                    <div class="modal-footer">
                    	    
                        <a href="consulta.php"><button type="button" class="btn btn-Iinfo">Ver meu livro</button></a>
                        <a href="inserir.php"><button type="button" class="btn btn-primary">Fechar</button></a>
                    </div>
                </div>
            </div>
        </div>
          <!-- Modal -->
        <div class="modal fade" id="Modal_existe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title" id="myModalLabel"><img src="icones/alert.png"></span></h1>
                    </div>
                    <div class="modal-body">
                       <H3>Esse livro ja existe!</H3>
                    </div>
                    <div class="modal-footer">
                            
                        <a href="inserir.php"><button type="button" class="btn btn-primary">Fechar</button></a>
                    </div>
                </div>
            </div>
        </div>

        
<?php
#dados para conexão com banco de dados 
	$servidor ='localhost';
	$usuario ='root';
	$senha ='';
	$banco ='integracao';

$LIVRO = $_POST['NomeLivro'];
$AUTOR= $_POST['NomeAutor'];
$EDITORA= $_POST['NomeEditora'];

$strcon = mysqli_connect('localhost','root','','integracao') or die('Erro ao conectar ao banco de dados');
$search = mysqli_query($strcon,"SELECT * FROM livros WHERE LIVRO = '$LIVRO'");

if(@mysqli_num_rows($search) > 0){

echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>$("#Modal_existe").modal("show");</script>
    ';
   
}else{

    mysqli_query($strcon,"INSERT INTO livros(LIVRO,AUTOR,EDITORA) VALUES
('$LIVRO', '$AUTOR', '$EDITORA')");
 echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>$("#myModal").modal("show");</script>
    ';}

?>

      
					
				
		
		
	<!--<script>window.location.href='inserir.php'
					//$(document).ready(function(){
						//$('#myModal').modal('show');
					//});</script>-->
    </body>
</html>


