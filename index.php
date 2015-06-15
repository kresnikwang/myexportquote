<?php
define('USER_TG', true);
require 'includes/header_inc.php';
require 'includes/airquote_inc.php';
?>

    <div class="container">

        <div class="row">

            <div id="content" class="col-sm-9 left">
                <h3 align="left">Air Quote Calculator</h3>

                <form class="form" role="form" target="" align="left" action="" name="quoteinformation" method="post">

                    <div class="form-group" id="result">
                        <div class="col-sm-10">
    <textarea class="form-control" rows="6" align="center" style="font-size:18px;" name="finalresult">
      <?php
      echo isset($commodityair) ? "Commodity: " . $commodityair . "\n" . "      " : "";
      echo isset($Destination) ? "Destination: " . $Destination . "\n" . "      " : "";
      echo isset($FruitPrice) ? "Fruit Price: $" . round($FruitPrice, 2) . "\n" . "      " : "";
      echo isset($FreightCost) ? "Freight Cost: $" . round($FreightCost, 2) . "/Box\n" . "      " : "";
      echo isset($finalQuote) ? "Final Quote: $" . round($finalQuote, 2) . "\n" . "      " : "";
      echo isset($netProfit) ? "Total Net Profit: $" . round($netProfit * $NoCS, 2) : "";
      ?>
     </textarea>
                        </div>
                    </div>


                    <div class="form-group clearfix">
                        <div class="col-sm-10" align="center" id="buttons">
                            <input onClick="goAction('');" class="btn btn-success" id="calculate" name="calculate"
                                   value="Calculate">
                            <input onClick="goAction('quotepdf.php');" class="btn btn-danger" id="quotepdf"
                                   name="quotepdf" value="PDF Report">
                        </div>
                    </div>

                    <div class="form-group clearfix" id="Select_name">
                        <div class="col-sm-4 Padding-remove-left">
                            <label class="control-label">Commodity</label>

                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-apple" aria-hidden="true"></span>
                                <select id="mySelect" class="form-control" onchange="airAutofill(this.value)"
                                        name="commodityair">
                                    <option value="Please Select">Please Select</option>
                                    <option <?php if ($commodityair == "Apple") {
                                        echo "selected='selected'";
                                    } ?> value="Apple">Apple
                                    </option>
                                    <option <?php if ($commodityair == "Avocado") {
                                        echo "selected='selected'";
                                    } ?> value="Avocado">Avocado
                                    </option>
                                    <option <?php if ($commodityair == "Blueberry") {
                                        echo "selected='selected'";
                                    } ?> value="Blueberry">Blueberry
                                    </option>
                                    <option <?php if ($commodityair == "Grape") {
                                        echo "selected='selected'";
                                    } ?> value="Grape">Grape
                                    </option>
                                    <option <?php if ($commodityair == "StoneFruit-2Layer") {
                                        echo "selected='selected'";
                                    } ?> value="StoneFruit-2Layer">StoneFruit-2Layer
                                    </option>
                                    <option <?php if ($commodityair == "StoneFruit-VF") {
                                        echo "selected='selected'";
                                    } ?> value="StoneFruit-VF">StoneFruit-VF
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 Padding-remove-left">
                            <label class=" control-label">Destination</label>

                            <div class=" input-group">
                                <span class="input-group-addon glyphicon glyphicon-plane" aria-hidden="true"></span>
                                <select id="mySelect" class="form-control" name="Destination">
                                    <option value="Please Select">Please Select</option>
                                    <option <?php if ($Destination == "Inchen") {
                                        echo "selected='selected'";
                                    } ?> value="Inchen">Inchen
                                    </option>
                                    <option <?php if ($Destination == "ShangHai") {
                                        echo "selected='selected'";
                                    } ?> value="ShangHai">ShangHai
                                    </option>
                                    <option <?php if ($Destination == "Japan") {
                                        echo "selected='selected'";
                                    } ?> value="Japan">Japan
                                    </option>
                                    <option <?php if ($Destination == "Hong Kong") {
                                        echo "selected='selected'";
                                    } ?> value="Hong Kong">Hong Kong
                                    </option>
                                    <option <?php if ($Destination == "Singapore") {
                                        echo "selected='selected'";
                                    } ?> value="Singapore">Singapore
                                    </option>
                                    <option <?php if ($Destination == "Jakarta") {
                                        echo "selected='selected'";
                                    } ?> value="Jakarta">Jakarta
                                    </option>
                                    <option <?php if ($Destination == "Malaysia") {
                                        echo "selected='selected'";
                                    } ?> value="Malaysia">Malaysia
                                    </option>
                                    <option <?php if ($Destination == "Taipei") {
                                        echo "selected='selected'";
                                    } ?> value="Taipei">Taipei
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="Notes_name">
                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">NOTE:</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($Notes) ? $Notes : ""; ?>" id="Notes" name="Notes">
                        </div>
                    </div>

                    <div class="form-group" id="FOBprice_name">
                        <label class=" control-label">FOB Fruit Price</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" oninput="OrderProfit()" placeholder="Input"
                                   value="<?php echo isset($FOBprice) ? $FOBprice : ""; ?>" id="FOBprice"
                                   name="FOBprice">
                        </div>
                    </div>

                    <div class="form-group clearfix" id="Profit_name">
                        <div class="col-sm-4 Padding-remove-left">
                            <label class=" control-label">Commission Rate</label>

                            <div class="input-group">
                                <input type="number" class="form-control" oninput="OrderProfit()" placeholder="Input"
                                       value="<?php echo isset($commissionRate) ? $commissionRate : ""; ?>"
                                       id="commissionRate" name="commissionRate">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-sm-4 Padding-remove-left">
                            <label class="control-label">Net Profit/Case</label>

                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control" oninput="OrderProfit()" placeholder="Input"
                                       value="<?php echo isset($netProfit) ? $netProfit : ""; ?>" id="netProfit"
                                       name="netProfit">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="NoCS_name">
                        <label class=" control-label">Number of Cases/pallet</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">Quantity:</span>
                            <input type="number" class="form-control" oninput="weight()" placeholder="Input"
                                   value="<?php echo isset($NoCS) ? $NoCS : ""; ?>" id="NoCS" name="NoCS">
                        </div>
                    </div>

                    <div class="form-group" id="NoPS_name">
                        <label class=" control-label">Number of Pallets</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">Quantity:</span>
                            <input type="number" class="form-control" placeholder="Input"
                                   value="<?php echo isset($NOPS) ? $NOPS : ""; ?>" name="NOPS">
                        </div>
                    </div>

                    <div class="form-group" id="airrate_name">
                        <label class=" control-label">Air Rate/kg</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($airrate) ? $airrate : ""; ?>" name="airrate">
                            <span class="input-group-addon"><?php echo "/kg" ?></span>
                        </div>
                    </div>

                    <div class="form-group clearfix" id="weight_name">
                        <div class="col-sm-4 Padding-remove-left">
                            <label class=" control-label">Gross Weight/Case</label>

                            <div class="input-group">
                                <input type="text" class="form-control" oninput="weight()" placeholder="Input"
                                       value="<?php echo isset($weightpercase) ? $weightpercase : ""; ?>"
                                       id="weightpercase" name="weightpercase">
                                <span class="input-group-addon">kg</span>
                            </div>
                        </div>
                        <div class="col-sm-4 Padding-remove-left">
                            <label class=" control-label">Gross Weight/Pallet</label>

                            <div class="input-group">
                                <input type="text" class="form-control" oninput="weight()" placeholder="Input"
                                       value="<?php echo isset($weightperpallet) ? $weightperpallet : ""; ?>"
                                       id="weightperpallet" name="weightperpallet">
                                <span class="input-group-addon">kg</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group" id="trucking_name">
                        <label class=" control-label">Trucking/Pallet</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($Trucking) ? $Trucking : ""; ?>" name="Trucking">
                        </div>
                    </div>

                    <div class="form-group" id="coolguard_name">
                        <label class=" control-label">Coolguard/Pallet</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($coolguard) ? $coolguard : ""; ?>" name="coolguard">
                        </div>
                    </div>

                    <div class="form-group" id="OtherPalletCharge_name">
                        <label class=" control-label">Additional Charge/Pallet</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($OtherPalletCharge) ? $OtherPalletCharge : ""; ?>"
                                   name="OtherPalletCharge">
                        </div>
                    </div>

                    <div class="form-group" id="temperRecorder_name">
                        <label class=" control-label">Temper Recorder/Shipment</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($temperRecorder) ? $temperRecorder : ""; ?>"
                                   name="temperRecorder">
                        </div>
                    </div>

                    <div class="form-group" id="documentfee_name">
                        <label class=" control-label">Document Fee/Shipment</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($documentfee) ? $documentfee : ""; ?>" name="documentfee">
                        </div>
                    </div>

                    <div class="form-group" id="phyto_name">
                        <label class=" control-label">Phyto Fee/Shipment</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($phyto) ? $phyto : ""; ?>" name="phyto">
                        </div>
                    </div>

                    <div class="form-group" id="otherCharge_name">
                        <label class=" control-label">Additional Charge/Shipment</label>

                        <div class="col-sm-10 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Input"
                                   value="<?php echo isset($otherCharge) ? $otherCharge : ""; ?>" name="otherCharge">
                        </div>
                    </div>

                </form>
            </div>


            <!--Affix start-->
            <nav class="sidebar col-xs-3 hidden-xs" id="myScrollspy">
                <ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="10">
                    <li class="active"><a href="#Select_name">mySelect</a></li>
                    <li><a href="#Notes_name">Notes</a></li>
                    <li><a href="#FOBprice_name">FOB Price</a></li>
                    <li><a href="#Profit_name">Profit Part</a></li>
                    <li><a href="#NoCS_name">Number of Cases</a></li>
                    <li><a href="#NoPS_name">Number of Pallets</a></li>
                    <li><a href="#airrate_name">Air Rates</a></li>
                    <li><a href="#weight_name">Weight</a></li>
                    <li><a href="#trucking_name">Trucking</a></li>
                    <li><a href="#coolguard_name">Coolguard</a></li>
                    <li><a href="#OtherPalletCharge_name">Other Pallet Charge</a></li>
                    <li><a href="#temperRecorder_name">Temper Recorder</a></li>
                    <li><a href="#documentfee_name">Document Fee</a></li>
                    <li><a href="#phyto_name">Phyto Charge</a></li>
                    <li><a href="#otherCharge_name">Other Charge</a></li>
                </ul>
            </nav>
            <!--Affix end-->
        </div>


    </div>



    <script src="js/airquote.js"></script>



<?php
require 'includes/footer_inc.php';
?>