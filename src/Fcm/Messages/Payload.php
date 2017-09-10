<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-06-21
 * Time: 9:17 PM
 */

namespace FannyPack\Utils\Fcm\Messages;


class Payload
{
    const PRIORITY_NORMAL = 'normal';
    const PRIORITY_HIGH = 'high';
    const PRIORITY_NONE = '';

    /**
     * The title of the notification.
     *
     * @var string
     */
    protected $title;

    /**
     * The message of the notification.
     *
     * @var string
     */
    protected $message;

    /**
     * notification payload
     * 
     * @var array
     */
    protected $notification = [];

    /**
     * data payload
     * 
     * @var array
     */
    protected $data = [];

    /**
     * @var null|string
     */
    protected $collapse_key;

    /**
     * @var string
     */
    protected $priority = self::PRIORITY_NORMAL;

    /**
     * @var null|string
     */
    protected $time_to_live;

    /**
     * @param string|null $title
     * @param string|null $message
     * @param array $data
     * @param string $priority
     * @param string|null $collapse_key
     * @param string|null $time_to_live
     */
    public function __construct($title = null, $message = null, $data = [], $priority = self::PRIORITY_NONE, $collapse_key = null, $time_to_live = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->data = $data;
        $this->priority = $priority;
        $this->collapse_key = $collapse_key;
        $this->time_to_live = $time_to_live;
        $this->notification();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Payload
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this->notification();
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Payload
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this->notification();
    }

    /**
     * create notification payload.
     *
     * @return $this
     */
    protected function notification()
    {
        $this->notification = [
            'body' => $this->message,
            'title' => $this->title
        ];

        return $this;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTimeToLive()
    {
        return $this->time_to_live;
    }

    /**
     * @param null|string $time_to_live
     * @return $this
     */
    public function setTimeToLive($time_to_live)
    {
        $this->time_to_live = $time_to_live;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCollapseKey()
    {
        return $this->collapse_key;
    }

    /**
     * @param null|string $collapse_key
     * @return $this
     */
    public function setCollapseKey($collapse_key)
    {
        $this->collapse_key = $collapse_key;

        return $this;
    }

    /**
     * Add data to the notification.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return $this
     */
    public function data($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * Override the data of the notification.
     *
     * @param array $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $message = [];
        if ($this->title && $this->message)
            if ($this->notification)
                $message['notification'] = $this->notification;
        
        if ($this->data) 
            $message['data'] = $this->data;
        
        if ($this->collapse_key) 
            $message['collapse_key'] = $this->collapse_key;
        
        if ($this->priority) 
            $message['priority'] = $this->priority;

        if ($this->time_to_live)
            $message['time_to_live'] = $this->time_to_live;
        
        return $message;
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