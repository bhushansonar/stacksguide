// JavaScript Document
$(document).ready(function() {
	var msg = document.getElementById("delete_msg");
	if(msg != null){
		var dlmsg = msg.innerHTML;
		
		}else{
		var dlmsg = "Are you really sure to delete this record?";	
			}
    $(".complexConfirm").confirm({
        title:"Delete confirmation",
        text:dlmsg,
		showcancel: true,
		confirm: function(button) {
			
            //alert("You just confirmed.");
			var thishref = button.attr('href');
			//alert(thishref);
			window.location = thishref;
			return true;
			
        },
        cancel: function(button) {
            //alert("You aborted the operation.");
			return false;
        },
        confirmButton: "Yes I am",
        cancelButton: "No"
    });
	
$('.free_user').find('input, select').attr('disabled','disabled');
/*$('.free_user').find('input, select, label').css("background-color","#BFBFBF");
$('.free_user').find('input, select, label').css("color","#BFBFBF");*/
});
var autoid = $("#autoid").val();
function addinput(){
		var dummmy = '<textarea class="video_input" name="video[]" id="id_'+autoid+'"></textarea>';
		//document.getElementById('add_inputs').innerHTML += dummmy;
		$("#add_inputs").append(dummmy);
		autoid++;
		}
function removeinput(){
		var removeid = autoid-1;
		if(removeid != 1){
			$("#id_"+(autoid-1)).remove();
			autoid--;
		}
	}
function changepassword(){
	
	if($("#confirm_div").is(':visible')){
		
			$(".pass_disabled").attr('disabled','disabled');
			$("#confirm_div").css("display",'none');
			$(".pass_disabled").val('dummycontentssssssssssssssssssssss');
		}else{
			$(".pass_disabled").removeAttr('disabled');
			$("#confirm_div").css("display",'block');
			$(".pass_disabled").val('');
		}
	}

function changepassrun(){
	$(".pass_disabled").attr('disabled','disabled');
			$("#confirm_div").css("display",'none');
			$(".pass_disabled").val('dummycontentssssssssssssssssssssss');
}
changepassrun();
function set_session(lang){
	
		$.ajax({
                type: "POST",
                url: base_url+"ajax_call/set_session_language_shortcode",
                data: {'lang':lang},
                dataType:"json",
                cache: false,
			    success: function () {
				    window.location.reload();	
					return;
                } 
			});
}
function show_add_type(val){
	if(val == 'advertisement_script'){
			$(".adverstisement_script").css("display","block");
			$(".adverstisement_script_input").removeAttr('disabled');
			$(".adverstisement_image").css("display","none");
			$(".adverstisement_image_input").attr('disabled','disabled');
		}else{
			$(".adverstisement_script").css("display","none");
			$(".adverstisement_script_input").attr('disabled','disabled');
			$(".adverstisement_image").css("display","block");
			$(".adverstisement_image_input").removeAttr('disabled');
			
			}
	}

	//alert(val_add);
var val_add = (val_add != null) ? val_add : "";
show_add_type(val_add);

function checkAll()
{
   var checked = (document.getElementById('abc').checked) ? true : false;
   for(i=0;i<document.frmList.elements.length;i++)
   {
	   if(checked 
	      && document.frmList.elements[i].type == "checkbox"
	   	  && (document.frmList.elements[i].id == 'list'
		  || document.frmList.elements[i].id == 'abc')
		 )
	   	document.frmList.elements[i].checked = true;
	   else
		document.frmList.elements[i].checked = false;		
   }
}
function getCount()
{
   var total = 0;
   for(i=0;i<document.frmList.elements.length;i++)
   {
	   if(document.frmList.elements[i].type == "checkbox" && document.frmList.elements[i].checked == true && document.frmList.elements[i].id != 'abc')
	   {
	   		total = total + 1;
	   }
   }
   return total;
}
function confirmbox(title,msg){
	
			$.confirm({
						title: title ? title : "Delete confirmation",
						text: msg ? msg : "Sure to Delete record(s)?",
						confirm: function(button) {
							
							//var thishref = button.attr('href');
							//alert(thishref);
							//window.location = thishref;
							return true;
							
						},
						cancel: function(button) {
							return false;
						},
						confirmButton: "Yes I am",
						cancelButton: "No"
					});
	}
			function alertbox(title,msg){
					$.confirm({
						title: title ? title : "Alert",
						text: msg ? msg : "Please select atleast one Newsletter!",
						showcancel: false,
						confirm: function(button) {
							
							//var thishref = button.attr('href');
							//alert(thishref);
							//window.location = thishref;
							return false;
							
						},
						confirmButton: "Ok",
						//cancelButton: "No"
					});
	}
