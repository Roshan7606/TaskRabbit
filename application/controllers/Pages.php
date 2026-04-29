<?php

class Pages extends CI_Controller {
    private $razorpay_key_id = 'rzp_test_SfcJoFICrqpb0o';
    private $razorpay_key_secret = 'MQ1f0zgFu7dYi4EQD2R2nKtz';


    function __construct() {
        parent::__construct();

        /*
         * PayPal and database configuration 
         */

// PayPal configuration 
        define('PAYPAL_ID', 'sb-sftdo1943921@business.example.com');

        define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
        define('PAYPAL_RETURN_URL', 'http://localhost/MUNCHBOX/Payment-Complete');
        define('PAYPAL_CANCEL_URL', 'http://localhost/MUNCHBOX/Payment-Fail');
        define('PAYPAL_NOTIFY_URL', 'http://localhost/MUNCHBOX/Payment-Notify');


        define('PAYPAL_CURRENCY', 'USD');



// Change not required 
        define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");
        date_default_timezone_set("Asia/Kolkata");
        $restaurant_details = $this->md->my_select("tbl_restaurant", "*");
        $current_day = strval(date("l"));

        foreach ($restaurant_details as $single) {
            $shedule_time = $this->md->my_select(
                "tbl_shedule",
                "*",
                array(
                    "seller_id" => $single->restaurant_id,
                    "day_name"  => $current_day
                )
            );

            if (!empty($shedule_time)) {
                $open_time = strtotime($shedule_time[0]->open_time);
                $close_time = strtotime($shedule_time[0]->close_time);
                $cur_time = strtotime(date("H:i"));

                if ($cur_time >= $open_time && $cur_time <= $close_time) {
                    $this->md->my_update(
                        "tbl_restaurant",
                        array("service_status" => "opened"),
                        array("restaurant_id" => $single->restaurant_id)
                    );
                } else {
                    $this->md->my_update(
                        "tbl_restaurant",
                        array("service_status" => "closed"),
                        array("restaurant_id" => $single->restaurant_id)
                    );
                }
            } else {
                $this->md->my_update(
                    "tbl_restaurant",
                    array("service_status" => "closed"),
                    array("restaurant_id" => $single->restaurant_id)
                );
            }
        }
    }

    public function security() {
        if (!$this->session->userdata("user_username")) {
            redirect("Home");
        }
    }

    public function cart_security() {
        $res = $this->md->my_select("tbl_addtocart", "*", array("user_id" => $this->session->userdata("user_username")));
        if (count($res) == 0) {
            redirect("Restaurant/0");
        }
    }

    public function logout() {
        $wh["user_id"] = $this->session->userdata("user_username");
        $ins["lastlogin"] = $this->session->userdata("user_logintime");
        $this->md->my_update("tbl_user", $ins, $wh);
        $this->session->unset_userdata("user_username");
        $this->session->unset_userdata("user_logintime");
        redirect("Home");
    }

    public function index() {
        $data = array();
$data["food_item_detail"] = $this->md->my_query("select cat.name as category,subcat.name as subcategory , res.restaurant_name ,item.* from tbl_category as cat,tbl_category as subcat,tbl_restaurant as res,tbl_item as item where subcat.category_id = item.category_id and cat.category_id = subcat.parent_id and res.restaurant_id = item.restaurant_id and item.status=1 ORDER by item_id ASC LIMIT 12");        $this->load->view("index", $data);
    }

    public function terms() {
        $this->load->view("terms");
    }

    public function contactus() {
        $data = array();
        if ($this->input->post("add")) {
            $this->form_validation->set_rules("name", "", "required|regex_match[/^[A-Za-z ]+$/]", array("required" => "This Field Is Required", "regex_match" => "Only Alpha Allow"));
            $this->form_validation->set_rules("mobile", "", "required|regex_match[/^[0-9]+$/]|min_length[10]|max_length[10]", array("required" => "This Field Is Required", "min_length" => "Minimum 10 character allow", "max_length" => "Maximum 10 character allow"));
            $this->form_validation->set_rules("email", "", "required|valid_email", array("required" => "This Field Is Required", "valid_email" => "Enter Valid Email"));
            $this->form_validation->set_rules("subject", "", "required", array("required" => "Plese enter the subject"));
            $this->form_validation->set_rules("msg", "", "required", array("required" => "Plsese Write Message"));
            if ($this->form_validation->run() == TRUE) {
                $name = strtolower($this->input->post("name"));
                $subject = strtolower($this->input->post("subject"));
                $ins['contact_id'] = 0;
                $ins['name'] = $name;
                $ins['email'] = $this->input->post("email");
                $ins['mobile'] = $this->input->post("mobile");
                $ins['subject'] = $subject;
                $ins['msg'] = $this->input->post("msg");
                $result = $this->md->my_insert("tbl_contactus", $ins);
                if ($result == 1) {
                    $data["success"] = "Thank you for contacting us";
                } else {

                    $data["error"] = "Somethis Is Wrong";
                }
            }
        }
        $this->load->view("contactus", $data);
    }

    public function aboutus() {
        $data = array();
        $data["feedback_Details"] = $this->md->my_select("tbl_feedback", "*");
        $this->load->view("aboutus", $data);
    }

