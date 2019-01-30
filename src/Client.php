<?php

namespace Mediatoolkit\ActiveCampaign;

class Client
{

    const HEADER_AUTH_KEY = 'Api-Token';

    const LIB_USER_AGENT = 'activecampaign-v3-php/1.0';

    const API_VERSION_URL = '/api/3';

    const EVENT_TRACKING_URL = 'https://trackcmp.net/event';

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
     * Event Tracking ACTID
     * Get yours from Settings > Tracking > Event Tracking > Event Tracking API
     * @var string
     */
    protected $event_tracking_actid;

    /**
     * Event Tracking Key
     * Get yours from Settings > Tracking > Event Tracking > Event Key
     * @var string
     */
    protected $event_tracking_key;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var \GuzzleHttp\Client
     */
    private $event_tracking_client;

    public function __construct($api_url, $api_token, $event_tracking_actid = null, $event_tracking_key = null)
    {
        $this->api_url = $api_url;
        $this->api_token = $api_token;
        $this->event_tracking_actid = $event_tracking_actid;
        $this->event_tracking_key = $event_tracking_key;

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->api_url,
            'headers' => [
                'User-Agent' => self::LIB_USER_AGENT,
                self::HEADER_AUTH_KEY => $this->api_token,
                'Accept' => 'application/json'
            ]
        ]);

        if (!is_null($this->event_tracking_actid) && !is_null($this->event_tracking_key)) {
            $this->event_tracking_client = new \GuzzleHttp\Client([
                'base_uri' => self::EVENT_TRACKING_URL,
                'headers' => [
                    'User-Agent' => self::LIB_USER_AGENT,
                    'Accept' => 'application/json'
                ],
                'form_params' => [
                    'actid' => $this->event_tracking_actid,
                    'key' => $this->event_tracking_key
                ]
            ]);
        }
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return \GuzzleHttp\Client|null
     */
    public function getEventTrackingClient()
    {
        if (is_null($this->event_tracking_actid)) {
            return null;
        }
        return $this->event_tracking_client;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->api_url;
    }

    /**
     * @return string
     */
    public function getApiToken()
    {
        return $this->api_token;
    }

    /**
     * @return string|null
     */
    public function getEventTrackingActid()
    {
        return $this->event_tracking_actid;
    }

}