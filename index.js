// je ne sais pas si on a le droit de supprimer la pub du site 🤔 dans le doute je lai fait parce que je suis fier davoir reussi :)
$("document").ready(function(){
    // onload (quand la page se charge) linput se vide et prend le focus
    $("#textInput").val("")
    $("#textInput").focus()
    // on supprime la pub du site mdr
    $('img[alt="www.000webhost.com"]').parent().parent().remove()

})


// quand linput (qui prend la valeur de dossard de lutilisateur) prend le focus (on clique dessus ou bien on est amene dessus onLoad par exemple)
$("#textInput").focus(function(){
    // on enleve le placeholder
    $("#textInput").attr("placeholder","")
})
// si ce meme input perd le focus => prend le blur (flou)
$("#textInput").blur(function(){
    // on reecrit le placeholder
    $("#textInput").attr("placeholder","Numero De Brassard")
})
// je trouve que cest plus joli ainsi sinon le placeholder reste quand on a clique dessus du coup on a notre curseur au milieu du placeholder cest tres laid.

// prevent default with input NAN
$("#textInput").keydown(function(e){
    e.preventDefault();
    // si la touche press est un entier 
    if(!isNaN(e.key)){
        addInput(e.key)
    }
    // on permet un suppression au clavier
    if(e.key === "Backspace"){
        removeLastNumber()
    }
})
function addInput(e){
    // Pour empecher de depasser les 1000 brassard =================> parseInt($("#textInput").val())<=99
    // Pour pouvoir commencer a le remplir si linput est vide ======> $("#textInput").val()==""
    if(parseInt($("#textInput").val())<=99 || $("#textInput").val()==""){
        $("#textInput").val($("#textInput").val()+e)
    // ici ce que je fait cest que je gere tout les nombres de 1 a 999 mais pas 1000
    // donc je cree une condition special : si linput est = a 100
    }else if(parseInt($("#textInput").val())===100){
        // et que notre event vaut 0 on ecrit 1000 dans linput sinon rien
        if(e===0){
             $("#textInput").val(1000)
        }
    }
}
function fillWithButton(e){
    addInput(e)
}

function removeLastNumber(){
    // substring X.substring(0, X.length -1) to remove last char
    $("#textInput").val($("#textInput").val().substring(0, $("#textInput").val().length - 1))
}


// EXPLICATION :
// Daccord dans le code et la logique cest pas joli mais cest plus simple et plus beau en apparence
// donc pour pouvoir envoyer "mon formulaire" jai creer ma calculatrice en html/css/js sans penser au formulaire
// Ainsi je n'ai pas a gerer les preventDefault des boutons OK Annuler pour gerer si cest une annulation ou un enregistrement
// BREF
// jai penser de cette maniere : je cree un formulaire cache de lutilisateur : 
// form{
//      visibility: hidden;
// }
// et quand je clique sur ok ou annuler La on rempli notre formulaire 



// the invisible form : 

{/* <form method="get" action="gestionDossard.php" id="formDossard"> */}
{/*      <input type="text" id="inputDossard" name="d" value="0"/> */}
{/*      <input type="text" id="inputBool" name="f" value="0"/> */}
{/* </form> */}

function removeDossard(){
    // si notre input prenant la valeur du numero de dossard nest pas vide
    if($("#textInput").val()!==""){
        // Notre premier input du form a envoyer prend la valeur entree par lutilisateur
        $("#inputDossard").val($("#textInput").val())
        // le deuxieme input du form est la pour savoir si cest une annulation ou un ajout 0=annulation
        $("#inputBool").val(0)
        // on envoie le form
        $("#formDossard").submit()
    // si notre input prenant la valeur du numero de dossard est vide
    }else{
        // alert error
        alert("Please fill the input")
    }
}
function addDossard(){
    // si notre input prenant la valeur du numero de dossard nest pas vide
    if($("#textInput").val()!==""){
        // Notre premier input du form a envoyer prend la valeur entree par lutilisateur
        $("#inputDossard").val($("#textInput").val())
        // le deuxieme input du form est la pour savoir si cest une annulation ou un ajout 1=ajout
        $("#inputBool").val(1)
        // on envoie le form
        $("#formDossard").submit()
    // si notre input prenant la valeur du numero de dossard est vide
    }else{
        // alert error
        alert("Please fill the input")
    }
}

// le probleme quand je commence a commenter cest que jen met trop 
// au final jai plus de commentaire que de code
// je suis sur que personne ne lira mes commentaires jusquici 🤔🧐

