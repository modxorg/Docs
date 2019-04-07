---
title: "FormSave"
_old_id: "645"
_old_uri: "revo/formsave"
---

# What is FormSave?

FormSave is a hook for FormIt that allows you to save virtually any form to the database and export the results to CSV/XML/Print view right out of the box. You can also add your own export templates to make any export format possible.

FormSave is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

## Requirements

FormSave requires MODX® Revolution 2.2.0 or later.

## History

| Version   | Release date     | Author                                                                                                                                      | Changes                                            |
| --------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------- |
| 1.0.1-PL1 | June 8th, 2012   | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Added ability to delete form entries, fixed a bug. |
| 1.0.0-PL1 | April 24th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release.                                   |

## Download & Installation

Install the package through the MODX® package manager.

# What you need to know

FormSave is a hook for FormIt, this means you need FormIt installed and you need to know how FormIt works. Check out the RTFM for FormIt if you don't know what FormIt is.

# Using FormSave in the front-end

## Using the snippet

As an example we'll use the call from FormIt's example contact page which looks like this:

 ``` php
[[!FormIt?
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
```

But now we want to save the form to the database to view the results later. To do this we simply add the hook and a parameter to the FormIt call:

 ``` php
[[!FormIt?
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
```

These are the parameters you can use in the FormIt call:

| Parameter       | Explanation                                                                                                       |
| --------------- | ----------------------------------------------------------------------------------------------------------------- |
| fsFormTopic     | The topic for the form. Used to separate multiple forms. (Defaults to "form")                                     |
| fsFormFields    | A comma separated list of fields to save, if omitted all form fields will be saved. (example: name,email,message) |
| fsFormPublished | Whether or not the form should have published "1" in the database. Currently unused.                              |

# External sources

Developers website: <http://scherpontwikkeling.nl/modx/formsave>

[](http://www.scherpontwikkeling.nl/portfolio/modx-addons/formsave.html)

GitHub repository: <http://www.github.com/b03tz/FormSave/>

Report bugs and request features: <http://www.github.com/b03tz/FormSave/issues>
