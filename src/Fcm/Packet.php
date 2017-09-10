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
    const HTTP_PIPELINE = 'http';
    const XMPP_PIPELINE = 'xmpp';

    /**
     * recipient registration ids
     *
     * @var array
     */
    protected $registration_ids = [];

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
     * fcm connection server protocol
     *
     * @var string
     */
    protected $pipeline = self::HTTP_PIPELINE;

    /**
     * @var
     */
    protected $message_id;

    /**
     * Packet constructor.
     * @param string $pipeline
     * @param string|null $registration_id
     * @param array $registration_ids
     * @param string|null $condition
     * @param Payload|null $payload
     */
    public function __construct($pipeline = self::HTTP_PIPELINE, $registration_id = null, $registration_ids = [], $condition = null, Payload $payload = null)
    {
        $this->pipeline = $pipeline;
        $this->to = $registration_id;
        $this->registration_ids = $registration_ids;
        $this->condition = $condition;
        $this->payload = $payload;
        if ($this->pipeline == self::XMPP_PIPELINE)
            $this->message_id = $this->generateMessageId();
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
     * @return array
     */
    public function getRegistrationIds()
    {
        return $this->registration_ids;
    }

    /**
     * @param array $registration_ids
     * @return $this
     */
    public function setRegistrationIds($registration_ids)
    {
        $this->registration_ids = $registration_ids;

        return $this;
    }

    /**
     * add registration_id to recipient array
     *
     * @param $registration_id
     * @return $this
     */
    public function addRegistrationId($registration_id)
    {
        $this->registration_ids[] = $registration_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPipeline()
    {
        return $this->pipeline;
    }

    /**
     * @param string $pipeline
     * @return $this
     */
    public function setPipeline($pipeline)
    {
        $this->pipeline = $pipeline;
        if ($this->pipeline == self::XMPP_PIPELINE)
            if (!$this->message_id)
                $this->message_id = $this->generateMessageId();

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
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->message_id;
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $packet = [];
        if ($this->pipeline == self::XMPP_PIPELINE)
        {
            if ($this->to && $this->condition)
            {
                $packet['condition'] = $this->condition;
            }elseif($this->to)
            {
                $packet['to'] = $this->to;
            }elseif($this->condition)
            {
                $packet['condition'] = $this->condition;
            }

            if ($this->message_id)
                $packet['message_id'] = $this->message_id;
        }else
        {
            if ($this->to && $this->registration_ids && $this->condition)
            {
                $packet['registration_ids'] = $this->registration_ids;
            }elseif ($this->to && $this->registration_ids)
            {
                $packet['registration_ids'] = $this->registration_ids;
            }elseif ($this->registration_ids && $this->condition)
            {
                $packet['registration_ids'] = $this->registration_ids;
            }elseif ($this->to && $this->condition)
            {
                $packet['condition'] = $this->condition;
            }elseif($this->to)
            {
                $packet['to'] = $this->to;
            }elseif($this->registration_ids)
            {
                $packet['registration_ids'] = $this->registration_ids;
            }
        }

        if ($this->payload)
            $packet = array_merge($packet, $this->payload->toArray());
        
        return $packet;
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

    /**
     * @return bool|string
     */
    protected function generateMessageId()
    {
        $char_id = strtoupper(md5(uniqid(rand(), true)));
        $message_id =  substr($char_id, 20, 12);
        return $message_id;
    }
}