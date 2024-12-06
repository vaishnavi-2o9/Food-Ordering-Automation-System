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
