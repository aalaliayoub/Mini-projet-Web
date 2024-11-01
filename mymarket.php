<?php 
session_start();
$database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
$sessionId = session_id();
$insertion=$database->prepare("INSERT IGNORE into client(id) VALUES(?)");
$insertion->execute(array($sessionId));
$select=$database->prepare("select * from ajouter_panier where client_id=?");
$select->execute(array(session_id()));
$resultat=$select->fetchAll();
$int=0;
foreach($resultat as $res){
    $int++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mymarket.ma</title>
    <link rel="stylesheet" href="mymarket.css">
    <link rel="stylesheet" href="test.css">
    <link rel="shortcut icon" href="./images-mymarket/panier.png" type="image/x-icon">
    <link  rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
body {
    font-family: 'Poppins';font-size: 15px;
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
                <label style="display: flex;flex-direction: row;">
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
                                <form action='mymarket.php' method='post'>
                                    <input type='hidden' name='id1' value='".$product["id"]."'>
                                    <input type='number'class='div-in'  name='quantity' id='quantite'value='".$product["quantite"]."'>
                                    <input class='minus' type='submit' name='submit_minus' value='-'>
                                    <input class='plus' type='submit' name='submit_plus' value='+'>
                                </form>
                                    <div class='suprimer'>
                                        <form action='mymarket.php' method='post'>
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
                    echo "
                    
                     </div>
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
                    <style>
                        .panier2{
                            margin-bottom: -311.9px;
                        }
                    </style>
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
        if(true){
            $id=$_POST['id'];
            $marq=$_POST["marque"];
            $description=$_POST["description"];
            $price=$_POST["prix"];
            $src=$_POST["src"];
            $selecid=$database->prepare("select produit_id from ajouter_panier where client_id=?");
            $selecid->execute(array(session_id()));
            $ids = $selecid->fetchAll(PDO::FETCH_COLUMN);;
            if(!in_array($id, $ids)){
                $insertion=$database->prepare("INSERT INTO ajouter_panier values(?,?,?)");
                $insertion->execute(array($id,$sessionId,1));
            }
            else{
                $update=$database->prepare("UPDATE ajouter_panier SET quantite=quantite+1 where produit_id=?");
                $update->execute(array($id));
            }
            echo"<div class='panier1'>
            <h3 class='motivi'>Encore 500 dh pour bénéficier des frais de port gratuits !</h3>
            <div class='panier_div1'>";
            $selection=$database->prepare("select * from ajouter_panier inner join produuit on ajouter_panier.produit_id = produuit.id  where client_id=?");
            $selection->execute(array($sessionId));
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
                        <form action='mymarket.php' method='post'>
                            <input type='hidden' name='id1' value='".$product["id"]."'>
                            <input type='number'class='div-in'  name='quantity' id='quantite'value='".$product["quantite"]."'>
                            <input class='minus' type='submit' name='submit_minus' value='-'>
                            <input class='plus' type='submit' name='submit_plus' value='+'>
                        </form>
                            <div class='suprimer'>
                                <form action='mymarket.php' method='post'>
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
            echo "<script>
            const numberProduit=document.querySelector('.num_product_ajouter');
            const quantite=document.querySelector('#quantite');
            numberProduit.textContent=$i;
            </script>";
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
            header("location:connection.php");
        }
    }
?>
<?php
 $i=0;
 $total=0;
    if(isset($_POST["submit_minus"])||isset($_POST["submit_plus"])){
        // $id_client=$_SESSION["client_id"];
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
                    $selectionall->execute(array($sessionId));
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
                                <form action='mymarket.php' method='post'>
                                    <input type='hidden' name='id1' value='".$product["id"]."'>
                                    <input type='number' class='div-in'  name='quantity' id='quantite'value='".$product["quantite"]."'>
                                    <input class='minus' type='submit' name='submit_minus' value='-'>
                                    <input class='plus' type='submit' name='submit_plus' value='+'>
                                </form>
                                <div class='suprimer'>
                                    <form action='mymarket.php' method='post'>
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
                        <form action='mymarket.php' method='post' class='form1'>
                            <div><input type='submit' value='Decouvrir nos produits'></div>
                        </form>
                        <center>
                        </div>
                        </div>  
                        <script>
                        const motivation=document.querySelector('.motivi');
                        motivation.textContent='Encore 500.00 dh pour bénéficier des frais de port gratuits !';
                        </script>
                    ";
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
                echo "<script>
            const numberProduit=document.querySelector('.num_product_ajouter');
            const quantite=document.querySelector('#quantite');
            numberProduit.textContent=$i;
        </script>";
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
?>
    <header>
        <div class="menu-principale" style="margin:50px 0 0 0;">
            <div class="menu-container">
                <a href="collection.php?type=all">Nouveaute</a>
                <a href="collection.php?type=all">Promo</a>
                <a href="collection.php?type=bio">Bio</a>
                <a href="collection.php?type=Glutenfree">Gluten Free</a>
                <a class="a1" href="collection.php?type=alimentation">Alimentation<b style="margin-left:70px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=bebe">Bebe<b style="margin-left:120px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a></li>
                <a class="a1" href="collection.php?type=beaute">Hygiene et Beaute<b style="margin-left:40px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=maison">Entetienet Maison<b style="margin-left:40px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=animaux">Animaux<b style="margin-left:94px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a></li>
                <a href="collection.php?type=electromenager">Electromenagers</a>
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
    <main style="padding-bottom: 50px;">
        <a href="#"><img class="image3" src="./images-mymarket/Capture_d_ecran_2024-04-28_131737.webp" alt=""></a>
        <div class="rayons">
            <p>Nos Rayons</p>
        </div>
        <div class="container">
           <a href="">
            <div class="items">
                <div class="div-image"><img class="image4" src="./images-mymarket/person-holds-a-sharp-knife-over-large-cut-of-meat.webp" alt=""></div>
                <p class="paragraphe">Marché et Boucherie<b class="fleche">&#8594</b> </p>
            </div>
           </a>
           <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/monad.jpg" alt=""></div>
                    <p class="paragraphe">Boissons<b class="fleche">&#8594</b> </p>
                </div>
           </a>
           <a href="">
            <div class="items">
                <div class="div-image"><img class="image4" src="./images-mymarket/image-pc-sms-393x261-1-epicerie_210616110348.webp" alt=""></div>
                <p class="paragraphe">Épicerie salée<b class="fleche">&#8594</b> </p>
            </div>
           </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/sucre-farine.jpg" alt=""></div>
                    <p class="paragraphe">Épicerie sucrée<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/epicerie-sucree-confitures.webp" alt=""></div>
                    <p class="paragraphe">Petit Déjeuner<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/Panaderia.webp" alt=""></div>
                    <p class="paragraphe">Pains et Pâtisserie<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/BIO.png" alt=""></div>
                    <p class="paragraphe">BIO<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/rzek.png" alt=""></div>
                    <p class="paragraphe">Rzek<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/bebe.webp" alt=""></div>
                    <p class="paragraphe">Bébé<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/makyage.webp" alt=""></div>
                    <p class="paragraphe">Hygiéne et beauté<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/maison.webp" alt=""></div>
                    <p class="paragraphe">Entretin et maison<b class="fleche">&#8594</b> </p>
                </div>
            </a>
            <a href="">
                <div class="items">
                    <div class="div-image"><img class="image4" src="./images-mymarket/animaux.webp" alt=""></div>
                    <p class="paragraphe">Animaux<b class="fleche">&#8594</b> </p>
                </div>
            </a>
        </div>
        <div class="slide-container swiper">
            <div class="slide-content ">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <a href=""><img class="image-entete" src="./images-mymarket/CGB-removebg-preview.png" alt=""></a>
                        </div>
                        <div class="card-content">
                            <div class="rect">
                                <div class="tr"></div>
                            </div>
                            <h2 class="prix"><s class="souligner">11 499.00 DH</s> 9 999.00 DH</h2>
                            <p class="pp">AEG CGB923Z5CM Cuisinière 5 feux</p>
                            <div style="display: flex;flex-direction: row;">
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                            </div>
                            <a href="">Electromenagers</a>
                            <form action='mymarket.php'method='post' style='position:absolute;margin-top:43%;'>
                                <input type='hidden' name='id' value='3'>
                                <input type='hidden' name='marque' value='Electromenagers'>
                                <input type='hidden' name='description' value='AEG CGB923Z5CM Cuisinière 5 feux'>
                                <input type='hidden' name='prix' value='9999'>
                                <input type='hidden' name='src' value='CGB-removebg-preview.png'>
                                <div class='div-button'><input class='button' type='submit' name='submit' value='Ajouter au panier'></div>
                            </form>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <a href=""><img class="image-entete" src="./images-mymarket/AEG-removebg-preview.png" alt=""></a>
                        </div>
                        <div class="card-content">
                            <div class="rect">
                                <div class="tr"></div>
                            </div>
                            <h2 class="prix"style="margin-top:-2px;">499.00 dh</h2>
                            <p class="pp"style="margin-top:-5px;margin-bottom:-10px;">AEG DELI 4 Blender Bol En Verre Capacité 1.5 Litres Moteur Très Puissant</p>
                            <div style="display: flex;flex-direction: row;"style="margin-top:-10px;">
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                            </div>
                            <a href=""style="margin-top:-2px;">Electrique</a>
                            <form action='mymarket.php'method='post' style='position:absolute;margin-top:43%;'>
                                <input type='hidden' name='id' value='1'>
                                <input type='hidden' name='marque' value='Electromenagers'>
                                <input type='hidden' name='description' value='AEG DELI 4 Blender Bol En Verre Capacité 1.5 Litres Moteur Très Puissant 800 Watt 5 Vitesses'>
                                <input type='hidden' name='prix' value='409'>
                                <input type='hidden' name='src' value='AEG-removebg-preview.png'>
                                <div class='div-button'><input class='button' type='submit' name='submit' value='Ajouter au panier'></div>
                            </form>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <a href=""><img class="image-entete" src="./images-mymarket/ewc-removebg-preview.png" alt=""></a>
                        </div>
                        <div class="card-content">
                            <div class="rect">
                                <div class="tr"></div>
                            </div>
                            <h2 class="prix" style="z-index: 10;">2 599.00 dh MAD </h2>
                            <p class="pp">MACHINE A LAVER INDESIT EWC 81252</p>
                            <div style="display: flex;flex-direction: row;">
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                            </div>
                            <a href="">Electrique</a>
                            <form action='mymarket.php'method='post' style='position:absolute;margin-top:43%;'>
                                <input type='hidden' name='id' value='37'>
                                <input type='hidden' name='marque' value='Electromenagers'>
                                <input type='hidden' name='description' value='MACHINE A LAVER INDESIT EWC 81252'>
                                <input type='hidden' name='prix' value='2599'>
                                <input type='hidden' name='src' value='ewc-removebg-preview.png'>
                                <div class='div-button'><input class='button' type='submit' name='submit' value='Ajouter au panier'></div>
                            </form>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <a href=""><img class="image-entete" src="./images-mymarket/cafe-removebg-preview.png" alt=""></a>
                        </div>
                        <div class="card-content">
                            <div class="rect">
                                <div class="tr"></div>
                            </div>
                            <h2 class="prix">1 399.00 dh</h2>
                            <p class="pp" style="margin-bottom: -3px;">TAURUS CAFETIERE ESPRESSO TRENTO Expresso avec broyeur à café</p>
                            <div style="display: flex;flex-direction: row;">
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                            </div>
                            <a href="">Electrique</a>
                            <form action='mymarket.php'method='post' style='position:absolute;margin-top:43%;'>
                                <input type='hidden' name='id' value='2'>
                                <input type='hidden' name='marque' value='Electromenagers'>
                                <input type='hidden' name='description' value='TAURUS CAFETIERE ESPRESSO TRENTO Expresso avec broyeur à café'>
                                <input type='hidden' name='prix' value='1399'>
                                <input type='hidden' name='src' value='cafe-removebg-preview.png'>
                                <div class='div-button'><input class='button' type='submit' name='submit' value='Ajouter au panier'></div>
                            </form>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <a href=""><img class="image-entete" src="./images-mymarket/friteuse-removebg-preview.png" alt=""></a>
                        </div>
                        <div class="card-content">
                            <div class="rect">
                                <div class="tr"></div>
                            </div>
                            <h2 class="prix"style="margin-top:-2px;"><s class="souligner">2 499.00 DH</s> 2 299.00 DH</h2>
                            <p class="pp">Friteuse sans huile AIR FRY DIGITAL GRILL</p>
                            <div style="display: flex;flex-direction: row;"style="margin-top:-10px;">
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                            </div>
                            <a href="">Electrique</a>
                            <form action='mymarket.php'method='post' style='position:absolute;margin-top:43%;'>
                                <input type='hidden' name='id' value='4'>
                                <input type='hidden' name='marque' value='Electromenagers'>
                                <input type='hidden' name='description' value='Friteuse sans huile AIR FRY DIGITAL GRILL'>
                                <input type='hidden' name='prix' value='2299'>
                                <input type='hidden' name='src' value='friteuse-removebg-preview.png'>
                                <div class='div-button'><input class='button' type='submit' name='submit' value='Ajouter au panier'></div>
                            </form>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <a href=""><img class="image-entete" src="./images-mymarket/crat-removebg-preview.png" alt=""></a>
                        </div>
                        <div class="card-content">
                            <div class="rect">
                                <div class="tr"></div>
                            </div>
                            <h2 class="prix"style="margin-top:-2px;">459.00 DH</h2>
                            <p class="pp">Solac Apollo Cyclonic AS3244 specifications</p>
                            <div style="display: flex;flex-direction: row;"style="margin-top:-10px;">
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                                <div class="star-plien"></div>
                            </div>
                            <a href="">Electrique</a>
                            <form action='mymarket.php'method='post' style='position:absolute;margin-top:43%;'>
                                <input type='hidden' name='id' value='36'>
                                <input type='hidden' name='marque' value='Electromenagers'>
                                <input type='hidden' name='description' value='Solac Apollo Cyclonic AS3244 specifications'>
                                <input type='hidden' name='prix' value='459'>
                                <input type='hidden' name='src' value='crat-removebg-preview.png'>
                                <div class='div-button'><input class='button' type='submit' name='submit' value='Ajouter au panier'></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div style="display: flex;justify-content: space-between;">
            <p class="Nawhal">Nawhal's Collection</p>
           <a  href="#" style="color: #00ffff;font-size: 0.4cm;"><p class="voir" style="font-size: large;font-weight: bold;">Voir +<b><b class="fleche2">&#8594</b></b></p></a>
        </div>
        <div class="over">
 <div class="containeer">
    <?php
    $marque="NAWHAL'S";
    $selectionall= $database->prepare("select * from produuit where marque=?");
    $selectionall->execute(array($marque));
    $selectionall=$selectionall->fetchAll();
    foreach($selectionall as $select){
        echo " <div class='t1'>
        <a href=''><img  src='./images-mymarket/".$select["src"]."'></a>
        <p class='prix' style='font-size: 23px'>".$select["prix"]." DH <s class='soul'>".$select["prix_encienne"]." DH </s></p>
        <a  href='' class='description' style='margin-left: 20px;'>".$select["description"]."</a>
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
        <a href=''class='marque'>NAWHAL'S</a>
        <form action='mymarket.php'method='post' class='button_nuwhals'>
            <input type='hidden' name='id' value=".$select["id"].">
            <input type='hidden' name='marque' value=".$select["marque"].">
            <input type='hidden' name='description' value=".$select["description"].">
            <input type='hidden' name='prix' value=".$select["prix"].">
            <input type='hidden' name='src' value='".$select["src"]."'>
            <div class='div-button'><input class='btn-2'  type='submit' name='submit' value='Ajouter au panier'></div>
        </form>
    </div>";
    }
    ?>
</div>
 </div>
        <label>
            <div class="blue"><b class="direction"><svg  focusable="false" class="icon-menu_suivant" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></div>
            <input type="checkbox" id="input3">
        </label>
        <div class="dolce1">
        <div class="content1">
            <h2>Dolce Gusto Collection !</h2>
            <h4>Prix Plus bas Garanti.</h4>
            <h4>Livraison Gratuite partout au Maroc</h4>
            <div class="coffe">
                <a class="" href="">voir + </a>
            </div>
        </div>
        <div class="slide2-container swiper"style="margin-right:10px;">
        <div class="slide-content dolces">
            <div class="card-wrapper swiper-wrapper">
                <?php
                $selectionn=$database->prepare("select * from produuit where marque='DOLCE GUSTO'");
                $selectionn->execute();
                $LesProduits=$selectionn->fetchAll();
                foreach($LesProduits as $product){
                echo "
                <div class='card3 swiper-slide'>
                    <div class='image-content3'>
                        <a href=''><img class='image-entete3' src='./images-mymarket/".$product["src"]."' alt='productimage'></a>
                    </div>
                    <div class='card-content3'>
                        <h2 class='prix'><s class='souligner'></s> ".$product["prix"]."DH</h2>
                        <p class='pp'>".$product["description"]."</p>
                        <div style='display: flex;flex-direction: row;'>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                        </div>
                        <a href=''>DOLCE GUSTO</a>
                        <form action='mymarket.php'method='post' style='position:absolute;'>
                            <input type='hidden' name='id' value='".$product["id"]."'>
                            <input type='hidden' name='marque' value='".$product["marque"]."'>
                            <input type='hidden' name='description' value='".$product["description"]."'>
                            <input type='hidden' name='prix' value='".$product["prix"]."'>
                            <input type='hidden' name='src' value='".$product["src"]."'>
                            <div class='div-button'style='width: 250px;'><input class='button' type='submit' name='submit' value='Ajouter au panier'></div>
                        </form>
                    </div>
                </div>";
                }
            ?>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    </div>
    <div class="cuisine-collection">
        <div class="cuisine">
            <h2>Cuisine collection</h2>
            <p>Cafetière, Grille Pain, Expresso Broyeur, Machine Expresso, Bouilloire, Presse Agrumes, cafetière à  dosettes . Livraison gratuite et rapide chez vous.</p>
            <div class="cuisine-image"></div>
        </div>
        <div class="slide-container_cuisine swiper" style="margin-right:10px;">
        <div class="slide-content cuisines">
            <div class="card-wrapper swiper-wrapper">
                <?php

                $selectionn=$database->prepare("select * from produuit where marque='LAMACOM'or marque='Electromenagers'");
                $selectionn->execute();
                $LesProduits=$selectionn->fetchAll();
                foreach($LesProduits as $product){
                echo "
                <div class='card3 swiper-slide'>
                    <div class='image-content3'>
                        <a href=''><img class='image-entete3' src='./images-mymarket/".$product["src"]."' alt='productimage'></a>
                    </div>
                    <div class='card-content3'>
                        <h2 class='prix'><s class='souligner'></s> ".$product["prix"]."DH</h2>
                        <p class='pp'>".$product["description"]."</p>
                        <div style='display: flex;flex-direction: row;'>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                            <div class='star-plien'></div>
                        </div>
                        <a href=''>".$product["marque"]."</a>
                        <form action='mymarket.php'method='post' style='position:absolute;'>
                            <input type='hidden' name='id' value='".$product["id"]."'>
                            <input type='hidden' name='marque' value='".$product["marque"]."'>
                            <input type='hidden' name='description' value='".$product["description"]."'>
                            <input type='hidden' name='prix' value='".$product["prix"]."'>
                            <input type='hidden' name='src' value='".$product["src"]."'>
                            <div class='div-button'style='width: 250px;'><input class='button-cuisine' type='submit' name='submit' value='Ajouter au panier'></div>
                        </form>
                    </div>
                </div>";
                }
            ?>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    </div>
        <div style="text-align: center;">
           <a href=""> <img class="image7" src="./images-mymarket/getimage_a8c853bf-6a39-4c02-80ac-287abac07f10.webp" alt=""></a>
        </div>
        <h1 style="color: orange;">New !</h1>
        <div class="new">
            <?php 
             $selectionn=$database->prepare("select * from produuit where marque='PRIME'");
             $selectionn->execute();
             $LesProduits=$selectionn->fetchAll();
            foreach($LesProduits as $product){
            echo "
            <div class='item3'>
                <a href=''><center><img class='image5' src='./images-mymarket/".$product["src"]."' alt='image de produit'></center></a>
                <div class='new_content'>
                    <p class='prix'>".$product["prix"]."dh</p>
                    <a class='description'href=''><p style='margin-left: 20px;'>".$product["description"]."</p></a>
                    <div style='display: flex; flex-direction: row;margin-left: 20px;'>
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
                    <a style='margin-left: 20px;'class='nawa' href=''>".$product["marque"]."</a>
                    <form action='mymarket.php'method='post' style='position:absolute;'>
                        <input type='hidden' name='id' value='".$product["id"]."'>
                        <input type='hidden' name='marque' value='".$product["marque"]."'>
                        <input type='hidden' name='description' value='".$product["description"]."'>
                        <input type='hidden' name='prix' value='".$product["prix"]."'>
                        <input type='hidden' name='src' value='".$product["src"]."'>
                        <div class='div-button'style='width: 250px;'><input class='button-new' type='submit' name='submit' value='Ajouter au panier'></div>
                    </form>
                </div>
            </div>";}
            echo "</div>";
            ?>
        <div class="container6">
            <div style="display: flex;flex-direction: row;">
                <img src="./images-mymarket/img1.avif" alt="">
                <div>
                    <h2>Gagnez du temps</h2>
                    <p>Faites votre commande en quelques minutes</p>
                </div>
            </div>
            <div style="display: flex;flex-direction: row;">
                <img src="./images-mymarket/img2.avif" alt="" >
                <div>
                    <h2>Large Choix Produits</h2>
                    <p>+10 000 références en 1click</p>
                </div>
            </div>
            <div style="display: flex;flex-direction: row;">
                <img src="./images-mymarket/livraison-removebg-preview.png" alt="">
                <div>
                    <h2>Livraison Express</h2>
                    <p>45min livraison chez vous !</p>
                </div>
            </div>
        </div>
        <div style="text-align: center;margin-top: 50px;">
            <p>Avis de Nos clients</p>
                <div style="display: flex;flex-direction: row;justify-content: center;justify-items: center;">
                    <div class="star-plien"></div>
                    <div class="star-plien"></div>
                    <div class="star-plien"></div>
                    <div class="star-plien"></div>
                    <div class="star-plien"></div>
                </div>
            <p>De 255 Commentaires</p>
            <div style="display: flex;flex-direction: row;justify-content: center;justify-items: center;">
                <p style="margin-top:3px;color: green;">Vérifié par</p>
                <img src="./images-mymarket/judge.svg" alt="" style="height: 30px;margin-left:6px;">
            </div>
        </div>
        <div class="div-container7">
            <div class="passage1">
                    <hr id="hr1">
                    <hr id="hr2">
            </div>
            <div class="passage2">
                <hr id="hr3">
                <hr id="hr4">
            </div>
            <div class="container7">
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p class="cinq">5/5</p>
                    <p style="margin-bottom: 10px;">Excellent produit</p>
                    <h5 style="margin-top:65px;">ali blal</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/produitexelent.avif" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p class="cinq">Excellent service</p>
                    <p style="margin-bottom:-10px;">Service professionnel, commande envoyée dans les délais.</p>
                    <h5>Abdelhak Sadiki</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/exelentservice.avif" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p class="cinq">Tres bien</p>
                    <p style="margin-bottom: 10px;">👍</p>
                    <h5 style="margin-top: 70px;">Pierre Guisolphe</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/tresbien.avif" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p style="margin-bottom: 10px;">16 Capsules L'or Classique Tassimo</p>
                    <h5 style="margin-top: 75px;">Omar Amzal</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/tassimo.avif" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p style="margin-bottom: 10px;">Thon à l'huile de tournesol Isabel 3x80g</p>
                    <h5 style="margin-top: 70px;">BOUTAINA MZILY</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/isabel.webp" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p class="cinq">Pas encore reçu</p>
                    <p style="margin-bottom: 10px;">J'ai pas reçu ma commande</p>
                    <h5 style="margin-top: 70px;">Belkdideche Fatna</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/fle.avif" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p style="margin-bottom:0px;">Trop salé,
                        est-ce du sel ajouté ou c est sa nature ?</p>
                        <p>Je suis sous régime pauvre en</p>
                    <h5 style="margin-top: 0px;">Malika</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/salakis.webp" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p class="cinq">Services satisfaisant</p>
                    <p style="margin-bottom: 10px;">Merci</p>
                    <h5 style="margin-top: 85px;">Moussa Tchefarry</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/services_satisfaisnt.avif" alt=""></center></a>
                </div>
                <div class="item4">
                    <div style="display: flex; flex-direction: row;justify-content: center;margin-bottom: -10px;">
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                        <div class="star-plien"></div>
                    </div>
                    <p style="margin-bottom: 10px;">35 Tablettes Lave-Vaisselle Powerball Quantum Ultimate Citron Finish</p>
                    <h5 style="margin-top: 60px;">Khouloud Fatmi</h5>
                    <a href=""><center><img class="image8" src="./images-mymarket/tablette.avif" alt=""></center></a>
                </div>
            </div>
        </div>
    </main>
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
            <div>
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
    <script>
        /**************************** Swiper *********************** */
        const slidecontainers=document.querySelectorAll(".card");
        const images=document.querySelectorAll(".image-entete");
        slidecontainers.forEach(function(slide){
            let index=Object.keys(slidecontainers).find(key => slidecontainers[key] ===slide);
            slidecontainers[index].addEventListener("mousemove",()=>{
                if(index==5){
                    images[index].src='./images-mymarket/crat2-removebg-preview.png';
                }
                images[index].style.transform='scale(1.3)';
            })
            slidecontainers[index].addEventListener("mouseout",()=>{
                if(index==5){
                    images[index].src='./images-mymarket/crat-removebg-preview.png';
                }
                images[index].style.transform='scale(1)';
            })
        })
    </script>
    <script src="collection.js"></script>
    <script src="mymarket.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper=new Swiper(".slide-content",{
            slidesPerView:3,
            spaceBetween:60,
            slidesPerGroup:1,
            loop:true,
            loopFillGroupWithBlank:true,
            pagination:{
            el:".swiper-pagination",
            clickable:true,
            },
            autoplay:{
                delay:3000,
                direction: 'alternate',
            },
            navigation:{
            nextEl:".swiper-button-next",
            prevEl:".swiper-button-prev"
            }
        });
    </script>
    <script>
        var swiper=new Swiper(".dolces",{
            slidesPerView:3,
            spaceBetween:15,
            slidesPerGroup:1,
            loop:true,
            loopFillGroupWithBlank:true,
            pagination:{
            el:".swiper-pagination",
            clickable:true,
            },
            autoplay:{
                delay:3000,
                direction: 'alternate',
            },
            navigation:{
            nextEl:".swiper-button-next",
            prevEl:".swiper-button-prev"
            }
        });
    </script>
    <script>
        var swiper=new Swiper(".cuisines",{
            slidesPerView:3,
            spaceBetween:15,
            slidesPerGroup:1,
            loop:true,
            loopFillGroupWithBlank:true,
            pagination:{
            el:".swiper-pagination",
            clickable:true,
            },
            autoplay:{
                delay:3000,
                direction: 'alternate',
            },
            navigation:{
            nextEl:".swiper-button-next",
            prevEl:".swiper-button-prev"
            }
        });
    </script>
    <script>
        const panierr1=document.querySelector(".panier1");
const panier21=document.querySelector(".panier2");
const chekpanier1=document.querySelector("#chekpanier1")
chekpanier1.addEventListener("change",()=>{
    if(chekpanier1.checked){
        if(panierr1!=null){
            panierr1.style.display='block';
            panier21.style.display='none';
        }
        else{
            panier21.style.display='block';
            panierr1.style.display='none';
        }
    }
    else{
        if(panierr1!=null){
            panierr1.style.display='none';
        }
        if(panier21!=null){
            panier21.style.display='none';
        }
    }
})
    </script>
</body>
</html>