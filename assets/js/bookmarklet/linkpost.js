;(function(window) {
	'use strict';

	// Name your space.
	var MyNamespace = 'w00t!';
	var config = window[ MyNamespace ].config;

	config.postUrl = 'http://' + config.domain + '/linkpost/';

	// BM for bookmarklet.
	var BM = window[ MyNamespace ] = {
		version: '1.8.1',
		config: config,
		init: function() {

			// Success!
			console.log('w00t! This shit is loaded and working!');

			BM.appendForm();

			var inputTitle = document.getElementById('inputtitle');
			inputTitle.select();
		},
		appendForm: function() {
			// Set variables for form elements.
			var div, h1, textarea, form, buttonWrap, button, logoSpan;
			var inputStyles, inputUrl, inputTitle, inputAuthor;
			var headline   = document.createTextNode("Edit Your Linkpost");
			var logo       = document.createTextNode("//");
			var buttonText = document.createTextNode("Create Linkpost");
			var selection  = BM.getSelectionHtml();
			var url	       = window.location;

			// Create and style your elements
			div = BM.getStyledElement('div', {
				font: '300 14px/18px "Helvetica Neue", "Helvetica", sans-serif',
				'box-sizing': 'boder-box',
				position: 'fixed',
				'background-color': '#f7f6f3',
				height: '616px',
				'z-index': 99999,
				padding: '15px',
				'font-weight': '400',
                width: '100%',
                'max-width': '500px',
                top: '20px',
                left: 0,
                right: 0,
                bottom: 0,
                margin: 'auto',
                '-webkit-box-shadow': '0 1px 3px rgba(0, 0, 0, 0.5)',
                'box-shadow': '0 1px 3px rgba(0, 0, 0, 0.5)',
                'border-radius': '5px',
                float: 'none'
			});

			h1 = BM.getStyledElement('h1', {
				display: 'block',
				font: 'bold 20px/24px "Helvetica Neue", "Helvetica", sans-serif',
				'color': '#5b88bb',
				'margin': '0 0 15px 0',
				'text-transform': 'none',
                float: 'none'
			});

			logoSpan = BM.getStyledElement('span', {
				color: '#e02d0d',
				font: '300 20px/24px "Helvetica Neue", "Helvetica", sans-serif',
				'font-weight': 'bold',
				'padding-right': '10px',
                float: 'none'
			});

			// Set general styles for input elements.
			inputStyles = {
				font: '300 14px/18px "Helvetica Neue", "Helvetica", sans-serif',
				'box-sizing': 'border-box',
				padding: '5px',
				display: 'block',
				width: '500px',
				'margin-bottom': '10px',
				border: '1px solid #ccc',
				margin: '0 0 15px 0',
				'border-radius': '2px',
                float: 'none'
			};

			inputUrl    = BM.getStyledElement('input', inputStyles);
			inputTitle  = BM.getStyledElement('input', inputStyles);
			inputAuthor = BM.getStyledElement('input', inputStyles);

			textarea = BM.getStyledElement('textarea', {
				font: '300 14px/18px "Helvetica Neue", "Helvetica", sans-serif',
				'box-sizing': 'border-box',
				margin: 0,
				display: 'block',
				width: '100%',
				height: '400px',
				border: '1px solid #ccc',
				'border-radius': '2px',
                float: 'none'
			});

			// The form element.
			form = BM.getStyledElement('form');

			// The submit button.
			buttonWrap = BM.getStyledElement('div', {
				display: 'block',
				height: '28px',
				position: 'relative'
			});
			button = BM.getStyledElement('button', {
				font: '300 14px/18px "Helvetica Neue", "Helvetica", sans-serif',
				display: 'block',
				'margin-top': '15px',
				'background-color': '#e02d0d',
				'color': 'white',
				border: 'none',
				'border-radius': '2px',
				'padding': '5px',
				position: 'absolute',
				right: '0',
                float: 'none'
			});
			// Add event listener and set callback.
			button.addEventListener('click', BM.createLinkPost);

			// Edit the attributes.
			// Only add content to the textarea if there was a selection.
			if (selection) {
				textarea.value = '> ' + selection;
			}

			div.id                  = 'linkpostformcontainer';
			form.id                 = 'linkpostform';
			// Title
			inputTitle.name         = 'title';
			inputTitle.type         = 'text';
			inputTitle.value        = document.title;
			inputTitle.placeholder  = 'Title';
			inputTitle.id           = 'inputtitle';
			// URL
			inputUrl.value          = url;
			inputUrl.name           = 'link';
			inputUrl.type           = 'text';
			inputUrl.placeholder    = 'URL';
			// Author
			inputAuthor.name        = 'author';
			inputAuthor.type        = 'text';
			console.log('undefined?', window[ MyNamespace ].config);
			inputAuthor.value       = window[ MyNamespace ].config.author;
			inputAuthor.placeholder = 'Author';
			// Textarea
			textarea.name           = 'text';

			// Append the text nodes.
			div.appendChild(form);
			logoSpan.appendChild(logo);
			h1.appendChild(logoSpan);
			h1.appendChild(headline);
			button.appendChild(buttonText);

			// Append the elements.
			form.appendChild(h1);
			form.appendChild(inputTitle);
			form.appendChild(inputUrl);
            form.appendChild(inputAuthor);
			form.appendChild(textarea);
			buttonWrap.appendChild(button);
			form.appendChild(buttonWrap);

			// Add the newly created elements and content to the DOM.
			document.body.insertBefore(div);
		},
		getSelectionHtml: function() {
			var selection = window.getSelection();
			var txt       = selection.toString();

	        return txt;
		},
		getStyledElement: function(type, styleObj) {
			var el   = document.createElement(type);

			el.style.cssText = '';

			if (styleObj !== undefined) {
				for (var style in styleObj) {
					el.style.cssText += style + ':' + styleObj[style] + ' !important;';
				}
			}

			// el.style.cssText = font;

			return el;
		},
		createLinkPost: function(e) {

			// AJAX Formsubmit Framework by Mozilla
			// https://developer.mozilla.org/en-US/docs/DOM/XMLHttpRequest/Using_XMLHttpRequest
			var ajaxSubmit = (function () {

				function ajaxSuccess () {
					console.log('AJAXSubmit - Success!');
					/* you can get the serialized data through the "submittedData" custom property: */
					/* alert(JSON.stringify(this.submittedData)); */
				}

				function submitData (oData) {
				    /* the AJAX request... */
				    var oAjaxReq = new XMLHttpRequest();
				    oAjaxReq.submittedData = oData;
				    oAjaxReq.onload = ajaxSuccess;
				    if (oData.technique === 0) {
						/* method is GET */
						oAjaxReq.open("get", oData.receiver.replace(/(?:\?.*)?$/, oData.segments.length > 0 ? "?" + oData.segments.join("&") : ""), true);
						oAjaxReq.send(null);
				    } else {
						/* method is POST */
						oAjaxReq.open("post", oData.receiver, true);
						if (oData.technique === 3) {
					        /* enctype is multipart/form-data */
					        var sBoundary = "---------------------------" + Date.now().toString(16);
					        oAjaxReq.setRequestHeader("Content-Type", "multipart\/form-data; boundary=" + sBoundary);
					        oAjaxReq.sendAsBinary("--" + sBoundary + "\r\n" + oData.segments.join("--" + sBoundary + "\r\n") + "--" + sBoundary + "--\r\n");
						} else {
					        /* enctype is application/x-www-form-urlencoded or text/plain */
					        oAjaxReq.setRequestHeader("Content-Type", oData.contentType);
					        oAjaxReq.send(oData.segments.join(oData.technique === 2 ? "\r\n" : "&"));
						}
					}
				}

				function processStatus (oData) {
					if (oData.status > 0) { return; }
					/* the form is now totally serialized! do something before sending it to the server... */
					/* doSomething(oData); */
					/* console.log("AJAXSubmit - The form is now serialized. Submitting..."); */
					submitData (oData);
				}

				function pushSegment (oFREvt) {
					this.owner.segments[this.segmentIdx] += oFREvt.target.result + "\r\n";
					this.owner.status--;
					processStatus(this.owner);
				}

				function plainEscape (sText) {
					/* how should I treat a text/plain form encoding? what characters are not allowed? this is what I suppose...: */
					/* "4\3\7 - Einstein said E=mc2" ----> "4\\3\\7\ -\ Einstein\ said\ E\=mc2" */
					return sText.replace(/[\s\=\\]/g, "\\$&");
				}

				function SubmitRequest (oTarget) {
				    var nFile, sFieldType, oField, oSegmReq, oFile, bIsPost = oTarget.method.toLowerCase() === "post";
				    /* console.log("AJAXSubmit - Serializing form..."); */
				    this.contentType = bIsPost && oTarget.enctype ? oTarget.enctype : "application\/x-www-form-urlencoded";
				    this.technique = bIsPost ? this.contentType === "multipart\/form-data" ? 3 : this.contentType === "text\/plain" ? 2 : 1 : 0;
				    this.receiver = oTarget.action;
				    this.status = 0;
				    this.segments = [];
				    var fFilter = this.technique === 2 ? plainEscape : escape;
				    for (var nItem = 0; nItem < oTarget.elements.length; nItem++) {
						oField = oTarget.elements[nItem];
						if (!oField.hasAttribute("name")) { continue; }
						sFieldType = oField.nodeName.toUpperCase() === "INPUT" ? oField.getAttribute("type").toUpperCase() : "TEXT";
						if (sFieldType === "FILE" && oField.files.length > 0) {
							if (this.technique === 3) {
								/* enctype is multipart/form-data */
								for (nFile = 0; nFile < oField.files.length; nFile++) {
									oFile = oField.files[nFile];
									oSegmReq = new FileReader();
									/* (custom properties:) */
									oSegmReq.segmentIdx = this.segments.length;
									oSegmReq.owner = this;
									/* (end of custom properties) */
									oSegmReq.onload = pushSegment;
									this.segments.push("Content-Disposition: form-data; name=\"" + oField.name + "\"; filename=\""+ oFile.name + "\"\r\nContent-Type: " + oFile.type + "\r\n\r\n");
									this.status++;
									oSegmReq.readAsBinaryString(oFile);
								}
							}
							else {
								/* enctype is application/x-www-form-urlencoded or text/plain or method is GET: files will not be sent! */
								for (nFile = 0; nFile < oField.files.length; this.segments.push(fFilter(oField.name) + "=" + fFilter(oField.files[nFile++].name)));
							}
						}
						else if ((sFieldType !== "RADIO" && sFieldType !== "CHECKBOX") || oField.checked) {
							/* field type is not FILE or is FILE but is empty */
							this.segments.push(
								this.technique === 3 ? /* enctype is multipart/form-data */
							    "Content-Disposition: form-data; name=\"" + oField.name + "\"\r\n\r\n" + oField.value + "\r\n"
							  	: /* enctype is application/x-www-form-urlencoded or text/plain or method is GET */
							    fFilter(oField.name) + "=" + fFilter(oField.value)
							);
						}
			    	}
			    	processStatus(this);
				}

			  return function (oFormElement) {
			    if (!oFormElement.action) { return; }
			    new SubmitRequest(oFormElement);
			  };

			})();

			var form    = document.getElementById('linkpostform');

			form.action  = window[ MyNamespace ].config.postUrl;
			form.method  = 'get';
			form.enctype = 'application/x-www-form-urlencoded';

			ajaxSubmit(form);

			var el        = document.getElementById('linkpostformcontainer');
			var dimmerdiv = document.getElementById('dimmerdiv');
            document.body.removeChild(el);
            document.body.removeChild(dimmerdiv);

			e.preventDefault();
		}
	};
}(window));
