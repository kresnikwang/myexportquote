 <?php
//Author: Kris Wang
//Version: 1.10
//Date: 04/24/2015
   define('USER_TG',true);
   require 'includes/header_inc.php';
   require 'includes/oceanquote_inc.php';
?>

	<div class="container">
	<h3 align="left">Ocean Quote Calculator</h3>
<form class="form" role="form" align="left" action="" name="quoteinformation" method="post">
    
  <div class="form-group" id="result">
	<div class="col-sm-8">
  <textarea class="form-control"  rows="7" align="center" style="font-size:18px;" name="finalresult">
      <?php 
	    echo isset($commodity)?"Commodity: ".$commodity."\n"."      ":"";  
		echo isset($Destination)?"Destination: ".$Destination."\n"."      ":""; 
	    echo isset($FruitPrice)?"Fruit Price: $".round($FruitPrice,2)."\n"."      ":"";
		echo isset($insurance)?"Marine Insurance: $".round($insurance,2)."/Box\n"."      ":"";
		echo isset($FreightCost)?"Freight Cost: $".round($FreightCost,2)."/Box\n"."      ":"";
        echo isset($finalQuote)?"Final Quote: $".round($finalQuote,2)."\n"."      ":"";
        echo isset($netProfit)?"Total Net Profit: $".round($netProfit*$NoCS,2):"";
      ?>
  </textarea>
	</div>
  </div>

    <div class="form-group clearfix">
  <div class="col-sm-8" align="center" id="buttons">
  <input onClick="goAction('');" class="btn btn-success" id="calculate" name="calculate" value="Calculate">
  <input onClick="goAction('quotepdf_ocean.php');" class="btn btn-danger" id="quotepdf" name="quotepdf"  value="PDF Report">
  </div>
  </div>

	<div class="form-group clearfix" >
		<div class="col-sm-4 Padding-remove-left">
			<label class="control-label">Commodity</label>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-apple" aria-hidden="true"></span>
				<select id="mySelect" class="form-control" onchange="oceanAutofill(this.value)" name="commodity">
					<option value="Please Select" >Please Select</option>
					<option <?php if ($commodityair == "Apple"){echo "selected='selected'";} ?> value="Apple" >Apple</option>
					<option <?php if ($commodityair == "Avocado"){echo "selected='selected'";}?> value="Avocado" >Avocado </option>
					<option <?php if ($commodityair == "Blueberry"){echo "selected='selected'";} ?> value="Blueberry" >Blueberry</option>
					<option <?php if ($commodityair == "Grape"){echo "selected='selected'";} ?> value="Grape" >Grape</option>
					<option <?php if ($commodityair == "StoneFruit-2Layer"){echo "selected='selected'";} ?> value="StoneFruit-2Layer" >StoneFruit-2Layer</option>
					<option <?php if ($commodityair == "StoneFruit-VF"){echo "selected='selected'";} ?> value="StoneFruit-VF" >StoneFruit-VF</option>
				</select>
			</div>
		</div>
		<div class="col-sm-4 Padding-remove-left">
			<label class=" control-label">Destination</label>
			<div class=" input-group">
				<span class="input-group-addon glyphicon glyphicon-globe" aria-hidden="true"></span>
				<select id="mySelect" class="form-control" name="Destination">
					<option value="Please Select" >Please Select</option>
					<option <?php if ($Destination == "Busan"){echo "selected='selected'";} ?> value="Busan" >Busan</option>
					<option <?php if ($Destination == "ShangHai"){echo "selected='selected'";} ?> value="ShangHai" >ShangHai</option>
					<option <?php if ($Destination == "Yokohama"){echo "selected='selected'";}?> value="Yokohama" >Yokohama</option>
					<option <?php if ($Destination == "Hong Kong"){echo "selected='selected'";} ?> value="Hong Kong" >Hong Kong</option>
					<option <?php if ($Destination == "Singapore"){echo "selected='selected'";} ?> value="Singapore" >Singapore</option>
					<option <?php if ($Destination == "Jakarta"){echo "selected='selected'";} ?> value="Jakarta" >Jakarta</option>
					<option <?php if ($Destination == "Malaysia"){echo "selected='selected'";} ?> value="Malaysia" >Malaysia</option>
					<option <?php if ($Destination == "Taipei"){echo "selected='selected'";} ?> value="Taipei" >Taipei</option>
				</select>
			</div>
		</div>
	</div>
  
    <div class="form-group">
	<div class="col-sm-8 input-group">
        <span class="input-group-addon">NOTE:</span>
	    <input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($Notes)?$Notes:"";?>" name="Notes">
	</div>
  </div>

	<div class="form-group">
		<label class=" control-label">FOB Fruit Price</label>
		<div class="col-sm-8 input-group">
			<span class="input-group-addon">$</span>
			<input type="text" class="form-control" oninput="OrderProfit()" placeholder="Input" value="<?php  echo isset($FOBprice)?$FOBprice:"";?>" id="FOBprice" name="FOBprice">
		</div>
	</div>

	<div class="form-group clearfix">
		<div class="col-sm-4 Padding-remove-left">
			<label class=" control-label">Commission Rate</label>
			<div class="input-group">
				<input type="number" class="form-control"  oninput="OrderProfit()"  placeholder="Input" value="<?php  echo isset($commissionRate)?$commissionRate:"";?>" id="commissionRate" name="commissionRate">
				<span class="input-group-addon">%</span>
			</div>
		</div>
		<div class="col-sm-4 Padding-remove-left">
			<label class=" control-label">Net Profit/Case</label>
			<div class="input-group">
				<span class="input-group-addon">$</span>
				<input type="text" class="form-control"  oninput="OrderProfit()" placeholder="Input" value="<?php  echo isset($netProfit)?$netProfit:"";?>" id="netProfit" name="netProfit">
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class=" control-label">Number of Cases/Container</label>
		<div class="col-sm-8 input-group">
            <span class="input-group-addon">Quantity</span>
			<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($NoCS)?$NoCS:"";?>" name="NoCS">
		</div>
	</div>

  	<div class="form-group">
		<label class=" control-label">Container Charge</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($container)?$container:"";?>" name="container">
		</div>
  	</div>

  	<div class="form-group">
		<label class=" control-label">Pre-Carriage/Local Trucking</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($PreCarriage)?$PreCarriage:"";?>" name="PreCarriage">
		</div>
  	</div>
  
  	<div class="form-group">
		<label class=" control-label">PurFresh/AC System</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($purfresh)?$purfresh:"";?>" name="purfresh">
		</div>
  	</div>
  

	<div class="form-group">
		<label class=" control-label">Bill of Loading</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control" placeholder="Input" value="<?php  echo isset($BL)?$BL:"";?>" name="BL">
		</div>
  	</div>
  
    <div class="form-group">
		<label class=" control-label">Aes Fee</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($aesFee)?$aesFee:"";?>" name="aesFee">
		</div>
  	</div>
  
	<div class="form-group">
		<label class=" control-label">Phyto Charge</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($phyto)?$phyto:"";?>" name="phyto">
		</div>
  	</div>
 
    <div class="form-group">
		<label class=" control-label">Temper Recorder</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($temperRecorder)?$temperRecorder:"";?>" name="temperRecorder">
		</div>
  	</div>
  
    <div class="form-group">
		<label class=" control-label">Document</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($Document)?$Document:"";?>" name="Document">
		</div>
	</div>
  
    <div class="form-group">
		<label class=" control-label">Additional Charge</label>
		<div class="col-sm-8 input-group">
		<span class="input-group-addon">$</span>
		<input type="text" class="form-control"  placeholder="Input" value="<?php  echo isset($otherCharge)?$otherCharge:"";?>" name="otherCharge">
		</div>
  	</div>

  
    <div class="form-group">
  	<label class="control-label">Marine Insurance</label>
	<div class="col-sm-8 input-group">
	<select class="form-control" name="insuranceChoice">
	  <option value="None" >None</option>
	  <option <?php if ($insuranceChoice == "0.45/110%"){echo "selected='selected'";} ?> value="0.45/110%" >0.45/110%</option>
      <option <?php if ($insuranceChoice == "0.5/110%"){echo "selected='selected'";} ?> value="0.5/110%" >0.5/110%</option>
	  <option <?php if ($insuranceChoice == "0.45/100%"){echo "selected='selected'";} ?> value="0.45/100%" >0.45/100%</option>
      <option <?php if ($insuranceChoice == "0.65/100%"){echo "selected='selected'";} ?> value="0.65/100%" >0.65/100%</option>
      <option <?php if ($insuranceChoice == "0.6/100%"){echo "selected='selected'";} ?> value="0.6/100%" >0.6/100%</option>
    </select>
	</div>
  	</div>
  


  

  
</form>
 </div>
    <script src="js/oceanquote.js"></script>
   
  </body>
<?php
require 'includes/footer_inc.php';
?>