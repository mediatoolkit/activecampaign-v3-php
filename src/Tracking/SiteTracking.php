<?php

namespace Mediatoolkit\ActiveCampaign\Tracking;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class SiteTracking
 * @package Mediatoolkit\ActiveCampaign\Tracking
 * @see https://developers.activecampaign.com/reference#site-tracking
 */
class SiteTracking extends Resource
{

    /**
     * Add a domain to the site tracking whitelist
     * @see https://developers.activecampaign.com/reference#add-domain-to-whitelist
     *
     * @param string $domain_name
     * @return string
     */
    public function addDomain($domain_name)
    {
        $req = $this->client
            ->getClient()
            ->post('api/3/siteTrackingDomains', [
                'json' => [
                    'siteTrackingDomain' => [
                        'name' => $domain_name
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }


    /**
     * Get site tracking code (javascript snippet)
     * @see https://developers.activecampaign.com/reference#retrieve-site-tracking-code
     *
     * @param array $query_params
     * @return string
     */
    public function retrieveSiteTrackingCode(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('api/3/siteTracking/code', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }


    /**
     * Get site tracking status (enabled or disabled)
     * @see https://developers.activecampaign.com/reference#retrieve-site-tracking-status
     *
     * @param array $query_params
     * @return string
     */
    public function retrieveStatus(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('api/3/siteTracking', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }


    /**
     * Enable or disable site tracking
     * @see https://developers.activecampaign.com/reference#enable-disable-site-tracking
     *
     * @param boolean $enabled
     * @return string
     */
    public function setTrackingStatus($enabled = true)
    {
        $req = $this->client
            ->getClient()
            ->put('api/3/siteTracking', [
                'json' => [
                    'siteTracking' => [
                        'enabled' => $enabled === true ? true : false
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }


    /**
     * Remove a domain from the site tracking whitelist
     * @see https://developers.activecampaign.com/reference#remove-domain-from-whitelist
     *
     * @param string $domain_name
     * @return string
     */
    public function removeDomain($domain_name)
    {
        $req = $this->client
            ->getClient()
            ->delete('api/3/siteTrackingDomains/' . $domain_name);

        return 200 === $req->getStatusCode();
    }


    /**
     * List of all whitelisted site tracking domains
     * @see https://developers.activecampaign.com/reference#list-all-whitelisted-domains
     *
     * @param array $query_params
     * @return string
     */
    public function listAllDomains(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('api/3/siteTrackingDomains', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

}