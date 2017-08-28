/*
assets for public view
author: afikur rahman
author uri: geeksntechonology.com
*/
$(document).ready(function() {
	//Material Design hook
	$.material.init();

	//DatePicker Calendar view
	$('#org-mem-bdate').datepicker({
		autoclose: true
	});

	$('#mem_birth_date').datepicker({
		autoclose: true
	});

	//localize validation

	(function( factory ) {
		if ( typeof define === "function" && define.amd ) {
			define( ["jquery", "../jquery.validate"], factory );
		} else if (typeof module === "object" && module.exports) {
			module.exports = factory( require( "jquery" ) );
		} else {
			factory( jQuery );
		}
	}(function( $ ) {

	/*
	 * Translated default messages for the jQuery validation plugin.
	 * Locale: bn_BD (Bengali, Bangladesh)
	 */
	$.extend( $.validator.messages, {
		required: "এই তথ্যটি আবশ্যক।",
		remote: "এই তথ্যটি ঠিক করুন।",
		email: "অনুগ্রহ করে একটি সঠিক মেইল ঠিকানা লিখুন।",
		url: "অনুগ্রহ করে একটি সঠিক লিঙ্ক দিন।",
		date: "তারিখ সঠিক নয়।",
		dateISO: "অনুগ্রহ করে একটি সঠিক (ISO) তারিখ লিখুন।",
		number: "অনুগ্রহ করে একটি সঠিক নম্বর লিখুন।",
		digits: "এখানে শুধু সংখ্যা ব্যবহার করা যাবে।",
		creditcard: "অনুগ্রহ করে একটি ক্রেডিট কার্ডের সঠিক নম্বর লিখুন।",
		equalTo: "একই মান আবার লিখুন।",
		extension: "সঠিক ধরনের ফাইল আপলোড করুন।",
		maxlength: $.validator.format( "{0} টির বেশি অক্ষর লেখা যাবে না।" ),
		minlength: $.validator.format( "{0} টির কম অক্ষর লেখা যাবে না।" ),
		rangelength: $.validator.format( "{0} থেকে {1} টি অক্ষর সম্বলিত মান লিখুন।" ),
		range: $.validator.format( "{0} থেকে {1} এর মধ্যে একটি মান ব্যবহার করুন।" ),
		max: $.validator.format( "অনুগ্রহ করে {0} বা তার চাইতে কম মান ব্যবহার করুন।" ),
		min: $.validator.format( "অনুগ্রহ করে {0} বা তার চাইতে বেশি মান ব্যবহার করুন।" )
	} );

	}));

	jQuery.validator.addMethod("somobai_and_limited", function(value, element) {
		var textToMatch = 'সমবায়';
		var textToMatch2 = 'লিমিটেড';
                var textToMatch3='কো-অপারেটিভ';
		if(this.optional(element) || ((value.indexOf(textToMatch) > -1) && (value.indexOf(textToMatch2) > -1)) || ((value.indexOf(textToMatch3) > -1) && (value.indexOf(textToMatch2) > -1))) {
			return true;
		}
	}, "<span class='glyphicon glyphicon-remove' style='color: red'></span> ('সমবায়' অথবা 'কো-অপারেটিভ') এবং 'লিমিটেড' শব্দ থাকতে হবে");

	jQuery.validator.addMethod("commerce_and_bank", function(value, element) {
		var textToMatch3 = 'কমার্স';
		var textToMatch4 = 'ব্যাংক';
		var textToMatch5 = 'ইনভেস্টমেন্ট';
		var textToMatch6 = 'কমার্শিয়াল ব্যাংক';
		var textToMatch7 = 'লিজিং';
		var textToMatch8 = 'ফাইন্যান্সিং';
		var textToMatch9 = 'কমার্শিয়াল';
		if((value.indexOf(textToMatch3) <= -1) && (value.indexOf(textToMatch4) <= -1) && (value.indexOf(textToMatch5) <= -1)  && (value.indexOf(textToMatch6) <= -1)  && (value.indexOf(textToMatch7) <= -1)  && (value.indexOf(textToMatch8) <= -1) && (value.indexOf(textToMatch9) <= -1) ) {
			return true;
		}
	}, "<p style='text-align: left'><span class='glyphicon glyphicon-remove' style='color: red'></span> 'কমার্স', 'ব্যাংক', 'ইনভেস্টমেন্ট', 'কমার্শিয়াল', 'লিজিং', 'ফাইন্যান্সিং' শব্দ থাকতে পারবে না</p>");


	jQuery.validator.addMethod("org_mem_qty", function(value, element) {
		if(value < 20) {
			return false;
		}
		return true;
	}, "<span class='glyphicon glyphicon-remove' style='color: red'></span> কমপক্ষে ২০ জন হতে হবে");


	//Login validation
	$("#user-login-form").validate({
		 rules: {
		    field: {
		      required: true
		    },
		    user_phone: {
		    	required: true,
		    	minlength: 11,
		    	maxlength: 11
		    }
		},
		messages: {
			user_phone: {
		      required: "আবশ্যক",
		      minlength: "ভুল ফোন নম্বর"
		    },
		    password: {
		    	required: "আবশ্যক"
		    }
		}
	});

	//Registration validation
        $(".registration-form").validate({
		 rules: {
		    field: {
		      required: true
		    },
                    iagree: {
		    	required: true
		    }

		},
                messages: {
		     iagree: {
		    	required: "এখানে টিক দিন"
		    }
		}

	});
	$("#reg-form-1").validate({
		 rules: {
		    field: {
		      required: true
		    },
		    momiti_name: {
		    	required: true,
		    	somobai_and_limited: true,
		    	commerce_and_bank: true
		    }
		},
		messages: {
			user_phone: {
		      required: "আবশ্যক",
		      minlength: "ভুল ফোন নম্বর"
		    },
		    password: {
		    	required: "আবশ্যক"
		    }
		}
	});

	//Org member quantity validation
	$("#reg-form-member-qty").validate({
		 rules: {
		    field: {
		      required: true
		    },
		    org_mem_qty: {
		    	required: true,
		    	org_mem_qty: true
		    }
		}
	});

	$(".reg-form-step-2-form-2").validate({
		 rules: {
		    field: {
		      required: true
		    },
		    designation: {
		    	required: true
		    }
		}
	});

        $(".reg-form-2").validate({
		 rules: {
		    field: {
		      required: true
		    },
		    designation: {
		    	required: true
		    }
		}
	});


	$('.reg-form-step-2-form-1').validate({
		 rules: {
		    field: {
		      required: true
		    },
		    designation: {
		    	required: true
		    }
		}
	});

	$('.user-dashboard-step-2-regform-5').validate({
		 rules: {
		    field: {
		      required: true
		    }
		}
	});

	//Data Tables
	$('.all-mem-list').DataTable();


	//Show uploaded image
	function readURL(input) {

	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#mem-pp').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#imgInp").change(function(){
	    readURL(this);
	});

	//Add new Upload field
	var fle_cnt = 1;
	$('#addNew').click(function (event) {
	    event.preventDefault();
		if(fle_cnt)
		{
		fle_cnt++;
	    $('#bkup_doc_rw').after('<div class="form-group is-empty is-fileinput" id="bkup_doc_rw"><label for="" class="control-label col-md-3">প্রয়োজনীয় ডকুমেন্ট</label><div class="col-md-4"><input type="text" name="inputName'+fle_cnt+'" id="'+fle_cnt+'" class="form-control" placeholder="ফাইল এর নাম লিখুন" required></div><div class="col-md-5"><input type="text" readonly="" class="form-control" placeholder="Browse..." ><input type="file" name="inputFile'+fle_cnt+'" id="inputFile'+fle_cnt+'"  accept="image/*,.doc, .pdf, .docx, .xls, .xlsx" required></div></div>');
		}
	});

	$(document).on('click', '.remNew', function (event) {
	    event.preventDefault();
		
		fle_cnt--;
	    $(this).closest('div').remove();
		
	});

});