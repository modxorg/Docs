---
title: "mChimpX"
_old_id: "671"
_old_uri: "revo/mchimpx"
---

A FormIt hook provided to subscribe an emailaddress to your Mailchimp list. Fully confiurable.   
mChimpX is developped by Bert Oost at OostDesign.nl.

Possible options which can be **added to the FormIt tag:**

Parameters
----------

<ins>mcApiKey</ins>  
The Mailchimp API Key   
<ins>mcListId</ins>  
The Mailchimp list id to subscribe to   
<ins>mcEmailField</ins>  
The name of the email field in the form. defaults to 'email'   
<ins>mcMergeTags</ins>  
The merge tags of Mailchimp combined with the form fields. defaults to 'FNAME:firstname,LNAME:lastname,FULLNAME:firstname:lastname'

**Subscribe parameters**  
General: true eq. 1 / false eq. 0

<ins>mcEmailType</ins>  
Email type preference for the email (html, text, or mobile defaults to html)   
<ins>mcDoubleOptin</ins>  
To control whether a double opt-in confirmation message is sent, defaults to true   
<ins>mcUpdateExisting</ins>  
To control whether a existing subscribers should be updated instead of throwing and error, defaults to false   
<ins>mcReplaceInterests</ins>  
To determine whether we replace the interest groups with the groups provided, or we add the provided groups to the member's interest groups (optional, defaults to true)   
<ins>mcSendWelcome</ins>  
If your double\_optin is false and this is true, we will send your lists Welcome Email if this subscribe succeeds - this will \*not\* fire if we end up updating an existing subscriber. If double\_optin is true, this has no effect. defaults to false.

**Error parameters**  
General: true eq. 1 / false eq. 0

<ins>mcDebug</ins>  
True or false to debug messages in MODX error log, when needed. defaults to false.   
<ins>mcFailOnApiKey</ins>  
True or false to return API key errors to the front-end form. defaults to false.   
<ins>mcFailOnListNotExists</ins>  
True or false to return 'list not exists' error to the front-end form. defaults to false.   
<ins>mcFailOnAlreadySubscribed</ins>  
True or false to return 'already subscribed' error to the front-end form. defaults to false.   
<ins>mcFailOnNotSubscribed</ins>  
True or false to return 'not subscribed' error to the front-end form. defaults to false.   
<ins>mcFailOnMissingRequired</ins>  
True or false to return 'missing required' error to the front-end form. defaults to false.

Github: 
--------

For development and bug reports go to: <https://github.com/bertoost/MODX-mChimpX>