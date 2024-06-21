loadArtists();
loadTracks();
loadVenues();
loadDanceContentHome();
loadDanceContentDetail();

// Sidebar functions
function showArtists() {
  document.getElementById("artists-container").style.display = "flex";
  document.getElementById("tracks-container").style.display = "none";
  document.getElementById("venues-container").style.display = "none";
  document.getElementById("danceContentHome-container").style.display = "none";
  document.getElementById("danceContentDetail-container").style.display = "none";

  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Artist`;
  addButton.onclick = showAddArtistForm; // Assign the onclick handler here
  loadArtists();
}

function showTracks() {
  document.getElementById("artists-container").style.display = "none";
  document.getElementById("tracks-container").style.display = "block";
  document.getElementById("venues-container").style.display = "none";
  document.getElementById("danceContentHome-container").style.display = "none";
  document.getElementById("danceContentDetail-container").style.display = "none";

  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Notable Track`;
  addButton.onclick = showAddTrackForm; // Assign the onclick handler here
  loadTracks();
}

function showVenues() {
  document.getElementById("artists-container").style.display = "none";
  document.getElementById("tracks-container").style.display = "none";
  document.getElementById("venues-container").style.display = "block";
  document.getElementById("danceContentHome-container").style.display = "none";
  document.getElementById("danceContentDetail-container").style.display = "none";


  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Venues`;
  addButton.onclick = showAddVenueForm; // Assign the onclick handler here

  loadVenues();
}

function showDanceContentHome() {
  document.getElementById("artists-container").style.display = "none";
  document.getElementById("tracks-container").style.display = "none";
  document.getElementById("venues-container").style.display = "none";
  document.getElementById("danceContentHome-container").style.display = "block";
  document.getElementById("danceContentDetail-container").style.display = "none";


  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Dance Content Home`;
  addButton.onclick = showAddDanceContentHomeForm; // Assign the onclick handler here

  loadDanceContentHome();
}

