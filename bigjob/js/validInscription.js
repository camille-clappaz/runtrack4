
function ValidForm() {
    let form = document.getElementById("inscription");
    form.addEventListener("submit", ()=>{
        let prenom = document.getElementById("prenom");
        let nom = document.getElementById("nom");
        let email = document.getElementById("email");
        let password = document.getElementById("password");
        let confirmpassword = document.getElementById("confirm_password");

        if (prenom.value == "") {
            alert("Mettez votre prenom.");
            return false;
        }
        if (nom.value == "") {
            alert("Mettez votre nom.");
            return false;
        }
        if (email.value == "") {
            alert("Mettez une adresse email valide.");
            email.focus();
            return false;
          }
          if (email.value.indexOf("@", 0) < 0) {
            alert("Mettez une adresse email valide.");
            email.focus();
            return false;
          }
          if (email.value.indexOf(".", 0) < 0) {
            alert("Mettez une adresse email valide.");
            email.focus();
            return false;
          }
        if (password.value == "") {
            alert("Saisissez votre mot de passe");
            return false;
        }
        if(password.value != confirmpassword.value){
            alert("Les mots de passe sont différents");
            return false;
        }
        return true;
    })
   
}
ValidForm();

