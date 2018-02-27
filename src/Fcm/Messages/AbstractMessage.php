<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-09-08
 * Time: 8:19 PM
 */

namespace FannyPack\Utils\Fcm\Messages;


use FannyPack\Utils\Fcm\XmppPacket;

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
     * @var XmppPacket
     */
    protected $packet;

    /**
     * AbstractMessage constructor.
     * @param XmppPacket|null $packet
     */
    public function __construct(XmppPacket $packet = null)
    {
        $this->packet = $packet;
    }

    /**
     * @return XmppPacket
     */
    public function getPacket()
    {
        return $this->packet;
    }

    /**
     * @param XmppPacket $packet
     */
    public function setPacket(XmppPacket $packet)
    {
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