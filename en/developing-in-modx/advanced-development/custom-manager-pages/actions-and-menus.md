---
title: "Actions and Menus"
_old_id: "10"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus"
---

MODx Revolution introduces an entirely new program structure for its core. The manager is also built on what are called _controllers_ and _templates_, which use AJAX processing to send data to _connectors_ that access _processors_.

The controllers are simply PHP files that load the correct Smarty template to display, and fetch any pre-render data for the template. Revolution abstracts these controllers into the DB as modAction's, allowing 3rd party developers to easily create custom manager pages that 'hook' into the current MODx system _without modifying the core_.

modAction's require a controller and a template to exist, that must be found in the manager/controllers and manager/templates directories. They have a few certain parameters that are worth noting:

- **Controller** - This points to the controller file. If the file is an index.php, you can leave that off and MODx will try and find it through a smart search.
- **Load Headers** - if checked, this will load the MODx header and footer for the internal page. If you are wanting just a blank page for the manager page, leave this unchecked.
- **Language Topics** - Language Topics are simply separations of language areas that allow for quicker i18n access. They can be found in the core/lexicon/en (or fr,de,etc) directory, and new topics can easily be created simply by using the Lexicon Management section.

For example, 3rd party devs might want to create a Lexicon Topic named 'buttons' for TinyMCE, which would reference the topic in core/components/tinymce/lexicon/en/buttons.inc.php. They can simply either A) use a build script to install the lexicon via a transport package, or B) have users import the lexicon topics using the Import Lexicon utility in Lexicon Management.

You can then load the topic via:

``` php 
$modx->lexicon->load('tinymce:buttons');
```

modAction's are also easily hooked to modMenu's, which are abstract representations of the top menubar in the manager. Again, this lets 3rd party developers easily and quickly develop custom menu implementations for their components - or lets users rearrange the top menu.

These can all be managed via the Actions panel, which is found under the Tools menu.

Any changes to the order of 'core' menu items will be reverted during Revolution upgrades.

## Related Pages

- [Custom Manager Pages](developing-in-modx/advanced-development/custom-manager-pages "Custom Manager Pages")
- [Internationalization](developing-in-modx/advanced-development/internationalization "Internationalization")