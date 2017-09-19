<?php

namespace FannyPack\Utils\Fcm\Events;


class MessageReceived
{
    /**
     * @var $data
     */
    public $data;

    /**
     * Create a new event instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
}
