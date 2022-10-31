function verif() {

    var nomR = document.forms["userval"]["name"].value;
    var prenomR = document.forms["userval"]["surname"].value;
    var mail = document.forms["userval"]["email"].value;
    var password = document.forms["userval"]["pwd"].value;


    var errorN = document.getElementById('errorNR');
    var errorP = document.getElementById('errorPR');
    var errorEmail = document.getElementById('errorMR');
    var errorPass = document.getElementById('errorPass');

    var letters = /^[A-Za-z]+$/;
    if (nomR == "") {
        errorN.innerHTML = "Veuillez entrer votre nom!";

    }
    else if (!(nomR.match(letters) && nomR.charAt(0).match(/^[A-Z]+$/))) {
        errorN.innerHTML = "Veuillez entrer un nom valide!";
    } else {
        errorN.innerHTML = "";

    }

    if (prenomR == "") {
        errorP.innerHTML = "Veuillez entrer votre prenom!";

    }
    else if (!(prenomR.match(letters) && prenomR.charAt(0).match(/^[A-Z]+$/))) {
        errorP.innerHTML = "Veuillez entrer un prenom valid!";
    }
    else {
        errorP.innerHTML = "";

    }

    if (mail == "") {
        errorEmail.innerHTML = "Veuillez entrer votre email!";

    }
    else if (!mail.match('@esprit.tn')) {
        errorEmail.innerHTML = "Veuillez entrer un email valid!";
    }
    else {
        errorEmail.innerHTML = "";

    }

    if (password == "") {
        errorPass.innerHTML = "Veuillez entrer votre mot de passe!";

    }
    else if (!(password.match(/[0-9]/g) &&
        password.match(/[A-Z]/g) &&
        password.match(/[a-z]/g) &&
        password.length >= 8)) {
        errorPass.innerHTML = "Le mot de passe doit contenir au moins 8 caractères, dont au moins : Une lettre majuscule, Une lettre minuscule et un nombre.";

    }
    else {
        errorPass.innerHTML = "";

    }

    if (nomC == "") {
        errorNC.innerHTML = "Le nom du club est obligatoire!";

    }
    else {
        errorNC.innerHTML = "";

    }

    if (DateFond == "") {
        errorDate.innerHTML = "Veuillez choisir une date!";

    }
    else if (new Date(DateFond).toLocaleString() > dateNow.toLocaleString()) {
        errorDate.innerHTML = "La date de fondation doit être inférieur à la date actuelle";
    }
    else {
        errorDate.innerHTML = "";

    }

    if (NbM == "") {
        errorNA.innerHTML = "Veuillez entrer le nombre des memebres !";
    }
    else if (isNaN(NbM) || NbM < 10 || NbM > 100) {
        errorNA.innerHTML = "Le nombre des adhérents doit être supérieur à 10 et inférieur à 100 !";

    }
    else {
        errorNA.innerHTML = "";

    }

    if (activities.length == 0) {
        errorActivities.innerHTML = "On doit sélectionner au moins un type d’activités!";
    }
    else {
        errorActivities.innerHTML = "";

    }

}
