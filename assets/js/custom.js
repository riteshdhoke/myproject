var base_url = $('#base_url').val();
// Edit Currency Start
	$(document).on('click','.edit_currency',function(){
		
		var id = $(this).data('id');

		$.ajax({
			url : base_url+'Home/GetCurrencyEdit',
			type : 'POST',
			data : {id : id},
			success : function(edit_details){
				var parse_data = JSON.parse(edit_details);
				// console.log(parse_data);
				var currency_code = parse_data[0].currency_code;
				var currency_name = parse_data[0].name;
				var currency_rate = parse_data[0].rate;

				$("#edit_id").val(id);
				$("#currency_code").val(currency_code);
				$("#currency_name").val(currency_name);
				$("#currency_rate").val(currency_rate);
			}
		})
	})
// Edit Currency End

// Delete Currency Start
	$(document).on('click','.delete_currency',function(){
		var id = $(this).data('id');

		var r = confirm("Do you want to delete this currency record?");
		if (r == true) {
			$.ajax({
				url : base_url+'Home/DeleteCurrency',
				type : 'POST',
				data : {id : id},
				success : function(edit_details){

					window.location.href = window.location.href;
				}
			});
		} else {
	
		}

	})
// Delete Currency End

$(document).on('click','.edit_import_shipment',function(){
	var id = $(this).data('id');
	window.location.href = base_url+"Shipment/edit_sea_import_shipment/"+id;
});
// Edit Currency Start
	$(document).on('click','.edit_port',function(){
		var id = $(this).data('id');

		$.ajax({
			url : base_url+'Port/GetPortEdit',
			type : 'POST',
			data : {id : id},
			success : function(edit_details){
				var parse_data = JSON.parse(edit_details);
				// console.log(parse_data);
				var port_code = parse_data[0].code;
				var port_name = parse_data[0].name;

				$("#edit_id").val(id);
				$("#port_code").val(port_code);
				$("#port_name").val(port_name);
			}	
		})
	})
// Edit Currency End


// Edit Currency Start
	$(document).on('click','.edit_customergroup',function(){
		var id = $(this).data('id');

		$.ajax({
			url : base_url+'Customer/GetCustomerGroupEdit',
			type : 'POST',
			data : {id : id},
			success : function(edit_details){
				var parse_data = JSON.parse(edit_details);
				// console.log(parse_data);
				var customer_group_id = parse_data[0].group_id;
				var customer_group_name = parse_data[0].group_name;

				$("#edit_id").val(id);
				$("#group_id").val(customer_group_id);
				$("#group_name").val(customer_group_name);
			}	
		})
	})
// Edit Currency End


// Edit Agent Start
	$(document).on('click','.edit_agent',function(){
		var id = $(this).data('id');

		$.ajax({
			url : base_url+'Agent/GetAgentEdit',
			type : 'POST',
			data : {id : id},
			success : function(edit_details){
				var parse_data = JSON.parse(edit_details);
				// console.log(parse_data);
				var agent_group = parse_data[0].agent_group;
				var full_name = parse_data[0].full_name;
				var short_name = parse_data[0].short_name;
				var telephone_1 = parse_data[0].telephone_1;
				var telephone_2 = parse_data[0].telephone_2;

				var fax_1 = parse_data[0].fax_1;
				var fax_2 = parse_data[0].fax_2;

				var email_1 = parse_data[0].email_1;
				var email_2 = parse_data[0].email_2;

				var contact_1 = parse_data[0].contact_1;
				var contact_2 = parse_data[0].contact_2;

				var address = parse_data[0].address;
				var country = parse_data[0].country;

				var port = parse_data[0].port;
				var remark = parse_data[0].remark;
				var uei_no = parse_data[0].uei_no;
				var cust_acc = parse_data[0].cust_acc;
				var credit_limit = parse_data[0].credit_limit;
				var currency = parse_data[0].currency;
				var term = parse_data[0].term;

				$("#edit_id").val(id);
				$("#agent_group").val(agent_group);
				$("#full_name").val(full_name);
				$("#short_name").val(short_name);
				$("#tel_1").val(telephone_1);
				$("#tel_2").val(telephone_2);
				$("#fax1").val(fax_1);
				$("#fax2").val(fax_2);
				$("#contact1").val(contact_1);
				$("#contact2").val(contact_2);

				$("#email1").val(email_1);
				$("#email2").val(email_2);

				$("#address").val(address);
				$("#country").val(country);

				$("#port").val(port);
				$("#remark").val(remark);
				$("#uei_no").val(uei_no);
				$("#cust_acc").val(cust_acc);

				$("#credit_limit").val(credit_limit);
				$("#currency").val(currency);
				$("#term").val(term);
			}	
		})
	})
// Edit Agent End


