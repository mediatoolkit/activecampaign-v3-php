<?php

namespace Mediatoolkit\ActiveCampaign\Lists;


use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Lists
 * @package Mediatoolkit\ActiveCampaign\Lists
 * @see https://developers.activecampaign.com/reference#lists
 */
class Lists extends Resource
{

    /**
     * Create a list
     * @see https://developers.activecampaign.com/reference#create-new-list
     * @param array $list
     * @return string
     */
    public function create(array $list)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/lists', [
                'json' => [
                    'list' => $list
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Retrieve all lists or a list when id is not null
     * @see https://developers.activecampaign.com/reference#retrieve-a-list
     * @param null $id
     * @param array $query_params
     * @return string
     */
    public function retrieve($id = null, array $query_params = [])
    {
        $uri = '/api/3/lists';
        if (!is_null($id)) {
            $uri .= '/' . $id;
        }
        $req = $this->client
            ->getClient()
            ->get($uri,  [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a list
     * @see https://developers.activecampaign.com/reference#delete-a-list
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/lists/' . $id);

        return $req->getBody()->getContents();
    }

}