function showDanceContentDetail() {
  document.getElementById("artists-container").style.display = "none";
  document.getElementById("tracks-container").style.display = "none";
  document.getElementById("venues-container").style.display = "none";
  document.getElementById("danceContentHome-container").style.display = "none";
  document.getElementById("danceContentDetail-container").style.display = "block";

  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Dance Content Detail`;
  addButton.onclick = showAddDanceContentDetailForm;

  loadDanceContentDetail();
}


// Showing add form functions
function showAddArtistForm() {
  var modal = document.getElementById("add-artist-modal");
  var form = document.getElementById("add-artist-form");
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

function showAddTrackForm() {
  var modal = document.getElementById("add-track-modal");
  var form = document.getElementById("add-track-form");
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

function showAddVenueForm() {
  var modal = document.getElementById("add-venue-modal");
  var form = document.getElementById("add-venue-form");
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

function showAddDanceContentHomeForm() {
  var modal = document.getElementById("add-content-home-modal");
  var form = document.getElementById("add-content-home-form");
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

function showAddDanceContentDetailForm() {
  var modal = document.getElementById("add-content-detail-modal");
  var form = document.getElementById("add-content-detail-form");
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


// Get artists
function loadArtists() {
  fetch("/ManageDance/Artists")
    .then((response) => response.json())
    .then((data) => {
      displayArtists(data);
      console.log("Artists loaded successfully");
    })
    .catch((error) => {
      console.error("Error fetching Artists:", error);
    });
}

// Get notable tracks
function loadTracks() {
  fetch("/ManageDance/Tracks")
    .then((response) => response.json())
    .then((data) => {
      displayTracks(data);
      console.log("Tracks loaded successfully");
    })
    .catch((error) => {
      console.error("Error fetching tracks:", error);
    });
}

// Get venues
function loadVenues() {
  fetch("/ManageDance/Venues")
    .then((response) => response.json())
    .then((data) => {
      displayVenues(data);
      console.log("Venues loaded successfully");
    })
    .catch((error) => {
      console.error("Error fetching venues:", error);
    });
}

// Get Dance Content Home
function loadDanceContentHome() {
  fetch("/ManageDance/DanceContentHome")
    .then((response) => response.json())
    .then((data) => {
      displayDanceContentHome(data);
      console.log("Dance Content Home loaded successfully");
    })
    .catch((error) => {
      console.error("Error fetching Dance Content Home:", error);
    });
}

// Get Dance Content Detail
function loadDanceContentDetail() {
  fetch("/ManageDance/DanceContentDetail")
    .then((response) => response.json())
    .then((data) => {
      displayDanceContentDetail(data);
      console.log("Dance Content Detail loaded successfully");
    })
    .catch((error) => {
      console.error("Error fetching Dance Content Detail:", error);
    });
}

// CRUD Artist -----------------------------------------------------------------------------------------------------------------------
function displayArtists(artists) {
  const artistContainer = document.getElementById("artists-container");
  artistContainer.innerHTML = ""; // Clear existing content
  artistContainer.className = "row"; // Add Bootstrap row class

  const heading = document.createElement("h2");
  heading.textContent = "Artists"; // Set the heading text
  heading.className = "col-12 my-3"; // Add some margin
  artistContainer.appendChild(heading);

  artists.forEach((artist) => {
    const artistCard = document.createElement("div");
    artistCard.className = "artist-card col-sm-12 col-md-6 col-lg-4 mb-4"; // Add Bootstrap column and margin classes

    const card = document.createElement("div");
    card.className = "card shadow-sm"; // Add Bootstrap card and shadow classes

    // Card Image Label
    const cardImageLabel = document.createElement("div");
    cardImageLabel.className = "card-img-label text-center font-weight-bold";
    cardImageLabel.textContent = "Card Image";
    card.appendChild(cardImageLabel);

    // Card Image
    const artistCardImageInput = document.createElement("input");
    artistCardImageInput.type = "file";
    artistCardImageInput.id = `artist-card-image-${artist.artist_id}`;
    artistCardImageInput.style.display = "none";
    card.appendChild(artistCardImageInput);

    const artistCardImage = document.createElement("img");
    artistCardImage.style.width = "100%";
    artistCardImage.style.height = "200px";
    artistCardImage.style.objectFit = "cover";
    artistCardImage.id = `artist-card-image-preview-${artist.artist_id}`;
    if (artist.card_image_url) {
      artistCardImage.src = `/${artist.card_image_url}`; 
    } else {
      artistCardImage.src = "/noimagefound.jpg"; // Placeholder image path
      artistCardImage.alt = "Image not uploaded yet. Click to upload.";
    }
    artistCardImage.onclick = () => artistCardImageInput.click();
    card.appendChild(artistCardImage);

    // Main Image Label
    const mainImageLabel = document.createElement("div");
    mainImageLabel.className = "main-img-label text-center font-weight-bold mt-3";
    mainImageLabel.textContent = "Main Image";
    card.appendChild(mainImageLabel);

    // Main Image
    const artistMainImageInput = document.createElement("input");
    artistMainImageInput.type = "file";
    artistMainImageInput.id = `artist-main-image-${artist.artist_id}`;
    artistMainImageInput.style.display = "none";
    card.appendChild(artistMainImageInput);

    const artistMainImage = document.createElement("img");
    artistMainImage.style.width = "100%";
    artistMainImage.style.height = "200px";
    artistMainImage.style.objectFit = "cover";
    artistMainImage.id = `artist-main-image-preview-${artist.artist_id}`;
    if (artist.artist_main_img_url) {
      artistMainImage.src = `/${artist.artist_main_img_url}`;
    } else {
      artistMainImage.src = "/noimagefound.jpg"; // Placeholder image path
      artistMainImage.alt = "Image not uploaded yet. Click to upload.";
    }
    artistMainImage.onclick = () => artistMainImageInput.click();
    card.appendChild(artistMainImage);

    const cardBody = document.createElement("div");
    cardBody.className = "card-body";

    const artistIdLabel = document.createElement("span");
    artistIdLabel.textContent = `ID: ${artist.artist_id}`;
    artistIdLabel.className = "artist-id-label";
    cardBody.appendChild(artistIdLabel);

    const artistNameLabel = document.createElement("span");
    artistNameLabel.textContent = "Name: ";
    artistNameLabel.className = "font-weight-bold";
    cardBody.appendChild(artistNameLabel);

    const artistName = document.createElement("span");
    artistName.contentEditable = "true";
    artistName.id = `artist-name-${artist.artist_id}`;
    artistName.textContent = artist.name || "Name not provided";
    artistName.className = "ml-1";
    cardBody.appendChild(artistName);

    const artistStyleLabel = document.createElement("span");
    artistStyleLabel.textContent = "Style: ";
    artistStyleLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(artistStyleLabel);

    const artistStyle = document.createElement("span");
    artistStyle.contentEditable = "true";
    artistStyle.id = `artist-style-${artist.artist_id}`;
    artistStyle.textContent = artist.style || "Style not provided";
    artistStyle.className = "ml-1";
    cardBody.appendChild(artistStyle);

    const artistTitleLabel = document.createElement("span");
    artistTitleLabel.textContent = "Title: ";
    artistTitleLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(artistTitleLabel);

    const artistTitle = document.createElement("span");
    artistTitle.contentEditable = "true";
    artistTitle.id = `artist-title-${artist.artist_id}`;
    artistTitle.textContent = artist.title || "Title not provided";
    artistTitle.className = "ml-1";
    cardBody.appendChild(artistTitle);

    card.appendChild(cardBody);

    const cardFooter = document.createElement("div");
    cardFooter.className = "card-footer text-right";

    const updateButton = document.createElement("button");
    updateButton.className = "btn btn-success mr-2";
    updateButton.onclick = () => updateArtist(artist.artist_id);
    updateButton.textContent = "Update";
    cardFooter.appendChild(updateButton);

    const deleteButton = document.createElement("button");
    deleteButton.className = "btn btn-danger";
    deleteButton.onclick = () => deleteArtist(artist.artist_id);
    deleteButton.textContent = "Delete";
    cardFooter.appendChild(deleteButton);

    card.appendChild(cardFooter);

    artistCard.appendChild(card);
    artistContainer.appendChild(artistCard);
  });
}

function updateArtist(artistId) {
  // Collect the updated artist details from the content-editable elements
  const artistNameElement = document.getElementById(`artist-name-${artistId}`);
  const artistStyleElement = document.getElementById(`artist-style-${artistId}`);
  const artistTitleElement = document.getElementById(`artist-title-${artistId}`);
  const artistCardImageElement = document.getElementById(`artist-card-image-${artistId}`);
  const artistMainImageElement = document.getElementById(`artist-main-image-${artistId}`);

  const updatedArtist = {
    artistId: artistId,
    name: artistNameElement.textContent,
    style: artistStyleElement.textContent,
    title: artistTitleElement.textContent,
    cardImageUrl: artistCardImageElement.files[0],
    artistMainImgUrl: artistMainImageElement.files[0],
  };

  // Create a FormData object to hold the updated artist details
  const formData = new FormData();
  formData.append("artistId", artistId);
  formData.append("name", artistNameElement.textContent);
  formData.append("style", artistStyleElement.textContent);
  formData.append("title", artistTitleElement.textContent);

  // Only add the card image to the FormData if a new image has been selected
  if (artistCardImageElement.files.length > 0) {
    formData.append("card_image_url", artistCardImageElement.files[0]);
  }

  // Only add the main image to the FormData if a new image has been selected
  if (artistMainImageElement.files.length > 0) {
    formData.append("artist_main_img_url", artistMainImageElement.files[0]);
  }

  // Send POST request with the updated content of the updatedArtist
  fetch("/ManageDance/updateArtist", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        showToast("Artist updated successfully", "#008000");

        if (artistCardImageElement.files.length > 0) {
          const updatedCardImage = document.querySelector(`#artist-card-image-preview-${artistId}`);
          if (updatedCardImage) {
            updatedCardImage.src = URL.createObjectURL(artistCardImageElement.files[0]);
          }
        }

        if (artistMainImageElement.files.length > 0) {
          const updatedMainImage = document.querySelector(`#artist-main-image-preview-${artistId}`);
          if (updatedMainImage) {
            updatedMainImage.src = URL.createObjectURL(artistMainImageElement.files[0]);
          }
        }
      } else {
        if (response.status === 413) {
          // If the status code is 413, throw a specific error message
          throw new Error("The image file is too large. Please select a smaller file.");
        } else {
          // Check the Content-Type of the response
          const contentType = response.headers.get("content-type");
          if (contentType && contentType.indexOf("application/json") !== -1) {
            // If the Content-Type is JSON, parse the response body and throw an error
            return response.json().then((error) => {
              throw new Error(error.error);
            });
          } else {
            // If the Content-Type is not JSON, throw a generic error message
            throw new Error("An error occurred while updating the artist");
          }
        }
      }
    })
    .catch((error) => {
      alert(error.message);
    });
}


