// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function modelUpdate(id) {
    // Get the modal
    var modalUpdate = document.getElementById('modalUpdate-' + id);

    // Get the button that opens the modal
    var btnUpdate = document.getElementById("myBtn-" + id);

    // When the user clicks on the button, open the modal 
    modalUpdate.style.display = "block";

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modalUpdate) {
            modalUpdate.style.display = "none";
        }
    }
}

function closeModal(id) {
    // Get the modal
    var modalUpdate = document.getElementById('modalUpdate-' + id);

    // Get the <span> element that closes the modal
    var span = document.getElementById("close-" + id);

    // When the user clicks on <span> (x), close the modal
    modalUpdate.style.display = "none";
}
