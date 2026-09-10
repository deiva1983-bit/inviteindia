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
	  $(window).load(function() {
	 showAddress ('Chennai, Tamilnadu, India.');
	 });
//<![CDATA[ 
// Latitude and Longitude math routines are from: http://www.fcc.gov/mb/audio/bickel/DDDMMSS-decimal.html 
var map = null;
var latsgn = 1;
var lgsgn = 1;
var marker = null;
var posset = 0;
var ls='';
var lm='';
var ld='';
var lgs='';
var lgm='';
var lgd='';
var mrks = {mvcMarkers: new google.maps.MVCArray()};
var iw;

function xz() {
ll = new google.maps.LatLng(20.0, -10.0);
zoom=2;
var mO = {
scaleControl:true,
zoom:zoom,
zoomControl:true,
zoomControlOptions: {style:google.maps.ZoomControlStyle.LARGE},
center: ll,
disableDoubleClickZoom:true,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
map = new google.maps.Map(document.getElementById("map"), mO);
map.setTilt(0);
map.panTo(ll);
marker = new google.maps.Marker({position:ll,map:map,draggable:true,title:'Marker is Draggable'});   

if(navigator.appName == 'Microsoft Internet Explorer'){}
else
{
google.maps.event.addListener(marker, 'click', function(mll) {
gC(mll.latLng);
var html= "<div style='color:#000; background-color:#fff; padding:3px;'><p>Latitude - Longitude:<br />" + String(mll.latLng.toUrlValue()) + "<br /><br />Lat: " + ls +  "&#176; " + lm +  "&#39; "  + ld + "&#34;<br />Long: " + lgs +  "&#176; " + lgm +  "&#39; " + lgd + "&#34;</p></div>";
iw = new google.maps.InfoWindow({content:html});
iw.open(map,marker);
});
google.maps.event.addListener(marker, 'dragstart', function() {if (iw){iw.close();}});
}

google.maps.event.addListener(marker, 'dragend', function(event) {
posset = 1;
if (map.getZoom() < 10){map.setZoom(10);}
map.setCenter(event.latLng);
computepos(event.latLng);
});

google.maps.event.addListener(map, 'click', function(event) {
posset = 1;
fc(event.latLng) ;
if (map.getZoom() < 10){map.setZoom(10);}
map.panTo(event.latLng);
computepos(event.latLng);
});

}

function computepos (point)
{
var latA = Math.abs(Math.round(point.lat() * 1000000.));
var lonA = Math.abs(Math.round(point.lng() * 1000000.));
if(point.lat() < 0)
{
	var ls = '-' + Math.floor((latA / 1000000)).toString();
}
else
{
	var ls = Math.floor((latA / 1000000)).toString();
}
var lm = Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60).toString();
var ld = ( Math.floor(((((latA/1000000) - Math.floor(latA/1000000)) * 60) - Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60)) * 100000) *60/100000 ).toString();
if(point.lng() < 0)
{
  var lgs = '-' + Math.floor((lonA / 1000000)).toString();
}
else
{
	var lgs = Math.floor((lonA / 1000000)).toString();
}
var lgm = Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60).toString();
var lgd = ( Math.floor(((((lonA/1000000) - Math.floor(lonA/1000000)) * 60) - Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60)) * 100000) *60/100000 ).toString();
document.getElementById("latbox").value=point.lat().toFixed(6);
document.getElementById("lonbox").value=point.lng().toFixed(6);
//document.getElementById("latboxm").value=ls;
//document.getElementById("latboxmd").value=lm;
//document.getElementById("latboxms").value=ld;

//document.getElementById("lonboxm").value=lgs;
//document.getElementById("lonboxmd").value=lgm;
//document.getElementById("lonboxms").value=lgd;
}

