

		function createCookie(name, value, days)
			{
				var expires;
					if (days)
						{
							var date = new Date();
								date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
									expires = "; expires=" + date.toGMTString();
						} else {
							expires = "";
						}
				document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
			}

		function readCookie(name)
			{
				var nameEQ 	=	encodeURIComponent(name) + "=";
				var ca 		=	document.cookie.split(';');
				
					for (var i = 0; i < ca.length; i++)
						{
							var c = ca[i];
								while (c.charAt(0) === ' ')
									c = c.substring(1, c.length);
								if (c.indexOf(nameEQ) === 0)
									return decodeURIComponent(c.substring(nameEQ.length, c.length));
						}
				return null;
			}
			

// detect device

var nVer = navigator.appVersion;
var nAgt = navigator.userAgent;
var browserName  = navigator.appName;
var fullVersion  = ''+parseFloat(navigator.appVersion); 
var majorVersion = parseInt(navigator.appVersion,10);
var nameOffset,verOffset,ix;

// In Opera, the true version is after "Opera" or after "Version"
if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
 browserName = "Opera";
 fullVersion = nAgt.substring(verOffset+6);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In MSIE, the true version is after "MSIE" in userAgent
else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
 browserName = "Microsoft Internet Explorer";
 fullVersion = nAgt.substring(verOffset+5);
}
// In Chrome, the true version is after "Chrome" 
else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
 browserName = "Chrome";
 fullVersion = nAgt.substring(verOffset+7);
}
// In Safari, the true version is after "Safari" or after "Version" 
else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
 browserName = "Safari";
 fullVersion = nAgt.substring(verOffset+7);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In Firefox, the true version is after "Firefox" 
else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
 browserName = "Firefox";
 fullVersion = nAgt.substring(verOffset+8);
}
// In most other browsers, "name/version" is at the end of userAgent 
else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
          (verOffset=nAgt.lastIndexOf('/')) ) 
{
 browserName = nAgt.substring(nameOffset,verOffset);
 fullVersion = nAgt.substring(verOffset+1);
 if (browserName.toLowerCase()==browserName.toUpperCase()) {
  browserName = navigator.appName;
 }
}
// trim the fullVersion string at semicolon/space if present
if ((ix=fullVersion.indexOf(";"))!=-1)
   fullVersion=fullVersion.substring(0,ix);
if ((ix=fullVersion.indexOf(" "))!=-1)
   fullVersion=fullVersion.substring(0,ix);

majorVersion = parseInt(''+fullVersion,10);
if (isNaN(majorVersion)) {
 fullVersion  = ''+parseFloat(navigator.appVersion); 
 majorVersion = parseInt(navigator.appVersion,10);
}

/*


document.write(''
 +'Browser name  = '+browserName+'<br>'
 +'Full version  = '+fullVersion+'<br>'
 +'Major version = '+majorVersion+'<br>'
 +'navigator.appName = '+navigator.appName+'<br>'
 +'navigator.userAgent = '+navigator.userAgent+'<br>'
)

*/


	createCookie("USR_BROWSERNAME", browserName, 1);
	createCookie("USR_FULLVERSION", fullVersion, 1);

// detect device



	$("Document").ready(function()
		{
			if(readCookie('IPINFO_USER_IP')===null)
				{
					$.get("https://ipinfo.io", function(response)
						{
									createCookie("IPINFO_USER_IP", response.ip, 1);
								createCookie("IPINFO_USER_CITY", response.city, 1);
							createCookie("IPINFO_USER_REGION", response.region, 1);
						}, "jsonp");
				}
		});


		function showresponse(showtype,showmessage,targetelement)
				{ 
					$(targetelement).fadeIn("slow");
						$(targetelement).html(showmessage);
							
							$(targetelement).addClass("alert");
							$(targetelement).removeClass("alert-success");
							$(targetelement).removeClass("alert-warning");
							$(targetelement).removeClass("alert-danger");
							
							switch(showtype)
								{
									case 1:
											$(targetelement).addClass("alert-success");
									break;
									case 2:
											$(targetelement).addClass("alert-warning");
									break;
									default:				
											$(targetelement).addClass("alert-danger");
									break;
								}
					return "";
				}	
		
		function dorequest(url,formclass,resclass)	
				{  
					$(resclass).slideDown();
						$(resclass).html("<center><img src='"+baserelativepath+"loader.gif' style='max-width:32px;margin:3px auto;' /></center>");
					
					// var data = $(formclass).serializeArray();
					   
						 var form = $(formclass)[0];
						 var formData = new FormData(form);
						 
							$.ajax({
									type: "POST",
									async: true,
									cache: false,
									url: url,
									data: formData,
									processData: false,
									contentType: false,
									
									success: function (tempdata)
										{				
												if (tempdata.trim() != '') 
													{
														var values = JSON.parse(tempdata);
														showresponse(values.status,values.message,resclass);
														
														if ( typeof values.redurl !== 'undefined' && values.redurl !== '0' )
															{
																setTimeout(function(){
																	window.location.href	= values.redurl;	
																},786);
															}
														
													} else {
														showresponse(0,"Something went wrong, Please try again later.",resclass);
													}
										},
									cache: false
								}).fail(function (jqXHR, textStatus, error) {
									// Handle error here
									showresponse(0,"Something went wrong, Please try again later.",resclass);
								//	console.log(jqXHR.status);
								});
					return false;
				}
		
		function dosearchrequest(url,keyword,resclass)	
				{  
					$(resclass).slideDown();
						$(resclass).html("<center><img src='"+baserelativepath+"loader.gif' style='max-width:32px;margin:3px auto;' /></center>");
					
						 
							$.post(url, 
									{
										keyword:keyword
									}, 
										function(tempdata)
											{ 		
												if (tempdata.trim() != '') 
													{
														$(resclass).html(tempdata);
													} else {
														$(resclass).slideUp();
													}
											}
									);
						 
					return false;
					
							$.ajax({
									type: "POST",
									async: true,
									cache: false,
									url: url,
									data: {
										keyword:keyword
									},
									processData: false,
									contentType: false,
									
									success: function (tempdata)
										{		
										},
									cache: false
								}).fail(function (jqXHR, textStatus, error) {
									// Handle error here
									showresponse(0,"Something went wrong, Please try again later.",resclass);
									$(resclass).slideUp();
								//	console.log(jqXHR.status);
								});
				}