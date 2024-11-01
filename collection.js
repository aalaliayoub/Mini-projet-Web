/* les produits */
const input8=document.querySelector("#input8")
const input10=document.querySelector("#input10")
const input9=document.querySelector("#input9")
const input11=document.querySelector("#input11")
const input12=document.querySelector("#input12")
const animal=document.querySelector(".animal")
const alimos=document.querySelectorAll(".alimo1")
const bebes=document.querySelectorAll(".bebe1")
const hygienes=document.querySelectorAll(".hygiene1")
const maisons=document.querySelectorAll(".maison1")
const input81=document.querySelectorAll("#input8-1")
const input91=document.querySelectorAll("#input9-1")
const input101=document.querySelectorAll("#input10-1")
const input111=document.querySelectorAll("#input11-1")
const fliches8=document.querySelectorAll(".icon-menu")
const fliches9=document.querySelectorAll(".icon-menu9")
const fliches10=document.querySelectorAll(".icon-menu10")
const fliches11=document.querySelectorAll(".icon-menu11")
const f8=document.querySelector(".icon-menu_8")
const f9=document.querySelector(".icon-menu_9")
const f10=document.querySelector(".icon-menu_10")
const f11=document.querySelector(".icon-menu_11")
const f12=document.querySelector(".icon-menu_12")
const produitMarche=document.querySelectorAll(".marche")
const produitbebe=document.querySelectorAll(".bebe2")
const produithygienes=document.querySelectorAll(".hygiene2")
const produitmaisons=document.querySelectorAll(".maison2")
//const cremerie=document.querySelector(".cremerie");
input8.addEventListener("change",()=>{
    if(input8.checked){
        alimos.forEach(function(almo){
            almo.style.display='block'
        })
        f8.style.transform='rotateZ(90deg)';
       
    }
    else{
        alimos.forEach(function(almo){
            almo.style.display='none'
        })
        f8.style.transform='rotateZ(-90deg)';
       
    }
})
input9.addEventListener("change",()=>{
    if(input9.checked){
        bebes.forEach(function(bebe){
            bebe.style.display='block'
        })
        f9.style.transform='rotateZ(90deg)';
       
    }
    else{
        bebes.forEach(function(bebe){
            bebe.style.display='none'
        })
        f9.style.transform='rotateZ(-90deg)';
    }
})
input10.addEventListener("change",()=>{
    if(input10.checked){
        hygienes.forEach(function(hygiene){
            hygiene.style.display='block'
        })
        f10.style.transform='rotateZ(90deg)';
    }
    else{
        hygienes.forEach(function(hygiene){
            hygiene.style.display='none'
        })
        f10.style.transform='rotateZ(-90deg)';
       
    }
})
input11.addEventListener("change",()=>{
    if(input11.checked){
       maisons.forEach(function(maison){
            maison.style.display='block'
        })
        f11.style.transform='rotateZ(90deg)';
    }
    else{
        maisons.forEach(function(maison){
            maison.style.display='none'
        })
        f11.style.transform='rotateZ(-90deg)';
    }
})
input12.addEventListener("change",()=>{
    if(input12.checked){
       animal.style.display='block'
       f12.style.transform='rotateZ(90deg)';
    }
    else{
        animal.style.display='none'
        f12.style.transform='rotateZ(-90deg)';
    }
})
input81.forEach(function(input){
    input.addEventListener("change",()=>{
        let index=Object.keys(input81).find(key => input81[key] ===input);
        if(input.checked){
            produitMarche[index].style.display='block';
            fliches8[index].style.transform='rotateZ(90deg)';
            fliches8[index].style.transition= 0.5+'s ease-in-out';
        }
        else{
            produitMarche[index].style.display='none';
            fliches8[index].style.transform='rotateZ(-90deg)';
            fliches8[index].style.transition= 0.5+'s ease-in-out';
        }
    })
})
input91.forEach(function(input){
    input.addEventListener("change",()=>{
        if(input.checked){
            let index=Object.keys(input91).find(key => input91[key] ===input);
            produitbebe[index].style.display='block';
            fliches9[index].style.transform='rotateZ(90deg)';
            fliches9[index].style.transition= 0.5+'s ease-in-out';
        }
        else{
            let index=Object.keys(input91).find(key => input91[key] ===input);
            produitbebe[index].style.display='none';
            fliches9[index].style.transform='rotateZ(-90deg)';
            fliches9[index].style.transition= 0.5+'s ease-in-out';
        }
    })
})
input101.forEach(function(input){
    input.addEventListener("change",()=>{
        let index=Object.keys(input101).find(key => input101[key] ===input);
        if(input.checked){
            produithygienes[index].style.display='block';
            fliches10[index].style.transform='rotateZ(90deg)';
            fliches10[index].style.transition= 0.5+'s ease-in-out';
        }
        else{
            produithygienes[index].style.display='none';
            fliches10[index].style.transform='rotateZ(-90deg)';
            fliches10[index].style.transition= 0.5+'s ease-in-out';
        }
    })
})
input111.forEach(function(input){
    input.addEventListener("change",()=>{
        let index=Object.keys(input111).find(key => input111[key] ===input);
        if(input.checked){
            produitmaisons[index].style.display='block';
            fliches11[index].style.transform='rotateZ(90deg)';
            fliches11[index].style.transition= 0.5+'s ease-in-out';
        }
        else{
            produitmaisons[index].style.display='none';
            fliches11[index].style.transform='rotateZ(-90deg)';
            fliches11[index].style.transition= 0.5+'s ease-in-out';
        }
    })
})
/* Filtre */
const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);
        
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});
const input13=document.getElementById("input13");
const input14=document.getElementById("input14");
const svg=document.querySelector(".icon")
const svg_2=document.querySelector(".icon2")
const minmax=document.querySelector('.min-max');
const marques=document.querySelector('.marques');
input13.addEventListener("change",()=>{
    if(input13.checked){
        svg.style.transform='rotateZ(360deg)'
        minmax.style.height=100+"px";
        minmax.style.transition=0.5+'s ease-in-out';
    }
    else{
        svg.style.transform='rotateZ(180deg)'
        minmax.style.height="0px";
        minmax.style.transition=0.5+'s ease-in-out';
    }
})
input14.addEventListener("change",()=>{
    if(input14.checked){
        svg_2.style.transform='rotateZ(360deg)';
        marques.style.height=450+"px";
        marques.style.transition=0.9+'s ease-in-out';
    }
    else{
        svg_2.style.transform='rotateZ(180deg)';
        marques.style.height=0+"px";
        marques.style.transition=0.9+'s ease-in-out';
    }
})
const panie=document.querySelector('#ppr');
const panierr=document.querySelector('.panier1');
const panier2=document.querySelector(".panier2");
const chekpanier=document.querySelector("#chekpanier")

