<?php

namespace FannyPack\Utils\Fcm\Events;


use FannyPack\Utils\Fcm\Packet;

class DeviceMessageRateExceeded
{
    /**
     * @var $fcm_registration_id
     */
    public $fcm_registration_id;

    /**
     * @var Packet|null
     */
    public $packet;

    /**
     * @var null|string
     */
    public $fcm_message_id;

    /**
     * Create a new event instance.
     *
     * @param $fcm_registration_id
     * @param Packet|null $packet
     * @param string|null $fcm_message_id
     */
    public function __construct($fcm_registration_id, Packet $packet = null, $fcm_message_id = null)
    {
        $this->fcm_registration_id = $fcm_registration_id;
        $this->packet = $packet;
        $this->fcm_message_id = $fcm_message_id;
    }
}
