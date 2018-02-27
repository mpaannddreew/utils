<?php

namespace FannyPack\Utils\Fcm\Events;


use FannyPack\Utils\Fcm\HttpPacket;

class UnavailableError
{
    /**
     * @var $fcm_registration_id
     */
    public $fcm_registration_id;

    /**
     * @var HttpPacket
     */
    public $packet;

    /**
     * Create a new event instance.
     *
     * @param $fcm_registration_id
     * @param HttpPacket $packet
     */
    public function __construct($fcm_registration_id, HttpPacket $packet)
    {
        $this->fcm_registration_id = $fcm_registration_id;
        $this->packet = $packet;
        $this->packet->setRegistrationIds([$this->fcm_registration_id]);
    }
}
