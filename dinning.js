// Automatically speak when the page loads
window.addEventListener('load', function() {
    var speech = new SpeechSynthesisUtterance();
    speech.text = 'Welcome to our Food Factory. Please select the start option to place your order and Experience our delicious dishes and recipes.';
    speech.lang = 'en-US';
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;
    
    // Get the list of available voices
    var voices = window.speechSynthesis.getVoices();
    
    // Find a male voice
    var maleVoice = voices.find(voice => voice.name.includes('Male'));
    
    // If a male voice is found, set it as the voice for the speech
    if (maleVoice) {
        speech.voice = maleVoice;
    }
    
    // Wait for the voices to be loaded before speaking
    if (speechSynthesis.getVoices().length === 0) {
        speechSynthesis.onvoiceschanged = function() {
            window.speechSynthesis.speak(speech);
        };
    } else {
        window.speechSynthesis.speak(speech);
    }
});

document.getElementById('start').addEventListener('click', function() {
    window.location.href = 'menu.html';
});