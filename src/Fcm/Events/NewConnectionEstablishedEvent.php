<?php

namespace FannyPack\Utils\Fcm\Events;

class NewConnectionEstablishedEvent
{
    /**
     * @var $jid
     */
    public $jid;

    /**
     * Create a new event instance.
     *
     * @param $jid
     */
    public function __construct($jid)
    {
        $this->jid = $jid;
    }
}
