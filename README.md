# Winfreight SDK for PHP

The **Winfreight SDK for PHP** makes it easy for developers to access Winfreight API in their PHP code. You can get
started in minutes by installing the SDK through Composer or by downloading a single zip or phar file from our latest
release.

Jump to:

- [Getting started](https://github.com/daurensky/winfreight-php-sdk#getting-started)
- [Quiz Examples](https://github.com/daurensky/winfreight-php-sdk#quick-examples)
- [To do](https://github.com/daurensky/winfreight-php-sdk#to-do)

## Getting started

1. Get your username and password of Winfreight API.
2. Minimum requirements - To run the SDK, your system will need to have PHP >= 7.1.
3. ``composer require daurensky/winfreight-php-sdk``
4. Check the [Quiz Examples](https://github.com/daurensky/winfreight-php-sdk#quick-examples)

## Quick Examples

### Authorize client
```
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Daurensky\WinfreightPhpSdk\Winfreight;

$username = {username};
$password = {password};

// Prev token data
$accessToken = {prev access token};
$expiresIn = {prev expires in};

$winfreight = new Winfreight($username, $password);
$winfreight->setToken($accessToken, $expiresIn);

if ($winfreight->rottenToken()) {
    $authorization = $winfreight->renewToken();

    /*
     * Your token refresh. Ex:
     * DB::insert('credentials', [
     *   'access_token' => $authorization->getAccessToken();
     *   'expires_in'   => $authorization->getExpiresIn();
     * ]);
    */
}
```

### Get data from API
```
<?php

$hubCodes = $winfreight->getHubCodes([
    'GroupName' => 'Wintest',
    'Province'  => 'Western Cape',
    'Suburb'    => 'Constantiavale',
]);

$servCodee = $winfreight->getServCode([
    'GroupName' => 'Wintest',
]);

$portalWaybill = $winfreight->createPortalWaybill([
    'Waybill'          => 'TEST005',
    'Date'             => '2021/01/13',
    'SenderCustomerID' => 13,
    ...
]);
```

### To do
- [ ] [Create Collection](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateCollection)
- [ ] [Create Waybill](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateWaybill)
- [ ] [Create Parcel](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateParcel)
- [ ] [Create Collection Dimensions](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateCollectionDims)
- [ ] [Get Tracking](https://cloudplatform.iconnix.co.za/API_Documentation/Home/GetTracking)
- [x] [Get Hub Codes](https://cloudplatform.iconnix.co.za/API_Documentation/Home/GetHubCodes)
- [x] [Get Serv Code](https://cloudplatform.iconnix.co.za/API_Documentation/Home/GetServCode)
- [ ] [Get Waybill](https://cloudplatform.iconnix.co.za/API_Documentation/Home/GetWaybill)
- [ ] [Get POD information for multiple waybills](https://cloudplatform.iconnix.co.za/API_Documentation/Home/GetPOD)
- [ ] [Get Quote information](https://cloudplatform.iconnix.co.za/API_Documentation/Home/GetQuote)
- [ ] [Create Waybill Import Header](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateWaybillImportHeader)
- [ ] [Create Waybill Import Dims and Details](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateWaybillImportDimsAndDetails)
- [ ] [Delete Waybill](https://cloudplatform.iconnix.co.za/API_Documentation/Home/DeleteWaybill)
- [ ] [Delete Collection](https://cloudplatform.iconnix.co.za/API_Documentation/Home/DeleteCollection)
- [ ] [Create Ewaybill Prestored](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateEwaybillPrestored)
- [ ] [Create Prestored Dimensions](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreatePrestoredDimensions)
- [ ] [Create POD](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreatePOD)
- [ ] [Create Track](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreateTrack)
- [ ] [Create POD Image](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreatePODImageBase64)
- [x] [Create Portal Waybill](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CreatePortalWaybill)
- [ ] [Get Label Data](https://cloudplatform.iconnix.co.za/API_Documentation/Home/GetLabel)
- [ ] [Check Waybill](https://cloudplatform.iconnix.co.za/API_Documentation/Home/CheckIfWaybillExists)
