
// increment & decrement travelers
function increment() {
    document.getElementById('plusMinusInput').stepUp();
 }
 function decrement() {
    document.getElementById('plusMinusInput').stepDown();
 }


// filter destination

function clickDropdown() {
   document.getElementById("divDestination").classList.toggle("show");
 }

// filter date

function currentDate(){
   var today = new Date(); 
   var dd = String(today.getDate()).padStart(2, '0'); 
   var mm = String(today.getMonth() + 1).padStart(2, '0'); 
   var yyyy = today.getFullYear(); 
   
   today = yyyy + '-' + mm + '-' + dd; 
   // document.getElementById('dateArrive').value = today; 
   // document.getElementById('dateDepart').value = today; 
   document.getElementById('dateArrive').setAttribute("min", today);
   document.getElementById('dateDepart').setAttribute("min", today);
}
 

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
   if (!event.target.matches('.dropinput')) {
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

 // autocomplete destination
//  function autocompleteDestination(){
//    $(function () {
//       $('#inputDestination').codePostal(function (value) {
//         $('#divResult').text(JSON.stringify(value, null, 2));
//       });
//       $('#inputDestination').ville(function (value) {
//         $('#divResult').text(JSON.stringify(value, null, 2));
//       });
//     });
//  }


// autocomplete destination
function autocompleteDestination(){
   const formInput = document.querySelector("#divFormAddress")
   const adresseInput = document.querySelector("#inputDestination")
   const completionSelect = document.querySelector("#completion")
   const uniquePostalCodes = new Set(); // create a set to store unique postal codes

   adresseInput.addEventListener("keyup", event => {

      if (adresseInput.value.length > 4) {
         fetch("https://api-adresse.data.gouv.fr/search/?q="+adresseInput.value)
            .then(response => response.json())
            .then(data => {
               completionSelect.querySelectorAll("li").forEach(option => option.remove())
               data.features.forEach( feature =>  {
                  if (!uniquePostalCodes.has(feature.properties.postcode)){
                     let option = document.createElement("li")
                     completionSelect.appendChild(option)
                     option.innerHTML = '('+feature.properties.postcode + ') ' + feature.properties.city;
                     option.addEventListener("click", e => {
                       formInput.querySelector("#postalcode").value = feature.properties.citycode;
                       formInput.querySelector("#city").value =  feature.properties.city;
                     //   formInput.querySelector("#department").value =  feature.properties.postcode;
                     //   formInput.querySelector("#countries").value = "France";
                       completionSelect.querySelectorAll("li").forEach(option => option.remove())
                       adresseInput.value = '('+feature.properties.postcode + ') ' + feature.properties.city;
                     });
                     uniquePostalCodes.add(feature.properties.postcode);
                  }

               })
         })
      }

   })
}

function handleContinue() {
   var destination = document.getElementById('inputDestination');
   var errorChamp = document.getElementById('errorChampDestination');
 
   if (destination.value.trim() === '') {
     // Le champ "title" est vide, affichez un message d'erreur ou prenez une autre action si nécessaire
     errorChamp.style.display = 'flex';
   } else {
     // Le champ "title" n'est pas vide, appelez la fonction showCategoryDeposit()
     
     errorChamp.style.display = 'none';
 
   }
 }


// autocomplete address

// function initAutocomplete() {
//   var input = document.getElementById('#inputDestination');
//   var autocomplete;
//   /// Set the fields to retrieve specific address components
//   autocomplete.setFields(['address_components']);
//   // When the user selects an address from the drop-down, populate the
//   // address fields in the form.
//   autocomplete.addListener('place_changed', function() {
//     var place = autocomplete.getPlace();
//     console.log(place); // Output the selected place object to the console

//     // Loop through the address components to find the desired values
//     var postcode, city, department;
//     place.address_components.forEach(function(component) {
//       if (component.types.includes('postal_code')) {
//         postcode = component.long_name;
//       } else if (component.types.includes('locality')) {
//         city = component.long_name;
//       } else if (component.types.includes('administrative_area_level_2')) {
//         department = component.long_name;
//       }
//     });

//     console.log('Postcode:', postcode);
//     console.log('City:', city);
//     console.log('Department:', department);
//   });
// }


