---
title: "link_tag_scheme"
_old_id: "170"
_old_uri: "2.x/administering-your-site/settings/system-settings/link_tag_scheme"
---

link\_tag\_scheme
-----------------

 **Name**: URL Generation Scheme   
**Type**: textfield   
**Default**: -1   
**Available In:** 2.1+

 URL generation scheme for tag \[\[~id\]\].

 The available schemes are:

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> -1 </td> <td> (default) URL is relative to site\_url </td> </tr><tr><td> 0 </td> <td> see http </td> </tr><tr><td> 1 </td> <td> see https </td> </tr><tr><td> full </td> <td> Renders the link as an absolute URL, prepended with site\_url </td> </tr><tr><td> abs </td> <td> Renders the link as an absolute URL, prepended with base\_url </td> </tr><tr><td> http </td> <td> Renders the link as an absolute URL, forced to http scheme </td> </tr><tr><td> https </td> <td> Renders the link as an absolute URL, force to https scheme </td></tr></tbody></table>You can override the scheme in each link by passing &scheme in your links:

 ```

[[~123? &scheme=`full`]]

```