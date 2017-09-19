<?php

namespace FannyPack\Utils\Fcm\Events;


class InvalidJson
{
    /**
     * @var $fcm_registration_id
     */
    public $fcm_registration_id;

    /**
     * @var $error_description
     */
    public $error_description;

    /**
     * Create a new event instance.
     *
     * @param $fcm_registration_id
     * @param $error_description
     */
    public function __construct($fcm_registration_id, $error_description)
    {
        $this->fcm_registration_id = $fcm_registration_id;
        $this->error_description = $error_description;
    }
}
