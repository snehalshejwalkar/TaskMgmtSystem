/*	define your project path here */
function silentErrorHandler() {return true;}
window.onerror=silentErrorHandler;

if(window.location.hostname == "localhost")
	var serverLocation = "http://"+window.location.hostname+"/projects/Bismila"; 
else
	var serverLocation = "http://"+window.location.hostname; 
var SITEROOT = serverLocation;
var SITECSS = serverLocation + "/templates/default/css";
var SITEJS = serverLocation + "/templates/default/js";
function loadjscssfile(filename,filetype){
if (filetype == "js"){ //if filename is a external JavaScript file
	document.write("<script src='" + SITEJS + "/" + filename + "' type='text/javascript'></script>");
}
else if (filetype == "css"){ //if filename is an external CSS file
	document.write("<link href='" + SITECSS + "/" + filename + "' type='text/css' rel='stylesheet'>");
}
}


