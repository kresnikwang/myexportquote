<?php
define('USER_TG',true);
require 'includes/header_inc.php';
?>
	 
	<div class="container" id="packconverter"> 
    <h3 align="left">Pack Converter</h3>
	  <div><br/></div>
	
    <form class="form-inline" align="left">
    <div class="form-group">
	<label class="control-label" for="price1">Enter Price:</label>
	<div class="input-group">
	<span class="input-group-addon">$</span>
    <input type="text" id="price1" class="form-control"  placeholder="Input" oninput="price()">
	</div>
  </div>
  </form>
  
   <div><br/></div>
  
	<form class="form-inline" align="left">
    <div class="form-group">
	<label class="control-label" for="quantity1">Original Pack Size:</label>
    <input type="text" class="form-control"  placeholder="Input" id="quantity1" value="12" oninput="price()">
	</div>
	<div class="form-group">
	<label for="weight1" >X</label>
	<input type="text" class="form-control"  placeholder="Input" id="weight1"   value="6" oninput="price()">
	</div>
	<select id="select1" class="form-control" name="unit1" onchange="price()">
      <option selected='selected' value="g" >g</option>
	  <option selected='selected' value="oz" >oz</option>  
    </select>
	</form>

 <div><br/></div>
  

	<form class="form-inline" align="left">
    <div class="form-group">
	<label class="control-label" for="quantity2">Quote Pack Size:</label>
    <input type="text" class="form-control"  placeholder="Input" id="quantity2" value="12" oninput="price()">
	</div>
	<div class="form-group">
	<label for="weight2">X</label>
	<input type="text" class="form-control"  placeholder="Input" id="weight2"   value="4.4" oninput="price()">
	</div>
	<select id="select2" class="form-control" name="unit2" onchange="price()">
      <option selected='selected' value="g" >g</option>
	  <option selected='selected' value="oz" >oz</option>  
    </select>
	</form>
	
	

  <div><br/></div>
    
   <form class="form-inline" align="left">	
  <div class="form-group">
  <label class="control-label" for="equalPrice">Price Equivalent:</label>
  <div class="input-group">
  <span class="input-group-addon">$</span>
  <input class="form-control" id="equalPrice" style="font-size:18px;" readonly>
  </div>
	
  </div>
  </form>

 </div>
    <script src="js/packconverter.js"></script>

<?php
require 'includes/footer_inc.php';
?>