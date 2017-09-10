<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-09-08
 * Time: 8:19 PM
 */

namespace FannyPack\Utils\Fcm\Messages;


use FannyPack\Utils\Fcm\Packet;

abstract class AbstractMessage
{
    /**
     * @var string
     */
    protected $start = '<message><gcm xmlns="google:mobile:data">';

    /**
     * @var string
     */
    protected $end = '</gcm></message>';

    /**
     * @var Packet
     */
    protected $packet;

    /**
     * AbstractMessage constructor.
     * @param Packet|null $packet
     */
    public function __construct(Packet $packet = null)
    {
        $this->checkPacket($packet);
        $this->packet = $packet;
    }

    /**
     * @param Packet|null $packet
     */
    protected function checkPacket(Packet $packet = null)
    {
        if ($packet)
            if ($packet->getPipeline() != Packet::XMPP_PIPELINE)
                throw new \InvalidArgumentException('Packet should be of xmpp pipeline');
    }

    /**
     * @return Packet
     */
    public function getPacket()
    {
        return $this->packet;
    }

    /**
     * @param Packet $packet
     */
    public function setPacket(Packet $packet)
    {
        $this->checkPacket($packet);
        $this->packet = $packet;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->start . $this->packet . $this->end;
    }
}