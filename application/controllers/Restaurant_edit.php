<?php

class Restaurant_edit extends CI_Controller {

    public function subcat() 
    {
        $wh['category_id'] = $this->uri->segment(2);
        $data["subcat_edit_detail"] = $this->md->my_select("tbl_category", "*", $wh);
        $data["subcat_detail"] = $this->md->my_query("select mc.name as maincat,sc.category_id,sc.name from tbl_category as mc ,tbl_category as sc where sc.parent_id = mc.category_id;");        
        if ($this->input->post("update")) 
        {
            $this->form_validation->set_rules("maincat","","required",array('required'=>"<i class='fas fa-exclamation-circle'></i> Please Select Atleast One Main Category."));
            $this->form_validation->set_rules("subcat","","required|regex_match[/^[A-Za-z -]+$/]",array('required'=>"<i class='fas fa-exclamation-circle' ></i> Please Enter Sub Category.","regex_match"=>"<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i> Please Enter valid Sub Category."));
            if($this->form_validation->run() == TRUE)
            {
                $name = strtoupper(substr($this->input->post("subcat"),0,1)). strtolower(substr($this->input->post("subcat"),1));
                $where["name"] = $name;
                $where["parent_id"] = $this->input->post("maincat");
                $recordset = $this->md->my_select("tbl_category","*",$where);
                $count = count($recordset);
                if($count != 0)
                {
                    $recordset= $this->md->my_select("tbl_category","*",array("category_id"=>$this->input->post("maincat")));
                    $data["error"] = $name." Is Already Exist In ".$recordset[0]->name;
                }
                else
                {
                    $ins['name'] = $name;
                    $ins['parent_id'] = $this->input->post("maincat");
                    $result = $this->md->my_update("tbl_category", $ins, $wh);
                    if ($result == 1) 
                    {
                        redirect("Restaurant-Sub-Category");
                    }
                    else 
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $this->load->view("seller/subcategory", $data);
    }
    public function edit_item() {
        $data = array();
        $wh["item_id"] = $this->uri->segment(2);
        $data["item_edit_detail"] = $this->md->my_select("tbl_item", "*", $wh);
        $data["maincat"] = $this->md->my_select("tbl_category", "*",array("label"=>"maincat"));
        if ($this->input->post("edit")) {
            $this->form_validation->set_rules("maincat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Select Atleast One Main Category."));
            //$this->form_validation->set_rules("subcat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Select Atleast One Sub Category."));
            $this->form_validation->set_rules("item_name", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Name."));
            $this->form_validation->set_rules("price", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Price."));
            $this->form_validation->set_rules("description", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Description."));
            $this->form_validation->set_rules("tags", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter tags."));
            if ($this->form_validation->run() == true) {
                if($_FILES["pimage"]["name"] == "")
                {
                    $ins['category_id'] = $this->input->post('subcat');
                   
                    $ins['item_name'] = $this->input->post('item_name');
                    $ins['description'] = $this->input->post('description');
                   
                    $ins['measurement'] = $this->input->post('measurement');
                    $ins['price'] = $this->input->post('price');
                    $ins['tags'] = $this->input->post('tags');
                    $ins['restaurant_id'] = $this->session->userdata("seller_email");

                    $result = $this->md->my_update('tbl_item', $ins, $wh);

                    if ($result == 1) {
                        redirect("Restaurant-Manage-Items");
                    } else {
                        $data['errror'] = "Something is wrong";
                    }
                }
                else
                {
                    $filename = $this->md->my_select("tbl_item", "*", $wh)[0]->image;
                $config["file_name"] = substr($filename, 29);
                $config['upload_path'] = './seller_assets/images/item/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 1024 * 4;
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('pimage')) {
                    $ins['image'] = "seller_assets/images/item/" . $this->upload->data('file_name');
                    $ins['category_id'] = $this->input->post('subcat');
                    
                    $ins['item_name'] = $this->input->post('item_name');
                    $ins['description'] = $this->input->post('description');
                   
                    $ins['measurement'] = $this->input->post('measurement');
                    $ins['price'] = $this->input->post('price');
                    $ins['tags'] = $this->input->post('tags');
                    $ins['restaurant_id'] = $this->session->userdata("seller_email");

                    $result = $this->md->my_update('tbl_item', $ins, $wh);

                    if ($result == 1) {
                        redirect("Restaurant-Manage-Items");
                    } else {
                        $data['errror'] = $this->upload->display_errors();
                    }
                }
                }
            }
        }
        $this->load->view("seller/additems", $data);
    }

    public function editaccount() {
        $data = array();
        $wh["restaurant_id"] = $this->session->userdata("seller_email");
        $data["edit_profile"] = $this->md->my_select("tbl_restaurant", "*", $wh);

        $data["seller_account_info"] = $this->md->my_select("tbl_restaurant", "*", $wh);
        $package_id = $this->md->my_select("tbl_restaurant", "*", array("restaurant_id" => $this->session->userdata("seller_email")))[0]->package_id;
        $data["package_detail"] = $this->md->my_select("tbl_package", "*", array("package_id" => $package_id));
        if ($this->input->post("updateaccount")) {
            $this->form_validation->set_rules("resname", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Restaurant Name."));
            $this->form_validation->set_rules("email", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Email."));
            $this->form_validation->set_rules("contactno", "", "required|min_length[10]", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Contact Number.", 'min_length' => "<i class='fas fa-exclamation-circle'></i> Please Enter Valid Contact Number(Minimum Char 10)."));
            if ($this->form_validation->run() == true) {
                $ins['restaurant_name'] = $this->input->post('resname');
                $ins['email'] = $this->input->post('email');
                $ins['contact_no'] = $this->input->post('contactno');

                $result = $this->md->my_update('tbl_restaurant', $ins, $wh);

                if ($result == 1) {
                    redirect("Restaurant-Edit-Profile");
                } else {
                    $data['errror'] = $this->upload->display_errors();
                }
            }
        }
        $this->load->view("seller/editprofile", $data);
    }

    public function editbankdetails() {
        $data = array();
        $wh["restaurant_id"] = $this->session->userdata("seller_email");
        $data["edit_profile"] = $this->md->my_select("tbl_restaurant", "*", $wh);

        $data["seller_bank_info"] = $this->md->my_select("tbl_restaurant", "*", $wh);
        $package_id = $this->md->my_select("tbl_restaurant", "*", array("restaurant_id" => $this->session->userdata("seller_email")))[0]->package_id;
        $data["package_detail"] = $this->md->my_select("tbl_package", "*", array("package_id" => $package_id));
        if ($this->input->post("updatebankdetails")) {
            $this->form_validation->set_rules("bankname", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Bank Name."));
            $this->form_validation->set_rules("branchname", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Branch Name."));
            $this->form_validation->set_rules("acno", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Account Number."));
            $this->form_validation->set_rules("IFSCcode", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter IFSC Code."));
            $this->form_validation->set_rules("bankbenificiary", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Bank Benificiary Name."));
            $this->form_validation->set_rules("panno", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Pan Card Number."));
            $this->form_validation->set_rules("tinvatno", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Tin Vat Number."));

            if ($this->form_validation->run() == true) {
                $ins['bank_name'] = $this->input->post('bankname');
                $ins['branch_name'] = $this->input->post('branchname');
                $ins['ac_no'] = $this->input->post('acno');
                $ins['IFSC_code'] = $this->input->post('IFSCcode');
                $ins['bank_benificiary_name'] = $this->input->post('bankbenificiary');
                $ins['pan_no'] = $this->input->post('panno');
                $ins['tin_vat_no'] = $this->input->post('tinvatno');

                $result = $this->md->my_update('tbl_restaurant', $ins, $wh);

                if ($result == 1) {
                    redirect("Restaurant-Edit-Profile");
                } else {
                    $data['errror'] = $this->upload->display_errors();
                }
            }
        }
        $this->load->view("seller/editprofile", $data);
    }

    public function editlocationinfo() {
        $data = array();
        $wh["restaurant_id"] = $this->session->userdata("seller_email");
        $data["edit_profile"] = $this->md->my_select("tbl_restaurant", "*", $wh);
        $query = "select ar.name as area,ct.name as city,st.name as state from tbl_location as ar,tbl_location as ct,tbl_location as st,tbl_restaurant as se where se.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and se.restaurant_id = " . $this->session->userdata("seller_email");
        $data["location_detail"] = $this->md->my_query($query);
        $data["state_detail"]=$this->md->my_select("tbl_location","*",array("label"=>"state"));
        $data["city_detail"]=$this->md->my_select("tbl_location","*",array("label"=>"city"));
        $data["area_detail"]=$this->md->my_select("tbl_location","*",array("label"=>"area"));
        $data["seller_location_info"] = $this->md->my_select("tbl_restaurant", "*", $wh);
        $package_id = $this->md->my_select("tbl_restaurant", "*", array("restaurant_id" => $this->session->userdata("seller_email")))[0]->package_id;
        $data["package_detail"] = $this->md->my_select("tbl_package", "*", array("package_id" => $package_id));
        if ($this->input->post("updatelocation")) {
            $this->form_validation->set_rules("state", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Bank Name."));
            $this->form_validation->set_rules("city", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Branch Name."));
            $this->form_validation->set_rules("area", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Account Number."));
           
            if ($this->form_validation->run() == true) {
                    $ins['location_id'] = $this->input->post('area');
                    $ins['localmap'] = $this->input->post('localmap');
                   
                    
                    $result = $this->md->my_update('tbl_restaurant', $ins, $wh);

                    if ($result == 1) {
                        redirect("Restaurant-Edit-Profile");
                    } else {
                        $data['errror'] = $this->upload->display_errors();
                    }
            }
        }
        $this->load->view("seller/editprofile", $data);
    }

}
