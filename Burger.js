

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
        window.location.href = "bprize.html";
    } else {
        console.error("No URL mapped for this image.");
    }
}