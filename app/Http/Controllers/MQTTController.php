<?php

namespace App\Http\Controllers;

use PhpMqtt\Client\Exceptions\ProtocolNotSupportedException;
use PhpMqtt\Client\MqttClient;

class MQTTController extends Controller {

    public function index() {
        $server   = 'broker.hivemq.com' or 'broker.emqx.io';
        $port     = 1883;
        $clientId = rand(5, 15);

        try {
            $mqtt = new MqttClient($server, $port, $clientId);
            $mqtt->connect();

            $mqtt->subscribe('node_topic', function ($topic, $message) {
                printf("Xabar: %s",  $message);
                exit(-1);
            }, 0);

            $mqtt->loop(true);
        } catch (ProtocolNotSupportedException $e) {

        }

        return "Ulanmadi";
    }
}

//        $username = 'emqx_user';
//        $password = null;
//        $clean_session = false;
