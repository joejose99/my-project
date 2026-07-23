 
function c(val)
{
	
	 
	 document.getElementById("d").value=val;
	 
}
function v(val)
{
	
	  
	 var eq =document.getElementById("equallTo").value ;
	 
	 
if(eq == "=" && val == "0" && val != "+")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	
	if(eq == "=" && val == "1" )
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	if(eq == "=" && val == "2" && val != "+")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	if(eq == "=" && val == "3" && val != "+")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	if(eq == "=" && val == "4")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	if(eq == "=" && val == "5")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	
	if(eq == "=" && val == "6")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	
	if(eq == "=" && val == "7")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	if(eq == "=" && val == "8")
	{ 
		 
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	
	
	if(eq == "=" && val == "9")
	{ 
		//alert(vall);
		 document.getElementById("d").value ="";
		document.getElementById("equallTo").value ="";
	}
	 
	
	
	document.getElementById("d").value+=val;
	document.getElementById("equallTo").value =""
	
	 
	 
}
function e(eq) 
{ 
	try 
	{ 
	  c(eval(document.getElementById("d").value)) 
	  
	  
	  document.getElementById("equallTo").value=eq;
	  
	  
	   
	} 
	catch(e) 
	{
	  c('Error') 
	} 
}
 