// delete artist function
function deleteArtist(artistId) {
  const confirmDelete = window.confirm("Are you sure you want to delete this artist?");
  if (!confirmDelete) {
    return; // Exit the function if the user cancels the deletion
  }

  const DeletedArtist = {
    artistId: artistId,
  };

  fetch(`/ManageDance/deleteArtist`, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(DeletedArtist),
  })
    .then((response) => {
      if (response.ok) {
        showToast("Artist deleted successfully", "#008000");
        // Optionally, you might want to remove the artist from the DOM here or refresh the artist list
        loadArtists(); // Call your function to reload the artists
      } else {
        throw new Error("Failed to delete artist");
      }
    })
    .catch((error) => console.error("Error deleting artist:", error));
}

// add artist function
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("artistForm");
  if (form) {
    form.addEventListener("submit", (event) => {
      console.log("Form submission detected");
      event.preventDefault(); // Prevent the default form submission behavior
      addArtist(event);
    });
  }
});

async function addArtist(event) {
  event.preventDefault(); // Prevent the default form submission behavior
  const formData = new FormData(document.getElementById("artistForm"));

  // Debugging: Log FormData contents
  console.log("FormData contents:");
  for (let [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
  }

  try {
    console.log("Sending request to add artist");
    const response = await fetch("/ManageDance/addArtist", {
      method: "POST",
      body: formData,
    });
    if (!response.ok) {
      throw new Error("Failed to add artist");
    }
    const responseText = await response.text();
    const data = JSON.parse(responseText); // Parse JSON response

    if (data.success) {
      showToast("Artist added successfully", "#008000");
      document.getElementById("add-artist-modal").style.display = "none"; // Hide the modal
      loadArtists(); // Reload the artists
    } else {
      throw new Error(data.error || "Unknown error occurred");
    }

    document.getElementById("artistForm").reset(); // Reset the form only on success
  } catch (error) {
    console.error("Error adding artist:", error);
    alert(error.message); // Show error message to the user
  }
}

// CRUD NOTABLETRACKS-----------------------------------------------------------------------------------------------------------------------
function displayTracks(tracks) {
  const trackContainer = document.getElementById("tracks-container");
  trackContainer.innerHTML = ""; // Clear existing content
  trackContainer.className = "row"; // Add Bootstrap row class

  const heading = document.createElement("h2");
  heading.textContent = "Notable Tracks"; // Set the heading text
  heading.className = "col-12 my-3"; // Add some margin
  trackContainer.appendChild(heading);

  tracks.forEach((track) => {
    const trackCard = document.createElement("div");
    trackCard.className = "track-card col-sm-12 col-md-6 col-lg-4 mb-4"; // Add Bootstrap column and margin classes

    const card = document.createElement("div");
    card.className = "card shadow-sm"; // Add Bootstrap card and shadow classes

    // Track Image
    const trackImageInput = document.createElement("input");
    trackImageInput.type = "file";
    trackImageInput.id = `track-image-${track.id}`;
    trackImageInput.style.display = "none";
    card.appendChild(trackImageInput);

    const trackImage = document.createElement("img");
    trackImage.style.width = "100%";
    trackImage.style.height = "200px";
    trackImage.style.objectFit = "cover";
    trackImage.id = `track-image-preview-${track.id}`;
    if (track.track_image) {
      trackImage.src = `/${track.track_image}`; // Set the image source
    } else {
      trackImage.src = "app/public/img/noimagefound.jpg"; // Placeholder image path
      trackImage.alt = "Image not uploaded yet.";
    }
    trackImage.onclick = () => trackImageInput.click();
    card.appendChild(trackImage);

    const cardBody = document.createElement("div");
    cardBody.className = "card-body";

    const trackIdLabel = document.createElement("span");
    trackIdLabel.textContent = `ID: ${track.id}`;
    trackIdLabel.className = "track-id-label font-weight-bold d-block";
    cardBody.appendChild(trackIdLabel);

    const artistIdLabel = document.createElement("span");
    artistIdLabel.textContent = "Artist ID: ";
    artistIdLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(artistIdLabel);

    const artistId = document.createElement("span");
    artistId.contentEditable = "true";
    artistId.id = `artist-id-${track.id}`;
    artistId.textContent = track.artist_id || "Artist ID not provided";
    artistId.className = "ml-1";
    cardBody.appendChild(artistId);

    const trackTitleLabel = document.createElement("span");
    trackTitleLabel.textContent = "Title: ";
    trackTitleLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(trackTitleLabel);

    const trackTitle = document.createElement("span");
    trackTitle.contentEditable = "true";
    trackTitle.id = `track-title-${track.id}`;
    trackTitle.textContent = track.track_title || "Title not provided";
    trackTitle.className = "ml-1";
    cardBody.appendChild(trackTitle);

    const trackUrlLabel = document.createElement("span");
    trackUrlLabel.textContent = "URL: ";
    trackUrlLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(trackUrlLabel);

    const trackUrl = document.createElement("span");
    trackUrl.contentEditable = "true";
    trackUrl.id = `track-url-${track.id}`;
    trackUrl.textContent = track.track_url || "URL not provided";
    trackUrl.className = "ml-1";
    cardBody.appendChild(trackUrl);

    card.appendChild(cardBody);

    const cardFooter = document.createElement("div");
    cardFooter.className = "card-footer text-right";

    const updateButton = document.createElement("button");
    updateButton.className = "btn btn-success mr-2";
    updateButton.onclick = () => updateTrack(track.id);
    updateButton.textContent = "Update";
    cardFooter.appendChild(updateButton);

    const deleteButton = document.createElement("button");
    deleteButton.className = "btn btn-danger";
    deleteButton.onclick = () => deleteTrack(track.id);
    deleteButton.textContent = "Delete";
    cardFooter.appendChild(deleteButton);

    card.appendChild(cardFooter);

    trackCard.appendChild(card);
    trackContainer.appendChild(trackCard);
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("trackForm");
  if (form) {
    form.addEventListener("submit", async (event) => {
      event.preventDefault(); // Prevent the default form submission behavior
      const artistIdInput = document.getElementById("new-track-artist-id");
      const artistId = artistIdInput.value;
      
      if (artistId < 1) {
        alert("Artist ID must be greater than or equal to 1.");
      } else {
        try {
          const artistName = await validateArtistId(artistId);
          showToast(`Artist ID is valid: ${artistName}`, "#008000");
          addTrack(event);
        } catch (error) {
          showToast("Validation failed: Invalid Artist ID", "#FF0000");
          console.error("Validation failed", error);
        }
      }
    });
  }
});
// add track function
async function addTrack(event) {
  event.preventDefault(); // Prevent the default form submission behavior
  const formData = new FormData(document.getElementById("trackForm"));

  // Debugging: Log FormData contents
  console.log("FormData contents:");
  for (let [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
  }

  try {
    console.log("Sending request to add track");
    const response = await fetch("/ManageDance/addTrack", {
      method: "POST",
      body: formData,
    });
    if (!response.ok) {
      throw new Error("Failed to add track");
    }
    const responseText = await response.text();
    const data = JSON.parse(responseText); // Parse JSON response

    if (data.success) {
      showToast("Track added successfully", "#008000");
      document.getElementById("add-track-modal").style.display = "none"; // Hide the modal
      loadTracks(); // Reload the tracks
    } else {
      throw new Error(data.error || "Unknown error occurred");
    }

    document.getElementById("trackForm").reset(); // Reset the form only on success
  } catch (error) {
    console.error("Error adding track:", error);
    alert(error.message); // Show error message to the user
  }
}

// update track function

function updateTrack(id) {
  // Collect the updated track details from the content-editable elements
  const artistIdElement = document.getElementById(`artist-id-${id}`);
  const trackTitleElement = document.getElementById(`track-title-${id}`);
  const trackUrlElement = document.getElementById(`track-url-${id}`);
  const trackImageElement = document.getElementById(`track-image-${id}`);

  // Check if elements exist before accessing their properties
  if (!artistIdElement || !trackTitleElement || !trackUrlElement || !trackImageElement) {
    console.error("One or more elements not found");
    return;
  }

  const updatedTrack = {
    id: id,
    artist_id: artistIdElement.textContent,
    track_title: trackTitleElement.textContent,
    track_url: trackUrlElement.textContent,
    track_image: trackImageElement.files[0],
  };

  // Create a FormData object to hold the updated track details
  const formData = new FormData();
  formData.append("id", id);
  formData.append("artist_id", artistIdElement.textContent);
  formData.append("track_title", trackTitleElement.textContent);
  formData.append("track_url", trackUrlElement.textContent);

  // Only add the track image to the FormData if a new image has been selected
  if (trackImageElement.files.length > 0) {
    formData.append("track_image", trackImageElement.files[0]);
  }

  // Send POST request with the updated content of the updatedTrack
  fetch("/ManageDance/updateTrack", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        showToast("Track updated successfully", "#008000");

        if (trackImageElement.files.length > 0) {
          const updatedTrackImage = document.querySelector(`#track-image-preview-${id}`);
          if (updatedTrackImage) {
            updatedTrackImage.src = URL.createObjectURL(trackImageElement.files[0]);
          }
        }
      } else {
        if (response.status === 413) {
          // If the status code is 413, throw a specific error message
          throw new Error("The image file is too large. Please select a smaller file.");
        } else {
          // Check the Content-Type of the response
          const contentType = response.headers.get("content-type");
          if (contentType && contentType.indexOf("application/json") !== -1) {
            // If the Content-Type is JSON, parse the response body and throw an error
            return response.json().then((error) => {
              throw new Error(error.error);
            });
          } else {
            // If the Content-Type is not JSON, throw a generic error message
            throw new Error("An error occurred while updating the track");
          }
        }
      }
    })
    .catch((error) => {
      alert(error.message);
    });
}

// delete track function

function deleteTrack(trackId) {
  const confirmDelete = window.confirm("Are you sure you want to delete this track?");
  if (!confirmDelete) {
    return; // Exit the function if the user cancels the deletion
  }

  const DeletedTrack = {
    trackId: trackId,
  };

  fetch(`/ManageDance/deleteTrack`, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(DeletedTrack),
  })
    .then((response) => {
      if (response.ok) {
        showToast("Track deleted successfully", "#008000");
        // Optionally, you might want to remove the track from the DOM here or refresh the track list
        loadTracks(); // Call your function to reload the tracks
      } else {
        throw new Error("Failed to delete track");
      }
    })
    .catch((error) => console.error("Error deleting track:", error));
}
// CRUD VENUES -----------------------------------------------------------------------------------------------------------------------

