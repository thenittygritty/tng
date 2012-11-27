/**
 * The Nitty Gritty
 * September 2012
 *
 * @author Kahlil Lechelt - @hellokahlil
 * @author Hans Christian Reinl - @drublic
 *
 */

(function () {

	/**
	 * Determine whether a node's text content is entirely whitespace.
	 */
	var is_all_ws = function (nod) {
		// Use ECMA-262 Edition 3 String and RegExp features
		return !(/[^\t\n\r ]/.test(nod.data));
	};


	/**
	 * Determine if a node should be ignored by the iterator functions.
	 */

	var is_ignorable = function (nod) {
		return ( nod.nodeType == 8) || // A comment node
		       ( (nod.nodeType == 3) && is_all_ws(nod) ); // a text node, all ws
	};

	/**
	 * Version of |previousSibling| that skips nodes that are entirely
	 * whitespace or comments.
	 */
	var node_before = function (sib) {
		while ((sib = sib.previousSibling)) {
			if (!is_ignorable(sib)) return sib;
		}
		return null;
	};

	// Mark all code as language
	var pre = document.querySelectorAll('pre'),
		preLength, i, language;

	for (preLength = pre.length, i = 0; i < preLength; i++) {
		language = node_before(pre[i]).firstChild.getAttribute('class');
		pre[i].className += ' ' + language;
	}

}());
