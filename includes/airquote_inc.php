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
   
  $commodityair=_POST('commodityair');
  $Notes=_POST('Notes');  
  $Destination=_POST('Destination');
  $FOBprice=_POST('FOBprice');
  $commissionRate=_POST('commissionRate');
  $airrate=_POST('airrate');
  $weightpercase=_POST('weightpercase');
  $Trucking=_POST('Trucking');
  $OtherPalletCharge=_POST('OtherPalletCharge');
  $temperRecorder=_POST('temperRecorder');
  $GelPack=_POST('GelPack');
  $otherCharge=_POST('otherCharge');
  $coolguard=_POST('coolguard');
  $phyto=_POST('phyto');
  $documentfee=_POST('documentfee');
  $NoCS=_POST('NoCS');
  $NOPS=_POST('NOPS');

  
  
  if($commissionRate<0){
	  $commissionRate = 10;
  }
  if($NoCS<=0){
	  $NoCS =192;
  }
  
  if($NOPS<=0){
	  $NOPS =2;
  }
  
  
  $FruitPrice = $FOBprice * $commissionRate/100 + $FOBprice;
  $FreightCost = ($airrate*$weightpercase*$NoCS*$NOPS+$Trucking*$NOPS+$GelPack*$NOPS+$OtherPalletCharge*$NOPS+$temperRecorder+$otherCharge+$coolguard*$NOPS+$documentfee+$phyto)/($NoCS*$NOPS);
  $finalQuote = $FruitPrice + $FreightCost;
  ?>