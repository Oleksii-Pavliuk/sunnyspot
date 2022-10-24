
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
        document.querySelector("#price_night").value = cabin[2]
        document.querySelector('#price_week').value = cabin[3]
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


