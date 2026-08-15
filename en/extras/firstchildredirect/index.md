---
title: "FirstChildRedirect"
_old_id: "641"
_old_uri: "revo/firstchildredirect"
---

FirstChildRedirect is a snippet that redirects a resource to its first child resource.

## Installation & bugs

FirstChildRedirect can be installed through the MODX Revolution Package Manager, or installed manually by downloading the package from the MODX Extras website, uploading it to core/packages and adding a new package through the package manager from a local search.

## Snippet usage

The snippet is really easy to use, just call uncached it in the content or template of the container resource you want to redirect to its first child.

``` php
[[!FirstChildRedirect]]
```

Alternatively, you can specify one or more parameters in the snippet call which influence how the redirect will be handled.

| Parameter     | Optional | Details                                                                                                                                                                                                                                                                                                                                                                                                                                        | Default                            |
| ------------- | -------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------- |
| &docid        | Yes/Yes  | Setting a docid parameter to another resource's ID will tell the snippet to use that resource as the container to look in for the first child.                                                                                                                                                                                                                                                                                                 | current resource ID (ie `[[*id]]`) |
| &default      | No\*/Yes | The resource to redirect to when there are no children resources found. This can be either a resource ID or one of the following settings: site\_start, site\_unavailable\_page, error\_page or unauthorized\_page. | site\_start setting                |
| &sortBy       | No/Yes   | Any valid resource fieldname to sort the children found on.                                                                                                                                                                                                                                                                                                                                                                                    | menuindex setting                  |
| &sortDir      | No/Yes   | Either 'desc' for descending (redirects to highest menuindex or &sortBy field found) or 'asc' for ascending (redirects to lowest menuindex or &sortBy field found).                                                                                                                                                                                                                                                                            | "asc"                              |
| &responseCode | No/Yes   | The response code (status code) for sending the redirect. Defaults to a 301 ("HTTP/1.1 301 Moved Permanently") but also contains shortcuts for 302 (temporarily) - you can also specify the complete response code (including the HTTP part and name) for others. _Added in 2.3.1._                                                                                                                                                            | 301                                |

Using &sortBy=`RAND()` seems to work in 2.1.3 :)

This is good for A/B Split Testing, for example.
