/* navbar button*/
function myFunction1() {
    location.replace("../controller/connexioncompte.php");
}

function myFunction2() {
    location.replace("../controller/inscription.php");
}
function myFunction5() {
    location.replace("../controller/deconnexion.php");
}
function myFunction7() {
    location.replace("../controller/Admin.php");
}




/* boutton nous contacter*/
function myFunction6() {
    location.replace("../Vue/home.php");
}
/* traitement saisi formulaire e contact*/


/*controle saisie mot de pass
function valider() { 
  var msg; 
  var str1 = document.getElementById("mdpUtilisateur").value; 
  var str2 = document.getElementById("confmdpUtilisateur").value; 
  
  if (str1.match( /[0-9]/g)==null || 
         str1.match( /[A-Z]/g)==null || 
          str1.match(/[a-z]/g)==null || 
          str1.match( /[^a-zA-Z\d]/g)==null || 
         str1.length <= 10
      ) {
     msg = " Mot de passe invalide ";
     
      }
  else if(str1!= str2){
      msg="les deux mots de passe ne sont pas identiques"
      
  }
  else 
     msg =" <p> mot de passe valide</p>"; 
    document.getElementById("msg").innerHTML= msg; 
    document.getElementById('msg').style.color = 'red';
} 
*/
var divs = ["adminUsers", "adminArticles", "adminMessages", "adminImages"];
var visibleId = null;
function show(id) {
  if (visibleId !== id) {
    visibleId = id;
  }
  hide();
}
function hide() {
  var div, i, id;
  for (i = 0; i < divs.length; i++) {
    id = divs[i];
    div = document.getElementById(id);
    if (visibleId === id) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}
/* boutton lire la suite page Article */
var btnPlus = document.querySelector('.lireLaSuite');
var text = document.querySelector('.text');

btnPlus.addEventListener('click',(e)=>{
  text.classList.toggle('lire-la-suite');
  
  if(btnPlus.innerText === 'Afficher plus -->')
      {
        btnPlus.innerText = ' Afficher moins <--';
      }
    else{
      btnPlus.innerText = 'Afficher plus -->';
    }


})

