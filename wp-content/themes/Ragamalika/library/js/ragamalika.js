jQuery(document).ready(function(){
   // alert ( _TEMPLATEPATH );
	/* accordion */
  jQuery("#accordion").accordion();

	/* buttons */
	jQuery("button").button();

	jQuery(".login_form").hide();

	jQuery ("#loginicon").click (function(){
		jQuery ("#loginicon").colorbox({ width: '600px', height: '600px'});
	});

  jQuery ("#dob").datepicker({
  		navigationAsDateFormat: true, selectOtherMonths: true, changeMonth: true,
        numberOfMonths: 1,
        changeYear: false,
        changeDay : true,
        showButtonPanel: true,
        dateFormat: 'mm/dd'
    });



  	jQuery("#registration #dob").mask("99/99");
  	jQuery("#registration #zipcode").mask("99999");
  	jQuery("input[ref=phone]").mask("(999) 999-9999");
  	jQuery("#cf_field_4").mask("(999) 999-9999");

	jQuery("#registration .rules").click(function(){
		jQuery().colorbox ({
			href: jQuery("#registration .rules").attr('xhref')
		});
	});

	jQuery ( ".page-item-164 a").click(function(){
		// jQuery().colorbox ({
		// 	href: jQuery ( ".page-item-164 a").attr("href")
		// });		
		jQuery (this).colorbox();	
	});


	if ( jQuery("#login #lostpasswordform") ) {
		// alert ( jQuery("#login #nav").html());
	}

	if ( jQuery("#login #nav a").hasClass("lost_password_url") ) {
	} else {
		jQuery("#login #nav a").addClass("lost_password_url");
	}
	
	// if ( jQuery("#login #nav a").hasClass("ajax") ) {
	// } else {
	// 	jQuery("#login #nav a").addClass("ajax");
	// }

	// if ( jQuery("#login #nav a").hasClass("cboxElement") ) {
	// } else {
	// 	jQuery("#login #nav a").addClass("cboxElement");
	// }

  /* form validation */
  	jQuery("#gather_email_form").validate({
		rules: {
			name: {
				required: true
			},
			dob: {
				required: true
			},
			email: {
				required: true
			},
			gender: {
				required: true
			},
			student_type: {
				required: true
			},
			street: {
				required: true
			},
			city : {
				required : true
			},
			zipcode: {
				required: true
			},
			home_phone: {
				required: true
			},
			cell_phone: {
				required: true
			},
			m_name: {
				required: true
			},
			m_email: {
				required: true
			},
			m_cell_phone: {
				required: true
			},
			f_name: {
				required: true
			},
			f_email: {
				required: true
			},
			f_cell_phone: {
				required: true
			},
			terms : {
				required: true
			},
			register_id : {
				required: true
			},
			new_passwd1 : {
				required : true
			},
			new_passwd2 : {
				required : true
			},
			g_m_name : {
				required : true
			},
			g_f_name : {
				required : true
			}
		},
			
		messages: {
			register_id : {
				required: 'Enter the Registration Code'
			},
			name: {
				required: 'Enter the Name'
			},
			dob: {
				required: 'Enter the Date Of Birth'
			},
			email: {
				required: 'Enter the email'
			},
			gender: {
				required: 'Select the Gender'
			},
			student_type: {
				required: 'Select Student Type'
			},
			street: {
				required: 'Enter Street Name'
			},
			city : {
				required : "Enter City Name"
			},
			zipcode: {
				required: 'Enter zipcode'
			},
			home_phone: {
				required: 'Enter Home Phone No'
			},
			cell_phone: {
				required: 'Enter Cell Phone No'
			},
			m_name: {
				required: 'Enter Maiden\'s Name'
			},
			m_email: {
				required: 'Enter Maiden\'s email'
			},
			m_cell_phone: {
				required: "Required"
			},
			f_name: {
				required: "Required"
			},
			f_email: {
				required: "Required"
			},
			f_cell_phone: {
				required: "Required"
			},
			terms: {
				required: 'Please accept the Terms'
			},
			new_passwd1 : {
				required : "Required"
			},
			new_passwd2 : {
				required : "Required"
			},
			g_m_name : {
				required : "Enter Guardian Name"
			},
			g_f_name : {
				required : "Enter Guardian Name"
			}

		}
	});

  	jQuery("#registration").validate({
		rules: {
			name: {
				required: true
			},
			dob: {
				required: true
			},
			email: {
				required: true
			},
			gender: {
				required: true
			},
			student_type: {
				required: true
			},
			street: {
				required: true
			},
			city : {
				required : true
			},
			zipcode: {
				required: true
			},
			home_phone: {
				required: true
			},
			cell_phone: {
				required: true
			},
			m_name: {
				required: true
			},
			m_email: {
				required: true
			},
			m_cell_phone: {
				required: true
			},
			f_name: {
				required: true
			},
			f_email: {
				required: true
			},
			f_cell_phone: {
				required: true
			},
			terms : {
				required: true
			},
			register_id : {
				required: true
			},
			new_passwd1 : {
				required : true
			},
			new_passwd2 : {
				required : true
			},
			g_m_name : {
				required : true
			}
		},
			
		messages: {
			register_id : {
				required: 'Enter the Registration Code'
			},
			name: {
				required: 'Enter the Name'
			},
			dob: {
				required: 'Enter the Date Of Birth'
			},
			email: {
				required: 'Enter the email'
			},
			gender: {
				required: 'Select the Gender'
			},
			student_type: {
				required: 'Select Student Type'
			},
			street: {
				required: 'Enter Street Name'
			},
			city : {
				required : "Enter City Name"
			},
			zipcode: {
				required: 'Enter zipcode'
			},
			home_phone: {
				required: 'Enter Home Phone No'
			},
			cell_phone: {
				required: 'Enter Cell Phone No'
			},
			m_name: {
				required: 'Enter Maiden\'s Name'
			},
			m_email: {
				required: 'Enter Maiden\'s email'
			},
			m_cell_phone: {
				required: "Required"
			},
			f_name: {
				required: "Required"
			},
			f_email: {
				required: "Required"
			},
			f_cell_phone: {
				required: "Required"
			},
			terms: {
				required: 'Please accept the Terms'
			},
			new_passwd1 : {
				required : "Required"
			},
			new_passwd2 : {
				required : "Required"
			},
			g_m_name : {
				required : "Enter Guardian Name"
			}

		},
		submitHandler: function(form) {
			jQuery(".registration-success").show();
			var url = _STYLESHEETPATH + "/register_user.php?" + jQuery(form).serialize();
			// alert ( url );
			jQuery.ajax ({
				url: url,
				type: "GET",
				success: function(data){
					jQuery(form).hide();
					jQuery(".registration-success").show();
				}			
			});
			return false;
        }
	});

	jQuery (".lost_password_url").click (function(){
		jQuery (".lost_password_url").colorbox({ width: '600px', height: '600px'});
	});
	jQuery ("#login #nav a").click (function(){
		jQuery ("#login #nav a").colorbox({ width: '600px', height: '600px'});
	});
	jQuery("a.colorbox-form").each(function(){
		jQuery(this).click(function(){
			jQuery.colorbox({
				href: jQuery(this).attr("xref"), title: jQuery(this).attr("xtitle"), maxWidth: "100%", maxHeight: "100%", 
				height: "400px",
				width: "500px",
				onComplete : function () {
					jQuery(this).colorbox.resize();
				}
			});
		});
	});
	jQuery("ul.actions li").each(function(){
		jQuery(this).click(function(){
			jQuery.colorbox({
				href: jQuery(this).find("a").attr("xref"), title: jQuery(this).find("a").attr("xtitle"), maxWidth: "100%", maxHeight: "100%", 
				height: "400px",
				width: "500px",
				onComplete : function () {
					jQuery(this).colorbox.resize();
				}
			});
		});
	});
	jQuery(".hideclass").hide();
  	

  	jQuery(".ajax_ragamalika_tabs").tabs({
		ajaxOptions: {
			error: function( xhr, status, index, anchor ) {
				jQuery( anchor.hash ).html(
					"Couldn't load this tab. We'll try to fix this as soon as possible. " +
					"If this wouldn't be a demo." );
			}
		}
  	});
  	jQuery(".ragamalika_tabs").each(function(){
  		jQuery(this).tabs({});
  	});

});
