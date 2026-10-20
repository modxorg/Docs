---
title: "inline_help"
description: "Show field help text below the field instead of in a tooltip."
---

**Name**: Show Inline Help Text for Fields
**Type**: Yes/No
**Default**: Yes

When set to Yes, form fields in the manager display their help text directly below the field. When set to No, the help text is shown only in a tooltip.

The setting is read by the manager layout (`MODx.expandHelp = !!+MODx.config.inline_help` in `manager/assets/modext/core/modx.layout.js`). It applies to the manager and to Custom Manager Pages that use the standard MODX form markup.
