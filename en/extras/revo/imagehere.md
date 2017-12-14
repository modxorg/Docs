---
title: "imageHERE"
_old_id: "662"
_old_uri: "revo/imagehere"
---

What is imageHERE?
------------------

imageHERE is a simple, easy-to-use rapid prototyping tool, to insert placeholder images in your markup during development. Is uses the holder.js script by: Ivan Malopinsky

<http://imsky.github.com/holder/>

### Current Version

Version: 1.0.0-beta

Since: November 2nd, 2012

USAGE
-----

Use imageHERE by calling the chunk into your template or content, like this:

\[\[$imageHERE\]\]

An example with options:

\[\[$imageHERE?

 &w=`600`

 &h=`400`

 &bg=`#555`

 &fg=`#fff`

 &text=`Custom Text`

 &alt=`alt text here`

\]\]

- &w => width of placeholder. Defaults to 300.
- &h => height of placeholder. Defaults to 200.
- &bg => background color in hex format. MUST be used with &fg in order to have effect.
- &fg => foreground (text) color in hex format. MUST be used with &bg in order to have effect.
- &text => custom text. Defaults to "width x height".
- &alt => add image alt text, if validation is important to you during prototyping ;)

Not shown here is the &attr property which allows you to insert any attribute you wish into the image element. For example: &attr=`class="myClass"`.

You can also set these properties in the Chunk properties tab, and then every usage of the Chunk will use that property set by default. Set multiple property sets and call them like this: \[\[$imageHERE@myPropertySet\]\]

When you're done prototyping, disable the imageHERE plugin so that holder.js is no longer included in your page. Or, uninstall imageHERE via Package Management.