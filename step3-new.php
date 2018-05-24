<html>
<?php //print_r($_POST);die; ?>

<head>


<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



<link rel="stylesheet" type="text/css" href="desktop1.3.css" />
<script type="text/javascript">
<?php
$inputs = ["_12kg_gas_qty","_14kg_gas_qty","phone_number","address","order_type","name","email","brand","other_brand","notes","delivery_charge","estimated_price","zipcode"];
?>
function submitData(){
	document.getElementById("submit").disabled=true;
	<?php
	foreach($inputs as $var){
		printf("var %s = %s;\n",$var,json_encode($_POST[$var]));
	}
	?>
	
	var variables = ["_12kg_gas_qty","_14kg_gas_qty","phone_number","address","order_type","name","email","brand","other_brand","notes","delivery_charge","estimated_price","zipcode"];
	
	var form = document.createElement("form");
    	form.setAttribute("method", "post");
    	form.setAttribute("action", "place_booking-new.php");
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
			<div class="header-title">Step 3/4: Confirmation</div>
			<div class="header-title-mobile">Step 3/4</div>
</div>
<div class="col3">
    <div class="col5"> 
			<div class="col3-line">
				<div class="col3-title">12 kg gas quantity: </div>
				<div class="col3-text"><?php echo $_POST["_12kg_gas_qty"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">14 kg gas quantity: </div>
				<div class="col3-text"><?php echo $_POST["_14kg_gas_qty"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Order Type: </div>
				<div class="col3-text"><?php echo nl2br($_POST["order_type"])?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Brand:</div>
				<div class="col3-text"><?php echo $_POST["brand"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Zipcode:</div>
				<div class="col3-text"><?php echo $_POST["zipcode"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Service Charge:</div> 
				<div class="col3-text"><?php echo $_POST["estimated_price"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Delivery Charge:</div> 
				<div class="col3-text"><?php echo $_POST["delivery_charge"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Price:</div> 
				<div class="col3-text"><?php echo $_POST["estimated_price"]+ $_POST["delivery_charge"]; ?>  <?php //echo ?></div>
			</div>
	</div>
		<div class="col5">
			<div class="col3-line">
				<div class="col3-title">Name:</div>
				<div class="col3-text"><?php echo $_POST["name"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Phone number:</div>
				<div class="col3-text"><?php echo $_POST["phone_number"]?></div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Email: </div>
				<div class="col3-text"><?php echo nl2br($_POST["email"])?> </div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Address:</div>
				<div class="col3-text"><?php echo nl2br($_POST["address"])?> </div>
			</div>
			<div class="col3-line">
				<div class="col3-title">Notes: </div>
				<div class="col3-text"><?php echo nl2br($_POST["notes"])?> </div>
			</div>
			

		</div>
</div>
<div class="col3_1">
<div class="col3-img1">

<span>Please make sure all details are correct, clicks confirm to broadcast your order to nearby drivers</span>
</div>
<div class="col3-img2"><img src="gas-cylinder.png" class="gas"/></div>
</div>
<div class="col-block">
			<div class="col-submit"><button id="submit"  class="submit" type="button"  value="submitData" onclick="submitData();" >Confirm Order</button></div>
		</div>
	
</body>
</html>
