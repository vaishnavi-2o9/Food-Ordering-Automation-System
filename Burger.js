function openNewWindow(name, price) {
    // Open cprize.html in a new window with item details as URL parameters
    window.open(`cprize.html?name=${encodeURIComponent(name)}&price=${price}`, '_blank', 'width=600,height=400');
}
zz