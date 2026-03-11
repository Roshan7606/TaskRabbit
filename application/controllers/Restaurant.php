<?php

class Restaurant extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }
    public function security()
    {
        if (!$this->session->userdata("seller_email"))
        {
            redirect("Restaurant-Sign-In");
        } 
//        if($this->session->userdata("seller_email_package"))
//        {d
//            redirect("Restaurant-Home");
//        }
    }
    public function index()
    {
        $data = array();
        if ($this->input->post("login")) 
        {
            $this->form_validation->set_rules("email", "", "required",array('required' => "Please Enter Email."));
            $this->form_validation->set_rules("ps", "", "required",array('required' => "Please Enter Password."));
            if($this->form_validation->run() == TRUE) 
            {
             if ($this->input->post("email") != "") 
             {
                if ($this->input->post("ps") != "") 
                {
                    $email = $this->input->post("email");
                    $detail = $this->md->my_select("tbl_restaurant", "*", array("email" => $email));
                    $count = count($detail);
                    if ($count == 1) 
                    {
                        $ps = $this->input->post("ps");
                        $nps = 123456;
                        if ($ps == $nps) 
                        {
                            $this->session->set_userdata("seller_email", $detail[0]->restaurant_id);
                            $this->session->set_userdata("seller_logintime", date("Y-m-d H:i:s"));
                            redirect("Restaurant-Home");
                            if($this->input->post("svp")=="yes")
                            {
                                $exp = 60 * 60 * 24 * 3;
                                set_cookie("seller_email",$this->input->post("email"),$exp);
                                set_cookie("seller_password",$this->input->post("ps"),$exp);
                                                                

                            }
                            else
                            {
                               set_cookie("seller_email","",-10);
                               set_cookie("seller_password","",-10);
                            }
                            if($detail[0]->status == 0)
                            {
                            redirect("Restaurant-Active-Request");
                            }
                            else
                            {
                                redirect("Restaurant-Home");
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
            } 
        }
        $this->load->view("seller/index", $data);
    }

    public function signupdetail()
    {
        $data=array();
        if ($this->input->post("signup")) 
        {
             $this->form_validation->set_rules("ownname", "", "required", array('required' => "Please Enter Owner Name.", "regex_match" => "Please Enter valid Owner Name."));
             $this->form_validation->set_rules("ownmobile", "", "required|regex_match[/^[0-9]+$/]|min_length[10]|max_length[10]", array('required' => "Please Enter Owner Mobile Number.", "regex_match" => "Please Enter valid Owner Mobile Number.", "min_length" => "Please Enter Minimum 10 characters.", "max_length" => "Please Enter Maximum 10 characters."));
             $this->form_validation->set_rules("ownemail", "", "required|regex_match[/^[A-Za-z0-9@.]+$/]", array('required' => "Please Enter Owner Email.", "regex_match" => "Please Enter valid Owner Email."));
             $this->form_validation->set_rules("resopentime", "", "required", array('required' => "Please Select Restaurant Open Time."));
             $this->form_validation->set_rules("resclosetime", "", "required", array('required' => "Please Select Restaurant Open Time."));
             $this->form_validation->set_rules("state", "", "required", array('required' => "Please Select State"));
             $this->form_validation->set_rules("city", "", "required", array('required' => "Please Select City"));
             $this->form_validation->set_rules("area", "", "required", array('required' => "Please Select Area"));
             if ($this->form_validation->run() == TRUE) 
             {
                 $inres["restaurant_id"] = 0;
                 $inres["restaurant_name"] = $this->session->userdata("restaurant_name");
                 $inres["owner_name"] = $this->input->post("ownname");
                 $inres["owner_email"] = $this->input->post("ownemail");
                 $inres["owner_contactno"] = $this->input->post("ownmobile");
                 $inres["contact_no"] = $this->session->userdata("contact_no");
                 $inres["email"] = $this->session->userdata("email");
                 $inres["password"] = $this->encryption->encrypt($this->session->userdata("ps"));
                 $inres["location_id"] = $this->input->post("area");
                 $inres["status"] = 0;
                 $result = $this->md->my_insert("tbl_restaurant",$inres);
                 if($result == 1)
                 {
                     $restaurant_id = $this->md->my_select("tbl_restaurant","*",array("email"=>$this->session->userdata("email")))[0]->restaurant_id;
                     $days=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                     foreach ($days as $single)
                     {
                         $shins["shedule_id"] = 0;
                         $shins["seller_id"] = $restaurant_id;
                         $shins["day_name"] = $single;
                         $shins["open_time"] = $this->input->post("resopentime");
                         $shins["close_time"] = $this->input->post("resclosetime");
                         $result = $this->md->my_insert("tbl_shedule",$shins);
                     }
                     $this->session->set_userdata("seller_email",$restaurant_id);
                     $this->session->unset_userdata("restaurant_name","");
                     $this->session->unset_userdata("contact_no","");
                     $this->session->unset_userdata("email","");
                     $this->session->unset_userdata("ps","");
                     redirect("Restaurant-Home");
                 }
                 else
                 {
                     $data["error"] = "Something is wrong";
                 }
             }   
        }
        $data["state_detail"] = $this->md->my_select("tbl_location","*",array("label"=>"state"));
        $this->load->view("seller/signup_detail",$data);
    }
    public function logout() 
    {
        $wh["restaurant_id"] = $this->session->userdata("seller_email");
        $ins["lastlogin"] = $this->session->userdata("seller_logintime");
        $this->md->my_update("tbl_restaurant", $ins, $wh);
        $this->session->unset_userdata("seller_email");
        $this->session->unset_userdata("seller_logintime");
         $this->session->unset_userdata("seller_email_package");
        redirect("Restaurant-Sign-In");
    }
    public function forgotpassword()
    {
        $this->load->view("seller/forgotpassword");
    }
    public function home() 
    {
        $this->security();
        $this->load->view("seller/dashboard");   
    }
    public function signup() 
    {
        $data=array();
        if ($this->input->post("signup")) 
        {    
            $this->form_validation->set_rules("resname", "", "required", array('required' => "Please Enter Restautant Name.", "regex_match" => "Please Enter valid Restautant Name."));
            $this->form_validation->set_rules("mobile", "", "required|regex_match[/^[0-9]+$/]|min_length[10]|max_length[10]", array('required' => "Please Enter Mobile Number.", "regex_match" => "Please Enter valid Mobile Number.", "min_length" => "Please Enter Minimum 10 characters.", "max_length" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i> Please Enter Maximum 10 characters."));
            $this->form_validation->set_rules("email", "", "required|regex_match[/^[A-Za-z0-9@.]+$/]", array('required' => "Please Enter Email.", "regex_match" => "Please Enter valid Email."));
            $this->form_validation->set_rules("ps", "", "required|regex_match[/^[a-zA-Z0-9]+$/]|min_length[8]|max_length[16]", array('required' => "Please Enter Password.", "regex_match" => "Please Enter valid Password.", "min_length" => "Password Must Be In 8-16 characters.", "max_length" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i> Password Must be In 8-16 characters."));
            if ($this->form_validation->run() == TRUE) 
            {   
                
                $wh["email"] = $this->input->post("email");
                $count = count($this->md->my_select("tbl_restaurant", "*", $wh));
                if ($count != 0) 
                {
                    $data["error"] =  $this->input->post("email"). " Is Already Exist";
                } 
                else 
                {
                    $this->session->set_userdata("restaurant_name",$this->input->post("resname"));
                    $this->session->set_userdata("contact_no",$this->input->post("mobile"));
                    $this->session->set_userdata("email",$this->input->post("email"));
                    $this->session->set_userdata("ps",$this->input->post("ps"));
                    
                    
                    
//                        $this->session->set_userdata("seller_email_package",$this->input->post("email"));
//                        redirect("Packages");
                        redirect("Restaurant-Sign-Up-Details");
                    
                }
            }
        }
        
        $this->load->view("seller/signup",$data);   
    }
    public function editprofile() 
    {
        $this->security();
        $data = array();
        
        $wh["restaurant_id"] = $this->session->userdata("seller_email");
        $data["edit_profile"] = $this->md->my_select("tbl_restaurant", "*", $wh);
        $query="select ar.name as area,ct.name as city,st.name as state from tbl_location as ar,tbl_location as ct,tbl_location as st,tbl_restaurant as se where se.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and se.restaurant_id = ".$this->session->userdata("seller_email");
        $data["location_detail"]=$this->md->my_query($query);
        
        $package_id = $this->md->my_select("tbl_restaurant","*",array("restaurant_id"=>$this->session->userdata("seller_email")))[0]->package_id;
        $data["package_detail"] = $this->md->my_select("tbl_package","*",array("package_id"=>$package_id));
        if($this->input->post("apply"))
        {
            if($_FILES["cover"]["name"] != "")
            {
                $detail= $this->md->my_select("tbl_restaurant","*",array("restaurant_id"=>$this->session->userdata("seller_email")));
                $id = $detail[0]->restaurant_id;
            
                if($id == "")
                {
                    $config['file_name']="cover_0";
                }
                else
                {
                    $config['file_name']="cover_".$id;
                }

                $config['upload_path']='./seller_assets/images/seller_profile/';
                $config['allowed_types']='jpeg|jpg|png';
                $config['max_size']=1024 * 4;
                $config['overwrite'] = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('cover'))
                {    
                    $ins['coverpic']="seller_assets/images/seller_profile/".$this->upload->data('file_name');
                    $wh['restaurant_id'] = $this->session->userdata("seller_email");
                    $result = $this->md->my_update('tbl_restaurant',$ins,$wh);
                }
                else
                {
                    echo $this->upload->display_errors();
                }
            }
            if($_FILES["seller_profile"]["name"] != "")
            {
                $detail= $this->md->my_select("tbl_restaurant","*",array("restaurant_id"=>$this->session->userdata("seller_email")));
                $id = $detail[0]->restaurant_id;
            
                if($id == "")
                {
                    $config['file_name']="seller_profile_0";
                }
                else
                {
                    $config['file_name']="seller_profile_".$id;
                }

                $config['upload_path']='./seller_assets/images/seller_profile/';
                $config['allowed_types']='jpeg|jpg|png';
                $config['max_size']=1024 * 4;
                $config['overwrite'] = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('seller_profile'))
                {    
                    $ins['profile_pic']="seller_assets/images/seller_profile/".$this->upload->data('file_name');
                    $wh['restaurant_id'] = $this->session->userdata("seller_email");

                    $result = $this->md->my_update('tbl_restaurant',$ins,$wh);
                }
                else
                {
                    echo $this->upload->display_errors();
                }
            }
        }
        $data["seller_detail"] = $this->md->my_select("tbl_restaurant", "*", $wh); 
        $this->load->view("seller/editprofile",$data);   
    }
    public function changepassword() 
    {
        $this->security();
        $data=array();
        if($this->input->post("add"))
        {
            if($this->input->post("cps")!="")
            {
                $wh["restaurant_id"] = $this->session->userdata("seller_email");
                $reasult=$this->encryption->decrypt($this->md->my_select("tbl_restaurant","*",$wh)[0]->password);
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
                               $this->md->my_update("tbl_restaurant",$new_ps,$wh);
                               set_cookie("seller_email","",-10);
                               set_cookie("seller_password","",-10);
                               $this->session->unset_userdata("seller_email");
                               $this->session->unset_userdata("seller_logintime");
                               redirect("Restaurant-Sign-In");
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
      $this->load->view("seller/changepassword",$data);   
    }
    
    public function subcategory() 
    {
        $this->security();
        $data = array();
        if ($this->input->post("add")) {
            $this->form_validation->set_rules("maincat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Select Atleast One Main Category."));
            $this->form_validation->set_rules("subcat", "", "required|regex_match[/^[A-Za-z -]+$/]", array('required' => "<i class='fas fa-exclamation-circle' ></i> Please Enter Sub Category.", "regex_match" => "<i class='fas fa-exclamation-circle' style='margin-right : 4px;display:inline'></i> Please Enter valid Sub Category."));
            if ($this->form_validation->run() == TRUE) 
            {
                $name = strtoupper(substr($this->input->post("subcat"), 0, 1)) . strtolower(substr($this->input->post("subcat"), 1));
                $wh["name"] = $name;
                $wh["parent_id"] = $this->input->post("maincat");
                $recordset = $this->md->my_select("tbl_category", "*", $wh);
                $count = count($recordset);
                if ($count != 0) 
                {
                    $recordset = $this->md->my_select("tbl_category", "*", array("category_id" => $this->input->post("maincat")));
                    $data["error"] = $name." Is Already Exist In " . $recordset[0]->name;
                } 
                else 
                {
                    $ins['category_id'] = 0;
                    $ins['name'] = $name;
                    $ins['parent_id'] = $this->input->post("maincat");
                    $ins['label'] = "subcat";
                    $result = $this->md->my_insert("tbl_category", $ins);
                    if ($result == 1) 
                    {
                        $wheree["category_id"] = $this->input->post("maincat");
                        $recordset = $this->md->my_select("tbl_category", "*", array("category_id" => $this->input->post("maincat")));
                        $data["success"] = $name." Added Successfully In " . $recordset[0]->name;
                    } 
                    else 
                    {
                        $data["error"] = "Somethis Is Wrong";
                    }
                }
            }
        }
        $data["subcat_detail"] = $this->md->my_query("select mc.name as maincat,sc.category_id,sc.name from tbl_category as mc ,tbl_category as sc where sc.parent_id = mc.category_id;");        
        $this->load->view("seller/subcategory",$data);   
    }
//    public function petacategory() 
//    {
//        $this->security();
//        $data = array();
//        $data["maincat"] = $this->md->my_select("tbl_category", "*", array("label" => "maincat"));
//        if ($this->input->post("add")) 
//            {
//            $this->form_validation->set_rules("maincat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Select Atleast One Main Category."));
//            $this->form_validation->set_rules("subcat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Select Atleast One Sub Category."));
//            $this->form_validation->set_rules("petacat", "", "required|regex_match[/^[A-Za-z -]+$/]", array('required' => "<i class='fas fa-exclamation-circle'></i>Please Enter Peta Category.", "regex_match" => "<i class='fas fa-exclamation-circle'></i> Please Enter valid Peta Category."));
//            if ($this->form_validation->run() == TRUE) 
//            {
//                $name = strtoupper(substr($this->input->post("petacat"), 0, 1)) . strtolower(substr($this->input->post("petacat"), 1));
//                $wh["name"] = $name;
//                $wh["parent_id"] = $this->input->post("subcat");
//                $recordset = $this->md->my_select("tbl_category", "*", $wh);
//                $count = count($recordset);
//                if ($count != 0) 
//                {
//                    $recordset = $this->md->my_select("tbl_category", "*", array("category_id" => $this->input->post("subcat")));
//                    $data["error"] = $name." Is Already Exist In " . $recordset[0]->name;
//                } else {
//                    $ins['category_id'] = 0;
//                    $ins['name'] = $name;
//                    $ins['parent_id'] = $this->input->post("subcat");
//                    $ins['label'] = "petacat";
//                    $result = $this->md->my_insert("tbl_category", $ins);
//                    if ($result == 1) 
//                    {
//                        $wheree["category_id"] = $this->input->post("subcat");
//                        $recordset = $this->md->my_select("tbl_category", "*", array("category_id" => $this->input->post("subcat")));
//                        $data["success"] = $name." Added Successfully In " . $recordset[0]->name;
//                    } else {
//                        $data["error"] = "Somethis Is Wrong";
//                    }
//                }
//            }
//        }
//        $data["petacat_detail"] = $this->md->my_query("select mc.name as maincat, sc.name as subcat , pc.category_id,pc.name from tbl_category as mc , tbl_category as sc ,tbl_category as pc where pc.parent_id = sc.category_id AND sc.parent_id = mc.category_id;");
//      $this->load->view("seller/petacategory",$data);   
//    }
    public function additems() 
    {
        $this->security();
        $data[] = array();
        $data["maincat"] = $this->md->my_select("tbl_category", "*",array("label"=>"maincat"));
        if($this->input->post("add"))
        {
              $record = $this->md->my_select("tbl_restaurant","*",array("restaurant_id"=>$this->session->userdata("seller_email")));
              if($record[0]->location_id == 0)
              {
                  redirect("Restaurant-Edit-Profile");
              }
              else
              {
                $this->form_validation->set_rules("maincat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Select Main Category."));
                $this->form_validation->set_rules("subcat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Select Sub Category."));
                $this->form_validation->set_rules("petacat", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Name."));
                $this->form_validation->set_rules("price", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Price."));
                $this->form_validation->set_rules("description", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter Description."));
                $this->form_validation->set_rules("tags", "", "required", array('required' => "<i class='fas fa-exclamation-circle'></i> Please Enter tags."));
                
                if($this->form_validation->run() == true)
                {
                    if($_FILES["pimage"]["name"] == "")
                    {
                        $ins['category_id']= $this->input->post('subcat');
                        $ins['item_name']= $this->input->post('petacat');
                        $ins['description']= $this->input->post('description');
                        $ins['status']= 0;
                        $ins['measurement']= $this->input->post('measurement');
                        $ins['price']= $this->input->post('price');
                        $ins['tags']= $this->input->post('tags');
                        $ins['restaurant_id'] = $this->session->userdata("seller_email");

                        $result = $this->md->my_insert('tbl_item',$ins);

                        if ($result == 1)
                        {
                            $data['success']= "Item addded successfully";
                        }
                        else 
                        {
                           $data['errror']= "Something is wrong";
                        }
                    }
                    else
                    {
                        $detail= $this->md->my_query("SELECT max(`item_id`) as mx from tbl_item");
                        $id = $detail[0]->mx;

                        if($id == "")
                        {
                            $config['file_name']="item_0";
                        }
                        else
                        {
                            $config['file_name']="item_".$id;
                        }

                        $config['upload_path']='./seller_assets/images/item/';
                        $config['allowed_types']='jpeg|jpg|png';
                        $config['max_size']=1024 * 4;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('pimage'))
                        {    
                            $ins['image']="seller_assets/images/item/".$this->upload->data('file_name');
                            $ins['category_id']= $this->input->post('subcat');
                            $ins['item_name']= $this->input->post('petacat');
                            $ins['description']= $this->input->post('description');
                            $ins['status']= 0;
                            $ins['measurement']= $this->input->post('measurement');
                            $ins['price']= $this->input->post('price');
                            $ins['tags']= $this->input->post('tags');
                            $ins['restaurant_id'] = $this->session->userdata("seller_email");

                            $result = $this->md->my_insert('tbl_item',$ins);

                            if ($result == 1)
                            {
                                $data['success']= "Item addded successfully";
                            }
                            else 
                            {
                               $data['errror']= "Something Is Wrong";
                            }
                        }
                        else
                        {
                            $data['errror']= $this->upload->display_errors();
                        }
                    }
                }   
              }
        }
        $data["petacat_detail"] = $this->md->my_query("select mc.name as maincat, sc.name as subcat , pc.category_id,pc.name from tbl_category as mc , tbl_category as sc ,tbl_category as pc where pc.parent_id = sc.category_id AND sc.parent_id = mc.category_id;");
        $this->load->view("seller/additems",$data);   
    }
    public function manageitems() 
    {
        $this->security();
        $data = array();
        $query = "select cat.name as main_cat,subcat.name as sub_cat,pro.* from tbl_item as pro,tbl_category as cat,tbl_category as subcat where pro.category_id = subcat.category_id and subcat.parent_id = cat.category_id and pro.restaurant_id = ".$this->session->userdata("seller_email");
        $data["item_detail"] = $this->md->my_query($query);
        $this->load->view("seller/manageitems",$data);   
    }
    public function itemreviewrating() 
    {
        $this->security();
        $data = array();
        $id = $this->session->userdata("seller_email");
        $data["review_rating"] = $this->md->my_query("select us.*,re.* from tbl_user as us,tbl_review_rating as re where re.restaurant_id = '".$id."' and us.user_id = re.user_id");
        $this->load->view("seller/itemreviewrating",$data);   
    }
    public function menu() 
    {
        $this->security();
        $this->load->view("seller/menu");   
    }
    public function managebillpayment()
    {
        $data = array();
          $data["pending_payments"] = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.payment_status = 'pending'");
        $data["paid_payments"] = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.payment_status = 'paid'");
        $data["charges_payments"] = $this->md->my_query("select us.*,bill.*,ch.status as chstatus,ch.* from tbl_user as us,tbl_bill as bill,tbl_charges as ch where ch.bill_id = bill.bill_id and us.user_id = ch.user_id and ch.restaurant_id = ".$this->session->userdata("seller_email"));
        $this->load->view("seller/managebillpayment",$data);
    }
    public function order() 
    {
        $this->security();
        $data = array();
        $data["pending_orders"] = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,'");
        $data["prepared_orders"] = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,prepared,'");
        $data["deliveredready_orders"] = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,prepared,readydeliver,'");
        $data["delivered_orders"] = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,prepared,readydeliver,delivered'");
        $this->load->view("seller/order",$data);   
    }
    public function reports() 
    {
        $this->security();
        $this->load->view("seller/reports");   
    }
    public function itemdetail()
    {
        $this->security();
        $data = array();
        $id=$this->uri->segment(2);
        $query = "select cat.name as main_cat,subcat.name as sub_cat,pro.* from tbl_item as pro,tbl_category as cat,tbl_category as subcat where pro.category_id = subcat.category_id and subcat.parent_id = cat.category_id and pro.item_id = ".$id; 
        $data["item_detail"] = $this->md->my_query($query);
        $this->load->view("seller/itemdetail",$data);
    }
    public function activestatus()
    {
        $this->security();
        $data =array();
        if($this->input->post("add"))
        {
            $ins["request_id"] = 0;
            $ins["msg"] = "active";
            $ins["restaurant_id"] = $this->session->userdata("seller_email");
            $result = $this->md->my_insert("tbl_request",$ins);
            if($result == 1)
            {
                $data["success"] = "Please Wait while admin active your restaurent.";
            }
        }
        $this->load->view("seller/active_status",$data);
    }
    public function manageschedule(){
        $data = array();
        //$data["schedule_detail"] = $this->md->my_select("tbl_schedule","*",array("restaurant_id"=>$this->session->userdata("seller_email")));
        $this->load->view("seller/manageschedule",$data);
    }
    public function delete($data) 
{      
    $table = $this->uri->segment(2);
    if ($table == "maincat") 
    {
        $wh['parent_id'] = $this->uri->segment(3);
        $where['category_id'] = $this->uri->segment(3);
        $recordset=$this->md->my_select("tbl_category","*",$wh);
        $cnt=count($recordset);
        if($cnt == 0)
        {
            $this->md->my_delete("tbl_category", $where);
            redirect("Restaurant-Main-Category");
        }
        else
        {
            redirect("Restaurant-Main-Category");
        }
    }
    elseif ($table == "subcat") 
    {
        $wh['parent_id'] = $this->uri->segment(3);
        $where['category_id'] = $this->uri->segment(3);
        $recordset=$this->md->my_select("tbl_category","*",$wh);
        $cnt=count($recordset);
        if($cnt == 0)
        {
            $this->md->my_delete("tbl_category", $where);
            redirect("Restaurant-Sub-Category");
        }
        else
        {
            redirect("Restaurant-Sub-Category");
        }
    }
    elseif ($table == "petacat") 
    {
        $wh['category_id'] = $this->uri->segment(3);
        $this->md->my_delete("tbl_category", $wh);
        redirect("Restaurant-Peta-Category");
    }
    elseif ($table == "item") 
    {
        $wh['item_id'] = $this->uri->segment(3);
        $path = $this->md->my_select("tbl_item","*",$wh)[0]->image;
        unlink($path);
        $this->md->my_delete("tbl_item", $wh);
        redirect("Restaurant-Manage-Items");
    }
}

public function update_profile()
{
    $this->security();

    $restaurant_id = $this->session->userdata("seller_email");

    if (!$restaurant_id) {
        redirect("Restaurant-Sign-In");
        return;
    }

    $ins = array(
        "primary_skill"  => trim($this->input->post("primary_skill")),
        "experience"     => trim($this->input->post("experience")),
        "starting_price" => trim($this->input->post("starting_price")),
        "languages"      => trim($this->input->post("languages")),
        "about_me"       => trim($this->input->post("about_me"))
    );

    $this->db->where("restaurant_id", $restaurant_id);
    $result = $this->db->update("tbl_restaurant", $ins);

    if ($result) {
        $this->session->set_flashdata("success", "Professional details updated successfully.");
    } else {
        $this->session->set_flashdata("error", "Professional details update failed.");
    }

    redirect("Restaurant/editprofile", "refresh");
    exit;

    if(!empty($_FILES['provider_photo']['name']))
    {
        $config['upload_path'] = './uploads/providers/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = 'provider_'.$this->session->userdata('seller_email');
        $config['overwrite'] = TRUE;

        $this->load->library('upload',$config);

        if($this->upload->do_upload('provider_photo'))
        {
            $upload_data = $this->upload->data();

            $image_path = 'uploads/providers/'.$upload_data['file_name'];

            $this->db->where('restaurant_id',$this->session->userdata('seller_email'));
            $this->db->update('tbl_restaurant',array(
                'coverpic'=>$image_path
            ));
        }
    }
}
public function upload_provider_image()
{
    $restaurant_id = $this->input->post('restaurant_id');

    $config['upload_path']   = './uploads/providers/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    $data = [];

    // profile photo
    if(!empty($_FILES['profile_pic']['name']))
    {
        if($this->upload->do_upload('profile_pic'))
        {
            $file = $this->upload->data();
            $data['profile_pic'] = 'uploads/providers/'.$file['file_name'];
        }
    }

    // cover photo
    if(!empty($_FILES['cover_pic']['name']))
    {
        if($this->upload->do_upload('cover_pic'))
        {
            $file = $this->upload->data();
            $data['coverpic'] = 'uploads/providers/'.$file['file_name'];
        }
    }

    if(!empty($data))
    {
        $this->db->where('restaurant_id',$restaurant_id);
        $this->db->update('tbl_restaurant',$data);
    }

    redirect('Restaurant-Edit-Profile');
}
public function my_services()
{
    $provider_id = $this->session->userdata('seller_email');

    if (!$provider_id) {
        redirect('Restaurant');
    }

    $data['seller'] = $this->db
        ->where('restaurant_id', $provider_id)
        ->get('tbl_restaurant')
        ->row();

    $data['categories'] = $this->db
        ->get('tbl_category')
        ->result();

    $data['provider_services'] = $this->db
        ->where('provider_id', $provider_id)
        ->get('tbl_provider_services')
        ->result();

    $this->load->view('seller/my_services', $data);
}

public function save_services()
{
    $this->security();

    $provider_id = $this->session->userdata('seller_email');

    if (!$provider_id) {
        redirect('Restaurant');
        return;
    }

    $category_ids = $this->input->post('category_id');
    $prices       = $this->input->post('price');

    // pehla old provider services delete
    $this->db->where('provider_id', $provider_id);
    $this->db->delete('tbl_provider_services');

    if (!empty($category_ids)) {
        foreach ($category_ids as $cat_id) {

            $service_price = 0;
            if (isset($prices[$cat_id]) && $prices[$cat_id] !== '') {
                $service_price = $prices[$cat_id];
            }

            $ins = array(
                'provider_id'    => $provider_id,
                'category_id'    => $cat_id,
                'service_price'  => $service_price,
                'experience'     => '',
                'description'    => '',
                'status'         => 1,
                'created_at'     => date('Y-m-d H:i:s')
            );

            $this->db->insert('tbl_provider_services', $ins);
        }
    }

    $this->session->set_flashdata('success', 'Services saved successfully.');
    redirect('Restaurant-My-Services');
}

public function booking_requests()
{
    $this->security();

    $provider_id = $this->session->userdata("seller_email");

    $data["bookings"] = $this->db
        ->select("b.*,c.name as category_name")
        ->from("tbl_service_bookings b")
        ->join("tbl_category c","c.category_id=b.category_id","left")
        ->where("b.provider_id",$provider_id)
        ->order_by("b.booking_id","DESC")
        ->get()
        ->result();

    $this->load->view("seller/booking_requests",$data);
}

public function accept_booking($id)
{
    $this->security();

    $this->db->where("booking_id",$id);
    $this->db->update("tbl_service_bookings",array(
        "booking_status"=>"accepted",
        "action_at"=>date("Y-m-d H:i:s")
    ));

    redirect("Restaurant-Booking-Requests");
}

public function reject_booking($id)
{
    $this->security();

    $this->db->where("booking_id",$id);
    $this->db->update("tbl_service_bookings",array(
        "booking_status"=>"rejected",
        "action_at"=>date("Y-m-d H:i:s")
    ));

    redirect("Restaurant-Booking-Requests");
}
}
    