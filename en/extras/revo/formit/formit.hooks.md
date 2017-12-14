---
title: "FormIt.Hooks"
_old_id: "856"
_old_uri: "revo/formit/formit.hooks"
---

<div>- [FormIt Hooks](#FormIt.Hooks-FormItHooks)
  - [Using preHooks](#FormIt.Hooks-UsingpreHooks)
  - [Using hooks](#FormIt.Hooks-Usinghooks)
- [Built-In Hooks](#FormIt.Hooks-BuiltInHooks)
- [Custom Hooks](#FormIt.Hooks-CustomHooks)
  - [Registering custom hooks](#FormIt.Hooks-Registeringcustomhooks)
  - [Accessing the FormIt fields in the Hook](#FormIt.Hooks-AccessingtheFormItfieldsintheHook)
  - [Custom hook return values](#FormIt.Hooks-Customhookreturnvalues)
- [File-based Hooks](#FormIt.Hooks-FilebasedHooks)

</div>FormIt Hooks
------------

 Hooks are basically scripts that run after a form is validated by FormIt. They can be chained; the first hook will execute, and if succeeds, will proceed onto the next hook. If a hook fails, it will not proceed to the next hook, but return back to the form with any error messages sent.

 Hooks may also be Snippet names, which will then execute the Snippet as a hook.

 There are two types of hooks:

- A 'preHook', specified via the 'preHooks' property on the FormIt snippet, that executes when the form loads. Useful for pre-loading values.
- The normal hook, specified via the 'hooks' property on the FormIt snippet, that executes after the form is validated. Useful for custom post-processing.

### Using preHooks

 Just specify the preHook in the 'preHooks' property in your FormIt snippet call. There are no built-in preHooks, but if you had a preHook called 'loadCustomValues':

 ```
<pre class="brush: php">[[!FormIt? &preHooks=`loadCustomValues`]]

``` Would then run the 'loadCustomValues' snippet before loading the form. You could then set fields on the form like so:

 ```
<pre class="brush: php"><?php
$hook->setValue('name','John Doe');
$hook->setValue('email','john.doe@fake-emails.com');
return true;

``` Or alternatively using ->setValues:

 ```
<pre class="brush: php"><?php
$hook->setValues(array(
  'name' => 'John Doe',
  'email' => 'john.doe@fake-emails.com',
));
return true;

``` Note that using the **setValues()** method here will make the corresponding placeholders available to your email chunk; the effect of manually setting values is similar to adding hidden fields to your form.

 You can do whatever you want in the preHook as well. Remember to return true if your preHook or Hook is successful. If you want to add an error message to a field:

 ```
<pre class="brush: php">$hook->addError('user','User not found.');
return $hook->hasErrors();

```### Using hooks

 Simply specify the hook in the 'hooks' property in your FormIt snippet call. For example, this loads the spam and email hooks:

 ```
<pre class="brush: php">[[!FormIt? &hooks=`spam,email`]]

```Built-In Hooks
--------------

 This is a list of the built-in hooks packaged with FormIt:

- [email](/extras/revo/formit/formit.hooks/formit.hooks.email "FormIt.Hooks.email")
- [redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect "FormIt.Hooks.redirect")
- [spam](/extras/revo/formit/formit.hooks/formit.hooks.spam "FormIt.Hooks.spam")
- [math](/extras/revo/formit/formit.hooks/formit.hooks.math "FormIt.Hooks.math")
- [recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha "FormIt.Hooks.recaptcha")
- [FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder "FormIt.Hooks.FormItAutoResponder")

 The redirect hook (if used) should always be the last hook specified. Remember that the hooks execute in the order they are specified in the property.

Custom Hooks
------------

 Any snippet can be used as a custom hook with Formit. The snippet should return true on success and either false or an array of error messages on failure (see below). If the snippet returns false, hooks listed after the snippet in the &hooks parameter will not execute. If the snippet is not found, the hooks following it in the list _will_ execute.

### Registering custom hooks

 To register a custom hook, just add the name of the snippet to the &hooks parameter. The hooks will execute in the order that they appear in the &hooks parameter. Your snippet can be at any position in the list.

### Accessing the FormIt fields in the Hook

 The Formit fields are available via the hook api. Example:

 ```
<pre class="brush: php">$email = $hook->getValue('email');
$allFormFields = $hook->getValues();

``` If you want to **set** fields, however, you'll need to access them this way:

 ```
<pre class="brush: php">$hook->setValue('email','john.doe@fake-emails.com');
$hook->setValues(array(
  'name' => 'John Doe',
  'books' => 'Hunger Games,To Kill a Mockingbird,Mindset',
)); 
``` If you want to set an array field (i.e. a checkbox group with the same name, a select multiple field) in a preHook, you have to json\_encode the array value.

 ```
<pre class="brush: php">$hook->setValue('hobbies',json_encode(array('music','films','books')));

```### Accessing FormIt scriptProperties (config)

 Properties passed to the FormIt Snippet call are available in the config property of the $formit object exposed in a Hook.

 ```
<pre class="brush: php">$hook->formit->config['key']

```### 

### Custom hook return values

 Snippets should **return true** on success. On failure, the snippet can set error messages in the hook object's errors variable and return false. In either case, hooks listed after the custom hook in the &hooks parameter will not execute.

 The fiHooks object is available in the snippet as $hook, which can be used to return generic error messages from the snippet:

 ```
<pre class="brush: php">$errorMsg = 'User not found';
$hook->addError('user',$errorMsg);
return false;

``` Again, remember - if your hook succeeds, make sure you have "return true;" at the end of your Hook. If you use "return false;" or do not return a value, FormIt will assume the Hook failed. Also, be sure that any custom hooks you specify come before the redirect hook in the hooks property.

File-based Hooks
----------------

 FormIt 2.0.0+ supports file-based hooks and preHooks. This means that you can point FormIt straight to a PHP file to use as a custom hook. For example:

 ```
<pre class="brush: php">[[!FormIt? 
  &hooks=`[[++assets_path]]hooks/my.hook.php`
]]

``` This will evaluate the MODX tags in the hook line, and then look for the hook at assets/hooks/my.hook.php. If the file is found, it will evaluate the hook from there.