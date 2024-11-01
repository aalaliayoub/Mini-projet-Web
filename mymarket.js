const input2=document.getElementById("input2");
const header=document.querySelector(".div-header");
const titre=document.querySelector(".titre");
const blue=document.querySelector(".blue");
const containerglob=document.querySelector(".containerglob");
const containeer=document.querySelector(".containeer");
const container3=document.querySelector(".container3");
const container4=document.querySelector(".container4");
const input3=document.querySelector("#input3");
const input4=document.querySelector("#input4");
const input5=document.querySelector("#input5");
const deriction=document.querySelector(".direction");
const divSuivant=document.querySelector(".div-suivant");
const divSuivant2=document.querySelector(".div-suivant2");
const input1=document.getElementById("input1");
const divMenu=document.querySelector(".div-menu")
const menuprincipale=document.querySelector(".menu-principale");
const menucontainer=document.querySelector(".menu-container");
const submenu=document.querySelector(".submenu");
const submenu1=document.querySelector(".submenu1");
const submenu2=document.querySelector(".submenu2");
const submenu3=document.querySelector(".submenu3");
const submenu4=document.querySelector(".submenu4");
const submenu5=document.querySelector(".submenu5");
const menus=document.querySelectorAll(".a1");
         /* MENU */
var submenus = [submenu1, submenu2, submenu3, submenu4, submenu5];
input1.addEventListener("change",()=>{
    if(input1.checked){
        menuprincipale.style.display='block';
        menucontainer.style.display='flex';
    }
    else{
        menuprincipale.style.display='none';
        menucontainer.style.display='none';
    }
})
menuprincipale.addEventListener("mousemove",()=>{
    menuprincipale.style.display='flex';
    input1.checked=true;
})
menuprincipale.addEventListener("mouseout",()=>{
    menuprincipale.style.display='none';
    input1.checked=false;
})
menus.forEach(function(menu){
    let index=Object.keys(menus).find(key => menus[key] === menu);
    menus[index].addEventListener("mousemove",()=>{
        submenu.style.display='block';
        submenus[index].style.display='grid';
    })
    submenus[index].addEventListener("mousemove",()=>{
        submenu.style.display='block';
        submenus[index].style.display='grid';
    })
    menus[index].addEventListener("mouseout",()=>{
        submenu.style.display='none';
        submenus[index].style.display='none';
    })
    submenus[index].addEventListener("mouseout",()=>{
        submenu.style.display='none';
        submenus[index].style.display='none';
    })
})
input2.addEventListener("mouseenter",()=>{
    input2.style.border='0.5px solid rgba(62, 61, 61, 0.485)';
})
// window.addEventListener("scroll",()=>{
//     header.style.marginTop=-50+'px';
//     header.style.transition=2+'s ease=in-out';

// })
// window.addEventListener("mouseove",()=>{
//     header.style.marginTop=50+'px';

// })
input3.addEventListener("change",()=>{
    if(input3.checked){
        containeer.style.marginLeft=-1265+'px';
        containeer.style.transition=1+'s ease-in-out';
        blue.style.transform='translate(3px,-280px)';
        blue.innerHTML='<svg  focusable="false" class="icon-menu_reverce" viewBox="0 0 12 8" role="presentation"><path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path></svg>';
    }
    else{
        containeer.style.marginLeft=10+'px';
        containeer.style.transition=1+'s ease-in-out';
        blue.style.transform='translate(1213px,-280px)';
        blue.innerHTML='<svg  focusable="false" class="icon-menu_suivant" viewBox="0 0 12 8" role="presentation"><path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path></svg>';
    }
})
containeer.addEventListener("mousemove",()=>{
    blue.style.display='block';
})
blue.addEventListener("mousemove",()=>{
    blue.style.display='block';
})
containeer.addEventListener("mouseout",()=>{
    blue.style.display='none';
})
container3.addEventListener("mousemove",()=>{
    blue.style.display='block';
})
container3.addEventListener("mouseout",()=>{
    blue.style.display='none';
})
// container4.addEventListener("moumsemove",()=>{
//     divSuivant.style.display='block';
// })
// container4.addEventListener("mokuseout",()=>{
//     divSuivant.style.display='none';
// })
// divSuivant.addEventListener("mousnemove",()=>{
//     divSuivant.style.display='block';
// })
// if(k==0){
//     container4.addEventListener("mouseover",()=>{
//         divSuivant.style.display='block';
//     })
//     divSuivant.addEventListener("mousemove",()=>{
//         divSuivant.style.display='block';
//     })
// }
// divSuivant.addEventListener("click",()=>{
//     if(k<3){
//         i=i-743;
//         container4.style.marginLeft=i+'px';
//         k=k+1;
//         divSuivant2.style.display='block';
//     }
// })
// if(k==3){
//     divSuivant.style.display='none';
// }
// container4.addEventListener("mouseout",()=>{
//     divSuivant.style.display='none';
// })
// divSuivant2.addEventListener("click",()=>{
//     if(k>0){
//         i=i+745;
//         container4.style.marginLeft=i+'px';
//         k=k-1;
//     }
//     else{
//         k=0;
//         i=0;
//     }
//     if(k==0){
//         divSuivant2.style.display='none';
//     }
// })

/* collection cuisine */
// const container5=document.querySelector(".container5");
// const divsuivant3=document.querySelector(".div-suivant3");
// const divsuivant4=document.querySelector(".div-suivant4");
// var j=0;
// var k1=0;
// if(k1==0){
//     container5.addEventListener("mouseover",()=>{
//         divsuivant3.style.display='block';
//     })
//     divsuivant3.addEventListener("mousemove",()=>{
//         divsuivant3.style.display='block';
//     })
// }
// divsuivant3.addEventListener("click",()=>{
//     if(k1<3){
//         j=j-743;
//         container5.style.marginLeft=j+'px';
//         k1=k1+1;
//         divsuivant4.style.display='block';
//     }
// })
// if(k1==3){
//     divsuivant3.style.display='none';
// }
// container5.addEventListener("mouseout",()=>{
//     divsuivant3.style.display='none';
// })
// divsuivant4.addEventListener("click",()=>{
//     if(k1>0){
//         j=j+743;
//         container5.style.marginLeft=j+'px';
//         k1=k1-1;
//     }
//     else{
//         k1=0;
//         j=0;
//     }
//     if(k1==0){
//         divsuivant4.style.display='none';
//     }
// })
/*////////////////////////////////////////////////////////////////*/
const container7=document.querySelector(".container7");
var h=0;
var g=0;
setInterval(()=>{
    g=g+1;
    if(g<5){
        h=h-190;
        container7.style.marginLeft=h+'px';
    }
    if(g==5){
        h=0;
        g=0;
        container7.style.marginLeft=h+'px';
    }
},10000);
var c=h;
const passage1=document.querySelector(".passage1");
const passage2=document.querySelector(".passage2");
passage1.addEventListener("click",()=>{
    c=c+190;
    container7.style.marginLeft=c+'px';
})
passage2.addEventListener("click",()=>{
    c=c-190;
    container7.style.marginLeft=c+'px';
})