function doAction(action)
{
	
			if(getCount() > 0) 
			{
				//var params = getUrlParams();
				//var page_name = params.page.split("_");
				//document.frmList.action = 'index.php?page='+page_name[0]+'_a';
				if(action == "Delete")
				{
					var ans;
					//confirmbox();
					$.confirm({
						title:"Bulk Delete confirmation",
						text: "Are you really sure, that you want to delete these "+getCount()+" Newsletter(s)? Please confirm.",
						showcancel: true,
						confirm: function(button) {
							document.frmList.submit();
							return true;
							
						},
						cancel: function(button) {
							return false;
						},
						confirmButton: "Yes I am",
						cancelButton: "No"
					});
					/*if(confirmbox() == true)
					{
						alert("cnfirm")
						//document.frmList.mode.value = action;
						document.frmList.submit();
					}
					else
					{
						alert("flase")
						return false;
					}*/
				}
			}else if(action == "")
			{
				return false;
			}
			else
			{
				//$j = jQuery.noConflict();
				alertbox();
				//alert("Please Select Atleast One Record To "+action);
				document.frmList.search_action.selectedIndex = 0;
				return false;
			}
	
}
function popups_ajax(cls,newsletter_id,user_id){
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			//alert(xmlhttp.responseText);
		
		$("#overlay_ajax").fadeIn('slow');
		document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
		$("#overlay_ajax").find(".popup_ajax."+cls).fadeIn('slow');
		$(function(){$('.popup_ajax a.popup_close').click(function(){
			var currentPopup = $('.popup_ajax:visible').size();
			if($('.popup_ajax:visible').size()>1){
				$(this).closest('.popup_ajax').fadeOut('slow');
				$(this).closest('#overlay_ajax').fadeOut('slow');
			}else{
				$('#overlay_ajax').fadeOut('fast',function(){$(currentPopup).attr('style','');});
				
				}
				return false;});
		});
		$('.free_user').find('input, select').attr('disabled','disabled');
		}
	  }
	 if(cls == 'subscribe_1'){
	var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+newsletter_id+"/"+user_id;
	  }else if(cls == 'subscribe_1_edit'){
		 var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+newsletter_id+"/"+user_id;
	  }
	 else if(cls == 'subscribe_success'){
		  var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+newsletter_id;
		  }
	else if(cls == 'profile'){
		var number = newsletter_id;
		  var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+number;
	}else if(cls == 'account_settings'){
		var number = newsletter_id;
		  var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+number;
	}else if(cls == 'cancle_account'){
		var number = newsletter_id;
		  var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+number;
		}
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send();
	}
	
function popups_ajax_additional_email(cls,newsletter_id,user_id){
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			//alert(xmlhttp.responseText);
		
		$("#overlay_ajax").fadeIn('slow');
		document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
		$("#overlay_ajax").find(".popup_ajax."+cls).fadeIn('slow');
		$(function(){$('.popup_ajax a.popup_close').click(function(){
			var currentPopup = $('.popup_ajax:visible').size();
			if($('.popup_ajax:visible').size()>1){
				$(this).closest('.popup_ajax').fadeOut('slow');
				$(this).closest('#overlay_ajax').fadeOut('slow');
			}else{
				$('#overlay_ajax').fadeOut('fast',function(){$(currentPopup).attr('style','');});
				
				}
				return false;});
		});
		$('.free_user').find('input, select').attr('disabled','disabled');
		}
	  }
	 if(cls == 'additional_email'){
	var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+newsletter_id+"/"+user_id;
	  }
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send();
	}

