<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//db.onlinewebfonts.com/c/4a3a6523c2e50bc2a8de4445564c1cc1?family=Edmondsans" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="http://127.0.0.1/kitabijhund/asset/front/plugin/bootstrape/css/bootstrap.min.css">
        <link rel="stylesheet" href="desktop1.3.css" />
        <script src="jquery-1.8.0.min.js"></script>
        <style>

            @import url(//db.onlinewebfonts.com/c/4a3a6523c2e50bc2a8de4445564c1cc1?family=Edmondsans);

        </style>
        <script type="text/javascript">
            var choice = "";
            var order_type = "";
            var deposit = 80;
            var weight_choice;
            var _12kg_gas_qty;
            var _14kg_gas_qty;
            var retail_price_12kg = 22.8;
            var retail_price_14kg = 26.6;
            var lower_range_12kg = 26;
            var higher_range_12kg = 28;
            var lower_range_14kg = 28;
            var higher_range_14kg = 32;

            function estimatePrice() {
                var qty;
                if (document.getElementById("qty").value.trim() == "")
                    qty = 0;
                else
                    qty = parseInt(document.getElementById("qty").value);
                var higher_range, lower_range;

                var deposit = order_type == "New" ? 80 : 0;
                if (weight_choice == '12') {
                    lower_range = qty * lower_range_12kg + deposit * qty;
                    higher_range = qty * higher_range_12kg + deposit * qty;
                }
                else if (weight_choice == '14') {
                    lower_range = qty * lower_range_14kg + deposit * qty;
                    higher_range = qty * higher_range_14kg + deposit * qty;
                }
                else {
                    lower_range = higher_range = 0;
                }
                document.getElementById("estimated_pricing").innerHTML = "Estimated Pricing: RM " + higher_range.toString();
                var totalPrice = higher_range.toString();
                $('#total_price').val(totalPrice);
                //alert($('#total_price').val());
                //alert(totalPrice);

            }

            function changeBorderColorOnSelect(element) {
                choice = element;
                document.getElementById(element).style.border = ' #ffff06 solid';
                var brand_selection = ["Mira", "Petron", "Petronas", "Solar"];
                for (var i = 0; i < brand_selection.length; i++) {
                    if (brand_selection[i] != element)
                        document.getElementById(brand_selection[i]).style.border = 'none';
                }

            }

            function submitData() {
                var estimated_price = document.getElementById("total_price").value;
                if ($('#other_brand').prop('checked') === true) {
                    var other_brand = document.getElementById("other_brand").value;
                    //alert(other_brand);
                } else {
                    var other_brand = 0;
                    //alert(other_brand);
                }
                var brand = choice;
                if (brand == "") {
                    alert("Please select gas brand.");
                    return;
                }
                var qty = document.getElementById("qty").value;
                var qty_regexp = /^\d{1,3}$/;
                if (!qty.match(qty_regexp)) {
                    alert("Gas tank quantity not in correct format.");
                    return;
                }
                if (weight_choice == '14') {
                    _12kg_gas_qty = '0';
                    _14kg_gas_qty = document.getElementById("qty").value;
                }
                else if (weight_choice == '12') {
                    _14kg_gas_qty = '0';
                    _12kg_gas_qty = document.getElementById("qty").value;
                }
                else {
                    alert("Please choose gas weight");
                    return;
                }
                if (order_type == "") {
                    alert("Please choose order type");
                    return;
                }

                var variables = ["_12kg_gas_qty", "_14kg_gas_qty", "brand", "order_type", "other_brand"];

                var form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "step2-new.php");
                for (var i = 0; i < variables.length; i++) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", variables[i]);
                    hiddenField.setAttribute("value", eval(variables[i]));

                    form.appendChild(hiddenField);
                }
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", "estimated_price");
                hiddenField.setAttribute("value", eval(estimated_price));

                form.appendChild(hiddenField);

                document.body.appendChild(form);
                form.submit();
                //	window.location = 'step2.php?phone_number='+phone_number+'&_12kg_gas_qty='+_12kg_gas_qty+'&_14kg_gas_qty='+_14kg_gas_qty;
            }

            function changeWeightColor(weight) {
                weight_choice = weight;
                document.getElementById("_12").style.border = '';
                document.getElementById("_14").style.border = '';
                document.getElementById("_" + weight).style.border = '5px solid dodgerblue';
                if (weight == '12') {
                    _12kg_gas_qty = document.getElementById('qty').value;
                    _14kg_gas_qty = '5px solid gray';
                    document.getElementById("retail_delivery").innerHTML = "Retail price per cylinder (Excluding delivery): RM " + retail_price_12kg.toFixed(2);
                }
                if (weight == '14') {
                    _14kg_gas_qty = document.getElementById('qty').value;
                    _12kg_gas_qty = '5px solid gray';
                    document.getElementById("retail_delivery").innerHTML = "Retail price per cylinder (Excluding delivery): RM " + retail_price_14kg.toFixed(2);
                }
                estimatePrice();
            }

            function changeOrderType(type) {
                order_type = type;
                document.getElementById("new").style.border = '';
                document.getElementById("refill").style.border = '';
                document.getElementById(type.toLowerCase()).style.border = '5px solid dodgerblue';
                if (type == "New")
                    document.getElementById("deposit").style.display = '';
                else
                    document.getElementById("deposit").style.display = 'none';
                estimatePrice();
            }
        </script>
    </head>
    <body>
        <!--        <div class="header">
                    <div class="header-btn"><button class="back-submit" type="button" onclick="window.location.href = 'http://www.halogas.com/'">[x]Close</button></div>
                    <div class="header-title">Step 1/4: Choose Brands, Type, Weight and Quantity.</div>
                    <div class="header-title-mobile">Step 1/4</div>
                </div>-->

        <!--<h3>Please enter phone number, brand and quantity</h3>
        <table class="phone_number_table" >
        <tr>	<td colspan="3">Phone number: </td><td><input type="text" class="phone_number" id="phone_number"></td><td></td>
                        </tr>-->
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <div class="col-brand">
                        <!--<input type="radio" id="Mira"  value="Mira"> Mira </td> -->
                        <div id="Mira" class="brand"  onClick="changeBorderColorOnSelect('Mira');">
                            <img  src="Mira_Gas.jpg" class="brand_img" width="100%" height="auto">
                        </div>
                    </div>
                    <div class="col-brand">
                        <div id="Petron" class="brand"  onClick="changeBorderColorOnSelect('Petron');">
                            <img  src="petron-v2.jpg" class="brand_img" width="100%" height="auto"> 
                        </div>
                    </div>
                    <div class="col-brand">
                        <div id="Petronas" class="brand"  onClick="changeBorderColorOnSelect('Petronas');">
                            <img  src="Gas_Petronas.jpg" class="brand_img" width="100%" height="auto">
                        </div>
                    </div>
                    <div class="col-brand">
                        <div id="Solar" class="brand"  onClick="changeBorderColorOnSelect('Solar');">
                            <img  src="Solar_Gas_Red3.jpg" class="brand_img" width="100%" height="auto">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-3">

                </div>

                <div class="col-sm-12 col-lg-3">

                </div>

                <div class="col-sm-12 col-lg-3">

                </div>


            </div>

        </div>

        <!--        <div class="col1">
                    <div class="col-title">
                        Brands
                    </div>
        
        
                    <div class="col-brand">
                    <input type="radio" id="Mira"  value="Mira"> Mira </td> 
                        <div id="Mira" class="brand"  onClick="changeBorderColorOnSelect('Mira');">
                            <img  src="Mira_Gas.jpg" class="brand_img" width="100%" height="auto">
                        </div>
                    </div>
                    <div class="col-brand">
                        <div id="Petron" class="brand"  onClick="changeBorderColorOnSelect('Petron');">
                            <img  src="petron-v2.jpg" class="brand_img" width="100%" height="auto"> 
                        </div>
                    </div>
                    <div class="col-brand">
                        <div id="Petronas" class="brand"  onClick="changeBorderColorOnSelect('Petronas');">
                            <img  src="Gas_Petronas.jpg" class="brand_img" width="100%" height="auto">
                        </div>
                    </div>
                    <div class="col-brand">
                        <div id="Solar" class="brand"  onClick="changeBorderColorOnSelect('Solar');">
                            <img  src="Solar_Gas_Red3.jpg" class="brand_img" width="100%" height="auto">
                        </div>
                    </div>
        
                </div>
                <div class="col1">
                    <div class="col-title">Order Type</div>
                    <div class="col-type">	
                        <div class="type"  id="new" value="submitData" onclick="changeOrderType('New');" >New Gas Cylinder</div>
                        <div>Note : Deposit : Starting from Rm80 per cylinder  (surcharge varies from different drivers)</div>
                    </div>
                    <div class="col-type">	
                        <div class="type"  id="refill" value="submitData" onclick="changeOrderType('Refill');" >Refill Gas Cylinder</div>
                    </div>
                </div>
        
                <div class="col1">
                    <div class="col-title">Weight</div>
                    <div class="col-weight">	
                        <button class="weight"  id="_12" value="submitData" onclick="changeWeightColor('12');" >12 kg </button>
                    </div>
                    <div class="col-weight"> 	
                        <button class="weight"  id="_14" value="submitData" onclick="changeWeightColor('14');" >14 kg </button>
                    </div>
                    <div class="col-title">Quantity</div>
                    <div class="col-quantity">
                        <input class="quantity_text_box" type="text" name="qty" id="qty" onChange="estimatePrice();" placeholder="Quantity">
                    </div>
                    <div class="checkbox">
                        <label class="container">
                            <input type="checkbox" name="other_brand" class="other_brand" id="other_brand" value="1">I am NOT willing to accept other's brand <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                                <tr>
                                        <td>14 kg gas quantity: </td><td><input style="width:350px; height:60px;" type="test" name="_14kg_gas_qty" id="_14kg_gas_qty"></td><td></td>		
                                </tr> 
                <div class="col-block">
                    <div class="col-block-2" id="retail_delivery">Retail price per cylinder (Excluding delivery): </div>
                    <div class="col-block-2" id="estimated_pricing">Estimated Pricing: </div>
                    <input type="hidden" name="total_price" id="total_price" value="">
                    <div class="col-block-2" id="tiny">*Including delivery and deposit (if new cylinder) charges</div>
        
        
                    <div class="col-submit">
                        <button class="submit" type="button"  value="submitData" onclick="submitData();" >Next </button>
                    </div>
                </div>--> 
    </body>
</html>