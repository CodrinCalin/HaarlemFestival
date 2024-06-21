<?php
include __DIR__ . '/../header.php';
?>
<link href="/css/admin/danceadmin.css" rel="stylesheet">

<div class="parent-container">
    <div class="sidebar">
        <a href="#" onclick="showArtists()">Artists</a>
        <a href="#" onclick="showTracks()">Notable Tracks</a>
        <a href="#" onclick="showVenues()">Venues</a>
        <a href="#" onclick="showDanceContentHome()">Content Main Page</a>
        <a href="#" onclick="showDanceContentDetail()">Dance Content Detail</a>
    </div>

    <div class="main-container">
        <button id="add-btn" type="button" class="btn btn-success"></button>
        <div id="artists-container"></div>
        <div id="tracks-container"></div>
        <div id="venues-container"></div>
        <div id="danceContentHome-container"></div>
        <div id="danceContentDetail-container"></div>
    </div>

    <!-- Modal for adding new artist -->
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

    <!-- Modal for adding Notable Tracks -->
    <div id="add-track-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="add-track-form" style="display:none;">
                <h3>Add New Track</h3>
                <form id="trackForm" enctype="multipart/form-data" method="POST" class="p-3">
                    <div class="mb-3">
                        <label for="new-track-artist-id" class="form-label">Artist ID</label>
                        <input type="number" id="new-track-artist-id" name="artist_id" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-track-title" class="form-label">Track Title</label>
                        <input type="text" id="new-track-title" name="track_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-track-url" class="form-label">Track URL</label>
                        <input type="url" id="new-track-url" name="track_url" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-track-image" class="form-label">Track Image</label>
                        <input type="file" id="new-track-image" name="track_image" class="form-control" accept="image/*" required>
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for adding new venue -->
    <div id="add-venue-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="add-venue-form" style="display:none;">
                <h3>Add New Venue</h3>
                <form id="venueForm" enctype="multipart/form-data" method="POST" class="p-3">
                    <div class="mb-3">
                        <label for="new-venue-name" class="form-label">Venue Name</label>
                        <input type="text" id="new-venue-name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-venue-address" class="form-label">Address</label>
                        <input type="text" id="new-venue-address" name="address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-venue-description" class="form-label">Description</label>
                        <textarea id="new-venue-description" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="new-venue-image" class="form-label">Venue Image</label>
                        <input type="file" id="new-venue-image" name="venue_img_url" class="form-control" accept="image/*" required>
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for adding new dance content home -->
    <div id="add-content-home-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="add-content-home-form" style="display:none;">
                <h3>Add New Dance Content Home</h3>
                <form id="contentHomeForm" enctype="multipart/form-data" method="POST" class="p-3">
                    <div class="mb-3">
                        <label for="new-content-home-main-image" class="form-label">Main Image</label>
                        <input type="file" id="new-content-home-main-image" name="main_image_url" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-content-home-title" class="form-label">Title</label>
                        <input type="text" id="new-content-home-title" name="introduction_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-content-home-subtitle" class="form-label">Subtitle</label>
                        <input type="text" id="new-content-home-subtitle" name="introduction_subtitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-content-home-text" class="form-label">Introduction Text</label>
                        <textarea id="new-content-home-text" name="introduction_text" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for adding new dance content detail -->
    <div id="add-content-detail-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="add-content-detail-form" style="display:none;">
                <h3>Add New Dance Content Detail</h3>
                <form id="contentDetailForm" enctype="multipart/form-data" method="POST" class="p-3">
                    <div class="mb-3">
                        <label for="new-content-detail-artist-id" class="form-label">Artist ID</label>
                        <input type="number" id="new-content-detail-artist-id" name="artist_id" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-content-detail-description-image" class="form-label">Description Image</label>
                        <input type="file" id="new-content-detail-description-image" name="description_image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-content-detail-description-body" class="form-label">Description Body</label>
                        <textarea id="new-content-detail-description-body" name="description_body" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/js/manageDance.js"></script>
<?php
include __DIR__ . '/../footer.php';
?>
