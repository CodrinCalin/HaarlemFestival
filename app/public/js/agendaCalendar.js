document.addEventListener('DOMContentLoaded', function() {
    let listButton = document.getElementById('listButton');
    let agendaButton = document.getElementById('agendaButton');
    let shoppingCartList = document.getElementById('shoppingCartList');
    let shoppingCartAgenda = document.getElementById('shoppingCartAgenda');

    listButton.addEventListener('click', function() {
        shoppingCartList.classList.remove('d-none');
        shoppingCartAgenda.classList.add('d-none');
    });

    agendaButton.addEventListener('click', function() {
        shoppingCartList.classList.add('d-none');
        shoppingCartAgenda.classList.remove('d-none');

        // Initialize the calendar when switching to agenda view
        let calendarEl = document.getElementById('calendar');
        let events = JSON.parse(calendarEl.dataset.events);

        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: events,
            eventClick: function(info) {
                // Display event details however you prefer (e.g., in a modal)
                alert('Event: ' + info.event.title);
                info.el.style.borderColor = 'red';
            }
        });

        calendar.render();
    });
});