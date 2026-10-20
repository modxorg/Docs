---
title: "login_help_button"
description: "Show a help button on the manager login screen."
---

**Name**: Show Help Button
**Type**: Yes/No
**Default**: No

When enabled, the manager login screen shows a help link that opens a panel with login instructions.

The panel text comes from the `login` lexicon topic: `login_help_button_text`, `login_help_title` and `login_help_text`. Override those entries to customize the content.

The value is read in `manager/controllers/default/security/login.class.php`.
