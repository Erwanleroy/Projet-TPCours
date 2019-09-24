$("#textInput").focus(function(){
    $("#textInput").attr("placeholder","")
})
$("#textInput").blur(function(){
    $("#textInput").attr("placeholder","Numero De Brassard")
})

// prevent default with input NAN
$("#textInput").keydown(function(e){
    e.preventDefault();
    // si la touche press est un entier 
    if(!isNaN(e.key)){
        // si la touche est bien un chiffre on ajoute a la chaine existante notre chiffre
        if(parseInt($("#textInput").val())<=99 || $("#textInput").val()==""){
            $("#textInput").val($("#textInput").val()+e.key)
        }else if(parseInt($("#textInput").val())===100){
            if(e.key===0){
                 $("#textInput").val(1000)
            }
        }
    }
    if(e.key === "Backspace"){
        removeLastNumber()
    }
})

function fillWithButton(e){
    // Pour empecher de depasser les 1000 brassard =================> parseInt($("#textInput").val())<=100
    // Pour pouvoir commencer a le remplir si linput est vide ======> $("#textInput").val()==""
    if(parseInt($("#textInput").val())<=99 || $("#textInput").val()==""){
        $("#textInput").val($("#textInput").val()+e)
    }else if(parseInt($("#textInput").val())===100){
            if(e==0){
                 $("#textInput").val(1000)
            }
        }
}

function removeLastNumber(){
    // substring X.substring(0, X.length -1) to remove last char
    $("#textInput").val($("#textInput").val().substring(0, $("#textInput").val().length - 1))
}

$("document").ready(function(){
    $("#textInput").focus()
})
