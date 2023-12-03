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