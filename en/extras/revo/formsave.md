---
title: "FormSave"
_old_id: "645"
_old_uri: "revo/formsave"
---

<div>- [What is FormSave?](#FormSave-WhatisFormSave%3F)
  - [Requirements](#FormSave-Requirements)
  - [History](#FormSave-History)
  - [Download & Installation](#FormSave-Download%26Installation)
- [What you need to know](#FormSave-Whatyouneedtoknow)
- [Using FormSave in the front-end](#FormSave-UsingFormSaveinthefrontend)
  - [Using the snippet](#FormSave-Usingthesnippet)
- [External sources](#FormSave-Externalsources)

</div>What is FormSave?
=================

FormSave is a hook for FormIt that allows you to save virtually any form to the database and export the results to CSV/XML/Print view right out of the box. You can also add your own export templates to make any export format possible.

FormSave is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

Requirements
------------

FormSave requires MODX® Revolution 2.2.0 or later.

History
-------

<table><tbody><tr><th>Version</th> <th>Release date</th> <th>Author</th> <th>Changes</th> </tr><tr><td>1.0.1-PL1</td> <td>June 8th, 2012</td> <td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td> <td>Added ability to delete form entries, fixed a bug.</td> </tr><tr><td>1.0.0-PL1</td> <td>April 24th, 2012</td> <td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td> <td>Initial release.</td></tr></tbody></table>Download & Installation
-----------------------

Install the package through the MODX® package manager.

What you need to know
=====================

FormSave is a hook for FormIt, this means you need FormIt installed and you need to know how FormIt works. Check out the RTFM for FormIt if you don't know what FormIt is.

Using FormSave in the front-end
===============================

Using the snippet
-----------------

As an example we'll use the call from FormIt's example contact page which looks like this:

```
<pre class="brush: php">[[!FormIt?
   &hooks=`recaptcha,spam,email,redirect`
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &redirectTo=`123`
   &validate=`name:required,
      email:email:required,
      subject:required,
      text:required:stripTags,
      numbers:required,
      colors:required`
]]

```But now we want to save the form to the database to view the results later. To do this we simply add the hook and a parameter to the FormIt call:

```
<pre class="brush: php">[[!FormIt?
   &hooks=`recaptcha,spam,FormSave,email,redirect`      <-- added the hook here after spam and recaptcha check
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &redirectTo=`123`
   &fsFormTopic=`contact`                               <-- added the form topic to specify which form this is
   &validate=`name:required,
      email:email:required,
      subject:required,
      text:required:stripTags,
      numbers:required,
      colors:required`
]]

```These are the parameters you can use in the FormIt call:

<table><tbody><tr><th>Parameter</th> <th>Explanation</th> </tr><tr><td>fsFormTopic</td> <td>The topic for the form. Used to separate multiple forms. (Defaults to "form")</td> </tr><tr><td>fsFormFields</td> <td>A comma separated list of fields to save, if omitted all form fields will be saved. (example: name,email,message)</td> </tr><tr><td>fsFormPublished</td> <td>Whether or not the form should have published "1" in the database. Currently unused.</td></tr></tbody></table>External sources
================

Developers website: <http://scherpontwikkeling.nl/modx/formsave>

[](http://www.scherpontwikkeling.nl/portfolio/modx-addons/formsave.html)

GitHub repository: <http://www.github.com/b03tz/FormSave/>

Report bugs and request features: <http://www.github.com/b03tz/FormSave/issues>

  