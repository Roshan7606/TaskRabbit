<?php

class MyModel extends CI_Model
{
    public function ensure_task_booking_notification_column()
    {
        if (!$this->db->table_exists('tbl_service_bookings')) {
            return FALSE;
        }

        if ($this->db->field_exists('is_notified', 'tbl_service_bookings')) {
            return TRUE;
        }

        $this->db->query("
            ALTER TABLE `tbl_service_bookings`
            ADD COLUMN `is_notified` TINYINT(1) NOT NULL DEFAULT 0
        ");

        return $this->db->field_exists('is_notified', 'tbl_service_bookings');
    }

    public function ensure_task_booking_payment_columns()
    {
        if (!$this->db->table_exists('tbl_service_bookings')) {
            return FALSE;
        }

        $columns = array(
            'service_price' => "DECIMAL(10,2) NOT NULL DEFAULT 0",
            'payment_method' => "VARCHAR(30) NOT NULL DEFAULT 'cod'",
            'payment_status' => "VARCHAR(30) NOT NULL DEFAULT 'pending'",
            'razorpay_order_id' => "VARCHAR(100) NULL DEFAULT NULL",
            'razorpay_payment_id' => "VARCHAR(100) NULL DEFAULT NULL",
            'razorpay_signature' => "VARCHAR(255) NULL DEFAULT NULL",
            'paid_at' => "DATETIME NULL DEFAULT NULL"
        );

        foreach ($columns as $column => $definition) {
            if (!$this->db->field_exists($column, 'tbl_service_bookings')) {
                $this->db->query("ALTER TABLE `tbl_service_bookings` ADD COLUMN `" . $column . "` " . $definition);
            }
        }

        return $this->db->field_exists('payment_method', 'tbl_service_bookings');
    }

    public function my_insert($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    public function my_select($table,$column,$where = NULL)
    {
        $this->db->select($column);
        $this->db->from($table);
        if(isset($where))
        {
            $this->db->where($where);
        }
        $recordset = $this->db->get();
        return $recordset->result();
    }
    public function my_query($query)
    {
        return $this->db->query($query)->result();
    }
    public function my_delete($table,$where)
    {
        return $this->db->delete($table,$where);
    }
    public function my_update($table,$data,$where)
    {
        return $this->db->update($table,$data,$where);
    }

    public function get_new_task_notifications($provider_id, $limit = 20)
    {
        $provider_id = (int) $provider_id;
        $limit = (int) $limit;

        if ($provider_id <= 0) {
            return array();
        }

        if ($limit <= 0) {
            $limit = 20;
        }

        return $this->db
            ->select('b.booking_id, b.provider_id, b.provider_service_id, b.category_id, b.customer_name, b.customer_phone, b.customer_email, b.customer_address, b.customer_description, b.service_date, b.service_time, b.booking_status, b.expires_at, b.action_at, b.is_notified, c.name AS category_name')
            ->from('tbl_service_bookings b')
            ->join('tbl_category c', 'c.category_id = b.category_id', 'left')
            ->where('b.provider_id', $provider_id)
            ->where('b.is_notified', 0)
            ->where('b.booking_status', 'pending')
            ->order_by('b.booking_id', 'DESC')
            ->limit($limit)
            ->get()
            ->result_array();
    }

    public function get_all_recent_tasks($provider_id, $limit = 20)
    {
        $provider_id = (int) $provider_id;
        $limit = (int) $limit;

        if ($provider_id <= 0) {
            return array();
        }

        if ($limit <= 0) {
            $limit = 20;
        }

        return $this->db
            ->select('b.booking_id, b.provider_id, b.provider_service_id, b.category_id, b.customer_name, b.customer_phone, b.customer_email, b.customer_address, b.customer_description, b.service_date, b.service_time, b.booking_status, b.expires_at, b.action_at, b.is_notified, c.name AS category_name')
            ->from('tbl_service_bookings b')
            ->join('tbl_category c', 'c.category_id = b.category_id', 'left')
            ->where('b.provider_id', $provider_id)
            ->order_by('b.booking_id', 'DESC')
            ->limit($limit)
            ->get()
            ->result_array();
    }

    public function mark_task_notifications_as_sent($provider_id, $booking_ids = array())
    {
        $provider_id = (int) $provider_id;

        if ($provider_id <= 0 || empty($booking_ids)) {
            return FALSE;
        }

        $booking_ids = array_map('intval', $booking_ids);
        $booking_ids = array_values(array_filter($booking_ids));

        if (empty($booking_ids)) {
            return FALSE;
        }

        return $this->db
            ->where('provider_id', $provider_id)
            ->where_in('booking_id', $booking_ids)
            ->update('tbl_service_bookings', array('is_notified' => 1));
    }

    public function sendMail($subject, $msg, $receiver )
    {
        $data=array();
        $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_port' => 465,
             'smtp_user' => 'munchbox0120@gmail.com', // change it to yours
             'smtp_pass' => 'Munch@0120', // change it to yours
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
         );

            
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('munchbox0120@gmail.com'); // change it to yours
          $this->email->to($receiver);// change it to yours
          $this->email->subject($subject);
          $this->email->message($msg);
          if($this->email->send())
         {
             return 1;
         }
    }
}
