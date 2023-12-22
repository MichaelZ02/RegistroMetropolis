function openNav() {
    document.getElementById("sidenav").style.width = "20vw";
    document.getElementById("wrapper").style.filter = "blur(4px)";
    document.getElementById("wrapper").style.transition = "0.4s";
    document.body.style.overflow = "hidden";
    
}
function closeNav(){
    document.getElementById("sidenav").style.width = "0px";
    document.getElementById("wrapper").style.filter = "none";
    document.getElementById("wrapper").style.transition = "0.4s";
   
    window.setTimeout(() => {
        document.body.style.overflow = "visible";
    },380);
}

function chiudiNotifica(){
    document.getElementById("notifica").style.animation = "togliNotifica 1.3s ease";
   
    window.setTimeout(() => {
        document.getElementById("notifica").style.display = "none";
    },1000);
}

function caricaComunicazioni(){
    let comunicazioni = 1; //Comunicazioni da caricare con php

    if(localStorage.getItem("comLette") == null && comunicazioni != 0){
        document.getElementById("notifica").style.display = "inline-flex";
        document.getElementById("nCom").innerHTML = comunicazioni;
        imageLoop();
        return;
    }

    if(localStorage.getItem("comLette") < comunicazioni){
        document.getElementById("notifica").style.display = "inline-flex";
        document.getElementById("nCom").innerHTML = comunicazioni - localStorage.getItem("comLette");
        imageLoop();
        return;
    }
}

function imageLoop(){
    
    if(document.getElementById("notifica").style.display == "inline-flex"){
        document.getElementById("imgCom").src = "/Images/icons/email.png";
    
        window.setTimeout(() => {
            document.getElementById("imgCom").src = "/Images/icons/unread.png";
            
            window.setTimeout(() =>{imageLoop();},600);
        },600);

        console.log("funziona");
    }

    return;
}
    
function apriMenu(menu){
    window.location.href = "/Menu/" + menu + "/" + menu + ".html";
}
function indietro(){
    window.location.href = "/Menu/MenuDipendente.html";
}
function openView(view){
    document.getElementById(view).style.display = "block";
    document.getElementById("wrapper").style.filter = "blur(4px)";
    document.getElementById("wrapper").style.transition = "0.4s";

    if(view == "aggiungiFirma"){
        showLesson("Mattutina");
    }
    else if(view == "aggiungiDipendente"){
        generatePassword();
    }

    const anim = [
        { transform: "scale(0)"},
        { transform: "scale(1)"},
    ];

    const timing = { 
        duration: 250,
        iteration: 1,
    };

    document.getElementById(view).animate(anim, timing);
}
const lezioni = ["Mattutina","Serale","Recupero"];
function showLesson(lesson){
    document.getElementById(lesson).style.display = "block";
    document.getElementById("tag"+lesson).style.borderBottom = "solid #9AD0C2";

    lezioni.forEach((value) =>{
        
        if(value != lesson){
            document.getElementById("tag"+value).style.borderBottom = "1px solid black";
            document.getElementById(value).style.display = "none";
        }
    });
}
function closeView(view){
    document.getElementById("wrapper").style.filter = "none";
    document.getElementById("wrapper").style.transition = "0.4s";
    
    const anim = [
        { transform: "scale(1)"},
        { transform: "scale(0)"},
    ];

    const timing = { 
        duration: 250,
        iteration: 1,
    };

    document.getElementById(view).animate(anim, timing);

    window.setTimeout(() => {
        document.getElementById(view).style.display = "none";
    },249);
}
function cercaPerNome(lista){
    
    let cercato = document.getElementById("cerca").value;
    console.log(cercato);
    lista.forEach((value) => {
        if(!value.nome.includes(cercato)){
            document.getElementById(value.nome).style.display = "none";
        }
    });
    if(cercato == ""){
        lista.forEach((value) => {
            document.getElementById(value.nome).style.display = "block";
        }); 
    }
}
function generatePassword(){
    var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }

    document.getElementById("psw").value = retVal;
}