// Edit Customer Start
	$(document).on('click','.edit_customer',function(){
		var id = $(this).data('id');

		$.ajax({
			url : base_url+'Customer/GetCustomerEdit',
			type : 'POST',
			data : {id : id},
			success : function(edit_details){
				var parse_data = JSON.parse(edit_details);
				// console.log(parse_data);
				var group_id = parse_data[0].group_id;
				var full_name = parse_data[0].full_name;
				var short_name = parse_data[0].short_name;
				var telephone_1 = parse_data[0].telephone_1;
				var telephone_2 = parse_data[0].telephone_2;

				var fax_1 = parse_data[0].fax_1;
				var fax_2 = parse_data[0].fax_2;

				var email_1 = parse_data[0].email_1;
				var email_2 = parse_data[0].email_2;

				var contact_1 = parse_data[0].contact_1;
				var contact_2 = parse_data[0].contact_2;

				var address = parse_data[0].address;
				var country = parse_data[0].country_id;

			
				var remark = parse_data[0].remark;
				var uei_no = parse_data[0].uei_no;
				var cust_acc = parse_data[0].cust_acc;
				var credit_limit = parse_data[0].cred_limit;
				var currency = parse_data[0].currency_id;
				var term = parse_data[0].term;
				var salesman = parse_data[0].salesman;

				$("#edit_id").val(id);
				$("#group_id").val(group_id);
				$("#full_name").val(full_name);
				$("#short_name").val(short_name);
				$("#tel_1").val(telephone_1);
				$("#tel_2").val(telephone_2);
				$("#fax1").val(fax_1);
				$("#fax2").val(fax_2);
				$("#contact1").val(contact_1);
				$("#contact2").val(contact_2);
				$("#sales").val(salesman);

				$("#email1").val(email_1);
				$("#email2").val(email_2);

				$("#address").val(address);
				$("#country").val(country);

				$("#remark").val(remark);
				$("#uei_no").val(uei_no);
				$("#cust_acc").val(cust_acc);

				$("#credit_limit").val(credit_limit);
				$("#currency").val(currency);
				$("#term").val(term);
			}	
		})
	})
// Edit Customer End



// Edit Agent Group Start
	$(document).on('click','.edit_agent_group',function(){
		
		var id = $(this).data('id');

		$.ajax({
			url : base_url+'Agent/GetAgentGroupEdit',
			type : 'POST',
			data : {id : id},
			success : function(edit_details){
				var parse_data = JSON.parse(edit_details);
				// console.log(parse_data);
				var agent_group = parse_data[0].group_id;
				var group_name = parse_data[0].name;
				
				$("#group_id").val(agent_group);
				$("#edit_id").val(id);
				$("#group_name").val(group_name);
			}
			
		})
	})
// Edit Agent Group End


// Delete Port Start
	$(document).on('click','.delete_port',function(){
		var id = $(this).data('id');

		var r = confirm("Do you want to delete this port record?");
		if (r == true) {
			$.ajax({
				url : base_url+'Port/DeletePort',
				type : 'POST',
				data : {id : id},
				success : function(edit_details){

					window.location.href = window.location.href;
				}
			});
		} else {
	
		}

	})
// Delete Port End


// Delete Port Start
	$(document).on('click','.delete_customergroup',function(){
		var id = $(this).data('id');

		var r = confirm("Do you want to delete this Customer Group record?");
		if (r == true) {
			$.ajax({
				url : base_url+'Customer/DeleteCustomerGroup',
				type : 'POST',
				data : {id : id},
				success : function(edit_details){

					window.location.href = window.location.href;
				}
			});
		} else {
	
		}

	})
// Delete Port End



// Delete Port Start
	$(document).on('click','.delete_customer',function(){
		var id = $(this).data('id');

		var r = confirm("Do you want to delete this Customer record?");
		if (r == true) {
			$.ajax({
				url : base_url+'Customer/DeleteCustomer',
				type : 'POST',
				data : {id : id},
				success : function(edit_details){

					window.location.href = window.location.href;
				}
			});
		} else {
	
		}

	})
// Delete Port End



// Delete Port Start
	$(document).on('click','.delete_agent',function(){
		var id = $(this).data('id');

		var r = confirm("Do you want to delete this Agent?");
		if (r == true) {
			$.ajax({
				url : base_url+'Agent/DeleteAgent',
				type : 'POST',
				data : {id : id},
				success : function(edit_details){

					window.location.href = window.location.href;
				}
			});
		} else {
	
		}

	})
// Delete Port End


// Delete Port Start
	$(document).on('click','.delete_agent_group',function(){
		var id = $(this).data('id');

		var r = confirm("Do you want to delete this Agent Group?");
		if (r == true) {
			$.ajax({
				url : base_url+'Agent/DeleteAgentGroup',
				type : 'POST',
				data : {id : id},
				success : function(edit_details){

					window.location.href = window.location.href;
				}
			});
		} else {
	
		}

	})
