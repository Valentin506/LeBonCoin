// filter date

function currentDate(){
    var today = new Date(); 
    var dd = String(today.getDate()).padStart(2, '0'); 
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear(); 
    
    today = yyyy + '-' + mm + '-' + dd; 
    document.getElementById('startDate').value = today; 
    document.getElementById('endDate').value = today; 
    document.getElementById('startDate').setAttribute("min", today);
    document.getElementById('endDate').setAttribute("min", today);
 }
