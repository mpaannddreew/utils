<?php

namespace FannyPack\Utils\Fcm\Events;


class RegistrationExpired
{
    /**
     * @var $old_fcm_registration_id
     */
    public $old_fcm_registration_id;

    /**
     * @var $new_fcm_registration_id
     */
    public $new_fcm_registration_id;

    /**
     * Create a new event instance.
     * @param $old_fcm_registration_id
     * @param $new_fcm_registration_id
     */
    public function __construct($old_fcm_registration_id, $new_fcm_registration_id)
    {
        $this->old_fcm_registration_id = $old_fcm_registration_id;
        $this->new_fcm_registration_id = $new_fcm_registration_id;
    }
}