    public function democard() {
        $this->load->view("democard");
    }

public function login()
{
    $data = array();

    if ($this->input->method() === 'post')
    {
        $email = strtolower(trim($this->input->post("email")));
        $password = trim($this->input->post("ps"));

        if ($email != "" && $password != "")
        {
            $detail = $this->db
                ->where("LOWER(email)", $email)
                ->get("tbl_user")
                ->row();

            if (!$detail)
            {
                $data["error"] = "Account not found. Please register first.";
            }
            else
            {
                $storedPassword = $this->encryption->decrypt($detail->password);

                if ($password !== $storedPassword)
                {
                    $data["error"] = "Invalid password.";
                }
                else
                {
                    $this->session->set_userdata("user_username", $detail->user_id);
                    $this->session->set_userdata("user_logintime", date("Y-m-d H:i:s"));
                    $this->session->set_userdata("user_email", $user->customer_email);
                    redirect("Restaurant/0");
                    return;
                }
            }
        }

        $this->load->view("login", $data);
        return;
    }

    $this->load->view("login");
}
    public function signup()
    {
        $data = array();

        if ($this->input->post("add_register"))
        {
            $this->form_validation->set_rules(
                "name",
                "",
                "required|regex_match[/^[A-Za-z ]+$/]",
                array(
                    "required" => "This Field Is Required",
                    "regex_match" => "Only Alpha Allow"
                )
            );

            $this->form_validation->set_rules(
                "mobile",
                "",
                "required|regex_match[/^[0-9]+$/]|min_length[10]|max_length[10]",
                array(
                    "required" => "This Field Is Required",
                    "min_length" => "Minimum 10 character allow",
                    "max_length" => "Maximum 10 character allow"
                )
            );

            $this->form_validation->set_rules(
                "email",
                "",
                "required|valid_email",
                array(
                    "required" => "This Field Is Required",
                    "valid_email" => "Enter Valid Email"
                )
            );

            $this->form_validation->set_rules(
                "ps",
                "",
                "required|min_length[8]",
                array(
                    "required" => "This Field Is Required",
                    "min_length" => "Password Must Be In Minimum 8 Character"
                )
            );

            if ($this->form_validation->run() == TRUE)
            {
                $name   = strtolower(trim($this->input->post("name")));
                $email  = trim($this->input->post("email"));
                $mobile = trim($this->input->post("mobile"));

                $email_check = count($this->md->my_select("tbl_user", "*", array("email" => $email)));
                if ($email_check > 0)
                {
                    $data["error"] = "Email is already registered.";
                }
                else
                {
                    $mobile_check = count($this->md->my_select("tbl_user", "*", array("contact_no" => $mobile)));
                    if ($mobile_check > 0)
                    {
                        $data["error"] = "Mobile number is already registered.";
                    }
                    else
                    {
                        $ins['user_id'] = 0;
                        $ins['status'] = 1;
                        $ins['name'] = $name;
                        $ins['contact_no'] = $mobile;
                        $ins['email'] = $email;
                        $ins['password'] = $this->encryption->encrypt($this->input->post("ps"));

                        $result = $this->md->my_insert("tbl_user", $ins);

                        if ($result == 1)
                        {
                            $user_id = $this->md->my_select("tbl_user", "*", array("email" => $email));
                            if (count($user_id) != 0)
                            {
                                $this->session->set_userdata("user_username", $user_id[0]->user_id);
                                redirect("Restaurant/0");
                            }
                        }
                        else
                        {
                            $data["error"] = "Somethis Is Wrong";
                        }
                    }
                }
            }
        }

        $this->load->view("signup", $data);
    }

    public function privacypolicy() {
        $this->load->view("privacypolicy");
    }

    public function restaurant() {
        $data = array();
        $id = $this->uri->segment(2);
        $this->session->set_userdata("search_restaurant", $id);

    $query = "SELECT category_id, name as restaurant_name, image as coverpic, 1 as restaurant_id
                FROM tbl_category
                WHERE label = 'maincat'
                ORDER BY name ASC";

        $data["restaurent"] = $this->md->my_query($query);
        $this->load->view("restaurant", $data);
    }

