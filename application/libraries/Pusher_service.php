<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pusher_service
{
    protected $CI;
    protected $config = array();
    protected $client;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('pusher');
        $this->config = (array) $this->CI->config->item('pusher');
    }

    public function is_enabled()
    {
        return !empty($this->config['enabled'])
            && !empty($this->config['app_id'])
            && !empty($this->config['key'])
            && !empty($this->config['secret'])
            && !empty($this->config['cluster']);
    }

    public function trigger_task_assigned($payload = array())
    {
        if (!$this->is_enabled()) {
            return false;
        }

        $client = $this->get_client();

        if (!$client) {
            return false;
        }

        $channel = !empty($this->config['channel']) ? $this->config['channel'] : 'admin-channel';
        $event = !empty($this->config['event']) ? $this->config['event'] : 'task-assigned';

        try {
            return $client->trigger($channel, $event, $payload);
        } catch (Exception $exception) {
            log_message('error', 'Pusher task-assigned trigger failed: ' . $exception->getMessage());
        }

        return false;
    }

    protected function get_client()
    {
        if ($this->client) {
            return $this->client;
        }

        $autoload_path = FCPATH . 'vendor/autoload.php';

        if (!file_exists($autoload_path)) {
            log_message('error', 'Pusher SDK not found. Run composer require pusher/pusher-php-server.');
            return false;
        }

        require_once $autoload_path;

        if (!class_exists('\Pusher\Pusher')) {
            log_message('error', 'Pusher SDK class is unavailable after autoload.');
            return false;
        }

        $options = array(
            'cluster' => $this->config['cluster'],
            'useTLS' => !empty($this->config['use_tls'])
        );

        $this->client = new \Pusher\Pusher(
            $this->config['key'],
            $this->config['secret'],
            $this->config['app_id'],
            $options
        );

        return $this->client;
    }
}