//display venues
function displayVenues(venues) {
  const venueContainer = document.getElementById("venues-container");
  venueContainer.innerHTML = ""; // Clear existing content
  venueContainer.className = "row"; // Add Bootstrap row class

  const heading = document.createElement("h2");
  heading.textContent = "Venues"; // Set the heading text
  heading.className = "col-12 my-3"; // Add some margin
  venueContainer.appendChild(heading);

  venues.forEach((venue) => {
    const venueCard = document.createElement("div");
    venueCard.className = "venue-card col-sm-12 col-md-6 col-lg-4 mb-4"; // Add Bootstrap column and margin classes

    const card = document.createElement("div");
    card.className = "card shadow-sm"; // Add Bootstrap card and shadow classes

    // Venue Image
    const venueImageInput = document.createElement("input");
    venueImageInput.type = "file";
    venueImageInput.id = `venue-image-${venue.venue_id}`;
    venueImageInput.style.display = "none";
    card.appendChild(venueImageInput);

    const venueImage = document.createElement("img");
    venueImage.style.width = "100%";
    venueImage.style.height = "200px";
    venueImage.style.objectFit = "cover";
    venueImage.id = `venue-image-preview-${venue.venue_id}`;
    if (venue.venue_img_url) {
      venueImage.src = `/${venue.venue_img_url}`; // Set the image source
    } else {
      venueImage.src = "/img/noimagefound.jpg"; // Placeholder image path
      venueImage.alt = "Image not uploaded yet. Click to upload.";
    }
    venueImage.onclick = () => venueImageInput.click();
    card.appendChild(venueImage);

    const cardBody = document.createElement("div");
    cardBody.className = "card-body";

    const venueIdLabel = document.createElement("span");
    venueIdLabel.textContent = `ID: ${venue.venue_id}`;
    venueIdLabel.className = "venue-id-label d-block";
    cardBody.appendChild(venueIdLabel);

    const venueNameLabel = document.createElement("span");
    venueNameLabel.textContent = "Name: ";
    venueNameLabel.className = "font-weight-bold";
    cardBody.appendChild(venueNameLabel);

    const venueName = document.createElement("span");
    venueName.contentEditable = "true";
    venueName.id = `venue-name-${venue.venue_id}`;
    venueName.textContent = venue.name || "Name not provided";
    venueName.className = "ml-1";
    cardBody.appendChild(venueName);

    const venueAddressLabel = document.createElement("span");
    venueAddressLabel.textContent = "Address: ";
    venueAddressLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(venueAddressLabel);

    const venueAddress = document.createElement("span");
    venueAddress.contentEditable = "true";
    venueAddress.id = `venue-address-${venue.venue_id}`;
    venueAddress.textContent = venue.address || "Address not provided";
    venueAddress.className = "ml-1";
    cardBody.appendChild(venueAddress);

    const venueDescriptionLabel = document.createElement("span");
    venueDescriptionLabel.textContent = "Description: ";
    venueDescriptionLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(venueDescriptionLabel);

    const venueDescription = document.createElement("span");
    venueDescription.contentEditable = "true";
    venueDescription.id = `venue-description-${venue.venue_id}`;
    venueDescription.textContent = venue.description || "Description not provided";
    venueDescription.className = "ml-1";
    cardBody.appendChild(venueDescription);

    card.appendChild(cardBody);

    const cardFooter = document.createElement("div");
    cardFooter.className = "card-footer text-right";

    const updateButton = document.createElement("button");
    updateButton.className = "btn btn-success mr-2";
    updateButton.onclick = () => updateVenue(venue.venue_id);
    updateButton.textContent = "Update";
    cardFooter.appendChild(updateButton);

    const deleteButton = document.createElement("button");
    deleteButton.className = "btn btn-danger";
    deleteButton.onclick = () => deleteVenue(venue.venue_id);
    deleteButton.textContent = "Delete";
    cardFooter.appendChild(deleteButton);

    card.appendChild(cardFooter);

    venueCard.appendChild(card);
    venueContainer.appendChild(venueCard);
  });
}

