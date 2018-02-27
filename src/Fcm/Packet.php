<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-06-22
 * Time: 12:09 PM
 */

namespace FannyPack\Utils\Fcm;


use FannyPack\Utils\Fcm\Messages\Payload;

class Packet
{
    /**
     * recipient registration id | topic | group id
     *
     * @var null|string
     */
    protected $to;

    /**
     * condition for recipient topics
     *
     * @var null|string
     */
    protected $condition;

    /**
     * notification payload
     *
     * @var Payload|null
     */
    protected $payload;

    /**
     * @var array
     */
    protected $packet = [];

    /**
     * Packet constructor.
     * @param string|null $registration_id
     * @param string|null $condition
     * @param Payload|null $payload
     */
    public function __construct($registration_id = null, $condition = null, Payload $payload = null)
    {
        $this->to = $registration_id;
        $this->condition = $condition;
        $this->payload = $payload;
    }

    /**
     * @return Payload|null
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param Payload|null $payload
     * @return $this
     */
    public function setPayload(Payload $payload)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * set recipient registration id | topic | group id
     *
     * @param null|string $to
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param null|string $condition
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        if ($this->payload)
            $this->packet = array_merge($this->packet, $this->payload->toArray());
        
        return $this->packet;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}