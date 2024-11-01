<?php 
session_start();
$database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
$sessionId = session_id();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="mymarket.css">
    <style>
        .inputs{
            width:100%;
            display:grid;
            grid-template-columns:1fr 3fr;
            
            align-items: center;
        }
        .admin_form{
            margin-top: 30px;
            padding-top: 20px;
            width: 45%;
            display:grid;
            justify-content: center;
            justify-items: center;
            align-items: center;
            border: 2px solid #0000002f;
            margin-left:30%;
            padding-left:10%;
            padding-bottom: 20px;

        }
        td{
            width:450px;
        }

        .element:hover{
            color:orange;
        }
    </style>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:90%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color:#f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #04AA6D;
  color: white;
  text-align: center;
}
</style>
</head>
<body class="admin" style="display: flex;">
    <div class="navnavpar">
        <p class="element" style="cursor:pointer;">ajouter produit</p>
        <p style="cursor:pointer;color:rgba(0, 0, 0, 0.405)" class="element">Modifier produit</p>
        <p style="cursor:pointer;color:rgba(0, 0, 0, 0.405)" class="element">Visiteurs</p>
        <a class="element" style="color:rgba(0, 0, 0, 0.405)" href="adminconexion.php">desconnecter</a>
    </div>
    <div class="ch_ch">
        <div class="ch1"></div>
        <div class="ch1"></div>
        <div class="ch1"></div>
    </div>
    <div style="margin-top: 50px;"  id="onn">
    <p class="produitt">Ajouter produit</p>
    <form action="admin.php" method="post" class="admin_form">
        <div class="inputs">
        <div class="diiiv">
            <input class="file" type="file" name="src" id="" style="margin-top: 15px;" placeholder="fille">
        </div>
            <div class="diiiv">
                <input type="number" step="any" name="prix" id="" placeholder="price">
            </div>
            <div class="diiiv">
                <input type="number" step="any"  name="encienne_prix" id="" placeholder="Encienne Prix(optionnelle) :">
            </div>
            <div class="diiiv">
                <input type="text" name="description" id="" placeholder="description :">
            </div>
            <div class="diiiv">
                <input type="number" name="nb_etoile" id="" placeholder="nombre des etoille :">
            </div>
            <div class="diiiv">
                <input type="text" name="marque" id="" placeholder="Maqrue : ">
            </div>
            <div class="diiiv">
                <input style="height: 30px;width:165px" type="date" name="date" id="" placeholder="date de depot :">
            </div>
            <div class="diiiv">
                <input type="text" name="type" id="" placeholder="categore">
            </div>
        </div>
        <div class="diiiv" style="width: 100%;">
            <input class="buton_submit" style="height: 40px;width:500px;"  type="submit" value="Enregistrer" name="submit">
        </div>
        <div class="enregistrie" style="display: none;">
            <p >bien enregistrer</p>
            <img class="valide" src="./images-mymarket/valid_s_bg.png" alt="">
        </div>
    </form>
    </div>
    <div style="width:75%;margin-left:20%;display:none;" id="onn">
    <div class="new" style='display:grid;grid-template-columns: repeat(auto-fit,minmax(235px,1fr));'>
            <?php 
            $nb=0;
             $selectionn=$database->prepare("select * from produuit");
             $selectionn->execute();
             $LesProduits=$selectionn->fetchAll();
            foreach($LesProduits as $product){
                $nb++;
            echo "
            <div class='item_3'>
             <form action='modifier.php'method='post'>
                        <input type='hidden' name='id' value='".$product["id"]."'>
                        <input type='hidden' name='marque' value='".$product["marque"]."'>
                        <input type='hidden' name='description' value='".$product["description"]."'>
                        <input type='hidden' name='prix' value='".$product["prix"]."'>
                        <input type='hidden' name='src' value='".$product["src"]."'>
                        <input type='hidden' name='date' value='".$product["date_depot"]."'>
                        <input type='hidden' name='type' value='".$product["type"]."'>
                        <input class='button_new' type='submit' name='submit' value='Modifier'>
                        <input class='button_new' type='submit' name='submit_supprimer' value='supprimer'>
                    </form>
                <a href=''><center><img class='admin_img' src='./images-mymarket/".$product["src"]."' alt='image de produit'></center></a>
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
                </div>
            </div>";
        }
?>
</div>
<div>
    <p>Le nomre total des produits est : <?=$nb?></p>
</div>
</div>
<div style="margin-top: 100px;display:none;width:75%;margin-left:27%;" id="onn">
<?php
     $selection=$database->prepare("select * from client");
     $selection->execute();
     $resultats=$selection->fetchAll();
     $number_total=0;
     $vesiteur_creer_uncompte=0;
     echo "<table border='1px solid black' cellpading='0' cellspacing='0' style='text-align:center;'id='customers'>
                <tr>
                    <th>Full Name</td>
                    <th>Email</td>
                </tr>";
     foreach($resultats as $resultat){
        $number_total++;
        if(!empty($resultat["email"])){
            $vesiteur_creer_uncompte++;
            echo "<tr>
                    <td>".$resultat["nom"]."</td>
                    <td>".$resultat["email"]."</td>
                </tr>";
        }
     }
     echo"<tr>
     <td colspan='2'>Le nombre total des visiteurs est : ".$number_total."</td>
     </tr>";
     echo"<tr>
     <td colspan='2'>nombre des visiteur qui ont le compte est : ".$vesiteur_creer_uncompte."</td>
     </tr>";
     echo "</table>";
     
   ?>
</div>
<script>
    let elemnts=document.querySelectorAll(".element");
    let contents=document.querySelectorAll("#onn");
    elemnts.forEach(function(element){
        element.addEventListener("click",()=>{
            let index=Object.keys(elemnts).find(key => elemnts[key] ===element);
            contents[index].style.display="block";
            element.style.color="black";
            contents.forEach(function(content){
                if(content!=contents[index]){
                    content.style.display="none";
                }

            })
            elemnts.forEach(function(el){
                if(el!=element){
                    el.style.color="rgba(0, 0, 0, 0.405)";
                }

            })
            
        })
    })
    let menu=document.querySelector(".ch_ch");
    const navbar=document.querySelector(".navnavpar");
    const body=document.querySelector(".admin")
    menu.addEventListener("click",()=>{
        navbar.classList.toggle("navnavpar1");
    })
    body.addEventListener("dblclick",()=>{
            navbar.classList.toggle("navnavpar1");
    })
</script>
</body>
</html>
<?php 
    $database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
    $insertion=$database->prepare("INSERT INTO produuit(src,prix,prix_encienne,description,nb_etoile_plien,marque,date_depot,type)  VALUES (?,?,?,?,?,?,?,?)");
    if(isset($_POST["submit"])){
        $insertion->execute(array($_POST["src"],$_POST["prix"],$_POST["encienne_prix"],$_POST["description"],$_POST["nb_etoile"],$_POST["marque"],$_POST["date"],$_POST["type"]));
        echo "<script>
            const enregistrie=document.querySelector('.enregistrie');
            enregistrie.style.display='flex';
        </script>";
    }
?>