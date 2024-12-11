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

//for search button
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

//for keyboard
// Reference the keyboard, search bar, and output area
const keyboard = document.getElementById('keyboard');
const search = document.getElementById('search');
const output = search; // Output is set to the search bar input

// Initially hide the keyboard
keyboard.style.display = 'none';

// Show the keyboard when the search bar is focused
search.addEventListener('focus', () => {
    keyboard.style.display = 'block';
});

// Hide the keyboard when clicking outside
document.addEventListener('click', (event) => {
    if (!keyboard.contains(event.target) && event.target !== search) {
        keyboard.style.display = 'none';
    }
});

// Handle keyboard button clicks
keyboard.addEventListener('click', (event) => {
    if (event.target.tagName === 'BUTTON') {
        const key = event.target.textContent;

        if (key === 'Backspace') {
            output.value = output.value.slice(0, -1);
        } else if (key === 'space') {
            output.value += ' ';
        } else if (key === 'ENTER') {
            // You can handle ENTER key functionality here (e.g., form submission)
            console.log('Enter pressed');
        } else if (key === 'Tab') {
            // Prevent default Tab behavior and add a tab space
            output.value += '\t';
        } else if (key === 'caps') {
            // Toggle case functionality for caps lock
            toggleCapsLock();
        } else {
            output.value += key;
        }
    }
});

// Function to toggle Caps Lock
let isCapsLock = false;
function toggleCapsLock() {
    isCapsLock = !isCapsLock;
    const keys = keyboard.querySelectorAll('button:not(.back, .space, .tab, .cap, .ent-btn, .shift, .other)');
    keys.forEach((key) => {
        key.textContent = isCapsLock
            ? key.textContent.toUpperCase()
            : key.textContent.toLowerCase();
    });
}
