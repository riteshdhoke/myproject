$(document).ready(function(){
	$("#login_form").validate({
		rules : {
			username : {
				required : true
			},
			password : {
				required : true
			}
		},
		messages : {
			username : {
				required : "Username is required"
			},
			password : {
				required : "Password is required"
			}
		}
	});


		$("#login_form").validate({
		rules : {
			username : {
				required : true
			},
			password : {
				required : true
			}
		},
		messages : {
			username : {
				required : "Username is required"
			},
			password : {
				required : "Password is required"
			}
		}
	})


	$("#add_agent").validate({
		rules : {
			agent_group : {
				required : true
			},
			full_name : {
				required : true
			},
			short_name : {
				required : true
			},
			country : {
				required : true
			},
			port : {
				required : true
			}
		},
		messages : {
			agent_group : {
				required : "Agebt Group is required"
			},
			full_name : {
				required : "Full Name is required"
			},
			short_name : {
				required : "Short Name is required"
			},
			country : {
				required : "Country is required"
			},
			port : {
				required : "Port is required"
			}
		}
	})


		$("#edit_currency_form").validate({
		rules : {
			currency_code : {
				required : true
			},
			name : {
				required : true
			},
			rate : {
				required : true
			}
		},
		messages : {
			currency_code : {
				required : "Country code is required"
			},
			name : {
				required : "Country Name is required"
			},
			rate : {
				required : "Rate is required"
			}
		}
	})



})


// Port Forms
$("#add_port").validate({
		rules : {
			code : {
				required : true
			},
			name : {
				required : true
			}
		},
		messages : {
			code : {
				required : "Port code is required"
			},
			name : {
				required : "Port Name is required"
			}
		}
	})

// Posty forms end


// Edit Agent Group Forms
$("#edit_agent_group_form").validate({
		rules : {
			group_id : {
				required : true
			},
			name : {
				required : true
			}
		},
		messages : {
			group_id : {
				required : "Group ID is required"
			},
			name : {
				required : "Agent Group Name is required"
			}
		}
	})

// EDit Agent Group end



// website_settings_form Forms
$("#website_settings_form").validate({
		rules : {
			name : {
				required : true
			},
			logo : {
				required : true
			},
			fevicon : {
				required : true
			},
			smtp_host : {
				required : true
			},
			smtp_port : {
				required : true
			},
			smtp_username : {
				required : true
			},
			smtp_password : {
				required : true
			},
			contact_address : {
				required : true
			},
			email : {
				required : true
			},
			contact_number : {
				required : true
			}
		},
		messages : {
			name : {
				required : "Website Name is required"
			},
			logo : {
				required : "Website Logo is required"
			},
			fevicon : {
				required : "Website Fevicon is required"
			},
			smtp_host : {
				required : "SMTP Host is required"
			},
			smtp_port : {
				required : "SMTP Port is required"
			},
			smtp_username : {
				required : "SMTP Username is required"
			},
			smtp_password : {
				required : "SMTP Password is required"
			},
			contact_address : {
				required : "Contact Address is required"
			},
			email : {
				required : "Email is required"
			},
			contact_number : {
				required : "Contact Number is required"
			}
		}
	});



$("#update_website_settings_form").validate({
		rules : {
			name : {
				required : true
			},
			smtp_host : {
				required : true
			},
			smtp_port : {
				required : true
			},
			smtp_username : {
				required : true
			},
			smtp_password : {
				required : true
			},
			contact_address : {
				required : true
			},
			email : {
				required : true
			},
			contact_number : {
				required : true
			}
		},
		messages : {
			name : {
				required : "Website Name is required"
			},
			smtp_host : {
				required : "SMTP Host is required"
			},
			smtp_port : {
				required : "SMTP Port is required"
			},
			smtp_username : {
				required : "SMTP Username is required"
			},
			smtp_password : {
				required : "SMTP Password is required"
			},
			contact_address : {
				required : "Contact Address is required"
			},
			email : {
				required : "Email is required"
			},
			contact_number : {
				required : "Contact Number is required"
			}
		}
	});


function preview_website_logo(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {

      $('#prev_website_logo_upload').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function preview_website_fevicon(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {

      $('#prev_website_fevicon_upload').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#website_logo").change(function() {
	
  preview_website_logo(this);
});

$("#website_fevicon").change(function() {
	
  preview_website_fevicon(this);
});


// website_settings_form forms end