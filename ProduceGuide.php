<?php
define('USER_TG',true);
require 'includes/header_inc.php';
?>
	 
    <script src="https://code.angularjs.org/1.3.15/angular.min.js"></script>

    <!-- Include the AngularJS routing library -->
    <script src="https://code.angularjs.org/1.3.15/angular-route.min.js"></script> 	 
	 
    <div class="container" ng-app="FruitsGuide">
    
		<div ng-view></div>

    
    
        <!-- Modules -->
    <script src="js/app.js"></script>

    <!-- Controllers -->
    <script src="js/controllers/HomeController.js"></script>
    <script src="js/controllers/GuideController.js"></script>

    <!-- Services -->
    <script src="js/services/guide.js"></script>
    
    </div>
  
<?php
require 'includes/footer_inc.php';
?>

<!--     <div class="header"> -->
<!--       <div class="container"> -->
<!--         <a href="#"> -->
<!--           <h3>Produce Guide</h3> -->
<!--         </a> -->
<!--       </div> -->
<!--     </div> -->