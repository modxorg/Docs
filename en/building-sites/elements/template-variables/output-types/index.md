---
title: "Template Variable Output Types"
_old_id: "303"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types"
---

## Output Types for TVs

Output Types (also called Renders) on [Template Variables](building-sites/elements/template-variables "Template Variables") allow you to format the value of a TV to any different kind of output - such as a URL, image, date, or anything else you can think of.

For example, say you have a TV that uses a Textbox as its Input Type. The user would then choose an Image through the TV input on their Resource. That's great - except your TV only outputs the URL of the image! You want it to output the image itself. So you'd then choose the Output Render of the TV to be an Image, and boom! Your image TV now outputs the image directly! Sweet, huh?

MODX Revolution comes packaged with a few default Output Types. You can also [create your own](_legacy/making-sites-with-modx/adding-a-custom-tv-output-type "Adding a Custom TV Output Type"), if you know a little PHP. The list of pre-packaged ones are:

1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)

## See Also

1. [Creating a Template Variable](building-sites/elements/template-variables/step-by-step)
2. [Bindings](building-sites/elements/template-variables/bindings)
     1. [CHUNK Binding](building-sites/elements/template-variables/bindings/chunk-binding)
     2. [DIRECTORY Binding](building-sites/elements/template-variables/bindings/directory-binding)
     3. [FILE Binding](building-sites/elements/template-variables/bindings/file-binding)
     4. [INHERIT Binding](building-sites/elements/template-variables/bindings/inherit-binding)
     5. [RESOURCE Binding](building-sites/elements/template-variables/bindings/resource-binding)
     6. [SELECT Binding](building-sites/elements/template-variables/bindings/select-binding)
3. [Template Variable Input Types](building-sites/elements/template-variables/input-types)
4. [Template Variable Output Types](building-sites/elements/template-variables/output-types)
     1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
     2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
     3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
     4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
     5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)
5. [Adding a Custom TV Type - MODX 2.2](extending-modx/custom-tvs)
6. [Creating a multi-select box for related pages in your template](building-sites/tutorials/multiselect-related-pages)
7. [Accessing Template Variable Values via the API](extending-modx/snippets/accessing-tvs)