chekpanier.addEventListener("change",()=>{
    if(chekpanier.checked){
        if(panierr!=null){
            panierr.style.display='block';
            panier2.style.display='none';
        }
        else{
            panier2.style.display='block';
            panierr.style.display='none';
        }
    }
    else{
        if(panierr!=null){
            panierr.style.display='none';
        }
        if(panier2!=null){
            panier2.style.display='none';
        }
    }
})
const body=document.querySelector(".body1")
const aprecus=document.querySelectorAll("#aprecu");
const prices=document.querySelectorAll(".prix")
const image_products=document.querySelectorAll(".image-product")
const Mar_que=document.querySelectorAll(".marque_produit")
const descriptions=document.querySelectorAll(".description_produit")
const  id=document.querySelectorAll("#id")
const  hidden1=document.getElementById("hidden1");
const  hidden2=document.getElementById("hidden2");
const  hidden3=document.getElementById("hidden3");
const  hidden4=document.getElementById("hidden4");
const  hidden5=document.getElementById("hidden5");




const all=document.querySelector(".all");
const croxx=document.querySelector(".croixx")
const image1=document.querySelector(".small_image");
const image2=document.querySelector(".big_image");
const para=document.querySelector(".para");
const marque=document.querySelector("#marr");
const prR=document.querySelector("#taman");
const minus=document.getElementById("-");
const plus=document.getElementById("+");
const number=document.getElementById("nb");





