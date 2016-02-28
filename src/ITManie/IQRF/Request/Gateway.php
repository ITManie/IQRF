<?php

namespace ITManie\IQRF\Request;

use ITManie\IQRF\IQRF,
    ITManie\IQRF\Config,
    ITManie\IQRF\Utils,
    GuzzleHttp\Client;

class Gateway {

    /**
     * Add new gateway
     * @param int $gatewayID Gateway ID
     * @param string $gatewayPW Gateway password
     */
    public function add($gatewayID, $gatewayPW) {
        $parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() .
                '&gid=' . $gatewayID . '&gpw=' . $gatewayPW . '&cmd=add';
        $signature = Utils::createSignature($parameter, Config::getApiKey());
        $parameter += '&signature=' . $signature;
        $client = new Client(['base_uri' => IQRF::API_URI]);
        $response = $client->request('GET', $parameter);
        return $response;
    }

    /**
     * Remove gateway
     * @param int $gatewayID Gateway ID
     */
    public function remove($gatewayID) {
        $parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() .
                '&gid=' . $gatewayID . '&cmd=rem';
        $signature = Utils::createSignature($parameter, Config::getApiKey());
        $parameter += '&signature=' . $signature;
        $client = new Client(['base_uri' => IQRF::API_URI]);
        $response = $client->request('GET', $parameter);
        return $response;
    }

    /**
     * Edit gateway
     * @param int $gatewayID Gateway ID
     * @param string $gatewayAlias Gateway alias
     */
    public function edit($gatewayID, $gatewayAlias) {
        $parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() .
                '&gid=' . $gatewayID . '&cmd=edit&alias=' . $gatewayAlias;
        $signature = Utils::createSignature($parameter, Config::getApiKey());
        $parameter += '&signature=' . $signature;
        $client = new Client(['base_uri' => IQRF::API_URI]);
        $response = $client->request('GET', $parameter);
        return $response;
    }

    /**
     * Get list of gateways
     */
    public function getList() {
        $parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() . '&cmd=list';
        $signature = Utils::createSignature($parameter, Config::getApiKey());
        $parameter += '&signature=' . $signature;
        $client = new Client(['base_uri' => IQRF::API_URI]);
        $response = $client->request('GET', $parameter);
        return $response;
    }

    /**
     * Get gateway info
     * @param int $gatewayID Gateway ID
     */
    public function getInfo($gatewayID) {
        $parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() .
                '&gid=' . $gatewayID . '&cmd=info';
        $signature = Utils::createSignature($parameter, Config::getApiKey());
        $parameter += '&signature=' . $signature;
        $client = new Client(['base_uri' => IQRF::API_URI]);
        $response = $client->request('GET', $parameter);
        return $response;
    }

}
