<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-09-08
 * Time: 8:31 PM
 */

namespace FannyPack\Utils\Fcm\Messages;


use FannyPack\Utils\Fcm\Packet;

class FcmMessage extends AbstractMessage
{
    /**
     * @var null|string
     */
    protected $message_id;

    /**
     * FcmMessage constructor.
     * @param Packet $packet
     * @param string|null $message_id
     */
    public function __construct(Packet $packet, $message_id = null)
    {
        $this->message_id = $message_id;
        parent::__construct($packet);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->message_id)
        {
            $data = $this->packet->toArray();
            $data['message_id'] = $this->message_id;
            return $this->start . json_encode($data) . $this->end;
        }

        return parent::__toString();
    }
}