<?php
include __DIR__ . '/../header.php';
?>
<link href="/css/admin/danceadmin.css" rel="stylesheet">

<div class="parent-container">
    <div class="sidebar">
        <a href="#" onclick="showTickets()">Tickets</a> <!-- Added link for Tickets -->
    </div>

    <div class="main-container">
        <button id="add-btn" type="button" class="btn btn-success"></button>
        <div id="tickets-container"></div> <!-- Added container for Tickets -->
    </div>

    <div id="add-ticket-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="add-ticket-form" style="display:none;">
                <h3>Add New Ticket</h3>
                <form id="ticketForm" enctype="multipart/form-data" method="POST" class="p-3">
                    <div class="mb-3">
                        <label for="new-ticket-name" class="form-label">Ticket Name</label>
                        <input type="text" id="new-ticket-name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-category" class="form-label">Category</label>
                        <select id="new-ticket-category" name="category" class="form-control" required>
                            <option value="DANCE">DANCE</option>
                            <option value="HISTORY">HISTORY</option>
                            <option value="YUMMY">YUMMY</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-type" class="form-label">Type</label>
                        <input type="text" id="new-ticket-type" name="type" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-quantity" class="form-label">Quantity Available</label>
                        <input type="number" id="new-ticket-quantity" name="quantity_available" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-price" class="form-label">Price</label>
                        <input type="number" step="0.01" id="new-ticket-price" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-location" class="form-label">Location</label>
                        <input type="text" id="new-ticket-location" name="location" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-duration" class="form-label">Duration</label>
                        <input type="number" id="new-ticket-duration" name="duration" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-datetime" class="form-label">Date Time</label>
                        <input type="datetime-local" id="new-ticket-datetime" name="date_time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-restaurant-name" class="form-label">Restaurant Name</label>
                        <input type="text" id="new-ticket-restaurant-name" name="restaurant_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-star" class="form-label">Star</label>
                        <input type="number" id="new-ticket-star" name="star" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-food-type" class="form-label">Food Type</label>
                        <input type="text" id="new-ticket-food-type" name="food_type" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-language" class="form-label">Language</label>
                        <input type="text" id="new-ticket-language" name="language" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-guide" class="form-label">Guide</label>
                        <input type="text" id="new-ticket-guide" name="guide" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new-ticket-artist" class="form-label">Artist</label>
                        <input type="text" id="new-ticket-artist" name="artist" class="form-control">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script src="/js/manageTicket.js"></script>
<?php
include __DIR__ . '/../footer.php';
?>