// add venues
document.addEventListener("DOMContentLoaded", function () {
  const venueForm = document.getElementById("venueForm");
  if (venueForm) {
    venueForm.addEventListener("submit", (event) => {
      console.log("Venue Form submission detected");
      event.preventDefault(); // Prevent the default form submission behavior
      addVenue(event);
    });
  }
});
async function addVenue(event) {
  event.preventDefault(); // Prevent the default form submission behavior
  const formData = new FormData(document.getElementById("venueForm"));

  // Debugging: Log FormData contents
  console.log("FormData contents:");
  for (let [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
  }

  try {
    console.log("Sending request to add venue");
    const response = await fetch("/ManageDance/addVenue", {
      method: "POST",
      body: formData,
    });
    if (!response.ok) {
      throw new Error("Failed to add venue");
    }
    const responseText = await response.text();
    const data = JSON.parse(responseText); // Parse JSON response

    if (data.success) {
      showToast("Venue added successfully", "#008000");
      document.getElementById("add-venue-modal").style.display = "none"; // Hide the modal
      loadVenues(); // Reload the venues
    } else {
      throw new Error(data.error || "Unknown error occurred");
    }

    document.getElementById("venueForm").reset(); // Reset the form only on success
  } catch (error) {
    console.error("Error adding venue:", error);
    alert(error.message); // Show error message to the user
  }
}

// update venue function
function updateVenue(venueId) {
  // Collect the updated venue details from the content-editable elements
  const venueNameElement = document.getElementById(`venue-name-${venueId}`);
  const venueAddressElement = document.getElementById(`venue-address-${venueId}`);
  const venueDescriptionElement = document.getElementById(`venue-description-${venueId}`);
  const venueImageElement = document.getElementById(`venue-image-${venueId}`);

  // Check if elements exist before accessing their properties
  if (!venueNameElement || !venueAddressElement || !venueDescriptionElement || !venueImageElement) {
    console.error("One or more elements not found");
    return;
  }

  const updatedVenue = {
    venueId: venueId,
    name: venueNameElement.textContent,
    address: venueAddressElement.textContent,
    description: venueDescriptionElement.textContent,
    venueImgUrl: venueImageElement.files[0],
  };

  // Create a FormData object to hold the updated venue details
  const formData = new FormData();
  formData.append("venueId", venueId);
  formData.append("name", venueNameElement.textContent);
  formData.append("address", venueAddressElement.textContent);
  formData.append("description", venueDescriptionElement.textContent);

  // Only add the venue image to the FormData if a new image has been selected
  if (venueImageElement.files.length > 0) {
    formData.append("venue_img_url", venueImageElement.files[0]);
  }

  // Send POST request with the updated content of the updatedVenue
  fetch("/ManageDance/updateVenue", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        showToast("Venue updated successfully", "#008000");

        if (venueImageElement.files.length > 0) {
          const updatedVenueImage = document.querySelector(`#venue-image-preview-${venueId}`);
          if (updatedVenueImage) {
            updatedVenueImage.src = URL.createObjectURL(venueImageElement.files[0]);
          }
        }
      } else {
        if (response.status === 413) {
          // If the status code is 413, throw a specific error message
          throw new Error("The image file is too large. Please select a smaller file.");
        } else {
          // Check the Content-Type of the response
          const contentType = response.headers.get("content-type");
          if (contentType && contentType.indexOf("application/json") !== -1) {
            // If the Content-Type is JSON, parse the response body and throw an error
            return response.json().then((error) => {
              throw new Error(error.error);
            });
          } else {
            // If the Content-Type is not JSON, throw a generic error message
            throw new Error("An error occurred while updating the venue");
          }
        }
      }
    })
    .catch((error) => {
      alert(error.message);
    });
}

