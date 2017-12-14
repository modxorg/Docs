---
title: "Eletters.API"
_old_id: "830"
_old_uri: "revo/eletters/eletters.api"
---

<div>- [Eletters API](#Eletters.API-ElettersAPI)
  - [Snippet Code example](#Eletters.API-SnippetCodeexample)
- [See Also](#Eletters.API-SeeAlso)

</div>Eletters API
------------

New in version 1.1 are easy API to create your own Triggers to send out emails via an action of the user or through your own snippet/extra.

### Snippet Code example

<figure class="code"><figcaption>**Snippet Example, found at: core/components/eltters/elements/snippets/elettertriggerexample.snippet.php**</figcaption>```
<pre class="brush: javascript">
<?php
/**
 * Eletter Trigger/Response code example snippet
 * @return (String) $html
 *
 *
 * This example will just email the MODX User on page load
 *
 */

if (!isset($modx->eletters)) {
    $modx->addPackage('eletters', $modx->getOption('core_path').'components/eletters/model/');
    $modx->eletters = $modx->getService('eletters', 'Eletters', $modx->getOption('core_path').'components/eletters/model/eletters/');
}
$eletters =& $modx->eletters;

$profile = $modx->user->getOne('Profile');
$to = $to_name = '';
if ( is_object($profile) ) {
    $to = $profile->get('email');
    $to_name = $profile->get('fullname');
} else {
    return 'Cannot find MODX user';
}

$options = array(
    'to_address' => $to,
    'to_name' => $to_name,
    'EResourceID' => 10,
);

$placeholders = $profile->toArray();

/**
 *
 * @param (Array) $options  - name=>value ex: for auto response form_address=Fname Lname
 *              'from_address' => '',
                'from_name' => '',
                'to_address' => '',
                'to_name' => '',
                'cc_address' => '',
                'cc_name' => '',
                'bcc_address' => '',
                'bcc_name' => '',
                'reply_to_address' => '',
                'reply_to_name' => '',
                'ishtml' => TRUE,
                'NewsletterID' => '',
                'EResourceID' => '',
                'uploads' => TRUE,
                'files' => TRUE,
 * @param (Array) $placeholders - MODX placehoders -name=>value
 * @param (Boolean) $log - TRUE will save completed email to DB
 * @param (Array) $attachments - add addtional attachments
 */

$sent = $eletters->sendResponse($options, $placeholders, $log=TRUE);

$output = '';
if ( $sent ) {
    $output = 'An email was sent to '.$to_name.' at '.$to.' email address.';
} else  {
    $output = 'An email could not be sent to '.$to_name.' at '.$to.' email address.';
}

return $output;

```</figure>See Also
--------

1. [Eletters.API](/extras/revo/eletters/eletters.api)
2. [Eletters.FormIt](/extras/revo/eletters/eletters.formit)
3. [Eletters.Import CSV](/extras/revo/eletters/eletters.import-csv)
4. [Eletters.Templates](/extras/revo/eletters/eletters.templates)