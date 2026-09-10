$(document).ready(function(){  
	 
		$('#slider2').anythingSlider({
				mode                : 'f',   // fade mode - new in v1.8!
				resizeContents      : false, // If true, solitary images/objects in the panel will expand to fit the viewport
				navigationSize      : 3,     // Set this to the maximum number of visible navigation tabs; false to disable
				navigationFormatter : function(index, panel){ // Format navigation labels with text
					return ['Recipe', 'Quote', 'Image', 'Quote #2', 'Image #2'][index - 1];
				},
				onSlideBegin: function(e,slider) {
					// keep the current navigation tab in view
					slider.navWindow( slider.targetPage );
				}
			});

	});

 



 

	 
		