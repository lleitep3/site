/**
*  Module
*
* Description
*/
angular.module('site', [])

.run(function () {

})

window.addEventListener("orientationchange", function () {
  // Announce the new orientation number
  var mql = window.matchMedia("(orientation: portrait)");
  console.log(mql);
}, false);