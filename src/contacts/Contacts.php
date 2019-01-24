<?php

namespace Mediatoolkit\ActiveCampaign\Contacts;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Contacts
 * @package Mediatoolkit\ActiveCampaign\Contacts
 * @see https://developers.activecampaign.com/reference#contact
 */
class Contacts extends Resource
{

    /**
     * Create a contact
     * @see https://developers.activecampaign.com/reference#create-contact
     *
     * @param array $contact
     * @return string
     */
    public function create(array $contact)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/contacts', [
                'json' => [
                    'contact' => $contact
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Create or update contact
     * @see https://developers.activecampaign.com/reference#create-contact-sync
     *
     * @param array $contact
     * @return string
     */
    public function sync(array $contact)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/contact/sync', [
                'json' => [
                    'contact' => $contact
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Get contact
     * @see https://developers.activecampaign.com/reference#get-contact
     *
     * @param int $id
     * @return string
     */
    public function get(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/contacts/' . $id);

        return $req->getBody()->getContents();
    }

    /**
     * Update list status for a contact
     * @see https://developers.activecampaign.com/reference#update-list-status-for-contact
     *
     * @param array $contact_list
     * @return string
     */
    public function updateListStatus(array $contact_list)
    {
        $req = $this->client
            ->getClient()
            ->post('', [
                'json' => [
                    'contactList' => $contact_list
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Update a contact
     * @see https://developers.activecampaign.com/reference#update-a-contact
     *
     * @param int $id
     * @param array $contact
     * @return string
     */
    public function update(int $id, array $contact)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/contacts/' . $id, [
                'json' => [
                    'contact' => $contact
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a contact
     * @see https://developers.activecampaign.com/reference#delete-contact
     *
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/contacts/' . $id);

        return 200 === $req->getStatusCode();
    }

    /**
     * List all automations the contact is in
     * @see https://developers.activecampaign.com/reference#list-all-contactautomations-for-contact
     *
     * @param int $id
     * @return string
     */
    public function listAutomations(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/contacts/' . $id . '/contactAutomations');

        return $req->getBody()->getContents();
    }

    /**
     * Add a tag to contact
     * @see https://developers.activecampaign.com/reference#create-contact-tag
     *
     * @param int $id
     * @param int $tag_id
     * @return string
     */
    public function tag(int $id, int $tag_id)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/contactTags', [
                'json' => [
                    "contactTag" => [
                        'contact' => $id,
                        'tag' => $tag_id
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Remove a tag from a contact
     * @see https://developers.activecampaign.com/reference#delete-contact-tag
     *
     * @param int $contact_tag_id
     * @return string
     */
    public function untag(int $contact_tag_id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/contactTags/' . $contact_tag_id);

        return $req->getBody()->getContents();
    }

    /**
     * List all contacts
     * @see https://developers.activecampaign.com/reference#list-all-contacts
     *
     * @param array $query_params
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public function listAll(array $query_params = [], int $limit = 20, int $offset = 0)
    {
        $query_params = array_merge($query_params, [
            'limit' => $limit,
            'offset' => $offset
        ]);

        $req = $this->client
            ->getClient()
            ->get('/api/3/contacts', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

}