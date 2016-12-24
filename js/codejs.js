
$(document).ready(function() {
  var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});

	// build scenes
	new ScrollMagic.Scene({triggerElement: "#parallax1"})
					.setTween("#parallax1 > div", {y: "60%", ease: Linear.easeNone})
					.addIndicators()
					.addTo(controller);

});
