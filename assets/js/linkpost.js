window['w00t!'] = {
	version: 1.6,
	init: function() {
		'use strict';

		console.log('w00t! This shit is loaded and working!');
		window['w00t!'].appendDiv();
		window['w00t!'].getSelectionHtml();

	},
	appendDiv: function() {
		'use strict';

		var div     = document.createElement("div");
		var input   = document.createElement("input");
		var content = document.createTextNode("Hi there and greetings!");

		div.style.position        = 'absolute';
		div.style.top             = 0;
		div.style.right           = 0;
		div.style.backgroundColor = 'white';

		div.appendChild(content); // add the text node to the newly created div.
		div.appendChild(input);

		// add the newly created element and its content into the DOM
		document.body.insertBefore(div);
	},
	getSelectionHtml: function() {
		'use strict';

	    var selection = window.getSelection();
        var txt = selection.toString();
        alert(txt);
	}
};
