# Active Campaign v3 PHP Wrapper

Unofficial PHP Wrapper for ActiveCampaign API v3.

## Installation:
```
composer require mediatoolkit/activecampaign-v3-php
```

## Basic usage:
#### Create a client:

```php
$client = new Client(
    $api_url, 
    $api_token, 
    $event_tracking_actid, 
    $event_tracking_key
);
```

#### Select Contacts endpoint:
```php
$contacts = new Contacts($client);
```

#### Create new contact:
```php
$contact = $contacts->create([
    'email' => 'CONTACT_EMAIL',
    'firstName' => 'CONTACT_FIRST_NAME',
    'lastName' => 'CONTACT_LAST_NAME'
]);
```


## Available endpoints:
* Contacts
* Deals
* Lists
* Organizations
* EventTracking
* SiteTracking

## ActiveCampaign Developer Documentation
Official API docs: https://developers.activecampaign.com/reference