// Delete Port End


// Delete country Start
	$(document).on('click','.delete_country',function(){
		var id = $(this).data('id');

		var r = confirm("Do you want to delete this country record?");
		if (r == true) {
			$.ajax({
				url : base_url+'Country/DeleteCountry',
				type : 'POST',
				data : {id : id},
				success : function(edit_details){

					window.location.href = window.location.href;
				}
			});
		} else {
	
		}

	})
// Delete country End


// Edit country Start
	$(document).on('click','.edit_country',function(){
		var id = $(this).data('id');

		$.ajax({
			url : base_url+'Country/GetCountryEdit',
			type : 'POST',
			data : {id : id},
			success : function(edit_details){
				var parse_data = JSON.parse(edit_details);
				// console.log(parse_data);
				var country_code = parse_data[0].country_code;
				var country_name = parse_data[0].country_name;

				$("#edit_id").val(id);
				$("#country_code").val(country_code);
				$("#country_name").val(country_name);
			}	
		})
	})
// Edit country End


// Edit country Start
	$(document).on('click','.edit_website_settings',function(){
		window.location.href = base_url+'Home/EditWebsite_settings'
	})
// Edit country End


// All DatePickers Start
// job_date_datepicker
  $(document).ready(function(){
    $('.job_date_datepicker').datepicker();
    $('.eta_date_datepicker').datepicker();
    $('.edt_date_datepicker').datepicker();
  });
// All DatePickers End

$(document).on("click","#search_agent",function(){
	var agent_keyword = $("#agent_keyword").val();

	$.ajax({
			url : base_url+'Agent/SearchAgent',
			type : 'POST',
			data : {keyword : agent_keyword},
			success : function(agent_list){
				var agent_list = JSON.parse(agent_list);
				$('.agent_picker_data').empty();
				$.each(agent_list,function(index,value){

					$('.agent_picker_data').append("<tr><td>"+value.short_name+"</td><td>"+value.full_name+"</td><td><a href='#' class='select_agent' data-idd='"+value.id+"' data-id='"+value.short_name+"' data-name='"+value.full_name+"'>Select</a></td></tr>");
				})
			
			}	
		})

});

$(document).on("click","#search_vendor",function(){
	var vendor_keyword = $("#vendor_keyword").val();

	$.ajax({
			url : base_url+'Home/SearchVendor',
			type : 'POST',
			data : {keyword : vendor_keyword},
			success : function(vendor_list){
				var vendor_list = JSON.parse(vendor_list);
				$('.vendor_picker_data').empty();
				$.each(vendor_list,function(index,value){

					$('.vendor_picker_data').append("<tr><td>"+value.short_name+"</td><td>"+value.full_name+"</td><td><a href='#' class='select_vendor' data-idd='"+value.id+"' data-id='"+value.short_name+"' data-name='"+value.full_name+"'>Select</a></td></tr>");
				})
			
			}	
		})

});

$(document).on("click","#search_currency_modal",function(){
	var currency_keyword = $("#currency_keyword").val();

	$.ajax({
			url : base_url+'Home/SearchCurrency',
			type : 'POST',
			data : {keyword : currency_keyword},
			success : function(currency_list){
				var currency_list = JSON.parse(currency_list);
				$('.currency_picker_data').empty();
				$.each(currency_list,function(index,value){

					$('.currency_picker_data').append("<tr><td>"+value.currency_code+"</td><td>"+value.name+"</td><td><a href='#' class='select_currency' data-idd='"+value.id+"' data-id='"+value.currency_code+"' data-name='"+value.name+"'>Select</a></td></tr>");
				})
			
			}	
		});

	
});


$(document).on("click","#search_customer_modal",function(){
	var customer_keyword = $("#customer_keyword").val();

	$.ajax({
			url : base_url+'Home/SearchCustomer',
			type : 'POST',
			data : {keyword : customer_keyword},
			success : function(customer_list){
				var customer_list = JSON.parse(customer_list);
				$('.customer_picker_data').empty();
				$.each(customer_list,function(index,value){

					$('.customer_picker_data').append("<tr><td>"+value.short_name+"</td><td>"+value.full_name+"</td><td><a href='#' class='select_customer' data-idd='"+value.id+"' data-id='"+value.short_name+"' data-name='"+value.full_name+"'>Select</a></td></tr>");
				})
			
			}	
		});

	
});


