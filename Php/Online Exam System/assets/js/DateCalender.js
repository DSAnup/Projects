// JavaScript Document
var dat;
function dateShow()
{
    var mon = document.getElementById("month").value;
    var yr = document.getElementById("year").value;
							
    if(mon != "Month" && yr != "Year")
    {
        var url = "./home/archive_calendar";
        mkax();
							
        dat.onreadystatechange=function(){   
            if(dat.readyState == 4 )
            {    
                document.getElementById("dateShow1").innerHTML=dat.responseText;
            }
														     
        }
        //str="name";
															 
        dat.open("GET",url+"?month="+mon+"&year="+yr,true);	 
        dat.setRequestHeader("content_type","application/x_www_form_urlencoded");
        dat.send(null);
    }										
}
						
															 
															 
function mkax()
{
    try
    {
        // Firefox, Opera 8.0+, Safari
        dat=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            dat=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                dat=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
}
										 
	
var dat;
function dateShow1()
{
    var mon = document.getElementById("month").value;
    var yr = document.getElementById("year").value;
							
    if(mon != "Month" && yr != "Year")
    {
        var url = "../classes/DateChange1.php";
        mkax();
							
        dat.onreadystatechange=function(){   
            if(dat.readyState == 4 )
            {    
                document.getElementById("dateShow1").innerHTML=dat.responseText;
            }
														     
        }
        //str="name";
															 
        dat.open("GET",url+"?month="+mon+"&year="+yr,true);	 
        dat.setRequestHeader("content_type","application/x_www_form_urlencoded");
        dat.send(null);
    }										
}
						
															 
															 
function mkax()
{
    try
    {
        // Firefox, Opera 8.0+, Safari
        dat=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            dat=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                dat=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
}
										 