function popups_ajax_unsubscribe(cls,newsletter_id,user_id){
	
	  $(function() {
		$( "#dialog-confirm" ).dialog({
		resizable: false,
		height:150,
		modal: true,
		buttons: {
		"Yes Unsubscribe": function() {
			if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText == 'delete'){
				$("#unsubscribe_"+newsletter_id).fadeOut();
				submitform('mynl_newsletter_search');		
				}
		//document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	if(cls == 'unsubscribe'){
			  var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+newsletter_id+"/"+user_id;
			  }
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send(); 
			$( this ).dialog( "close" );
		},
		Cancel: function() {
		$( this ).dialog( "close" );
		}
		}
		});
});
	 
	/* $("#dialog-confirm").html("Are you sure to Unsubscribe from this Newsletter?");
	//alert("hii");
    // Define the Dialog and its properties.
    $("#dialog-confirm").dialog({
        resizable: false,
        modal: true,
        title: "Confirmation",
        height: 250,
        width: 400,
        buttons: {
            "Yes": function () {
                $(this).dialog('close');
               var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText == 'delete'){
				$("#unsubscribe_"+newsletter_id).fadeOut();
				submitform('mynl_newsletter_search');		
				}
		//document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	if(cls == 'unsubscribe'){
			  var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+newsletter_id+"/"+user_id;
			  }
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send(); 
            },
                "No": function () {
                $(this).dialog('close');
                
            }
        }
    });*/
	
	
	
	}

function popups_ajax_schedule(cls,schedule_id){
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
					//alert(xmlhttp.responseText);
			$("#overlay_ajax").fadeIn('slow');
			document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
			$("#overlay_ajax").find(".popup_ajax."+cls).fadeIn('slow');
			$(function(){$('.popup_ajax a.popup_close').click(function(){
				var currentPopup = $('.popup_ajax:visible').size();
				if($('.popup_ajax:visible').size()>1){
					$(this).closest('.popup_ajax').fadeOut('slow');
					$(this).closest('#overlay_ajax').fadeOut('slow');
				}else{
					$('#overlay_ajax').fadeOut('fast',function(){$(currentPopup).attr('style','');});
					
					}
					return false;});
			});
			 $(function() {
				$( "#ends_on1" ).datepicker();
				 $( "#ends_on1" ).datepicker(  "option", "dateFormat", 'yy-mm-dd' );
				  var currentDate = new Date(); 
				  var ends_on_date = $("#ends_on_date").html();
				  
				  if(ends_on_date){
					  $("#ends_on1").datepicker("setDate",ends_on_date);
				  }else{
					$("#ends_on1").datepicker("setDate",currentDate);
				  }
				 
				 var schedule_sending = $("#schedule_sending").html();
				 //alert(schedule_sending)
				 schedule_set(schedule_sending,"popup")
				 schedule_summary("popup");
			});
		}
	  }
	if(cls == 'schedule'){
		var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+schedule_id;
	}
	if(cls == 'schedule_delete'){
		var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+schedule_id;
	}
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send();
	}

function popups_ajax_schedule_delete(cls,schedule_id){
	
	$(function() {
	$("#ui-message").html("Are you sure to delete your Schedule?");
		$( "#dialog-confirm" ).dialog({
		resizable: false,
		height:150,
		modal: true,
		buttons: {
		"Yes delete": function() {
			if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText == 'delete'){
				$("#delete_"+schedule_id).fadeOut();
				submitform('gotoschedule')
				}
		//document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	if(cls == 'delete_schedule'){
		var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+schedule_id;
	}
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send(); 
			$( this ).dialog( "close" );
		},
		Cancel: function() {
		$( this ).dialog( "close" );
		}
		}
		});
});
	
	/*var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
					
			document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
			
		}
	  }
	if(cls == 'schedule_delete'){
		var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+schedule_id;
	}
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send();*/
	}

