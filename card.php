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
    <link rel="shortcut icon" href="./images-mymarket/panier3.png" type="image/x-icon">
    <link  rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="mymarket.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<style>
body {
    font-family: 'Poppins';font-size: 15px;
}
</style>
<style>
    .swiper-button-prev{
      width: 40px;   
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: 50px;
    }
    .swiper-button-next{
        width: 40px;   
        height: 40px; 
        display: flex;
        justify-content: center;
      align-items: center;
    }
    .swiper-button-next::after,
    .swiper-button-prev::after{
        font-size: 30px;
        font-weight:bold; 
    } 
    .swiper-button-next,
    .swiper-button-prev {
      padding: 5px; 
    }
    .swiper-button-next,
    .swiper-button-prev {
      border-radius: 50%;
    }
  </style>
</head>
<body>
<div class="titre">
            <p>New: RUNWAY , la livraison Express et gratuite ( Livraison Stations Tramway & BusWay Casablanca Uniquement )</p>
        </div>
        <div class="div-header">
                <label class="menu">
                    <input id="input1" type="checkbox">
                    <div class="div-menu">
                        <span class="top_line1 comman1"></span>
                        <span class="middle_line1 comman1"></span>
                        <span class="bottom_line1 comman1"></span>
                    </div>
                    <p>MENU</p>
                </label>
                <img class="image1" src="./images-mymarket/mymarket.ma-_2_195x@2x.avif" alt="">
                <div class="input-proup">
                    <input type="text" name="" id="input2" placeholder="Recherche...">
                    <span class="input-group-addon" style="float:right;"><div class="searsh-cercle"></div><div class="searsh-bar"></div></span>
                </div>
                <div>
                    <label for="langue" class="label">Langue</label><br>
                    <select name="langue" id="Langue" style="border: none;font-size:large;font-weight: bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;width: 100px;color: rgb(26, 101, 187);">
                        <option value="arabic" style="font-weight: bold;"> Arabic</option>
                        <option value="english" style="font-weight: bold;"> English</option>
                        <option value="frinsh" style="font-weight: bold;"> frinsh</option>
                    </select>
                </div>
                <div><hr class="hor1"></div>
                <div style="text-align: center;">
                    <span class="con-ins">Connexion / inscription</span><br>
                    <a class="mon-compte" href="connexion.php" target="_blank">Mon Compte</a>
                </div>
                <div><hr class="hor1"></div>
                <label>
                    <a href="card.php" style="display: flex;flex-direction: row;">
                        <input type="checkbox"  id="chekpanier1" style="display: none;">
                        <div class="div-svg">
                            <div class="svgg1">
                                <svg focusable='false' viewBox='0 0 27 24' role='presentation'>
                                    <g transform='translate(0 1)' stroke-width='2' stroke='currentColor' fill='none' fill-rule='evenodd'>
                                    <circle stroke-linecap='square' cx='11' cy='20' r='2'></circle>
                                    <circle stroke-linecap='square' cx="22" cy='20' r='2'></circle>
                                    <path d='M7.31 5h18.27l-1.44 10H9.78L6.22 0H0'></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="numbre_product_ajouter"><p>0</p></div>
                        <span class="panier">Panier</span>
                    </a>
                </label>
        </div>
