---
title: "HandyMan.Frequently Asked Questions"
_old_id: "895"
_old_uri: "revo/handyman/handyman.frequently-asked-questions"
---

HandyMan is a complex product, and there are no doubt several questions going through many people's minds! Here's a few..

<div>- [What is the HandyMan manager URL?](#HandyMan.FrequentlyAskedQuestions-WhatistheHandyManmanagerURL%3F)
- [Is HandyMan a replacement for the MODX Manager?](#HandyMan.FrequentlyAskedQuestions-IsHandyManareplacementfortheMODXManager%3F)
- [I installed HandyMan, but the manager hasn't changed on my phone. Thanks for nothing!](#HandyMan.FrequentlyAskedQuestions-IinstalledHandyMan%2Cbutthemanagerhasn%27tchangedonmyphone.Thanksfornothing%5C%21)
- [Does HandyMan support my mobile phone?](#HandyMan.FrequentlyAskedQuestions-DoesHandyMansupportmymobilephone%3F)
- [How can I enable (Textile) richtext editing in HandyMan?](#HandyMan.FrequentlyAskedQuestions-HowcanIenable%28Textile%29richtexteditinginHandyMan%3F)
- [Is HandyMan free and open source?](#HandyMan.FrequentlyAskedQuestions-IsHandyManfreeandopensource%3F)
- [Can I make a donation somewhere?](#HandyMan.FrequentlyAskedQuestions-CanImakeadonationsomewhere%3F)
- [Does HandyMan work with custom resource classes, like Articles for MODX 2.2?](#HandyMan.FrequentlyAskedQuestions-DoesHandyManworkwithcustomresourceclasses%2ClikeArticlesforMODX2.2%3F)
- [What versions of MODX does HandyMan support?](#HandyMan.FrequentlyAskedQuestions-WhatversionsofMODXdoesHandyMansupport%3F)
- [Does HandyMan support logging in using a captcha?](#HandyMan.FrequentlyAskedQuestions-DoesHandyMansupportlogginginusingacaptcha%3F)

</div>What is the HandyMan manager URL?
---------------------------------

www.yoursite.com/handyman/

(So not yoursite.com/manager/)

Is HandyMan a replacement for the MODX Manager?
-----------------------------------------------

It's not a replacement, but it is an alternative way to manage your site content. It's generally faster, and more accessible than the main manager but it doesn't have all the features (and that's not the idea of it either).

It works pretty good with screenreaders, too.

I installed HandyMan, but the manager hasn't changed on my phone. Thanks for nothing!
-------------------------------------------------------------------------------------

Now now, hold your horses! HandyMan doesn't replace the manager, but offers an alternative at a different url. You would've known this if you had read the readme, installation instructions or @handyman\_modx tweets.

Instead of going to yoursite.com/manager/, visit yoursite.com/handyman/ to use HandyMan on your mobile device.

Does HandyMan support my mobile phone?
--------------------------------------

HandyMan is built on the jQuery Mobile Framework. This framework takes away the hard work of keeping up to date with mobile device advancements, while keeping the older ones supported as well. If your device has been produced in the last two years and was called a "smartphone" there should be no problem at all. It also supports tablets, and HandyMan has been tested and deemed working smoothly on iPads and the Motorola Xoom.

For the longer answer with more specific details, please check out the [jQuery Mobile Graded Browser Support](http://jquerymobile.com/gbs/) table.

How can I enable (Textile) richtext editing in HandyMan?
--------------------------------------------------------

HandyMan features a rich text editing implementation of Textile [(read about what Textile is here](http://en.wikipedia.org/wiki/Textile_(markup_language)), or [check out the syntax in the sidebar here](http://www.textism.com/tools/textile/) though not everything will be supported), however this has been **disabled by default** as not every content can easily be worked with and some specific bugs were found. You should be good if your richtext fields (including TVs) only use paragraphs, images and links, however no matter what - make sure you have a copy of the data **before** saving from HandyMan. You could use VersionX (version 2 works in MODX 2.1+, version 1 from the package manager only up to 2.0.8) for that, there's some in-dev releases [available from the forum](http://forums.modx.com/thread/72078/versionx-v2---in-development-previews). If you encounter any bugs, make sure to report it so it can be fixed!

If your rich text fields (content, richtext TVs) are built with divs or other real specific html syntax ?I would, for now, advice to NOT use the Textile integration.

Once you want to enable Textile, you'll have to login on the regular MODX Manager, to go System -> System Settings and in the namespace dropdown (that's the one defaulting to "core") choose "handyman". You should see a number of settings there. Change the handyman.useRichtext setting to "yes", optionally clear the cache and go back to HandyMan - it should now allow you to use Textile. The Textile integration will check your resource "richtext" setting to see if it is allowed, and if so it will still offer you to not use it on a case by case basis - simply click the proper link on top of the resource create/update screen.

Is HandyMan free and open source?
---------------------------------

Yes to both.

You can find the source (and contribute to it \*hint\*) on Github: <https://github.com/Mark-H/HandyMan> - that's the complete source, completely GPL licensed.

It is free to use HandyMan, to install it for your clients and in general to deploy it - but if it has made a difference in your workflow or in general helps you to do what you have to do, a contribution is very much appreciated. That doesn't have to be a financial donation - helping out improving the documentation (like the page you're reading!), translating HandyMan to your native language (coming soon!) or one of the other ideas [mentioned on the new site](http://www.modxmobile.com/contribute/no-money-involved/) is very, very (did I say very?) much appreciated and will help this project move forward. If you don't have the time to do something like that, you can however make a donation via PayPal in 2 simple steps [on my site](http://www.markhamstra.com/l/hm/).

Can I make a donation somewhere?
--------------------------------

Of course! I'm just working on finishing up automating all the accompanying processes (authorizing you for the beta transport provider, signing you up for the contributor-only newsletter etc), but you will be able to contribute from [my personal site](http://www.markhamstra.com/l/hm/). Your donation will be processed via PayPal, which allows you to make a donation either with a PayPal account, or with one of the many accepted credit cards.

Your donation will go towards development (bug fixing & new features), hosting and perhaps some project marketing if needed.

Does HandyMan work with custom resource classes, like Articles for MODX 2.2?
----------------------------------------------------------------------------

<div class="warning">Due to a bug in Revolution 2.2.0-pl, you can not use HandyMan in that version when a custom resource class such as Articles installed. Please update your MODX install to 2.2.0-pl2 or later.</div>HandyMan will show you the resource pretending it's nothing different from others. You do not have access to the extended fields for configuration, and it has not yet been extensively tested to check for side effects. In a future release, custom resource classes may be given the possibility to create custom interfaces for HandyMan specifically. You can use custom resources classes with HandyMan, but it may lead to issues with the specific custom resource class due to the different interface and fields.

What versions of MODX does HandyMan support?
--------------------------------------------

In 1.0.0 we support 2.0.8, 2.1.x and currently to a limited extend 2.2.

- 2.0 support will likely be phased out in the near future, so you should thinking about upgrading if you want to be able of using the latest and greatest.
- Until 2.3 is released, the 2.1 branch will be supported completely. After that it is possible 2.1 support will be phased out, however that will be announced plenty of time in advance.
- 2.2 will be supported completely (including custom resource classes, though development of specific ports to handyman is the responsibility of the dev) as of HandyMan 1.1. 2.2 support is likely to stick around for a long time.

Does HandyMan support logging in using a captcha?
-------------------------------------------------

At this point HandyMan does NOT support logging into when the [Captcha plugin](http://modx.com/extras/package/captcha) is enabled. It [has been filed in the bug tracker](http://tracker.modx.com/issues/6620) and may come in a future release..