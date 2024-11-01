
const pluss=document.querySelectorAll(".button_2")
const minuss=document.querySelectorAll(".button_1")
const inputs=document.querySelectorAll("#quantit")
const prixs=document.querySelectorAll(".prixx")
const pricess=document.querySelectorAll(".prix")
const suprs=document.querySelectorAll(".suppr")
const allproducts=document.querySelectorAll(".produits")
const instruction=document.querySelector(".instruction")
const sauvegarder =document.querySelector(".sauvegarder")
const sauvegarder_affiche=document.getElementById("sauvegarder_affiche")
const main=document.querySelector(".mon_panier")
const videVide=document.querySelector(".div2")
const prix_global=document.querySelector(".total_final")
const frais=document.querySelector(".frais")
const numbre_product_ajouter=document.querySelector(".numbre_product_ajouter")
const menu=document.querySelector(".menu-principale")
var prix;
var number=0;
var prix_total=0;
var product_suprimer=[];
var i=0;
prixs.forEach(price=>{
    prix_total=prix_total+parseFloat(price.innerText);
    number++;
})
prix_global.textContent=parseFloat(prix_total.toFixed(2))+"DH";
numbre_product_ajouter.textContent=number;
if(prix_total<500){
    frais.textContent='Encore '+prix_total-500+' dh pour bénéficier des frais de port gratuits !'
}
else{
    frais.textContent="Vous bénéficiez des frais de port gratuits !";
}
pluss.forEach(function(plus){
    plus.addEventListener("click",()=>{
        prix_total=0;
        let index=Object.keys(pluss).find(key => pluss[key] ===plus);
        prix= parseFloat(pricess[index].innerText);
        valeur=inputs[index].value++;
        prii=prix*(valeur+1);
        prixs[index].textContent=parseFloat(prii.toFixed(2))+"DH";
        prixs.forEach(price=>{
            let lieu=Object.keys(prixs).find(key => prixs[key] ===price);
            if(product_suprimer.includes(allproducts[lieu])){
            }
            else{
                prix_total=prix_total+parseFloat(price.innerText);
            }
        })
        prix_global.textContent=parseFloat(prix_total.toFixed(2))+"DH";
        if(prix_total<500){
           let  result=500-prix_total;
            frais.textContent="Encore " +result+" Dh pour bénéficier des frais de port gratuits !";
        }
        else{
            frais.textContent="Vous bénéficiez des frais de port gratuits !";
        }
    })
   
})
minuss.forEach(function(minus){
    minus.addEventListener("click",()=>{
        prix_total=0;
        let index=Object.keys(minuss).find(key => minuss[key] ===minus);
        if(inputs[index].value>1){
            valeur=inputs[index].value--;
            prii=prix*(valeur-1);
            prixs[index].textContent=parseFloat(prii.toFixed(2))+"DH";
            if(inputs[index].value==1){
                prixs[index].textContent= parseFloat(prix.toFixed(2))+"DH";
            }
        }
        else{
            valeur=inputs[index].value;
            allproducts[index].style.display='none';
            i++;
            product_suprimer[i]=allproducts[index];
            number=allproducts.length-product_suprimer.length+1;
            numbre_product_ajouter.textContent=number;
        }
        if(i==allproducts.length){
            main.style.display='none';
            videVide.style.display='block';
            menu.style.margin='-60px 0 0 0';
        }
        prixs.forEach(price=>{
            let lieu=Object.keys(prixs).find(key => prixs[key] ===price);
            if(product_suprimer.includes(allproducts[lieu])){
            }
            else{
                prix_total=prix_total+parseFloat(price.innerText);
            }
        })
        prix_global.textContent=parseFloat(prix_total.toFixed(2))+"DH";
        if(prix_total<500){
            let  result=500-prix_total;
             frais.textContent="Encore " +result+" Dh pour bénéficier des frais de port gratuits !";
         }
         else{
             frais.textContent="Vous bénéficiez des frais de port gratuits !";
         }
    })
})
var j;
suprs.forEach(sup=>{
    sup.addEventListener("click",()=>{
        let index=Object.keys(suprs).find(key => suprs[key] ===sup);
        allproducts[index].style.display='none';
        product_suprimer[i]=allproducts[index];
        prix_total=prix_total-parseFloat(prixs[index].innerText);
        i++;
        if(allproducts.length==i){
            main.style.display='none';
            videVide.style.display='block';
           
        }
        prix_global.textContent=parseFloat(prix_total.toFixed(2))+"DH";
        number--;
        numbre_product_ajouter.textContent=number;
        if(prix_total<500){
            rest=500-prix_total;
            frais.textContent='Encore '+parseFloat(rest.toFixed(2))+' dh pour bénéficier des frais de port gratuits !'
        }
    })
})
sauvegarder_affiche.addEventListener("change",()=>{
    if(sauvegarder_affiche.checked){
        sauvegarder.style.height=215+"px";
        instruction.style.transform='rotateZ(180deg)'
    }
    else{
        sauvegarder.style.height=0+"px";
        instruction.style.transform='rotateZ(-180deg)'
    }
})
const recherche_ville=document.querySelector(".recherche_ville")
const guide=document.querySelector(".guide")
const divlivraison=document.querySelector(".div-livraison")
const autre_ville=document.querySelector(".autre_ville")
divlivraison.addEventListener("click",()=>{
    divlivraison.style.background='rgb(234, 234, 234)';
    recherche_ville.style.display='flex';
    guide.style.display='none';
    autre_ville.style.background='white';
})
autre_ville.addEventListener("click",()=>{
    divlivraison.style.background='white';
    recherche_ville.style.display='none';
    guide.style.display='block';
    autre_ville.style.background='rgb(234, 234, 234)';
})
