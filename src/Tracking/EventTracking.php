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

    /**
     * Create a new event
     * @see https://developers.activecampaign.com/v3/reference#create-a-new-event-name-only
     * @param string $event_name
     * @return string
     */
    public function createEvent(string $event_name)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/eventTrackingEvents', [
                'json' => [
                    'eventTrackingEvent' => [
                        'name' => $event_name
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete event
     * @see https://developers.activecampaign.com/v3/reference#remove-event-name-only
     *
     * @param string $event_name
     * @return bool
     */
    public function deleteEvent(string $event_name)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/eventTrackingEvent/' . $event_name);

        return 200 === $req->getStatusCode();
    }

    /**
     * List all events
     * @see https://developers.activecampaign.com/v3/reference#list-all-event-types
     *
     * @param array $query_params
     * @return string
     */
    public function listAllEvents(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('api/3/eventTrackingEvents', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Enable/Disable event tracking
     * @see https://developers.activecampaign.com/v3/reference#enable-disable-event-tracking
     *
     * @param bool $enabled
     * @return string
     */
    public function toggleEventTracking(bool $enabled)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/eventTracking/', [
                'json' => [
                    'eventTracking' => [
                        'enabled' => $enabled
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * @param string $event_name
     * @param null $event_data
     * @param null $email
     * @return string
     */
    public function trackEvent(string $event_name, $event_data = null, $email = null)
    {
        $form_params = [
            'event' => $event_name
        ];

        if (!is_null($event_data)) {
            $form_params['eventdata'] = $event_data;
        }

        if (!is_null($email)) {
            $form_params['visit'] = json_encode([
                'email' => $email
            ]);
        }

        $form_params = array_merge(
            $form_params,
            $this->client->getEventTrackingClient()->getConfig('form_params')
        );

        $req = $this->client
            ->getEventTrackingClient()
            ->post('', [
                'form_params' => $form_params
            ]);

        return $req->getBody()->getContents();
    }

}