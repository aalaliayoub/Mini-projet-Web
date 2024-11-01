const compte=document.querySelector(".compte")
let checkbox_face=document.getElementById("checkbox_face")
var svgsvg=document.querySelector(".svgsvg")
checkbox_face.addEventListener("change",()=>{
    if(checkbox_face.checked){
        compte.style.display='block';
        svgsvg.style.transform='rotateZ(180deg)';
    }
    else{
        compte.style.display='none';
        svgsvg.style.transform='rotateZ(360deg)';
    }
})
compte.addEventListener("mousemove",()=>{
    compte.style.display='block'
    svgsvg.style.transform='rotateZ(180deg)';
})

compte.addEventListener("mouseout",()=>{
    compte.style.display='none'
    svgsvg.style.transform='rotateZ(360deg)';
    checkbox_face.checked=false;
})



