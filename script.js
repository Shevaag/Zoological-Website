/*Swiper buttons-Gallery*/
var swiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    loop: true, /*it will automatically go back to the first slide*/
});

/*Popup-Animal info*/
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function () {
        const popupId = this.id.replace('openPopup', 'popup');
        const popup = document.getElementById(popupId);
        popup.style.display = 'flex';
    });
});
/*Popup closing*/
document.querySelectorAll('.popup .close').forEach(closeBtn => {
    closeBtn.addEventListener('click', function () {
        const popup = this.closest('.popup');
        popup.style.display = 'none';
    });
});
/*Popup closes when clicked outside*/
document.addEventListener('click', function (event) {
    if (event.target.classList.contains('popup')) {
        event.target.style.display = 'none';
    }
});

/* Search Bar-Events */
function searchEvents() {
    const searchInput = document.getElementById('eventSearch').value.toLowerCase(); // Get the value from the search input

    const eventBoxes = document.querySelectorAll('.event-box'); // Get all event boxes

    // Loop through each event box
    eventBoxes.forEach(box => {
        // Get the event title and description text
        const title = box.querySelector('.event-title').textContent.toLowerCase();
        const description = box.querySelector('.event-description').textContent.toLowerCase();

        // Check if the search input matches the event title or description
        if (title.includes(searchInput) || description.includes(searchInput)) {
            // If it matches, display the box
            box.style.display = 'block';
        } else {
            // Otherwise, hide the box
            box.style.display = 'none';
        }
    });
}

