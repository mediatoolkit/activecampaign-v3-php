<?php

namespace Mediatoolkit\ActiveCampaign\Tags;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Tags
 * @package Mediatoolkit\ActiveCampaign\Tags
 * @see https://developers.activecampaign.com/reference#tags
 */
class Tags extends Resource
{

    /**
     * List all tags
     * @see https://developers.activecampaign.com/reference#retrieve-all-tags
     * @return string
     */
    public function listAll()
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/tags');

        return $req->getBody()->getContents();
    }

}