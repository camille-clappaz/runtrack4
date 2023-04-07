
    function ValidForm() {
        let form = document.getElementById("connexion");
        console.log(form); 
        form.addEventListener("submit", ()=>{
            let prenom = document.getElementById("prenom");
            let nom = document.getElementById("nom");
            let password = document.getElementById("password");
    
            if (prenom.value == "") {
                alert("Mettez votre prenom.");
                return false;
            }
            if (nom.value == "") {
                alert("Mettez votre nom.");
                return false;
            }
            if (password.value == "") {
                alert("Saisissez votre mot de passe");
                return false;
            }
            return true;
        })
       
    }
    ValidForm();