function popups_ajax_archive(cls,newsletter_id){
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			//alert(xmlhttp.responseText);
		
		$("#overlay_ajax").fadeIn('slow');
		document.getElementById("overlay_ajax").innerHTML=xmlhttp.responseText;
		$("#overlay_ajax").find(".popup_ajax."+cls).fadeIn('slow');
		$(function(){$('.popup_ajax a.popup_close').click(function(){
			var currentPopup = $('.popup_ajax:visible').size();
			if($('.popup_ajax:visible').size()>1){
				$(this).closest('.popup_ajax').fadeOut('slow');
				$(this).closest('#overlay_ajax').fadeOut('slow');
			}else{
				$('#overlay_ajax').fadeOut('fast',function(){$(currentPopup).attr('style','');});
				
				}
				return false;});
		});
		
		}
	  }
	 if(cls == 'archive_newsletter'){
		var url = base_url+"ajax_call/popups_ajax/"+cls+"/"+newsletter_id;
	  }
	//alert(url);
	xmlhttp.open("POST",url,true);
	xmlhttp.send();
	}

function subcribe_1_submit(id){
	
		var postData = $('#'+id).serializeArray();
		var formURL = $('#'+id).attr("action");
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR)
			{
				var newsletter_id = $("#s_newsletter_id").val();
				if($('.popup_ajax:visible').size()>1){
					$(this).closest('.popup_ajax').fadeOut('slow');
					$(this).closest('#overlay_ajax').fadeOut('slow');
					$(this).closest('#overlay_ajax').empty();
				}
				$('.review_subscribe_'+newsletter_id).html('<span style="float: right; margin-top: 20px; text-align: center; color:#808080; font-size: 11px;">You are already subscribed<br>Go to ”<u><span style="cursor:pointer;" onclick="display_tabs(\'tab_2\')">My Newsletters</u>”<br>to manage<br>your subscriptions.</span>');
				popups_ajax('subscribe_success',newsletter_id)
				//alert('success');
				//data: return data from server
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				//if fails     
			}
		});
		
	}

function profile_delete(field,id,table_id){
	
		var postData = "field="+field+"&language_id="+id+"&table_id="+table_id
		var formURL = base_url+"ajax_call/profile_delete";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR)
			{
				$("."+field+" #del_"+id).remove();
				
				/*var newsletter_id = $("#s_newsletter_id").val();
				if($('.popup_ajax:visible').size()>1){
					$(this).closest('.popup_ajax').fadeOut('slow');
					$(this).closest('#overlay_ajax').fadeOut('slow');
					$(this).closest('#overlay_ajax').empty();
				}
				$('.review_subscribe_'+newsletter_id).html('<span style="float: right; margin-top: 20px; text-align: center; color:#808080; font-size: 11px;">You are already subscribed<br>Go to ”<u><span style="cursor:pointer;" onclick="display_tabs(\'tab_2\')">My Newsletters</u>”<br>to manage<br>your subscriptions.</span>');
				popups_ajax('subscribe_success',newsletter_id)*/
				//alert('success');
				//data: return data from server
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				//if fails     
			}
		});
		
	}
function submitform(id){
		document.getElementById(id).submit();
        return false;
	}

