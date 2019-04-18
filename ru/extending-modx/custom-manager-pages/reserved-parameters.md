---
title: Зарезервированные параметры
_old_id: '259'
_old_uri: 2.x/developing-in-modx/other-development-resources/reserved-parameters
---

## Reserved GET Parameters Inside the MODX Manager

The following is a list (currently incomplete) of GET parameters used by the MODX Manager. You should avoid using any of these parameters in [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages"):

- **a** – used to define an action or controller
- **namespace** -- indicates what namespace the action belongs to
- **context_key** – specifies one of your contexts (e.g. "web" or "mgr")
- **class_key** – specifies a class name, e.g. when creating a Weblink or static resource
- **id** -- specifies a page_id

## Reserved $_SESSION variables (2.1.1-pl and later)

- cultureKey
- and anything prefixed with modx.*

## Зарезервированные переменные $ _SESSION (до версии 2.1.1-pl)

$_SESSION vars in italics were removed in 2.1.1-pl

- *webValidated*
- *mgrValidated*
- *webInternalKey*
- *mgrInternalKey*
- *webShortname*
- *mgrShortname*
- cultureKey
- and anything prefixed with modx.*
