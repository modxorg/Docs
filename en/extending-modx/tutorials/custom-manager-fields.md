---
title: "Custom Fields in the Manager"
_old_id: "14"
_old_uri: "2.x/case-studies-and-tutorials/adding-custom-fields-to-manager-forms"
---

## Where a form field comes from

A field you add to a Manager form is a [Plugin](extending-modx/plugins "Plugins"). Its render event prints the HTML, the element's save event stores the submitted value.

Each form has its own set of events; no event covers all of them.

| Form | Before the form | In the form | Before save | After save |
| --- | --- | --- | --- | --- |
| Resource | `OnDocFormPrerender` | `OnDocFormRender` | `OnBeforeDocFormSave` | `OnDocFormSave` |
| Resource, Custom Fields tab | `OnResourceTVFormPrerender` | `OnResourceTVFormRender` | `OnBeforeDocFormSave` | `OnDocFormSave` |
| Chunk | `OnChunkFormPrerender` | `OnChunkFormRender` | `OnBeforeChunkFormSave` | `OnChunkFormSave` |
| Snippet | `OnSnipFormPrerender` | `OnSnipFormRender` | `OnBeforeSnipFormSave` | `OnSnipFormSave` |
| Template | `OnTempFormPrerender` | `OnTempFormRender` | `OnBeforeTempFormSave` | `OnTempFormSave` |
| Template Variable | `OnTVFormPrerender` | `OnTVFormRender` | `OnBeforeTVFormSave` | `OnTVFormSave` |
| Plugin | `OnPluginFormPrerender` | `OnPluginFormRender` | `OnBeforePluginFormSave` | `OnPluginFormSave` |
| User | `OnUserFormPrerender` | `OnUserFormRender` | `OnBeforeUserFormSave` | `OnUserFormSave` |
| Context | `OnContextFormPrerender` | `OnContextFormRender` | — | — |
| Media | `OnFileCreateFormPrerender` | — | — | — |
| Manager login | `OnManagerLoginFormPrerender` | `OnManagerLoginFormRender` | — | — |

- **Before the form** — scripts and stylesheets.
- **In the form** — the markup itself.
- **Before save** — any non-empty output blocks the save.

## A text field on the Resource form

This Plugin adds a **Home** text field to the Resource form and keeps its value in the `home` TV. Create the TV first, then bind the Plugin to `OnDocFormRender` and `OnDocFormSave`.

```php
<?php
/** Adds a "Home" field to the Resource form and stores it in the `home` TV. */
switch ($modx->event->name) {
    case 'OnDocFormRender':
        $tv = $modx->getObject('modTemplateVar', ['name' => 'home']);
        /* $scriptProperties['resource'] is passed on the update screen only */
        $resourceId = isset($scriptProperties['resource']) ? $scriptProperties['resource']->get('id') : 0;
        $value = $resourceId && $tv ? $tv->getValue($resourceId) : '';

        $modx->event->output(
            '<div class="x-form-item x-tab-item">
                <label class="x-form-item-label" for="home">Home</label>
                <div class="x-form-element">
                    <input type="text" name="home" id="home" class="x-form-text" value="' . htmlspecialchars($value, ENT_QUOTES) . '" />
                </div>
            </div>'
        );
        break;

    case 'OnDocFormSave':
        if (isset($_POST['home']) && $scriptProperties['resource']->get('id') > 0) {
            $tv = $modx->getObject('modTemplateVar', ['name' => 'home']);
            $tv?->setValue($scriptProperties['resource']->get('id'), $_POST['home']);
        }
        break;
}
return;
```

## Why the field falls outside the column

The Manager is built on ExtJS 3. The Custom Fields tab marks up each of its rows with `x-form-item` on the wrapper, `x-form-item-label` on the label and `x-form-element` around the input. Reuse those three classes. With other classes the field still appears and still saves, but it sits outside the form's column and its label does not line up with the fields around it.

## See Also

- [Plugins](extending-modx/plugins "Plugins")
- [System Events](extending-modx/plugins/system-events "System Events") — a page per event, including [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender "OnDocFormRender") and [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave "OnDocFormSave")
