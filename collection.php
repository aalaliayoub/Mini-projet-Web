<?php
session_start();
$database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
$type=$_GET["type"];
$select=$database->prepare("select * from ajouter_panier where client_id=?");
$select->execute(array(session_id()));
$resultat=$select->fetchAll();
$int=0;
foreach($resultat as $res){
    $int++;
}
if(isset($_POST["submit_minus"])||isset($_POST["submit_plus"])){
    $int--;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link sizes="64x64" href="./images-mymarket/icon-removebg-preview.png" rel="shortcut icon " type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="mymarket.css" rel="stylesheet">
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
body {
    font-family: 'Poppins';font-size: 15px;
}
</style>
    <title>Produits</title>
</head>
<body class="body1">
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
                <span class="input-group-addon" style="float:right;">
                    <div class="searsh-cercle"></div>
                    <div class="searsh-bar"></div>
                </span>
            </div>
            <div>
                <label for="langue" class="label">Langue</label><br>
                <select name="langue" id="Langue" style="border: none;font-size:large;font-weight: bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;width: 100px;color: rgb(26, 101, 187);">
                    <option value="arabic" style="font-weight: bold;"> Arabic</option>
                    <option value="english" style="font-weight: bold;"> English</option>
                    <option value="frinsh" style="font-weight: bold;"> frinsh</option>
                </select>
            </div>
            <div>
                <hr class="hor1">
            </div>
            <div style="text-align: center;">
                <span class="con-ins">Connexion / inscription</span><br>
                <a class="mon-compte" href="connexion.php" target="_blank">Mon Compte</a>
            </div>
            <div>
                <hr class="hor1">
            </div>
            <label style="display: flex;flex-direction: row;height:20px;">
                <input type="checkbox"  id="chekpanier" style="display: none;">
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
                <div class="num_product_ajouter"><?=$int?></div>
                <span class="panier">Panier</span>
            </label>
        </div>
        <?php
            $total=0;
            $j=0;
            echo "<div class='panier2' >
            <h3>Encore 500.00 DH pour bénéficier des frais de port gratuits !</h3>
            <div class='panier_div1'>";
                $selection=$database->prepare("select * from ajouter_panier inner join produuit on ajouter_panier.produit_id = produuit.id  where client_id=?");
                $selection->execute(array(session_id()));
                $products=$selection->fetchAll();
                if(count($products)!=0 && !isset($_POST["submit"])){
                    foreach($products as $product){
                        $total=$total+$product["prix"]*$product["quantite"];
                        $j++;
                        if($j==1){
                            echo "<style>
                            .panier2{
                                margin-bottom: -298.5px; 
                            }
                            </style>";
                        }
                        else if($j==2){
                            echo "<style>
                        .panier2{
                            margin-bottom:-426.5px;
                            
                        }
                        </style>";
                        }
                        else{
                            echo "<style>
                            .panier2{
                                margin-bottom:-430.2px;
                            }
                            </style>";
                        }
                        echo "<div class='panier-container'>
                            <div>
                                <img src='./images-mymarket/".$product["src"]."'>
                            </div>
                            <div style='margin-left:-50px;'>
                                <a class='marque' href=''>".$product["marque"]."</a>
                                <p class='description1'style='margin-top: -5px;width:190px;'>".$product["description"]."</p>
                                <p class='prix1'style='margin: -5px 0 0 -5px;'>".number_format($product["prix"],2, '.', ' ')." DH</p>
                            </div>
                            <div>
                            <div >
                                <form action='mymarket.php' method='post'>
                                    <input type='hidden' name='id1' value='".$product["id"]."'>
                                    <input type='number'class='div-in'  name='quantity' id='quantite'value='".$product["quantite"]."'>
                                    <input class='minus' type='submit' name='submit_minus' value='-'>
                                    <input class='plus' type='submit' name='submit_plus' value='+'>
                                </form>
                                    <div class='suprimer'>
                                        <form action='collection.php?type=$type' method='post'>
                                            <input type='hidden' name='id1' value='".$product["id"]."'>
                                            <input type='hidden' class='div-in'  name='quantity' id='quantite'value='1'>
                                            <input class='supprission' type='submit' name='submit_minus' value='Suprimer'>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr width='100%' class='hr'>";
                    }
                    echo " </div>
                    <div class='total_total'>
                        <p class='description'>Total</p>
                        <p class='description' >$total Dh MAD</p>
                    </div>
                    <form action='card.php' method='post' class='form1'>
                    <div><input type='submit' value='Panier'></div>
                    </form></div>";
                    $rest=500-$total;
                    if($total>500){
                        echo "<script>
                        const motivation=document.querySelector('.motivi');
                        motivation.textContent='Vous bénéficiez des frais de port gratuits !';
                        </script>";
                    }
                    else{
                        echo "<script>
                        const motivation=document.querySelector('.motivi');
                        motivation.textContent='Encore $rest dh pour bénéficier des frais de port gratuits !';
                        </script>";
                    }
                }
                else{
                    echo "
                    <center>
                        <div class='panier-vide'>
                            <div class='svgg'>
                                <svg focusable='false' viewBox='0 0 27 24' role='presentation'>
                                    <g transform='translate(0 1)' stroke-width='1' stroke='currentColor' fill='none' fill-rule='evenodd'>
                                        <circle stroke-linecap='square' cx='11' cy='20' r='2'></circle>
                                        <circle stroke-linecap='square' cx='22' cy='20' r='2'></circle>
                                        <path d='M7.31 5h18.27l-1.44 10H9.78L6.22 0H0'></path>
                                    </g>
                                </svg>
                            </div>
                            <p>votre panier est vide </p>
                        </div>
                        <form action='' method='post' class='form1'>
                            <div><input type='submit' value='Decouvrir nos produits'></div>
                        </form>
                    <center>
                </div>
            </div>";
        }
        ?>
        <?php
            $i=0;
            $total=0;
            if(isset($_POST["submit"])){
                $id=$_POST['id'];
                $marq=$_POST["marque"];
                $description=$_POST["description"];
                $price=$_POST["prix"];
                $src=$_POST["src"];
                $selecid=$database->prepare("select produit_id from ajouter_panier where client_id=?");
                $selecid->execute(array(session_id()));
                $ids = $selecid->fetchAll(PDO::FETCH_COLUMN);
                if(!in_array($id, $ids)){
                    $insertion=$database->prepare("INSERT INTO ajouter_panier values(?,?,?)");
                    $insertion->execute(array($id,session_id(),1));
                }
                echo"<div class='panier1'>
                <h3 class='motivi'>Encore 500 dh pour bénéficier des frais de port gratuits !</h3>
                <div class='panier_div1'>";
                    $selection=$database->prepare("select * from ajouter_panier inner join produuit on ajouter_panier.produit_id = produuit.id  where client_id=?");
                    $selection->execute(array(session_id()));
                    $LesProduits=$selection->fetchAll();
                        foreach($LesProduits as $product){
                            $i++;
                            $total=$total+$product["prix"]*$product["quantite"];
                            echo "<div class='panier-container'>
                                <div>
                                    <img src='./images-mymarket/".$product["src"]."'>
                                </div>
                                <div style='margin-left:-50px;'>
                                    <a class='marque' href=''>".$product["marque"]."</a>
                                    <p class='description1'style='margin-top: -5px;width:190px;'>".$product["description"]."</p>
                                    <p class='prix1'style='margin: -5px 0 0 -5px;'>".number_format($product["prix"],2, '.', ' ')." DH</p>
                                </div>
                                 <div>
                                    <div >
                                        <form action='collection.php?type=$type'' method='post'>
                                            <input type='hidden' name='id1' value='".$product["id"]."'>
                                            <input type='number'class='div-in'  name='quantity' id='quantite'value='".$product["quantite"]."'>
                                            <input class='minus' type='submit' name='submit_minus' value='-'>
                                            <input class='plus' type='submit' name='submit_plus' value='+'>
                                        </form>
                                        <div class='suprimer'>
                                            <form action='collection.php?type=$type'' method='post'>
                                                <input type='hidden' name='id1' value='".$product["id"]."'>
                                                <input type='hidden' class='div-in'  name='quantity' id='quantite'value='1'>
                                                <input class='supprission' type='submit' name='submit_minus' value='Supprimer'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr width='100%' class='hr'>";
                        }
                        echo " </div>
                        <div class='total_total'>
                            <p class='description'>Total</p>
                            <p class='description' >$total Dh MAD</p>
                        </div>
                        <form action='card.php' method='post' class='form1'>
                        <div><input type='submit' value='Panier'></div>
                    </form></div>";
                    echo "<script>
                const numberProduit=document.querySelector('.num_product_ajouter');
                const quantite=document.querySelector('#quantite');
                numberProduit.textContent=$i;
            </script>";
            $rest=500-$total;
        if($total>500){
            echo "<script>
            const motivation=document.querySelector('.motivi');
            motivation.textContent='Vous bénéficiez des frais de port gratuits !';
        </script>";
        }
        else{
            echo "<script>
            const motivation=document.querySelector('.motivi');
            motivation.textContent='Encore $rest dh pour bénéficier des frais de port gratuits !';
        </script>";
        }
        echo  "<script> const number_product=document.querySelector('.num_product_ajouter')
                            const numb=parseFloat(number_product.innerText);
                             const pan=document.querySelector('.panier1');
                    if(numb==2){
                       
                        pan.style.marginBottom=-426.5+'px';
                    }
                    else if(numb>2){
                       pan.style.marginBottom=-430.3+'px';
                    }
            
            </script>";
            }
?>
<?php
 $i=0;
 $total=0;
    if(isset($_POST["submit_minus"])||isset($_POST["submit_plus"])){
        $quantity=$_POST["quantity"];
        $quantity=intval($quantity);
        $id=$_POST["id1"];
        if(isset($_POST["submit_minus"])){
            $quantity=$quantity-1;
        }
        if(isset($_POST["submit_plus"])){
            $quantity=$quantity+1;
        }
        $update=$database->prepare("UPDATE ajouter_panier SET quantite=? where produit_id=?");
        $update->execute(array($quantity,$id));
        $delete=$database->prepare("DELETE FROM ajouter_panier where quantite=0");
        $delete->execute();
            echo"<div class='panier1'>
            <h3 class='motivi'>Encore 500.00 DH pour bénéficier des frais de port gratuits !</h3>
            <div class='panier_div1'>";
                $selectionall=$database->prepare("select * from ajouter_panier inner join produuit on ajouter_panier.produit_id = produuit.id  where client_id=?");
                $selectionall->execute(array(session_id()));
                $LesProduits=$selectionall->fetchAll();
                    foreach($LesProduits as $product){
                        $i++;
                        $total=$total+$product["prix"]*$product["quantite"];
                        echo "<div class='panier-container'>
                            <div>
                                <img src='./images-mymarket/".$product["src"]."'>
                            </div>
                            <div style='margin-left: -50px;'>
                                <a class='marque' href=''>".$product["marque"]."</a>
                                <p class='description1'style='margin-top: -5px;width:200px;'>".$product["description"]."</p>
                                <p class='prix1'style='margin: -5px 0 0 -5px;'>".number_format($product["prix"],2, '.', ' ')." DH</p>
                            </div>
                            <div>
                                <form action='collection.php?type=$type' method='post'>
                                    <input type='hidden' name='id1' value='".$product["id"]."'>
                                    <input type='number' class='div-in'  name='quantity' id='quantite'value='".$product["quantite"]."'>
                                    <input class='minus' type='submit' name='submit_minus' value='-'>
                                    <input class='plus' type='submit' name='submit_plus' value='+'>
                                </form>
                                <div class='suprimer'>
                                    <form action='collection.php?type=$type' method='post'>
                                        <input type='hidden' name='id1' value='".$product["id"]."'>
                                        <input type='hidden' class='div-in'  name='quantity' id='quantite'value='1'>
                                        <input class='supprission' type='submit' name='submit_minus' value='Suprimer'>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr width='100%' class='hr'>";
                    }
                    if(empty($LesProduits)){
                        echo"
                        <center>
                        <div class='panier-vide'>
                        <div class='svgg'>
                        <svg focusable='false' viewBox='0 0 27 24' role='presentation'>
                            <g transform='translate(0 1)' stroke-width='1' stroke='currentColor' fill='none' fill-rule='evenodd'>
                              <circle stroke-linecap='square' cx='11' cy='20' r='2'></circle>
                              <circle stroke-linecap='square' cx='22' cy='20' r='2'></circle>
                              <path d='M7.31 5h18.27l-1.44 10H9.78L6.22 0H0'></path>
                            </g>
                          </svg>
                        </div>
                            <p>votre panier est vide </p>
                        </div>
                        <form action='' method='post' class='form1'>
                        <div><input type='submit' value='Decouvrir nos produits'></div>
                        </form>
                        <center>
                        </div></div>
                        <script>
            const motivation=document.querySelector('.motivi');
            motivation.textContent='Encore 500.00 dh pour bénéficier des frais de port gratuits !';
        </script>";
                    }
                    else{
                        echo "</div>
                    <div class='total_total'>
                        <p class='description'>Total</p>
                        <p class='description' >$total DH MAD</p>
                    </div>
                    <form action='card.php' method='post' class='form1'>
                        <div><input type='submit' value='Panier'></div>
                    </form></div>";
                    }
        $rest=500-$total;
        if($total>500){
            echo "<script>
            const motivation=document.querySelector('.motivi');
            motivation.textContent='Vous bénéficiez des frais de port gratuits !';
        </script>";
        }
        else{
            echo "<script>
            const motivation=document.querySelector('.motivi');
            motivation.textContent='Encore $rest dh pour bénéficier des frais de port gratuits !';
        </script>";
        }
        echo  "<script> const number_product=document.querySelector('.num_product_ajouter')
        const numb=parseFloat(number_product.innerText);
         const pan=document.querySelector('.panier1');
if(numb==2){
   
    pan.style.marginBottom=-426.5+'px';
}
else if(numb>2){
   pan.style.marginBottom=-430.3+'px';
}
if(numb==0){
pan.style.marginBottom=-311.9+'px';
}
</script>";
    }
?>
<header >
        <div class="menu-principale" id="menu-principale1" style="margin:50px 0 0 0;">
            <div class="menu-container">
                <a href="">Nouveaute</a>
                <a href="">Promo</a>
                <a href="">Bio</a>
                <a href="">Gluten Free</a>
                <a class="a1" href="">Alimentation<b style="margin-left:80px;"> <svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="">Bebe<b style="margin-left:130px;"> <svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a></li>
                <a class="a1" href="">Hygiene et Beaute<b style="margin-left:50px;"> <svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="">Entetienet Maison<b style="margin-left:50px;"> <svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="">Animaux<b style="margin-left:104px;"> <svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a></li>
                <a>Electromenagers</a>
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
                            <h3>Panier Ramadan</h3>
                        </a>
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
                        <a href=""> Biscuits Apéritifs, chips</a>
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
                        <a href=""> Épilation</a>
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
                            <img src="./images-mymarket/submenu13.webp" alt="" style="width:190px;height:100px">
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
<div class="acceuil">
            <div style="margin-left: 20px;"><a href="mymarket.php">Acceuil</a></div>
            <div style="padding-top: 15px;">
                <svg  focusable="false" class="icon-menu1" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="1" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></div>
            <div ><a href="">lien actuelle</a></div>
        </div>
<div class="allcollection">
    <div class="diiv">
    <div class="rayonss">
            <h1>Rayons</h1>
            <a href="">Nouveaute</a>
            <a href="">Promo</a>
            <a href="">Bio</a>
            <a href="">Gluten Free</a>
            <div>
                <label>
                    <input type="checkbox" id="input8" style="display:none;">
                    <div style="display:flex;flex-direction:row;"><a class="alimontation"> Alimentation</a>
                        <div class="fiip">
                        <svg  focusable="false" class="icon-menu_8" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                        </div>
                    </div>
                    <label class="alimo1">
                        <input type="checkbox" id="input8-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;"><a>Marché et Boucherie</a>
                            <div class="fii">
                            <svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                            </div>
                        </div>
                        <div class="marche">
                            <a href="">Légumes</a>
                            <a href="">Fruits</a>
                            <a href="">Poissons et Crustacés</a>
                            <a href="">Boucherie - Volaille</a>
                            <a href="">Fruits de Saison, Panier de fruits</a>
                            <a href="">Légumes de saison, Panier de légumes</a>
                            <a href="">Fruits secs</a>
                        </div>
                        </lebel>
                        <label class="alimo1">
                            <input type="checkbox" id="input8-1" style="display: none;">
                            <div style="display:flex;flex-direction:row;"><a style="margin-left: -10px;">Crèmerie</a>
                                <div class="fii">
                                <svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                                </div>
                            </div>
                            <div class="marche" style="margin-left: -10px;">
                                <a href="">Lait et boisson lactée</a>
                                <a href="">oeufs</a>
                                <a href="">Yaourts</a>
                                <a href="">Beurres, margarines et sauces a cuisiner</a>
                                <a href="">Fromages</a>
                                <a href="">Produits Laitiers BIO</a>
                            </div>
                            </lebel>
                            <label class="alimo1">
                                <input type="checkbox" id="input8-1" style="display: none;">
                                <div style="display:flex;flex-direction:row;"><a style="margin-left:-30px;">Épicerie sucrée</a>
                                    <div class="fii">
                                    <svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                                    </div>
                                </div>
                                <div class="marche" style="margin-left: -25px;">
                                    <a href="">Chocolat</a>
                                    <a href="">Biscuits, confiseries</a>
                                    <a href="">Aide à la pâtisserie</a>
                                    <a href="">Farines, Sucres</a>
                                    <a href="">Sans Gluten</a>
                                </div>
                                </lebel>
                                <label class="alimo1">
                                    <input type="checkbox" id="input8-1" style="display: none;">
                                    <div style="display:flex;flex-direction:row;"><a style="margin-left: -50px;">Épicerie salée </a>
                                        <div class="fii">
                                        <svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                                        </div>
                                    </div>
                                    <div class="marche" style="margin-left: -45px;">
                                        <a href="">Soupe</a>
                                        <a href="">Sauces chaudes</a>
                                        <a href="">Condiments et sauces</a>
                                        <a href="">Pâtes</a>
                                        <a href="">Riz</a>
                                        <a href="">Semoule</a>
                                        <a href="">Purée</a>
                                        <a href="">Huiles et vinaigres</a>
                                        <a href="">Conserves</a>
                                        <a href="">Épices</a>
                                        <a href="">Bouillons</a>
                                        <a href="">Biscuits Apéritifs, chips</a>
                                        <a href="">Produits du Monde</a>
                                    </div>
                                    </lebel>
                                    <label class="alimo1">
                                        <input type="checkbox" id="input8-1" style="display: none;">
                                        <div style="display:flex;flex-direction:row;"><a style="margin-left: -70px;">Petit Déjeuner</a>
                                            <div class="fii">
                                                <svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                                        </div>
                                        <div class="marche" style="margin-left: -65px;">
                                            <a href="">Céréales, barres en céréales</a>
                                            <a href="">Café, chicorée</a>
                                            <a href="">Chocolat en poudre</a>
                                            <a href="">Thés, infusions</a>
                                            <a href="">Confitures, pâtes à tartiner, miel</a>
                                            <a href="">Tartines, biscuits</a>
                                            <a href="">Laits en poudre</a>
                                            <a href="">Petit Dej BIO & Sans Gluten</a>
                                        </div>
                                        </lebel>
                                        <label class="alimo1" style="margin-left: -80px;">
                                            <input type="checkbox" id="input8-1" style="display: none;">
                                            <div style="display:flex;flex-direction:row;"><a>Pains et Pâtisserie </a>
                                                <div class="fii"><svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                                            </div>
                                            <div class="marche">
                                                <a href="">Pains</a>
                                                <a href="">Viennoiseries</a>
                                                <a href="">Petits Fours</a>
                                            </div>
                                            </lebel>
                                            <label class="alimo1" style="margin-left:0px;">
                                                <input type="checkbox" id="input8-1" style="display: none;">
                                                <div style="display:flex;flex-direction:row;"><a>Boissons</a>
                                                    <div class="fii">
                                                    <svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                                                    </div>
                                                </div>
                                                <div class="marche">
                                                    <a href="">Eaux plates</a>
                                                    <a href="">Eaux gazeuses</a>
                                                    <a href="">Eaux Aromatisées</a>
                                                    <a href="">Jus de fruits, Nectar</a>
                                                    <a href="">Sodas boissons gazeuses</a>
                                                    <a href="">Sirops, cocktails</a>
                                                    <a href="">Thés Glacés</a>
                                                    <a href="">Boissons énergisantes</a>
                                                    <a href="">Boissons sans alcools</a>
                                                </div>
                                                </lebel>
                                                <label class="alimo1" style="margin-left:0px;">
                                                    <input type="checkbox" id="input8-1" style="display: none;">
                                                    <div style="display:flex;flex-direction:row;"><a>Surgelés </a>
                                                        <div class="fii">
                                                        <svg  focusable="false" class="icon-menu" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                                                        </div>
                                                    </div>
                                                    <div class="marche">
                                                        <a href="">Apéritifs, entrées et snacking</a>
                                                        <a href="">Pizzas, Pâte, tartes et plats cuisinés</a>
                                                        <a href="">Viandes, poissons et crustacés</a>
                                                        <a href="">Jus de fruits, Nectar</a>
                                                    </div>
                                                    </lebel>
                                                    <a href="">Porc</a>
                                                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" id="input9" style="display:none;">
                    <div style="display:flex;flex-direction:row;"><a class="bebe">Bebe</a>
                        <div class="fiip">
                            <svg  focusable="false" class="icon-menu_9" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                    </div>
                    <label class="bebe1">
                        <input type="checkbox" id="input9-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;"><a>Laits bébé </a>
                            <div class="fii">
                            <svg  focusable="false" class="icon-menu9" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                            </div>
                        </div>
                        <div class="bebe2">
                            <a href="">1er Age
                            <a href="">2ème Age</a>
                            <a href="">Croissance</a>
                        </div>
                        </lebel>
                        <label class="bebe1">
                        <input type="checkbox" id="input9-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-20px;"><a>Alimentation bébé</a>
                            <div class="fii">
                            <svg  focusable="false" class="icon-menu9" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                            </div>
                        </div>
                        <div class="bebe2" style="margin-left: -5px;">
                            <a href="">Compotes, repas</a>
                            <a href="">Alimentation bébé BIO</a>
                            <a href="">Alimentation bébé Sans Gluten</a>
                            <a href="">Eaux adaptées, Jus</a>
                            <a href="">Farines et céréales</a>
                        </div>
                        </lebel>
                        <label class="bebe1">
                        <input type="checkbox" id="input9-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-35px;"><a>Hygiène, soins </a>
                            <div class="fii">
                            <svg  focusable="false" class="icon-menu9" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                            </div>
                        </div>
                        <div class="bebe2" style="margin-left: -20px;">
                            <a href="">Couches bébé</a>
                            <a href="">lingettes bébé</a>
                            <a href="">Soins</a>
                        </div>
                        </lebel>
                    </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" id="input10" style="display:none;">
                    <div style="display:flex;flex-direction:row;"><a class="hygiene_beaute">Hygiène et Beauté </a>
                        <div class="fiip"><svg  focusable="false" class="icon-menu_10" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                    </div>
                    <label class="hygiene1">
                        <input type="checkbox" id="input10-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;"><a>Pour Lui </a>
                            <div class="fii"><svg  focusable="false" class="icon-menu10" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                        </div>
                        <div class="hygiene2">
                            <a href="">Shampoings et soins</a>
                            <a href="">Rasage, Soins hommes</a>
                            <a href="">Dentaire</a>
                            <a href="">Douche, bain, savon</a>
                            <a href="">Déodorants et aux de toilettes</a>
                        </div>
                        </lebel>
                        <label class="hygiene1">
                        <input type="checkbox" id="input10-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:0px;"><a>Pour Elle</a>
                            <div class="fii"><svg  focusable="false" class="icon-menu10" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                        </div>
                        <div class="hygiene2" style="margin-left: 15px;">
                            <a href="">Douche, bain, savon</a>
                            <a href="">Déodorants</a>
                            <a href="">Soins du visages et corps</a>
                            <a href="">Hygiène intime</a>
                            <a href="">Shampoings et soins</a>
                            <a href="">Épilation</a>
                            <a href="">Dentaire</a>
                        </div>
                        </lebel>
                        <label class="hygiene1">
                        <input type="checkbox" id="input10-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-20px;"><a>Pour enfants</a>
                            <div class="fii"><svg  focusable="false" class="icon-menu10" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                        </div>
                        <div class="hygiene2" style="margin-left: -10px;">
                            <a href="">Shampooings</a>
                            <a href="">Dentaire</a>
                            <a href="">Gels douche</a>
                        </div>
                        </lebel>
                        <label class="hygiene1">
                        <input type="checkbox" id="input10-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-35px;"><a>Pour Senior </a>
                            <div class="fii"><svg  focusable="false" class="icon-menu10" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                        </div>
                        <div class="hygiene2" style="margin-left: -20px;">
                            <a href="">Couches Adultes</a>
                        </div>
                        </lebel>
                    </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" id="input11" style="display:none;">
                    <div style="display:flex;flex-direction:row;"><a class="maison">Entretien et Maison </a>
                        <div class="fiip"><svg  focusable="false" class="icon-menu_11" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                    </div>
                    <label class="maison1">
                        <input type="checkbox" id="input11-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;"><a>Entretien de la maison </a>
                            <div class="fii"><svg  focusable="false" class="icon-menu11" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg></div>
                        </div>
                        <div class="maison2">
                            <a href="">Produits écologiques , BIO</a>
                            <a href="">Insecticides</a>
                            <a href="">Meubles</a>
                            <a href="">WC</a>
                            <a href="">Vitres</a>
                            <a href="">Sols</a>
                            <a href="">Nettoyants multi-usages</a>
                        </div>
                        </lebel>
                        <label class="maison1">
                        <input type="checkbox" id="input11-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-20px;"><a>Cuisine</a>
                            <div class="fii">
                            <svg  focusable="false" class="icon-menu11" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                            </div>
                        </div>
                        <div class="maison2" style="margin-left: 15px;">
                            <a href="">Liquides vaisselle</a>
                            <a href="">Torchon et Abrasif</a>
                            <a href="">Lave-Vaisselle</a>
                            <a href="">Gants, éponges</a>
                            <a href="">Sacs poubelle</a>
                            <a href="">Essuies-tout</a>
                            <a href="">Conservation</a>
                            <a href="">Ustensiles, Vaisselles jetables</a>
                            <a href="">Bougies, Anniversaires</a>
                            <a href="">Produits écologiques BIO</a>
                            <a href="">Accessoires de Cuisine</a>
                            <a href="">Vitrocéramique, four, et métaux</a>
                        </div>
                        </lebel>
                        <label class="maison1">
                        <input type="checkbox" id="input11-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-40px;"><a>Soins du linge </a>
                            <div class="fii">
                                <svg  focusable="false" class="icon-menu11" viewBox="0 0 12 8" role="presentation">
                                <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="maison2" style="margin-left: -10px;">
                            <a href="">Lessives</a>
                            <a href="">Assouplissants</a>
                            <a href="">Aides au Lavage</a>
                            <a href="">Produits écologiques BIO</a>
                        </div>
                        </lebel>
                        <label class="maison1">
                        <input type="checkbox" id="input11-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-60px;"><a>Accessoires Maison </a>
                            <div class="fii">
                                <svg  focusable="false" class="icon-menu11" viewBox="0 0 12 8" role="presentation">
                                <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="maison2" style="margin-left: -20px;">
                            <a href="">Piles</a>
                            <a href="">Accessoire Electrique</a>
                        </div>
                        </lebel>
                        </lebel>
                        <label class="maison1">
                        <input type="checkbox" id="input11-1" style="display: none;">
                        <div style="display:flex;flex-direction:row;margin-left:-80px;"><a>Accessoire de feu </a>
                            <div class="fii">
                                <svg  focusable="false" class="icon-menu11" viewBox="0 0 12 8" role="presentation">
                                <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="maison2" style="margin-left: -20px;">
                            <a href="">Cheminée et Barbecue</a>
                        </div>
                        </lebel>
                        <a href="" style="margin-left: -70px;">Entretien chaussures</a>
                    </label>
            </div>
            <div>
                <label >
                    <input type="checkbox" id="input12" style="display: none;">
                    <div style="display:flex;flex-direction:row;">
                        <a class="animaux">Animaux</a>
                        <div class="fiip">
                        <svg  focusable="false" class="icon-menu_12" viewBox="0 0 12 8" role="presentation">
                        <path stroke="currentColor" stroke-width="3" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                        </svg>
                        </div>
                    </div>
                    <div class="animal">
                        <a href="">Chiens</a>
                        <a href="">Chats</a>
                    </div>
                </label>
            </div>
            <a href="">Electroménagers</a>
        </div>
        <div class='filtre'>
            <h3 style="color:orange">Filtre</h3>
            <label>
                <input type="checkbox"  id="input13" style="display: none;">
                <div style='color:orange;display:flex;'>
                    <h3 style="margin-top: -5px;">Prix</h3>
                    <svg  focusable="false" class="icon" viewBox="0 0 12 8" role="presentation">
                    <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                    </svg>
                </div>
            </label>
            <div class="min-max">
                <div class="slider">
                    <div class="progress"></div>
                </div>
                <div class="range-input">
                    <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                    <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                </div>
                <div class="price-input">
                    <div class="field">
                        <input type="number" class="input-min" value="2500">
                    </div>
                    <div class="separator">-</div>
                    <div class="field">
                        <input type="number" class="input-max" value="7500">
                    </div>
                </div>
            </div>
            <?php 
                $select=$database->prepare("SELECT marque FROM produuit");
                $select->execute();
                $marques=$select->fetchAll();
                if(count($marques)>0){
                    echo"<div class='marquess'>
                        <label>
                            <input type='checkbox' id='input14'style='display:none;'>
                            <div style='display:flex;'>
                                <h3>Marque</h3>
                                <svg  focusable='false' class='icon2' viewBox='0 0 12 8' role='presentation'>
                                <path stroke='currentColor' stroke-width='2' d='M10 2L6 6 2 2' fill='none' stroke-linecap='square'></path>
                                </svg>
                            </div>
                            </label>
                            <div class=marques>";
                        foreach($marques as $marque){
                            echo"<div class='in'><input type='checkbox' id='in1' value='bio'><p>".$marque[0]."</p></div>";
                        }
                    echo "</div>
                    </div>";
                }
            ?>
            
        </div>
    </div>
<div class="section-collection">
<div class="c11">
           <div>
            <h1>Tous les produits</h1>
            <div class="touts_les_produits">
                <div><p style="margin:2px 0 35px 0;width:150px;text-align:center">Affiche 1 - 48 de 6431 produits</p></div>
               <div>
                    <label for="select"> Afficher:</label>
                    <select name="select" id="select">
                        <option value="24">24 par page</option>
                        <option value="36">36 par page</option>
                        <option value="48" selected>48 par page</option>
                    </select>
               </div>
               <div>
                    <label for="date">trier par : </label>
                    <select name="select" id="date">
                        <option value="24">En vedette Meilleures ventes</option>
                        <option value="36">Alphabétique, de A à Z</option>
                        <option value="48">Alphabétique, de Z à A</option>
                        <option value="">Prix: faible à élevéPrix: élevé à faible</option>
                        <option value="" >Date, de la plus ancienne à la plus récente</option>
                        <option value="">Date, de la plus récente à la plus ancienne</option>
                    </select>
               </div>
                <div class="voire">
                    <div style="margin-left: 50px;"><p>voir</p></div>
                    <div class="dd" >
                        <div class="d1"></div>
                        <div class="d1"></div>
                        <div class="d1"></div>
                        <div class="d1"></div>
                        <div class="d1"></div>
                        <div class="d1"></div>
                        <div class="d1"></div>
                        <div class="d1"></div>
                        <div class="d1"></div>
                    </div>
                    <div class="ddd">
                        <div class="d11"></div>
                        <div class="d2"></div>
                        <div class="d11"></div>
                        <div class="d2"></div>
                        <div class="d11"></div>
                        <div class="d2"></div>
                    </div>
                </div>
            </div>
           </div>
        </div>
 <div class="produit_info">
    <?php
    $type=$_GET["type"];
    if($type=='all'){
        $selectionall= $database->prepare("select * from produuit ");
        $selectionall->execute();
        $selectionall=$selectionall->fetchAll();
    }
    else{
        $selectionall= $database->prepare("select * from produuit where type=?");
        $selectionall->execute(array($type));
        $selectionall=$selectionall->fetchAll();
    }
    foreach($selectionall as $select){
        echo " <div class='product'>
        <div><a href=''><img class='image-product'  src='./images-mymarket/".$select["src"]."'></a></div>
        <div class='produit_information'>
        <p class='prix' style='margin-left:0;' >".$select["prix"]." DH <s class='soul'>".$select["prix_encienne"]." DH </s></p>
        <a  href='' class='description_produit'>".$select["description"]."</a>
        <div style='display: flex; flex-direction: row;'>
            <div class='star-outline'>
                <div class='star-fill'></div>
            </div>
            <div class='star-outline'>
                <div class='star-fill'></div>
            </div>
            <div class='star-outline'>
                <div class='star-fill'></div>
            </div>
            <div class='star-outline'>
                <div class='star-fill'></div>
            </div>
            <div class='star-outline'>
                <div class='star-fill'></div>
            </div>
        </div>
        <a href=''class='marque_produit'>".$select["marque"]."</a>
        </div>
        <div class='bt_ns'>
            <form action='collection.php?type=".$_GET["type"]."'method='post'>
                <input type='hidden' name='id'id='id' value='".$select["id"]."'>
                <input type='hidden' name='marque' value='".$select["marque"]."'>
                <input type='hidden' name='description' value='".$select["description"]."'>
                <input type='hidden' name='prix' value='".$select["prix"]."'>
                <input type='hidden' name='src' value='".$select["src"]."'>
                <div class='div_button'><input class='b_tn1'  type='submit' name='submit' value='Ajouter au panier'></div>
                <div class='div_button' ><input class='b_tn2' type='button' value='aprecu rapide' id='aprecu'></div>
            </form>
        </div>
    </div>";
    }
    ?>
</div>
 </div>
 </div>
</div>
<div class="all">
        <div class="croixx">
            <div class="baton1"></div>
            <div class="baton2"></div>
        </div>
        <div class="all_produit">
            <div class="produit_image1">
                <div>
                    <img class="small_image" src="" alt="">
                </div>
                <div style="display:grid;grid-template-columns: 0.5fr 0.1fr;">
                    <div class="div_big_image"><img class="big_image" src="" alt=""></div>
                    <hr>
                </div>
                <div class="socail">
                    <p class="para"></p>
                    <div class="marque_media">
                        <div><p class="pr" style="margin-top: 0;" id="marr"></p></div>
                        <div class="media">
                            <div class='facebook1' style='padding-top:8px;width: 30px;height:23px;'><a href='' class='fa fa-facebook'></a></div>
                            <div class='twitter1' style='padding-top:8px;width: 30px;height:23px;'> <a href='#' class='fa fa-twitter'></a>  </div>
                            <div class='youtube1' style='padding-top:8px;width: 30px;height:23px;'> <a href='' class='fa fa-youtube'></a>  </div>
                            <div class='instagram1' style='padding-top:8px;width: 30px;height:23px;'> <a href='' class='fa fa-instagram'></a>  </div>
                        </div>
                    </div>
                    <hr>
                    <p>Price<span class="prix" id="taman"></span></p>
                    <div style="display: flex;">
                        <div><p style='margin:20px 0 0 18px;' class='pq'>Quantity : </p></div>
                        <div style='margin-left: 90px;'>
                            <input type='number'class='div-in'  name='quantity' id='nb'value='1' min='1'>
                            <button class='minus' id='-'>-</button>
                            <button class='plus' id='+'>+</button>
                        </div>
                    </div>
                    <form action="collection.php?type=all" method="post">
                        <div>
                            <input type='hidden' name='id' value='' id='hidden1'>
                            <input type='hidden' name='marque' value='' id='hidden2'>
                            <input type='hidden' name='description' value='' id='hidden3'>
                            <input type='hidden' name='prix' value='' id='hidden4'>
                            <input type='hidden' name='src' value='' id='hidden5'>
                            <input class="ajt" type="submit" name="submit" value="Ajouter au panier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- <div class='kolxi'>
    <center>
            <div class='quick'>
                <div > 
                  <a  href=''><img class='bgimage' src=''style='width: 100px;height: 70px;'></a>
                </div>
                <div class='image-prod'>
                    <img class='produit_image' src=''>
                </div>
                <hr style='margin-left:20px;margin-right:5px;border:0.5px solid rgba(10, 10, 10, 0.103);'>
                <div >
                    <div style='display: flex;flex-direction: row;justify-content: space-between;'>
                        <div><a href=''><h2 style='color:orange'class='descrip'>Kiwi Extra Yellow Import 1kg</h2></a></div>
                        <div class='croix'>
                            <div class='tig1'></div>
                            <div class='tig2'></div>
                        </div>
                    </div>
                    <div style='margin-left: 20px; display: flex;flex-direction: row;justify-content: space-between;'>
                        <div><a href='' class='pr'></a></div>
                        <div style='display: flex;flex-direction: row;margin-right: -40px;'>
                            <div class='facebook' style='padding-top:8px;width: 30px;height:23px;'><a href='' class='fa fa-facebook'></a></div>
                            <div class='twitter' style='padding-top:8px;width: 30px;height:23px;'> <a href='#' class='fa fa-twitter'></a>  </div>
                            <div class='youtube' style='padding-top:8px;width: 30px;height:23px;'> <a href='' class='fa fa-youtube'></a>  </div>
                            <div class='instagram' style='padding-top:8px;width: 30px;height:23px;'> <a href='' class='fa fa-instagram'></a>  </div>
                        </div>
                    </div>
                    <hr style='margin-top: 20px;border:0.3px solid rgba(10, 10, 10, 0.103);'>
                    <p style='margin-left: -297px;'class='pq'>Price <span class='pr'><input class='input_disabled' type='number' disabled value=''>DH</span></p>
                    <div  style='display:flex;flex-direction: row'>
                        <div><p style='margin:20px 0 0 18px;' class='pq'>Quantity : </p></div>
                        <div style='margin-left: 90px;'>
                            <input type='number'class='div-in'  name='quantity' id='nb'value='1' min='1'>
                            <button class='minus' id='moins'>-</button>
                            <button class='plus' id='+'>+</button>
                        </div>
                    </div>
                    <div>
                        <form action='collection.php' method='post'>
                            <div class='form1' style='height: 45px;'>
                                <input type='hidden' name='id' value='' id='hidden1'>
                                <input type='hidden' name='marque' value='' id='hidden2'>
                                <input type='hidden' name='description' value='' id='hidden3'>
                                <input type='hidden' name='prix' value='' id='hidden4'>
                                <input type='hidden' name='src' value='' id='hidden5'>
                                <input style="width: 90%;" type='submit' value='add to card'name='submit'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
</div> -->
    <section class="section2">
        <div class="slide-container2 swiper">
        <h1>Recently viewed</h1>
        <div class="slide-content">
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
                        <form action='collection.php'method='post' style='position:absolute;margin-top:62%;'>
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
        <div class="btn-next swiper-button-next" style="transform: translate(-0.5%,15px);width: 55px;height: 55px;border-radius: 50%;"></div>
        <div class=" btn-prev swiper-button-prev"></div>
    </div>
    </section>
    <footer>
        <div class="footer-container">
            <div class="f1">
                <h4 class="f-h4">NOTRE HISTOIRE</h4>
                <p>MyMarket.ma est un supermarché en ligne créer en 2016, qui livre vos courses gratuitement. Dans votre appli MyMarket ou le site, vous pouvez retrouver tous les produits présents en supermarché, avec nos nouveautés et promos.</p>
                <p>Aujourd'hui, avec plus de milliers de références, nous livrons plus de 120 villes et communes. Avec des centaines de milliers de clients et des expansions mensuelles vers de nouvelles villes.</p>
            </div>
            <div class="f1">
                <h4 class="f-h4">INFO</h4>
               <div> <a href="">Devenir Vendeur</a></div>
                <div><a href="">Conditions général de ventes CGV</a></div>
                <div><a href=""> NOS CONDITIONS DE LIVRAISONS</a></div>
                <div><a href="">Job</a></div>
                <div><a href=""> Mentions légales</a></div>
                <div><a href=""> Tipsy , Votre fidélité récompensée . - Découvrez notre programme</a></div>
                <div><a href="">Nos solutions pour les personnes prioritaires</a></div>
            </div>
            <div class="f1">
                <h4 class="f-h4">NEWS</h4>
                <p>En Avant Première les Top nouveautés & Promos !</p>
                <form action="">
                   <div class="f-input"><input class="input" type="email" name="" id="" placeholder="Enter your Email"></div>
                    <div class="f-botton"><input class="botton" type="submit" value="S'inscrire"></div>
                </form>
            </div>
        </div>
        <div class="cpy">
            <div>
                <p>© 2024 MyMarket.ma</p>
                <a href="">Commerce électronique propulsé par Shopify</a>
            </div>
            <div class="nossuivre">
                <p>Nos suivre</p>
                <div style="display: flex;flex-direction: row;">
                    <div class="facebook"><a href="#" class="fa fa-facebook "></a></div>
                    <div class="twitter"> <a href="#" class="fa fa-twitter "></a>  </div>
                    <div class="youtube"> <a href="#" class="fa fa-youtube "></a>  </div>
                    <div class="instagram"> <a href="#" class="fa fa-instagram "></a>  </div>
                </div>
            </div>
        </div>
    </footer>
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
    <script src="mymarket.js"></script>
    <script src="collection.js"></script>
</body>
</html>