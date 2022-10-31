
// Get modal
var modal = document.getElementById("myModal");




//Edit modal function
function editModal(id){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        let cabin = this.responseText.split('||');
        Modal(modal)
        document.querySelector("#cabin_id").value= id
        document.querySelector("#cabin_name").value = cabin[0]
        document.querySelector("#cabin_description").value = cabin[1]
        document.querySelector("#cabin_features").value = cabin[2]
        document.querySelector("#price_night").value = cabin[3]
        document.querySelector('#price_week').value = cabin[4]
        document.querySelector('#form_button').name = 'editSubmit'
    }
};
xmlhttp.open("GET","./getcabin_edit.php?q="+id,true);
xmlhttp.send();
}






//Add modal function
function addModal(){
    Modal(modal)
    document.querySelector('#form_button').name = 'addSubmit'
}







//Show modal function
function Modal(modal){
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    modal.style.display = "block";

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
}








//Delete cabin function
function deleteCabin(id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            toast(this.responseText)
            document.querySelector("#cabin-"+id).remove()
        }
    };
    xmlhttp.open("GET","./deletecabin.php?q="+id,true);
    xmlhttp.send();
}







//  MAPS
function myMap() {
    pos = { lat:-34.116182,lng: 151.142636};
    const map = new google.maps.Map(document.querySelector("#map"), {
        zoom: 14,
        center: pos,
      });
    const marker = new google.maps.Marker({
        position: pos,
        map: map,
      });
      window.initMap = initMap;
}


//datepicker 




$(function() {

    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
  
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });
  
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
  
  });
  




//Booking

function book(id){
    var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        toast(this.responseText)
    }
};
xmlhttp.open("GET","booking.php?q="+id+"&date="+document.querySelector('#date'+id).value,true);
xmlhttp.send();
}