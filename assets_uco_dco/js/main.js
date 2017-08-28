//side-menu collapse in mobile device
$(document).ready(function(){
	$('[data-toggle="offcanvas"]').click(function(){
		$('#side-menu').toggleClass('hidden-xs');
		$('#side-menu').addClass('side-menu-responsive');
	});

	//select job area
	$('#job_id').change(function(){
		selection = $(this).val();
		switch(selection) {
			case '2':
				$('#division-input').show();
				$('#district-input').hide();
				$('#sub-district-input').hide();
				break;
			case '3':
				$('#division-input').show();
				$('#district-input').show();
				$('#sub-district-input').hide();
				break;
			case '4':
				$('#division-input').show();
				$('#district-input').show();
				$('#sub-district-input').show();
				break;
			default:
				$('#division-input').hide();
				$('#district-input').hide();
				$('#sub-district-input').hide();
				break;
		}
	});

	//Date Picker
	//for admin registration
	$('#birth-date').datepicker({
		autoclose: true
	});

	//Employee List Table
    $('#emp-list').DataTable();

	//About Organization
    $('#about-org').DataTable();
	
	//Transfer Manage Table
    $('#transfer-mange-table').DataTable();

    $('#org-list-table').DataTable();

	//Transfer Manage Table
    $('#org-head-list-table').DataTable();

    //Org emp list table
    $('#org-emp-list-table').DataTable();


	//Designation Change Table
    $('#designation-table').DataTable();

    $('.data-table').DataTable(
    {
"bSort":false
}
);

    //Wisiwyg Editor
    $('.summernote').summernote({
      height: 200,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: false // set focus to editable area after initializing summernote
    });


	//Form help text
	//name
	$('#admin-reg-form #name').focus(function() {
		$('#admin-reg-form #name-help').show();
	});
	$('#admin-reg-form #name').blur(function() {
		$('#admin-reg-form #name-help').hide();
	});

	//email
	$('#admin-reg-form #email').focus(function() {
		$('#admin-reg-form #email-help').show();
	});
	$('#admin-reg-form #email').blur(function() {
		$('#admin-reg-form #email-help').hide();
	});

	//email
	$('#admin-reg-form #password').focus(function() {
		$('#admin-reg-form #password-help').show();
	});
	$('#admin-reg-form #password').blur(function() {
		$('#admin-reg-form #password-help').hide();
	});

	//Birthdate
	$('#admin-reg-form #birth-date').focus(function() {
		$('#admin-reg-form #birth-date-help').show();
	});
	$('#admin-reg-form #birth-date').blur(function() {
		$('#admin-reg-form #birth-date-help').hide();
	});

	//Birthdate
	$('#admin-reg-form #phone').focus(function() {
		$('#admin-reg-form #phone-help').show();
	});
	$('#admin-reg-form #phone').blur(function() {
		$('#admin-reg-form #phone-help').hide();
	});

	//Birthdate
	$('#admin-reg-form #nid').focus(function() {
		$('#admin-reg-form #nid-help').show();
	});
	$('#admin-reg-form #nid').blur(function() {
		$('#admin-reg-form #nid-help').hide();
	});

	//Birthdate
	$('#admin-reg-form #designation').focus(function() {
		$('#admin-reg-form #designation-help').show();
	});
	$('#admin-reg-form #designation').blur(function() {
		$('#admin-reg-form #designation-help').hide();
	});

	//Form validation
	$( "#admin-reg-form" ).validate({
	  rules: {
	    field: {
	      required: true
	    }
	  }
	});

	$.validator.addMethod(
	        "regex",
	        function(value, element, regexp) {
	            var re = new RegExp(regexp);
	            return this.optional(element) || re.test(value);
	        },
	        "তথ্যটি সঠিক নয়"
	);

	//Login Validation
	$( '.login-form' ).validate({
		rules: {
		  field: {
		    required: true
		  }
		}
	});
	$('#login-nid').rules("add", { regex: "^[0-9]{1,17}$" });

	$( '.login-form #login-nid' ).focus(function() {
		$('#login-nid-help').show();
	});
	$( '.login-form #login-nid' ).blur(function() {
		$('#login-nid-help').hide();
	});

	$( '.login-form #login-pass' ).focus(function() {
		$('#login-pass-help').show();
	});
	$( '.login-form #login-pass' ).blur(function() {
		$('#login-pass-help').hide();
	});

	//Slideout Div
	$('.slide-out-div').tabSlideOut({
	    tabHandle: '.handle',                              //class of the element thatwill be your tab
	    pathToTabImage: 'assets/images/handle.jpg',          //path to the image for thetab *required*
	    imageHeight: '122px',                               //height of tab image*required*
	    imageWidth: '40px',                               //width of tab image*required*    
	    tabLocation: 'right',                               //side of screen where tablives, top, right, bottom, or left
	    speed: 300,                                        //speed of animation
	    action: 'click',                                   //options: 'click' or'hover', action to trigger animation
	    topPos: '100px',                                   //position from the top
	    fixedPosition: false,                               //options: true makes itstick(fixed position) on scroll
	    onLoadSlideOut: true
	});

$('#addNew').click(function (event) {
    event.preventDefault();
   
   	$('#bkup_doc_rw').append('<div style="margin-top: 15px;"><input type="hidden" name="file_name[]"  value=><input type="file" class="" name="file[]"></div>');
});

$('#addNew2').click(function (event) {
    event.preventDefault();
   
   	$('#bkup_doc_rw2').append('<div style="margin-top: 15px;"><input type="hidden" name="file_name[]"  value=><input type="file" class="" name="file[]"></div>');
});


});