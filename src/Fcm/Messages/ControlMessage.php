<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-09-08
 * Time: 8:25 PM
 */

namespace FannyPack\Utils\Fcm\Messages;


use FannyPack\Utils\Fcm\Packet;

abstract class ControlMessage extends AbstractMessage
{
    /**
     * @var
     */
    protected $message_type;

    /**
     * @var
     */
    protected $message_id;

    /**
     * ControlMessage constructor.
     * @param Packet|null $packet
     * @param $message_id
     */
    public function __construct(Packet $packet = null, $message_id)
    {
        $this->message_id = $message_id;
        $this->setMessageType();
        parent::__construct($packet);
    }

    /**q
     * @return void
     */
    abstract protected function setMessageType();

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $data = $this->packet->toArray();
        $data['message_id'] = $this->message_id;
        $data['message_type'] = $this->message_type;
        return $this->start . json_encode($data) . $this->end;
    }
}