function showCalendar() {
    var language = document.getElementById("language").value;
    if (language === "English") {
        document.getElementById('englishTickets').style.display = "block";
        document.getElementById('dutchTickets').style.display = "none";
        document.getElementById('mandarinTickets').style.display = "none";
    } else if (language === "Dutch") {
        document.getElementById('dutchTickets').style.display = "block";
        document.getElementById('englishTickets').style.display = "none";
        document.getElementById('mandarinTickets').style.display = "none";
    } else if (language === "Mandarin") {
        document.getElementById('mandarinTickets').style.display = "block";
        document.getElementById('englishTickets').style.display = "none";
        document.getElementById('dutchTickets').style.display = "none";
    }
}