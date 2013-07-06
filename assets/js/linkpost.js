window['w00t!'] = {
	version: 1.8,
	init: function() {
		'use strict';

		console.log('w00t! This shit is loaded and working!');
		window['w00t!'].appendDiv();
		window['w00t!'].getSelectionHtml();

		var request = new XMLHttpRequest();
		request.open('GET', 'http://tng.local:8888/linkpost?link=http://bla.com&title=The Title', false);
		request.send(); // because of "false" above, will block until the request is done
		                // and status is available. Not recommended, however it works for simple cases.

		if (request.status === 200) {
			console.log(request.responseText);
		}

	},
	appendDiv: function() {
		'use strict';

		// Create all DOM elements needed.
		var div       = document.createElement("div");
		var br        = document.createElement("br");
		var input     = document.createElement("input");
		var text      = document.createElement("textfield");
		var content   = document.createTextNode("Hi there and greetings!");

		// Set attributes.
		input.type = "text";

		// Set styles for containing div.
		div.style.position        = 'absolute';
		div.style.top             = 0;
		div.style.right           = 0;
		div.style.backgroundColor = 'white';
		// Set styles for input.
		text.style.width          = '250px';
		text.style.height         = '150px';

		// Append all the things to the DOM.
		div.appendChild(content);
		div.appendChild(br);
		div.appendChild(input);
		div.appendChild(br);
		div.appendChild(text);

		// add the newly created element and its content into the DOM
		document.body.insertBefore(div);
		var loadingMsg = document.getElementById('tng-linkpost-wait');
		loadingMsg.style.display = 'none';
	},
	getSelectionHtml: function() {
		'use strict';

	    var selection = window.getSelection();
        var txt = selection.toString();
        alert(txt);
	}
};
