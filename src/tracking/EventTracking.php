<?php

namespace Mediatoolkit\ActiveCampaign\Tracking;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class EventTracking
 * @package Mediatoolkit\ActiveCampaign\Tracking
 * @see https://developers.activecampaign.com/reference#event-tracking
 */
class EventTracking extends Resource
{

    /**
     * Retrieve status
     * @see https://developers.activecampaign.com/reference#retrieve-event-tracking-status
     * @return string
     */
    public function retrieveStatus()
    {
        $req = $this->client
            ->getClient()
            ->get('api/3/eventTracking');

        return $req->getBody()->getContents();
    }
    
}