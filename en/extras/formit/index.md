---
title: "FormIt"
_old_id: "644"
_old_uri: "revo/formit"
---

## What is FormIt?

 FormIt is a dynamic form processing [Snippet](developing-in-modx/basic-development/snippets "Snippets") for MODX Revolution. It handles a form after submission, performing validation and followup actions like sending an email. It does not generate the form, but it can repopulate it if it fails validation.

## History

 FormIt was written by Shaun McCormick as a form processing Extra, and first released on October 19th, 2009. It is currently maintained by the team at Sterc.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/formit>

### Development and Bug Reporting

 FormIt is stored and developed in GitHub, and can be found here: <https://github.com/Sterc/FormIt>

 Bugs can be filed here: <https://github.com/Sterc/FormIt/issues>[](http://bugs.modx.com/projects/FormIt/issues)

 API Documentation can also be found here: <http://api.modx.com/formit/>

### Important changes

 FormIt 3.0 introduces an update to the encryption methods used for encrypting form submissions. Prior to 3.0 mcrypt was used, which in 3.0 is replaced with openssl, due to mcrypt being deprecated as of PHP 7.2. FormIt 3.0 comes with a migration page which is accessible from the manager.

 As of FormIt 2.2.9, all fields will automatically have `html_entities` applied. To allow HTML tags to be saved/stored, you will need to use the `allowSpecialChars` validator on each field, that should save raw html tags.

 As of FormIt 1.1.4, all fields will automatically have `stripTags` applied. To allow HTML tags to be saved/stored, you will need to use the `allowTags` validator on each field, stipulating which tags are permitted.

## How to Use

 Simply place the FormIt snippet call into the Resource that contains the form you want to use. Unlike similar predecessors (most notably eForm in MODx Evolution), you do not put the form into a Chunk and reference the Chunk in the FormIt snippet call: you literally put the snippet call along side the form you want it to process. Specify the "hooks" (or post-validation processing scripts) in the snippet call. Then add validation via the _&validate_ and _&customValidators_ parameters in the snippet tag.

 If you have multiple forms on a page, set the _&submitVar_ property on your Snippet call to a name of a form element within the form (ie, &submitVar=`form1-submit`). This tells FormIt to only process form requests with that POST variable. Multiple forms should be used with INPUT type="submit" name="form1-submit", button elements have been reported not working.

### Available Properties

 These are the available general properties for the FormIt call (not including hook-specific properties):

