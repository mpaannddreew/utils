<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-09-08
 * Time: 8:32 PM
 */

namespace FannyPack\Utils\Fcm\Messages;


class NackMessage extends ControlMessage
{
    /**
     * return void
     */
    protected function setMessageType()
    {
        $this->message_type = "nack";
    }
}