    public function restaurantdetails()
    {
        $data = array();
        $id = $this->uri->segment(2);
        $selected_category_id = (int) $this->input->get("service_id");
        $data["selected_category_id"] = $selected_category_id;

        $query = "SELECT st.name as state, ct.name as city, ar.name as area
                FROM tbl_location as st, tbl_location as ct, tbl_location as ar, tbl_restaurant as se
                WHERE se.location_id = ar.location_id
                AND ar.parent_id = ct.location_id
                AND ct.parent_id = st.location_id
                AND se.restaurant_id = ".$id;
        $data["restaurent_address_detail"] = $this->md->my_query($query);

        $data["restaurent_detail"] = $this->db
            ->where("restaurant_id", $id)
            ->get("tbl_restaurant")
            ->result();

        $data["user_detail"] = $this->md->my_select(
            "tbl_user",
            "*",
            array("user_id" => $this->session->userdata("user_username"))
        );

        $data["current_provider_id"] = $id;

        $this->db
            ->select("ps.*, c.name as category_name")
            ->from("tbl_provider_services ps")
            ->join("tbl_category c", "c.category_id = ps.category_id", "left")
            ->where("ps.provider_id", $id);

        if ($selected_category_id > 0) {
            $this->db->order_by("CASE WHEN ps.category_id = ".$selected_category_id." THEN 0 ELSE 1 END", "ASC", false);
        }

        $data["service_items"] = $this->db
            ->order_by("c.name", "ASC")
            ->get()
            ->result();

        $data["eligible_review_services"] = array();

        if ($this->session->userdata("user_username"))
        {
            $user_id = $this->session->userdata("user_username");
            $provider_id = $id;

            $data["eligible_review_services"] = $this->db
                ->select("
                    b.provider_service_id,
                    b.category_id,
                    c.name as service_name,
                    MAX(b.booking_id) as booking_id,
                    IF(MAX(sr.review_id) IS NOT NULL, 1, 0) as already_reviewed
                ", false)
                ->from("tbl_service_bookings b")
                ->join("tbl_category c", "c.category_id = b.category_id", "left")
                ->join(
                    "tbl_service_reviews sr",
                    "sr.user_id = b.user_id
                    AND sr.provider_id = b.provider_id
                    AND sr.provider_service_id = b.provider_service_id
                    AND sr.category_id = b.category_id
                    AND sr.status = 1",
                    "left"
                )
                ->where("b.user_id", $user_id)
                ->where("b.provider_id", $provider_id)
                ->where_in("b.booking_status", array("accepted", "completed"))
                ->group_by("b.provider_service_id")
                ->group_by("b.category_id")
                ->order_by("b.booking_id", "DESC")
                ->get()
                ->result();
        }

        $data["service_rating_map"] = array();

        $service_rating_rows = $this->db
            ->select("provider_service_id, ROUND(AVG(rating),1) as avg_rating, COUNT(*) as total_reviews")
            ->from("tbl_service_reviews")
            ->where("provider_id", $id)
            ->where("status", 1)
            ->group_by("provider_service_id")
            ->get()
            ->result();

        foreach ($service_rating_rows as $row)
        {
            $data["service_rating_map"][$row->provider_service_id] = array(
                "avg_rating"    => $row->avg_rating,
                "total_reviews" => $row->total_reviews
            );
        }

        $data["star_rating"] = $this->db
            ->select("AVG(rating) as rate_star, COUNT(*) as cnt_rate")
            ->from("tbl_service_reviews")
            ->where("provider_id", $id)
            ->where("status", 1)
            ->get()
            ->result();

        if (empty($data["star_rating"])) {
            $data["star_rating"] = array((object) array("rate_star" => 0, "cnt_rate" => 0));
        }

        $data["review_rating"] = $this->db
            ->select("sr.*, u.name, u.profile, c.name as service_name")
            ->from("tbl_service_reviews sr")
            ->join("tbl_user u", "u.user_id = sr.user_id", "left")
            ->join("tbl_category c", "c.category_id = sr.category_id", "left")
            ->where("sr.provider_id", $id)
            ->where("sr.status", 1)
            ->order_by("sr.review_id", "DESC")
            ->get()
            ->result();

        $data["schedule_details"] = $this->db
            ->where("seller_id", $id)
            ->order_by("FIELD(day_name,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')", "", false)
            ->get("tbl_shedule")
            ->result();

        $this->load->view("restaurantdetails", $data);
    }

    public function submit_booking()
    {
        date_default_timezone_set("Asia/Kolkata");

        if (!$this->session->userdata("user_username")) {
            redirect("Log-in");
            return;
        }

        $this->form_validation->set_rules('provider_id', '', 'required|numeric');
        $this->form_validation->set_rules('provider_service_id', '', 'required|numeric');
        $this->form_validation->set_rules('category_id', '', 'required|numeric');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required|in_list[cod,online]');

        $this->form_validation->set_rules(
            'customer_first_name',
            'First Name',
            'required|regex_match[/^[A-Za-z ]+$/]|min_length[2]|max_length[50]'
        );

        $this->form_validation->set_rules(
            'customer_last_name',
            'Last Name',
            'required|regex_match[/^[A-Za-z ]+$/]|min_length[2]|max_length[50]'
        );

        $this->form_validation->set_rules(
            'customer_phone',
            'Phone Number',
            'required|regex_match[/^[0-9]{10}$/]'
        );

        $this->form_validation->set_rules(
            'customer_email',
            'Email',
            'required|valid_email|max_length[100]'
        );

        $this->form_validation->set_rules(
            'customer_address',
            'Address',
            'required|min_length[10]|max_length[300]'
        );

        $this->form_validation->set_rules(
            'customer_description',
            'Description',
            'required|min_length[10]|max_length[500]'
        );

        $this->form_validation->set_rules('service_date', 'Service Date', 'required');
        $this->form_validation->set_rules('service_time', 'Service Time', 'required');

        if ($this->form_validation->run() == FALSE) {
            // $this->session->set_flashdata('booking_error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        $provider_id = $this->input->post('provider_id');
        $provider_service_id = $this->input->post('provider_service_id');
        $category_id = $this->input->post('category_id');

        $customer_first_name = trim($this->input->post('customer_first_name'));
        $customer_last_name = trim($this->input->post('customer_last_name'));
        $customer_name = $customer_first_name . ' ' . $customer_last_name;

        $customer_phone = trim($this->input->post('customer_phone'));
        $customer_email = trim($this->input->post('customer_email'));
        $customer_address = trim($this->input->post('customer_address'));
        $customer_description = trim($this->input->post('customer_description'));
        $service_date = $this->input->post('service_date');
        $service_time = $this->input->post('service_time');
        $payment_method = $this->input->post('payment_method') === 'online' ? 'online' : 'cod';

        if (strtotime($service_date) < strtotime(date('Y-m-d'))) {
            // $this->session->set_flashdata('booking_error', 'Past date is not allowed.');
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        $service_exists = $this->db
            ->where('id', $provider_service_id)
            ->where('provider_id', $provider_id)
            ->where('category_id', $category_id)
            ->get('tbl_provider_services')
            ->row();

        if (!$service_exists) {
            $this->session->set_flashdata('booking_error', 'Invalid service selected.');
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        $service_price = isset($service_exists->service_price) ? (float) $service_exists->service_price : 0;
        $payment_status = 'pending';
        $razorpay_order_id = NULL;
        $razorpay_payment_id = NULL;
        $razorpay_signature = NULL;
        $paid_at = NULL;

        if ($payment_method === 'online') {
            $razorpay_order_id = trim((string) $this->input->post('razorpay_order_id'));
            $razorpay_payment_id = trim((string) $this->input->post('razorpay_payment_id'));
            $razorpay_signature = trim((string) $this->input->post('razorpay_signature'));
            $pending_order = $this->session->userdata('booking_razorpay_order');

            if (
                !is_array($pending_order)
                || empty($pending_order['order_id'])
                || $pending_order['order_id'] !== $razorpay_order_id
                || (int) $pending_order['provider_id'] !== (int) $provider_id
                || (int) $pending_order['provider_service_id'] !== (int) $provider_service_id
                || (int) $pending_order['category_id'] !== (int) $category_id
            ) {
                $this->session->set_flashdata('booking_error', 'Online payment session expired. Please try again.');
                redirect($_SERVER['HTTP_REFERER']);
                return;
            }

            if (!$this->verify_razorpay_signature($pending_order['order_id'], $razorpay_payment_id, $razorpay_signature)) {
                $this->session->set_flashdata('booking_error', 'Online payment verification failed.');
                redirect($_SERVER['HTTP_REFERER']);
                return;
            }

            $payment_status = 'paid';
            $paid_at = date('Y-m-d H:i:s');
        }

        $expires_at = date('Y-m-d H:i:s', strtotime('+2 minutes'));

        $ins = array(
            'user_id' => $this->session->userdata("user_username"),
            'provider_id' => $provider_id,
            'provider_service_id' => $provider_service_id,
            'category_id' => $category_id,
            'customer_name' => $customer_name,
            'customer_phone' => $customer_phone,
            'customer_email' => $customer_email,
            'customer_address' => $customer_address,
            'customer_description' => $customer_description,
            'service_date' => $service_date,
            'service_time' => $service_time,
            'service_price' => $service_price,
            'payment_method' => $payment_method,
            'payment_status' => $payment_status,
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature,
            'paid_at' => $paid_at,
            'booking_status' => 'pending',
            'expires_at' => $expires_at
        );

        $this->md->ensure_task_booking_notification_column();
        $this->md->ensure_task_booking_payment_columns();
        $this->db->insert('tbl_service_bookings', $ins);
        $booking_id = $this->db->insert_id();

        if ($payment_method === 'online') {
            $this->session->unset_userdata('booking_razorpay_order');
        }

        if ((int) $booking_id > 0) {
            $category = $this->db
                ->select('name')
                ->where('category_id', $category_id)
                ->get('tbl_category')
                ->row();

            $this->send_booking_telegram_notification(array(
                'service_name' => $category && isset($category->name) ? $category->name : 'N/A',
                'service_price' => $service_price,
                'customer_first_name' => $customer_first_name,
                'customer_last_name' => $customer_last_name,
                'customer_phone' => $customer_phone,
                'customer_email' => $customer_email,
                'customer_address' => $customer_address,
                'customer_description' => $customer_description,
                'service_date' => $service_date,
                'service_time' => $service_time
            ));
        }

        $this->ensure_notifications_table();
        $notification_created_at = date('Y-m-d H:i:s');
        $notification_message = 'New task assigned by ' . (trim($customer_name) !== '' ? trim($customer_name) : 'user');
        $notification_id = 0;

        if ($this->db->table_exists('notifications')) {
            $notification_data = array(
                'user_id' => 1,
                'message' => $notification_message,
                'type' => 'task_assigned',
                'is_read' => 0,
                'created_at' => $notification_created_at
            );

            $this->db->insert('notifications', $notification_data);
            $notification_id = (int) $this->db->insert_id();
        }

        $this->load->library('Pusher_service');
        $this->pusher_service->trigger_task_assigned(array(
            'task_id' => (int) $booking_id,
            'notification_id' => $notification_id,
            'message' => $notification_message,
            'timestamp' => $notification_created_at,
            'created_at' => $notification_created_at,
            'type' => 'task_assigned',
            'is_read' => 0
        ));

        redirect(base_url('booking-waiting/' . $booking_id));
    }

    public function create_razorpay_booking_order()
    {
        if (!$this->session->userdata("user_username")) {
            return $this->json_response(array('status' => false, 'message' => 'Please login first.'), 401);
        }

        $provider_id = (int) $this->input->post('provider_id');
        $provider_service_id = (int) $this->input->post('provider_service_id');
        $category_id = (int) $this->input->post('category_id');

        $service = $this->db
            ->where('id', $provider_service_id)
            ->where('provider_id', $provider_id)
            ->where('category_id', $category_id)
            ->get('tbl_provider_services')
            ->row();

        if (!$service) {
            return $this->json_response(array('status' => false, 'message' => 'Invalid service selected.'), 400);
        }

        $amount = max(1, (int) round(((float) $service->service_price) * 100));
        $payload = json_encode(array(
            'amount' => $amount,
            'currency' => 'INR',
            'receipt' => 'booking_' . time() . '_' . $this->session->userdata("user_username"),
            'payment_capture' => 1
        ));

        if (!function_exists('curl_init')) {
            return $this->json_response(array('status' => false, 'message' => 'Online payment requires PHP cURL extension.'), 500);
        }

        $ch = curl_init('https://api.razorpay.com/v1/orders');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_USERPWD, $this->razorpay_key_id . ':' . $this->razorpay_key_secret);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);
        $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($response === false || $http_code < 200 || $http_code >= 300) {
            log_message('error', 'Razorpay order create failed: ' . $curl_error . ' Response: ' . $response);
            return $this->json_response(array('status' => false, 'message' => 'Unable to start online payment.'), 502);
        }

        $order = json_decode($response, true);
        if (!is_array($order) || empty($order['id'])) {
            return $this->json_response(array('status' => false, 'message' => 'Invalid Razorpay response.'), 502);
        }

        $this->session->set_userdata('booking_razorpay_order', array(
            'order_id' => $order['id'],
            'provider_id' => $provider_id,
            'provider_service_id' => $provider_service_id,
            'category_id' => $category_id,
            'amount' => $amount
        ));

        return $this->json_response(array(
            'status' => true,
            'key' => $this->razorpay_key_id,
            'order_id' => $order['id'],
            'amount' => $amount,
            'currency' => 'INR',
            'service_price' => (float) $service->service_price
        ));
    }

    private function verify_razorpay_signature($order_id, $payment_id, $signature)
    {
        if ($order_id === '' || $payment_id === '' || $signature === '') {
            return FALSE;
        }

        $expected = hash_hmac('sha256', $order_id . '|' . $payment_id, $this->razorpay_key_secret);
        return hash_equals($expected, $signature);
    }

    private function json_response($payload, $status_code = 200)
    {
        return $this->output
            ->set_status_header($status_code)
            ->set_content_type('application/json')
            ->set_output(json_encode($payload));
    }
    private function ensure_notifications_table()
    {
        if ($this->db->table_exists('notifications')) {
            return;
        }

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `notifications` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `user_id` INT(11) NOT NULL,
                `message` TEXT NOT NULL,
                `type` VARCHAR(50) NOT NULL DEFAULT 'task_assigned',
                `is_read` TINYINT(1) NOT NULL DEFAULT 0,
                `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                KEY `idx_notifications_user_read` (`user_id`, `is_read`),
                KEY `idx_notifications_created_at` (`created_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
    }

    private function send_booking_telegram_notification($booking_data = array())
    {
        $bot_token = '8562092425:AAE066UU5Iy1UVO652nKvW67b9MRmPfejP0';
        $chat_ids = array('6473882950', '-5171847172');

        $message = "\xF0\x9F\x9B\x92 New Booking Received!\n\n"
            . "\xF0\x9F\x93\x8C Service: " . $this->telegram_notification_value($booking_data, 'service_name') . "\n"
            . "\xF0\x9F\x92\xB0 Price: \xE2\x82\xB9" . $this->telegram_notification_value($booking_data, 'service_price') . "\n\n"
            . "\xF0\x9F\x91\xA4 Customer: " . trim(
                $this->telegram_notification_value($booking_data, 'customer_first_name')
                . ' '
                . $this->telegram_notification_value($booking_data, 'customer_last_name')
            ) . "\n"
            . "\xF0\x9F\x93\x9E Phone: " . $this->telegram_notification_value($booking_data, 'customer_phone') . "\n"
            . "\xF0\x9F\x93\xA7 Email: " . $this->telegram_notification_value($booking_data, 'customer_email') . "\n\n"
            . "\xF0\x9F\x8F\xA0 Address: " . $this->telegram_notification_value($booking_data, 'customer_address') . "\n"
            . "\xF0\x9F\x93\x9D Description: " . $this->telegram_notification_value($booking_data, 'customer_description') . "\n\n"
            . "\xF0\x9F\x93\x85 Date: " . $this->telegram_notification_value($booking_data, 'service_date') . "\n"
            . "\xE2\x8F\xB0 Time: " . $this->telegram_notification_value($booking_data, 'service_time');

        $endpoint = 'https://api.telegram.org/bot' . $bot_token . '/sendMessage';

        foreach ($chat_ids as $chat_id) {
            $payload = array(
                'chat_id' => $chat_id,
                'text' => $message
            );

            $sent = false;

            if (function_exists('curl_init')) {
                $ch = curl_init($endpoint);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);

                $response = curl_exec($ch);
                $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $curl_error = curl_error($ch);
                curl_close($ch);

                $sent = ($response !== false && $http_code === 200);

                if (!$sent && $curl_error !== '') {
                    log_message('error', 'Telegram booking notification failed for chat ID ' . $chat_id . ': ' . $curl_error);
                }
            }

            if (!$sent) {
                $context = stream_context_create(array(
                    'http' => array(
                        'method' => 'POST',
                        'header' => "Content-type: application/x-www-form-urlencoded; charset=UTF-8\r\n",
                        'content' => http_build_query($payload),
                        'timeout' => 10
                    )
                ));

                $response = @file_get_contents($endpoint, false, $context);
                $sent = ($response !== false);
            }

            if (!$sent) {
                log_message('error', 'Telegram booking notification failed for booking submission chat ID ' . $chat_id . '.');
            }
        }
    }

    private function telegram_notification_value($booking_data, $key)
    {
        if (!isset($booking_data[$key])) {
            return 'N/A';
        }

        $value = trim((string) $booking_data[$key]);
        return $value === '' ? 'N/A' : $value;
    }

    public function booking_waiting($booking_id)
    {
        $booking = $this->db
            ->where('booking_id', $booking_id)
            ->get('tbl_service_bookings')
            ->row();

        if (!$booking) {
            show_404();
        }

        $data['booking'] = $booking;
        $this->load->view('booking_waiting', $data);
    }

    public function check_booking_status($booking_id)
    {
        date_default_timezone_set("Asia/Kolkata");

        $booking = $this->db
            ->where('booking_id', $booking_id)
            ->get('tbl_service_bookings')
            ->row();

        if (!$booking) {
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 'not_found',
                'remaining_seconds' => 0
            ));
            exit;
        }

