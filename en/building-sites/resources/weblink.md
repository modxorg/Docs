---
title: "Weblink"
_old_id: "336"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/weblink"
---

## What is a Weblink?

A weblink is a document of type "reference". Its template is not used to display or format the link, rather the template in this case simply serves as a container for any Template Variables that you may wish to append to your WebLink. The WebLink simply serves as a link that will be part of a generated menu.

The content of the weblink is just an URL; the parser doesn't even parse it, MODx simply redirects to the URL. As soon as it sees that it is a "reference", it just uses the content as the argument for sendRedirect($url).

You can use an external URL for the content, or you can use a Resource ID to link to a Resource in your MODX Resource tree.

## Example

Say you want a footer menu with links to a Terms of Use, a Privacy Policy, and others. But you also want a link to "Contact Us" there. Contact Us is one of your main pages, and is in the top-level of your tree to be displayed in your main menu. You would put those Resources in one "utility pages" folder, probably unpublished so it won't show up in your main menu, and use that folder ID as the Resource ID for the menu snippet. In that folder you would also put a Weblink to your site's contact page. This way the menu will include a link to the contact page, even though that Resource is not in the folder.

Or, you could do it the other way around, have the Contact Us Resource in your unpublished "utility pages" folder, and put the Weblink to it in your top-level so it will show in the main menu.

Originally a menu snippet would make the link to the Weblink itself, just as to any other MODx resource, thus causing the page to be loaded by the parser, triggering the redirect.

## See Also

1. [Content Types](building-sites/resources/content-types)
2. [Named Anchor](building-sites/integrating-templates/named-anchor)
3. [Static Resource](building-sites/resources/static-resource)
4. [Symlink](building-sites/resources/symlink)
5. [Using Resource Symlinks](building-sites/resources/symlink/using-resource-symlinks)
6. [Weblink](building-sites/resources/weblink)
