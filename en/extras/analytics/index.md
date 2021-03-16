---
title: "Analytics"
_old_id: "602"
_old_uri: "revo/analytics"
---

## What is Analytics?

Analytics is a utility tool for MODX Revolution that will insert the tracking code for Google Universal Analytics (analytics.js) and/or Google Analytics (ga.js) on your website's pages.

By default it will ignore traffic from users logged into the manager. Every context in your website can be excluded on demand, wether or not users are logged in.
The tracking code templates can be overridden with your own chunk.

## Requirements

- MODX Revolution 2.1.5 or later
- PHP5 or later

## History

Analytics was first released on February 5th, 2012 by [yogoo](https://twitter.com/yogoo). The idea of making this extra emerged after reading [Mark Hamstra](https://modx.com/extras/author/MarkH)'s blog post: [Hiding code for MODX Manager users](https://www.markhamstra.com/modx/2012/01/hiding-google-analytics-code-from-manager-users/).

### Download

The extra can be retrieved through the [Package Manager](building-sites/extras), or downloaded manually from the [repository](https://modx.com/extras/package/analytics).

## Usage

### Usage examples

Most basic call (always uncached):

``` php
[[!Analytics? &webPropertyID=`UA-XXXXX-Y`]]
```

Disable context filtering (cache the snippet):

``` php
[[Analytics?
    &excludeContextList=``
    &excludeLoggedInUserContextList=``
    &webPropertyID=`UA-XXXXX-Y`
]]
```

Advanced example:

``` php
[[!Analytics?
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
```

### Shared Properties

| Name                           | Description                                                                                                                                                                                                                                                      | Required | Default |
| ------------------------------ | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| debug                          | A simple debug mode to ouput debug messages as js comments.                                                                                                                                                                                                      | no       | 0       |
| excludeContextList             | Comma separated list of contexts to exclude from tracking - Ex: web, web2,...                                                                                                                                                                                    | no       |         |
| excludeLoggedInUserContextList | Comma separated list of contexts to exclude from tracking when users are logged into it - Ex: mgr, web,...                                                                                                                                                       | no       | mgr     |
| enhancedLinkAttribution        | Enhanced Link Attribution: [analytics.js](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#enhancedlink), [ga.js](https://developers.google.com/analytics/devguides/collection/upgrade/reference/gajs-analyticsjs#enhancedlink) | no       | 1       |

### Google Universal Analytics Properties ([analytics.js](https://developers.google.com/analytics/devguides/collection/analyticsjs/ "analytics.js documentation"))

| Name                    | Description                                                                                                                                                                                                                                              | Required | Default |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| webPropertyID           | [trackingId](https://developers.google.com/analytics/devguides/collection/analyticsjs/method-reference#create) parameter.                                                                                                                                | yes      |         |
| displayfeatures         | [Display Features plugin](https://developers.google.com/analytics/devguides/collection/analyticsjs/display-features). This will enable [Display Advertising Features](https://support.google.com/analytics/answer/3450482?hl=en&ref_topic=3413645&rd=1). | no       | 1       |
| enhancedLinkAttribution | see Shared Properties above.                                                                                                                                                                                              | no       | 1       |
| forceSSL                | [forceSSL](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#ssl) field.                                                                                                                                                 | no       | 0       |
| anonymizeIP             | [anonymizeIp](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#anonymizeip) field.                                                                                                                                      | no       | 0       |
| cookieDomain            | [cookieDomain](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#auto) field.                                                                                                                                             | no       | auto    |
| isLocalhost             | Enable it when you want to test analytics.js from a webserver running on localhost. [More…](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#localhost)                                                                 | no       | 0       |
| cookiePath              | \[deprecated\] Use of this property is [highly discouraged](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#configure) and will be removed in a future release of Analytics.                                            | no       |         |
| pagePath                | send() [Page](https://developers.google.com/analytics/devguides/collection/analyticsjs/pages) field.                                                                                                                                                     | no       |         |

### Google Analytics Properties ([ga.js](https://developers.google.com/analytics/devguides/collection/gajs/ "ga.js documentation"))

| Name                    | Description                                                                                                                                                                                                   | Required | Default |
| ----------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| setAccount              | [\_setAccount](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration?csw=1#_gat.GA_Tracker_._setAccount) parameter.                                             | yes      |         |
| enhancedLinkAttribution | see Shared Properties above.                                                                                                                                                   | no       | 1       |
| setDomainName           | [\_setDomainName](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiDomainDirectory?csw=1#_gat.GA_Tracker_._setDomainName) parameter.                                          | no       |         |
| setCookiePath           | \[deprecated\] Use of this property is [highly discouraged](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#configure) and will be removed in a future release of Analytics. | no       |         |
| trackPageview           | [\_trackPageview](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration#_gat.GA_Tracker_._trackPageview) parameter.                                             | no       |         |

Want to migrate you tracking code to Universal Analytics? Consult the [Universal Analytics Upgrade Center](https://developers.google.com/analytics/devguides/collection/upgrade/).

### Different ways to set properties

Properties can be set in many ways: via the snippet call or properties sets, in a ressource or as a context settings.

If you set up your site settings in a resource, you can use [getResourceField](extras/getresourcefield) to retrieve the values and pass them through the snippet call.

## Use your own tracking codes

Create your own chunks named `ua_tracking` and `ga_tracking`. Optionnaly use the placeholders `[[+ua_options]]` and `[[+ga_options]]`.

## Troubleshooting

- Turn on debug mode.
- Make sure a tracking ID is setup with webTrackingID and/or setAccount.
- Make sure you are logged out from the manager. Remember that by default it doesn't track traffic from users logged into the manager.

## Development and Bug reporting

Feature requests and bugs can be filed at [github](https://github.com/yogoo/Analytics/issues).
