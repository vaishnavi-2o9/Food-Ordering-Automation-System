function openNewWindow() {
    window.open('cake.html', '_blank'); // Opens cake.html in a new tab/window
}

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const cakeImages = document.querySelectorAll('.cake-image');

    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();

         cakeImages.forEach(cake => {
            const cakeAltText = cake.querySelector('img').alt.toLowerCase();
            if (cakeAltText.includes(searchTerm)) {
                cake.parentElement.style.display = 'block'; // Show the cake
            } else {
                cake.parentElement.style.display = 'none'; // Hide the cake
            }
        });
    });
});
document.getElementById('backButton').onclick = function() {
    window.history.back();
};