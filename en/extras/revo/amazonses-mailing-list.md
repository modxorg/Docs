---
title: "amazonSES mailing list"
_old_id: "1700"
_old_uri: "revo/amazonses-mailing-list"
---

- [What is amazonSESMailingList?](#whatis)
- [Requirements](#req)
- [Download](#download)
- [Installation](#install)
  - [Cron set up](#cron)
- [Usage](http://usage)

 **<a id="whatis">What is Amazon SES Mailing List?</a>**

 Amazon SES Mailing list is a complete mailing list which uses [Amazon SES](http://aws.amazon.com/ses/) for sending bulk emails for a small cost (like 0.10$ per 1000 emails!) without any need for having a mail server of your own!

 <a id="req">**Requirements**</a>

- MODX Revolution 2.2.X
- PHP5 or later

 **<a id="download">Download</a>**

 It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management), or from the MODX Extras Repository, here: <http://modx.com/extras/package/amazonsesmailinglist>

 **<a id="install">Installation</a>**

1. Install the package via _Package Management_
2. Open _System Settings_ and filter the settings by _Namespace **aSES**_
3. Set the _Amazon ID (Access Key ID)_ and _Amazon Secret_ (_Secret Access Key_) - [https://console.aws.amazon.com/iam/home?#security\_credential](https://console.aws.amazon.com/iam/home?#security_credential) - _Access Key_s
4. Create a _MODx resource_and put under content

```
<pre class="brush: plain">[[!aSES]]

``` **Properties**

 **&tpl** - Chunk name with unsubscribe message when unsubscribing is successful (default: aSESUnsubscribe)

 **&tpl\_error** - Chunk name with error message if email is not found in the database (default: aSESUnsubscribeError)

 **<a id="cron">Cron set up</a>**

 Open your crontab _(for example CentOS: crontab -e)_ and add line:

 ```
<pre class="brush: plain">* * * * * php /absoulte/path/to/modx/web/directory/assets/components/aSES/cron.php

```
 This will run the cron.php every minute of every hour of every day.

<div class="info"> cron.php sends 100 emails per run. It sends every email because the amazonSESMailingList gives an option for personalized emails (You can put the \[\[+name\]\] placeholder in the email ;)   
</div> **<a id="usage"></a>**

 **<a id="usage"> Usage </a>**

 **<a id="usage"></a>**

 Under _Components_ open _aSESmailings_ and create new _Mailing list_. When created, double-click on it and you will see three tabs - _Mails | Basic settings | Emails_

- _Mails_ - the list of mails that you are preparing/sending or were sent. You also can see the basic information about each mail
- _Basic settings_- the most important part of mailing list. From here you set the Sender name and email.

<div class="warning"> Don't forget to insert **\[\[+content\]\]** placeholder in the Mailing template or there will be no content when you send the mail!  
</div><div class="info"> Every "from" email must be verified by Amazon SES. If your email is not verified yet, click the _Verify email with Amazon SES_ and you will receive conformation email from Amazon SES for the email.  
</div><div class="info"> If you don't have an access for the **production environment** then you have to verify every email you want to send the email **to!** For more information read [here](http://aws.amazon.com/ses/#functionality).  
</div>- _Emails_ - the list of subscribers. Since the AmazonSESMailingList is set for personalized emails every subscriber can have a name which can be called throu \[\[+name\]\] placeholder in mail.

 Create new mail and open it with double-click. Add the subject and some content. Save and go back to previous page. Under tab _Emails_ add new email and put your email in it. Select the tab _Mails_ and the newly created email has now a subject. Right click on it and select _Send mail_ from the menu. That's it! If the cron job is set correctly you will receive the email shortly!

 Enjoy!

<div class="info"> The AmazonSESMailingList is based on ses.php created by Dan Myer. </div><div class="warning"> ses.php is only in beta version writen by Dan Myer. And as always - I can't _accept any responsibility_ or liability for damages arising from the usage of amazonSESMailingList package.  
</div>