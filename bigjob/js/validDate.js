function ValidForm() {
    let form = document.getElementById("presence");
    let err = document.getElementsByClassName('erreur');
    let button = document.getElementsByName('validDate');
    console.log(button)
    button[0].addEventListener("click", (e) => {

        let date = document.getElementById("date");
        console.log(date.value);
        let today = new Date();
       
        if (date.value == "") {
            alert('Vide');
            // err[0].innerHTML = "Choississez une date";
            e.preventDefault();
            return false;
        }
        else if (new Date(date.value) < today) {
            alert('Date passée');
            e.preventDefault();
            return false;
        }else{
            // err[0].innerHTML = "Votre demande a été enregistré";
            alert('OK');
            return true;

        }
        
        

    })

}

ValidForm();


// let date = document.getElementById("date");
// console.log(date.innerText);