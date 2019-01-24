<?php

namespace Mediatoolkit\ActiveCampaign\Deals;


use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Deals
 * @package Mediatoolkit\ActiveCampaign\Deals
 * @see https://developers.activecampaign.com/reference#deal
 */
class Deals extends Resource
{

    /**
     * Create a deal
     * @see https://developers.activecampaign.com/reference#create-a-deal
     *
     * @param array $deal
     * @return string
     */
    public function create(array $deal)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/deals', [
                'json' => [
                    'deal' => $deal
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Get a deal by id
     * @see https://developers.activecampaign.com/reference#retrieve-a-deal
     *
     * @param int $id
     * @return string
     */
    public function get(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/deals/' . $id);

        return $req->getBody()->getContents();
    }

    /**
     * Update a deal
     * @see https://developers.activecampaign.com/reference#update-a-deal
     *
     * @param int $id
     * @param array $deal
     * @return string
     */
    public function update(int $id, array $deal)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/deals/' . $id, [
                'json' => [
                    'deal' => $deal
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a deal by id
     * @see https://developers.activecampaign.com/reference#delete-a-deal
     *
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/deals/' . $id);

        return $req->getBody()->getContents();
    }

    /**
     * Move deals to another stage
     * @see https://developers.activecampaign.com/reference#move-deals-to-another-deal-stage
     *
     * @param int $id
     * @param array $deal
     * @return string
     */
    public function moveToStage(int $id, array $deal)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/dealStages/' . $id . '/deals', [
                'json' => [
                    'deal' => $deal
                ]
            ]);

        return $req->getBody()->getContents();
    }

}