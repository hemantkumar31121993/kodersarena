function createRequestObject()
{ var xmlhttp = false;
        try
        {xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
         {try
                {
                       xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                catch (E)
                {
                       xmlhttp = false;
                }
         }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined')
        {
                  xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
}

function check_availability()
{	
	var req = createRequestObject();
	req.open("POST", 'user_avail.php?user=' + document.getElementById('user').value, true);
	req.onreadystatechange = function()
	{
		if(req.readyState == 4)
		{
			var response = req.responseText;
			var r;
		//	var x;
			if (response=="0")
			      {
				       r="The username is not valid!";
				      // req.send(null);
				      // alert(r);
				       document.getElementById('usererror').innerHTML=r;
				       document.getElementById('usererror').style.color="#d00";
					document.getElementById('user').style.borderColor="#d00";
				       document.getElementById('user').value=""; //test
				       document.getElementById('user').focus();
			//	req.send(null);   
				return(false);
			}
			else if (response=="1")
			{
				r="The username has to be greater than 4 characters and less than 15 characters!";
			//req.send(null);
			    //alert(r);      
			    document.getElementById('usererror').innerHTML=r;
			     document.getElementById('usererror').style.color="#d00";
				document.getElementById('user').style.borderColor="#d00";
			    document.getElementById('user').value=""; //test
			document.getElementById('user').focus();
		//	req.send(null);     
			return(false);
		    // req.send(null);
			}
			else if (response=="2")
			{
				r="The username '" + document.getElementById('user').value +"' is available!";
			   // req.send(null);
			     //alert(r);  
				document.getElementById('usererror').innerHTML="";
				document.getElementById('user').style.borderColor="#ddd";
				//document.getElementById('usererror').style.color="#0d0";
			   //document.getElementById('user').focus(); 
			//req.send(null);   
			 return true;   
			    
			}
			
			else if(response=="3")
			{
			r="The username '" + document.getElementById('user').value + "' is not available!";
	//	req.send(null);
		       //alert(r);
			document.getElementById('usererror').innerHTML=r;
			 document.getElementById('usererror').style.color="#d00";
			document.getElementById('user').style.borderColor="#d00";
		       document.getElementById('user').value=""; //test
		      document.getElementById('user').focus();
		      //req.send(null);
		       return(false);
			}
			
		//return true;
			
		}
	}

req.send(null);
	
}



function check_availability1()
{	
	var req = createRequestObject();
	req.open("POST", 'user_avail.php?user=' + document.getElementById('user').value, true);
	var x=true;
	req.onreadystatechange = function()
	{
		if(req.readyState == 4)
		{
			var response = req.responseText;
			var r;
		     
			if (response=="0")
			      { x=false;
				       r="The username is not valid!";
				       //req.send(null);
				       alert(r);
				       document.getElementById('user').focus();
				      
			}
			else if (response=="1")
			{ x=false;
				r="The username has to be greater than 4 characters and less than 15 characters!";
			//	req.send(null);
			    alert(r);       
			document.getElementById('user').focus();
			      
			}
			else if (response=="2")
			{ x=true; 
				r="The username '" + document.getElementById('user').value +"' is available!";
			  //  req.send(null);
			      
			    
			}
			
			else if(response=="3")
			{ x=false;
				r="The username '" + document.getElementById('user').value +"' is not available!";
			//	req.send(null);
				alert(r);
				document.getElementById('user').focus();
			
			}
			
			
			
		}
	}
   req.send(null);
   return x;	
	
}

function getImg() {
	var r = Math.random();
	var chance = Math.round((r*100)%60);
	var img = document.getElementById('secImg');
	img.src = patternImg[chance].name;
	img.name = patternImg[chance].name;
}

function checkTeamName()
{
	var req = createRequestObject();
	req.open("GET",'team_check.php?tname=' + document.getElementById('team').value + '&tpass=' + document.getElementById('tpass').value, true);
	req.onreadystatechange = function()
	{
		if(req.readyState == 4)
		{
			var response = req.responseText;
			alert(response);
		}
	}
	req.send(null);
}

//////////////////////////////////////////no more ajax//////////////////////////////////////////




function validate(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10)
{
	if(document.getElementById(id1).value == "" || document.getElementById(id2).value == "" || document.getElementById(id3).value == "" || document.getElementById(id4).value == "" || document.getElementById(id5).value == "" || document.getElementById(id6).value == "" || document.getElementById(id7).value == "" || document.getElementById(id8).value == "" || document.getElementById(id9).value == "" || document.getElementById(id10).value == "")
	{
		alert("Please fill in all the required fields");
		return false;
	}
	else
	{	// && check_availability()
		return ( check_availability1() && passwdmatch() && verifyEmail(document.getElementById('mail').value) && checkImg() && checkMobile() && checkRoll());
	}
}
function validate1(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10) {
	if(validate(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10)) {
		return true;
	} else {
		reloadImg();
		return false;
	}
}
function passwdmatch()
{
	if(!(document.getElementById('pass').value == document.getElementById('repass').value))
	{
		//alert("Your User Passwords do not match");
		document.getElementById('passerror').innerHTML="Your user Password do not match.";
		document.getElementById('passerror').style.color="#d00";
		document.getElementById('pass').focus();
		document.getElementById('pass').style.borderColor="#d00";
		document.getElementById('repass').style.borderColor="#d00";
		return false;
	}
	document.getElementById('passerror').innerHTML="";
	document.getElementById('pass').style.borderColor="#ddd";
	document.getElementById('repass').style.borderColor="#ddd";
	return true;
}

function verifyEmail(email)
{
	var okay=true;
	if(!(email.indexOf(".")>0) || !(email.indexOf("@")>5))
	{
		okay=false;
	}
	if( ((email.lastIndexOf(".") - email.indexOf("@")) <2) || ((email.indexOf("@") - email.indexOf("."))==1) || !(((email.charAt(0) >="A") && (email.charAt(0) <="Z")) || ((email.charAt(0) >="a") && (email.charAt(0) <="z"))) )
	{
		okay=false;
	}
	if(!okay)
	{
		//alert("Your email id doesn't seem to be valid!");
		document.getElementById('mailerror').innerHTML="Your email id doesn't seem to be valid!";
		document.getElementById('mailerror').style.color="#d00";
		document.getElementById('mail').focus(); 
		document.getElementById('mail').style.borderColor="#d00";
		return okay;
	}
	document.getElementById('mailerror').innerHTML="";
	document.getElementById('mail').style.borderColor="#ddd";
	return okay;
}

function checkImg()
{	
	imgname=document.getElementById('secImg').name.toUpperCase();
	imgtxt="patterns/" + document.getElementById('imgNo').value + ".png";
	imgtxt=imgtxt.toUpperCase();
	if (imgname == imgtxt)
	{
		return true;
	}
	else
	{
		alert("Seems to be a machine!\n\nPlease enter correct captcha for being human.");
		document.getElementById('imgNo').focus();
		return false;
	}
}

function reloadImg() {
	getImg();
}

function checkMobile() {
	var num = document.getElementById('mob').value;
	if(isNaN(num)){
		document.getElementById('moberror').innerHTML="Enter a valid mobile number";
		document.getElementById('moberror').style.color="#d00";
		document.getElementById('mob').focus();
		document.getElementById('mob').value = "";
		document.getElementById('mob').style.borderColor="#d00";
		return false;
	}
	var numstr = new String(""+num);
	if(numstr.length != 10) {
		document.getElementById('moberror').innerHTML="Enter your 10 digit mobile number";
		document.getElementById('moberror').style.color="#d00";
		document.getElementById('mob').focus();
		document.getElementById('mob').style.borderColor="#d00";
		return false;
	}
	document.getElementById('mob').style.borderColor="#ddd";
	document.getElementById('moberror').innerHTML="";
	return true;
}

function checkRoll() {
	var roll = document.getElementById("rno").value.toUpperCase();
	if(roll.length !=9) {// || roll.charAt(0)!='B' || roll.charAt(0)!='M' ||roll.charAt(0)!='P') {
		document.getElementById("rollerror").innerHTML="Enter your valid roll number.";
		document.getElementById("rollerror").style.color="#d00";
		document.getElementById("rno").focus();
		document.getElementById("rno").style.borderColor="#d00";
		return false;
	}
	document.getElementById("rollerror").innerHTML="";
	document.getElementById("rollerror").style.color="#ddd";
	document.getElementById("rno").value=roll;
	return true;
}
