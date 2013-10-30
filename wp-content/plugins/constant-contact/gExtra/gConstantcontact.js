/**
 *     Constant Contact
 *     Copyright (C) 2011  www.gopiplus.com
 * 
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

var xmlHttp
function GetXmlHttpObject(handler)
{ 
	var objXmlHttp=null
	if (navigator.userAgent.indexOf("Opera")>=0)
	{
		alert("This page doesn't work in Opera") 
		return 
	}
	if (navigator.userAgent.indexOf("MSIE")>=0)
	{ 
		var strName="Msxml2.XMLHTTP"
		if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
		{
			strName="Microsoft.XMLHTTP"
		} 
		try
		{ 
			objXmlHttp=new ActiveXObject(strName)
			objXmlHttp.onreadystatechange=handler 
			return objXmlHttp
		} 
		catch(e)
		{ 
			alert("Error. Scripting for ActiveX might be disabled") 
			return 
		} 
	} 
	if (navigator.userAgent.indexOf("Mozilla")>=0)
	{
		objXmlHttp=new XMLHttpRequest()
		objXmlHttp.onload=handler
		objXmlHttp.onerror=handler 
		return objXmlHttp
	}
} 
function gConstantcontact(siteurl)
{
	txt_email_newsletter=document.getElementById("gConstantcontact_email");
    if(txt_email_newsletter.value=="")
    {
        alert("Please enter the email address");
        txt_email_newsletter.focus();
        return false;    
    }
	if(txt_email_newsletter.value!="" && (txt_email_newsletter.value.indexOf("@",0)==-1 || txt_email_newsletter.value.indexOf(".",0)==-1))
    {
        alert("Please enter valid email")
        txt_email_newsletter.focus();
        txt_email_newsletter.select();
        return false;
    }
	document.getElementById("gConstantcontact_msg").innerHTML="loading..";
	var date_now=new Date()
    var mynumber=Math.random()
	var url=siteurl+"gCls1.php?txt_email_newsletter="+ txt_email_newsletter.value + "&timestamp=" + date_now + "&action=" + mynumber;
    xmlHttp=GetXmlHttpObject(newchanged)
    xmlHttp.open("GET", url , true)
    xmlHttp.send(null)
	
}

function newchanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		if(xmlHttp.responseText=="succ")
		{
			document.getElementById("gConstantcontact_msg").innerHTML="Subscribed successfully";
			document.getElementById("gConstantcontact_email").value="";
		}
		else if(xmlHttp.responseText=="exs")
		{
		    document.getElementById("gConstantcontact_msg").innerHTML="Already exist!";
		}
		else
		{
			document.getElementById("gConstantcontact_msg").innerHTML="Please try after some time!";
			document.getElementById("gConstantcontact_email").value="";
		}
	} 
} 