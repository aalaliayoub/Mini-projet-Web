<?php
session_start();
// $id_client=$_SESSION["client_id"];
$database=new PDO("mysql:host=localhost;dbname=mymarket","root","");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test.css">
    <link rel="shortcut icon" href="./images-mymarket/viiii.png" type="image/x-icon">
</head>
<body>
<style>
    body {
    font-family: 'Poppins';font-size:16px;
    background-color: white;
}
</style>
    <div class="header_image">
        <a href="mymarket.php"><img src="./images-mymarket/mymarket.ma-_2_195x@2x.avif" alt=""></a>
    </div>
    <div class="_1div">
        <div class="_11div">
            <div class="contact">
                <h1>Contact</h1>
                <a href="">ouvrir une session</a>
            </div>
            <div class="form_email">
                <div class="single-input">
                    <input type="text" class="input" id="nome" required>
                    <label for="nome">Adress E-mail</label>
                </div>
            </div>
            <p class="cas_erroni" style="color: red;"></p>
            <div><input type="checkbox"  id="nouvelle"><p style="margin-top: -22px;margin-left:30px;">Envoyez-moi les nouvelles et les offres par e-mail</p></div>
            <h2>Livraison</h2>
            <div>
                <label for="pays" class="region">pays/region</label>
                <select name="pays" id="pays">
                    <option value="Maroc" selected>Maroc</option>
                </select>
                <div class="nom_prenom">
                    <input type="text" name="" class="nom" placeholder="Nom">
                    <input type="text" name="" class="prenom" placeholder="Prenom">
                </div>
                <input type="text" name="" class="entreprise" placeholder="Entreprise (optionel)">
            </div>
            <div class="form_adresse">
                <div class="single-input">
                    <input type="text" class="input" id="nome" value="hay afanour tinghir" required>
                    <label for="nome">Adesse</label>
                </div>
            </div>
            <input type="text" name="" class="entreprise" placeholder="appartement, suite .etc (optionel)">
            <div style="display: flex;">
                <div class="form_adresse" style="width: 290px;">
                    <div class="single-input">
                        <input type="text" class="input" id="nome" value="20000" required>
                        <label for="nome">Code postal</label>
                    </div>
                </div>
                <div class="form_adresse" style="width: 290px;margin-left:10px;">
                    <div class="single-input">
                        <input type="text" class="input" id="nome" value="tinghir" required>
                        <label for="nome">Ville</label>
                    </div>
                </div>
            </div>
            <input type="tel" name="" class="entreprise" placeholder="Telephone" >
            <div class="svg_question">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="question"  version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 395.001 395" xml:space="preserve">
                    <g>
	                    <g>
		                    <path d="M197.501,79.908c-33.775,0-61.253,27.479-61.253,61.254c0,6.903,5.596,12.5,12.5,12.5c6.904,0,12.5-5.597,12.5-12.5    c0-19.99,16.263-36.254,36.253-36.254s36.253,16.264,36.253,36.254c0,11.497-8.314,19.183-22.01,30.474    c-12.536,10.334-26.743,22.048-26.743,40.67v40.104c0,6.902,5.597,12.5,12.5,12.5c6.903,0,12.5-5.598,12.5-12.5v-40.104    c0-6.832,8.179-13.574,17.646-21.381c13.859-11.426,31.106-25.646,31.106-49.763C258.754,107.386,231.275,79.908,197.501,79.908z"/>
		                    <path d="M197.501,283.024c-8.842,0-16.034,7.193-16.034,16.035c0,8.84,7.192,16.033,16.034,16.033    c8.841,0,16.034-7.193,16.034-16.033C213.535,290.217,206.342,283.024,197.501,283.024z"/>
	                    </g>
                    </g>
                </svg>
            </div>
            <div class="appel">
            Au cas où nous aurions besoin de vous contacter à propos de votre commande
            </div>
            <div class="flix"></div>
            <div style="margin-top: -50px;">
                <div style="display: flex;"><input type="checkbox" name="" id="nouvelle"><p style="margin-top:12px;">Sauvegarder mes coordonnées pour la prochaine fois</p></div>
                <div style="display: flex;margin-top:-10px;"><input type="checkbox" name="" id="nouvelle"><p style="margin-top:12px;">Envoyez-moi les nouvelles et les offres par SMS</p></div>
            </div>
            <h4>Option(s) de livraison</h2>
            <div class="div_tramway">
                <div class="tramway">
                    <input type="radio" name="tr" id="r1" checked>
                    <p>RunWay (Livraison Stations Tramway & BusWay)</p>
                </div>
                <p>Gratuit</p>
            </div>
            <div class="div_vehicule">
                <div class="vehicule">
                    <input type="radio" name="tr" id="r2">
                    <p>MyMarket Express (Véhicule)</p>
                </div>
                <p>30,00 MAD</p>
            </div>
            <h3>Paiment</h3>
            <p class="chiffre">Toutes les transactions sont sécurisées et chiffrées</p>
            <div class="paiement_cart">
                <div class="bancaire">
                    <input type="radio" name="" id="r3" >
                    <p>Paiement par carte bancaire via Payzone</p>
                </div>
                <div>
                    <div class="visa_svg">
                        <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-visa"><title id="pi-visa">Visa</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"/><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"/><path d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z" fill="#142688"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 24" width="38" height="24" role="img" aria-labelledby="pi-maestro"><title id="pi-maestro">Maestro</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"/><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"/><circle fill="#EB001B" cx="15" cy="12" r="7"/><circle fill="#00A2E5" cx="23" cy="12" r="7"/><path fill="#7375CF" d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 24" role="img" width="38" height="24" aria-labelledby="pi-master"><title id="pi-master">Mastercard</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"/><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"/><circle fill="#EB001B" cx="15" cy="12" r="7"/><circle fill="#F79E1B" cx="23" cy="12" r="7"/><path fill="#FF5F00" d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z"/></svg>
                    </div>
                </div>
            </div>
            <div class="ennoncie">
                <p>Après avoir cliqué sur « Payer maintenant », vous serez redirigé(e) vers Paiement par carte bancaire via Payzone pour finaliser votre achat de façon sécurisée.</p>
            </div>
            <div class="paiement_cart">
                <div class="espece">
                    <input type="radio" name="" id="r3">
                    <p>Paiement à la livraison</p>
                </div>
            </div>
            <div class="ennoncie">
                <p>Paiement en Espèce à la livraison</p>
            </div>
            <div class="paiement_cart">
                <div class="espece" style="width: 42%;">
                    <input type="radio" name="" id="r3">
                    <p>Paiement TPE à la livraison</p>
                </div>
            </div>
            <div class="ennoncie">
                <p>Vous pouvez payer votre commande par carte bancaire à la livraison : TPE , Disponible UNIQUEMENT SUR : Casablanca et Régions</p>
            </div>
            <div class="paiement_cart">
                <div class="bancaire" style="width:78%;">
                    <input type="radio" name="" id="r3">
                    <p>Paiement Par chèque ( Casablanca et Régions uniquement )</p>
                </div>
            </div>
            <div class="ennoncie">
                <p style="margin-top:2px;">Chèque société uniquement.</p>
                <p style="margin-top:-5px;">Montant minimum 500 dhs requis.</p>
                <p style="margin-top:-5px;">Paiement à la livraison par chèque bancaire. Veuillez mettre au nom de : RIZKOUNER</p>
                <p style="margin-top:-5px;">Barré et non endossable.</p>
                <p style="margin-top: -5px;">Disponible sur Casablanca</p>
            </div>
            <div class="paiement_cart">
                <div class="bancaire" style="width: 47.5%;">
                    <input type="radio" name="" id="r3">
                    <p>Virement & Versement Bancaire</p>
                </div>
            </div>
            <div class="ennoncie">
                <p style="margin-top:2px;">CFG BANK</p>
                <p style="margin-top: -5px;">CFG BANK - 101, Bd Al Massira Al Khadra, Casablanca MAROC</p>
                <p style="margin-top: -5px;"> RIB: 050 780 001 0110730392001 56</p>
                <p style="margin-top: -5px;">SWIFT pour international: CAFGMAMC</p>
            </div>
            <div class="paiement_cart">
                <div class="bancaire">
                    <input type="radio" name="" id="r3">
                    <p>PayPal (Euro & Dollar seulement)</p>
                </div>
            </div>
            <div class="ennoncie">
                <p>Paiement avec PayPal</p>
            </div>
        </div>
        <div class="_12div"></div>
    </div>
    <script src="chekout.js"></script>
</body>
</html>
