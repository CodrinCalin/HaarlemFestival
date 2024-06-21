document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM loaded");
    loadTickets();
    const form = document.getElementById("ticketForm");
    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            console.log("Ticket form submission detected");
            addTicket(event);
        });
    }
});

// Sidebar function
function showTickets() {
    document.getElementById("tickets-container").style.display = "block";

    const addButton = document.getElementById("add-btn");
    addButton.innerText = `Add Ticket`;
    addButton.onclick = showAddTicketForm;
    loadTickets();
}

// Showing add ticket form
function showAddTicketForm() {
    var modal = document.getElementById("add-ticket-modal");
    var form = document.getElementById("add-ticket-form");
    var span = modal.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
        form.style.display = "none";
    };
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            form.style.display = "none";
        }
    };
    modal.style.display = "block";
    form.style.display = "block";
}

// Get tickets
function loadTickets() {
    fetch("/ManageTicket/Tickets")
        .then((response) => response.json())
        .then((data) => {
            displayTickets(data);
            console.log("Tickets loaded successfully");
        })
        .catch((error) => {
            console.error("Error fetching Tickets:", error);
        });
}

// Display tickets
function displayTickets(tickets) {
    const ticketContainer = document.getElementById("tickets-container");
    ticketContainer.innerHTML = ""; // Clear existing content
    ticketContainer.className = "row"; // Add Bootstrap row class

    const heading = document.createElement("h2");
    heading.textContent = "Tickets"; // Set the heading text
    heading.className = "col-12 my-3"; // Add some margin
    ticketContainer.appendChild(heading);

    tickets.forEach((ticket) => {
        const ticketCard = document.createElement("div");
        ticketCard.className = "ticket-card col-sm-12 col-md-6 col-lg-4 mb-4"; // Add Bootstrap column and margin classes

        const card = document.createElement("div");
        card.className = "card shadow-sm"; // Add Bootstrap card and shadow classes

        const cardBody = document.createElement("div");
        cardBody.className = "card-body";

        const fields = [
            { label: "Name", value: ticket.name, id: "name" },
            { label: "Category", value: ticket.category, id: "category" },
            { label: "Type", value: ticket.type, id: "type" },
            { label: "Quantity Available", value: ticket.quantity_available, id: "quantity_available" },
            { label: "Price", value: ticket.price, id: "price" },
            { label: "Location", value: ticket.location, id: "location" },
            { label: "Duration", value: ticket.duration, id: "duration" },
            { label: "Date Time", value: ticket.date_time, id: "date_time" },
            { label: "Restaurant Name", value: ticket.restaurant_name, id: "restaurant_name" },
            { label: "Star", value: ticket.star, id: "star" },
            { label: "Food Type", value: ticket.food_type, id: "food_type" },
            { label: "Language", value: ticket.language, id: "language" },
            { label: "Guide", value: ticket.guide, id: "guide" },
            { label: "Artist", value: ticket.artist, id: "artist" },
        ];

        fields.forEach(field => {
            const label = document.createElement("span");
            label.textContent = `${field.label}: `;
            label.className = "font-weight-bold d-block mt-2";
            cardBody.appendChild(label);

            const value = document.createElement("span");
            value.contentEditable = "true";
            value.id = `ticket-${field.id}-${ticket.id}`;
            value.textContent = field.value || `${field.label} not provided`;
            value.className = "ml-1";
            cardBody.appendChild(value);
        });

        card.appendChild(cardBody);

        const cardFooter = document.createElement("div");
        cardFooter.className = "card-footer text-right";

        const updateButton = document.createElement("button");
        updateButton.className = "btn btn-success mr-2";
        updateButton.onclick = () => updateTicket(ticket.id);
        updateButton.textContent = "Update";
        cardFooter.appendChild(updateButton);

        const deleteButton = document.createElement("button");
        deleteButton.className = "btn btn-danger";
        deleteButton.onclick = () => deleteTicket(ticket.id);
        deleteButton.textContent = "Delete";
        cardFooter.appendChild(deleteButton);

        card.appendChild(cardFooter);

        ticketCard.appendChild(card);
        ticketContainer.appendChild(ticketCard);
    });
}

// Update ticket
function updateTicket(ticketId) {
    const ticketNameElement = document.getElementById(`ticket-name-${ticketId}`);
    const ticketCategoryElement = document.getElementById(`ticket-category-${ticketId}`);
    const ticketPriceElement = document.getElementById(`ticket-price-${ticketId}`);

    const updatedTicket = {
        id: ticketId,
        name: ticketNameElement.textContent,
        category: ticketCategoryElement.textContent,
        price: ticketPriceElement.textContent,
    };

    fetch("/ManageTicket/updateTicket", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(updatedTicket),
    })
        .then((response) => {
            if (response.ok) {
                showToast("Ticket updated successfully", "#008000");
            } else {
                throw new Error("Failed to update ticket");
            }
        })
        .catch((error) => {
            alert(error.message);
        });
}

// Delete ticket
function deleteTicket(ticketId) {
    const confirmDelete = window.confirm("Are you sure you want to delete this ticket?");
    if (!confirmDelete) {
        return; // Exit the function if the user cancels the deletion
    }

    fetch(`/ManageTicket/deleteTicket`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ id: ticketId }),
    })
        .then((response) => {
            if (response.ok) {
                showToast("Ticket deleted successfully", "#008000");
                loadTickets(); // Call your function to reload the tickets
            } else {
                throw new Error("Failed to delete ticket");
            }
        })
        .catch((error) => console.error("Error deleting ticket:", error));
}

// Add ticket
async function addTicket(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    const formData = new FormData(document.getElementById("ticketForm"));

    try {
        const response = await fetch("/ManageTicket/addTicket", {
            method: "POST",
            body: formData,
        });
        if (!response.ok) {
            throw new Error("Failed to add ticket");
        }
        const responseText = await response.text();
        const data = JSON.parse(responseText);

        if (data.success) {
            showToast("Ticket added successfully", "#008000");
            document.getElementById("add-ticket-modal").style.display = "none"; // Hide the modal
            loadTickets(); // Reload the tickets
        } else {
            throw new Error(data.error || "Unknown error occurred");
        }

        document.getElementById("ticketForm").reset(); // Reset the form only on success
    } catch (error) {
        console.error("Error adding ticket:", error);
        alert(error.message); // Show error message to the user
    }
}

// Show toast message
function showToast(message, backgroundColor = "#333") {
    const toast = document.createElement("div");
    toast.textContent = message;
    toast.style.position = "fixed";
    toast.style.bottom = "20px";
    toast.style.left = "50%";
    toast.style.transform = "translateX(-50%)";
    toast.style.backgroundColor = backgroundColor;
    toast.style.color = "#fff";
    toast.style.padding = "10px 20px";
    toast.style.borderRadius = "5px";
    toast.style.boxShadow = "0 0 10px rgba(0,0,0,0.1)";
    toast.style.zIndex = "1000";
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.transition = "opacity 0.5s";
        toast.style.opacity = "0";
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 500);
    }, 3000);
}
