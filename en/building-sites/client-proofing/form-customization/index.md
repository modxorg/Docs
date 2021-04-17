---
title: "Customizing the Manager"
_old_id: "83"
_old_uri: "2.x/administering-your-site/customizing-the-manager"
---

## What is Form Customization?

 Form Customization is a feature that allows users to create Rules, which govern how manager pages render their forms in the MODX Revolution Manager.

## How Does it Work?

 Currently, Form Customization has 3 layers:

> Profile -> Sets -> Rules

 A Profile is a collection of Sets, and Sets are collections of Rules. Profiles can be restricted to specific User Groups.

 A Set is a collection of Rules, and is tied to a certain view. Normally, you would have a Set for the Resource/Create page, and a Set for the Resource/Update page. Sets can also be tied to specific [Templates](building-sites/elements/templates "Templates") (meaning they load only when the Resource is using that Template). They can also have a 'Constraint' set, which limits the Set's execution to the restriction made in the Constraint.

 A Rule is all the variations applied in a Set. Rules are hidden from view in MODX Revolution, but are instead shown as fields on the Set Editing page.

 More information about each of the parts of Form Customization can be found in each part's respective page:

1. [Form Customization Profiles](building-sites/client-proofing/form-customization/profiles)
2. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
   1. [Customizing Tabs via Form Customization](building-sites/client-proofing/form-customization/tabs)
3. [Manager Templates and Themes](building-sites/client-proofing/custom-manager-themes)

### What Forms can I Customize?

 The Resource Create and Update pages can be customized at this time in Form Customization.

## See Also

1. [Form Customization Profiles](building-sites/client-proofing/form-customization/profiles)
2. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
   1. [Customizing Tabs via Form Customization](building-sites/client-proofing/form-customization/tabs)
3. [Manager Templates and Themes](building-sites/client-proofing/custom-manager-themes)
