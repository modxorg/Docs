---
title: "FormIt.PreHooks.FormItLoadSavedForm"
_old_id: "1808"
_old_uri: "revo/formit/formit.hooks/formit.prehooks.formitloadsavedform"
---

##  The FormItLoadSavedForm preHook

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

1. [FormIt.Hooks.email](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.math](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.hooks.math)
4. [FormIt.Hooks.recaptcha](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
5. [FormIt.Hooks.redirect](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.hooks.redirect)
6. [FormIt.Hooks.spam](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.hooks.spam)
7. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
8. [FormIt.PreHooks.FormItLoadSavedForm](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.prehooks.formitloadsavedform)