$(document).on("click","#search_port",function(){
	var port_keyword = $("#port_keyword").val();

	$.ajax({
			url : base_url+'Port/SearchPort',
			type : 'POST',
			data : {keyword : port_keyword},
			success : function(port_list){
				var port_list = JSON.parse(port_list);
				$('.port_picker_data').empty();
				$.each(port_list,function(index,value){

					$('.port_picker_data').append("<tr><td>"+value.code+"</td><td>"+value.name+"</td><td><a href='#' class='select_port' data-idd='"+value.id+"' data-id='"+value.code+"' data-name='"+value.name+"'>Select</a></td></tr>");
				})
			
			}	
		})

});

var div_point ='';
$(document).on("click",".pick_class",function(){
	div_point = $(this).data('point');	
	$(".pick_common_data").empty();

})

$(document).on("click",".select_agent",function(){
	$("#"+div_point+"_id").val($(this).data('id'));
	$("#"+div_point+"_id_id").val($(this).data('idd'));
	$("#"+div_point+"_name").val($(this).data('name'));
	$('#AgentPickerModal').modal('toggle');
})


$(document).on("click",".select_currency",function(){
	$("#"+div_point+"_id").val($(this).data('id'));
	$("#"+div_point+"_id_id").val($(this).data('idd'));
	$("#"+div_point+"_name").val($(this).data('name'));
	$('#CurrencyPickerModal').modal('toggle');
})


$(document).on("click",".select_vendor",function(){
	$("#"+div_point+"_id").val($(this).data('id'));
	$("#"+div_point+"_id_id").val($(this).data('idd'));
	$("#"+div_point+"_name").val($(this).data('name'));
	$('#VendorPickerModal').modal('toggle');
})


$(document).on("click",".select_port",function(){
	$("#"+div_point+"_id").val($(this).data('id'));
	$("#"+div_point+"_id_id").val($(this).data('idd'));
	// $("#"+div_point+"_name").val($(this).data('name'));
	$('#PortPickerModal').modal('toggle');
})


$(document).on("click",".select_customer",function(){
	$("#"+div_point+"_id").val($(this).data('id'));
	$("#"+div_point+"_id_id").val($(this).data('idd'));
	$("#"+div_point+"_name").val($(this).data('name'))
	// $("#"+div_point+"_name").val($(this).data('name'));
	$('#CustomerPickerModal').modal('toggle');
})

var currency_keyword = '';
$(document).on("click","#search_currency",function(){
	currency_keyword = $("#currency_keyword").val();
	searchFilter(0,currency_keyword);
	
});



$(document).on("click","#export_currency",function(){
	window.location.href = base_url+"Home/export_currency/"+currency_keyword;
	
});


var port_keyword = '';
$(document).on("click","#search_port",function(){
	port_keyword = $("#port_keyword").val();
	searchFilter(0,port_keyword);
	
});

$(document).on("click","#export_port",function(){
	window.location.href = base_url+"Port/export_port/"+port_keyword;
	
});


var country_keyword = '';
$(document).on("click","#search_country",function(){
	country_keyword = $("#country_keyword").val();
	searchFilter(0,country_keyword);
	
});

$(document).on("click","#export_country",function(){
	window.location.href = base_url+"Country/export_country/"+country_keyword;
	
});

var agents_keyword = '';
$(document).on("click","#search_agents",function(){
	agents_keyword = $("#agents_keyword").val();
	searchFilter(0,agents_keyword);
	
});

$(document).on("click","#export_agents",function(){
	window.location.href = base_url+"Agent/export_agents/"+agents_keyword;
	
});

var agents_group_keyword = '';
$(document).on("click","#search_agents_group",function(){
	agents_keyword = $("#agents_group_keyword").val();
	searchFilter(0,agents_keyword);
	
});

$(document).on("click","#export_agents_group",function(){
	window.location.href = base_url+"Agent/export_agents_group/"+agents_keyword;
	
});



var customergroup_keyword = '';
$(document).on("click","#search_customergroup",function(){
	customergroup_keyword = $("#customergroup_keyword").val();
	searchFilter(0,customergroup_keyword);
	
});

$(document).on("click","#export_customergroup",function(){
	window.location.href = base_url+"Customer/export_customer_group/"+customergroup_keyword;
	
});



var customer_keyword = '';
$(document).on("click","#search_customer",function(){
	customer_keyword = $("#customer_keyword").val();
	searchFilter(0,customer_keyword);
	
});

$(document).on("click","#export_customer",function(){
	window.location.href = base_url+"Customer/export_customer/"+customer_keyword;
	
});




// header toogle
$(".click1").click(function(){
  $(".subhide1").toggle();
	 $(".arrw_img2").toggle();
	 $(".arrw_img3").toggle();
});

$(".click2").click(function(){
  $(".subhide2").toggle();
	$(".arrw_img1").toggle();
	 $(".arrw_img").toggle();
});


$(".click3").click(function(){
  $(".subhide3").toggle();
	$(".arrw_img31").toggle();
	 $(".arrw_img311").toggle();
});


function redirect(url){
	window.location.href = url;
}