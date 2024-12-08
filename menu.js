function openNewWindow() {
    // Aapke requirement ke hisaab se nayi window/URL open karna
    const urlMapping = {
        "burger.jpeg": "burgerDetails.html",
        "cheeseburger.jpeg": "cheeseBurgerDetails.html",
        "veggie burger.webp": "veggieBurgerDetails.html",
        "chilli cheese burger.jpg": "chilliCheeseBurgerDetails.html",
        "avocado bacon burger.jpg": "avocadoBaconBurgerDetails.html",
        "bbq bacon burger.jpeg": "bbqBaconBurgerDetails.html",
        "mushroom swiss burger.jpg": "mushroomSwissBurgerDetails.html",
        "burger.webp": "oldFashionBurgerDetails.html",
        "double cheeseburger.jpeg": "doubleCheeseBurgerDetails.html"
    };

    // Image element jo click hua hai, use event ke through identify karna
    const clickedImage = event.target.src.split('/').pop(); // image ka naam extract karna

    // URL mapping se matching URL lena
    const redirectUrl = urlMapping[clickedImage];

    // Agar URL mile, toh us page par redirect karein
    if (redirectUrl) {
        window.location.href = redirectUrl;
    } else {
        console.error("No URL mapped for this image.");
    }
}

//when we click on images the new page open
function openNewWindow() {
    window.location.href = 'bprize.html'; // Replace with your target HTML page
} 
document.getElementById('search-button').addEventListener('click', function() {
    const searchQuery = document.getElementById('search').value.toLowerCase();
    const allImages = document.querySelectorAll('.dishes-image');
    
    allImages.forEach(function(image) {
        const details = image.querySelector('.details').textContent.toLowerCase();
        
        // Check if the search query matches any part of the image's details
        if (details.includes(searchQuery)) {
            image.style.display = 'block';  // Show the matching image
        } else {
            image.style.display = 'none';   // Hide non-matching images
        }
    });
});

// prize page
function navigateToPage(pages) {
    window.location.href = pages; // Redirects to the specified page in the same window
}

