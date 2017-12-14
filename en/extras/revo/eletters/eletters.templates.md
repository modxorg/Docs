---
title: "Eletters.Templates"
_old_id: "833"
_old_uri: "revo/eletters/eletters.templates"
---

<div>- [Making a custom Template](#Eletters.Templates-MakingacustomTemplate)
- [Placeholders you can use in the Template](#Eletters.Templates-PlaceholdersyoucanuseintheTemplate)
  - [Subscriber Personal Information Placeholders](#Eletters.Templates-SubscriberPersonalInformationPlaceholders)
- [See Also](#Eletters.Templates-SeeAlso)

</div>Making a custom Template
------------------------

- The easiest way is to just Duplicate the EletterSample Template. Go to the Elements tab on the left panel in your MODX Manager. Expand Templates then expand Eletters. Once you see EletterSample, right click on it. A dialog will pop up and then just click on Duplicate Template. Then fill in the name you want.   
  ![](/download/attachments/39355138/duplicate.png?version=1&modificationDate=1335818884000)
- Now review the code and then make your own code. Note you need to have all of the Eletter TVs selected otherwise the program will not generate an email.

Placeholders you can use in the Template
----------------------------------------

All MODX tags and elements as you would in a normal template are available. These placeholders are also available within any TV or the content area.

Example usage: \[\[+manageSubscriptionsUrl\]\]

<table><tbody><tr><th>Name   
</th><th>Description   
</th></tr><tr><td>trackingImage   
</td><td>Use \[\[+trackingImage\]\] for an image, you can also put a custom image/banner doing this: \[\[+trackingImage\]\]image=test.jpg then put the image in assets/components/eletters/images/   
Example useage: <img src="\[\[+trackingImage\]\]" alt="" /></td></tr><tr><td>manageSubscriptionsUrl</td><td>The URL that allows the subscriber to manager their subscriptions, the generated links has unique subscriber code   
</td></tr><tr><td>unsubscribeUrl</td><td>The URL that allows the subscriber to unsubscribe from your eletters, the generated links has unique subscriber code</td></tr><tr><td>manageSubscriptionsID</td><td>The page ID of the manage subscriptions page   
</td></tr><tr><td>unsubscribeID</td><td>The page ID of the unsubscribe page   
</td></tr></tbody></table>### Subscriber Personal Information Placeholders

Note you need to have actually collected each specific field if you wish to use them. It is recommended that you set first\_name, last\_name and email to required on your signup forms and set the other fields as you wish. date\_created is auto generated so don't put that field on your signup form.

<table><tbody><tr><th>Name   
</th><th>Description   
</th></tr><tr><td>first\_name   
</td><td>First name   
</td></tr><tr><td>m\_name   
</td><td>Middle name   
</td></tr><tr><td>last\_name   
</td><td>Last name   
</td></tr><tr><td>fullname   
</td><td>First name + Last name   
</td></tr><tr><td>company   
</td><td>Company   
</td></tr><tr><td>address   
</td><td>Street Address   
</td></tr><tr><td>city   
</td><td>City   
</td></tr><tr><td>state   
</td><td>State   
</td></tr><tr><td>zip   
</td><td>Zip or Postal Code   
</td></tr><tr><td>country   
</td><td>Country   
</td></tr><tr><td>email   
</td><td>Email address   
</td></tr><tr><td>phone   
</td><td>Phone number   
</td></tr><tr><td>cell   
</td><td>Cellphone number   
</td></tr><tr><td>crm\_id   
</td><td>CRM (Customer Relationship Manager) ID, if you use a product like this   
</td></tr><tr><td>date\_created   
</td><td>The date the person subscribed or when an admin added their account   
</td></tr></tbody></table>See Also
--------

1. [Eletters.API](/extras/revo/eletters/eletters.api)
2. [Eletters.FormIt](/extras/revo/eletters/eletters.formit)
3. [Eletters.Import CSV](/extras/revo/eletters/eletters.import-csv)
4. [Eletters.Templates](/extras/revo/eletters/eletters.templates)

  