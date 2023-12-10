


function handleContinue() {
  var titleInput = document.getElementById('title');
  var errorChamp = document.getElementById('errorChamp');

  if (titleInput.value.trim() === '') {
    // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
    errorChamp.style.visibility = 'visible';
  } else {
    // Le champ "title" n'est pas vide, appelez la fonction showCategoryDeposit()
    showCategoryDeposit();
    errorChamp.style.visibility = 'hidden';

  }
}

function veryEndForm() {
  errorChampPhoto.style.visibility = 'visible';
}

function continueForm() {

  var typelogementInput = document.getElementById('type_hebergement');
  var capaciteInput = document.getElementById('capacite_hebergement');
  var descriptionInput = document.getElementById('add_description');
  var equipementInput = document.getElementById('equipement2[]');
  var serviceInput = document.getElementById('inputService');
  var checkTypeLogement = false;
  var checkCapactite = false;
  var checkEquipement = false;
  var checkService = false;
  var checkDescription = false;



  if (typelogementInput.value.trim() === '') {
    // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
    errorChampType.style.visibility = 'visible';
    
  }
  else{
    checkTypeLogement = true;
    errorChampType.style.visibility = 'hidden';

  }

  if (capaciteInput.value.trim() === '') {
    // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
    errorChampCapacite.style.visibility = 'visible';
  }
  else{
    checkCapactite = true;
    errorChampCapacite.style.visibility = 'hidden';

  }
  


  if (atLeastOneCheckedEquipement === false) {
    errorEquipement.style.visibility = 'visible';
  }
  else {
    checkEquipement = true;
    errorEquipement.style.visibility = 'hidden';

  }

  if (atLeastOneChecked === false) {
    errorService.style.visibility = 'visible';

  }
  else {
    checkService = true;
    errorService.style.visibility = 'hidden';

  }



  if (descriptionInput.value.trim() === '') {
    errorChampDescription.style.visibility = 'visible';

  }
  else {
    checkDescription = true;
    errorChampDescription.style.visibility = 'hidden';


  }

  if (checkTypeLogement === true && checkCapactite === true && checkEquipement === true && checkService === true && checkDescription === true) {
   
  // Le champ "title" n'est pas vide, appelez la fonction showCategoryDeposit()
    showNextForm();
    errorChampType.style.visibility = 'hidden';
    errorChampCapacite.style.visibility = 'hidden';
    errorChampDescription.style.visibility = 'hidden';
    errorService.style.visibility = 'hidden';
    errorEquipement.style.visibility = 'hidden';
  }
}

function advancedForm() {
  var addressInput = document.getElementById('adresse');

  if (addressInput.value.trim() === '') {
    // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
    errorChampAdresse.style.visibility = 'visible';
  } else {
    // Le champ "title" n'est pas vide, appelez la fonction showCategoryDeposit()
    showDivPrix();
    errorChampAdresse.style.visibility = 'hidden';

  }
  return false;
}

function endForm() {
  var priceInput = document.getElementById('add_price');
  var modePaiementOuiInput = document.getElementById('mode_paiement_oui');
  var modePaiementNonInput = document.getElementById('mode_paiement_non');
  var checkPrice = false;
  var checkMode = false;

  if (priceInput.value.trim() === '') {
    errorPrix.style.visibility = 'visible';
  }
  else {
    checkPrice = true;
    errorPrix.style.visibility = 'hidden';
  } 

  if (!modePaiementNonInput.checked && !modePaiementOuiInput.checked){
    errorPaiement.style.visibility = 'visible';
  } 
  else 
  {
    errorPaiement.style.visibility = 'hidden';
    var checkMode = true;
  }


  if (checkMode === true && checkPrice === true)
  {
    showDivPicture();
    errorPaiement.style.visibility = 'hiden';
    errorPrix.style.visibility = 'hiden';

  }
  return false;
}

function showDivPrix() {
  var divPrix = document.getElementById("divPrix");
  divPrix.style.visibility = "visible";
}

function showDivPicture() {
  var divPicture = document.getElementById("divPicture");
  divPicture.style.visibility = "visible";
}

function showCategoryDeposit() {
  var categoryDeposit = document.getElementById("divCategoryDeposit");
  divInputCatgory.style.visibility = "visible";
}

function showNextForm() {
  var divAdresse = document.getElementById("divAdresse");
  divAdresse.style.visibility = "visible";
}

function clickDropdown() {
  document.getElementById("divEquipement").classList.toggle("show");
}

function clickDropdown2() {
  document.getElementById("divService").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.dropselect')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


function showDescriptionDeposit() {
  var categoryDescriptionDeposit = document.getElementById("divDescriptionDeposit");
  categoryDescriptionDeposit.style.visibility = "visible";
}


let atLeastOneCheckedEquipement = false;

function updateSelectedEquipements() {
  var checkboxesEquip = document.querySelectorAll('input[name="equipement2[]"]');
  // var labelErrorService = document.getElementById('errorService');


  checkboxesEquip.forEach(function (checkbox) {
    if (checkbox.checked) {
      atLeastOneCheckedEquipement = true;
    }
  });


}


let atLeastOneChecked = false;

function updateSelectedServices() {
  var checkboxes = document.querySelectorAll('input[name="service"]');
  // var labelErrorService = document.getElementById('errorService');

  

  checkboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      atLeastOneChecked = true;
    }
  });


}





