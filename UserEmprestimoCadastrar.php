<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Biblioteca</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container theme-showcase" role="main">
            <div class="page-header">
            </div>
        </div>

        <!-- Modal pode levar -->
        <div class="modal fade" id="modal_pode_levar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background:#3CB371;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="myModalLabel"><span style="color:#ffd700" class="fa fa-exclamation-triangle"><img src="icones/alert.png"></span></h1>
                    </div>
                    <div class="modal-body">
                       <H3>Oba!Agora você pode levar o seu livro. Boa leitura!</H3>
                    </div>
                    <div class="modal-footer">
                    	 
                        <a href="lado_user.php"><button type="button" class="btn btn-primary">Fechar</button></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal não pode levar -->
        <div class="modal fade" id="modal_nao_pode_levar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background:#B22222;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       
                       <img src="icones/emoticon-triste.jpg" width="50px" height="50px"><h1 class="modal-title" id="myModalLabel"><p>Oops!</p></h1>
                    </div>
                    <div class="modal-body">
                      
                        <H3><p>Infelizmente,você não pode levar esse livro!</p></H3><br>
                            <p>Condições:</p>
                            <ol>
                                <li>Você pegou um livro e ainda não devolveu à biblioteca.</li>
                                <li>Esse livro ja foi entregue a outra pessoa.</li>
                            </ol>
                    </div>
                    <div class="modal-footer">
                         
                        <a href="lado_user.php"><button type="button" class="btn btn-primary">Fechar</button></a>
                    </div>
                </div>
            </div>
        </div>

        
<?php
#dados para conexão com banco de dados 
	$servidor ='localhost';
	$usuario ='root';
	$senha ='';
	$banco ='bd_emprestimo';

$LIVRO_EMPRESTADO = $_POST['LivroEmprestado'];
$PESSOA= $_POST['NomePessoa'];
$ENDE= $_POST['Endereco'];
$TELEFONE= $_POST['Telefone'];
$EMAIL= $_POST['Email'];

$strcon = mysqli_connect('localhost','root','','integracao') or die('Erro ao conectar ao banco de dados');
$search = mysqli_query($strcon,"SELECT * FROM tb_emprestimo WHERE NOME_PESSOA = '$PESSOA' OR LIVRO_EMPRESTADO='$LIVRO_EMPRESTADO'");
if(@mysqli_num_rows($search) > 0){
    echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js">
        </script><script>$("#modal_nao_pode_levar").modal("show");</script>
    ';
}else{

    // faz inserção

     mysqli_query($strcon,"INSERT INTO tb_emprestimo(LIVRO_EMPRESTADO,NOME_PESSOA,ENDERECO,TELEFONE,EMAIL) VALUES
('$LIVRO_EMPRESTADO', '$PESSOA', '$ENDE','$TELEFONE','$EMAIL')");

     // Caminho da biblioteca PHPMailer
require 'phpMailer/class.phpmailer.php';

// Instância do objeto PHPMailer
$mail = new PHPMailer;

// Configura para envio de e-mails usando SMTP
$mail->isSMTP();

// Servidor SMTP
$mail->Host = 'smtp.gmail.com';

// Usar autenticação SMTP
$mail->SMTPAuth = true;

// Usuário da conta
$mail->Username = 'biblioteca.zinap@gmail.com';

// Senha da conta
$mail->Password = 'zinap123';

// Tipo de encriptação que será usado na conexão SMTP
$mail->SMTPSecure = 'ssl';

// Porta do servidor SMTP
$mail->Port = 465;

// Informa se vamos enviar mensagens usando HTML
$mail->IsHTML(true);

// Email do Remetente
$mail->From = 'biblioteca.zinap@gmail.com';
// Nome do Remetente
$mail->FromName = 'BIBLIOTECA ZINA PORTO';

// Endereço do e-mail do destinatário
$mail->addAddress($EMAIL);

// Assunto do e-mail
$mail->Subject = 'Emprestimo de livro';

// Mensagem que vai no corpo do e-mail
$mail->Body = '<h2>Olá, '.$PESSOA.'</h2>
<p>Você pegou o livro<b> "' . $LIVRO_EMPRESTADO. '" </b>na Biblioteca Zina porto da Escola Estadual Olegario Maciel localizado no n° 440, Av. Cel. Cassiano - Centro, Januaria - MG, 39480-000.<i>Obrigado por escolher nossa biblioteca!</i></p><br><p>"A leitura de um bom livro é o caminho mais curto para se descobrir que a vida vale à pena". Antonio Costta</p><br>
<p><b>Você tem até 15 dias para ler e devolver esse livro.</b> Restam exatamente:<img src="http://s.mmgo.io/t/BNUM" alt="motionmailapp.com" /></p>  ';
// Envia o e-mail e captura o sucesso ou erro
if($mail->Send()):
    echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js">
        </script><script>$("#modal_pode_levar").modal("show");</script>

    ';
//else:
    //echo 'Ah não! Erro ao se cadastrar;' . $mail->ErrorInfo;
endif;
   
}

?>
    </body>
</html>

<!--https://pt.stackoverflow.com/questions/264297/verificando-se-registro-j%C3%A1-existe-no-banco-de-dados-->
