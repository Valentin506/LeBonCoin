


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


function continueForm() {

  var typelogementInput = document.getElementById('type_hebergement');
  var capaciteInput = document.getElementById('capacite_hebergement');
  var descriptionInput = document.getElementById('add_description');
  var equipementInput = document.getElementById('equipement2[]');
  var serviceInput = document.getElementById('inputService');



  if (typelogementInput.value.trim() === '') {
    // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
    errorChampType.style.visibility = 'visible';
  }
  if (capaciteInput.value.trim() === '') {
    // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
    errorChampCapacite.style.visibility = 'visible';
  }
  if (atLeastOneCheckedEquipement === false) {
    errorEquipement.style.visibility = 'visible';
  }
  if (atLeastOneChecked === false) {
    errorService.style.visibility = 'visible';
  }
  if (descriptionInput.value.trim() === '') {
    errorChampDescription.style.visibility = 'visible';
  }
  if (!(typelogementInput.value.trim() === '' && capaciteInput.value.trim() === '' && atLeastOneCheckedEquipement === false && atLeastOneChecked === false && descriptionInput.value.trim() === '')) {
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
    console.log('test')
  } else {
    // Le champ "title" n'est pas vide, appelez la fonction showCategoryDeposit()
    showDivPrix();
    errorChampAdresse.style.visibility = 'hidden';

  }
  return false;
}

function showDivPrix() {
  var divPrix = document.getElementById("divPrix");
  divPrix.style.visibility = "visible";
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


const atLeastOneCheckedEquipement = false;

function updateSelectedEquipements(atLeastOneCheckedEquipement) {
  var checkboxesEquip = document.querySelectorAll('input[name="equipement2[]"]');
  // var labelErrorService = document.getElementById('errorService');


  checkboxesEquip.forEach(function (checkbox) {
    if (checkbox.checked) {
      atLeastOneCheckedEquipement = true;
      console.log(atLeastOneCheckedEquipement)
    }
  });

  // if (atLeastOneChecked) {
  //     labelErrorService.innerText = 'on';
  //     consol.log('test');
  // } else {
  //     labelErrorService.innerText = '';
  //     dd('vide');
  // }
}


const atLeastOneChecked = false;

function updateSelectedServices(atLeastOneCheckedEquipement) {
  var checkboxes = document.querySelectorAll('input[name="service"]');
  // var labelErrorService = document.getElementById('errorService');

  

  checkboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      atLeastOneChecked = true;
      console.log('test')
    }
  });

  // if (atLeastOneChecked) {
  //     labelErrorService.innerText = 'on';
  //     consol.log('test');
  // } else {
  //     labelErrorService.innerText = '';
  //     dd('vide');
  // }
}





