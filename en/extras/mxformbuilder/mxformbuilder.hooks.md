---
title: "Hooks"
_old_id: "1661"
_old_uri: "revo/mxformbuilder/mxformbuilder.hooks"
---

## What are hooks?

 mxFormBuilder hooks are a way to extend beyond the built-in processors and customize the form rendering or performing additional actions after a successful submission. There are two types of hooks; the first is **preHooks** which runs before a form is rendered allowing you to modify what the parser renders to the page, then the other is **hooks** which are called after a successful submission is completed.

 In both types of hooks the full mxFormBuilder form object is extended allowing you to directly modify aspects and/or consume user input. The default variable is simply **_$hook_** which you call in your snippet.

## How to use them

 There are to many ways for which you can use a hook either before or after processing depending on your needs. As stated there are two points in the processing at which mxFormBuilder currently will call the hooks; preHooks and hooks. First point is during the fields generation for UI presentation, this is the preHooks parameter as a comma separated string of snippets. Each snippet is called in the order they are set in the string and requires that a **_true_** be returned in order to continue processing any further snippets in the list.

## Hook — _preHooks_

 The _preHooks_ parameter allows you to specify a snippet to run prior to the form rendering fields. Using these hooks you can modify or change form field values based on your needs. Additional ability to completely modify the HTML output from a specific field is also possible here as well. Enter the names of the snippets you want to run and then you can reference all the mxFormBuilder properties you need through the set variable _**$hook**_ and _**$fields**_in the snippet being called_._

## Hook — _hooks_

 Just like the preHooks the hooks parameter allows you to set a number of snippets to call via comma separated list of names. Each snippet is called in order as listed in the string and will continue processing as long as each one returns _**true**_ as a response from the snippet being called, telling mxFormBuilder to continue processing.

## $fields — Accessing form fields
