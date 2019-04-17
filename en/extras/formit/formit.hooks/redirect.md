---
title: "redirect"
_old_id: "861"
_old_uri: "revo/formit/formit.hooks/formit.hooks.redirect"
---

## The redirect hook

The redirect hook will redirect the user to a specified Resource when their form finishes submitting. It requires one parameter, _redirectTo_, which must the ID of the Resource you want to redirect to. The field values will **not** be forwarded.

## Available Properties

| name           | description                                                                             |
| -------------- | --------------------------------------------------------------------------------------- |
| redirectTo     | Required. The ID of the resource to to redirect the user to on a successful submission. |
| redirectParams | A JSON object of parameters to pass in the redirect URL.                                |

Note that this can also be used with the &store property to send the form values off to the redirected-to page, using the [FormItRetriever](extras/formit/formit.formitretriever "FormIt.FormItRetriever") snippet.

## Usage

Just include the redirect hook in your &hooks property on the FormIt call. Then specify the ID of the Resource to redirect to with the &redirectTo property.

### Redirecting with Parameters

You can specify parameters to redirect with when using this hook. Simply use the &redirectParams property:

 ``` php
[[!FormIt?
   &hooks=`redirect`
   &redirectTo=`212`
   &redirectParams=`{"user":"123","success":"1"}`
]]
```

That will build the URL with those params. Say the Resource ID 212 is at books.html, then the redirect URL would be:

- books.html?user=123&success=1

## See Also

1. [FormIt.Hooks.email](extras/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.math](extras/formit/formit.hooks/formit.hooks.math)
4. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/formit.hooks.recaptcha)
5. [FormIt.Hooks.redirect](extras/formit/formit.hooks/formit.hooks.redirect)
6. [FormIt.Hooks.spam](extras/formit/formit.hooks/formit.hooks.spam)
7. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
8. [FormIt.PreHooks.FormItLoadSavedForm](https://docs.modx.com/extras/revo/formit/formit.hooks/formit.prehooks.formitloadsavedform)
