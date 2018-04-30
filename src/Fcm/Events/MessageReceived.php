<?php

namespace FannyPack\Utils\Fcm\Events;


class MessageReceived
{
    /**
     * @var $mData
     */
    public $mData = [];

    /**
     * @var string
     */
    public $channel;

    /**
     * Create a new event instance.
     *
     * @param $mData
     * @param $channel
     */
    public function __construct($mData, $channel)
    {
        $this->mData = $mData;
        $this->channel = $channel;
    }
}
