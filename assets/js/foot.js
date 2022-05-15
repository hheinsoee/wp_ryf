
var times = document.querySelectorAll('#postTime');

[].forEach.call(times, function(t) {
  // do whatever
  var time = t.getAttribute("time")
  t.innerHTML = utcToLocal(time);

});