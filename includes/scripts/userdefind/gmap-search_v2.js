$(document).ready(function()
  {
	$(function() {
		$("button, input:submit, a", ".demo").button();
		
		$("a", ".demo").click(function() { return false; });
	});

	$("#add_add_animations").click(function(){		 
		var cov_id='';		
		var cov_from = $("#wed_succ_con").val();		
		var wed_accid = $("#wed_accid").val(); 		
		var urlis = "wedding_animate.php?wed_id="+wed_accid+"&do=kavi&from="+cov_from;
		window.location.href =urlis;
	});	
	$("#skip_later").click(function(){ 		 		
		var urli = "/e-wedding.php";
		window.location.href =urli;
	});
$("#reset_marker").click(function(){
reset();
});
	$("#save_coordinates").click(function(){
	var lonbox = $.trim($('#lonbox').val());
	var latbox = $.trim($('#latbox').val());
	var theme_id = $.trim($('#glb_wed_id').val());
	var glb_url = $.trim($('#glb_site_url').val());
	var	url=glb_url+"ajaxfiles/ajax_createwed.php";
	tips = $("#validateTipsGmap");
	if(lonbox == "" || latbox == "")
		{
		alert ("Please enter valid address and click the Go Button to fetch the Latitude and Longitude");		
		$('#address').focus();
		}
	else
		{
		
		var conf = confirm("Are you sure you want to save this location, Please confirm with MAP?");
			if(conf == true){

							$.post(url,{ lonbox:lonbox,latbox:latbox,theme_id:theme_id,chk_action:'add_gmap_search' } ,function(res)
							{ 
							if(res)
								{
								tips.addClass('ui-state-highlight');
								tips.html("Your Location are saved successfully.");
								}
								else
								{
								tips.addClass('ui-state-error');
								tips.html("Sorry, Please try again.");
								}

							});
			
			}
		}

	});
	  });
//<![CDATA[ 
// Latitude and Longitude math routines are from: http://www.fcc.gov/mb/audio/bickel/DDDMMSS-decimal.html 

var map = null; 
var geocoder = null; 
var latsgn = 1; 
var lgsgn = 1; 
var zm = 0;  
var marker = null; 
var posset = 0; 

function xz() { 
if (GBrowserIsCompatible()) { 
map = new GMap2(document.getElementById("map")); 
map.setCenter(new GLatLng(20.0, -10.0), 2); 
map.setMapType(G_NORMAL_MAP); 
map.addControl(new GLargeMapControl()); 
map.addControl(new MapTypeControl()); 
map.addControl(new GScaleControl()); 
map.enableScrollWheelZoom(); 
map.disableDoubleClickZoom(); 
geocoder = new GClientGeocoder(); 

marker = new GMarker(new GLatLng(20.0, -10.0), {draggable: true}); 
map.addOverlay(marker); 

GEvent.addListener(map, 'click', function(overlay,point)  
{ 
if (overlay)  
{ 
}  
else  
{ 
posset = 1; 

fc( point) ; 
//marker.setPoint(point); 
if (zm == 0) 
{map.setCenter(point,7); zm = 1;} 
else 
{map.setCenter(point);} 
computepos(point); 
} 
}); 

GEvent.addListener(map, 'singlerightclick', function(point,src,overlay)  
{ 
if (overlay)  
{ 
if (overlay != marker) 
{ 
map.removeOverlay(overlay) 
document.getElementById("latbox").value=''; 
document.getElementById("lonbox").value='';  
}  
} 
  
}); 

GEvent.addListener(marker, "dragend", function() { 
var point = marker.getLatLng(); 
posset = 1; 

if (zm == 0) 
{map.setCenter(point,7); zm = 1;} 
else 
{map.setCenter(point);} 
computepos(point); 
}); 


GEvent.addListener(marker, "click", function() { 
var point = marker.getLatLng(); 
marker.openInfoWindowHtml(marker.getLatLng().toUrlValue(6)); 
computepos (point); 
}); 

}} 

function computepos (point) 
{
document.getElementById("latbox").value=point.y; 
document.getElementById("lonbox").value=point.x;  
} 

function showAddress(address) { 
 if (geocoder) { 
 geocoder.getLatLng( 
 address, 
 function(point) { 
 if (!point) { 
 alert(address + " not found"); 
 } else { 
  
 posset = 1; 

 map.setMapType(G_HYBRID_MAP); 
 map.setCenter(point,16); 
 zm = 1; 
 marker.setPoint(point); 
 GEvent.trigger(marker, "click"); 
 } 
 } 
 ); 
 } 
} 

function fc( point ) 
{ 
 var html = ""; 
 html += html + "Latitude, Longitude<br>" + point.toUrlValue(6); 

 var baseIcon = new GIcon(); 
 baseIcon.iconSize=new GSize(32,32); 
 baseIcon.shadowSize=new GSize(56,32); 
 baseIcon.iconAnchor=new GPoint(16,32); 
 baseIcon.infoWindowAnchor=new GPoint(16,0); 
 var thisicon = new GIcon(baseIcon, "images/blue-dot.png", null, "images/msmarker.shadow.png"); 

 var marker = new GMarker(point,thisicon); 
 GEvent.addListener(marker, "click", function() {marker.openInfoWindowHtml(html);}); 
 map.addOverlay(marker); 
} 


function reset() { 
map.clearOverlays(); 
document.getElementById("latbox").value='';  
document.getElementById("lonbox").value='';  
document.getElementById("address").value='';  
marker = new GMarker(new GLatLng(20.0, -10.0), {draggable: true}); 
map.addOverlay(marker); 
marker.setPoint(map.getCenter()); 

GEvent.addListener(marker, "dragend", function() { 
var point = marker.getLatLng(); 
posset = 0; 

if (zm == 0) 
{map.setCenter(point,7); zm = 1;} 
else 
{map.setCenter(point);} 
computepos(point); 
}); 

GEvent.addListener(marker, "click", function() { 
var point = marker.getLatLng(); 
marker.openInfoWindowHtml(marker.getLatLng().toUrlValue(6)); 
computepos (point); 
}); 
} 


//]]> 
