<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2018-02-27
 * Time: 5:32 PM
 */

namespace FannyPack\Utils\Fcm;


use FannyPack\Utils\Fcm\Messages\Payload;

class HttpPacket extends Packet
{
    /**
     * recipient registration ids
     *
     * @var array
     */
    protected $registration_ids = [];

    /**
     * Packet constructor.
     * @param string|null $registration_id
     * @param array $registration_ids
     * @param string|null $condition
     * @param Payload|null $payload
     */
    public function __construct($registration_id = null, $registration_ids = [], $condition = null, Payload $payload = null)
    {
        $this->registration_ids = $registration_ids;
        parent::__construct($registration_id, $condition, $payload);
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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        if ($this->to && $this->registration_ids && $this->condition)
        {
            $this->packet['registration_ids'] = $this->registration_ids;
        }elseif ($this->to && $this->registration_ids)
        {
            $this->packet['registration_ids'] = $this->registration_ids;
        }elseif ($this->registration_ids && $this->condition)
        {
            $this->packet['registration_ids'] = $this->registration_ids;
        }elseif ($this->to && $this->condition)
        {
            $this->packet['condition'] = $this->condition;
        }elseif($this->to)
        {
            $this->packet['to'] = $this->to;
        }elseif($this->registration_ids)
        {
            $this->packet['registration_ids'] = $this->registration_ids;
        }elseif ($this->condition)
        {
            $this->packet['condition'] = $this->condition;
        }

        return parent::toArray();
    }
}