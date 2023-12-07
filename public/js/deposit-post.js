function handleContinue() {
  var titleInput = document.getElementById('title');
  if (titleInput.value.trim() === '') {
      // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
      errorChamp.style.visibility = 'visible';
  } else {
      // Le champ "title" n'est pas vide, appelez la fonction showCategoryDeposit()
      showCategoryDeposit();
      errorChamp.style.visibility = 'hidden';

  }
}


function showCategoryDeposit() {
    var categoryDeposit = document.getElementById("divCategoryDeposit");
    categoryDeposit.style.visibility="visible";
}

function clickDropdown() {
    document.getElementById("divEquipement").classList.toggle("show");
}

function clickDropdown2() {
    document.getElementById("divService").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
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
  categoryDescriptionDeposit.style.visibility="visible";
}


