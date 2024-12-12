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
