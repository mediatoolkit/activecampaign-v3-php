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

    /**
     * Create a deal custom field value
     * @see https://developers.activecampaign.com/v3/reference#create-dealcustomfielddata-resource
     * 
     * @param int $deal_id
     * @param int $field_id
     * @param $field_value
     * @return string
     */
    public function createCustomFieldValue(int $deal_id, int $field_id, $field_value)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/dealCustomFieldData', [
                'json' => [
                    'dealCustomFieldDatum' => [
                        'dealId' => $deal_id,
                        'custom_field_id' => $field_id,
                        'fieldValue' => $field_value
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Retrieve a custom field value
     * @see https://developers.activecampaign.com/v3/reference#retrieve-a-dealcustomfielddata
     * @param int $custom_field_id
     * @return string
     */
    public function retrieveCustomFieldValue(int $custom_field_id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/dealCustomFieldData/' . $custom_field_id);

        return $req->getBody()->getContents();
    }

    /**
     * Update a custom field value
     * @see https://developers.activecampaign.com/v3/reference#update-a-dealcustomfielddata-resource
     *
     * @param int $custom_field_id
     * @param $field_value
     * @return string
     */
    public function updateCustomFieldValue(int $custom_field_id, $field_value)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/dealCustomFieldData/' . $custom_field_id, [
                'json' => [
                    'dealCustomFieldDatum' => [
                        'fieldValue' => $field_value
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a custom field value
     * @see https://developers.activecampaign.com/v3/reference#retrieve-a-dealcustomfielddata-resource
     *
     * @param int $custom_field_id
     * @return string
     */
    public function deleteCustomFieldValue(int $custom_field_id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/dealCustomFieldData/' . $custom_field_id);

        return $req->getBody()->getContents();
    }

    /**
     * List all custom fields
     * @see https://developers.activecampaign.com/reference#retrieve-all-dealcustomfielddata-resources
     * @param array $query_params
     * @return string
     */
    public function listAllCustomFields(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/dealCustomFieldMeta', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * List all custom field values
     * @see https://developers.activecampaign.com/reference#list-all-custom-field-values
     * @param array $query_params
     * @return string
     */
    public function listAllCustomFieldValues(array $query_params)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/dealCustomFieldData', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * List all pipelines
     * @see https://developers.activecampaign.com/reference#list-all-pipelines
     * @param array $query_params
     * @return string
     */
    public function listAllPipelines(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/dealGroups', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * List all stages
     * @see https://developers.activecampaign.com/reference#list-all-deal-stages
     * @param array $query_params
     * @return string
     */
    public function listAllStages(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/dealStages', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

}