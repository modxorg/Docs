---
title: "SocialSuite"
_old_id: "718"
_old_uri: "revo/socialsuite"
---

SocialSuite is currently under development and will be released at a later point in time. This documentation will be expanded on prior to the release.

SocialSuite is a growing set of tools for MODX Revolution, empowering you to seamlessly integrate social media aspects into your custom designs. SocialSuite is maintained on Github by Mark Hamstra and is free for all to use and add to according to the GPL v2 (or later) license.

## Links & General Information

Source Code: <https://github.com/Mark-H/SocialSuite> (currently private)
Bugs & Feature Requests: <https://github.com/Mark-H/SocialSuite><https://github.com/Mark-H/SocialSuite/issues>, please make sure that you mention the tool you are using! (currently private)
Documentation: what do you think you're looking at?

Originally developed by [Mark Hamstra](http://www.markhamstra.com/), Senior Developer at [MODX](http://modx.com).

## Available Tools

Please drill down these pages for more information for each of the snippets and how to use them. While we try to follow the same conventions, this is not always possible, so be sure to check the available properties and templating instructions where applicable.

| Snippet             | Service  | Description                                                                                                                                                                               | More information |
| ------------------- | -------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- |
| getFacebookShares   | Facebook | The getFacebookShares snippet allows you to get the amount of times a specific URL was liked/shared. Use getFacebookProfile if you want the amount of likes or friends of a page or user. |                  |
| getFacebookPhotos   | Facebook | Use the getFacebookPhotos snippet to get albums and photos for a specific user or page.                                                                                                   |                  |
| getFacebookProfile  | Facebook | The getFacebookProfile gets all public information of a specific user or page, which usually includes the name, location, amount of likes/friends etc.                                    |                  |
| getGooglePlusShares | Google+  | The getGooglePlusOne snippet uses an _unofficial API_ (see below) to get the amount of times a certain URL got a +1.                                                                      |                  |
| getTwitterProfile   | Twitter  | The getTwitterProfile snippet gets all public information of a certain twitter handle. This usually includes the name, location and amount of follows/followers.                          |                  |
| getTwitterShares    | Twitter  | The getTwitterShares snippet uses an _unofficial API_ (see below) to get the amount of times a certain URL was tweeted.                                                                   |                  |

Along with the above set of snippets, SocialSuite also comes with some helpers:

| Name          | Description                                                                                                                                                                                                                                                  | More information |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ---------------- |
| prettyNumbers | For use as an [output filter](/display/revolution20/Input+and+Output+Filters "Input and Output Filters"), the prettyNumbers snippet takes in any numeric value and spits it out nicely formatted. So for example it takes in 156874, and returns it as 156k. |                  |

#### A note on unofficial APIs

Some of these tools, such as getGooglePlusShares and getTwitterShares, use an unofficial API. These APIs are often used by the services internally, but are not documented or labelled as ready for the general public. This means that while they work now, there is nothing stopping these services to stop supporting it tomorrow. Of course we will try to keep them supported, but there is no guarantee on those...if you need a guarantee, complain at the service for not providing an official API! :)