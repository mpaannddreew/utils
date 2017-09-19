<?php

namespace FannyPack\Utils\Fcm\Events;


class DeviceMessageRateExceeded
{
    /**
     * @var $fcm_registration_id
     */
    public $fcm_registration_id;

    /**
     * Create a new event instance.
     *
     * @param $fcm_registration_id
     */
    public function __construct($fcm_registration_id)
    {
        $this->fcm_registration_id = $fcm_registration_id;
    }
}
