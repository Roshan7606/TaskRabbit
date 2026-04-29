<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskProviderController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('MyModel', 'md');
    }

    private function json_response($payload, $status_code = 200)
    {
        $this->output
            ->set_status_header($status_code)
            ->set_content_type('application/json')
            ->set_output(json_encode($payload));
    }

    public function get_new_tasks_notifications()
    {
        $provider_id = (int) $this->session->userdata('seller_email');

        if ($provider_id <= 0) {
            return $this->json_response(array(
                'status' => FALSE,
                'message' => 'Unauthorized access.',
                'new_tasks_count' => 0,
                'tasks' => array()
            ), 401);
        }

        $this->md->ensure_task_booking_notification_column();

        $this->db->trans_start();
        $new_tasks = $this->md->get_new_task_notifications($provider_id);
        $booking_ids = array();

        if (!empty($new_tasks)) {
            foreach ($new_tasks as $task) {
                $booking_ids[] = (int) $task['booking_id'];
            }

            $this->md->mark_task_notifications_as_sent($provider_id, $booking_ids);
        }

        $tasks = $this->md->get_all_recent_tasks($provider_id);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return $this->json_response(array(
                'status' => FALSE,
                'message' => 'Unable to fetch notifications right now.',
                'new_tasks_count' => 0,
                'tasks' => array()
            ), 500);
        }

        foreach ($tasks as &$task) {
            $task['booking_requests_url'] = base_url('Restaurant-Booking-Requests');
            $task['accept_url'] = base_url('Restaurant-Accept-Booking/' . $task['booking_id']);
            $task['reject_url'] = base_url('Restaurant-Reject-Booking/' . $task['booking_id']);
        }
        unset($task);

        return $this->json_response(array(
            'status' => TRUE,
            'new_tasks_count' => count($new_tasks),
            'tasks' => $tasks
        ));
    }
}
