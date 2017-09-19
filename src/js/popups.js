// Initialize Variables
var closePopup = [document.getElementById("popupclose"), document.getElementById("popupclose-button")];
var overlay = document.getElementById("overlay");
var popup = document.getElementById("popup");
var addButton = document.getElementById("add");

// "Close" Popup Event
for (var i = 0; i < closePopup.length; i++){
	closePopup[i].onclick = function() {
		overlay.className = '';
		popup.className = popup.className.replace( /(?:^|\s)show(?!\S)/g ,'');
	};
}

// "Add" Popup Event
addButton.onclick = function() {
	overlay.className = 'show';
	popup.className += 'show';
}