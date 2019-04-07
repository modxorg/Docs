---
title: "Static Resource"
_old_id: "293"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/static-resource"
---

## What is a Static Resource?

 A Static Resource is a Resource abstraction of an actual file on the filesystem. You can think of the abstraction as a virtual representation of any file on your webserver. Like other MODx resources, this abstraction can have permissions associated with it and it shows up in the MODx manager in the resource tree, which allows it to show up in dynamic menus and search results. A MODx Static Resource can represent any file on your webserver (permissions permitting).

 Static Resources can also have tags inside their content fields to determine the path of the file - so you can specify custom paths to set as System Settings, or use [Snippets](extending-modx/snippets "Snippets") to dynamically find the path.

 They behave exactly like a Document (standard Resource). Content within a Static Resource is parsed and displayed in the exact same way as a Document, but often you will alter the [Content Type](building-sites/resources/content-types "Content Types") and Content Disposition to match the type of file you are representing.

 **About Aliases**
 When you create a Static Resource, the alias should not include a file extension: the file extension is determined by the [Content Type](building-sites/resources/content-types "Content Types"). For example, if you create a Static Resource that points to a PDF file on your webserver, you might give the page an alias of "test". Once you select "PDF" as your Content Type, the ".pdf" extension will be appended to the alias (presuming that you have defined the PDF content type using ".pdf" as its file extension).  If you have created a custom content type for PDF, then you do not need to set the content disposition field to 'attachment'. It can be left as inline, as modern browsers can negotiate PDFs and can then also choose their own preferred way to handle PDFs - for example Chrome will display the PDF in the browser, whereas others may download the file.

To ensure your file is transmitted correctly, you should use the (empty) template. The static resource becomes a link to the file as long as you use this template. If you need to add some meta information to the resource via some Template Variables, and you create your own 'empty' template to enable this, then you must set the contents of the template to \[\[\*content\]\] before it will work correctly.

## See Also

1. [Content Types](building-sites/resources/content-types)
2. [Named Anchor](building-sites/integrating-templates/named-anchor)
3. [Static Resource](building-sites/resources/static-resource)
4. [Symlink](building-sites/resources/symlink)
   1. [Using Resource Symlinks](building-sites/resources/symlink/using-resource-symlinks)
5. [Weblink](building-sites/resources/weblink)
