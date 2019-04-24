<?php   


$nome = $_GET['nome'];
$email = $_GET['email'];
$telefone = $_GET['telefone'];
$assunto = $_GET['assunto'];
$lista_servicos = $_GET['servico'];
// Preenche variável com todos os serviços selecionados
$servicos = "";
foreach ($lista_servicos as $servico){ 
  if($servicos == ""){
    $servicos = $servico;
  }else{
    $servicos = $servicos.", ".$servico;
  }
}
$data = $_GET['data'];
$horario = $_GET['horario'];
$mensagem = $_GET['mensagem'];

// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php
include "PHPMailer-master/PHPMailerAutoload.php"; 

// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 

// Método de envio 
$mail->IsSMTP();

// Enviar por SMTP 
$mail->Host = "email-ssl.com.br"; 

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = 587; 


// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true; 

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
$mail->Username = 'xxxxxxxxxxxxxxxxxxxx'; 
$mail->Password = 'xxxxxxxxxxxxxxxxxxxx'; 

// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
// $mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
$mail->From = "xxxxxxxxxxxxxxxxxxxx"; 

// Seu nome 
$mail->FromName = "Patrick Cardoso"; 

// Define o(s) destinatário(s) 
$mail->AddAddress('patrick@agenciaalper.com.br', 'Patrick Cardoso'); 

// Opcional: mais de um destinatário
// $mail->AddAddress('fernando@email.com'); 

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 

// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true); 

// Charset (opcional) 
$mail->CharSet = 'UTF-8'; 

// Assunto da mensagem 
$mail->Subject = $assunto; 

// Corpo do email 

$body = '<h2 style="font-family: Verdana; color: #444; text-align: center; border-bottom: 1px solid #777; border-top: 1px solid #777; padding-bottom: 10px; padding-top: 10px; float: left; width: 100%;">'.$assunto.'</h2>';


$body .= '<p style="font-family: Verdana; color: #444; float: left; width: 49%;"><b style="font-family: Verdana; color: #444;">Nome:</b> '.$nome.'</p>';
$body .= '<p style="font-family: Verdana; color: #444; float: right; width: 49%;"><b style="font-family: Verdana; color: #444;">E-mail:</b> '.$email.'</p>';
$body .= '<p style="font-family: Verdana; color: #444; float: left; width: 49%;"><b style="font-family: Verdana; color: #444;">Telefone:</b> '.$telefone.'</p>';
$body .= '<p style="font-family: Verdana; color: #444; float: right; width: 49%;"><b style="font-family: Verdana; color: #444;">Serviços Pretendidos:</b> '.$servicos.'</p>';
$body .= '<p style="font-family: Verdana; color: #444; float: right; width: 49%;"><b style="font-family: Verdana; color: #444;">Melhor Data: (Ano/mês/dia)</b> '.$data.'</p>';
$body .= '<p style="font-family: Verdana; color: #444; float: right; width: 49%;"><b style="font-family: Verdana; color: #444;">Melhor Horário:</b> '.$horario.'</p>';
$body .= '<p style="font-family: Verdana; color: #444; float: left; width: 49%;"><b style="font-family: Verdana; color: #444;">Informações Adicionais:</b> '.$mensagem.'</p>';



$mail->Body = "$body";

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// VERIFICA CAMPOS OBRIGATÓRIOS
if($nome == "" || $telefone == ""){
  echo "<html>
<head>
  <title>Mensagem Enviada | Eloana Thomé</title>
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta charset=\"utf-8\">
  <style type=\"text/css\">
    body{
      margin: 0;
    }
    *{
      text-align: center;
      font-family: calibri;
    }
    .header{
      padding: 100px 0;
      background-color: red;
    }
    .header h1{
      font-weight: 300;
      text-align: center;
      width: 100%;
      letter-spacing: 1px;
      color: white;
      font-size: 25px;
    }
    .body p{
      margin: 25px 0;
      font-weight: 500;
      letter-spacing: 1px;
      color: black;
      font-size: 18px;
    }
    .body a{
      background-color: #016274;
      color: white;
      text-decoration: none;
      padding: 10px 25px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class=\"header\">
    <h1>ERRO AO ENVIAR!</h1>
  </div>
  <div class=\"body\">
    <p>Problema com Parâmetros!</p>
    <a href=\"https://eloanathome.com.br/amp/index.amp.html\">Voltar ao Site</a>
  </div>
</body>
</html>";
}else{
  // Envia o e-mail 
  $enviado = $mail->Send(); 
  // Exibe uma mensagem de resultado 
  if ($enviado) 
  { 
    echo "<html>
<head>
  <title>Mensagem Enviada | Eloana Thomé</title>
    <meta http-equiv=\"refresh\" content=\"5;https://eloanathome.com.br/amp/index.amp.html\" />
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta charset=\"utf-8\">
  <style type=\"text/css\">
    body{
      margin: 0;
    }
    *{
      text-align: center;
      font-family: calibri;
    }
    .header{
      padding: 100px 0;
      background-color: #016274;
    }
    .header h1{
      font-weight: 300;
      text-align: center;
      width: 100%;
      letter-spacing: 1px;
      color: white;
      font-size: 25px;
    }
    .header h2{
      margin-top: 10px;
      color: white;
      font-size: 20px;
      color: #ccc;
      font-weight: 100;
    }
    .body p{
      margin: 25px 0;
      font-weight: 500;
      letter-spacing: 1px;
      color: black;
      font-size: 18px;
    }
    .body a{
      background-color: #016274;
      color: white;
      text-decoration: none;
      padding: 10px 25px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class=\"header\">
    <h1>Mensagem Enviada!</h1>
    <h2>Dra. Eloana Thome</h2>
  </div>
  <div class=\"body\">
    <p>Obrigado por entrar em contato conosco. Estaremos lhe respondendo assim que possível!</p>
    <a href=\"https://eloanathome.com.br/amp/index.amp.html\">Voltar ao Site</a>
  </div>
</body>
</html>";
  } else {
    echo "Houve um erro enviando o email: ".$mail->ErrorInfo;
  } 
}
?>