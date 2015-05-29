
 
   function price(){
   	
	var price1 = document.getElementById("price1").value;
	var quantity1 = document.getElementById("quantity1").value;
	var weight1 = document.getElementById("weight1").value;
   	var x = document.getElementById("select1").value;
	var quantity2 = document.getElementById("quantity2").value;
	var weight2 = document.getElementById("weight2").value;
   	var y = document.getElementById("select2").value;
	
	switch(x) {
		    case "g":
		        select1 = 1;
		        break;
		    case "oz":
		        select1 = 28.35;
		        break;
		 //   default:
		 //       y = "I have never heard of that fruit...";
		}
	switch(y) {
		    case "g":
		        select2 = 1;
		        break;
		    case "oz":
		        select2 = 28.35;
		        break;
		 //   default:
		 //       y = "I have never heard of that fruit...";
		}	
	
	var price2 = price1 * quantity2 * weight2 * select2 / (quantity1 * weight1 * select1);
	
	
   	var equalprice = document.getElementById("equalPrice");
	
	//alert (equalprice.value);
	
	equalprice.value = price2.toFixed(2);
   	
   }
      