---
title: "Adding Custom Fields to Manager Forms"
_old_id: "14"
_old_uri: "2.x/case-studies-and-tutorials/adding-custom-fields-to-manager-forms"
---

Adding a Custom Field
---------------------

Adding custom fields to manager forms - such as the Create Chunk, Update Resource, etc - in MODx Revolution is fairly straightforward. You just use the On\*FormRender Plugin events.

We want to add a field called 'Home' that puts an address field into the manager interface, and then stores it into the longtitle value (this is not the best place to store it, but let's go along with it for tutorial purposes :) ).

To do so, we'd create a [Plugin](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins") and associate it to the **OnDocFormRender** and **OnDocFormSave** events. Our code would look like this:

```
<pre class="brush: php">
<?php
/**
 * Register a form field to forms
 */
switch ($modx->event->name) {
    case 'OnDocFormPrerender':
        /* if you want to add custom scripts, css, etc, register them here */
        break;
    case 'OnDocFormRender':
        $v = '';
        if (isset($scriptProperties['resource'])) {
            /* on the update screen, so set the value */
            $v = $scriptProperties['resource']->get('longtitle');
        } else {
            /* on the create screen, so set the default */
            $profile = $modx->user->getOne('Profile');
            $v = $profile->get('address');
        }
        /* now do the HTML */
        $fields = '
<div class="x-form-item x-tab-item">
    <label class="x-form-item-label" style="width:150px;">Home</label>
    <div class="x-form-element">
        <input type="text" name="home" value="'.$v.'" class="x-form-text x-form-field" />
    </div>
</div>
';
        $modx->event->output($fields);
break;
    case 'OnDocFormSave':
        /* do processing logic here. */
        $resource =& $scriptProperties['resource'];
        $resource->set('longtitle',$_POST['home']);
        $resource->save();
        break;
}
return;

```Note the CSS classes and styling in the form HTML. Those are unnecessary; but will make the form "match" the styling of the rest of the fields.