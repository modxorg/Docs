---
title: "Tutorials and Examples"
_old_id: "864"
_old_uri: "revo/formit/formit.tutorials-and-examples/"
---

This page is a list of tutorials and examples for FormIt, as well as general usage tips.

## Tutorials

### Building Your Form

- [Handling Selects, Checkboxes and Radios](extras/formit/formit.tutorials-and-examples/handling-selects,-checkboxes-and-radios "FormIt.Handling Selects, Checkboxes and Radios")
- [Using a Blank NoSpam Field](extras/formit/formit.tutorials-and-examples/using-a-blank-nospam-field "FormIt.Using a Blank NoSpam Field")

### Email Handling

- [Specifying a To Address in the Form](extras/formit/formit.hooks/email#FormIt.Hooks.email-SpecifyingaDynamicToAddress)
- [Using a Subject Field as the Email Subject Line](extras/formit/formit.hooks/email#FormIt.Hooks.email-UsingaSubjectFieldastheEmailSubjectLine)

### Redirection

- [Redirecting to Another Page After Success](extras/formit/formit.hooks/redirect "FormIt.Hooks.redirect")
- [Redirecting with GET Parameters](extras/formit/formit.hooks/redirect#FormIt.Hooks.redirect-RedirectingwithParameters)

## Examples

- [Simple Contact Page](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page "FormIt.Examples.Simple Contact Page")

## Troubleshooting

Sometimes your form just seems to hang: you submit it, but nothing happens. What's going on?

A common error here is with validation. Try removing the **&validation** portion of the Snippet to see if that fixes the form. If it does, then you know that's where your problem is. A common error occurs when the validation rules reference the incorrect field names. For example, if you've changed the field names from what they were in the example, you must also change the field names used in the validation rules.

For example, if your form reads in part:

``` html
...
<input type="text" name="firstname" id="firstname" value="[[!+fi.firstname]]" />
...
```

Then the following validation rule will not work (for a full example of the Snippet call, see [here](extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page "FormIt.Examples.Simple Contact Page")):

``` php
...
&validate=`name:required`
...
```

Why? See how the field name is named "firstname" whereas the validation rule is looking for a field named "name"? Check these very carefully as you build and test your form.

Other reason that can cause FormIt silently failing is the lack of the "name" attribute in your form fields. Be sure to add the name attribute to all fields or FormIt will fail without returning any errors.

## See Also

1. [FormIt.Hooks](extras/formit/formit.hooks)
2. [FormIt.Validators](extras/formit/formit.validators)
3. [FormIt.FormItRetriever](extras/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](extras/formit/formit.tutorials-and-examples)
5. [FormIt.Roadmap](extras/formit/formit.roadmap)
6. [FormIt.FormItCountryOptions](extras/formit/formit.formitcountryoptions)
7. [FormIt.FormItStateOptions](extras/formit/formit.formitstateoptions)