function showAddress(address) {
var geocoder = new google.maps.Geocoder();
geocoder.geocode( { 'address': address}, function(results, status) {
 if (status == google.maps.GeocoderStatus.OK) {
  map.setCenter(results[0].geometry.location);
  map.setMapTypeId(google.maps.MapTypeId.HYBRID);
  if (map.getZoom() < 16){map.setZoom(16);}else{}
  marker.setPosition(results[0].geometry.location);
  posset = 1;
  computepos(results[0].geometry.location);
 } else {
  alert("Geocode was not successful for the following reason: " + status);
 }
});
}

function showLatLong(latitude, longitude) {
if (isNaN(latitude)) {alert(' Latitude must be a number. e.g. Use +/- instead of N/S'); return false;}
if (isNaN(longitude)) {alert(' Longitude must be a number.  e.g. Use +/- instead of E/W'); return false;}

latitude1 = Math.abs( Math.round(latitude * 1000000.));
if(latitude1 > (90 * 1000000)) { alert(' Latitude must be between -90 to 90. ');  document.getElementById("latbox1").value=''; return;}
longitude1 = Math.abs( Math.round(longitude * 1000000.));
if(longitude1 > (180 * 1000000)) { alert(' Longitude must be between -180 to 180. ');  document.getElementById("lonbox1").value='';  return;}

var point = new google.maps.LatLng(latitude,longitude);
posset = 1;
if (map.getZoom() < 7){map.setZoom(7);}else{}
map.setMapTypeId(google.maps.MapTypeId.HYBRID);
map.setCenter(point);
fc(point);
computepos(point);
}

function showLatLong1(latitude, latitudem,latitudes, longitude,  longitudem,  longitudes) {
if (isNaN(latitude)) {alert(' Latitude must be a number. e.g. Use +/- instead of N/S'); return false;}
if (isNaN(latitudem)) {alert(' Latitude must be a number. e.g. Use +/- instead of N/S'); return false;}
if (isNaN(latitudes)) {alert(' Latitude must be a number. e.g. Use +/- instead of N/S'); return false;}
if (isNaN(longitude)) {alert(' Longitude must be a number.  e.g. Use +/- instead of E/W'); return false;}
if (isNaN(longitudem)) {alert(' Longitude must be a number.  e.g. Use +/- instead of E/W'); return false;}
if (isNaN(longitudes)) {alert(' Longitude must be a number.  e.g. Use +/- instead of E/W'); return false;}

if(latitude < 0)  { latsgn = -1; }
alat = Math.abs( Math.round(latitude * 1000000.));
if(alat > (90 * 1000000)) { alert(' Degrees Latitude must be between -90 to 90. ');  document.getElementById("latbox1m").value=''; document.getElementById("latbox1md").value=''; document.getElementById("latbox1ms").value=''; return; }
latitudem = Math.abs(Math.round(latitudem * 1000000.)/1000000);  //integer
absmlat = Math.abs(Math.round(latitudem * 1000000.));  //integer
if(absmlat >= (60 * 1000000)) {  alert(' Minutes Latitude must be between 0 to 59. ');  document.getElementById("latbox1md").value=''; document.getElementById("latbox1ms").value=''; return;}
latitudes = Math.abs(Math.round(latitudes * 1000000.)/1000000);
absslat = Math.abs(Math.round(latitudes * 1000000.));
if(absslat > (59.99999999 * 1000000)) {  alert(' Seconds Latitude must be between 0 and 59.99. '); document.getElementById("latbox1ms").value=''; return; }

if(longitude < 0)  { lgsgn = -1; }
alon = Math.abs( Math.round(longitude * 1000000.));
if(alon > (180 * 1000000)) {  alert(' Degrees Longitude must be between -180 to 180. '); document.getElementById("lonbox1m").value=''; document.getElementById("lonbox1md").value=''; document.getElementById("lonbox1ms").value=''; return;}
longitudem = Math.abs(Math.round(longitudem * 1000000.)/1000000);
absmlon = Math.abs(Math.round(longitudem * 1000000));
if(absmlon >= (60 * 1000000))   {  alert(' Minutes Longitude must be between 0 to 59. '); document.getElementById("lonbox1md").value=''; document.getElementById("lonbox1ms").value='';   return;}
longitudes = Math.abs(Math.round(longitudes * 1000000.)/1000000);
absslon = Math.abs(Math.round(longitudes * 1000000.));
if(absslon > (59.99999999 * 1000000)) {  alert(' Seconds Longitude must be between 0 and 59.99. '); document.getElementById("lonbox1ms").value=''; return;}

latitude = Math.round(alat + (absmlat/60.) + (absslat/3600.) ) * latsgn/1000000;
longitude = Math.round(alon + (absmlon/60) + (absslon/3600) ) * lgsgn/1000000;
var point = new google.maps.LatLng(latitude,longitude);
posset = 1;
if (map.getZoom() < 7){map.setZoom(7);}else{}
map.setMapTypeId(google.maps.MapTypeId.HYBRID);
map.setCenter(point);
fc(point);
computepos(point);
}










