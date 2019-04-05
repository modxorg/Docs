---
title: "Eletters"
_old_id: "634"
_old_uri: "revo/eletters"
---

- [Overview of GroupEletters](#Eletters-OverviewofGroup%7B%7DEletters)
  - [Features](#Eletters-Features)
  - [Requirements](#Eletters-Requirements)
- [History](#Eletters-History)
- [Bug Reporting and Contribute](#Eletters-BugReportingandContribute)
- [Installation](#Eletters-Installation)
- [Updating GroupEletters 1.0 to Eletters 1.1+](#Eletters-UpdatingGroupEletters1.0toEletters1.1%5C)
- [How to Use](#Eletters-HowtoUse)
- [See Also](#Eletters-SeeAlso)



## Overview of GroupEletters

GroupEletters is a Addon for MODX Revolution that allows you to create & send beautiful email campaigns within MODX! You can now take advantage of MODX advanced template features to create custom eletter templates. Easily manage lists & subscribers and allow subscribers to manage their own preferences. Personalize your emails with some default placeholders.

### Features

- Easy group and subscriber management
- Allow users to subscribe through a contact form (FormIt)
- Users must confirm subscription (link in email message)
- User get an unsubscribe link in newsletters (\[\[+unsubscribeUrl\]\])
- Select what groups users can subscribe to, one or many.
- CSV Import for subscribers
- Message queue, via the the System Settings chose your batch size and the time in between each email sent
- Basic Statistics
- FormIt Email hook
- API to send eletters in your snippets/extras.

### Requirements

- MODX Revolution 2.2+
- FormIt - for subscribe page
- CronManager - for automated queue

## History

Eletters formally GroupEletters was written by Joshua Gulledge and first alpha release on April 30, 2012. Some code was based on Ditsnews. Note this is not an upgrade to Ditsnews.

## Bug Reporting and Contribute

Eletters is on Github: <https://github.com/jgulledge19/GroupEletters>

Please report any issues here: <https://github.com/jgulledge19/GroupEletters/issues>

## Installation

First you will need to install through Package Management and then do the following set up steps:

- Create a signup page look at the example in the GroupEletterSignup Chunk
- Optional - Create a "Thank you" page (and set it as 'redirectTo' in your signup page FormIt snippet call)
- Create a confirm / opt-in page just add in the \[\[!GroupEletterConfirm\]\] Snippet and set this pages id in the signup page FormIt snippet call
- Create a unsubscribe page, just add in the \[\[!GroupEletterUnsubscribe\]\] Snippet. Make sure you add a link to this page in your newsletter template \[\[+unsubscribeUrl\]\]
- Go to System->System Setting and select Eletters and change the settings to match what you want and the pages you just created.
- Go to Components -> Eletters and add some groups and if you want add some subscribers
- Install CronManager Now add the GroupEletterQueue to CronManager. If you are unable to set up CronManager you could put the \[\[!GroupEletterQueue\]\] Snippet in a document and call it manual, but that page will take a couple of minutes to load!

## Updating GroupEletters 1.0 to Eletters 1.1+

Note Templates, Chunks, Snippets, Plugin and all System Settings had a name change, the removal of "Group". TVs did not change names.

What does this mean? If you already had a working version of GroupEletters then you will need to update your MODX Resources snippet calls renaming them. Then review the system settings and copy over the values from GroupEletters to Eletters. Any custom Templates/Chunks would not be effected, just make sure that your custom Templates have all the Eletters TVs attached to them. After a successful install and testing you can delete the Templates, Chunks, Snippets, Plugin and System Settings that have the Group prefix.

## How to Use

- Create a Resource/Document and select the EletterSample Template.
- Fill in the page as normal. You have the following placeholders available: (Note you need to collect this data before you can use it) 
  - \[\[+trackingImage\]\]
  - \[\[+first\_name\]\]
  - \[\[+m\_name\]\]
  - \[\[+last\_name\]\]
  - \[\[+fullname\]\] - this is just \[\[+first\_name\]\] and \[\[+last\_name\]\] together
  - \[\[+company\]\]
  - \[\[+address\]\]
  - \[\[+city\]\]\]
  - \[\[+state\]\]
  - \[\[+zip\]\]
  - \[\[+country\]\]
  - \[\[+email\]\]
  - \[\[+phone\]\]
  - \[\[+cell\]\]
  - \[\[+crm\_id\]\]
  - \[\[+date\_created\]\]
- Select the Template Variables tab. You will need to select and fill out the information:

![](/download/attachments/39355133/TVs.png?version=1&modificationDate=1335812378000)

- When you are read you must check Send a Test - this is a requried step and if you make a change in the content area you will need to send another test.
- If you have CronManager set up then it will send out on the Publish Date or if it is published the next time CronManager runs.
- Try testing the newsletter in many different email clients

## See Also

1. [Eletters.API](/extras/revo/eletters/eletters.api)
2. [Eletters.FormIt](/extras/revo/eletters/eletters.formit)
3. [Eletters.Import CSV](/extras/revo/eletters/eletters.import-csv)
4. [Eletters.Templates](/extras/revo/eletters/eletters.templates)