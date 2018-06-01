<?php

$errors = array();
$data = array();

 if (empty($_POST['form_nome']))
        $errors['form_nome'] = 'É necessário inserir seu nome.';

 if (empty($_POST['form_email']))
        $errors['form_email'] = 'É necessário inserir um e-mail válido.';


// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);




//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
//session_start();
//$nome = $_POST['name'];
//$email = $_POST['email'];
//$assunto = $_POST['subject'];
//$mensagem = $_POST['message'];
//
//require_once("PHPMailerAutoload.php");
//
//$mail = new PHPMailer();
//
//$mail->isSMTP();
//$mail->Host = 'smtp.gmail.com';
//$mail->Port = 587;
//$mail->SMTPSecure = 'tls';
//$mail->SMTPAuth = true;
//$mail->Username = "riolimousinesadm@gmail.com";
//$mail->Password = "Madalena90";
//
//$mail->setFrom("riolimousinesadm@gmail.com", "Contato do site RioLimousines");
//
//$mail->addAddress("baladamovelrio@gmail.com");
//$mail->Subject = "Email de contato da RioLimousines";
//
//$mail->msgHTML("<html>de: {$name}<br/>email: {$email}<br/>Assunto: {$assunto}<br/>mensagem: {$message}</html>");
//$mail->AltBody = "de: {$nome}\nemail:{$email}\nAssunto:{$assunto}\nmensagem: {$mensagem}";
//
//if($mail->send()){
//  $_SESSION['sucesso'] = "Mensagem enviada com sucesso";
//  header("Location:../index.php#contact");
//}else{
//  $_SESSION['erro']="Erro ao enviar mensagem. Favor entrar em contato por um de nossos telefones.".$mail->ErrorInfo;
//  header("Location:../index.php#contact");
//}
//die();
?>