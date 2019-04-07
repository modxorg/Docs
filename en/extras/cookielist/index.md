---
title: "CookieList"
_old_id: "623"
_old_uri: "revo/cookielist"
---

[CookieList](http://modx.com/extras/package/cookielist) is a generic addon that can be used for keeping wishlists, user favorites and other similar content. It allows you to define the value that needs to be saved which means it is not restricted to Resources, but may also be used to provide wishlist functionality for custom components. As the name indicates, it stores data in a Cookie.

## Credits, Links & More

CookieList was developed by Romain Tripault of Melting Media, for Mark Hamstra, who in turn needed it for a custom component for BD Creative named bdListings. It was decided to instead of packaging it with that, it would be supplied as standalone package as to help others who need similar functionality.

The source is on Github: <https://github.com/Mark-H/CookieList>
Github is also where you can file bugs / feature requests: <https://github.com/Mark-H/CookieList/issues>
There is a general forum topic for this addon at <http://forums.modx.com/thread/71914/cookielist---wishlist-favorites-addon-for-revolution-using-lovely-cookies>

Feel free to fork it and add further functionality if you need it - a pull request would be very much appreciated if it adds value to the package as a whole.

CookieList is installable via the Package Manager or [on the MODX site](http://modx.com/extras/package/cookielist) and was developed for MODX Revolution. Though not extensively tested on lower versions it should work from 2.0 up.

| Version  | Released On         | Notes                 |
| -------- | ------------------- | --------------------- |
| 1.0.0-pl | November 18th, 2011 | First public release. |

## Usage

CookieList comes with two snippets.

The first, **addToCookieList**, allows you to generate a link (or anything else, you can override the template easily) that either allows the user to add or to remove an item from the CookieList.

The second, **getCookieList**, simply fetches the cookie and returns the comma separated list of values which were stored. You would use this to generate an overview of what stored in the wishlist/favorites etc.

### addToCookieList

The minimum call below creates a link that either says "Add to your CookieList" or "Remove from your CookieList". You'll probably want to change those labels, and you can (look at the addText and removeText properties below).

``` php
[[!addToCookieList]]
```

You will \*always\* need to call the addToCookieList and getCookieList snippets uncached, as every request could be a different user and it is very likely to change before the resource cache is removed. If using with getPage make sure to pass &cache=0 to that to prevent getPage from caching as well.

#### Snippet Properties

You can use the following properties:

| Property   | Description                                                                                                                                                                             | Default value                 |
| ---------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------- |
| value      | What to store in the cookie. You'll probably want to store the unique ID of an object so you can use the getCookieList snippet to generate an overview of those objects with a snippet. | Current Resource ID           |
| addText    | Override the language-specific default "add" label.                                                                                                                                     | "Add to your CookieList"      |
| removeText | Override the language-specific default "remove" label.                                                                                                                                  | "Remove from your CookieList" |
| tpl        | Allows you to override the default chunk template. You can use link, value and label in your chunk tpl. The default (filebased) chunk looks like this:                                  |

``` php
<a href="[[+link]]" title="[[+label]]">[[+label]]</a>
```

#### Examples

The minimum call can be used to save the current resource ID to a cookie, which you can then use with the getResources snippet to generate an overview of the resources.

### getCookieList

This snippet either returns an empty string, or a comma delimited list of values stored for the user. This is a real simple snippet as there's only one way to call it..:

``` php
[[!getCookieList]]
```

There are no properties you can use to change the behavior of the snippet.

## System Settings

CookieList comes with two system settings:

- cookielist.cookie.duration: sets the time a cookie is valid for, defaults to a month.
- cookielist.cookie.name: sets the name of the cookie, defaults to cookieList.
