
// increment & decrement travelers
function increment() {
    document.getElementById('plusMinusInput').stepUp();
 }
 function decrement() {
    document.getElementById('plusMinusInput').stepDown();
 }



// TO MAKE THE EXAMPLE WORK YOU MUST
// ADD YOUR ACCESS TOKEN FROM
// https://account.mapbox.com
const ACCESS_TOKEN = 'YOUR_MAPBOX_ACCESS_TOKEN';
const script = document.getElementById('search-js');
script.onload = () => {
   const collection = mapboxsearch.autofill({
      accessToken: ACCESS_TOKEN
   });
};
