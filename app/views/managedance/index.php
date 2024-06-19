<?php
include __DIR__ . '/../header.php';
?>
<link href="/css/admin/danceadmin.css" rel="stylesheet">


<div class="parent-container">
    <div class="sidebar">
        <a href="#" onclick="showArtists()">Artists</a>
        <a href="#" onclick="showAgenda()">Notable Tracks</a>
        <a href="#" onclick="showTickets()">Venues</a>
        <a href="#" onclick="showOverview()">Content Main Page</a>
    </div>

    <div class="main-container">
        <button id="add-btn" type="button" class="btn btn-success "></button>
        <div id="artists-container"></div>
        <div id="agenda-container"></div>
        <div id="tickets-container"></div>
        <div id="danceOverview-container" class="row"></div>

    </div>

    <div id="add-artist-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="add-artist-form" style="display:none;">
            <h3>Add New Artist</h3>
            <form id="artistForm" enctype="multipart/form-data" method="POST" class="p-3">
                <div class="mb-3">
                    <label for="new-artist-name" class="form-label">Artist Name</label>
                    <input type="text" id="new-artist-name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="new-artist-style" class="form-label">Style</label>
                    <input type="text" id="new-artist-style" name="style" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="new-artist-title" class="form-label">Title</label>
                    <input type="text" id="new-artist-title" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="new-artist-card-image" class="form-label">Card Image</label>
                    <input type="file" id="new-artist-card-image" name="card_image_url" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="new-artist-main-image" class="form-label">Main Image</label>
                    <input type="file" id="new-artist-main-image" name="artist_main_img_url" class="form-control" accept="image/*" required>
                </div>
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>


<script src="/js/manageDance.js"></script>
<!-- 
<?
include __DIR__ . '/../footer.php';
?> -->