<?php    

class Edit extends CI_Controller {
    
    public function maincat() {
        $wh['category_id'] = $this->uri->segment(2);
        $data["maincat_edit_detail"] = $this->md->my_select("tbl_category", "*", $wh);
        $data["maincat_detail"] = $this->md->my_select("tbl_category", "*", array("label" => "maincat"));
        if ($this->input->post("update")) {
            $this->form_validation->set_rules("maincat", "", "required|regex_match[/^[A-Za-z -]+$/]", array('required' => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter Main Category.", "regex_match" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter valid Main Category."));
            if ($this->form_validation->run() == TRUE) {
                $name = strtoupper(substr($this->input->post("maincat"), 0, 1)) . strtolower(substr($this->input->post("maincat"), 1));
                $where["name"] = $name;
                $where["label"] = "maincat";
                $count = count($this->md->my_select("tbl_category", "*", $where));
                if ($count != 0) {
                    $data["error"] = "Main Category Is Already Exist";
                } else {
                    $ins['name'] = $name;
                    $result = $this->md->my_update("tbl_category", $ins, $wh);
                    if ($result == 1) {
                        redirect("Admin-Main-Category");
                    } else {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $this->load->view("admin/maincategory", $data);
    }
    

    public function state() 
    {
        $wh['location_id'] = $this->uri->segment(2);
        $data["state_edit_detail"] = $this->md->my_select("tbl_location", "*", $wh);
        $data["state_detail"] = $this->md->my_select("tbl_location", "*", array("label" => "state"));
        if ($this->input->post("update")) 
        {
            $this->form_validation->set_rules("state", "", "required|regex_match[/^[A-Za-z ]+$/]", array('required' => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter State", "regex_match" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter valid State Name"));
            if ($this->form_validation->run() == TRUE) 
            {
                $name = strtoupper(substr($this->input->post("state"), 0, 1)) . strtolower(substr($this->input->post("state"), 1));
                $where["name"] = $name;
                $where["label"] = "state";
                $count = count($this->md->my_select("tbl_location", "*", $where));
                if ($count != 0) 
                {
                    $data["error"] = "State Is Already Exist";
                } else {
                    $ins['name'] = $name;
                    $result = $this->md->my_update("tbl_location", $ins, $wh);
                    if ($result == 1) 
                    {
                        redirect("Admin-Manage-State");
                    } else {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $this->load->view("admin/managestate", $data);
    }
    public function city() 
    {
        $wh['location_id'] = $this->uri->segment(2);
        $data["city_edit_detail"] = $this->md->my_select("tbl_location", "*", $wh);
        $data["city_detail"] = $this->md->my_query("select st.name as state,ct.location_id,ct.name from tbl_location as st ,tbl_location as ct where ct.parent_id = st.location_id;");
        if ($this->input->post("update")) 
        {
            $this->form_validation->set_rules("state","","required",array('required'=>"<i class='fas fa-exclamation-circle'></i>Please Select Atleast One State"));
            $this->form_validation->set_rules("city","","required|regex_match[/^[A-Za-z ]+$/]",array('required'=>"<i class='fas fa-exclamation-circle' ></i>Please Enter City","regex_match"=>"<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter valid State Name"));
            if($this->form_validation->run() == TRUE)
            {
                $name = strtoupper(substr($this->input->post("city"),0,1)). strtolower(substr($this->input->post("city"),1));
                $where["name"] = $name;
                $where["parent_id"] = $this->input->post("state");
                $recordset = $this->md->my_select("tbl_location","*",$where);
                $count = count($recordset);
                if($count != 0)
                {
                    $recordset= $this->md->my_select("tbl_location","*",array("location_id"=>$this->input->post("state")));
                    $data["error"] = $name." Is Already Exist In ".$recordset[0]->name;
                }
                else
                {
                    $ins['name'] = $name;
                    $ins['parent_id'] = $this->input->post("state");
                    $result = $this->md->my_update("tbl_location", $ins, $wh);
                    if ($result == 1) 
                    {
                        redirect("Admin-Manage-City");
                    }
                    else 
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $this->load->view("admin/managecity", $data);
    }
    public function area()
    {
        $wh['location_id'] = $this->uri->segment(2);
        $data["area_edit_detail"] = $this->md->my_select("tbl_location", "*", $wh);
        if($this->input->post("edit"))
        {
            $this->form_validation->set_rules("state","","required",array('required'=>"<i class='fas fa-exclamation-circle'></i>Please Select Atleast One State"));
            $this->form_validation->set_rules("city","","required",array('required'=>"<i class='fas fa-exclamation-circle' ></i>Please Select Atleast one City"));
            $this->form_validation->set_rules("area","","required|regex_match[/^[A-Za-z ]+$/]",array('required'=>"<i class='fas fa-exclamation-circle' ></i>Please Enter City","regex_match"=>"<i class='fas fa-exclamation-circle'></i>Please Enter valid Area Name"));
            if($this->form_validation->run() == TRUE)
            {
                $name = strtoupper(substr($this->input->post("area"),0,1)). strtolower(substr($this->input->post("area"),1));
                $where["name"] = $name;
                $where["parent_id"] = $this->input->post("city");
                $recordset = $this->md->my_select("tbl_location","*",$where);
                $count = count($recordset);
                if($count != 0)
                {
                    $recordset= $this->md->my_select("tbl_location","*",array("location_id"=>$this->input->post("city")));
                    $data["error"] = $name." Is Already Exist In ".$recordset[0]->name;
                }
                else
                {
                    $ins['name'] = $name;
                    $ins['parent_id'] = $this->input->post("city");
                    $result = $this->md->my_update("tbl_location", $ins, $wh);
                    if ($result == 1) 
                    {
                        redirect("Admin-Manage-Area");
                    }
                    else 
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $data["area_detail"] = $this->md->my_query("select st.name as state, ct.name as city , ar.location_id,ar.name from tbl_location as st , tbl_location as ct ,tbl_location as ar where ar.parent_id = ct.location_id AND ct.parent_id = st.location_id AND ar.label='area';");
        $data["state"] = $this->md->my_select("tbl_location", "*", array("label" => "state"));
        $this->load->view("admin/managearea", $data);
    }
    public function packages() 
    {
        $wh['package_id'] = $this->uri->segment(2);
        $data["package_edit_detail"] = $this->md->my_select("tbl_package", "*", $wh);
        $data["package_detail"] = $this->md->my_select("tbl_package", "*");
        if ($this->input->post("update")) 
        {
            $this->form_validation->set_rules("name", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Name."));   
            $this->form_validation->set_rules("duration", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Duration."));   
            $this->form_validation->set_rules("price", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Price."));   
            $this->form_validation->set_rules("description", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Description."));
           
            if ($this->form_validation->run() == TRUE) 
            {
                    $ins['name'] = $this->input->post("name");
                    $ins['duration'] = $this->input->post("duration");
                    $ins['price'] = $this->input->post("price");
                    $ins['description'] = $this->input->post("description");
                    $result = $this->md->my_update("tbl_package", $ins, $wh);
                    if ($result == 1) 
                    {
                        redirect("Admin-Manage-Packages");
                    } else {
                        $data["error"] = "Somethis Is Wrong";
                    }
            }
        }
        $this->load->view("admin/managepackages", $data);
    }
    public function promocode() 
    {
        $wh['promocode_id'] = $this->uri->segment(2);
        $data["promocode_edit_detail"] = $this->md->my_select("tbl_promocode", "*", $wh);
        $data["promocode_detail"] = $this->md->my_select("tbl_promocode", "*");
        if ($this->input->post("update")) 
        {
            $this->form_validation->set_rules("codename", "", "required|regex_match[/^[A-Za-z0-9]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Name.",'regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Alpha And Number Allow."));   
            $this->form_validation->set_rules("amount", "", "required|regex_match[/^[0-9]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Promocode Amount.",'regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Number Allow."));   
            $this->form_validation->set_rules("minprice", "", "regex_match[/^[0-9]+$/]", array('regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Number Allow."));   
            $this->form_validation->set_rules("percentage", "", "required|regex_match[/^[0-9]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Persantage.",'regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Number Allow."));   
            $this->form_validation->set_rules("description", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Promocode Description."));
            if ($this->form_validation->run() == TRUE) 
            {
                    $detail= $this->md->my_select("tbl_promocode","*",$wh);
                    $id = substr($detail[0]->promo_icon_img,30);
                   
                    
                        $config['file_name']=$id;
                    

                    $config['upload_path']='./admin_assets/images/promocode/';
                    $config['allowed_types']='png';
                    $config['max_size']=1024 * 4;
                    $config['overwrite'] = true;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('promo_icon'))
                    {    
                            $ins['promocode_id'] = 0;
                            $ins['code'] = $this->input->post("codename");
                            $ins['amount'] = $this->input->post("amount");
                            if($this->input->post("minprice") == "")
                            {
                                $ins['min_bill_price'] = 0;
                            }
                            else
                            {
                                $ins['min_bill_price'] = $this->input->post("minprice");
                            }
                            $ins['promo_percent'] = $this->input->post("percentage");
                            $ins['description'] = $this->input->post("description");
                            $ins['status'] = 0;
                            $ins['promo_icon_img']="admin_assets/images/promocode/".$this->upload->data('file_name');
                            $result = $this->md->my_update("tbl_promocode", $ins,$wh);
                            if ($result == 1) 
                            {
                                redirect("Admin-Manage-Promocode");
                            }    
                            else 
                            {
                                $data["error"] = "Somethis Is Wrong";
                            }
                            
                    }
                    else 
                    {
                         
                    }
            }
        }
        $this->load->view("admin/managepromocode", $data);
    }
}
