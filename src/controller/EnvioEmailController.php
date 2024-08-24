<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once '../PHPMailer/PHPMailer.php';
    require_once '../PHPMailer/Exception.php';
    require_once '../PHPMailer/SMTP.php';

    $email = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $email->isSMTP();
        $email->Host = 'smtp.gmail.com'; // Defina o servidor SMTP do Gmail
        $email->SMTPAuth = true;
        $email->Username = 'matheusdeveloper68@gmail.com';
        $email->Password = 'sua_senha_aqui'; // Melhor usar uma variável de ambiente para armazenar a senha
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar criptografia TLS
        $email->Port = 587; // Porta para TLS

        // Definir remetente
        $email->setFrom('matheusdeveloper68@gmail.com', 'SmartPark');
        
        // Definir destinatário
        $email->addAddress('matheus.aguiar068@gmail.com', 'Destinatário');
        
        // Conteúdo do E-mail
        $email->isHTML(true);
        $email->Subject = 'Teste de Envio de E-mail';
        $email->Body    = 'Está é uma mensagem de teste <p>Olá</p>';
        $email->AltBody = 'Está é uma mensagem de teste para e-mail que não aceitam HTML';
        
        // Enviar e-mail
        $email->send();
        echo 'A mensagem foi enviada!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
    }
?>