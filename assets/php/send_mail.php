<?php
$nome = $_POST['name'];
$email = $_POST['email'];
$assunto = $_POST['subject'];
$texto = $_POST['message'];

//email da qis
$from = "suporte@iliontecnologia.com.br";
// envia um e-mail de ajuda ou contato para nos
if (PHP_VERSION_ID < 50600) {
	iconv_set_encoding('input_encoding', 'UTF-8');
	iconv_set_encoding('output_encoding', 'UTF-8');
	iconv_set_encoding('internal_encoding', 'UTF-8');
} else {
	ini_set('default_charset', 'UTF-8');
}

$headers = "MIME-Version: 1.1\r\n";
$headers .= "From: {$email}\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers  .= "Content-type: text/html; charset=iso-8859-1 \r\n";
('Content-type: text/html; charset=iso-8859-1 \r\n');

$subject = "[CONTATO-ILION] {$assunto}";
$mensagem1  = "Mensagem enviado pelo site formulario de contato no site do ILION TECNOLOGIA<br />
Nome: {$nome}<br />
Mensagem: {$texto}.";

$subject = utf8_decode($subject);
$mensagem1 = utf8_decode($mensagem1);

$send_contact=mail($from, $subject, $mensagem1, $headers);

if ($send_contact) {
	header('Location: ../../index.php?envio=sucesso');
}

?>