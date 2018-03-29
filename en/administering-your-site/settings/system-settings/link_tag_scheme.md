---
title: "link_tag_scheme"
_old_id: "170"
_old_uri: "2.x/administering-your-site/settings/system-settings/link_tag_scheme"
---

## link\_tag\_scheme

 **Name**: URL Generation Scheme 
**Type**: textfield 
**Default**: -1 
**Available In:** 2.1+

 URL generation scheme for tag \[\[~id\]\].

 The available schemes are:

 | Name | Description |
|------|-------------|
| -1 | (default) URL is relative to site\_url |
| 0 | see http |
| 1 | see https |
| full | Renders the link as an absolute URL, prepended with site\_url |
| abs | Renders the link as an absolute URL, prepended with base\_url |
| http | Renders the link as an absolute URL, forced to http scheme |
| https | Renders the link as an absolute URL, force to https scheme |
You can override the scheme in each link by passing &scheme in your links:

 ```

[[~123? &scheme=`full`]]

```