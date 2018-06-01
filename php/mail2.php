<?php
require_once("PHPMailerAutoload.php");

function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
    $inject = join('|', $injections);
    $inject = "/$inject/i";

    if(preg_match($inject,$str)){
      return true;
    }
    else{
      return false;
    }
}


$errors = array();
$data = array();

$nome = $_POST['form_nome'];
$email = $_POST['form_email'];
$telefone = $_POST['form_telefone'];
$projeto = $_POST['form_projeto'];
$mensagem = $_POST['form_mensagem'];

if(IsInjected($email)){
    $errors['dados_validos'] = false;
    
    $data['success'] = false;
    $data['errors']  = $errors; 
}
else{
    if (empty($_POST['form_nome']))
        $errors['form_nome'] = 'É necessário inserir seu nome.';

    if (empty($_POST['form_email']))
        $errors['form_email'] = 'É necessário inserir um e-mail válido.';



    if ( ! empty($errors)) {
        // Se nao foram inseridos os campos exigidos
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        // Se foram inseridos vamos tentar enviar o email
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'mail.osviloes.com.br';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "teste@osviloes.com.br";
            $mail->Password = "leoenessa";

            $mail->setFrom("teste@osviloes.com.br", "Contato do site B1");

            $mail->addAddress("leonardodeoc@gmail.com");

            $mail->Subject = "Contato do site B1";

            $mail->msgHTML("<html><head><style>body{font-size:15px;}</style></head><body>de: {$_POST['form_nome']}<br/>email: {$_POST['form_email']}<br/>Telefone: {$_POST['form_telefone']}<br/>Assunto: {$_POST['form_projeto']}<br/>Mensagem: {$_POST['form_mensagem']}</body></html>");

            if($mail->send()){ //Se conseguir enviar o e-mail configura o sucesso
                $data['success'] = true;
                $data['message'] = 'Success!';
            }
            else{ //Se nao conseguir enviar o e-mail retorna com erro
                $errors['mail'] = $mail->ErrorInfo;
                $data['success'] = false;
                $data['errors']  = $errors; 
            }
        }
}
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        // return all our data to an AJAX call
        echo json_encode($data);
    die();

?>