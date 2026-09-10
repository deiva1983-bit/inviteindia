$(document).ready(function(){ 

		//var availableTags = '';
		var availableTags = new Array();
		var glb_url = $('#glb_site_url').val();
		url=glb_url+"/ajaxfiles/userajax.php";
		$.post(url,{chk_action:'selectfriends_emails' } ,function(res)
        { 
			if(res!=0)
			{
			 var myarray = res.split(","); 			
			for (var i=0;i<myarray.length;i++)
			{ 
				availableTags.push(myarray[i]);
			}
		function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) {
            return split( term ).pop();
        }
 
        $( "#tags" )
            // don't navigate away from the field on tab when selecting an item
            .bind( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).data( "autocomplete" ).menu.active ) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                minLength: 0,
                source: function( request, response ) {
                    // delegate back to autocomplete, but extract the last term
                    response( $.ui.autocomplete.filter(
                        availableTags, extractLast( request.term ) ) );
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    var terms = split( this.value );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( ", " );
                    return false;
                }
            });
		}
		});

	});
				
	 $(function() {
		$("button, input:submit, a", ".demo").button();		
		$("a", ".demo").click(function() { return false; });
	 }); 