// delete venue function
function deleteVenue(venueId) {
  const confirmDelete = window.confirm("Are you sure you want to delete this venue?");
  if (!confirmDelete) {
    return; // Exit the function if the user cancels the deletion
  }

  const DeletedVenue = {
    venueId: venueId,
  };

  fetch(`/ManageDance/deleteVenue`, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(DeletedVenue),
  })
    .then((response) => {
      if (response.ok) {
        showToast("Venue deleted successfully", "#008000");
        // Optionally, you might want to remove the venue from the DOM here or refresh the venue list
        loadVenues(); // Call your function to reload the venues
      } else {
        throw new Error("Failed to delete venue");
      }
    })
    .catch((error) => console.error("Error deleting venue:", error));
}

//crud dance content home-----------------------------------------------------------------------------------------------------------------------
//display dance content home
function displayDanceContentHome(data) {
  const container = document.getElementById("danceContentHome-container");
  
  // Ensure the container element exists
  if (!container) {
    console.error("Dance Content Home container element not found");
    return;
  }

  container.innerHTML = ""; // Clear existing content

  const heading = document.createElement("h2");
  heading.textContent = "Dance Content Home"; // Set the heading text
  heading.className = "col-12 my-3"; // Add some margin
  container.appendChild(heading);

  data.forEach((item) => {
    const contentCard = document.createElement("div");
    contentCard.className = "content-card col-sm-12 col-md-6 col-lg-4 mb-4"; // Add Bootstrap column and margin classes

    const card = document.createElement("div");
    card.className = "card shadow-sm"; // Add Bootstrap card and shadow classes

    // Main Image
    const mainImage = document.createElement("img");
    mainImage.style.width = "100%";
    mainImage.style.height = "200px";
    mainImage.style.objectFit = "cover";
    mainImage.id = `content-image-${item.id}`;
    mainImage.src = item.main_image_url || "app/public/img/noimagefound.jpg"; // Set the image source
    mainImage.alt = "Main image";
    card.appendChild(mainImage);

    // Main Image Input
    const mainImageInput = document.createElement("input");
    mainImageInput.type = "file";
    mainImageInput.id = `content-image-input-${item.id}`;
    mainImageInput.style.display = "none";
    card.appendChild(mainImageInput);

    // Main Image Click to Upload
    mainImage.onclick = () => mainImageInput.click();

    const cardBody = document.createElement("div");
    cardBody.className = "card-body";

    const titleLabel = document.createElement("span");
    titleLabel.textContent = "Title: ";
    titleLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(titleLabel);

    const title = document.createElement("span");
    title.contentEditable = "true";
    title.id = `introduction-title-${item.id}`;
    title.textContent = item.introduction_title || "Title not provided";
    title.className = "ml-1";
    cardBody.appendChild(title);

    const subtitleLabel = document.createElement("span");
    subtitleLabel.textContent = "Subtitle: ";
    subtitleLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(subtitleLabel);

    const subtitle = document.createElement("span");
    subtitle.contentEditable = "true";
    subtitle.id = `introduction-subtitle-${item.id}`;
    subtitle.textContent = item.introduction_subtitle || "Subtitle not provided";
    subtitle.className = "ml-1";
    cardBody.appendChild(subtitle);

    const textLabel = document.createElement("span");
    textLabel.textContent = "Text: ";
    textLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(textLabel);

    const text = document.createElement("span");
    text.contentEditable = "true";
    text.id = `introduction-text-${item.id}`;
    text.textContent = item.introduction_text || "Text not provided";
    text.className = "ml-1";
    cardBody.appendChild(text);

    card.appendChild(cardBody);

    const cardFooter = document.createElement("div");
    cardFooter.className = "card-footer text-right";

    const updateButton = document.createElement("button");
    updateButton.className = "btn btn-success mr-2";
    updateButton.onclick = () => updateDanceContentHome(item.id);
    updateButton.textContent = "Update";
    cardFooter.appendChild(updateButton);

    const deleteButton = document.createElement("button");
    deleteButton.className = "btn btn-danger";
    deleteButton.onclick = () => deleteDanceContentHome(item.id);
    deleteButton.textContent = "Delete";
    cardFooter.appendChild(deleteButton);

    card.appendChild(cardFooter);

    contentCard.appendChild(card);
    container.appendChild(contentCard);
  });
}

