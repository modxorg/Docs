---
title: "FormIt.FormItRetriever"
_old_id: "853"
_old_uri: "revo/formit/formit.formitretriever"
---

<div>- [What is FormItRetriever?](#FormIt.FormItRetriever-WhatisFormItRetriever%3F)
- [Usage](#FormIt.FormItRetriever-Usage)
  - [FormItRetriever Properties](#FormIt.FormItRetriever-FormItRetrieverProperties)
- [Example](#FormIt.FormItRetriever-Example)
- [See Also](#FormIt.FormItRetriever-SeeAlso)

</div>What is FormItRetriever?
------------------------

 FormItRetriever is an assistance snippet for [FormIt](/extras/revo/formit "FormIt") that will grab the data of a user's last form submission via FormIt. This is useful for "Thank You" pages where a user is sent after submitting a form.

Usage
-----

 Simply add this Snippet to whatever page you are redirecting from using FormIt's &redirectTo property, and set &store=`1` in the FormIt call:

 ```
<pre class="brush: php">[[!FormItRetriever]]

``` And then display your form data with placeholders relating to the names of your form fields like such:

 ```
<pre class="brush: php"><p>Thanks [[!+fi.name]] for submitting. An email will be sent to you at [[!+fi.email]].</p>

``` Remember to set &store=`1` in your FormIt call, so FormIt knows to store the value.

<div class="note"> Make sure to call the placeholders uncached. This data changes on every request, so therefore the placeholders need to change every request too. </div>### FormItRetriever Properties

 FormItRetriever comes with some default properties you can override. They are:

 <table id="TBL1376497247012"><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> placeholderPrefix </td> <td> A string to prefix all placeholders for form fields that will be set by this Snippet. </td> <td> fi. </td> </tr><tr><td> redirectToOnNotFound </td> <td> If the data is not found and if this is set, redirect to the Resource with this ID. </td> <td> </td> </tr><tr><td> eraseOnLoad </td> <td> If true, will erase the stored form data on load. Strongly recommended to leave to false unless you only want the data to load once. </td> </tr><tr><td> storeLocation </td> <td> Where to get the form data from. Should be equal to the storeLocation property of your FormIt snippet call. Possible values are 'cache' and 'session'. Defaults to 'cache'. </td> <td>cache</td></tr></tbody></table>Example
-------

 Submit a form with auto-response and anti-spam protection, then redirect to a Thank You page where it loads the last form submission, and if it's not found, redirects to the resource with ID 444.

 On your form page:

 ```
<pre class="brush: php">[[!FormIt?
   &submitVar=`go`
   &hooks=`spam,FormItAutoResponder,redirect`
   &emailTo=`my@email.com`
   &store=`1`
   &redirectTo=`123`
]]
<form action="[[~[[*id]]]]" method="post">
    <input type="hidden" name="nospam" value="" />
    <label for="name">Name: [[!+fi.error.name]]</label>
    <input type="text" name="name:required" id="name" value="[[!+fi.name]]" />
    <label for="email">Email: [[!+fi.error.email]]</label>
    <input type="text" name="email:email:required" id="email" value="[[!+fi.email]]" />
    <label for="message">Message: [[!+fi.error.message]]</label>
    <textarea name="message:stripTags" id="message" cols="55" rows="7">[[!+fi.message]]</textarea>
    <br />
    <input type="submit" name="go" value="Send Contact Inquiry" />
</form>

``` On your Thank You page (Resource ID 123):

 ```
<pre class="brush: php">[[!FormItRetriever? &redirectToOnNotFound=`444`]]
<p>Thanks [[!+fi.name]] for submitting. An auto-response email will be sent to you at [[!+fi.email]]. Here's a copy of your message:</p>
[[!+fi.message]]

```See Also
--------

1. [FormIt.Hooks](/extras/revo/formit/formit.hooks)
  1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
  2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
  3. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
  4. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
  5. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
  6. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)
2. [FormIt.Validators](/extras/revo/formit/formit.validators)
3. [FormIt.FormItRetriever](/extras/revo/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](/extras/revo/formit/formit.tutorials-and-examples)
  1. [FormIt.Examples.Custom Hook](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.custom-hook)
  2. [FormIt.Examples.Simple Contact Page](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)
  3. [FormIt.Handling Selects, Checkboxes and Radios](/extras/revo/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios)
  4. [FormIt.Using a Blank NoSpam Field](/extras/revo/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field)
5. [FormIt.Roadmap](/extras/revo/formit/formit.roadmap)
6. [FormIt.FormItCountryOptions](/extras/revo/formit/formit.formitcountryoptions)
7. [FormIt.FormItStateOptions](/extras/revo/formit/formit.formitstateoptions)