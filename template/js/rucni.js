$(document).ready(function() {
			$("#splash").zAccordion({
				timeout: 4500,
				speed: 500,
				slideClass: 'slide',
				animationStart: function () {
					$('#splash').find('li.slide-previous div').fadeOut();
				},
				animationComplete: function () {
					$('#splash').find('li.slide-open div').fadeIn();
				},
				buildComplete: function () {
					$('#splash').find('li.slide-closed div').css('display', 'none');
					$('#splash').find('li.slide-open div').fadeIn();
				},
				startingSlide: 1,
				slideWidth: 600,
				width: 900,
				height: 310
			});
		});