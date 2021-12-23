---
title: "Custom Manager Themes"
_old_id: "365"
_old_uri: "2.x/administering-your-site/customizing-the-manager/manager-templates-and-themes"
---

**Heads up**: when you use custom Manager theme you need to check that everything still works as expected after upgrading MODX. A custom Manager theme can conflict with or be missing important core changes that come in new MODX releases.

The MODX Manager uses a template similar to regular MODX pages. By default, the Manager template files live inside the `manager/templates/default` directory. By updating the MODX system setting for `manager\_theme` to point to a new directory, you can override any single file by copying its directory structure and adding just the templates you wish to override. You can override as few or as many templates as you desire, as long as you maintain identical directory layouts. The Manager will fall back to the `default` theme templates for any that have not been overridden.

For example, to customize only the Manager Login page, you copy the following file into a new directory:

>manager/templates/default/security/login.tpl

To create a custom Manager login theme called **my-brand**, copy that file into a new directory:

>manager/templates/**my-brand**/security/login.tpl

Then update your system setting for `manager\_theme` to point to the newly created `my-brand` directory. The version of the file from the `my-brand` directory will override the version of the file from the default directory.

While far less common, you can similarly override the Controllers in the same way, replacing "templates" with "controllers" per above. If you don't know what that means, you don’t need to do so.