// Add Dance Content Home function
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contentHomeForm");
  if (form) {
    form.addEventListener("submit", (event) => {
      console.log("Form submission detected");
      event.preventDefault(); // Prevent the default form submission behavior
      addDanceContentHome(event);
    });
  }
});
async function addDanceContentHome(event) {
  event.preventDefault(); // Prevent the default form submission behavior
  const formData = new FormData(document.getElementById("contentHomeForm"));

  // Debugging: Log FormData contents
  console.log("FormData contents:");
  for (let [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
  }

  try {
    console.log("Sending request to add content");
    const response = await fetch("/ManageDance/addDanceContentHome", {
      method: "POST",
      body: formData,
    });
    if (!response.ok) {
      throw new Error("Failed to add content");
    }
    const responseText = await response.text();
    const data = JSON.parse(responseText); // Parse JSON response

    if (data.success) {
      showToast("Content added successfully", "#008000");
      document.getElementById("add-content-home-modal").style.display = "none"; // Hide the modal
      loadDanceContentHome(); // Reload the contents
    } else {
      throw new Error(data.error || "Unknown error occurred");
    }

    document.getElementById("contentHomeForm").reset(); // Reset the form only on success
  } catch (error) {
    console.error("Error adding content:", error);
    alert(error.message); // Show error message to the user
  }
}

// Update Dance Content Home function


function updateDanceContentHome(id) {
  // Collect the updated content details from the content-editable elements
  const contentTitleElement = document.getElementById(`introduction-title-${id}`);
  const contentSubtitleElement = document.getElementById(`introduction-subtitle-${id}`);
  const contentTextElement = document.getElementById(`introduction-text-${id}`);
  const contentImageInput = document.getElementById(`content-image-input-${id}`);

  if (!contentTitleElement || !contentSubtitleElement || !contentTextElement || !contentImageInput) {
    console.error("One or more elements not found");
    return;
  }

  const updatedContent = {
    id: id,
    introduction_title: contentTitleElement.textContent,
    introduction_subtitle: contentSubtitleElement.textContent,
    introduction_text: contentTextElement.textContent,
    main_image_url: contentImageInput.files.length > 0 ? contentImageInput.files[0] : null,
  };

  // Create a FormData object to hold the updated content details
  const formData = new FormData();
  formData.append("id", id);
  formData.append("introduction_title", updatedContent.introduction_title);
  formData.append("introduction_subtitle", updatedContent.introduction_subtitle);
  formData.append("introduction_text", updatedContent.introduction_text);

  // Only add the main image to the FormData if a new image has been selected
  if (updatedContent.main_image_url) {
    formData.append("main_image_url", updatedContent.main_image_url);
  }

  // Send POST request with the updated content of the updatedContent
  fetch("/ManageDance/updateDanceContentHome", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        showToast("Content updated successfully", "#008000");

        if (updatedContent.main_image_url) {
          const updatedContentImage = document.querySelector(`#content-image-${id}`);
          if (updatedContentImage) {
            updatedContentImage.src = URL.createObjectURL(updatedContent.main_image_url);
          }
        }
      } else {
        if (response.status === 413) {
          // If the status code is 413, throw a specific error message
          throw new Error("The image file is too large. Please select a smaller file.");
        } else {
          // Check the Content-Type of the response
          const contentType = response.headers.get("content-type");
          if (contentType && contentType.indexOf("application/json") !== -1) {
            // If the Content-Type is JSON, parse the response body and throw an error
            return response.json().then((error) => {
              throw new Error(error.error);
            });
          } else {
            // If the Content-Type is not JSON, throw a generic error message
            throw new Error("An error occurred while updating the content");
          }
        }
      }
    })
    .catch((error) => {
      alert(error.message);
    });
}

// Delete Dance Content Home function
function deleteDanceContentHome(contentId) {
  const confirmDelete = window.confirm("Are you sure you want to delete this content?");
  if (!confirmDelete) {
    return; // Exit the function if the user cancels the deletion
  }

  const deletedContent = {
    id: contentId,
  };

  fetch(`/ManageDance/deleteDanceContentHome`, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(deletedContent),
  })
    .then((response) => {
      if (response.ok) {
        showToast("Content deleted successfully", "#008000");
        loadDanceContentHome(); // Call your function to reload the contents
      } else {
        throw new Error("Failed to delete content");
      }
    })
    .catch((error) => console.error("Error deleting content:", error));
}


// CRUD DANCE CONTENT DETAIL-----------------------------------------------------------------------------------------------------------------------

function displayDanceContentDetail(data) {
  const container = document.getElementById("danceContentDetail-container");
  container.innerHTML = ""; // Clear existing content

  const heading = document.createElement("h2");
  heading.textContent = "Dance Content Detail"; // Set the heading text
  heading.className = "col-12 my-3"; // Add some margin
  container.appendChild(heading);

  data.forEach((item) => {
    const contentCard = document.createElement("div");
    contentCard.className = "content-card col-sm-12 col-md-6 col-lg-4 mb-4"; // Add Bootstrap column and margin classes

    const card = document.createElement("div");
    card.className = "card shadow-sm"; // Add Bootstrap card and shadow classes

    // Description Image
    const descriptionImage = document.createElement("img");
    descriptionImage.style.width = "100%";
    descriptionImage.style.height = "200px";
    descriptionImage.style.objectFit = "cover";
    descriptionImage.id = `content-image-preview-${item.id}`;
    descriptionImage.src = item.description_image || "app/public/img/noimagefound.jpg"; // Set the image source
    descriptionImage.alt = "Description image";
    card.appendChild(descriptionImage);

    const descriptionImageInput = document.createElement("input");
    descriptionImageInput.type = "file";
    descriptionImageInput.id = `content-image-${item.id}`;
    descriptionImageInput.style.display = "none";
    card.appendChild(descriptionImageInput);

    const cardBody = document.createElement("div");
    cardBody.className = "card-body";

    const artistIdLabel = document.createElement("span");
    artistIdLabel.textContent = "Artist ID: ";
    artistIdLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(artistIdLabel);

    const artistId = document.createElement("span");
    artistId.contentEditable = "true";
    artistId.id = `content-artist-id-${item.id}`;
    artistId.textContent = item.artist_id || "Artist ID not provided";
    artistId.className = "ml-1";
    cardBody.appendChild(artistId);

    const descriptionBodyLabel = document.createElement("span");
    descriptionBodyLabel.textContent = "Description: ";
    descriptionBodyLabel.className = "font-weight-bold d-block mt-2";
    cardBody.appendChild(descriptionBodyLabel);

    const descriptionBody = document.createElement("span");
    descriptionBody.contentEditable = "true";
    descriptionBody.id = `content-body-${item.id}`;
    descriptionBody.textContent = item.description_body || "Description not provided";
    descriptionBody.className = "ml-1";
    cardBody.appendChild(descriptionBody);

    card.appendChild(cardBody);

    const cardFooter = document.createElement("div");
    cardFooter.className = "card-footer text-right";

    const updateButton = document.createElement("button");
    updateButton.className = "btn btn-success mr-2";
    updateButton.onclick = () => updateDanceContentDetail(item.id);
    updateButton.textContent = "Update";
    cardFooter.appendChild(updateButton);

    const deleteButton = document.createElement("button");
    deleteButton.className = "btn btn-danger";
    deleteButton.onclick = () => deleteDanceContentDetail(item.id);
    deleteButton.textContent = "Delete";
    cardFooter.appendChild(deleteButton);

    card.appendChild(cardFooter);

    contentCard.appendChild(card);
    container.appendChild(contentCard);
  });
}