function update_user(user_id,field,thisid){
		//var $this = thisid;
		var postData = "user_id="+user_id+"&field="+field;
		var formURL = base_url+"ajax_call/update_user";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR)
			{
				//alert();
				$("#"+thisid).addClass("heloow")
				//$this.add("<p>heloow</p>");
				if(data == "YES"){
					var src = base_url+"assets/img/true.png";
					$("#"+thisid).children().attr("src",src)
				}else if(data == "NO"){
					var src = base_url+"assets/img/wrong.png";
					$("#"+thisid).children().attr("src",src)
					}
				
				/*var newsletter_id = $("#s_newsletter_id").val();
				if($('.popup_ajax:visible').size()>1){
					$(this).closest('.popup_ajax').fadeOut('slow');
					$(this).closest('#overlay_ajax').fadeOut('slow');
					$(this).closest('#overlay_ajax').empty();
				}
				$('.review_subscribe_'+newsletter_id).html('<span style="float: right; margin-top: 20px; text-align: center; color:#808080; font-size: 11px;">You are already subscribed<br>Go to ”<u><span style="cursor:pointer;" onclick="display_tabs(\'tab_2\')">My Newsletters</u>”<br>to manage<br>your subscriptions.</span>');
				popups_ajax('subscribe_success',newsletter_id)*/
				//alert('success');
				//data: return data from server
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				//if fails     
			}
		});
		
	}
function update_additional_email(id){
		var doid = id.split("_");
		var id = doid[0];
		var email = doid[1];
		$("#additional_email").val(email);
		$("#additional_email_id").val(id);
		$("#additional_email_mode").val("Update");
		$("#additional_label").html("Edit E-mail");
		
	
	}
function confirmdeletereview(newsletter_id,rating_id){
	//e.preventdefault();
	$("#ui-message").html("Are you sure to delete your review?");
	$( "#dialog-confirm" ).dialog({
		resizable: false,
		height:150,
		modal: true,
		buttons: {
		"Yes Delete": function() {
			window.location = base_url+"newsletter/deletereview/"+newsletter_id+"/"+rating_id;
			//"newsletter/deletereview/".$newsletter[0]["newsletter_id"]."/".$newsletter_review[$i]['newsletter_review_id']
			},
		Cancel: function() {
		$( this ).dialog( "close" );
		}
		}
		});
	}
function schedule_summary(loc){
		
	if(loc == 'site'){	
		var sending = $('input[name=sending]:checked', '#schedule_form').val();
		var every = $('input[name=every]', '#schedule_form').val();
		var weeks_on = $.map($(':checkbox[name=weeks_on\[\]]:checked'), function(n, i){
      return n.value;
}).join(', ');
		var at = $('select[name=at]', '#schedule_form').val();
		var sending_to_email = $('select[name=sending_to_email]', '#schedule_form').val();
	
	}else if(loc == "popup"){
		
		var sending = $('input[name=sending]:checked', '#schedule_form_popup').val();
		var every = $('input[name=every]', '#schedule_form_popup').val();
		var weeks_on = $.map($(':checkbox[name=weeks_on\[\]]:checked'), function(n, i){
      return n.value;
}).join(', ');
		var at = $('select[name=at]', '#schedule_form_popup').val();
		var sending_to_email = $('select[name=sending_to_email]', '#schedule_form_popup').val();
		
		
		}
		var sending_d = sending;
		if(every){
			var every_d = " every "+every +" Week ";
		}else{
			var every_d = "";
		}
		
		if(weeks_on){
			var weeks_on_d = " on "+weeks_on;
		}else{
			var weeks_on_d = "";
			}
		//alert(weeks_on_d);
		var hour = at;
		
		var reserv = new Date('','','',hour,'')
		
		var at_d = " at "+reserv.format('H:i');
		var sending_to_email_d = " to "+sending_to_email;
		
		//alert(sending_d+every_d+weeks_on_d+at_d+sending_to_email_d);
	if(loc == 'site'){
		$("#schedule_summary").html(sending_d+every_d+weeks_on_d+at_d+sending_to_email_d);
	}else if(loc == 'popup'){
		$("#schedule_summary_popup").html(sending_d+every_d+weeks_on_d+at_d+sending_to_email_d);
		}
		
	}

