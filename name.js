<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", () => {
    const keyboard = document.getElementById("keyboard");
    const inputs = document.querySelectorAll("input[type='text']");

    // Show keyboard when input is focused
    inputs.forEach(input => {
        input.addEventListener("focus", () => {
            keyboard.style.display = "block";
        });
    });

    // Hide keyboard when clicking outside inputs
    document.addEventListener("click", (event) => {
        if (!event.target.closest("input") && !event.target.closest("#keyboard")) {
            keyboard.style.display = "none";
        }
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const keyboard = document.querySelector(".keyboard");
    const inputs = document.querySelectorAll("input[type='text']");
    let activeInput = null;
    let isCapsLock = false;

    // Show the keyboard when an input field gains focus
    inputs.forEach(input => {
        input.addEventListener("focus", () => {
            keyboard.style.display = "block";
            activeInput = input; // Track the active input field
        });
    });

    // Hide the keyboard when clicking outside the keyboard or inputs
    document.addEventListener("click", (event) => {
        if (!event.target.closest("input") && !event.target.closest(".keyboard")) {
            keyboard.style.display = "none";
            activeInput = null;
        }
    });

    // Handle keyboard button clicks
    keyboard.addEventListener("click", (event) => {
        if (!activeInput || event.target.tagName !== "BUTTON") return;

        const key = event.target.textContent.trim();

        switch (key) {
            case "Backspace":
                activeInput.value = activeInput.value.slice(0, -1);
                break;
            case "ENTER":
                // Add a newline or trigger form submission logic
                activeInput.value += "\n";
                break;
            case "Tab":
                activeInput.value += "    "; // Simulate a tab space
                break;
            case "caps":
                isCapsLock = !isCapsLock;
                toggleCapsLock();
                break;
            case "Shift":
                // You can implement additional Shift functionality if needed
                break;
            case "space":
                activeInput.value += " ";
                break;
            default:
                const char = isCapsLock ? key.toUpperCase() : key.toLowerCase();
                activeInput.value += char;
                break;
        }
    });

    // Toggle Caps Lock styling and behavior
    function toggleCapsLock() {
        const capsButton = document.querySelector(".cap");
        if (isCapsLock) {
            capsButton.classList.add("active");
        } else {
            capsButton.classList.remove("active");
        }
    }
});
=======
document.addEventListener("DOMContentLoaded", () => {
    const keyboard = document.getElementById("keyboard");
    const inputs = document.querySelectorAll("input[type='text']");

    // Show keyboard when input is focused
    inputs.forEach(input => {
        input.addEventListener("focus", () => {
            keyboard.style.display = "block";
        });
    });

    // Hide keyboard when clicking outside inputs
    document.addEventListener("click", (event) => {
        if (!event.target.closest("input") && !event.target.closest("#keyboard")) {
            keyboard.style.display = "none";
        }
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const keyboard = document.querySelector(".keyboard");
    const inputs = document.querySelectorAll("input[type='text']");
    let activeInput = null;
    let isCapsLock = false;

    // Show the keyboard when an input field gains focus
    inputs.forEach(input => {
        input.addEventListener("focus", () => {
            keyboard.style.display = "block";
            activeInput = input; // Track the active input field
        });
    });

    // Hide the keyboard when clicking outside the keyboard or inputs
    document.addEventListener("click", (event) => {
        if (!event.target.closest("input") && !event.target.closest(".keyboard")) {
            keyboard.style.display = "none";
            activeInput = null;
        }
    });

    // Handle keyboard button clicks
    keyboard.addEventListener("click", (event) => {
        if (!activeInput || event.target.tagName !== "BUTTON") return;

        const key = event.target.textContent.trim();

        switch (key) {
            case "Backspace":
                activeInput.value = activeInput.value.slice(0, -1);
                break;
            case "ENTER":
                // Add a newline or trigger form submission logic
                activeInput.value += "\n";
                break;
            case "Tab":
                activeInput.value += "    "; // Simulate a tab space
                break;
            case "caps":
                isCapsLock = !isCapsLock;
                toggleCapsLock();
                break;
            case "Shift":
                // You can implement additional Shift functionality if needed
                break;
            case "space":
                activeInput.value += " ";
                break;
            default:
                const char = isCapsLock ? key.toUpperCase() : key.toLowerCase();
                activeInput.value += char;
                break;
        }
    });

    // Toggle Caps Lock styling and behavior
    function toggleCapsLock() {
        const capsButton = document.querySelector(".cap");
        if (isCapsLock) {
            capsButton.classList.add("active");
        } else {
            capsButton.classList.remove("active");
        }
    }
});
>>>>>>> dbb7dc2609d2cd34728694a58f58ed2fceb97c1f