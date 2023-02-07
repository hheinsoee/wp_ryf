// sticky top need padding cause of fixed nav
var navbar_height = document.querySelector('.navbar').offsetHeight;


var fullHeight1 = document.querySelectorAll('[hein="fullHeight1"]');
[].forEach.call(fullHeight1, function (fh) {
    fh.style.height = "calc( 100vh - " + navbar_height + "px - 5px)";
    fh.style.overflowY = "auto";
});

var fullHeight1 = document.querySelectorAll('.minFullHeight');
[].forEach.call(fullHeight1, function (fh) {
    fh.style.minHeight = "calc( 100vh - " + navbar_height + "px)";
});

var els = document.querySelectorAll('.offsetNav');
[].forEach.call(els, function (el) {
    el.style.top = navbar_height + 'px';
});







//video download
// Insert script:
(function (w, d, s, p, a, c) {
    w.sfButton = w.sfButton || function () { };
    c = d.getElementsByTagName(s)[0];
    a = d.createElement(s);
    a.async = 1;
    a.src = p;
    c.parentNode.insertBefore(a, c);
})(window, document, 'script', '//savefrom.net/js/sf-helper-agent.min.js');

// Text:
sfButton.text = 'Download';

// Styles:
sfButton.styles = {
    color: 'rgba(0,0,0,0.7)',
    textShadow: '1px 1px 1px rgba(255,255,255,0.4)',
    fontFamily: 'Arial,Helvetica,sans-serif',
    fontSize: '12px',
    borderRadius: '4px',
    backgroundColor: '#81c200',
    'background-image': '-webkit-linear-gradient(#9cd600, #69ae00)',
    'background-image': '-moz-linear-gradient(#9cd600, #69ae00)',
    'background-image': 'linear-gradient(#9cd600, #69ae00)',
    border: 'none'
};




var times = document.querySelectorAll('#postTime');

[].forEach.call(times, function (t) {
    // do whatever
    var time = t.getAttribute("time")
    t.innerHTML = utcToLocal(time);

});