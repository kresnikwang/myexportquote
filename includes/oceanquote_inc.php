<?php
//Author: Kris Wang
//Version: 1.10
//Date: 04/24/2015
if(!defined('USER_TG'))
{
  exit('Ilegal Visit');
};

function _POST($str){
  $val = !empty($_POST[$str]) ? $_POST[$str] : null;
  return $val;
}

$commodity=_POST('commodity');
$Notes=_POST('Notes');
$Destination=_POST('Destination');
$FOBprice=_POST('FOBprice');
$commissionRate=_POST('commissionRate');
$netProfit=_POST('netProfit');
$container=_POST('container');
$purfresh=_POST('purfresh');
$PreCarriage=_POST('PreCarriage');
$BL=_POST('BL');
$aesFee=_POST('aesFee');
$otherCharge=_POST('otherCharge');
$temperRecorder=_POST('temperRecorder');
$Document=_POST('Document');
$phyto=_POST('phyto');
$NoCS=_POST('NoCS');
$insurance=_POST('insurance');
$insuranceChoice=_POST('insuranceChoice');


if($commissionRate<0){
  $commissionRate = 10;
}
if($NoCS<=0){
  $NoCS =1000;
}




$FruitPrice = $FOBprice * $commissionRate/100 + $FOBprice;

$FreightCostNoInsurance = ($container+$purfresh+$PreCarriage+$BL+$aesFee+$otherCharge+$temperRecorder+$Document+$phyto)/$NoCS;

switch($insuranceChoice){
  case "None";
    $insurance=($FruitPrice + $FreightCostNoInsurance)*0;break;
  case "0.45/110%";
    $insurance=($FruitPrice + $FreightCostNoInsurance)*0.45/109.55;break;
  case "0.5/110%";
    $insurance=($FruitPrice + $FreightCostNoInsurance)*0.5/109.5;break;
  case "0.45/100%";
    $insurance=($FruitPrice + $FreightCostNoInsurance)*0.45/99.55;break;
  case "0.65/100%";
    $insurance=($FruitPrice + $FreightCostNoInsurance)*0.65/99.35;break;
  case "0.6/100%";
    $insurance=($FruitPrice + $FreightCostNoInsurance)*0.6/99.4;break;
}

$FreightCost=$FreightCostNoInsurance+$insurance;

$finalQuote = $FruitPrice + $FreightCost;
?>