<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 2017-09-17
 * Time: 3:06 PM
 */

namespace FannyPack\Utils\Fcm;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

class Response implements Arrayable, Jsonable, JsonSerializable
{
    /**
     * @var $multicast_id
     */
    protected $multicast_id;

    /**
     * @var $success
     */
    protected $success;

    /**
     * @var $failure
     */
    protected $failure;

    /**
     * @var $canonical_ids
     */
    protected $canonical_ids;

    /**
     * @var array $results
     */
    protected $results = [];

    /**
     * @var mixed
     */
    protected $contents;

    /**
     * Response constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->contents = json_decode($response->getBody()->getContents());
        $this->setValues();
    }

    /**
     * map response values
     */
    protected function setValues()
    {
        $this->canonical_ids = (int)$this->contents->canonical_ids;
        $this->success = (int)$this->contents->success;
        $this->failure = (int)$this->contents->failure;
        $this->results = (array)$this->contents->results;
    }

    /**
     * @return mixed
     */
    public function getMulticastId()
    {
        return $this->multicast_id;
    }

    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return mixed
     */
    public function getFailure()
    {
        return $this->failure;
    }

    /**
     * @return mixed
     */
    public function getCanonicalIds()
    {
        return $this->canonical_ids;
    }

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return (array)$this->contents;
    }

    /**
     * Specify data which should be serialized to JSON
     * @return array
     */
    function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}