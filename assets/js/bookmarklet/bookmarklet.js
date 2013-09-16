javascript:(function(window){

'use strict';

// Name your space
var MyNamespace = 'w00t!';

// avoid the bookmarklet activating more than once
if ( window[ MyNamespace ] ) {
    // You can access the namespace here
    // allowing the bookmark to be used multiple times on one page if needed
    // https://twitter.com/dbushell/status/260375185289535488
    window[ MyNamespace ].init();

    return;
}
window[ MyNamespace ] = {
	config: {
		author: 'kahlil-lechelt',
		domain: 'tng.dev',
		scriptUrl: 'http://tng.dev/assets/js/bookmarklet/linkpost.min.js'
	}
};

// Set version.
var version = '1.8.1';

// Loading text and dimmer div.
var loadingTxt = document.createTextNode( 'Loading' );
var loadingEl  = document.createElement( 'h1' );
var dimmerDiv  = document.createElement( 'div' );

loadingEl.appendChild( loadingTxt );
loadingEl.id = 'loadingtxt';
loadingEl.style.cssText = 'z-index: 99998; position: fixed; top: 50%; left: 50%;' +
	'width: 100px; margin-left: -50px; height: 24px; margin-top: -12px;' +
	'text-align: center; display: block;' +
	'font: normal 20px/24px "Helvetica Neue", "Helvetica", sans-serif;';

dimmerDiv.style.cssText = 'position: fixed; z-index: 99997; background-color: white;' +
	'opacity: 0.5; height: 100%; width: 100%; position: fixed;' +
	'top: 0; left: 0; float: none;';
dimmerDiv.id = 'dimmerdiv';
dimmerDiv.appendChild( loadingEl );
document.body.insertBefore( dimmerDiv );

// Load script.
var script  = document.createElement( 'script' );

script.setAttribute( 'type', 'text/javascript' );
script.setAttribute( 'charset', 'UTF-8' );
script.setAttribute( 'src', window[ MyNamespace ].config.scriptUrl + '?r=' + Math.random() );
document.documentElement.appendChild( script );

script.onload = script.onreadystatechange = function() {
    var rs = script.readyState;
    if ( !rs || rs === 'loaded' || rs === 'complete' ) {
        script.onload = script.onreadystatechange = null;

        // initialise or warn if older version
        console.log(version, window[ MyNamespace ].version);
        if ( version !== window[ MyNamespace ].version ) {
            window.alert( 'This bookmarklet is out of date!' );
        } else {
			dimmerDiv.removeChild( loadingEl );
            window[ MyNamespace ].init();
        }
    }
};
}(window));


