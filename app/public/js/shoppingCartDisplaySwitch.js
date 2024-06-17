document.addEventListener("DOMContentLoaded", function() {
    const listButton = document.getElementById('listButton');
    const agendaButton = document.getElementById('agendaButton');
    const shoppingCartList = document.getElementById('shoppingCartList');
    const shoppingCartAgenda = document.getElementById('shoppingCartAgenda');

    // Event listeners for buttons
    listButton.addEventListener('click', function() {
        shoppingCartList.classList.remove('d-none');
        shoppingCartAgenda.classList.add('d-none');
    });

    agendaButton.addEventListener('click', function() {
        shoppingCartList.classList.add('d-none');
        shoppingCartAgenda.classList.remove('d-none');
    });
});
