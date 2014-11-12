<?php
/**
 * Created by PhpStorm.
 * User: Athos
 * Date: 12-11-2014
 * Time: 12:23
 */

namespace AD9001\Netcode;


class Api {

    private $_baseUrl = "http:://vindinium.org/api/";

    private $_apiKey;

    private $_token;

    public function __construct($apiKey)
    {
        $this->_apiKey = $apiKey;
    }

    public function start($mode, $turns = 300, $map = "")
    {
        $mode = strtolower($mode);

        if ( ! in_array($mode, array("arena", "training")))
            throw new \Exception("Invalid mod $mode");
        $request = Request::factory("POST", $this->_baseUrl.$mode);


        $request -> setData(array(
            "key"   => $this->_apiKey,
            "turns" => $turns,
            "map"   => $map,
        ));

        $response = $request->send();

        if ($response->getStatusCode() != 200)
            throw new \Exception("Got status code".$response->getStatusCode());

        $this->_baseUrl = $response->getContent()->viewUrl;
        $this->_token = $response->getContent()->token; 

        return $response;
    }

}
