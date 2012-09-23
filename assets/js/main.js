/**
 * The Nitty Gritty
 * September 2012
 *
 * @author Kahlil Lechelt - @hellokahlil
 * @author Hans Christian Reinl - @drublic
 *
 */

(function ($) {

	// Mark all code as language
	var pre = $('pre'),
		preLength, i, language;

	for (preLength = pre.length, i = 0; i < preLength; i++) {
		language = $(pre[i]).prev().children('span').attr('class');
		$(pre[i]).addClass(language);
	}

}(Zepto));
