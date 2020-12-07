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
     * @param string $name
     * @param string $description
     * @return string
     */
    public function create(string $name, string $description = null)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/tags', [
                'json' => [
                    'tag' => [
                        'tag' => $name,
                        'description' => $description,
                        'tagType' => 'contact',
                    ]
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * @param string $name
     * @param string $description
     * @return int
     */
    public function findOrCreate(string $name, string $description = null) : int
    {
        $tagId = $this->find($name);
        if ( $tagId !== 0 ) {
            return $tagId;
        }
        $createdTag = $this->create($name, $description);
        $createdTag = json_decode($createdTag);
        return $createdTag->tag->id;
    }

    /**
     * @param string $name
     * @return int
     */
    public function find(string $name) : int
    {
        $allTags = $this->listAll();
        $allTags = json_decode($allTags);
        $allTags = $allTags->tags;

        foreach($allTags as $tag) {
            if (0 === strcasecmp($tag->tag, $name)) {
                return $tag->id;
            }
        }
        return 0;
    }

    /**
     * List all tags
     * @see https://developers.activecampaign.com/reference#retrieve-all-tags
     * @param array $query_params
     * @return string
     */
    public function listAll(array $query_params = [])
    {
        $query_params = array_merge($query_params, ['limit' => '20000']);
        $req = $this->client
            ->getClient()
            ->get('/api/3/tags', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

}
