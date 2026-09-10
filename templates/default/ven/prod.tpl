<!-- contact -->
<div class="contact" id="vendors_serv">
    <div class="container">
    {$tpl_err}
        <h3 class="w3layouts_head">Vendor Service<span> Management</span></h3>
        <div class="w3ls_banner_bottom_grids">
        {$top_nav}
                <form id="vendors_login" name="vendors_login" class="form_cls" method="post" action="products.php?do=man" enctype="multipart/form-data">
                    <div>
                        <div class="col-md-12 agileits_services_grid"><h3 class="sub_head">Service Details</h3></div>
                        <div class="col-md-6 agileits_services_grid">
                            <div id="validateTipsVenLogin" class="validateTipsVenLogin"></div>
                            <input type="hidden" name="sub_prod_hidd" id="sub_prod_hidd" value="addp" class="inputval"/>
                            <div>
                            <label>Service Name: <span class="required">*<span></label>
                            <input type="text" name="ven_serv_name" id="ven_serv_name" value="" autocomplete="off" tabindex="1"/>
                            </div>

                            <div>
                            <label>Service Category: <span class="required">*<span></label>
                            <select id='pdt_services_drop' name='pdt_services_drop' tabindex="3">
                            {$tpl_sele_pdt}
                            </select>
                            </div>

                            <div>
                            <label>Service Logo:</label>
                            <input type="file" name="uploaded_service_logo" id="uploaded_service_logo" tabindex="4"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                            <label>Service Description: <span class="required">*<span></label>
                            <textarea name="ven_serv_desc" id="ven_serv_desc" tabindex="2"></textarea>
                            </div>
                        </div>

                                <div class="col-md-12 agileits_services_grid"><h3 class="sub_head">Personal/Contact Details</h3></div>
                                <div class="col-md-6 agileits_services_grid">
                                    <label>Contact Name: <span class="required">*<span></label>
                                    <input type="text" name="ven_cont_name" id="ven_cont_name" value="" autocomplete="off" tabindex="5"/>
                                    </div>
                                <div class="col-md-6 agileits_services_grid">
                                    <label>Mobile Number:<span class="required">*<span></label>
                                    <input type="text" name="ven_mno" id="ven_mno" value="" tabindex='6'/>
                                </div>
                                <div class="col-md-6 agileits_services_grid">
                                    <label>Phone Number:</label>
                                    <input type="text" name="ven_pno" id="ven_pno" value="" tabindex='7'/>
                                    <label>FAX:</label>
                                    <input type="text" name="ven_fax" id="ven_fax" value="" tabindex='9'/>
                                </div>
                                <div class="col-md-6 agileits_services_grid">

                                </div>
                                <div class="col-md-6 agileits_services_grid">
                                <label>Email:</label>
                                <input type="text" name="ven_email" id="ven_email" value="" tabindex='8'/>
                                </div>
                                <div class="col-md-6 agileits_services_grid">
                                <label>Website:</label>
                                <input type="text" name="ven_website" id="ven_website" value="" tabindex='10'/>
                                </div>

                                <div class="col-md-12 agileits_services_grid"><h3 class="sub_head">Address details:</h3></div>

                                <div class="col-md-6 agileits_services_grid">
                                    <div>
                                    <label>Country: <span class="required">*<span></label>
                                    <input type="text" name="ven_contry_name" id="ven_contry_name" value="INDIA" class="inputval" readonly='readonly' />
                                    </div>

                                    <div>
                                    <label>State: <span class="required">*<span></label>
                                    <select id='states_drop' name='states_drop' tabindex="11">
                                    {$tpl_sele_status}
                                    </select>
                                    </div>

                                    <div>
                                    <label>City: <span class="required">*<span></label>
                                    <span id='citylists'><select id='city_drop' name='city_drop' tabindex='12' ><option value="0">Select City</option></select></span>
                                    </div>

                                    <div class="hide-control" id='arealists'>
                                    <label>Area: </label>
                                    </div>
                                </div>

                                <div class="col-md-6 agileits_services_grid">




                                                <div>
                                                <label>Address - 1: <span class="required">*<span></label>
                                                <input type="text" name="ven_addr_1" id="ven_addr_1" value=""  tabindex='14'/>
                                                </div>
                                                
                                                <div>
                                                <label>Address - 2: <span class="required">*<span></label>
                                                <input type="text" name="ven_addr_2" id="ven_addr_2" value=""  tabindex='15'/>
                                                </div>

                                                <div>
                                                <label>Pin Code: <span class="required">*<span></label>
                                                <input type="text" name="ven_pincode" id="ven_pincode" value="" tabindex='16'/>
                                                </div>
                                                <div>
                                                <label>Landmark:</label>
                                                <input type="text" name="ven_landmark" id="ven_landmark" value="" tabindex='17'/>
                                                </div>






                                </div>
                                <div class="col-md-12 agileits_services_grid">
                                <button id="supp_reg" class="button">Submit</button>&nbsp;&nbsp;<button  id="butt_supp_clear" type="reset" class="button">Clear</button>
                                </div>

                                <div class="clearfix"> </div>
                                        </form>
                                </div>


                                
                        </div>
                <div class='manage-space'></div>
        </div>
</div>