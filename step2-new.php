<html>
<?php
//print_r($_POST);die;
function print_option_tag(){
	$hours = array("8:00 AM","9:00 AM","10:00 AM","11:00 AM","12:00 PM","1:00 PM","2:00 PM","3:00 PM","4:00 PM","5:00 PM","6:00 PM");
	printf("<option value=\"\">..</option>\n");
	foreach($hours as $hour){
		printf("<option value=\"%s\">%s</option>\n",$hour,$hour);
	}
}
?>
<!--,"7:00 PM","8:00 PM","9:00 PM","10:00 PM","11:00 PM"-->
<head>
<link href="//db.onlinewebfonts.com/c/4a3a6523c2e50bc2a8de4445564c1cc1?family=Edmondsans" rel="stylesheet" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<style>

@import url(//db.onlinewebfonts.com/c/4a3a6523c2e50bc2a8de4445564c1cc1?family=Edmondsans);

.dtp .dtp-actual-meridien a.selected { background: #689F38; color: #fff; }

#footer_next {
    position: fixed;
    bottom: 22px;
    width: 48%;
}


</style>
<link rel="stylesheet" type="text/css" href="desktop1.3.css" />
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
<script src="https://code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.css">   
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.js"></script> -->
<script type="text/javascript">

function alertAndReturnFalse(alert_txt){
	alert(alert_txt);
	return false;
}

function getValueOfElement(element){
	return document.getElementById(element).value;
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function checkInputs(){
	if(getValueOfElement("name".trim()) == "") 
		return alertAndReturnFalse("Name cannot be empty");
	var phoneno_regexp = /^\d{8,11}$/;
	if(!getValueOfElement("phone_number").match(phoneno_regexp))
		return alertAndReturnFalse("Phone number not in correct format. Ensure that there is no dash sign");
    if(getValueOfElement("email".trim()) == "") 
		return alertAndReturnFalse("Email cannot be empty");
         if(!validateEmail(document.getElementById("email").value)) 
		return alertAndReturnFalse("Email should be correct");   
	if(getValueOfElement("address").trim() == "") 
		return alertAndReturnFalse("Address cannot be empty");
	if(getValueOfElement("zipcode".trim()) == "") 
		return alertAndReturnFalse("Zipcode cannot be empty");
	var zipcode_regexp = /^\d{1,11}$/;
	if(!getValueOfElement("zipcode").match(zipcode_regexp))
		return alertAndReturnFalse("Zipcode not in correct format.");
	return true;
}
function submitData(){
	var _12kg_gas_qty,_14kg_gas_qty,address,name,notes,order_type,email;
	var brand,other_brand;
	var phone_number,zipcode,delivery_charge;

	if(!checkInputs()) return false;
	_12kg_gas_qty = '<?php echo $_POST["_12kg_gas_qty"];?>';
	_14kg_gas_qty = '<?php echo $_POST["_14kg_gas_qty"];?>';
	brand = '<?php echo $_POST["brand"];?>';
	other_brand = '<?php echo isset($_POST["other_brand"]) && !empty($_POST["other_brand"]) ? $_POST["other_brand"] : 0; ?>';
	order_type = '<?php echo $_POST["order_type"];?>';
	estimated_price = '<?php echo $_POST["estimated_price"];?>';
	zipcode = document.getElementById("zipcode").value;
	address = document.getElementById("address").value;
	name = document.getElementById("name").value;
	email = document.getElementById("email").value;
	phone_number = document.getElementById("phone_number").value;
	delivery_charge = document.getElementById("delivery_charge").value;
	//delivery_date_time = document.getElementById("delivery_date_time").value;
	notes = document.getElementById("notes").value;
	var variables = ["_12kg_gas_qty","_14kg_gas_qty","phone_number","order_type","address","name","email","zipcode","notes","brand","other_brand","estimated_price","delivery_charge"];
	
	var form = document.createElement("form");
    	form.setAttribute("method", "post");
    	form.setAttribute("action", "step3-new.php");
	for(var i=0;i<variables.length;i++) {
        	var hiddenField = document.createElement("input");
            	hiddenField.setAttribute("type", "hidden");
            	hiddenField.setAttribute("name", variables[i]);
            	hiddenField.setAttribute("value", eval(variables[i]));
		
            	form.appendChild(hiddenField);
        }

    document.body.appendChild(form);
    form.submit();
	
}

</script>



</head>
<body>
<div class="header">
			<div class="header-btn"><button class="back-submit" type="button" onclick="history.back(); ">BACK</button></div>
			<div class="header-title">Step 2/4: Personal Information</div>
			<div class="header-title-mobile">Step 2/4</div>
</div>
<div class="col-body">
<div class="col2" style="display: none">
<div class="col-title">Delivery Date & Time</div>
		<!-- <div class="time-box">
		<div class="time">
		<div class="time-title">Delivery Date</div>
		<div class="pi">
			<input type="text" readonly="true" name="delivery_date_time" id="delivery_date_time">
		</div>
		</div>
		</div> -->
		
		
		<div class="delivery_note" style="display: none;">Q: Why is there 3 time slots?</br></br>A: Having the option to choose from 3 different time slots instead of 1 could greatly help our drivers to adjust and arrange their delivery schedules according to your timings you've inputted while you could also have the gas to be delivered at your available time and date. Thus, increasing the fulfilment rate of each orders.</br></br>TIPS: Inputting all 3 time slots with different days could significantly help increase the chance of your order being accepted.
		</div>
	</div>

<div class="col2">
<div class="col-title" style="margin-bottom:10px;">Personal Information</div>
			<div class="pi"><input type="text" name="name" id="name" placeholder="Name"></div>
			<div class="pi"><input type="text" class="phone_number" id="phone_number" placeholder="Contact Number"></div>
			<div class="pi"><input type="text" name="email" id="email" placeholder="Email Please fill this else you will not get email notification"></div>
			<div class="pi"><textarea rows="4" cols="50" id="address" placeholder="Delivery Address"></textarea></div>
			<div class="pi"><textarea rows="4" cols="50" id="notes" placeholder="i.e The House with Blue Gate/accept other brand"></textarea>
			</div>
			<div class="pi"><input type="text" name="zipcode" id="zipcode" placeholder="Zipcode"></div>
			<!-- <input type="button" id="button" value="Search" /> -->
             <ul id="result" style="display: none;"></ul>


	</div>
	<div class="col-block" id="footer_next">

			<div class="col-submit"><button  class="submit" type="button"  value="submitData" onclick="submitData();" >Next </button></div>
	</div>
</div>
</div>

<!-- <script type="text/javascript">
	jQuery(document).ready(function($) {
	var d = new Date();
    $("#delivery_date_time").datetimepicker({  
        showSecond: false,
        timeFormat: 'hh:mm:ss',
        dateFormat: 'yy-mm-dd',
        minDate: new Date(),
        minTime:"08:00",
        maxTime: "22:00"
    }).datetimepicker("setDate", new Date());
});
</script> -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                 
                 function zipcode(){
 
                      var zipcode=$("#zipcode").val();
 
                      if(zipcode!=""){
                        $("#result").html("");
                         $.ajax({
                            type:"post",
                            url:"zipcode_search.php",
                            data:"zipcode="+zipcode,
                            success:function(data){
                                var zipcode_val = $('#zipcode').val();
			                     if(zipcode_val != "") {
			                     	$("#result").show();
			                     	$("#result").html(data);
			                      }                             }
                          });
                      }
                     
                     
                 }
 
                  $("#button").click(function(){
                  	 zipcode();
                  });
 
                  $('#zipcode').keyup(function(e) {
                  	var zipcode_val = $('#zipcode').val();
                     if(zipcode_val != "") {
                     	$("#result").show();
                        zipcode();
                      }else{
                      	$("#result").hide();
                      }
                  });
            });
        </script>
</body>
</html>