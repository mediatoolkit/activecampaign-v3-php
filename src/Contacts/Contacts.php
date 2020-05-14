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
            ->post('/api/3/contactLists', [
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
                    'contactTag' => [
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

    /**
     * List all custom fields
     * @see https://developers.activecampaign.com/v3/reference#retrieve-fields-1
     * @param array $query_params
     * @return string
     */
    public function listAllCustomFields(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/fields', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Create a custom field value
     * @see https://developers.activecampaign.com/v3/reference#create-fieldvalue
     *
     * @param int $contact_id
     * @param int $field_id
     * @param string $field_value
     * @return string
     */
    public function createCustomFieldValue(int $contact_id, int $field_id, string $field_value)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/fieldValues', [
                'json' => [
                    'fieldValue' => [
                        'contact' => $contact_id,
                        'field' => $field_id,
                        'value' => $field_value
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Retrieve a custom field value
     * @see https://developers.activecampaign.com/v3/reference#retrieve-a-fieldvalues
     *
     * @param int $field_id
     * @return string
     */
    public function retrieveCustomFieldValue(int $field_id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/fieldValues/' . $field_id);

        return $req->getBody()->getContents();
    }

    /**
     * Update a custom field value
     * @see https://developers.activecampaign.com/v3/reference#update-a-custom-field-value-for-contact
     *
     * @param int $field_value_id
     * @param int $contact_id
     * @param int $field_id
     * @param string $field_value
     * @return string
     */
    public function updateCustomFieldValue(int $field_value_id, int $contact_id, int $field_id, string $field_value)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/fieldValues/' . $field_value_id, [
                'json' => [
                    'fieldValue' => [
                        'contact' => $contact_id,
                        'field' => $field_id,
                        'value' => $field_value
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a custom field value
     * @see https://developers.activecampaign.com/v3/reference#delete-a-fieldvalue-1
     *
     * @param int $field_value_id
     * @return bool
     */
    public function deleteCustomFieldValue(int $field_value_id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/fieldValues/' . $field_value_id);

        return 200 === $req->getStatusCode();
    }

    /**
     * Remove contact from automation
     * @see https://developers.activecampaign.com/reference#delete-a-contactautomation
     * @param int $contactAutomationId
     * @return bool
     */
    public function removeAutomation(int $contactAutomationId)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/contactAutomation/' . $contactAutomationId);

        return 200 === $req->getStatusCode();
    }

}
