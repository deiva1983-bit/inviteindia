{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
{/literal}
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
 <!-- content -->
   <div id="content" >
      <div class="container" style="width:650px;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto;">
	<tr>
		<td class="normal" height="321px;" width="650px;">
			<div class="normal">
			<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" >
		        <fieldset style="width:650px;">
				<input type="hidden" name="glb_theme_id" id="glb_theme_id" value={$glb_theme_id} />
				{if $show_succ eq 'yes'} <succ id="succval" class="succval"><b>Your Description Message has been successfully updated.</b></succ> {/if}
				{if $show_err eq 'yes'}<h2 style="font-size:1.2em;"><font color="red">{$err_msg}</font></h2>{/if}
				<div id="create_own_box1" >
				<div class="field">
					<h3 style="padding: 0px;">Create your own Description:<h3>
					<input type="text" id="txt_grooms_name" name="txt_grooms_name" class="inputval"  style="visibility: hidden;"/>
					<textarea id="txt_add_own_desc_msg" name="txt_add_own_desc_msg" rows="15" cols="90">{$txt_add_own_desc_msg}</textarea>
					
					
				</div>
				<div><span><em><font color="red">Note: We will replace your name with help of "<font color="blue"><b>%replace_names%</b></font>".</font></em></span></div>
				
				<div class="field">
				<input type="submit" name="add_own_head_des" id="add_own_head_des" value="Add My Description" class="button1"/> <button id="butt_close_desc_msg" class="button1">Close</button>
				</div> 
                        </fieldset>
                        </form>
			</div>
		</td>
	</tr>
	</table>
      </div></div>