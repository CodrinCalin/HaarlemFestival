function openOverlayAddInfoCard() {
    document.getElementById("addInfoCard").style.display = "block";
}

function closeOverlayAddInfoCard() {
    document.getElementById("addInfoCard").style.display = "none";
}

function openOverlayEditText(itemId, currentText) {
    document.getElementById("editText").style.display = "block";
    document.getElementById("introText").value = currentText;
}

function closeOverlayEditText() {
    document.getElementById("editText").style.display = "none";
}

function openOverlayAddFAQ() {
    document.getElementById("addFAQ").style.display = "block";
}

function closeOverlayAddFAQ() {
    document.getElementById("addFAQ").style.display = "none";
}