        if ($booking->booking_status == 'pending' && strtotime($booking->expires_at) <= time()) {
            $this->db->where('booking_id', $booking_id);
            $this->db->update('tbl_service_bookings', array(
                'booking_status' => 'expired',
                'action_at' => date('Y-m-d H:i:s')
            ));
            $booking->booking_status = 'expired';
        }

        $remaining_seconds = strtotime($booking->expires_at) - time();
        if ($remaining_seconds < 0) {
            $remaining_seconds = 0;
        }

        $response = array(
            'status' => $booking->booking_status,
            'remaining_seconds' => $remaining_seconds
        );

        if ($booking->booking_status == 'accepted') {
            $provider = $this->db
                ->where('restaurant_id', $booking->provider_id)
                ->get('tbl_restaurant')
                ->row();

            if ($provider) {
                $response['provider'] = array(
                    'owner_name'    => $provider->owner_name,
                    'primary_skill' => $provider->primary_skill,
                    'experience'    => $provider->experience,
                    'languages'     => $provider->languages,
                    'about_me'      => $provider->about_me,
                    'contact_no'    => $provider->contact_no,
                    'email'         => $provider->email,
                    'profile_pic'   => $provider->profile_pic,
                    'coverpic'      => $provider->coverpic
                );
            }
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

        public function service_providers()
    {
        $data = array();
        $category_id = $this->uri->segment(2);

        // current selected service/category detail
        $data["service_detail"] = $this->db
            ->where("category_id", $category_id)
            ->get("tbl_category")
            ->row();

        // all providers who selected this service in provider panel
        $data["providers"] = $this->db
            ->select("r.*, ps.service_price, ps.category_id, c.name as category_name")
            ->from("tbl_provider_services ps")
            ->join("tbl_restaurant r", "r.restaurant_id = ps.provider_id", "left")
            ->join("tbl_category c", "c.category_id = ps.category_id", "left")
            ->where("ps.category_id", $category_id)
            ->where("ps.status", 1)
            ->where("r.status", 1)
            ->order_by("ps.id", "DESC")
            ->get()
            ->result();

        $this->load->view("service_providers", $data);
    }

    public function sidebar() {
        $this->security();
        $this->load->view("sidebar");
    }

    public function city() {
        $data = array();
        $data["city_detail"] = $this->md->my_query("select st.name as state, ct.name as city, ct.location_id as res_location , count(*) as cnt_res from tbl_location as st, tbl_location as ct,tbl_restaurant as se,tbl_location as ar where se.location_id = ar.location_id and ct.location_id = ar.parent_id and ct.parent_id = st.location_id and se.status = 1  GROUP BY ct.name");
        $this->load->view("city", $data);
    }

    public function userprofile() {
        $this->security();
        $data = array();
        $data["res_ord_detail_active"] = $this->md->my_query("select se.*,bl.*,ar.name as area,ct.name as city,st.name as state from tbl_location as ar,tbl_location as ct,tbl_location as st,tbl_restaurant as se,tbl_bill as bl where ar.location_id = se.location_id and ct.location_id = ar.parent_id and st.location_id = ct.parent_id and se.restaurant_id = bl.restaurant_id and bl.status In ('pending,','pending,prepared,','pending,prepared,readydeliver,') and bl.user_id = " . $this->session->userdata("user_username"));
        $data["res_ord_detail_past"] = $this->md->my_query("select se.*,bl.*,ar.name as area,ct.name as city,st.name as state from tbl_location as ar,tbl_location as ct,tbl_location as st,tbl_restaurant as se,tbl_bill as bl where ar.location_id = se.location_id and ct.location_id = ar.parent_id and st.location_id = ct.parent_id and bl.status In ('pending,','pending,prepared,','pending,prepared,readydeliver,delivered') and se.restaurant_id = bl.restaurant_id and bl.user_id = " . $this->session->userdata("user_username"));
        $this->load->view("user_order", $data);
    }

    public function usershipment() {
        $this->security();
        $data = array();
        if ($this->input->post("add")) {
            $this->form_validation->set_rules("state", "", "required", array("required" => "Please select atleast one State."));
            $this->form_validation->set_rules("city", "", "required", array("required" => "Please select atleast one City."));
            $this->form_validation->set_rules("area", "", "required", array("required" => "Please select atleast one Area."));
            $this->form_validation->set_rules("pincode", "", "required|min_length[6]|max_length[6]", array("required" => "Please Enter Pincode.", "min_length" => "Pincode must be in 6 character.", "max_length" => "Pincode must be in 6 character."));
            $this->form_validation->set_rules("add_type", "", "required", array("required" => "Please Select atleast one type."));
            $this->form_validation->set_rules("address", "", "required", array("required" => "Please Enter Address."));
            if ($this->form_validation->run() == true) {
                $ins['shipment_id'] = 0;
                $ins['user_id'] = $this->session->userdata("user_username");
                $ins['address'] = $this->input->post("address");
                $ins['location_id'] = $this->input->post("area");
                $ins['pincode'] = $this->input->post("pincode");
                $ins['address_type'] = $this->input->post("add_type");
                $result = $this->md->my_insert("tbl_shipment", $ins);
                if ($result == 1) {
                    $data["success"] = "Address Added Successfully.";
                    if ($this->session->userdata("addnewaddress") && $this->session->userdata("addnewaddress") == "yes") {
                        $this->session->unset_userdata("addnewaddress", "");
                        $this->session->set_userdata("delivered_address", "0");
                        redirect("Confirm-order-detail");
                    }
                } else {
                    $data["error"] = "Something is wrong.";
                }
            }
        }
        $data["state_detail"] = $this->md->my_select("tbl_location", "*", array("label" => "state"));
        $data["address_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,sh.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_shipment as sh where sh.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and user_id = " . $this->session->userdata("user_username"));
        $this->load->view("user_shipment", $data);
    }

    public function usersetting() {
        $this->security();
        $data = array();
        if ($this->input->post("add")) {
            if ($this->input->post("cps") != "") {
                $wh["user_id"] = $this->session->userdata("user_username");
                $result = $this->encryption->decrypt($this->md->my_select("tbl_user", "*", $wh)[0]->password);
                if ($this->input->post("cps") == $result) {
                    if ($this->input->post("nps") != "") {
                        $this->form_validation->set_rules("nps", "", "required|min_length[8]");
                        if ($this->form_validation->run() == true) {
                            $nps = $this->input->post("nps");
                            $ncps = $this->input->post("ncps");
                            if ($nps == $ncps) {
                                $new_ps["password"] = $this->encryption->encrypt($this->input->post("nps"));
                                $this->md->my_update("tbl_user", $new_ps, $wh);
                                set_cookie("user_username", "", -10);
                                set_cookie("user_password", "", -10);
                                $this->session->unset_userdata("user_username");
                                $this->session->unset_userdata("user_logintime");
                                redirect("Home");
                            } else {
                                $data['error5'] = "Password Is Not Match.";
                            }
                        } else {
                            $data['error4'] = "Password Must Be In 8-16 Characters.";
                        }
                    } else {
                        $data["error3"] = "Please Enter New Password.";
                    }
                } else {
                    $data["error2"] = "Please Enter Correct Password.";
                }
            } else {
                $data["error1"] = "Please Enter Current Password.";
            }
        }
        $this->load->view("user_setting", $data);
    }

    public function userfavourite() {
        $this->security();
        $data = array();
        $data["restaurant"] = $this->md->my_query("select se.*,ws.* from tbl_restaurant as se,tbl_favourite as ws where se.restaurant_id = ws.reference_id and ws.type = 'Restaurant' and ws.user_id = " . $this->session->userdata("user_username"));
        $data["food_item"] = $this->md->my_query("select res.restaurant_id,res.restaurant_name,cat.name as category,subcat.name,item.*,fav.favourite_id from tbl_restaurant as res, tbl_favourite as fav ,tbl_category as cat ,tbl_category as subcat,tbl_item as item where subcat.category_id = item.category_id and cat.category_id = subcat.parent_id and item.status = 1 and fav.type = 'Item' and res.restaurant_id = item.restaurant_id and item.item_id = fav.reference_id and fav.user_id = " . $this->session->userdata("user_username") . " order by subcat.name");
        $this->load->view("user_favourite", $data);
    }

public function userorder()
{
    $this->security();
    $data = array();

$user_id = $this->session->userdata("user_username");
   

$data["res_ord_detail_active"] = $this->md->my_query("
    SELECT 
        sb.customer_email,
        r.restaurant_name,
        c.name as category_name,
        sb.service_date,
        sb.service_time,
        sb.booking_status
    FROM tbl_service_bookings as sb

    JOIN tbl_restaurant as r 
        ON r.restaurant_id = sb.provider_id

    JOIN tbl_category as c 
        ON c.category_id = sb.category_id

    WHERE sb.user_id = '$user_id'
");

    // PAST BOOKING
    
    $this->load->view("user_order", $data);
}

    public function userreview() {
        $this->security();
        $data = array();
        $data["user_review_rating"] = $this->md->my_query("select us.*,re.*,res.* from tbl_restaurant as res,tbl_user as us,tbl_review_rating as re where  res.restaurant_id = re.restaurant_id and us.user_id = re.user_id and re.user_id = " . $this->session->userdata("user_username"));
        $this->load->view("user_review", $data);
    }

    public function packages() {
        //$this->security();
        $data = array();
        $data['packages'] = $this->md->my_select("tbl_package", "*");
        $this->load->view("packages", $data);
    }

    public function orderdetail() {
        $this->security();
        $data = array();
        $bill_id = $this->uri->segment(2);
        $record = $this->md->my_select("tbl_bill", "*", array("bill_id" => $bill_id));
        $data["restaurant_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,se.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_restaurant as se where se.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and se.restaurant_id = " . $record[0]->restaurant_id);
        $data["shipment_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,sh.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_shipment as sh where sh.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and sh.user_id = " . $this->session->userdata("user_username") . " and sh.shipment_id = " . $record[0]->shipment_id);
        $data["order_detail"] = $this->md->my_query("select tr.*,it.item_name,it.measurement,it.description,it.category_id,it.image,it.status as item_status from tbl_transaction as tr,tbl_item as it,tbl_bill as bl where tr.item_id = it.item_id and it.restaurant_id = tr.restaurant_id and bl.bill_id = tr.bill_id and tr.bill_id = " . $bill_id . " and tr.user_id = " . $this->session->userdata("user_username"));
        $data["bill_detail"] = $this->md->my_select("tbl_bill", "*", array("bill_id" => $bill_id, "user_id" => $this->session->userdata("user_username")));
        $data["user_detail"] = $this->md->my_select("tbl_user", "*", array("user_id" => $this->session->userdata("user_username")));
        $this->load->view("order_detail", $data);
    }

    public function feedback() {
        $data = array();
        if ($this->input->post("add")) {
            $this->form_validation->set_rules("name", "", "required|regex_match[/^[A-Za-z ]+$/]", array("required" => "This Field Is Required", "regex_match" => "Only Alpha Allow"));
            $this->form_validation->set_rules("msg", "", "required", array("required" => "Please Enter Message"));
            if ($this->form_validation->run() == TRUE) {
                $name = strtolower($this->input->post("name"));
                $ins['feedback_id'] = 1;
                $ins['name'] = $name;
                $ins['msg'] = $this->input->post("msg");
                $result = $this->md->my_insert("tbl_feedback", $ins);
                if ($result == 1) {
                    $data["success"] = "Thank's For Giving Feedback.";
                } else {
                    $data["error"] = "Somethis Is Wrong";
                }
            }
        }
        $this->load->view("feedback", $data);
    }

    public function payment_successful() {
        $this->load->view("Payment_success");
    }

    public function reorder() {
        
    }

    public function payment_fail() {
        $this->load->view("Payment_fail");
    }

    public function payment_success() {
        $this->security();
        $data = array();
        error_reporting(0);
        $cart_item = $this->md->my_select("tbl_addtocart", "*", array("restaurant_id" => $this->uri->segment(2), "user_id" => $this->session->userdata("user_username")));
        $restaurant_status = $this->md->my_select("tbl_restaurant", "*", array("restaurant_id" => $this->uri->segment(2)));
        if (count($cart_item) == 0) {
            redirect("Restaurant/0");
            $this->session->unset_userdata("delivered_address", "");
        } else {
//            if ($this->session->userdata("reorder_bill_id")) 
//            {
//                if ($this->session->userdata("suggestion") != "") 
//                {
//                    $ins_bill["suggestion"] = $this->session->userdata("suggestion");
//                }
//                if ($this->session->userdata("payment_method") && $this->session->userdata("payment_method") != "no") 
//                {
//                    if ($this->session->userdata("payment_method") == "cod") 
//                    {
//                        $ins_bill["payment_method"] = "cod";
//                    } 
//                    else 
//                    {
//                        $ins_bill["payment_method"] = "pod";
//                    }
//                    $ins_bill["status"] = "pending,";
//                }
//                $result = $this->md->my_update("tbl_bill", $ins_bill, array("bill_id" => $this->session->userdata("reorder_bill_id")));
//                if ($result == 1) 
//                {
//                    $this->session->unset_userdata("reorder_bill_id", "");
//                    $this->session->unset_userdata("payment_method", "");
//                    $this->session->unset_userdata("suggetion", "");
//                }
//            } 
//            else
//             {
            if ($this->session->userdata("reorder_bill_id")) {
                $ins_bill["bill_id"] = $this->session->userdata("reorder_bill_id");
            } else {
                $ins_bill["bill_id"] = 0;
            }

            $ins_bill["bill_number"] = mt_rand(100000, 999999);
            $ins_bill["user_id"] = $this->session->userdata("user_username");
            $ins_bill["shipment_id"] = $this->session->userdata("delivered_address");
            $ins_bill["bill_date"] = date("Y-m-d h:i:s");
//            if ($this->session->userdata("promocode")) {
//                $ins_bill["promocode_id"] = $this->session->userdata("promocode");
//            } else {
//                $ins_bill["promocode_id"] = 0;
//            }
            //$ins_bill["discount"] = $this->uri->segment(3);
            $ins_bill["tex"] = $this->uri->segment(4);
            $ins_bill["amount"] = $this->uri->segment(5);
            $ins_bill["restaurant_id"] = $this->uri->segment(2);
            $ins_bill["status"] = "pending,";

            if ($this->session->userdata("suggestion") != "") {
                $ins_bill["suggestion"] = $this->session->userdata("suggestion");
            }
            if ($this->session->userdata("payment_method") && $this->session->userdata("payment_method") != "no") {
                if ($this->session->userdata("payment_method") == "cod") {
                    $ins_bill["payment_method"] = "cod";
                } else {
                    $ins_bill["payment_method"] = "pod";
                }
            }
            $ins_bill["payment_status"] = "pending";
            if ($this->session->userdata("reorder_bill_id")) {
                $res = $this->md->my_update("tbl_bill", $ins_bill, array("bill_id" => $this->session->userdata("reorder_bill_id")));
            } else {
                $res = $this->md->my_insert("tbl_bill", $ins_bill);
            }

            if ($res == 1) {
                if ($this->session->userdata("reorder_bill_id")) {
                    $bill_id = $this->session->userdata("reorder_bill_id");
                } else {
                    $bill_detail = $this->md->my_query("SELECT MAX(`bill_id`) as mx FROM `tbl_bill` WHERE `user_id` = " . $this->session->userdata("user_username"));
                    $id = $bill_detail[0]->mx;
                    if ($id == "") {
                        $bill_id = 1;
                    } else {
                        $bill_id = $id;
                    }
                }

                if ($this->uri->segment(3) != "00") {
                    $charges_id = explode("A", rtrim($this->uri->segment(3), "A"));
                    foreach ($charges_id as $single) {
                        $up["status"] = "added_" . $bill_id;
                        $wh["charges_id"] = $single;
                        $this->md->my_update("tbl_charges", $up, $wh);
                    }
                }



                $cart_detail = $this->md->my_select("tbl_addtocart", "*", array("user_id" => $this->session->userdata("user_username"), "restaurant_id" => $this->uri->segment(2)));
                foreach ($cart_detail as $single) {
                    $ins_trans["transaction_id"] = 0;
                    $ins_trans["bill_id"] = $bill_id;
                    $ins_trans["user_id"] = $this->session->userdata("user_username");
                    $ins_trans["restaurant_id"] = $this->uri->segment(2);
                    $ins_trans["item_id"] = $single->item_id;
                    $ins_trans["price"] = $single->price;
                    $ins_trans["qty"] = $single->qty;
                    $ins_trans["net_price"] = $single->total_price;
                    $this->md->my_insert("tbl_transaction", $ins_trans);
                    $this->md->my_delete("tbl_addtocart", array("cart_id" => $single->cart_id));
                }
            }
            $data["restaurant_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,se.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_restaurant as se where se.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and se.restaurant_id = " . $this->uri->segment(2));
            $data["shipment_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,sh.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_shipment as sh where sh.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and sh.user_id = " . $this->session->userdata("user_username") . " and sh.shipment_id = " . $this->session->userdata("delivered_address"));
            $data["order_detail"] = $this->md->my_query("select tr.*,it.item_name,it.measurement,it.description,it.category_id,it.image from tbl_transaction as tr,tbl_item as it,tbl_bill as bl where tr.item_id = it.item_id and it.restaurant_id = tr.restaurant_id and bl.bill_id = tr.bill_id and tr.bill_id = " . $bill_id . " and tr.user_id = " . $this->session->userdata("user_username"));
            $data["bill_detail"] = $this->md->my_select("tbl_bill", "*", array("bill_id" => $bill_id, "user_id" => $this->session->userdata("user_username")));
            $data["user_detail"] = $this->md->my_select("tbl_user", "*", array("user_id" => $this->session->userdata("user_username")));
            $this->session->unset_userdata("confirm_detail_flag", "");
            $this->session->unset_userdata("delivered_address", "");
            $this->session->unset_userdata("suggestion", "");
            $this->session->unset_userdata("reorder_bill_id","");
            $this->session->unset_userdata("payment_method", "");
            $this->load->view("payment_succes", $data);
        }
    }

    public function payment_notify() {

        /*
         * Read POST data 
          10
         * reading posted data directly from $_POST causes serialization 
          11
         * issues with array data in POST. 
          12
         * Reading raw POST data from input stream instead. 
          13
         */
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
// Read the post from PayPal system and add 'cmd' 
        $req = 'cmd=_notify-validate';
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
        /*
          38
         * Post IPN data back to PayPal to validate the IPN data is genuine 
          39
         * Without this step, anyone can fake IPN data 
          40
         */
        $paypalURL = PAYPAL_URL;
        $ch = curl_init($paypalURL);
        if ($ch == FALSE) {
            return FALSE;
        }
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSLVERSION, 6);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
// Set TCP timeout to 30 seconds 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
        $res = curl_exec($ch);
        /*
          61
         * Inspect IPN validation result and act accordingly 
          62
         * Split response headers and payload, a better way for strcmp 
          63
         */
        $tokens = explode("\r\n\r\n", trim($res));
        $res = trim(end($tokens));
        if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {
// Retrieve transaction info from PayPal 
            $item_number = $_POST['item_number'];
            $txn_id = $_POST['txn_id'];
            $payment_gross = $_POST['mc_gross'];
            $currency_code = $_POST['mc_currency'];
            $payment_status = $_POST['payment_status'];
// Check if transaction data exists with the same TXN ID 
            $prevPayment = $this->md->my_query("SELECT payment_id FROM payments WHERE txn_id = '" . $txn_id . "'")->result();
            if ($prevPayment->num_rows > 0) {
                exit();
            } else {
// Insert transaction data into the database 
                $insert = $this->md->my_query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('" . $item_number . "','" . $txn_id . "','" . $payment_gross . "','" . $currency_code . "','" . $payment_status . "')")->result();
            }
        }
    }

    public function hello() {
        
    }

    public function Menu() {
        $this->load->view("Menu");
    }

    public function editprofile() {
        $this->security();
        $data = array();
        if ($this->input->post("edit_user_detail")) {
            $this->form_validation->set_rules("name", "", "required|regex_match[/^[A-Za-z ]+$/]", array("required" => "This Field Is Required", "regex_match" => "Only Alpha Allow"));
            $this->form_validation->set_rules("mobile", "", "required|regex_match[/^[0-9]+$/]|min_length[10]|max_length[10]", array("required" => "This Field Is Required", "min_length" => "Minimum 10 character allow", "max_length" => "Maximum 10 character allow"));
            $this->form_validation->set_rules("email", "", "required|valid_email", array("required" => "This Field Is Required", "valid_email" => "Enter Valid Email"));
            if ($this->form_validation->run() == TRUE) {
                $name = strtolower($this->input->post("name"));
                $wh["email"] = $this->input->post("email");
                $detail = $this->md->my_select("tbl_user", "*", $wh);
                $count = count($this->md->my_query("select * from tbl_user where email = '" . $this->input->post("email") . "' and email != '" . $detail[0]->email . "'"));
                if ($count == 0) {

                    $ins['name'] = $name;
                    $ins['contact_no'] = $this->input->post("mobile");
                    $ins['email'] = $this->input->post("email");
                    $result = $this->md->my_update("tbl_user", $ins, array("user_id" => $this->session->userdata("user_username")));
                    if ($result == 1) {
                        $data["success"] = "Detail Updated Successfully";
                        if ($this->session->userdata("change_user_detail")) {
                            $this->session->unset_userdata("change_user_detail", "");
                            redirect("Confirm-order-detail");
                        }
                    } else {

                        $data["error"] = "Somethis Is Wrong";
                    }
                } else {
                    $data["error"] = "Email Is Already Exist";
                }
            }
        }
        if ($this->input->post("edit_profile_picture")) {
            $config['file_name'] = "profile_" . $this->session->userdata("user_username");
            $config['upload_path'] = './assets/img/user/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 1024 * 4;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('user_img')) {
                $ins['profile'] = "assets/img/user/" . $this->upload->data('file_name');
                $result = $this->md->my_update('tbl_user', $ins, array("user_id" => $this->session->userdata("user_username")));

                if ($result == 1) {
                    $data['success'] = "Profile Picture Updated succesfully .";
                } else {
                    $data["error"] = "Something is wrong.";
                }
            } else {
                $data['error'] = $this->upload->display_errors();
            }
        }
        $data["user_detail"] = $this->md->my_select("tbl_user", "*", array("user_id" => $this->session->userdata("user_username")));
        $this->load->view("user_editprofile", $data);
    }

