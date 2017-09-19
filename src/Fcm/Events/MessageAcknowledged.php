<?php

namespace FannyPack\Utils\Fcm\Events;


class MessageAcknowledged
{
    /**
     * @var $message_id
     */
    public $message_id;

    /**
     * Create a new event instance.
     *
     * @param $message_id
     */
    public function __construct($message_id)
    {
        $this->message_id = $message_id;
    }
}
