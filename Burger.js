function openNewWindow() {
    window.open('bprize.html', '_blank'); // Opens bprize.html in a new tab/window
}

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const burgerImages = document.querySelectorAll('.burger-image');

    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();

        burgerImages.forEach(burger => {
            const burgerAltText = burger.querySelector('img').alt.toLowerCase();
            if (burgerAltText.includes(searchTerm)) {
                burger.parentElement.style.display = 'block'; // Show the burger
            } else {
                burger.parentElement.style.display = 'none'; // Hide the burger
            }
        });
    });
});
document.getElementById('backButton').onclick = function() {
    window.history.back();
};