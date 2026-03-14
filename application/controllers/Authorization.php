<?php
class Authorization extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }
    public function security()
    {
        if (!$this->session->userdata("admin_username"))
        {
            redirect("Admin-Authentication");
        }
    }
    public function index() 
    {
        $data = array();
        if ($this->) 
        {
            $this->form_validation->set_rules("username", "", "required", array('required' => "Please Enter Email."));
            $this->form_validation->set_rules("ps", "", "required", array('required' => "Please Enter Password."));
            if ($this->input->post("username") != "") 
            {
                if ($this->input->post("ps") != "") 
                {
                    $username = $this->input->post("username");
                    $detail = $this->md->my_select("tbl_admin", "*", array("username" => $username));
                    $count = count($detail);
                    if ($count == 1) 
                    {
                        $ps = $this->input->post("ps");
                        $nps = 123456;
                        if ($ps == $nps) 
                        {
                            $this->session->set_userdata("admin_username", $detail[0]->admin_id);
                            $this->session->set_userdata("admin_logintime", date("Y-m-d H:i:s"));
                            redirect("Admin-Home");
                            if($this->input->post("svp"))
                            {
                                $exp = 60 * 60 * 24 * 3;
                                set_cookie("admin_username",$this->input->post("username"),$exp);
                                set_cookie("admin_password",$this->input->post("ps"),$exp);
                            }
                            else
                            {
                                set_cookie("admin_username","",-10);
                                set_cookie("admin_password","",-10);
                            }
                            redirect("Admin-Home");
                        }
                        else 
                        {
                            $data["error"] = "Invalid Username Or Password";
                        }
                    } 
                    else 
                    {
                        $data["error"] = "Invalid Username Or Password";
                    }
                } 
                else 
                {
                    $data["error"] = "Invalid Username Or Password";
                }
            } 
            else 
            {
                $data["error"] = "Invalid Username Or Password";
            }
        }
        $this->load->view("admin/index", $data);
    }
    public function logout() 
    {
        $wh["admin_id"] = $this->session->userdata("admin_username");
        $ins["lastlogin"] = $this->session->userdata("admin_logintime");
        $this->md->my_update("tbl_admin", $ins, $wh);
        $this->session->unset_userdata("admin_username");
        $this->session->unset_userdata("admin_logintime");
        redirect("Admin-Authentication");
    }
    public function home() 
    {
        $this->security();
        $this->load->view("admin/dashboard");
    }
    public function maincategory() 
    {
        $this->security();
        $data = array();
        if ($this->input->post("add")) 
        {
            $this->form_validation->set_rules("maincat", "", "required|regex_match[/^[A-Za-z -]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Main Category.", "regex_match" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter valid Main Category"));
            if ($this->form_validation->run() == TRUE) 
            {
                $name = strtoupper(substr($this->input->post("maincat"), 0, 1)) . strtolower(substr($this->input->post("maincat"), 1));
                $wh["name"] = $name;
                $wh["label"] = "maincat";
                $count = count($this->md->my_select("tbl_category", "*", $wh));
                if ($count != 0) 
                {
                    $data["error"] = $name." Is Already Exist";
                } 
                else 
                {
                    $ins['category_id'] = 0;
                    $ins['name'] = $name;
                    $ins['parent_id'] = 0;
                    $ins['label'] = "maincat";
                    
                    if($_FILES['image']['name'] != "")
                        {
                            $config['upload_path'] = './uploads/category/';
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            $config['file_name'] = time();

                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);

                            if($this->upload->do_upload('image'))
                            {
                                $file = $this->upload->data();
                                $ins['image'] = $file['file_name'];
                            }
                        }

                    $result = $this->md->my_insert("tbl_category", $ins);
                    if ($result == 1) 
                    {
                        $data["success"] = $name." Added Successfully";
                    } 
                    else 
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $data["maincat_detail"] = $this->md->my_select("tbl_category", "*", array("label" => "maincat"));
        $this->load->view("admin/maincategory",$data);   
    }
    public function managecontact() 
    {
        $this->security();
        $data = array();
        $data["contact"] = $this->md->my_select("tbl_contactus","*");
        $this->load->view("admin/managecontact",$data);
    }
    public function managefeedback() 
    {
        $this->security();
        $data = array();
        $data["feedback"] = $this->md->my_select("tbl_feedback","*");
        $this->load->view("admin/managefeedback",$data);
    }
    public function manageemail() 
    {
        $this->security();
        $data=array();
        if($this->input->post("add"))
        {
           if($this->input->post("receiver"))
           {
               if($this->input->post("subject") != "" )
               {
                   if($this->input->post("msg") != "" )
                   {
                       $subject=$this->input->post("subject");
                       $msg=$this->input->post("msg");
                       $receiver=$this->input->post("receiver");
                       $mail=$this->md->sendMail($subject, $msg, $receiver );
                       if($mail==1)
                       {
                           $data['success']="Email Sent Successfully.";
                       }
                       else
                       {
                           $data['error']="Something is Wrong.";
                       }
                   }
                   else
                   {
                       $data["error"]="Please Enter Message.";
                   }
               }
               else
               {
                   $data["error"]="Please Enter Subject.";
               }
           }
           else
           {
               $data["error"]="Select Atleast One Email Subscriber";
           }
        }
        $this->load->view("admin/manageemail",$data);
    }
    public function manageuser() 
    {
        $this->security();
        $this->load->view("admin/manageuser");
    }
    public function managestate() 
    {
        $this->security();
        $data = array();
        if ($this->input->post("add")) 
        {
            $this->form_validation->set_rules("state", "", "required|regex_match[/^[A-Za-z ]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter State", "regex_match" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter valid State Name"));
            if ($this->form_validation->run() == TRUE) 
            {
                $name = strtoupper(substr($this->input->post("state"), 0, 1)) . strtolower(substr($this->input->post("state"), 1));
                $wh["name"] = $name;
                $wh["label"] = "state";
                $count = count($this->md->my_select("tbl_location", "*", $wh));
                if ($count != 0) 
                {
                    $data["error"] = $name . " Is Already Exist";
                } 
                else 
                {
                    $ins['location_id'] = 0;
                    $ins['name'] = $name;
                    $ins['parent_id'] = 0;
                    $ins['label'] = "state";
                    $result = $this->md->my_insert("tbl_location", $ins);
                    if ($result == 1) 
                    {
                        $data["success"] = $name . " Added Successfully";
                    } 
                    else 
                    {

                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $data["state_detail"] = $this->md->my_select("tbl_location", "*", array("label" => "state"));
        $this->load->view("admin/managestate", $data);
    }

    public function managearea() 
    {
        $this->security();
        $data = array();
        $data["state"] = $this->md->my_select("tbl_location", "*", array("label" => "state"));
        if ($this->input->post("add")) 
        {
            $this->form_validation->set_rules("state", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Select Atleast One State"));
            $this->form_validation->set_rules("city", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Select Atleast One City"));
            $this->form_validation->set_rules("area", "", "required|regex_match[/^[A-Za-z ]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Area", "regex_match" => "<i class='fas fa-exclamation-circle'></i>Please Enter valid Area Name"));
            if ($this->form_validation->run() == TRUE) 
            {
                $name = strtoupper(substr($this->input->post("area"), 0, 1)) . strtolower(substr($this->input->post("area"), 1));
                $wh["name"] = $name;
                $wh["parent_id"] = $this->input->post("city");
                $recordset = $this->md->my_select("tbl_location", "*", $wh);
                $count = count($recordset);
                if ($count != 0)
                {
                    $recordset = $this->md->my_select("tbl_location", "*", array("location_id" => $this->input->post("city")));
                    $data["error"] = $name . " Is Already Exist In " . $recordset[0]->name;
                }
                else 
                {
                    $ins['location_id'] = 0;
                    $ins['name'] = $name;
                    $ins['parent_id'] = $this->input->post("city");
                    $ins['label'] = "area";
                    $result = $this->md->my_insert("tbl_location", $ins);
                    if ($result == 1) 
                    {
                        $wheree["location_id"] = $this->input->post("city");
                        $recordset = $this->md->my_select("tbl_location", "*", array("location_id" => $this->input->post("city")));
                        $data["success"] = $name . " Added Successfully In " . $recordset[0]->name;
                    } 
                    else
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $data["area_detail"] = $this->md->my_query("select st.name as state, ct.name as city , ar.location_id,ar.name from tbl_location as st , tbl_location as ct ,tbl_location as ar where ar.parent_id = ct.location_id AND ct.parent_id = st.location_id and ar.label='area';");
        $this->load->view("admin/managearea", $data);
    }

    public function managecity() 
    {
        $this->security();
        $data = array();
        if ($this->input->post("add")) 
        {
            $this->form_validation->set_rules("state", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Select Atleast One State"));
            $this->form_validation->set_rules("city", "", "required|regex_match[/^[A-Za-z ]+$/]", array('required' => "<i class='fas fa-exclamation-circle' ></i>Please Enter City", "regex_match" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i>Please Enter valid State Name"));
            if ($this->form_validation->run() == TRUE) 
            {
                $name = strtoupper(substr($this->input->post("city"), 0, 1)) . strtolower(substr($this->input->post("city"), 1));
                $wh["name"] = $name;
                $wh["parent_id"] = $this->input->post("state");
                $recordset = $this->md->my_select("tbl_location", "*", $wh);
                $count = count($recordset);
                if ($count != 0) 
                {
                    $recordset = $this->md->my_select("tbl_location", "*", array("location_id" => $this->input->post("state")));
                    $data["error"] = $name . " Is Already Exist In " . $recordset[0]->name;
                } 
                else 
                {
                    $ins['location_id'] = 0;
                    $ins['name'] = $name;
                    $ins['parent_id'] = $this->input->post("state");
                    $ins['label'] = "city";
                    $result = $this->md->my_insert("tbl_location", $ins);
                    if ($result == 1) 
                    {
                        $wheree["location_id"] = $this->input->post("state");
                        $recordset = $this->md->my_select("tbl_location", "*", array("location_id" => $this->input->post("state")));
                        $data["success"] = $name . " Added Successfully In " . $recordset[0]->name;
                    } 
                    else 
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $data["city_detail"] = $this->md->my_query("select st.name as state,ct.location_id,ct.name from tbl_location as st ,tbl_location as ct where ct.parent_id = st.location_id and ct.label = 'city';");
        $this->load->view("admin/managecity", $data);
    }
    public function request()
    {
        $this->security();
        $data = array();
        $data["request_detail"] = $this->md->my_query("select rq.*,se.restaurant_name from tbl_request as rq,tbl_restaurant as se where se.restaurant_id = rq.restaurant_id");
        $this->load->view("admin/request",$data); 
    }
    public function manageactivestores() 
    {
        $this->security();
        $data = array();
        $wh['status']=1;
        $data["seller_detail"] = $this->md->my_select("tbl_restaurant", "*",$wh);
        $this->load->view("admin/activestores",$data);
    }

    public function managedeactivestores() 
    {  
        $this->security();
        $data = array();
        $wh['status']=0;
        $data["seller_detail"] = $this->md->my_select("tbl_restaurant", "*",$wh);
        $this->load->view("admin/deactivestores",$data);
    }

    public function manageactiveusers() 
    {
        $this->security();
        $data = array();
        $wh['status']=1;
        $data["user_detail"] = $this->md->my_select("tbl_user", "*",$wh);
        $this->load->view("admin/activeusers",$data);
    }

    public function managedeactiveusers() 
    {
        $this->security();
        $data = array();
        $wh['status']=0;
        $data["user_detail"] = $this->md->my_select("tbl_user", "*",$wh);
        $this->load->view("admin/deactiveusers",$data);
    }

    public function managebanner() 
    {
        $this->security();
        $data=array();
        if($this->input->post("add"))
        {
            $this->form_validation->set_rules("banner_name", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Banner Name."));
            if($this->form_validation->run() == true)
            {
                    $banner_name=count($this->md->my_select("tbl_banner","*",array("banner_name"=>$this->input->post("banner_name"))));
                    if($banner_name==0)
                    {
                    $detail= $this->md->my_query("SELECT max(`banner_id`) as mx from tbl_banner");
                    $id = $detail[0]->mx;

                    if($id == "")
                    {
                        $config['file_name']="banner_0";
                    }
                    else
                    {
                        $config['file_name']="banner_".$id;
                    }

                    $config['upload_path']='./admin_assets/images/banner/';
                    $config['allowed_types']='jpeg|jpg|png';
                    $config['max_size']=1024 * 4;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('banner_pic'))
                    {    
                        $ins['banner_path']="admin_assets/images/banner/".$this->upload->data('file_name');
                        $ins['banner_name']= $this->input->post('banner_name');
                        
                        $result = $this->md->my_insert('tbl_banner',$ins);

                        if ($result == 1)
                        {
                            $data['success']= "Banner addded successfully.";
                        }
                        else 
                        {
                           $data['errror']= $this->upload->display_errors();
                        }
                    }
                }
                else
                {
                    $data['error']= "Banner already exist.";
                }
            }
        }
        $data['banner_detail']=$this->md->my_select("tbl_banner","*");
        $this->load->view("admin/banner",$data);
    }

    public function managemaincategory() 
    {
        $this->security();
        $this->load->view("admin/managemaincategory");
    }

    public function demoresume() 
    {
        
        $this->load->view("admin/demoresume");
    }
    
    public function managefoodcategory() 
    {
        $this->security();
        $this->load->view("admin/managefoodcategory");
    }

    public function managedishes() 
    {
        $this->security();
        $this->load->view("admin/managedishes");
    }

    public function managepackages() 
    {
        $this->security();
        $data=array();
        if($this->input->post("add"))
        {
            $this->form_validation->set_rules("name", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Name."));   
            $this->form_validation->set_rules("duration", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Duration."));   
            $this->form_validation->set_rules("price", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Price."));   
            $this->form_validation->set_rules("description", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Description."));
            if($this->form_validation->run()==true)
            {
                $wh["name"] = $this->input->post("name");
                $recordset = $this->md->my_select("tbl_package", "*", $wh);
                $count = count($recordset);
                if ($count != 0) 
                {
                    $data["error"] = $this->input->post("name") . " Is Already Exist.";
                } 
                else 
                {
                    $ins['package_id'] = 0;
                    $ins['name'] = $this->input->post("name");
                    $ins['duration'] = $this->input->post("duration");
                    $ins['price'] = $this->input->post("price");
                    $ins['description'] = $this->input->post("description");
                    $result = $this->md->my_insert("tbl_package", $ins);
                    if ($result == 1) 
                    {
                        $data["success"] = $this->input->post("name") . " Added Successfully.";
                    } 
                    else 
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }   
            }
        }
        $data["package_detail"] = $this->md->my_select("tbl_package", "*");
        $this->load->view("admin/managepackages",$data);
    }
    public function managepromocode() 
    {
        $this->security();
        $data=array();
        if($this->input->post("add"))
        {
            $this->form_validation->set_rules("codename", "", "required|regex_match[/^[A-Za-z0-9]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Package Name.",'regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Alpha And Number Allow."));   
            $this->form_validation->set_rules("amount", "", "required|regex_match[/^[0-9]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Promocode Amount.",'regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Number Allow."));   
            $this->form_validation->set_rules("minprice", "", "regex_match[/^[0-9]+$/]", array('regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Number Allow."));   
            $this->form_validation->set_rules("percentage", "", "required|regex_match[/^[0-9]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Persantage.",'regex_match'=>"<i class='fas fa-exclamation-circle'></i>Only Number Allow."));   
            $this->form_validation->set_rules("description", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Promocode Description."));
          
            if($this->form_validation->run()==true)
            {
                    $detail= $this->md->my_query("SELECT max(`promocode_id`) as mx from tbl_promocode");
                    $id = $detail[0]->mx;

                    if($id == "")
                    {
                        $config['file_name']="promocode_0";
                    }
                    else
                    {
                        $config['file_name']="promocode_".$id;
                    }

                    $config['upload_path']='./admin_assets/images/promocode/';
                    $config['allowed_types']='png';
                    $config['max_size']=1024 * 4;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('promo_icon'))
                    {    
                        
                        $wh["code"] = strtoupper($this->input->post("codename"));
                        $recordset = $this->md->my_select("tbl_promocode", "*", $wh);
                        $count = count($recordset);
                        if ($count != 0) 
                        {
                            $data["error"] = strtoupper($this->input->post("codename")) . " Is Already Exist.";
                        } 
                        else 
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
                            $result = $this->md->my_insert("tbl_promocode", $ins);
                            if ($result == 1) 
                            {
                                $data["success"] = strtoupper($this->input->post("codename")) . " Added Successfully.";
                            }    
                            else 
                            {
                                $data["error"] = "Somethis Is Wrong";
                            }
                        }    
                    }
                    else 
                    {
                         $data['errror']= $this->upload->display_errors();
                    }
            }
        }
        $data["promocode_detail"] = $this->md->my_select("tbl_promocode", "*");
        $this->load->view("admin/managepromocode",$data);
    }

    public function changepassword() 
    {
        $this->security();
        $data=array();
        if($this->input->post("add"))
        {
            if($this->input->post("cps")!="")
            {
                $wh["admin_id"] = $this->session->userdata("admin_username");
                $reasult=$this->encryption->decrypt($this->md->my_select("tbl_admin","*",$wh)[0]->password);
                if($this->input->post("cps")==$reasult)
                {
                   if($this->input->post("nps")!="")
                   {
                       $this->form_validation->set_rules("nps","","required|min_length[8]|max_length[16]");
                       if($this->form_validation->run()==true)
                       {
                           $nps=$this->input->post("nps");
                           $ncps=$this->input->post("ncps");
                           if($nps==$ncps)
                           {
                               $new_ps["password"]=$this->encryption->encrypt($this->input->post("nps"));
                               $this->md->my_update("tbl_admin",$new_ps,$wh);
                               set_cookie("admin_username",$this->input->post("username"),-10);
                               set_cookie("admin_password",$this->input->post("ps"),-10);
                               $this->session->unset_userdata("admin_username");
                               $this->session->unset_userdata("admin_logintime");
                               redirect("Admin-Authentication");
                           }
                           else
                           {
                               $data['error']="Password Is Not Match.";
                           }
                       }
                       else
                       {
                           $data['error']="Password Must Be In 8-16 Characters.";
                       }
                   }
                   else
                   {
                       $data["error"]="Please Enter New Password.";
                   }

                }
                else
                {
                    $data["error"]="Please Enter Correct Password.";
                }
            }
            else
            {
                $data["error"]="Please Enter Current Password.";
            }
        }
        
        if($this->input->post('apply'))
        {
            $detail= $this->md->my_select("tbl_admin","*",array("admin_id"=>$this->session->userdata("admin_username")));
            $id = $detail[0]->admin_id;

            if($id == "")
            {
                $config['file_name']="admin_profile_0";
            }
            else
            {
                $config['file_name']="admin_profile_".$id;
            }
            $config['upload_path']='./admin_assets/images/admin_profile/';
            $config['allowed_types']='jpeg|jpg|png';
            $config['max_size']=1024 * 4;
            $config['overwrite']=True;
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
             if ($this->upload->do_upload('admin_profile'))
             {    
                        $ins['profile']="admin_assets/images/admin_profile/".$this->upload->data('file_name');
                        $wh['admin_id'] = $this->session->userdata("admin_username");
                        $result = $this->md->my_update('tbl_admin',$ins,$wh);
                        if($result == 1)
                        {
                            $data['success'] = "Profile Picture Updated Successfully";
                        }
            }
            else 
            {
                 $data['errror']= $this->upload->display_errors();
            }
                    
        }
        $data['admin_detail']=$this->md->my_select("tbl_admin","*",array("admin_id"=>$this->session->userdata("admin_username")));
        $this->load->view("admin/changepassword",$data);
    }

    public function delete($data) 
    {
        $this->security();
        $table = $this->uri->segment(2);
        if ($table == "state") 
        {
            $wh['location_id'] = $this->uri->segment(3);
            $record = $this->md->my_select("tbl_location","*",array("parent_id" => $this->uri->segment(3),"label"=>"city"));
            if(count($record) == 0)
            {
                
                $this->md->my_delete("tbl_location", $wh);
                redirect("Admin-Manage-State");
            }
            else
            {
                $data = array();
                $data["error"] = "Please Remove child node of state first";
                $data["state_detail"] = $this->md->my_select("tbl_location", "*", array("label" => "state"));
                $this->load->view("admin/managestate", $data);
            }
        } 
        elseif ($table == "city") 
        {
            $wh['location_id'] = $this->uri->segment(3);
            $record = $this->md->my_select("tbl_location","*",array("parent_id" => $this->uri->segment(3),"label"=>"area"));
            if(count($record) == 0)
            {   
                $this->md->my_delete("tbl_location", $wh);
                redirect("Admin-Manage-City");
            }
            else
            {
                $data = array();
                $data["error"] = "Please Remove child node of city first";
                $data["city_detail"] = $this->md->my_query("select st.name as state,ct.location_id,ct.name from tbl_location as st ,tbl_location as ct where ct.parent_id = st.location_id and ct.label = 'city';");
                $this->load->view("admin/managecity", $data);
            }
        } 
        elseif ($table == "area") 
        {
            $wh['location_id'] = $this->uri->segment(3);
            $this->md->my_delete("tbl_location", $wh);
            redirect("Admin-Manage-Area");
        }
        elseif ($table == "maincat") 
        {
            $wh['category_id'] = $this->uri->segment(3);
            $record = $this->md->my_select("tbl_category","*",array("parent_id" => $this->uri->segment(3),"label"=>"subcat"));
            if(count($record) == 0)
            {
                
                $this->md->my_delete("tbl_category", $wh);
                redirect("Admin-Main-Category");
            }
            else
            {
                $data = array();
                $data["error"] = "Please Remove child node of main category first.";
                $data["maincat_detail"] = $this->md->my_select("tbl_category", "*", array("label" => "maincat"));
                $this->load->view("admin/maincategory",$data);
            }
            
        }
        elseif ($table == "email") 
        {
            $wh['email_id'] = $this->uri->segment(3);
            $this->md->my_delete("tbl_email_subscriber", $wh);
            redirect("Admin-Manage-Email");
        }
        elseif ($table == "contact") 
        {
            $wh['contact_id'] = $this->uri->segment(3);
            $this->md->my_delete("tbl_contactus", $wh);
            redirect("Admin-Manage-Contact");
        }
        elseif ($table == "feedback") 
        {
            $wh['feedback_id'] = $this->uri->segment(3);
            $this->md->my_delete("tbl_feedback", $wh);
            redirect("Admin-Manage-Feedback");
        }
        elseif ($table == "package") 
        {
            $wh['package_id'] = $this->uri->segment(3);
            $this->md->my_delete("tbl_package", $wh);
            redirect("Admin-Manage-Packages");
        }
        elseif ($table == "request")
        {
            $wh['request_id'] = $this->uri->segment(3);
            $this->md->my_delete("tbl_request", $wh);
            redirect("Admin-Manage-Packages");
        }
        elseif ($table == "banner")
        {
            $wh['banner_id'] = $this->uri->segment(3);
            $banner_fol=$this->md->my_select("tbl_banner","*",$wh);
            $path=$banner_fol[0]->banner_path;
            unlink("./".$path);
            $this->md->my_delete("tbl_banner", $wh);
            redirect("Admin-Manage-Banner");
        }
        elseif ($table == "promocode")
        {
            $wh['promocode_id'] = $this->uri->segment(3);
            $promo_fol=$this->md->my_select("tbl_promocode","*",$wh);
            $path=$promo_fol[0]->promo_icon_img;
            unlink("./".$path);
            $this->md->my_delete("tbl_promocode", $wh);
            redirect("Admin-Manage-Promocode");
        }
    }
    public function activedeactive()
    {
        $action = $this->uri->segment(2);    
        $id=$this->input->post('id');
        
        if($action=='deactivestore')
        {
            $wh["restaurant_id"] = $this->uri->segment(3);
            $up["status"] = 0;
            $this->md->my_update("tbl_restaurant",$up,$wh);   
            redirect("Admin-Manage-Active-Stores");
        }
        elseif($action == "activestore")
        {
           $wh["restaurant_id"] = $this->uri->segment(3);
           $up["status"] = 1;
           $this->md->my_update("tbl_restaurant",$up,$wh);   
           redirect("Admin-Manage-Deactive-Stores");
        }
        elseif($action == "deactiveuser")
        {
           $wh["user_id"] = $this->uri->segment(3);
           $up["status"] = 0;
           $this->md->my_update("tbl_user",$up,$wh);   
           redirect("Admin-Manage-Active-Users");
        }
        elseif($action == "activeuser")
        {
           $wh["user_id"] = $this->uri->segment(3);
           $up["status"] = 1;
           $this->md->my_update("tbl_user",$up,$wh);   
           redirect("Admin-Manage-Deactive-Users");
        }
    }
}
