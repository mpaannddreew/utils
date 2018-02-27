<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2018-02-27
 * Time: 5:37 PM
 */

namespace FannyPack\Utils\Fcm;


use FannyPack\Utils\Fcm\Messages\Payload;

class XmppPacket extends Packet
{
    /**
     * @var
     */
    protected $message_id;

    /**
     * @var bool
     */
    protected $delivery_receipt_requested = false;

    /**
     * Packet constructor.
     * @param string|null $registration_id
     * @param string|null $condition
     * @param Payload|null $payload
     */
    public function __construct($registration_id = null, $condition = null, Payload $payload = null)
    {
        $this->message_id = $this->generateMessageId();
        parent::__construct($registration_id, $condition, $payload);
    }

    /**
     * request delivery receipt
     * @return $this
     */
    public function requestDeliveryReceipt()
    {
        $this->delivery_receipt_requested = true;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * @return bool|string
     */
    protected function generateMessageId()
    {
        $char_id = strtoupper(md5(uniqid(rand(), true)));
        $message_id =  substr($char_id, 20, 12);
        return $message_id;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        if ($this->to && $this->condition)
        {
            $this->packet['condition'] = $this->condition;
        }elseif($this->to)
        {
            $this->packet['to'] = $this->to;
        }elseif($this->condition)
        {
            $this->packet['condition'] = $this->condition;
        }

        if ($this->message_id)
            $this->packet['message_id'] = $this->message_id;

        if ($this->delivery_receipt_requested)
            $this->packet['delivery_receipt_requested'] = true;

        return parent::toArray();
    }
}