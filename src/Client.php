<?php

namespace Mediatoolkit\ActiveCampaign;

class Client
{

    const HEADER_AUTH_KEY = 'Api-Token';

    const LIB_USER_AGENT = 'activecampaign-v3-php/1.0';

    const API_VERSION_URL = '/api/3';

    /**
     * ActiveCampaign API URL.
     * Format is https://YOUR_ACCOUNT_NAME.api-us1.com
     * @var string
     */
    protected $api_url;

    /**
     * ActiveCampaign API token
     * Get yours from developer settings.
     * @var string
     */
    protected $api_token;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    public function __construct($api_url, $api_token)
    {
        $this->api_url = $api_url;
        $this->api_token = $api_token;

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->api_url,
            'headers' => [
                'User-Agent' => self::LIB_USER_AGENT,
                self::HEADER_AUTH_KEY => $this->api_token,
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getApiUrl()
    {
        return $this->api_url;
    }

    public function getApiToken()
    {
        return $this->api_token;
    }

}