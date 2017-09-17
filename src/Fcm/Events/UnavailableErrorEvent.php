<?php

namespace FannyPack\Utils\Fcm\Events;


use FannyPack\Utils\Fcm\Packet;

class UnavailableErrorEvent
{
    /**
     * @var $fcm_registration_id
     */
    public $fcm_registration_id;

    /**
     * @var Packet
     */
    public $packet;

    /**
     * Create a new event instance.
     *
     * @param $fcm_registration_id
     * @param Packet $packet
     */
    public function __construct($fcm_registration_id, Packet $packet)
    {
        $this->fcm_registration_id = $fcm_registration_id;
        $this->packet = $packet;
        $this->packet->setRegistrationIds([$this->fcm_registration_id]);
    }
}
