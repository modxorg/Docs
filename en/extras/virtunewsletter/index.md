---
title: "virtuNewsletter"
_old_id: "1378"
_old_uri: "revo/virtunewsletter/"
---

- [virtuNewsletter](#virtuNewsletter-virtuNewsletter)
  - [Download](#virtuNewsletter-Download)
  - [Development and Bug Reporting](#virtuNewsletter-DevelopmentandBugReporting)
  - [How it works](#virtuNewsletter-Howitworks)
- [Email Templates](#virtuNewsletter-EmailTemplates)
  - [A Resource, with pagetitle: Thank you for your subscription](#virtuNewsletter-Tpl%3AThankyouforyoursubscription)
  - [A Resource, with pagetitle: Your subscription has been activated successfully.](#virtuNewsletter-Tpl%3AYoursubscriptionhasbeenactivatedsuccessfully.)
  - [A Resource, with pagetitle: You have been unsubscribed successfully.](#virtuNewsletter-Tpl%3AYouhavebeenunsubscribedsuccessfully.)
- [System Settings](#virtuNewsletter-SystemSettings)
- [Resources, Snippets & a Chunk](#virtuNewsletter-Resources%2CSnippets%26aChunk)
  - [1. Subscribe](#virtuNewsletter-1.Subscribe)
  - [2. Confirm](#virtuNewsletter-2.Confirm)
  - [3. Read](#virtuNewsletter-3.Read)
  - [4. a Chunk](#virtuNewsletter-4.aChunk)
  - [5. The Newsletters](#virtuNewsletter-5.TheNewsletters)
- [Custom Manager Page (CMP)](#virtuNewsletter-CustomManagerPage%28CMP%29)
  - [Newsletters](#virtuNewsletter-Newsletters)
      - [Category](#virtuNewsletter-Category)
  - [Subscribers](#virtuNewsletter-Subscribers)
- [Cron](#virtuNewsletter-Cron)



#  virtuNewsletter 

 virtuNewsletter is a newsletter system for MODX Revolution.

 If you want to read the old docs, please see here <http://oldrtfm.modx.com/display/ADDON/virtuNewsletter>.

##  Download 

 virtuNewsletter can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, available here: <http://modx.com/extras/package/virtunewsletter>

##  Development and Bug Reporting 

 virtuNewsletter is stored and developed in GitHub, the reposititory can be found here: <https://github.com/virtudraft/virtuNewsletter>

##  Summary

 1. Set up a newsletter format using common resource on the left tree 
 2. In the CMP, add a category, as the newsletter group. Here usergroups can also be applied to a category 
 3. Then add a newsletter to the category 
 4. select if " _is recurring_", means that newsletter will be used recursively based on the given time range (weekly, monthly, or yearly), and split into the number of recurring (1 - monthly, 7 - weekly => means daily).

 virtuNewsletter uses cron jobs to send the newsletters.

 Note: MODX Cloud currently does not provide cron jobs as a service. 

 Read more about how to set it up in the cron section below.

#  Email Templates 

 You will need to provide some email templates for confirmations. These templates are resources, not chunks or standard templates. They can be left unpublished or hidden, it doesn't matter. 
 The **pagetitle** will be the _subject_ of the email and the **content** will be the _body_ of the email.

 All snippets and chunks inside the resource will be processed. e.g: getResources will be processed to give updates about your site inside the email's body. By using resources, non-techie user won't be horrified with HTML tags if they want to edit the email's content.

 This diagram explains which resources are for what:

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/virtunewsletter-bpml.jpg)

## "Thank you for your subscription" Email

 Email template for subscribe confirmation. The default is in **core/components/virtunewsletter/elements/emails/activation-email.tpl**

 Update 1.6.0-beta2: Template can be created inside the CMP and adjusted to culture key. 

 Update 1.6.0-beta-1: \[\[+virtuNewsletter.email.subid\]\] = \[\[+virtuNewsletter.email.id\]\] 

``` php 
<p>Hello [[+virtuNewsletter.email.name:default=`[[+virtuNewsletter.email.email]]`]],</p>
<p>Thank you for your subscription.</p>
<p>To complete this, please click this link to activate your account:
    <a href="[[~62?
       &subid=`[[+virtuNewsletter.email.subid]]`
       &h=`[[+virtuNewsletter.email.hash]]`
       &act=`subscribe`
       &scheme=`full`]]"
       target="_blank">activate</a>.
</p>
<p>You can unsubscribe back later if it is required.</p>
<p> </p>
<p>Regards,</p>
<p><a href="http://www.example.com" target="_blank">Example.com</a></p>

```

 The ID# **62** should be replaced with the resource's ID for the confirmation page, which only contains:

 ``` php 
[[!virtuNewsletter.confirm]]

```

##  "Your subscription has been activated successfully" Email

 Update 1.6.0-beta2: Template can be created inside the CMP and adjusted to culture key. 

 Email template for confirmed subscription. The default is in **core/components/virtunewsletter/elements/emails/activated-email.tpl**

 ``` php 
<p>Thank you.</p>
<p>Your subscription has been activated successfully.</p>
<p>We will send you the upcoming newsletter once they are published.</p>
<p> </p>
<p>Regards,</p>
<p><a href="http://www.example.com" target="_blank">Example.com</a></p>

```

## "You have been unsubscribed successfully" Email

 Update 1.6.0-beta2: Template can be created inside the CMP and adjusted to culture key. 

 Email template for unsubscription.

 In each newsletter and user can click an unsubscription link. This link will go to the same confirmation page as above, but instead triggering the unsubscribe. The default is in **core/components/virtunewsletter/elements/emails/deactivated-email.tpl**

 ``` php 
<p>Thank you.</p>
<p>Your subscription has been cancelled successfully.</p>
<p>We will no longer send you the upcoming newsletters.</p>
<p> </p>
<p>Regards,</p>
<p><a href="http://www.example.com" target="_blank">Example.com</a></p>

```

 At this point, the subscriber won't be removed from the system; only be deactivated.

#  System Settings 

 | Settings | Description |
|----------|-------------|
| virtunewsletter.usergroups | Names of usergroups, delimited by comma. These usergroups will be automatically subscribed |
| virtunewsletter.email\_debug | Turn this on to dump the email's placeholders to MODX's error log without sending the email |
| virtunewsletter.email\_limit | Number of emails per hour for the cron job. Please consult your webhost about email sending limits. 0 (zero) or empty value means unlimited which will send all emails in 1 (one) batch. Default: 50. |
| virtunewsletter.email\_sender | From whom the newsletter comes from in the email's header. Default is any value in the system setting's **emailsender** |
| virtunewsletter.subscribe\_confirmation\_tpl | Resource's ID as the email template for the new subscription, as the above template: T _hank you for your subscription_ |
| virtunewsletter.subscribe\_succeeded\_tpl | Resource's ID as the email template for the unsubscription confirmation |
| virtunewsletter.unsubscribe\_succeeded\_tpl | Resource's ID as the email template for the completed confirmation of the unsubscription |
| virtunewsletter.readerpage | Resource's ID where visitor can access the newsletter via web |

#  Resources, Snippets and Chunks

 You need to create 3 more resources with its own snippet in it:

##  1. Subscribe 

 Create a resource, and put this snippet as the content.

 **Example: this is the ID# 61 for the subscribe form below.**

 ``` php 
[[!virtuNewsletter.subscribe]]

```

##  2. Confirm 

 Create a resource, and put this snippet in the content.

 **Example: this is the ID# 62 in my template examples above.**

 ``` php 
[[!virtuNewsletter.confirm]]

```

##  3. Read 

 Create a resource, and put this snippet in the content.

 **Example: this is the ID# 63 for the link in the email's body of the newsletter below.** 
 This resource will be the website's newsletter reader page. 
 Use the MODX's original **BaseTemplate**, without any CSS styles.

 ``` php 
[[!virtuNewsletter.reader]]

```

 To dump the placeholders, use this

 ``` php 
[[!virtuNewsletter.reader? &toArray=`1`]]

```

##  4. Chunk 

 The subscribe form (can be a chunk) is simply like this:

 ``` php 
<form action="[[~61]]" method="POST">
    <p>Email: <input type="email" name="email"></p>
    <input type="hidden" name="category" value="Customer News">
    <p><input type="submit" name="submit" value="Subscribe"></p>
</form>

```

 **NO FORMIT, NO HOOK!** 
 Simply point the action to the [Subscribe page](extras/revo/virtunewsletter#virtuNewsletter-1.Subscribe) above. 
 The **category** field is _required_ to set the subscriber to the appropriate **Category** inside the CMP.

 Again, **MAKE SURE YOU HAVE THAT CATEGORY INSIDE THE CMP.**

 The name itself can be changed, but make sure you have to apply this also to the **\[\[!virtuNewsletter.subscribe? &categoryKey=`category`\]\]** onthe [Subscribe page](extras/revo/virtunewsletter#virtuNewsletter-1.Subscribe) above

##  5. The Newsletters 

 You are now ready to create the newsletters using the common resource.

 1. Create another template that will be acting as the email's body, means without and tags.

 2. Put the CSS styles inside the tag, and it will parsed automatically inline to the email's body.

 3. You might also want to add these placeholders as the unsubscribe link, or link to read this on your website:

 Update 1.6.0-beta-1: \[\[+virtuNewsletter.email.newsid\]\] = \[\[+virtuNewsletter.email.id\]\] 

``` php 
<!-- unsubscribe link -->
<a href="[[~62? 
&subid=`[[+virtuNewsletter.email.subid]]` 
&h=`[[+virtuNewsletter.email.hash]]`
&act=`unsubscribe`
&scheme=`full`
]]">
Unsubscribe
</a>
<!-- read the newsletter on the website -->
<a href="[[~63?
&scheme=`full`
&newsid=`[[+virtuNewsletter.email.newsid]]`
&e=`[[+virtuNewsletter.email.email]]`
&h=`[[+virtuNewsletter.email.hash]]`
]]">read this newsletter on the website</a>

```

 Note: Either &e **or** &h is pre-requisite. You just need one of them. 

 Just remember to always put **&scheme=`full`** to all link tags, so they will be appended with the full URL of the website.

#  Custom Manager Page (CMP) 

##  Newsletters 

###  Category 

 Category is a group of subscribers. The subscriber can be from usergroups, or anonymous subscriber from web page, whom registered using the subscription form. Because this is required for newsletter, then the subscription form **must** have category field (or anything you define which matches with \[\[!virtuNewsletter.subscriber? &categoryKey=`category`\]\] controller snippet).

 So in the CMP you have to create a category first.

##  Subscribers 

 This section shows you the registered subscribers, or the auto-registered subscribers which are set on the System Settings ( **virtunewsletter.usergroups**). Synchronize them if you like.

#  Cron 

 To use cron in your own hosting, set this command:

 ``` php 
php -q /home/xxx[absolute_path]xxx/public_html/assets/components/virtunewsletter/conn/web.php action=web/crons/queues/process site_id=modx12abc345678d90.12345678

```

Arguments do not have "?" and "&" for Command Line Interface.

 If you use third-party cron service, point the address to:

 ``` php 
hxxp://www.your_cool_website.com/assets/components/virtunewsletter/conn/web.php?action=web/crons/queues/process&site_id=modx12abc345678d90.12345678

```

 **site\_id** is required! Replace **site\_id=modx12abc345678d90.12345678** with your site's ID. Look for it inside the core/config/config.inc.php, check the **$site\_id** variable. This also must be updated each time MODX is updated. It is changed!

 **Heads Up** 
 Do not share this site\_id to anybody else! This is the MODX's secret to prevent cross-site scripting. If you want to ask something on the forum, remember to replace this value!