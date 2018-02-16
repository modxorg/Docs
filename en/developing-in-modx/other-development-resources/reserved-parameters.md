---
title: "Reserved Parameters"
_old_id: "259"
_old_uri: "2.x/developing-in-modx/other-development-resources/reserved-parameters"
---

Reserved GET Parameters Inside the MODX Manager
-----------------------------------------------

The following is a list (currently incomplete) of GET parameters used by the MODX Manager. You should avoid using any of these parameters in [Custom Manager Pages](developing-in-modx/advanced-development/custom-manager-pages "Custom Manager Pages"):

- **a** – used to define an action
- **context\_key** – specifies one of your contexts (e.g. "web" or "mgr")
- **class\_key** – specifies a class name, e.g. when creating a Weblink or static resource
- **id** -- specifies a page\_id

Reserved $\_SESSION variables (2.1.1-pl and later)
--------------------------------------------------

- cultureKey
- and anything prefixed with modx.\*

Reserved $\_SESSION variables (before 2.1.1-pl)
-----------------------------------------------

<div class="note">$\_SESSION vars in italics were removed in 2.1.1-pl</div>- _webValidated_
- _mgrValidated_
- _webInternalKey_
- _mgrInternalKey_
- _webShortname_
- _mgrShortname_
- cultureKey
- and anything prefixed with modx.\*