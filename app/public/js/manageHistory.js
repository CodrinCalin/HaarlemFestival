function openOverlayAddInfoCard() {
    document.getElementById("addInfoCard").style.display = "block";
}

function closeOverlayAddInfoCard() {
    document.getElementById("addInfoCard").style.display = "none";
}

function openOverlayEditText(item) {
    document.getElementById("editText").style.display = "block";
    document.getElementById("newContent").value = item.content;
    document.getElementById("editContentForm").action = "editContent?id=" + item.id + "&type=practical";
}

function closeOverlayEditText() {
    document.getElementById("editText").style.display = "none";
}

function openOverlayDeleteInfoCard(item) {
    document.getElementById("deleteInfoCard").style.display = "block";
    document.getElementById("confirmDeleteInfoCard").href = "/managehistory/deleteInfoCard?id=" + item.id;
}

function closeOverlayDeleteInfoCard() {
    document.getElementById("deleteInfoCard").style.display = "none";
}

function openOverlayAddFAQ() {
    document.getElementById("addFAQ").style.display = "block";
}

function closeOverlayAddFAQ() {
    document.getElementById("addFAQ").style.display = "none";
}

function openOverlayFAQEdit(item) {
    document.getElementById("editFAQ").style.display = "block";
    document.getElementById("newQuestion").value = item.content;
    document.getElementById("newAnswer").value = item.addition;
    document.getElementById("editFAQForm").action = "editFAQ?id=" + item.id;
}

function closeOverlayFAQEdit() {
    document.getElementById("editFAQ").style.display = "none";
}

function openOverlayFAQDelete(item) {
    document.getElementById("deleteFAQ").style.display = "block";
    document.getElementById("faqDelete").textContent = item.content;
    document.getElementById("confirmDeleteFAQ").href = "/managehistory/deleteFAQ?id=" + item.id;
}

function closeOverlayFAQDelete() {
    document.getElementById("deleteFAQ").style.display = "none";
}

function openOverlayScheduleDelete(id) {
    document.getElementById("deleteSchedule").style.display = "block";
    document.getElementById("confirmDeleteSchedule").href = "/managehistory/deleteSchedule?id=" + id;
}

function closeOverlayScheduleDelete() {
    document.getElementById("deleteSchedule").style.display = "none";
}

function openOverlayAddSchedule() {
    document.getElementById("addSchedule").style.display = "block";
}

function closeOverlayAddSchedule() {
    document.getElementById("addSchedule").style.display = "none";
}