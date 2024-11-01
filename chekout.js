const email_erreur=document.querySelector(".cas_erroni");
const  email=document.querySelector(".input")
var mail;
email.addEventListener("input",(e)=>{
    mail=e.target.value;
    if(mail.length==0){
        email_erreur.textContent="Saisissez une adresse e-mail";
        email.style.border='2px solid red';
    }
    else{
        email_erreur.textContent="";
        email.style.border='2px solid #0698c9';
    }
})
const r1=document.getElementById("r1");
const r2=document.getElementById("r2");
const r3=document.querySelectorAll("#r3")
const div_vehicule=document.querySelector(".div_vehicule");
const div_tramway=document.querySelector(".div_tramway");
const paiement_cart=document.querySelectorAll(".paiement_cart")
const enoncie=document.querySelectorAll(".ennoncie");
div_tramway.addEventListener("click",()=>{
    div_vehicule.style.background='white';
    div_vehicule.style.border='1.5px solid rgba(0, 0, 0, 0.066)';
    div_tramway.style.background='#28d5f417';
    div_tramway.style.border='1.5px solid #00badbc4';
    r1.checked=true
})
div_vehicule.addEventListener("click",()=>{
    r2.checked=true;
    div_tramway.style.background='white';
    div_tramway.style.border='1.5px solid rgba(0, 0, 0, 0.066)';
    div_vehicule.style.background='#28d5f417';
    div_vehicule.style.border='1.5px solid #00badbc4';
})
paiement_cart.forEach(function(payer){
    let index=Object.keys(paiement_cart).find(key => paiement_cart[key] ===payer);
    payer.addEventListener("click",()=>{
        r3[index].checked=true;
        payer.style.background='#28d5f417';
        payer.style.border='1.5px solid #00badbc4';
        if(index==3||index==4){
            enoncie[index].style.height=160+"px";
        }
        else{
            enoncie[index].style.height=55+"px";
        }
        for(let paiement of paiement_cart){
            let indece=Object.keys(paiement_cart).find(key => paiement_cart[key] ===paiement);
            if(paiement!=payer){
                r3[indece].checked=false;
                payer.style.background='white';
                payer.style.border='1.5px solid rgba(0, 0, 0, 0.066)';
                enoncie[indece].style.height=0+"px";
            }
        }
    })
})

// r2.addEventListener("change",()=>{
//     if(r2.checked){
//         div_tramway.style.background='white';
//         div_tramway.style.border='1.5px solid rgba(0, 0, 0, 0.066)';
//         div_vehicule.style.background='#28d5f417';
//         div_vehicule.style.border='1.5px solid #00badbc4';
//     }
// })