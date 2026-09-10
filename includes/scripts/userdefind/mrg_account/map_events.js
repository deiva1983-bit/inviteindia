
var scripts = document.getElementsByTagName("script");
var myScript = scripts[scripts.length - 1];
var queryString = myScript
    .src
    .replace(/^[^\?]+\??/, "");
queryString = Base64.decode(queryString);
var params = parseQuery(queryString);
var paramlatwed = params.lattwed;
var paramlngwed = params.lngwed;
var paramlatrec = params.lattrec;
var paramlngrec = params.lngrec;
var paramwedmapsts = params.wedmapsts;
var paramresmapsts = params.resmapsts;
 paramwedmapsts =  ((paramlatwed != '0') ? paramwedmapsts : 0);
 paramresmapsts =  ((paramlngwed != '0') ? paramresmapsts : 0);
// paramlatrec =  (paramlatrec) ? paramlatrec : "12.8278661");
// paramlngrec =  (paramlngrec) ? paramlngrec : "79.72316120000005");
/* map_reception = new google.maps.Map(
        document.getElementById('map_rec'), {
          center: new google.maps.LatLng(paramlatrec,paramlngrec),
          zoom: 4,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      }); 
*/