    public function delete() {
        $table = $this->uri->segment(2);
        if ($table == "shipment") {
            $wh['shipment_id'] = $this->uri->segment(3);
            $this->md->my_delete("tbl_shipment", $wh);
            redirect("User-Shipment");
        }
    }

    public function orderreview() {
        $this->security();
        $this->cart_security();
        $data = array();
        $data["cart_detail"] = $cart_detail = $this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = " . $this->session->userdata("user_username"));

        $this->load->view("order_review", $data);
    }

    public function confirmorderdetails() {
        $this->security();
        $this->cart_security();
        $data = array();

        $data["address_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,sh.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_shipment as sh where sh.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and user_id = " . $this->session->userdata("user_username"));
        $data["user_detail"] = $this->md->my_select("tbl_user", "*", array("user_id" => $this->session->userdata("user_username")));
        if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {

            $data["bill_address_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,sh.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_shipment as sh where sh.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and sh.user_id = " . $this->session->userdata("user_username") . " and sh.shipment_id = " . $this->session->userdata("delivered_address"));
        }
        $data["cart_detail"] = $cart_detail = $this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = " . $this->session->userdata("user_username"));
        $data["restaurant_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,se.* from tbl_restaurant as se,tbl_addtocart as adt,tbl_location as st,tbl_location as ct,tbl_location as ar where se.restaurant_id = adt.restaurant_id and ar.location_id =  se.location_id and ct.location_id = ar.parent_id and st.location_id = ct.parent_id and adt.user_id = " . $this->session->userdata("user_username") . " LIMIT 1");
        $this->load->view("confirm_order_detail", $data);
    }

