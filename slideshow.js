let duration = 8; // duration in seconds
let fadeAmount = 0.2; // fade duration amount relative to the time the image is visible

$(document).ready(function () {
  let images = $(".slideshow div");
  let numImages = images.length;
  let imageTime = duration * 1000; // time the image is visible 
  let fadeTime = imageTime * fadeAmount; // time for cross fading
  let visibleTime = imageTime  - (imageTime * fadeAmount * 2);// time the image is visible with opacity == 1
  let animDelay = visibleTime * (numImages - 1) + fadeTime * (numImages - 2); // animation delay/offset for a single image 
  
  images.each(function( index, element ) {
    if (index != 0) {
      $(element).css("opacity","0");
      setTimeout(function() {
        doAnimationLoop(element,fadeTime, visibleTime, fadeTime, animDelay);
      }, visibleTime*index + fadeTime*(index-1));
    } else {
      setTimeout(function() {
        $(element).animate({ opacity:0 },fadeTime, function() {
          setTimeout(function() {
            doAnimationLoop(element,fadeTime, visibleTime, fadeTime, animDelay);
          }, animDelay )
        });
      }, visibleTime);
    }
  });
});

// creates a animation loop
function doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime) {
  fadeInOut(element, fadeInTime, visibleTime, fadeOutTime ,function() {
    setTimeout(function() {
      doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime);
    }, pauseTime);
  });
}

// shorthand for in- and out-fading
function fadeInOut(element, fadeIn, visible, fadeOut, onComplete) {
  return $(element).animate({ opacity:1 }, fadeIn ).delay( visible ).animate({ opacity:0 }, fadeOut, onComplete);
}