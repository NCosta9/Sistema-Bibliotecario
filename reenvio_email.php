<?php
#dados para conexão com banco de dados 
$strcon = mysqli_connect('localhost','root','','integracao') or die('Erro ao conectar ao banco de dados');
$search = mysqli_query($strcon,"SELECT * FROM tb_emprestimo WHERE DATA <= date_sub(curdate(), interval 1 day)");
$linha =mysqli_fetch_array($search);
$emailDestino = $linha["EMAIL"];
$destinatario = $linha["NOME_PESSOA"];
if(@mysqli_num_rows($search) > 0){
 
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
$mail->addAddress($emailDestino);

// Assunto do e-mail
$mail->Subject = 'Emprestimo de livro';

// Mensagem que vai no corpo do e-mail
$mail->Body = '<h2>Olá, '.$destinatario.'</h2>
<h4>Olá, acabou o seu periodo de leitura!</h4>
<p>Procure a instituião Olegrio Maciel para devolve-lo. Caso isso não ocorra, será contabilizado <b>R$2/dia</b>.</p><br>
<p>Se hover algum motivo(ex:perda do livro) que não possibilitara a devolução, será cobrado uma multa de <b>R$50</b>reais.</p>';
   
}

?>