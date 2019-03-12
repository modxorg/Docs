---
title: "Custom Manager Themes"
_old_id: "365"
_old_uri: "2.x/administering-your-site/customizing-the-manager/manager-templates-and-themes"
---

**Heads up**: when you use custom manager themes or templates, you will need to make sure everything works as expected after upgrading MODX. It's not uncommon for custom manager templates to conflict with core changes.

This about customizing the manager and its templates. For example if you want a customized manager login form.

The MODX manager uses a template much like regular MODX pages. The manager's template files live inside of **manager/templates/default** directory. You can update the system setting for the **manager\_theme** to point to the new directory.

The way this is set up is just like extending a PHP class: you can override any single file by mimicking the directory structure and updating the **manager\_theme** directory.

For 2.1 and earlier, you must copy the entire controllers and templates directory for your theme. 2.2 and later let you copy single files.

For example, to customize just the Manager Login template, you could copy the following file into a new directory:

**manager/templates/default/security/login.tpl**

Copy that file into a new directory, for example here:

**manager/templates/custom/security/login.tpl**

Then update your System Setting for **manager\_theme** to point to the newly created **custom** directory, and the version of the file from the **custom** directory will override the version of the file from the default directory.

You'll also have to copy this directory:

**manager/controllers/default**

to a new directory with the same name as your new custom them directory, like so:

**manager/controllers/custom**

This is because when you change the manager\_theme key value in System Settings it will also reference the new controllers directory. Of course you can probably change the path for that somewhere...
