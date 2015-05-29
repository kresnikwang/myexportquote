<?php
//Author: Kris Wang
//Version: 1.10
//Date: 04/24/2015

if(!defined('USER_TG'))
{
    exit('Ilegal Visit');
};

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}


?>


<html>
  <head>
    <title>My Export Quote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/main.css">
    <link rel="shortcut icon" href="assets/favicon.ico"/>
    <link rel="bookmark" href="assets/favicon.ico"/>
	</head>
  
  <body>
     
	<nav class="navbar navbar-default">
	<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">My Export Quote</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav">
		<li <?=echoActiveClassIfRequestMatches("index")?>>
        <a href="index.php">Air Quote</a></li>
		<li <?=echoActiveClassIfRequestMatches("oceanquote")?>>
        <a href="oceanquote.php">Ocean Quote</a></li>
		<li <?=echoActiveClassIfRequestMatches("packconverter")?>>
		<a href="packconverter.php">Pack Converter</a></li>
		<li <?=echoActiveClassIfRequestMatches("ProduceGuide")?>>
		<a href="ProduceGuide.php">Produce Guide</a></li>
		</ul>
    </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	</nav>