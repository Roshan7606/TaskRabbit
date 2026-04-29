<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['pusher'] = array(
    'enabled' => false,
    'app_id' => 'YOUR_PUSHER_APP_ID',
    'key' => 'YOUR_PUSHER_APP_KEY',
    'secret' => 'YOUR_PUSHER_APP_SECRET',
    'cluster' => 'ap2',
    'use_tls' => true,
    'channel' => 'admin-channel',
    'event' => 'task-assigned'
);
