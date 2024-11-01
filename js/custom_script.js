	function sendSMS(){
          $('#image').show();  
		$.ajax("/wp-content/plugins/sms/sendsms.php?loginId="+$('input[name=uid]').val()+'&loginPass='+$("input[name=pass]").val()+'&contact='+$("input[name=contact]").val()+'&sms='+$("textarea[name=sms]").val(),
			{
				type: "Get",
				dataType: "text",
				
				complete: function(){
						$('#image').hide();
					},
				success:function(data){alert(JSON.stringify(data))},
				
				error: function(data){alert("Error sending SMS. Please check all settings.")}
			}
			);
	}	
				
			 
   function limitText(limitField, limitCount, limitNum) {
				if (limitField.value.length > limitNum) {
					limitField.value = limitField.value.substring(0, limitNum);
				} else {
					limitCount.value = limitNum - limitField.value.length;
				}
			}