function fc(point)
{
gC(point);
var html= "<div style='color:#000; background-color:#fff; padding:3px;'><p>Latitude - Longitude:<br />" + String(point.toUrlValue()) + "<br /><br />Lat: " + ls +  "&#176; " + lm +  "&#39; "  + ld + "&#34;<br />Long: " + lgs +  "&#176; " + lgm +  "&#39; " + lgd + "&#34;</p></div>";
var iw = new google.maps.InfoWindow({content:html});
var marker = new google.maps.Marker({position:point,map:map,icon:'/i/blue-dot.png',draggable:true});
mrks.mvcMarkers.push(marker);
google.maps.event.addListener(marker, 'click', function(event) {
gC(event.latLng);
var html= "<div style='color:#000; background-color:#fff; padding:3px;'><p>Latitude - Longitude:<br />" + String(event.latLng.toUrlValue()) + "<br /><br />Lat: " + ls +  "&#176; " + lm +  "&#39; "  + ld + "&#34;<br />Long: " + lgs +  "&#176; " + lgm +  "&#39; " + lgd + "&#34;</p></div>";
var iw = new google.maps.InfoWindow({content:html});
iw.open(map,marker);
computepos(event.latLng);
});
}

function rL()
{
var marker = mrks.mvcMarkers.pop();
if (marker)
{
marker.setMap(null);
document.getElementById("latbox").value='';
document.getElementById("lonbox").value='';

}
}

function gC(ll){
var latA = Math.abs(Math.round(ll.lat() * 1000000.));
var lonA = Math.abs(Math.round(ll.lng() * 1000000.));
if(ll.lat() < 0)
{
	var tls = '-' + Math.floor((latA / 1000000)).toString();
}
else
{
	var tls = Math.floor((latA / 1000000)).toString();
}
var tlm = Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60).toString();
var tld = ( Math.floor(((((latA/1000000) - Math.floor(latA/1000000)) * 60) - Math.floor(((latA/1000000) - Math.floor(latA/1000000)) * 60)) * 100000) *60/100000 ).toString();
ls = tls.toString();
lm = tlm.toString();
ld = tld.toString();

if(ll.lng() < 0)
{
  var tlgs = '-' + Math.floor((lonA / 1000000)).toString();
}
else
{
	var tlgs = Math.floor((lonA / 1000000)).toString();
}
var tlgm = Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60).toString();
var tlgd = ( Math.floor(((((lonA/1000000) - Math.floor(lonA/1000000)) * 60) - Math.floor(((lonA/1000000) - Math.floor(lonA/1000000)) * 60)) * 100000) *60/100000 ).toString();
lgs = tlgs.toString();
lgm = tlgm.toString();
lgd = tlgd.toString();
}

function reset() {
mrks.mvcMarkers.forEach(function(elem, index) {elem.setMap(null);});
mrks.mvcMarkers.clear();
document.getElementById("latbox").value='';
document.getElementById("lonbox").value='';
marker.setPosition(map.getCenter());
}

function reset1() {
marker.setPosition(map.getCenter());
computepos (map.getCenter());
}

//]]> 
