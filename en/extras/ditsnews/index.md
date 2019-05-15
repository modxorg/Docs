---
title: "DitsNews"
_old_id: "628"
_old_uri: "revo/ditsnews"
---

**Warning**
Author no longer works at Dit's Media, package not updated since July 2011

## What is DitsNews?

DitsNews is a component for managing Newsletters with MODX Revolution.

### Features

- newsletters/groups/subscribers management
- import/export subscribers (CSV) (in 0.2.1)
- message queue (50 messages per batch)
- subscribe through form
- confirm subscription (link in email message)
- unsubscribe via link in newsletter
- public/private groups (you can only subscribe to public groups)

### History

Being developed since December 2010 by [ditsmedia](http://modx.com/extras/author/ditsmedia).

| Version                                                                                 | Release date | Contributors | Remarks / highlights |
| --------------------------------------------------------------------------------------- | ------------ | ------------ | -------------------- |
| [0.1.0 alpha](http://modx.com/extras/package/ditsnews?version=4d556d0fb2b083396d000fa4) | 24 Dec 2010  | ditsmedia    | Initial release.     |
| [0.1.0 alpha2](http://modx.com/extras/package/ditsnews)                                 | 11 Jan 2011  | ditsmedia    | several issues fixed |
| [0.2.0 alpha](http://modx.com/extras/package/ditsnews)                                  | soon!        | ditsmedia    | New codebase         |

### Requirements

- MODX Revolution (tested with 2.1.1)
- [FormIt](extras/formit "FormIt") (for sign-up form)
- Cronjobs (or some other method to run a script periodically)

### Development & Bug reporting

DitsNews is currently being developed on Github. That is also the place to **[report bugs](https://github.com/ditsmedia/DitsNews/issues)**, file **feature requests** and **improvements**. You may also fetch the latest commits from the Develop branch.

Github: <https://github.com/ditsmedia/DitsNews>

## Installation

**Warning**
Version 0.2.0 is not 100% compatible with 0.1.0! There are some database and functionality changes. As always, backup before updating! Also, the CSV import/export is missing in this release. It will be back in 0.2.1.

1. Install through Package Management
2. Add a cronjob (change paths): \*/5 \* \* \* \* /path/to/php /path/to/core/components/ditsnews/cron/cron.php
3. Create the newsletter template (just a normal template; CSS must be in the template itself with full URL paths to images. No external CSS!)
4. Create a signup page (ditsnewssignup chunk; change as required)
5. Create a "Thank you" page (and set it as 'redirectTo' in the ditsnewssignup chunk)
6. Create a confirm / opt-in page (add ditsnewsconfirm snippet) and set it's id in ditsnewssignup chunk
7. Create a unsubscribe page (add ditsnewsunsubscribe snippet) and add a link to this page in your newsletter template
8. Go to Components -> DitsNews and change the settings (Menu -> Settings)

## Usage

DitsNews consists of two parts. The first part is a component for the backend which lets you manage your newletters, subscribers, groups, settings. The second part is the sign-up form where users can sign-up for the newsletter.

**In Development**
This section needs an update with correct naming and technical settings

### Short guide

1. Add a testing Group
2. Add yourself as a subscriber (and add yourself to the testing group)
3. Create a new newsletter and select the document you want to send. Send it to the testing group only!
4. After the cronjob runs you will receive your newsletter
5. Test the newsletter in many differtent email clients (Apple Mail, Outlook, Gmail, etc.)
6. For every webmail client: check the newsletter in different browsers!

### Backend - Settings

You can go to the settings of DitsNews by drop-down list of the menu button on the right. There are some basic settings available:

- Name (email-from)
- Email (email-from)
- Bounce-Email-Adress
- Confirmation page (ID required)
- Unsubscribe page (ID required)
- Template (used for Newsletters)

### Backend - Groups

You need a group to send a newsletter. So create a basic group with public setting. If you don't want users to be able to subscribe via form, create a group without public setting.

### Backend - Subscribers

Here you can add new subscribers manually or do CSV-Imports and CSV-Exports of subscribers. You can add / edit some user data:

- First Name
- Last Name
- Company
- E-mail adress (required)
- Status (active / inactive)
- assign to groups

### Backend - Creating a Newsletter

A Newsletter is fully created with MODX native templates and ressources. So first step is to create a ressource (with all your newsletter content) based on your newsletter-template. After creating the ressources, go to components->DitsNews and press "new newsletter". You now need to fill out the subject (which actually is the e-mail subject) field and select your document from drop-down list. There are only ressources shown assigned with correct template (see Backend-Settings).

### available placeholders

``` php
[[+firstname]]
[[+lastname]]
[[+fullname]]
[[+company]]
[[+email]]
```

## Examples

### Exampleof a Newsletter Template

``` html
[[!ditsnewsPlaceholders? &firstnameDefault=`Subscriber`]] <!-- Sets firstname field of email newsletter to "Subscriber" when empty -->
<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>My newsletter</title>
    <base href="[[++site_url]]" /><!-- Important! DitsNews needs this to create correct URLs! -->
    <style type="text/css">
        a {
        font-weight: bold;
        color: #ff0000
        }
    </style>
    </head>
<body>
    <p>Hello [[!+firstname:default=`Subscriber`]],</p>
    [[*content]]
    <p><a href="[[~10]]">Unsubscribe</a></p><!-- Link to unsubscribe page: user data will be added while sending -->
</body>
</html>
```

## Roadmap

All of the following features will come up in later versions:

- move settings to MODX System Settings
- make message queue batch size editable (fixed at 50 for now)
- statistics (views, bounces, etc.)
- handle bounces
- remove unconfirmed subscriptions
- more translations (English and Dutch only for now, German available in latest GitHub package)