| Name                      | Description                                                                                                                                                                                                                                                                                                                                                                                                          | Default Value                                                               |
|---------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------|
| preHooks                  | What scripts to fire, if any, once the form loads. This can be a comma-separated list of [hooks](extras/formit/formit.hooks "FormIt.Hooks"), and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet.                                                                                                                                            |                                                                             |
| renderHooks               | What scripts to fire, if any, once the form loads, preHooks are finished and all fields & errors has been set. This can be a comma-separated list of [hooks](https://docs.modx.com/extras/revo/formit/formit.hooks) used for manipulating all the fields of the form before everything is set based on given data from other packages or preHooks. A hook can also be a Snippet name that will execute that Snippet. |                                                                             |
| hooks                     | What scripts to fire, if any, after the form passes validation. This can be a comma-separated list of [hooks](https://docs.modx.com/extras/revo/formit/formit.hooks), and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet.                                                                                                                   |                                                                             |
| submitVar                 | If set, will not begin form processing if this POST variable is not passed. Notice: Needed if you use `&store` property (+ set submit var in input="submit"!).                                                                                                                                                                                                                                                         |                                                                             |
| validate                  | A comma-separated list of fields to validate, with each field name as name:validator (eg: `username:required,email:required`). [Validators](extras/formit/formit.validators "FormIt.Validators") can also be chained, like `email:email:required`. This property can be specified on multiple lines.                                                                                                                     |                                                                             |
| validationErrorMessage    | A general error message to set to a placeholder `[[!+fi.validation_error_message]]` if validation fails. Can contain `[[+errors]]` if you want to display a list of all errors at the top.                                                                                                                                                                                                                           | A form validation error occurred. Please check the values you have entered. |
| validationErrorBulkTpl    | HTML tpl that is used for each individual error in the generic validation error message value.                                                                                                                                                                                                                                                                                                                       | `[[+error]]`                                                                |
| errTpl                    | The wrapper html for error messages. Note: not a chunk, just straight HTML.                                                                                                                                                                                                                                                                                                                                          | `[[+error]]`                                                                |
| customValidators          | A comma-separated list of custom validator names (snippets) you plan to use in this form. They must be explicitly stated here, or they will not be run.                                                                                                                                                                                                                                                              |                                                                             |
| clearFieldsOnSuccess      | If true, will clear the fields on a successful form submission that does not redirect.                                                                                                                                                                                                                                                                                                                               | 1                                                                           |
| store                     | If true, will store the data in the cache for retrieval using the [FormItRetriever](extras/formit/formit.formitretriever "FormIt.FormItRetriever") snippet.                                                                                                                                                                                                                                                          | 0                                                                          |
| storeTime                 | If 'store' is set to true, this specifies the number of seconds to store the data from the form submission. Defaults to five minutes.                                                                                                                                                                                                                                                                                | 300                                                                         |
| storeLocation             | When using store, this defines where the form is stored after submit. Possible options are 'cache' and 'session'. Defaults to 'cache'.                                                                                                                                                                                                                                                                              | cache                                                                       |
| placeholderPrefix         | The prefix to use for all placeholders set by FormIt for fields. Make sure to include the '.' separator in your prefix.                                                                                                                                                                                                                                                                                              | fi.                                                                         |
| successMessage            | If not using the redirect hook, display this success message after a successful submission.                                                                                                                                                                                                                                                                                                                          |                                                                             |
| successMessagePlaceholder | The name of the placeholder to set the success message to.                                                                                                                                                                                                                                                                                                                                                           | fi.successMessage                                                           |
| redirectTo                | page ID of a "Thank You" page, where the visitor can be sent after successfully submitting the form, but this parameter is read ONLY if you include "redirect" in the list of &hooks.                                                                                                                                                                                                                                |                                                                             |
| allowFiles                | Specify if files are allowed to be posted. Submitted files are stored in a temporary directory to prevent files getting lost in multistep forms.                                                                                                                                                                                                                                                                     | true                                                                        |
| attachFilesToEmail        | Attaches uploaded files in email, form needs to be set as enctype="multipart/form-data"                                                                                                                                                                                                                                                                                                                              | true                                                                        |


## Validation

 Validation in FormIt is done via the &validate property, and can be used to automatically handle validation on any of the fields in your form.

 For more information on validation in FormIt, see the [Validators](extras/formit/formit.validators "FormIt.Validators") page.

## Hooks

 Hooks are basically scripts that run during FormIt processing. The hooks always execute in the order they appear in the property. If, for example, you have an email hook followed by a validation hook, the email will be sent before the validation occurs.

If any hook fails, the ones following it will not execute.

 For more information on hooks, see the [Hooks](extras/formit/formit.hooks "FormIt.Hooks") page.

## See Also

1. [FormIt.Hooks](extras/formit/formit.hooks)
    1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
    2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
    3. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
    4. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
    5. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
    6. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
    7. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
2. [FormIt.Validators](extras/formit/formit.validators)
3. [FormIt.FormItRetriever](extras/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](extras/formit/formit.tutorials-and-examples)
    1. [FormIt.Examples.Custom Hook](extras/formit/formit.tutorials-and-examples/examples.custom-hook)
    2. [FormIt.Examples.Simple Contact Page](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page)
    3. [FormIt.Handling Selects, Checkboxes and Radios](extras/formit/formit.tutorials-and-examples/handling-selects,-checkboxes-and-radios)
    4. [FormIt.Using a Blank NoSpam Field](extras/formit/formit.tutorials-and-examples/using-a-blank-nospam-field)
5. [FormIt.Roadmap](extras/formit/formit.roadmap)
6. [FormIt.FormItCountryOptions](extras/formit/formit.formitcountryoptions)
7. [FormIt.FormItStateOptions](extras/formit/formit.formitstateoptions)
