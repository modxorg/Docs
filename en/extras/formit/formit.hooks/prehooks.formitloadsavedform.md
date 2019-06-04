---
title: "FormIt.PreHooks.FormItLoadSavedForm"
_old_id: "1808"
_old_uri: "revo/formit/formit.hooks/formit.prehooks.formitloadsavedform"
---

## The FormItLoadSavedForm preHook

This pre-hook will load the data for submitted forms by the provided hash, which is also available on the CMP of FormIt. It needs to be used together with the [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)

## Usage

To use the preHook, you need to use the following snippet call

``` php
[[!FormIt?
    &preHooks=`FormItLoadSavedForm`
    &updateSavedForm=`true`
    &savedFormHashKeyField=`yourCustomGetParameter`
    &hooks=`FormItSaveForm`
    &formFields=`name,address,zipCode,town` // parameter of FormItSaveForm
]]
// open the page in the browser
// http://your-domain.com/path/to/form?yourCustomGetParameter=<FormHashFromFormItCMP>
```

Please note: you must not use the parameter `fieldNames` because it makes assigning the form values to the fields impossible

## Available Properties

It has the following properties to be passed into the FormIt snippet call:

| name                  | description                                                                                 |
| --------------------- | ------------------------------------------------------------------------------------------- |
| savedFormHashKeyField | The get parameter to take the submission hash from the url. Defaults to "savedFormHashKey". |
| updateSavedForm       | If loading the previously submitted form values should be possible. Defaults to false.      |
| returnValueOnFail     | If the preHook should return true on fail. Defaults to true                                 |

## See Also

1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
5. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
7. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
8. [FormIt.PreHooks.FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
