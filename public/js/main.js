$(function(){

	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});



	$("#navHandle").on("click",function(){
		$(".container nav").slideToggle();
	});

	var opts = {
	  lines: 5 // The number of lines to draw
	, length: 0 // The length of each line
	, width: 52 // The line thickness
	, radius: 48 // The radius of the inner circle
	, scale: 1.25 // Scales overall size of the spinner
	, corners: 1 // Corner roundness (0..1)
	, color: '#000' // #rgb or #rrggbb or array of colors
	, opacity: 0.35 // Opacity of the lines
	, rotate: 16 // The rotation offset
	, direction: 1 // 1: clockwise, -1: counterclockwise
	, speed: 1.3 // Rounds per second
	, trail: 79 // Afterglow percentage
	, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
	, zIndex: 2e9 // The z-index (defaults to 2000000000)
	, className: 'spinner' // The CSS class to assign to the spinner
	, top: '54%' // Top position relative to parent
	, left: '50%' // Left position relative to parent
	, shadow: true // Whether to render a shadow
	, hwaccel: false // Whether to use hardware acceleration
	, position: 'absolute' // Element positioning
	}

	$('.nav-type').on('click', function(e){
		e.preventDefault();

		var url = $(this).attr('href');
		History.pushState(null, null, url);
		

		History.Adapter.bind(window,'statechange',function(){
	        var State = History.getState(); 
	        var spinner = new Spinner(opts).spin();
			$('.main.group').append(spinner.el);

			$.get(State.url, function(res){
				$('.main.group').empty().append(res);
			});
	    });

	});

	//tinymce.init({
	//	selector: '#bla'
	//});


	$('[data-editable]').each(function(i,el){

		var url = $(el).data('url');
		var options = {
			type: "textarea",
			cssclass: "editable",
			onblur: 'submit',
			submit: 'Ok',
			submitdata: {
				_method: "PUT",
				_token: $('#token').text(),
				column: $(el).data('editable')
			}


		};
		
		$(el).editable(url, options);

	});

	$(document).on('DOMNodeInserted', function(e){

		if($(e.target).hasClass('editable')){

			tinymce.init({selector: '.editable textarea'});

		}

	});
});


