$(document).ready(function(){
	//Check if first time site viewer otherwise use existing cookie
	var firstVisit = $.cookie('firstVisitCookie') ? $.cookie('firstVisitCookie') : moment()._d;
	var differenceHours = moment().diff(firstVisit, 'hours');
	var booksSold = 4400 - (differenceHours * 3);

    //Set cookie using firstVisit var
    $.cookie("firstVisitCookie", firstVisit, { expires: 1000 });

	//Set cookie using booksSold var
    $.cookie("booksSoldCookie", booksSold, { expires: 1000 });

    $('.modal-trigger').leanModal();

    $('.scrollspy').scrollSpy();

    $('[data-uk-scrollspy]').on('inview.uk.scrollspy', function(){
		function animateValue(id, start, end, duration) {
		    // assumes integer values for start and end
		    
		    var obj = document.getElementById(id);
		    var range = end - start;
		    // no timer shorter than 50ms (not really visible any way)
		    var minTimer = 50;
		    // calc step time to show all interediate values
		    var stepTime = Math.abs(Math.floor(duration / range));
		    
		    // never go below minTimer
		    stepTime = Math.max(stepTime, minTimer);
		    
		    // get current time and calculate desired end time
		    var startTime = new Date().getTime();
		    var endTime = startTime + duration;
		    var timer;
		  
		    function run() {
		        var now = new Date().getTime();
		        var remaining = Math.max((endTime - now) / duration, 0);
		        var value = Math.round(end - (remaining * range));
		        obj.innerHTML = value;
		        if (value == end) {
		            clearInterval(timer);
	        }
	    }
	    
	    timer = setInterval(run, stepTime);
	    run();
	}

	animateValue("value", 100, $.cookie('booksSoldCookie'), 2000);
	});
});

UIkit.on('beforeready.uk.dom', function () {
	if (UIkit.$win.width() < 767) {
		UIkit.$('[data-uk-scrollspy]').removeAttr('data-uk-scrollspy');
	}
});