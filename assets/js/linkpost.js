window['w00t!'] = {
	version: 1.8,
	init: function() {
		'use strict';

		var bm = window['w00t!'];

		console.log('w00t! This shit is loaded and working!');
		bm.appendDiv();
		bm.getSelectionHtml();

	},
	appendDiv: function() {
		'use strict';
		var BM        = window['w00t!'];
		var div       = document.createElement("div");
		var input     = document.createElement("input");
		var textarea  = document.createElement("textarea");
		var content   = document.createTextNode("Hi there and greetings!");
		var selection = BM.getSelectionHtml();

		textarea.type = "text";

		div = BM.setStyle(div, {
			position: 'absolute',
			top: 0,
			right: 0,
			backgroundColor: 'white'
		});

		input = BM.setStyle(input, {
			display: 'block',
			width: '500px'
		});

		textarea = BM.setStyle(textarea, {
			display: 'block',
			width: '500px',
			height: '400px'
		});


		console.log(selection);
		if (selection) {
			textarea.value = '> ' + selection;
		}
		div.appendChild(content); // add the text node to the newly created div.
		div.appendChild(input);
		div.appendChild(textarea);

		// add the newly created element and its content into the DOM
		document.body.insertBefore(div);
		var loadingMsg = document.getElementById('tng-linkpost-wait');
		loadingMsg.style.display = 'none';
	},
	getSelectionHtml: function() {
		'use strict';

	    var selection = window.getSelection();
        var txt = selection.toString();

        return txt;
	},
	setStyle: function(el, styleObj) {
		'use strict';

		for (var style in styleObj) {
			el.style[style] = styleObj[style];
		}

		return el;
	}
};
