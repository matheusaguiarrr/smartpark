<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once '../PHPMailer/PHPMailer.php';
    require_once '../PHPMailer/Exception.php';
    require_once '../PHPMailer/SMTP.php';
    function enviarEmail($emailDestinatario) {
        try {
            $email = new PHPMailer(true);
            // Configurações do servidor SMTP
            $email->isSMTP();
            $email->Host = 'smtp.gmail.com'; // Defina o servidor SMTP do Gmail
            $email->SMTPAuth = true;
            $email->Username = 'matheusdeveloper68@gmail.com';
            $email->Password = 'pfwh ifus yfvx jmez'; // Melhor usar uma variável de ambiente para armazenar a senha
            $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar criptografia TLS
            $email->Port = 587; // Porta para TLS
            $email->CharSet = 'UTF-8';
            // Definir remetente
            $email->setFrom('matheusdeveloper68@gmail.com', 'SmartPark');
            // Definir destinatário
            $email->addAddress($emailDestinatario, 'Destinatário');
            // Conteúdo do E-mail
            $email->isHTML(true);
            $codigoAleatorio = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
            $email->Subject = 'SmartPark | E-MAIL DE VERIFICAÇÃO';
            $conteudoEmail = '
            <body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif;">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <td bgcolor="#F0AC48" align="center" style="padding: 30px 0 20px 0; color: #EFEFEF">
                                <h1>CÓDIGO DE VERIFICAÇÃO</h1>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 50px 0;">
                                <h1 align="center">' . $codigoAleatorio . '</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p align="center">Olá, recentemente você se cadastrou no SmartPark, para ter acesso ao sistema é necessário que seu e-mail seja verificado.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            ';
            $email->Body    = $conteudoEmail;
            //Emails que não suportam HTML
            $email->AltBody = 'Seu código de verificação é: '.$codigoAleatorio;
            $email->send();
            return $codigoAleatorio;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
        }
    }