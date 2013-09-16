;(function(window, $) {
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

			BM.appendForm();

			var form = $('#tngbookmarklet');
			var button = form.find('#tngbm-button');
			button.on('click', BM.createLinkPost);

			var closelink = form.find('.closelink');
			closelink.on('click', function(e) {
				BM.destroyBookmarklet();
				e.preventDefault();
			})

			var inputTitle = document.getElementById('inputtitle');
			console.log(inputTitle);
			inputTitle.select();
		},
		appendForm: function() {

			var selection = BM.getSelectionHtml();
			if (selection) {
				selection = '> ' + selection + '\n\n';
			}
			else {
				selection = '';
			}
			var template = window.JST['assets/js/bookmarklet/templates/form.hbs'];
			var context  = {
				postUrl: window[ MyNamespace ].config.postUrl,
				author: window[ MyNamespace ].config.author,
				title: document.title,
				link: window.location,
				selection: selection
			};
			var linkpostform = template(context);
			console.log(linkpostform);
			// Add the newly created elements and content to the DOM.
			$(linkpostform).appendTo('body');
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

			var formContainer = $('#tngbookmarklet');
			var form          = formContainer.find('#linkpostform');

			$.post(window[ MyNamespace ].config.postUrl, form.serialize(), function(response) {
				console.log(response);
			});

			BM.destroyBookmarklet();

			e.preventDefault();
		},
		destroyBookmarklet: function() {
			$('#dimmerdiv').remove();
			$('#tngbookmarklet').remove();
		}
	};
}(window, Zepto));
