/**
 * The Nitty Gritty
 * September 2012
 *
 * @author Kahlil Lechelt - @hellokahlil
 * @author Hans Christian Reinl - @drublic
 *
 */

(function () {

	'use strict';

	/**
	 * Determine whether a node's text content is entirely whitespace.
	 */
	var isAllWs = function (nod) {
		// Use ECMA-262 Edition 3 String and RegExp features
		return !(/[^\t\n\r ]/.test(nod.data));
	};


	/**
	 * Determine if a node should be ignored by the iterator functions.
	 */

	var isIgnorable = function (nod) {
		return (nod.nodeType === 8) || // A comment node
		       ( (nod.nodeType === 3) && isAllWs(nod) ); // a text node, all ws
	};

	/**
	 * Version of |previousSibling| that skips nodes that are entirely
	 * whitespace or comments.
	 */
	var nodeBefore = function (sib) {
		while ((sib = sib.previousSibling)) {
			if (!isIgnorable(sib)) {
				return sib;
			}
		}
		return null;
	};

	// Mark all code as language
	var preLength, i, language, node,
	    pre = document.querySelectorAll('pre');

	for (preLength = pre.length, i = 0; i < preLength; i++) {
		node = nodeBefore(pre[i]).firstChild;
		if (node.getAttribute) {
			language = node.getAttribute('class');
			pre[i].className += ' ' + language;
		}
	}

}());
