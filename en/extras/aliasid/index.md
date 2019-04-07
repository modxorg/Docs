---
title: "aliasid"
_old_id: "1704"
_old_uri: "revo/aliasid"
---

## What is aliasid?

 aliasid is a MODX Revolution Extra that gets and returns the Resource ID by querying the alias of the resource. It is especially useful in multiple context installations that share the same structure and same snippets.

## Requirements

- MODX Revolution 2.2.x+
- PHP 5.3

## History

 aliasid was written by Michael Graham.

### Download

 aliasid can be downloaded from with the MODX Revolution manager via Package Management or from the MODX Extras Repository, here:

### GitHub

 aliasid is stored and developed in GitHub, and can be found here:

## Usage

 Imagine you have a MODX install that runs a number of sites that are identical in function and features, but have different content, such as different addresses, languages, images, etc. Each of your sites has an "Events" list which displays an event title, date, location, and a link listed on the home page, using getResources.

 Typically your getResources call includes a Resource ID defined with the _parents_ parameter:

``` php
[[!getResources? &parents=`5` &tpl=`eventListTPL`]]
```

 When you duplicate a context the Resource ID of the Events Resource for that context will have a different ID. aliasid dynamically retrieves the Resource ID number by querying the alias of a Resource within the current context. For example:

```php
[[aliasid? &alias=`events/`]]
```

 Gets and returns the Resource ID of the Resource in the current context that has an alias of events/.

 In our getResources call, rather than specifying the ID by number we use the aliasid call instead:

``` php
[[!getResources? &parents=`[[aliasid?&alias=`events/`]]` &tpl=`eventListTPL`]]
```

 Now this call will work in all the contexts as long as the correct Resources has an alias of events.

 **Note**: Be aware that in some cases, when duplicating a context, some of the aliases are changed automatically.