<header>
<div class="menu-principale" style="margin-top:50px;">
            <div class="menu-container">
                <a href="collection.php?type=all">Nouveaute</a>
                <a href="collection.php?type=all">Promo</a>
                <a href="collection.php?type=all">Bio</a>
                <a href="collection.php?type=all">Gluten Free</a>
                <a class="a1" href="">Alimentation<b style="margin-left:70px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=all">Bebe<b style="margin-left:130px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a></li>
                <a class="a1" href="collection.php?type=all">Hygiene et Beaute<b style="margin-left:34px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=all">Entetienet Maison<b style="margin-left:34px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=all">Animaux<b style="margin-left:99px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a></li>
                <a href="collection.php?type=all">Electromenagers</a>
            </div>
            <div class="submenu">
                <div class="submenu1">
                    <div>
                        <h3> Marché et Boucherie</h>
                            <a href="">Légumes</a>
                            <a href="">Fruits</a>
                            <a href="">Poissons et Crustacés</a>
                            <a href="">Boucherie - Volaille</a>
                            <a href="">Fruits de Saison, Panier de fruits</a>
                            <a href="">Légumes de saison, Panier de légumes</a>
                            <a href="">Fruits secs</a>
                    </div>
                    <div>
                        <h3> Crèmerie</h3>
                        <a href="">Lait et boisson lactée</a>
                        <a href="">oeufs</a>
                        <a href="">Yaourts</a>
                        <a href="">Beurres, margarines et sauces a cuisiner</a>
                        <a href="">Fromages</a>
                        <a href="">Produits Laitiers BIO</a>
                    </div>
                    <div>
                        <a href=""><img src="./images-mymarket/submenu11.webp" alt="" style="height:90px;    width: 160px;">
                        <h3>Panier Ramadan</h3></a>
                        <a href="">Livraison Express</a>
                    </div>
                    <div>
                        <a href="">
                            <img src="./images-mymarket/submenu12.webp" alt="" style="width:150px;height: 250px;">
                            <h3>Pur Basmati Rice !</h3>
                        </a>
                        <a href="">En Exclu !</a>
                    </div>
                    <div>
                        <h3>Épicerie sucrée</h3>
                            <a href=""> Chocolat</a>
                            <a href="">Biscuits, confiseries</a>
                            <a href="">Aide à la pâtisserie</a>
                            <a href="">Farines, Sucres</a>
                            <a href=""> Sans Gluten</a>
                    </div>
                    <div>
                        <h3>Épicerie salée</h3>
                            <a href="">Soupe</a>
                            <a href="">Sauces chaudes</a>
                            <a href="">Condiments et sauces</a>
                            <a href="">Pâtes</a>
                            <a href="">Riz</a>
                            <a href="">Semoule</a>
                            <a href="">Purée</a>
                            <a href="">Huiles et vinaigres</a>
                            <a href=""> Conserves</a>
                            <a href="">Épices</a>
                            <a href=""> Bouillons</a>
                            <a href="">  Biscuits Apéritifs, chips</a>
                            <a href=""> Produits du Monde</a>
                    </div>
                    <div></div>
                    <div></div>
                    <div>
                        <h3>Petit Déjeuner</h3>
                        <a href="">Céréales, barres en céréales</a>
                        <a href="">Café, chicorée</a>
                        <a href=""> Chocolat en poudre</a>
                        <a href="">Thés, infusions</a>
                        <a href="">Confitures, pâtes à tartiner, miel</a>
                        <a href="">Tartines, biscuits</a>
                        <a href=""> Laits en poudre</a>
                        <a href="">Petit Dej BIO & Sans Gluten</a>
                    </div>
                    <div>
                        <h3>Pains et Pâtisserie</h3>
                            <a href="">Pains</a>
                            <a href=""> Viennoiseries</a>
                            <a href=""> Petits Fours</a>
                    </div>
                    <div></div>
                    <div></div>
                    <div>
                        <h3>Boissons</h3>
                            <a href="">Eaux plates</a>
                            <a href="">Eaux gazeuses</a>
                            <a href=""> Eaux Aromatisées</a>
                            <a href="">Jus de fruits, Nectar</a>
                            <a href="">Sodas boissons gazeuses</a>
                            <a href="">Sirops, cocktails</a>
                            <a href="">Thés Glacés</a>
                            <a href=""> Boissons énergisantes</a>
                            <a href="">Boissons sans alcools</a>
                    </div>
                    <div>
                        <h3>Surgelés</h3>
                            <a href="">Apéritifs, entrées et snacking</a>
                            <a href="">Pizzas, Pâte, tartes et plats cuisinés</a>
                            <a href="">Viandes, poissons et crustacés</a>
                            <a href="">Glaces et pâtisseries surgelées</a>
                    </div>
                    <div>
                        <h3>Porc</h3>
                    </div>
                </div>
                <div class="submenu2">
                    <div>
                        <h3>Laits bébé</h3>
                        <a href=""> 1er Age</a>
                        <a href="">2ème Age</a>
                        <a href=""> Croissance</a>
                    </div>
                    <div>
                        <h3>Alimentation bébé</h3>
                            <a href=""> Compotes, repas</a>
                            <a href=""> Alimentation bébé BIO</a>
                        <a href="">Alimentation bébé Sans Gluten</a>
                        <a href=""> Eaux adaptées, Jus</a>
                        <a href=""> Farines et céréales</a>
                    </div>
                    <div>
                        <h3>Hygiène, soins</h3>
                        <a href=""> Couches bébé</a>
                        <a href=""> lingettes bébé</a>
                        <a href="">Soins</a>
                    </div>
                </div>
                <div class="submenu3">
                    <div>
                        <h3>Pour Lui</h3>
                            <a href="">Shampoings et soins</a>
                            <a href="">Rasage, Soins hommes</a>
                            <a href=""> Dentaire</a>
                            <a href=""> Douche, bain, savon</a>
                            <a href=""> Déodorants et aux de toilettes</a>
                    </div>
                    <div>
                        <h3>Pour Elle</h3>
                        <a href=""> Douche, bain, savon</a>
                        <a href="">Déodorants</a>
                        <a href=""> Soins du visages et corps</a>
                        <a href="">Hygiène intime</a>
                        <a href="">Shampoings et soins</a>
                        <a href="">  Épilation</a>
                        <a href=""> Dentaire</a>
                    </div>
                    <div>
                        <h3>Pour enfants</h3>
                            <a href=""> Shampooings</a>
                            <a href=""> Dentaire</a>
                            <a href=""> Gels douche</a>
                    </div>
                    <div>
                        <h3>Pour Senior</h3>
                        <a href=""> Couches Adultes</a>
                    </div>
                </div>
                <div class="submenu4">
                    <div>
                        <h3>Entretien de la maison</h3>
                            <a href="">Produits écologiques , BIO</a>
                            <a href="">Insecticides</a>
                            <a href="">Meubles</a>
                            <a href="">Désodorisants</a>
                            <a href="">WC</a>
                            <a href=""> Vitres</a>
                            <a href="">Sols</a>
                            <a href=""> Nettoyants multi-usages</a>
                    </div>
                    <div>
                        <h3>Cuisine</h3>
                            <a href=""> Liquides vaisselle</a>
                            <a href=""> Torchon et Abrasif</a>
                            <a href=""> Lave-Vaisselle</a>
                            <a href=""> Gants, éponges</a>
                            <a href="">Sacs poubelle</a>
                            <a href=""> Essuies-tout</a>
                            <a href=""> Ustensiles, Vaisselles jetables</a>
                            <a href=""> Bougies, Anniversaires</a>
                            <a href="">Produits écologiques BIO</a>
                            <a href=""> Accessoires de Cuisine</a>
                            <a href="">Vitrocéramique, four, et métaux</a>
                        </div>
                        <div>
                            <h3>Soins du linge</h3>
                                <a href="">Lessives</a>
                                <a href="">Assouplissants</a>
                                <a href=""> Aides au Lavage</a>
                                <a href="">Produits écologiques BIO</a>
                        </div>
                        <div style="text-align: center;">
                            <a href="">
                                <img src="./images-mymarket/submenu13.webp" alt=""style="width:190px;height:100px">
                                <h3>Brait</h3>
                            </a>
                            <a href=""> Big Promo</a>
                        </div>
                        <div>
                            <h3>Accessoires Maison</h3>
                                <a href=""> Piles</a>
                                <a href="">Accessoire Electrique</a>
                        </div>
                        <div>
                            <h3>Accessoire de feu</h3>
                            <a href=""> Cheminée et Barbecue</a>
                        </div>
                        <div>
                            <h3>Entretien chaussures</h3>
                        </div>
                </div>
                <div class="submenu5">
                    <div class="traingle"></div>
                    <a href="">Chiens</a>
                    <a href="">Chats</a>
                </div>
            </div>
        </div>
    </header>
    <main style="margin-top:-100px;">
    <div class="div_total">
       <div class="mon_panier">
       <div class="titele">
            <h1 class="lh1">Mon panier</h1>
            <p class="frais">Encore 500.00 dh pour bénéficier des frais de port gratuits !</p>
        </div>
        <div class="div1">
            <div class="div1_1">
                <div class="prod">
                    <p style="color: black;">Produit</p>
                    <div class="propriete">
                        <p style="color: black;">Quantité</p>
                        <p style="color: black;">Total</p>
                    </div>
                </div>
                <?php 
                    $selectionall=$database->prepare("select * from ajouter_panier inner join produuit on ajouter_panier.produit_id = produuit.id  where client_id=?");
                    $selectionall->execute(array(session_id()));
                    $LesProduits=$selectionall->fetchAll();
                    foreach($LesProduits as $product){
                    echo "<div class='produits'>
                    <div class='image_des-price'>
                        <div><img class='image-cart' src='./images-mymarket/".$product["src"]."' alt='product image'></div>
                        <div style='margin-left: -100px;width:280px;'>
                            <p class='marque'>".$product["marque"]."</p>
                            <p class='description'>".$product["description"]."</p>
                            <p class='prix'style='margin-left:0px;'>".$product["prix"]."DH</p>
                        </div>
                    </div>
                    <div>
                        <div class='quantite_total'>
                            <div>
                                <div class='input_quantite'>
                                    <button class='button_1' type='button'>-</button>
                                    <input  type='number' name='' id='quantit' value='".$product["quantite"]."'>
                                    <button class='button_2' type='button'>+</button>
                                </div>
                                <p class='suppr'>Supprimer</p>
                            </div>
                            <p class='prixx'>".$product["prix"]."DH</p>
                        </div>
                    </div>
                </div>";
                }
                ?>
            </div>
            <div class="div1_2">
                <div class="divdiv">
                <div class="div1_2_1">
                    <h3 style="color: orange;">Total</h3>
                    <h3 class='total_final'>123034058 DH</h3>
                </div>
                <label>
                    <div class="Instructions_de_commande">
                        <input type="checkbox"  id="sauvegarder_affiche" style="display: none;">
                        <p style="color: black;">Instructions de commande</p>
                        <div>
                            <svg  focusable="false" class="instruction" viewBox="0 0 12 8" role="presentation">
                            <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                            </svg>
                        </div>
                    </div>
                </label>
                <div class="sauvegarder">
                   <textarea name="" id=""></textarea>
                    <button type="button">Sauvegarder</button>
                </div>
                <p style="margin-left: 20px;color:black;">Taxes incluses. <a style="color:#00badb;" href="livraison.php">Livraison</a> calculée au moment de payer</p>
                <div class="livraison">
                    <div class="div-livraison">
                        <img class="image-livraison" src="./images-mymarket/livraison-removebg-preview.png" alt="">
                        <p style="color: black;">Livraison Casablanca & Régions</p>
                    </div>
                    <div class="autre_ville">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" version="1.0" viewBox="0 0 128 128"><path d="M49 1.1c-1.9.6-3.7 1.4-4 1.8a20 20 0 0 1-5.1 2.4c-5.6 2.1-7.4 4-8.4 8.7-.4 1.9-1.6 4.7-2.6 6.2a10 10 0 0 0-1.9 5.2c0 1.9-.5 2.6-1.9 2.6-1.8 0-6.3-4.4-7.4-7.2C16.3 17 4.4 36.9 1.6 47.6a86.2 86.2 0 0 0 0 32.8c5.7 22 24.8 41 46.5 46.1a89.4 89.4 0 0 0 31.8 0c26.4-6.3 48-32.6 48.1-58.6v-5.7l-8.3-.7c-7.5-.6-15.7 0-15.7 1.2 0 .2.7 1.8 1.6 3.4.8 1.7 1.4 3.2 1.2 3.3-1.4.9-6.2 2.6-7.2 2.6-.7 0-2.5-2.7-3.9-6-1.8-4.1-3.1-5.8-4-5.4-1.2.4-1 1.6.9 6.2 3.5 8.5 3.2 11.4-2 17.7-4.1 5.1-4.3 5.7-5 13.7-1.1 13.2-1.9 15.7-6.8 19.9-5 4.4-5.5 4.5-8.8 2-2.1-1.7-2.6-3.4-4.1-13.3-.9-6.2-2.1-13.1-2.8-15.4-1.6-5.7-6.3-12-9.8-12.8-10-2.4-10.3-2.6-11.9-6.4-1.5-3.6-1.3-11.2.4-13.9.4-.6 4.1-2.5 8.2-4.1 8.3-3.3 7.1-3.3 26.7 1.3 3.4.8 8 1.5 10.3 1.5 3.7 0 4.2-.3 5.6-3.5 1.9-4.5 1.8-5.5-.5-5.5-1.4 0-2-1.1-2.7-5.3l-.9-5.2h-5c-4.5 0-5 .2-5.3 2.3-.2 1.3.4 3.2 1.4 4.3.9 1 1.2 1.9.6 1.9s-.9.7-.6 1.5c.4.9 0 1.5-.9 1.5s-2-1.5-2.6-3.3c-1.5-4.5-5.4-6.7-7.8-4.4a5.7 5.7 0 0 1-4.5 1c-2.2-.4-3 0-3.9 2.1-1.3 2.7-2.5 3.2-4.8 1.7-2-1.3 1.6-5.8 5.2-6.6 1.6-.4 3.9-1.8 5-3.2 1.2-1.4 4.5-3.5 7.3-4.8 2.8-1.3 5.5-2.8 5.9-3.5 1.4-2.2 3.3-11 2.5-11-2.6 0-5.9 2.5-5.7 4.3.1 1.1-.4 2.2-1 2.4-.7.3-1.3-.2-1.3-1.1 0-2.1-1.6-2.1-2.4 0-.5 1.3-.9 1.3-3.1-.3-1.3-1-2.5-2.1-2.5-2.5 0-.4 3-3.2 6.6-6.2 6.2-5.3 6.8-5.6 12-5.6 4.7 0 5.4-.3 5.4-2C89 2.8 80.6.7 65.5.4a93 93 0 0 0-16.5.7z"></path></svg>
                        <p style="color: black;">Livraison Autres Villes 24-72h</p>
                    </div>
                </div>
                <div class="recherche_ville">
                        <div class="recherche">
                            <div class="cercle"></div>
                            <div class="tige"></div>
                        </div>
                        <input type="text" name="" id="" placeholder="taper votre zone de livraison : quartie au commaute">
                    </div>
                    <div class="guide">
                        <p style="color: black;">Veuillez cliquer sur le bouton de paiement pour poursuivre.</p>
                    </div>
                    <form action="checkout.php" class="payer">
                    <input type="submit" value="Payer">
                </form>
                </div>
                <div class="secure">
                    <svg focusable="false"  viewBox="0 0 12 15" role="presentation">
                        <g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                        <path d="M6 1C4.32 1 3 2.375 3 4.125V6h6V4.125C9 2.375 7.68 1 6 1zM1 6h10v8H1z"></path>
                        </g>
                    </svg>
                    <p style="color: black;">Paiements 100% sécurisés</p>
                </div>
            </div>
        </div>
       </div>
        <div class="div2">
            <div>
                <div class='vide_svg'>
                    <svg focusable='false' viewBox='0 0 27 24' role='presentation'>
                        <g transform='translate(0 1)' stroke-width='1' stroke='currentColor' fill='none' fill-rule='evenodd'>
                            <circle stroke-linecap='square' cx='11' cy='20' r='2'></circle>
                            <circle stroke-linecap='square' cx='22' cy='20' r='2'></circle>
                            <path d='M7.31 5h18.27l-1.44 10H9.78L6.22 0H0'></path>
                        </g>
                    </svg>
                </div>
            </div>
            <h3 style="color:orange">votre panier est vide </h3>
            <p style="color: black;">Encore 500.00 DH pour bénéficier des frais de port gratuits !</p>
            <form action="collection.php?type=all" method="post">
                <input class="vide_decouvrir" type="submit" value="Decouvrir nos produits">
            </form>
        </div>
        <div class="div3">
        <section class="section2">
        <div class="slide-container2 swiper">
        <h1>Vu Récemment</h1>
        <div class="slide-content ">
            <div class="card-wrapper swiper-wrapper">
                <?php  
                $selectionn=$database->prepare("select * from produuit");
                $selectionn->execute();
                $LesProduits=$selectionn->fetchAll();
                foreach($LesProduits as $produit){
                  echo "<div class='card2 swiper-slide'>
                    <div class='image-content2'>
                        <a href=''><img class='image-entete2' src='./images-mymarket/".$produit["src"]."'></a>
                    </div>
                    <div class='card-content2'>
                        <h2 class='prix'>".number_format($produit["prix"],2, '.', ' ')." DH</h2>
                        <h5 style='margin-top:0px;'><s class='souligner'>".number_format($produit["prix_encienne"],2, '.', ' ')." DH  </s> </h5>
                        <p class='pp2'>".$produit['description']."</p>
                        <div style='display: flex;flex-direction: row;'>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                        </div>
                        <a href=''>".$produit["marque"]."</a>
                        <form action='collection.php?type=all'method='post' style='position:absolute;margin-top:62%;'>
                        <input type='hidden' name='id' value='".$produit["id"]."'>
                        <input type='hidden' name='marque' value='".$produit["marque"]."'>
                        <input type='hidden' name='description' value='".$produit["description"]."'>
                        <input type='hidden' name='prix' value='".$produit["prix"]."'>
                        <input type='hidden' name='src' value='".$produit["src"]."'>
                        <div class='div-button2' style=''><input class='button2' type='submit' name='submit' value='Ajouter au panier'></div>
                    </form>
                    </div>
                </div>";
                }
                ?>
            </div>
        <div class="btn-next swiper-button-next"></div>
        <div class=" btn-prev swiper-button-prev"></div>
    </div>
    </section>
        </div>
    </div>
    </main>
    <script src="mymarket.js"></script>
    <script src="card.js"></script>
    <script src="mymarket.js"></script>
    <script src="collection.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper=new Swiper(".slide-content",{
            slidesPerView:4,
            spaceBetween:10,
            slidesPerGroup:1,
            loop:true,
            loopFillGroupWithBlank:true,
            pagination:{
            el:".swiper-pagination",
            clickable:true,
            },
            autoplay:{
                dilay:3000,
            },
            navigation:{
            nextEl:".swiper-button-next",
            prevEl:".swiper-button-prev"
            }
        });
    </script>
</body>
</html>