function updateDanceContentDetail(id) {
  // Collect the updated content details from the content-editable elements
  const contentArtistIdElement = document.getElementById(`content-artist-id-${id}`);
  const contentBodyElement = document.getElementById(`content-body-${id}`);
  const contentImageElement = document.getElementById(`content-image-${id}`);

  // Ensure the elements exist
  if (!contentArtistIdElement || !contentBodyElement || !contentImageElement) {
    console.error("One or more elements not found");
    return;
  }

  const updatedContent = {
    id: id,
    artist_id: contentArtistIdElement.textContent,
    description_body: contentBodyElement.textContent,
    description_image: contentImageElement.files[0],
  };

  // Create a FormData object to hold the updated content details
  const formData = new FormData();
  formData.append("id", id);
  formData.append("artist_id", contentArtistIdElement.textContent);
  formData.append("description_body", contentBodyElement.textContent);

  // Only add the description image to the FormData if a new image has been selected
  if (contentImageElement.files.length > 0) {
    formData.append("description_image", contentImageElement.files[0]);
  }

  // Send POST request with the updated content of the updatedContent
  fetch("/ManageDance/updateDanceContentDetail", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        showToast("Content updated successfully", "#008000");

        if (contentImageElement.files.length > 0) {
          const updatedContentImage = document.querySelector(`#content-image-preview-${id}`);
          if (updatedContentImage) {
            updatedContentImage.src = URL.createObjectURL(contentImageElement.files[0]);
          }
        }
      } else {
        if (response.status === 413) {
          // If the status code is 413, throw a specific error message
          throw new Error("The image file is too large. Please select a smaller file.");
        } else {
          // Check the Content-Type of the response
          const contentType = response.headers.get("content-type");
          if (contentType && contentType.indexOf("application/json") !== -1) {
            // If the Content-Type is JSON, parse the response body and throw an error
            return response.json().then((error) => {
              throw new Error(error.error);
            });
          } else {
            // If the Content-Type is not JSON, throw a generic error message
            throw new Error("An error occurred while updating the content");
          }
        }
      }
    })
    .catch((error) => {
      alert(error.message);
    });
}



document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contentDetailForm");
  if (form) {
      form.addEventListener("submit", async (event) => {
          console.log("Form submission detected");
          event.preventDefault(); // Prevent the default form submission behavior
          
          const artistId = document.getElementById("new-content-detail-artist-id").value;
          
          try {
              const artistName = await validateArtistId(artistId);
              showToast(`Artist ID is valid: ${artistName}`, "#008000");
              addDanceContentDetail(event); // Proceed with adding the content detail
          } catch (error) {
              console.error("Validation failed", error);
          }
      });
  }
});

function addDanceContentDetail(event) {
  const formData = new FormData(document.getElementById("contentDetailForm"));

  fetch("/ManageDance/addDanceContentDetail", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast("Dance Content Detail added successfully", "#008000");
        loadDanceContentDetail();
      } else {
        showToast("Error adding Dance Content Detail: " + data.error, "#FF0000");
      }
    })
    .catch((error) => {
      console.error("Error adding Dance Content Detail:", error);
    });
}

function deleteDanceContentDetail(id) {
  const userConfirmed = confirm("Are you sure you want to delete this Dance Content Detail?");
  if (!userConfirmed) {
      return;
  }

  fetch(`/ManageDance/deleteDanceContentDetail`, {
      method: "POST",
      headers: {
          "Content-Type": "application/json"
      },
      body: JSON.stringify({ id: id })
  })
  .then(response => response.json())
  .then(data => {
      if (data.error) {
          throw new Error(data.error);
      } else {
          showToast("Dance Content Detail deleted successfully", "#008000");
          loadDanceContentDetail(); // Refresh the data
      }
  })
  .catch(error => {
      showToast(`Error deleting Dance Content Detail: ${error.message}`, "#FF0000");
  });
}


// show toast message function
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

function validateArtistId(artistId) {
  return fetch(`/ManageDance/getArtistById`, {
      method: "POST",
      headers: {
          "Content-Type": "application/json"
      },
      body: JSON.stringify({ id: artistId })
  })
  .then(response => response.json())
  .then(data => {
      if (data.error) {
          throw new Error(data.error);
      } else {
          return data.name; // Assuming the response includes the artist's name
      }
  })
  .catch(error => {
      showToast(`Artist ID is invalid: ${error.message}`, "#FF0000");
      throw error;
  });
}
