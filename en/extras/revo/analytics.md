---
title: "Analytics"
_old_id: "602"
_old_uri: "revo/analytics"
---

<div>- [What is Analytics?](#Analytics-WhatisAnalytics%3F)
- [Requirements](#Analytics-Requirements)
- [History](#Analytics-History)
  - [Download](#Analytics-Download)
- [Usage](#Analytics-Usage)
  - [Usage examples](#Analytics-UsageExamples)
  - [Shared Properties](#Analytics-SharedProperties)
  - [Google Universal Analytics Properties (analytics.js)](#Analytics-UniversalAnalyticsProperties)
  - [Google Analytics Properties (ga.js)](#Analytics-GoogleAnalyticsProperties)
  - [Different ways to set properties](#Analytics-DifferentWaysToSetProperties)
- [Use your own tracking codes](#Analytics-UseYourOwnTrackingCodes)
- [Troubleshooting](#Analytics-Troubleshooting)
- [Development and Bug reporting](#Analytics-DevelopmentandBugreporting)

</div>What is Analytics?
------------------

Analytics is a utility tool for MODX Revolution that will insert the tracking code for Google Universal Analytics (analytics.js) and/or Google Analytics (ga.js) on your website's pages.   
By default it will ignore traffic from users logged into the manager. Every context in your website can be excluded on demand, wether or not users are logged in.   
The tracking code templates [can be overridden with your own chunks](#Analytics-UseYourOwnTrackingCodes).

Requirements
------------

- MODx Revolution 2.1.5 or later
- PHP5 or later

History
-------

Analytics was first released on February 5th, 2012 by [yogoo](https://twitter.com/yogoo). The idea of making this extra emerged after reading [Mark Hamstra](http://modx.com/extras/author/MarkH)'s blog post: [Hiding code for MODX Manager users](http://www.markhamstra.com/modx-blog/2012/01/hiding-google-analytics-code-from-manager-users/).

### Download

The extra can be retrieved through the [Package Manager](display/revolution20/Package+Management), or downloaded manually from the [repository](http://modx.com/extras/package/analytics).

Usage
-----

### Usage examples

Most basic call (always uncached):

 `<pre class="brush: php">[[!Analytics? &webPropertyID=`UA-XXXXX-Y`]]`Disable context filtering (cache the snippet):

 ```
<pre class="brush: php">[[Analytics?
      &excludeContextList=``
      &excludeLoggedInUserContextList=``
      &webPropertyID=`UA-XXXXX-Y`
]]
```Advanced example:

 ```
<pre class="brush: php">[[!Analytics?
      &debug=`1`
      &isLocalhost=`1`
      &excludeContextList=`content_editors`
      &excludeLoggedInUserContextList=`mgr`
      &displayfeatures=`0`
      &enhancedLinkAttribution=`0`
      &webPropertyID=`UA-XXXXX-Y`
      &cookieDomain=`domain.tld`
      &forceSSL=`1`
      &anonymizeIP=`1`
      &pagePath=`/home/landingPage`
      &setAccount=`GA-XXXXX-Y`
      &setDomainName=`domain.tld`
      &trackPageview=`/home/landingPage`
]]
```### Shared Properties

 <table><tbody><tr><th>Name</th> <th>Description</th> <th>Required</th> <th>Default</th> </tr><tr><td>debug</td> <td>A simple debug mode to ouput debug messages as js comments.</td> <td>no</td> <td>0</td> </tr><tr><td>excludeContextList</td> <td>Comma separated list of contexts to exclude from tracking - Ex: web, web2,...</td> <td>no</td> <td></td> </tr><tr><td>excludeLoggedInUserContextList</td> <td>Comma separated list of contexts to exclude from tracking when users are logged into it - Ex: mgr, web,...</td> <td>no</td> <td>mgr</td> </tr><tr><td>enhancedLinkAttribution</td> <td>Enhanced Link Attribution: [analytics.js](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#enhancedlink), [ga.js](https://developers.google.com/analytics/devguides/collection/upgrade/reference/gajs-analyticsjs#enhancedlink)</td> <td>no</td> <td>1</td></tr></tbody></table>### Google Universal Analytics Properties ([analytics.js](https://developers.google.com/analytics/devguides/collection/analyticsjs/ "analytics.js documentation"))

 <table><tbody><tr><th>Name</th> <th>Description</th> <th>Required</th> <th>Default</th> </tr><tr><td>webPropertyID</td> <td>[trackingId](https://developers.google.com/analytics/devguides/collection/analyticsjs/method-reference#create) parameter.</td> <td><span style="color:red">yes</span></td> <td></td> </tr><tr><td>displayfeatures</td> <td>[Display Features plugin](https://developers.google.com/analytics/devguides/collection/analyticsjs/display-features). This will enable [Display Advertising Features](https://support.google.com/analytics/answer/3450482?hl=en&ref_topic=3413645&rd=1).</td> <td>no</td> <td>1</td> </tr><tr><td>enhancedLinkAttribution</td> <td>see [Shared Properties](#Analytics-SharedProperties) above.</td> <td>no</td> <td>1</td> </tr><tr><td>forceSSL</td> <td>[forceSSL](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#ssl) field.</td> <td>no</td> <td>0</td> </tr><tr><td>anonymizeIP</td> <td>[anonymizeIp](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#anonymizeip) field.</td> <td>no</td> <td>0</td> </tr><tr><td>cookieDomain</td> <td>[cookieDomain](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#auto) field.</td> <td>no</td> <td>auto</td> </tr><tr><td>isLocalhost</td> <td>Enable it when you want to test analytics.js from a webserver running on localhost. [More…](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#localhost)</td> <td>no</td> <td>0</td> </tr><tr><td>cookiePath</td> <td>\[deprecated\] Use of this property is [highly discouraged](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#configure) and will be removed in a future release of Analytics.</td> <td>no</td> <td></td> </tr><tr><td>pagePath</td> <td>send() [Page](https://developers.google.com/analytics/devguides/collection/analyticsjs/pages) field.</td> <td>no</td> <td></td> </tr></tbody></table>### Google Analytics Properties ([ga.js](https://developers.google.com/analytics/devguides/collection/gajs/ "ga.js documentation"))

 <table><tbody><tr><th>Name</th> <th>Description</th> <th>Required</th> <th>Default</th> </tr><tr><td>setAccount</td> <td>[\_setAccount](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration?csw=1#_gat.GA_Tracker_._setAccount) parameter.</td> <td><span style="color:red">yes</span></td> <td></td> </tr><tr><td>enhancedLinkAttribution</td> <td>see [Shared Properties](#Analytics-SharedProperties) above.</td> <td>no</td> <td>1</td> </tr><tr><td>setDomainName</td> <td>[\_setDomainName](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiDomainDirectory?csw=1#_gat.GA_Tracker_._setDomainName) parameter.</td> <td>no</td> <td></td> </tr><tr><td>setCookiePath</td> <td>\[deprecated\] Use of this property is [highly discouraged](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#configure) and will be removed in a future release of Analytics.</td> <td>no</td> <td></td> </tr><tr><td>trackPageview</td> <td>[\_trackPageview](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration#_gat.GA_Tracker_._trackPageview) parameter.</td> <td>no</td> <td></td></tr></tbody></table>Want to migrate you tracking code to Universal Analytics? Consult the [Universal Analytics Upgrade Center](https://developers.google.com/analytics/devguides/collection/upgrade/).

 ### Different ways to set properties

 Properties can be set in many ways: via the snippet call or properties sets, in a ressource or as a context settings.

   
If you set up your site settings in a resource, you can use [getResourceField](extras/revo/getresourcefield) to retrieve the values and pass them through the snippet call.

Use your own tracking codes
---------------------------

Create your own chunks named "ua\_tracking" and "ga\_tracking". Optionnaly use the placeholders \[\[+ua\_options\]\] and \[\[+ga\_options\]\].

Troubleshooting
---------------

- Turn on debug mode.
- Make sure a tracking ID is setup with webTrackingID and/or setAccount.
- Make sure you are logged out from the manager. Remember that by default it doesn't track traffic from users logged into the manager.

Development and Bug reporting
-----------------------------

Feature requests and bugs can be filed at [github](https://github.com/yogoo/Analytics/issues).