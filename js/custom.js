/*changing background color whenscrolling*/
/**************************/
/**************************/
$(document).ready(function () {
	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		if (scroll > 630) {
			$(".main-navbar").removeClass('hidden');
		}
		else {
			$(".main-navbar").addClass('hidden');
			$(".main-navbar").addClass('navbar-fixed-top');

		}
	})
})
//smooth scroll
$(document).ready(function () {
	// Add smooth scrolling to all links
	$("a").on('click', function (event) {

		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();

			// Store hash
			var hash = this.hash;

			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function () {

				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			});
		} // End if
	});
});
/******open dropdownmenu on hover*******/
//$('.main-navbar .container .navbar-collapse .navbar-nav .dropdown').hover(function(){
//$(this).toggleClass('open');
//})
/**************************************/

//initialize all tooltips on a page
$(document).ajaxComplete(function () {
	$('[data-toggle="tooltip"]').tooltip({})
	$('[rel="tooltip"]').tooltip({})
})

//attaching datepicker
$(document).on('focus', '#date_of_birth', function () {

	$("#date_of_birth").datepicker({
		calendarWeeks: true,
		todayHighlight: true,
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd'
	})

});
$(document).on('focus', '#exam_date,#research_due_date', function () {
	$("#exam_date,#research_due_date").datepicker({
		calendarWeeks: true,
		todayHighlight: true,
		autoclose: true,
		startDate: new Date(),
		todayHighlight: true,
		format: 'yyyy-mm-dd'
	})
});

/*show profile-pic edit buttons*/
$(document).ready(function (e) {
	$(document.body).on('click', '.edit-profile-photo', function () {
		$('.edit-profile-photo-menu').removeClass('hidden');
	})
	$(document.body).on('click', '.cancel-edit-profile-photo', function () {
		$('.edit-profile-photo-menu').addClass('hidden');
	})
});

/*show edit buttons*/
/*$(document).ready(function(e) {
	$(document.body).on('click','#upload-profile-pic',function(){
	$(document).ajaxComplete(function(){
		$('#upload').click();
	});
	})		
});*/

/*making chat heads draggable*/
/*$(document).ready(function(e) {
		$('.chat-head').draggable({
		containment:'window'
		});
});*/

/*messages page*/
/**************************/
/**************************/


/*profile page*/
/**************************/
/**************************/
//select what section to view on profile menu
$(document).ready(function (e) {
	$('.profile-main-nav li').on('click', function () {
		var id = $('a', this).attr('href').substr(1);
		$('.profile-sections').addClass('hidden');
		$('.profile-main-nav li').removeClass('active')
		$('.' + id).removeClass('hidden');
		$(this).addClass('active');
	})
})//end document ready

/*upload page*/
/**************************/
/**************************/
//upload ads
//show extra fields onChange of the 'purpose' select field
$(document).ready(function (e) {
	$('#purpose').on('change', function () {
		if ($(this).val() == 'Exam Preparation') {
			$('.extra-purpose-fields').html("<div class='form-group col-md-6'><label for='exam_target' class='col-form-label'>Exam Target:</label><select id='exam_target' name='exam_target' class='form-control'><option value=''>-choose-</option><option value='Pass'>Pass</option><option value='Excellent'>Excellent</option></select></div><div class='form-group col-md-6'><label for='exam-date' class='col-form-label'>Big Day:</label><input type='text' id='exam_date' name='exam_date' class='form-control' placeholder='YYYY-MM-DD'></div>")
		} else if ($(this).val() == 'Research') {
			$('.extra-purpose-fields').html("<div class='form-group col-md-6'><label for='exam-date' class='col-form-label'>Research Due Date:</label><input type='text' id='research_due_date' name='research_due_date' class='form-control' placeholder='YYYY-MM-DD'></div>")
		} else {
			$('.extra-purpose-fields').html('')
		}

	})
});