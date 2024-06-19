loadArtists();
loadAgenda();
loadTickets();
loadOverviews();

////////////SideBar/////////////////////
function showArtists() {
  document.getElementById("artists-container").style.display = "flex";
  document.getElementById("agenda-container").style.display = "none";
  document.getElementById("tickets-container").style.display = "none";
  document.getElementById("danceOverview-container").style.display = "none";
  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Artist`;
  addButton.onclick = showAddArtistForm; // Assign the onclick handler here

  loadArtists();
}

function showAgenda() {
  document.getElementById("artists-container").style.display = "none";
  document.getElementById("agenda-container").style.display = "block";
  document.getElementById("tickets-container").style.display = "none";
  document.getElementById("danceOverview-container").style.display = "none";

  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Event`;
  addButton.onclick = showAddAgendaForm; // Assign the onclick handler here

  loadAgenda();
}

function showTickets() {
  document.getElementById("artists-container").style.display = "none";
  document.getElementById("agenda-container").style.display = "none";
  document.getElementById("tickets-container").style.display = "block";
  document.getElementById("danceOverview-container").style.display = "none";

  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Ticket`;
  addButton.onclick = showAddTicketForm; // Assign the onclick handler here

  loadTickets();
}

function showOverview() {
  document.getElementById("artists-container").style.display = "none";
  document.getElementById("agenda-container").style.display = "none";
  document.getElementById("tickets-container").style.display = "none";
  document.getElementById("danceOverview-container").style.display = "block";
  const addButton = document.getElementById("add-btn");
  addButton.innerText = `Add Overview`;
  addButton.onclick = showAddOverviewForm; // Assign the onclick handler here
  loadOverviews();
}
////////////////////End of SideBar//////////////////////////

//////////////////////Adjusting the Form///////////////////////
function showAddArtistForm() {
  // Get the modal
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


//---------------------------------------------------- get data ---------------------------------------------------

let allArtists = [];
function loadArtists() {
  fetch("/ManageDance/Artists")
    .then((response) => response.json())
    .then((data) => {
      //allArtists = data; // Store all users in the array
      console.log(data);
      displayArtists(data); // Display all users by default
      console.log("Artists loaded successfully");
    })
    .catch((error) => {
      console.error("Error fetching Artists:", error);
    });
}



//---------------------------------------------------- CRUD ARTIST ---------------------------------------------------


// display all artists- ----------------------------------------------------------------------------------------------
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
    if (artist.card_image_url) {
      artistCardImage.src = `/${artist.card_image_url}`; // Set the image source
    } else {
      artistCardImage.src = "path/to/placeholder.jpg"; // Placeholder image path
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
    if (artist.artist_main_img_url) {
      artistMainImage.src = `/${artist.artist_main_img_url}`; // Set the image source
    } else {
      artistMainImage.src = "path/to/placeholder.jpg"; // Placeholder image path
      artistMainImage.alt = "Image not uploaded yet. Click to upload.";
    }
    artistMainImage.onclick = () => artistMainImageInput.click();
    card.appendChild(artistMainImage);

    const cardBody = document.createElement("div");
    cardBody.className = "card-body";

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

    const saveButton = document.createElement("button");
    saveButton.className = "btn btn-success mr-2";
    saveButton.onclick = () => saveArtist(artist.artist_id);
    saveButton.textContent = "Save";
    cardFooter.appendChild(saveButton);

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


// save edited aritst ------------------------------------------------------------------------------------------------
function saveArtist(artistId) {
  // Collect the updated artist details from the content-editable elements
  const artistNameElement = document.getElementById(`artist-name-${artistId}`);
  const artistStyleElement = document.getElementById(
    `artist-style-${artistId}`
  );
  const artistDescriptionElement = document.getElementById(
    `artist-description-${artistId}`
  );
  const artistTitleElement = document.getElementById(
    `artist-title-${artistId}`
  );
  const artistDateElement = document.getElementById(`artist-date-${artistId}`);
  const artistImageElement = document.getElementById(
    `artist-image-${artistId}`
  );

  const updatedArtist = {
    artistId: artistId,
    artistName: artistNameElement.textContent,
    style: artistStyleElement.textContent,
    description: artistDescriptionElement.textContent,
    title: artistTitleElement.textContent,
    participationDate: artistDateElement.value,
    image: artistImageElement.files[0],
  };

  // Create a FormData object to hold the updated artist details

  // Initialize FormData with the text content
  const formData = new FormData();
  formData.append("artistId", artistId);
  formData.append("artistName", artistNameElement.textContent);
  formData.append("style", artistStyleElement.textContent);
  formData.append("description", artistDescriptionElement.textContent);
  formData.append("title", artistTitleElement.textContent);
  formData.append("participationDate", artistDateElement.value);

  // Only add the image to the FormData if a new image has been selected
  if (artistImageElement.files.length > 0) {
    formData.append("image", artistImageElement.files[0]);
  }
  // Send POST request with the updated content of the updatedArtist
  fetch("/ManageDance/updateArtist", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        // console.log("Artist updated successfully");
        showToast("Artist updated successfully", "#008000");
        //     showToast("Ticket is already added to cart!", "#0000FF");

        if (artistImageElement.files.length > 0) {
          const updatedImage = document.querySelector(
            `#artist-image-${artistId}`
          );
          updatedImage.src = URL.createObjectURL(artistImageElement.files[0]);
        }
      } else {
        if (response.status === 413) {
          // If the status code is 413, throw a specific error message
          throw new Error(
            "The image file is too large. Please select a smaller file."
          );
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
      // console.error("Error updating artist:", error);
      alert(error.message);
    });
}


// delete artist ------------------------------------------------------------------------------------------------
function deleteArtist(artistId) {
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
        showToast("Artist Deleted successfully", "#008000");
      } else {
        throw new Error("Failed to delete artist");
      }
    })
    .catch((error) => console.error("Error deleting artist:", error));
}

// add artist ------------------------------------------------------------------------------------------------
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
  console.log("Form submission intercepted"); // Add this line
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
    } else {
      throw new Error(data.error || "Unknown error occurred");
    }

    document.getElementById("artistForm").reset(); // Reset the form only on success
  } catch (error) {
    console.error("Error adding artist:", error);
    alert(error.message); // Show error message to the user
  }
}

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("artistForm").addEventListener("submit", addArtist);
});





