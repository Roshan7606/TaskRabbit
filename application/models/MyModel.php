<?php

class MyModel extends CI_Model
{
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