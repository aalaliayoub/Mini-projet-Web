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
    <link  rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
body {
    font-family: 'Poppins';font-size: 15px;
}
body {
    font-family: 'Poppins';font-size: 18px;
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
            echo "<div class='panier2' >
            <h3>Encore 500.00 DH pour bénéficier des frais de port gratuits !</h3>
            <div class='panier_div1'>";
                $selection=$database->prepare("select * from ajouter_panier inner join produuit on ajouter_panier.produit_id = produuit.id  where client_id=?");
                $selection->execute(array(session_id()));
                $products=$selection->fetchAll();
                if(count($products)!=0 && !isset($_POST["submit"])){
                    foreach($products as $product){
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
                    if(numb>1){
                        const pan=document.querySelector('.panier1');
                        pan.style.marginBottom=-426.5+'px';
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
                    <h3 class='motivi'></h3>
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
            if(numb>1){
                const pan=document.querySelector('.panier1');
                pan.style.marginBottom=-426.5+'px';
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
                <a class="a1" href="collection.php?type=bebe">Bebe<b style="margin-left:130px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a></li>
                <a class="a1" href="collection.php?type=beaute">Hygiene et Beaute<b style="margin-left:34px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=maison">Entetienet Maison<b style="margin-left:34px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
                <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                </svg></b></a>
                <a class="a1" href="collection.php?type=animaux">Animaux<b style="margin-left:99px;"><svg  focusable="false" class="icon-menu_principale" viewBox="0 0 12 8" role="presentation">
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
    <h1 style="color: orange;text-align:center;margin-top:50px;">Politique d'expédition</h1>
    <div style="width: 60%;margin-left:250px">
        <h2 style="margin-left: 0;">MyMarket Express Casablanca et Régions</h2>
        <p>Dédier uniquement pour la ville de Casablanca et régions : Bouskoura, Tamaris, DarBouazza, livraison GRATUITE à partir de 500 dhs d'achat</p>
        <p>Il n'y a pas de surplus de coût pour une marchandise lourde ou volumineuse : Liquide, poids volumétrique .</p>
        <p>Délais de livraison: Le jour même selon les plages horaires disponibles.</p>
        <p>Pré-commande Possible : 30 Jours</p>
        <p>Restrictions : Pas de maximum. Volume illimité, pas de surplus pour le volume : Liquide, Papier toilette, etc...</p>
        <p>Tarif: - 500 dhs = 30 dhs frais de livraison , +500dhs d'achat = LIVRAISON GRATUITE</p>
        <p>Moyen de livraison : Véhicule réfrigéré pour produits frais </p>
        <h2 style="margin-left: 0;">Livraison MyMarkte ULTRA </h2>
        <p>Une livraison spéciale ? Découvrez notre nouveau service ULTRA, dédié pour un service de luxe et rapide. MyMarket met à votre disposition une équipe pour répondre à l'ensemble de vos besoins : Evénements, Réception, Besoins de courses ultra Urgente. </p>
        <p>Contactez notre service dédié ULTRA , par Tchat sur le site ( Réponse Express )</p>
        <h3 style="color: orange;margin-left:0;">EXPRESS LIVRAISON À DOMICILE 24H À 72H PRINCIPALES VILLES ( PRODUITS FRAIS EXCLUS ) GRAND ET PETIT VOLUME</h3>
        <p>Nous pouvons envoyer votre commande ( Grand et petit volume ) via nos partenaires transporteurs.</p>
        <p>Délais de livraison : de 2 à 7 jours ouvrable après confirmations de votre commande auprès de notre service clients selon la ville de destination</p>
        <p>Restriction : Aucune Restriction, sauf :  Les produits frais ne sont pas livrés & œufs: fruits, légumes, viande, volaille, fromage, surgelé, poissons, laitier frais, objet fragile ...  sauf sous demande d'autorisation accordé par le client</p>
        <p>Suivi temps réel colis</p>
        <p>Service clients</p>
        <p>0520 31 97 97  & support@mymarket.ma & Tchat sur le site .</p>
        <p>Tarif: Excellent rapport prix de livraison :</p>
        <p>Tarif : à partir de 30 dhs , le prix est calculé selon le poids réel de la commande. </p>
        <p>Info : Nous disposons de tarifs avantageux pour palettes ( grand volume ), économiser pour vos commandes grand volume. Livraison partout au MAROC.</p>
        <h2 style="margin-left: 0;">Villes Desservies 108 destinations : </h2>
        <hr>
        <div class="div_jour">
            <div class="jour">
                <p>Akka</p>
                <p>Lundi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Agadir</p>
                <p>Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Ait melloul</p>
                <p>	Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Anza</p>
                <p>Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Aourir</p>
                <p>Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Aourir</p>
                <p>Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Bensergao</p>
                <p>Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Dcheira el jihadia</p>
                <p>Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
            <div class="jour">
                <p>Douira</p>
                <p>Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi</p>
                <p>J+1</p>
            </div>
            <hr>
        </div>
    </div>
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
    <script src="mymarket.js"></script>
    <script src="collection.js"></script>
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