var pri;
aprecus.forEach(function(aprecu){
    aprecu.addEventListener("click",()=>{
        let place=Object.keys(aprecus).find(key => aprecus[key] ===aprecu);
        image1.src=image_products[place].src;
        image2.src=image_products[place].src;
        para.textContent=descriptions[place].innerText;
        hidden1.value=id[place].value;
        hidden2.value=Mar_que[place].innerText;
        hidden3.value=descriptions[place].innerText;
        let nouvellesrc=image_products[place].src.substring(38);
        hidden5.value=nouvellesrc;
        marque.textContent=Mar_que[place].innerText;
        pri= parseFloat(prices[place].innerText);
        prR.textContent=pri+"DH";
        hidden4.value=pri;
        body.style.zIndex=-1;
        all.style.display="flex"
        //koxi.style.display="block"
        //quick.style.display="flex"
    })
})
body.ondblclick=()=>{
    panierr.style.display='none';
}
// const nb=document.getElementById("nb");
// const mini=document.getElementById("moins");
// const addition=document.getElementById("+");
var valeur=number.value;
minus.addEventListener("click",()=>{
    valeur--;
    if(valeur==0){
        valeur=1;
    }
    number.value=valeur;
    prR.textContent=pri*valeur+" DH";
})
plus.addEventListener("click",()=>{
    valeur++;
    number.value=valeur;
    prR.textContent=pri*valeur+" DH";
})
// const croix=document.querySelector(".croixx");
croxx.addEventListener("click",()=>{
    all.style.display="none"
   
})

const dd=document.querySelector(".dd")
const ddd=document.querySelector(".ddd")
const produit_info=document.querySelector(".produit_info")
const product=document.querySelectorAll(".product")
const produit_information=document.querySelectorAll(".produit_information")
const btns=document.querySelectorAll(".bt_ns")
const btn_1=document.querySelectorAll(".b_tn1")
const btn_2=document.querySelectorAll(".b_tn2")
const image_product=document.querySelectorAll(".image-product")
const c11=document.querySelector(".c11")
dd.addEventListener("click",()=>{
    c11.classList.remove("c11")
    c11.classList.add("c12")
    produit_info.classList.remove("produit_info");
    produit_info.classList.add("containeer-collection");
    product.forEach(function(prod){
        prod.classList.remove("product")
        prod.classList.add("t11")
    })
    produit_information.forEach(function(prod){
        prod.classList.remove("produit_information")
        prod.classList.add("produit_information2")
    }) 
    btns.forEach(function(prod){
        prod.classList.remove("bt_ns")
        prod.classList.add("formmm1")
    })
    btn_1.forEach(function(prod){
        prod.classList.remove("b_tn1")
        prod.classList.add("button_button")
    })
    btn_2.forEach(function(prod){
        prod.classList.remove("b_tn2")
        prod.classList.add("b_tn22")
    })
    image_product.forEach(function(image){
        image.classList.remove("image-product")
        image.classList.add("dd-image")
    })
})
ddd.addEventListener("click",()=>{
    c11.classList.remove("c12")
    c11.classList.add("c11")
    produit_info.classList.remove("containeer-collection");
    produit_info.classList.add("produit_info");
    product.forEach(function(prod){
        prod.classList.remove("t11")
        prod.classList.add("product")
    })
    produit_information.forEach(function(prod){
        prod.classList.remove("produit_information2")
        prod.classList.add("produit_information")
    }) 
    btns.forEach(function(prod){
        prod.classList.remove("formmm1")
        prod.classList.add("bt_ns")
    })
    btn_1.forEach(function(prod){
        prod.classList.remove("button_button")
        prod.classList.add("b_tn1")
    })
    btn_2.forEach(function(prod){
        prod.classList.remove("b_tn22")
        prod.classList.add("b_tn2")
    })
    image_product.forEach(image=>{
        image.classList.remove("dd-image")
        image.classList.add("image-product")
    })
})