<?php

namespace FannyPack\Utils\Fcm\Events;


class AbstractError
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
     * @var $error
     */
    public $error;

    /**
     * Create a new event instance.
     *
     * @param $error
     * @param $fcm_registration_id
     * @param $error_description
     */
    public function __construct($error, $fcm_registration_id, $error_description)
    {
        $this->error = $error;
        $this->fcm_registration_id = $fcm_registration_id;
        $this->error_description = $error_description;
    }
}
