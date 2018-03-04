<?php

namespace FannyPack\Utils\Fcm\Events;


class MessageReceived
{
    /**
     * @var $mData
     */
    public $mData = [];

    /**
     * Create a new event instance.
     *
     * @param $mData
     */
    public function __construct($mData)
    {
        $this->mData = $mData;
    }
}
