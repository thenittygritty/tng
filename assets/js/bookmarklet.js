javascript:(function(){

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
window[ MyNamespace ] = {};

var version = 1.6;
var script  = document.createElement( 'script' );

script.setAttribute( 'type', 'text/javascript' );
script.setAttribute( 'charset', 'UTF-8' );
script.setAttribute( 'src', '//tng.local:8888/assets/js/linkpost.js?r=' + Math.random() );
document.documentElement.appendChild( script );

script.onload = script.onreadystatechange = function() {
    var rs = script.readyState;
    if ( !rs || rs === 'loaded' || rs === 'complete' ) {
        script.onload = script.onreadystatechange = null;

        // initialise or warn if older version
        console.log(version, window[ MyNamespace ].version);
        if ( version !== window[ MyNamespace ].version ) {
            alert( 'This bookmarklet is out of date!' );
        } else {
            window[ MyNamespace ].init();
        }
    }
};
}());



javascript:(function(){var a="w00t!";if(window[a])return window[a].init(),void 0;window[a]={};var b=1.8,c=document.createElement("script"),d=document.createElement("div"),e=document.createTextNode("Yo, traveller! The main script is loading. Please stand by...");d.id="tng-linkpost-wait",d.style.position="absolute",d.style.right="20px",d.style.top="20px",d.style.padding="20px",d.style.background="rgba(0,0,0, 0.5)",d.style.width="200px",d.style.color="#fff",d.style.zIndex="9999999",d.appendChild(e),document.body.appendChild(d),c.setAttribute("type","text/javascript"),c.setAttribute("charset","UTF-8"),c.setAttribute("src","//tng.local:8888/assets/js/linkpost.js?r="+Math.random()),document.documentElement.appendChild(c),c.onload=c.onreadystatechange=function(){var d=c.readyState;d&&"loaded"!==d&&"complete"!==d||(c.onload=c.onreadystatechange=null,console.log(b, window[ a ].version),b!==window[a].version?alert("This bookmarklet is out of date!"):window[a].init())}})();
