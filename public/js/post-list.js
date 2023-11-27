
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


// autocomplete destination
function autocompleteDestination(){
   const form = document.querySelector("#divFormAddress")
   const adresseInput = document.querySelector("#inputDestination")
   const completionSelect = document.querySelector("#completion")

   adresseInput.addEventListener("keyup", event => {

      if (adresseInput.value.length > 4) {
         fetch("https://api-adresse.data.gouv.fr/search/?q="+adresseInput.value)
            .then(response => response.json())
            .then(data => {
               completionSelect.querySelectorAll("li").forEach(option => option.remove())
               data.features.forEach( feature =>  {
                  let option = document.createElement("li")
                  completionSelect.appendChild(option)
                  option.innerHTML = feature.properties.label
                  option.addEventListener("click", e => {
                     form.querySelector("#codepostal").value = feature.properties.postcode
                     form.querySelector("#ville").value =  feature.properties.city
                     form.querySelector("#departement").value =  feature.properties.postcode
                     form.querySelector("#pays").value = "France"
                     completionSelect.querySelectorAll("li").forEach(option => option.remove())
                     adresseInput.value = feature.properties.label

                  })
               })
         })
      }

   })
}


// autocomplete address
// let autocomplete;
// let address1Field;
// let postalField;

// function initAutocomplete() {
//   address1Field = document.querySelector("#destinationAddress");
//   postalField = document.querySelector("#postcode");
//   // Create the autocomplete object, restricting the search predictions to
//   // addresses in the France
//   autocomplete = new google.maps.places.Autocomplete(address1Field, {
//     componentRestrictions: { country: ["fr"] },
//     fields: ["address_components", "geometry"],
//     types: ["address"],
//   });
//   address1Field.focus();
//   // When the user selects an address from the drop-down, populate the
//   // address fields in the form.
//   autocomplete.addListener("place_changed", fillInAddress);
// }

// function fillInAddress() {
//   // Get the place details from the autocomplete object.
//   const place = autocomplete.getPlace();
//   let address1 = "";
//   let postcode = "";

//   // Get each component of the address from the place details,
//   // and then fill-in the corresponding field on the form.
//   // place.address_components are google.maps.GeocoderAddressComponent objects
//   // which are documented at http://goo.gle/3l5i5Mr
//   for (const component of place.address_components) {
//     // @ts-ignore remove once typings fixed
//     const componentType = component.types[0];

//     switch (componentType) {

//       case "postal_code": {
//         postcode = `${component.long_name}${postcode}`;
//         break;
//       }

//       case "postal_code_suffix": {
//         postcode = `${postcode}-${component.long_name}`;
//         break;
//       }
//       case "locality":
//         document.querySelector("#locality").value = component.long_name;
//         break;
//       case "administrative_area_level_1": {
//         document.querySelector("#state").value = component.short_name;
//         break;
//       }
//     }
//   }

//   address1Field.value = address1;
//   postalField.value = postcode;
//   // After filling the form with address components from the Autocomplete
//   // prediction, set cursor focus on the second address line to encourage
//   // entry of subpremise information such as apartment, unit, or floor number.
// }

// window.initAutocomplete = initAutocomplete;