    public function userbill() {
        $this->security();
        $data = array();
        $data["restaurant_detail"] = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,se.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_restaurant as se where se.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and se.restaurant_id = " . $this->uri->segment(3));
        $data["order_detail"] = $this->md->my_query("select tr.*,it.item_name,it.measurement,it.description,it.category_id,it.image from tbl_transaction as tr,tbl_item as it,tbl_bill as bl where tr.item_id = it.item_id and it.restaurant_id = tr.restaurant_id and bl.bill_id = tr.bill_id and tr.bill_id = " . $this->uri->segment(2) . " and tr.user_id = " . $this->session->userdata("user_username"));
        $data["bill_detail"] = $this->md->my_select("tbl_bill", "*", array("bill_id" => $this->uri->segment(2), "user_id" => $this->session->userdata("user_username")));
        $this->load->view("user_bill", $data);
    }

    public function submit_service_review()
    {
        $this->security();

        $user_id = $this->session->userdata("user_username");

        $this->form_validation->set_rules("provider_id", "", "required|numeric");
        $this->form_validation->set_rules("booking_id", "", "required|numeric");
        $this->form_validation->set_rules("provider_service_id", "", "required|numeric");
        $this->form_validation->set_rules("category_id", "", "required|numeric");
        $this->form_validation->set_rules("rating", "", "required|numeric|greater_than[0]|less_than[6]");
        $this->form_validation->set_rules("review_text", "", "required|min_length[3]|max_length[1000]");

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata("review_error", validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        $provider_id         = (int)$this->input->post("provider_id");
        $booking_id          = (int)$this->input->post("booking_id");
        $provider_service_id = (int)$this->input->post("provider_service_id");
        $category_id         = (int)$this->input->post("category_id");
        $rating              = (int)$this->input->post("rating");
        $review_text         = trim($this->input->post("review_text"));

        // 1) Check booking belongs to logged-in user and is accepted
        $booking = $this->db
            ->where("booking_id", $booking_id)
            ->where("user_id", $user_id)
            ->where("provider_id", $provider_id)
            ->where("provider_service_id", $provider_service_id)
            ->where("category_id", $category_id)
            ->where("booking_status", "accepted")
            ->get("tbl_service_bookings")
            ->row();

        if (!$booking)
        {
            $this->session->set_flashdata("review_error", "You can review only accepted booked services.");
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        // 2) Check already reviewed or not
        $already_reviewed = $this->db
            ->where("user_id", $user_id)
            ->where("provider_id", $provider_id)
            ->where("provider_service_id", $provider_service_id)
            ->where("category_id", $category_id)
            ->where("status", 1)
            ->get("tbl_service_reviews")
            ->row();

        if ($already_reviewed)
        {
            $this->session->set_flashdata("review_error", "You have already reviewed this service.");
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        // 3) Insert review
        $ins = array(
            "booking_id"          => $booking_id,
            "user_id"             => $user_id,
            "provider_id"         => $provider_id,
            "provider_service_id" => $provider_service_id,
            "category_id"         => $category_id,
            "rating"              => $rating,
            "review_text"         => $review_text,
            "status"              => 1,
            "created_at"          => date("Y-m-d H:i:s")
        );

        $this->db->insert("tbl_service_reviews", $ins);

        $this->session->set_flashdata("review_success", "Review submitted successfully.");
        redirect("Restaurant-Details/".$provider_id);
    }

}
