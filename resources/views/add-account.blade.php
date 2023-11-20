
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/css/autocomplete.min.css"
/>

<script src="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/js/autocomplete.min.js"></script>

<script>
    // minimal configure
new Autocomplete("search", {
  // default selects the first item in
  // the list of results
  selectFirst: true,

  // The number of characters entered should start searching
  howManyCharacters: 2,

  // onSearch
  onSearch: ({ currentValue }) => {
    // You can also use static files
    // const api = '../static/search.json'
    const api = `https://api-adresse.data.gouv.fr/search/?q=${encodeURI(
      currentValue
    )}`;

    /**
     * jquery
     */
    // return $.ajax({
    //     url: api,
    //     method: 'GET',
    //   })
    //   .done(function (data) {
    //     return data
    //   })
    //   .fail(function (xhr) {
    //     console.error(xhr);
    //   });

    // OR -------------------------------

    /**
     * axios
     * If you want to use axios you have to add the
     * axios library to head html
     * https://cdnjs.com/libraries/axios
     */
    // return axios.get(api)
    //   .then((response) => {
    //     return response.data;
    //   })
    //   .catch(error => {
    //     console.log(error);
    //   });

    // OR -------------------------------

    /**
     * Promise
     */
    return new Promise((resolve) => {
      fetch(api)
        .then((response) => response.json())
        .then((data) => {
          resolve(data.features);
        })
        .catch((error) => {
          console.error(error);
        });
    });
  },
  // nominatim GeoJSON format parse this part turns json into the list of
  // records that appears when you type.
  onResults: ({ currentValue, matches, template }) => {
    const regex = new RegExp(currentValue, "gi");

    // if the result returns 0 we
    // show the no results element
    return matches === 0
      ? template
      : matches
          .map((element) => {
            return `
          <li class="loupe">
            <p>
              ${element.properties.label.replace(
                regex,
                (str) => `<b>${str}</b>`
              )}
            </p>
          </li> `;
          })
          .join("");
  },

  // we add an action to enter or click
  onSubmit: ({ object }) => {
    // remove all layers from the map
    map.eachLayer(function (layer) {
      if (!!layer.toGeoJSON) {
        map.removeLayer(layer);
      }
    });

    const { display_name } = object.properties;
    const [lng, lat] = object.geometry.coordinates;

    const marker = L.marker([lat, lng], {
      title: display_name,
    });

    marker.addTo(map).bindPopup(display_name);

    map.setView([lat, lng], 8);
  },

  // get index and data from li element after
  // hovering over li with the mouse or using
  // arrow keys ↓ | ↑
  onSelectedItem: ({ index, element, object }) => {
    console.log("onSelectedItem:", index, element, object);
  },

  // the method presents no results element
  noResults: ({ currentValue, template }) =>
    template(`<li>No results found: "${currentValue}"</li>`),
});
</script>
@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')


<h2> Créez votre compte</h2>



<form action="{{ url("/create-account/save") }}" method="post" class="form">
    @csrf

    <label>
      <input type="radio" name="inputType" value="personnel" onclick="showInput('personnel')"> Pour vous
    </label>
    <label>
      <input type="radio" name="inputType" value="professionel" onclick="showInput('professionel')"> Pour votre entreprise
    </label>

    <div id="personnelInput" class="hidden">
    <label for="dynamicPersonnel" name="email">Email:</label>
    <input type="email" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="password">Mot de passe:</label>
    <input type="password" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="tel">Numéro de téléphone:</label>
    <input type="tel" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="name">Nom:</label>
    <input type="text" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="firstname">Prenom:</label>
    <input type="text" id="dynamicPersonnel">

  </div>
  

  <div id="professionelInput" class="hidden">
    <label for="dynamicProfessionel">Numéro de Siret:</label>
    <input type="numeric" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Nom de société:</label>
    <input type="text" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Adresse:</label>
    <input type="text" id="dynamicProfessionel">


    <label for="dynamicProfessionel">Ville:</label>
    <input type="text" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Code Postal:</label>
    <input type="numeric" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Secteur d'activité:</label>
    
    <select name="" id="">
        <Option>Hello</Option>
        <Option>Ouistiti</Option>
    </select>
    <div class="auto-search-wrapper">
    <input
      type="text"
      autocomplete="off"
      id="search"
      class="full-width"
      placeholder="enter the city name"
    />
  </div>
  </div>

  <div class="login">
        <button type="submit">S'inscrire</button>
    </div>
</form>
  <script>
    function showInput(inputType) {
      var personnelInput = document.getElementById("personnelInput");
      var professionelInput = document.getElementById("professionelInput");

      // Hide all inputs
      personnelInput.classList.add("hidden");
      professionelInput.classList.add("hidden");

      // Show the selected input
      if (inputType === "personnel") {
        personnelInput.classList.remove("hidden");
      } else if (inputType === "professionel") {
        professionelInput.classList.remove("hidden");
      }
    }
  </script>


    <div id="textInput" class="hidden">
        <input type="email" name="email">
        <label for="email">Email</label>
    </div>

    <div id="textInput" class="hidden">
        <input type="password" name="password">
        <label for="password">Mot de Passe</label>
    </div>


    <div id="textInput" class="hidden">
        <input type="tel" name="tel" >
        <label for="tel">Numéro de téléphone</label>
    </div>

    <div id="textInput" class="hidden">
        <input type="name" name="name">
        <label for="name">Nom</label>

        <input type="firstname" name="firstname">
        <label for="firstname">Prénom</label>
    </div>


    <div id="textInput" class="hidden">
        <input type="date" name="date">
        <label for="date">Date de naissance</label>
    </div>
    <div id="textInput" class="hidden">
        <input type="adress" name="adress">
        <label for="tel">Adresse </label>

        <input type="contry" name="contry">
        <label for="contry">Ville ou code postal </label>
    </div>

    


   

</div>








@endsection


