<?php
include __DIR__ . '/../header.php';
?>
    <link href="/css/manage-dance-style.css" rel="stylesheet">

    <div class="container dance-management-form-container">
    <h1 class="dance-management-form-title">Add New Artist</h1>
    <form action="create_artist.php" method="post" enctype="multipart/form-data">
        <label for="name" class="dance-management-form-label">Name:</label>
        <input type="text" id="name" name="name" required class="dance-management-form-input">

        <label for="style" class="dance-management-form-label">Style:</label>
        <input type="text" id="style" name="style" required class="dance-management-form-input">

        <label for="title" class="dance-management-form-label">Title:</label>
        <input type="text" id="title" name="title" required class="dance-management-form-input">

        <label for="cardImage" class="dance-management-form-label">Card Image URL:</label>
        <input type="file" id="cardImage" name="card_image_url" class="dance-management-form-input">

        <label for="mainImage" class="dance-management-form-label">Main Image URL:</label>
        <input type="file" id="mainImage" name="artist_main_img_url" class="dance-management-form-input">

        <button type="submit" name="submit" class="dance-management-form-button">Add Artist</button>
    </form>
</div>


    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('form').on('submit', function(e) {
            e.preventDefault(); // Prevent the normal form submission

            var formData = new FormData(this); // Create a FormData object

            $.ajax({
                url: 'create_artist.php', // The PHP file that processes the form data
                type: 'POST',
                data: formData,
                contentType: false, // Required for 'multipart/form-data' type forms
                processData: false, // Required for 'multipart/form-data' type forms
                success: function(response) {
                    alert(response); // Alert the response from the server
                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + xhr.responseText);
                }
            });
        });
    });
    </script>


    </div>
<?php
include __DIR__ . '/../footer.php';
?>