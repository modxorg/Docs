---
title: "Inline PHP"
description: "The Inline PHP Dashboard Widget of MODX: PHP code that runs like a Snippet, and the rules it has to follow."
_old_id: "87"
_old_uri: "2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-inline-php"
---

The Inline PHP widget runs the content of the widget as if it were a [Snippet Widget](building-sites/client-proofing/dashboards/widget-types/snippet "Dashboard Widget Type - Snippet"). The difference is the code: PHP instead of a call to a Snippet.

## Usage

Simply place your PHP code in the content panel, and return the output of your widget.

For example, this will display "Hello, World!":

``` php
<?php
return 'Hello, World!';
```

A few notes about using this:

- Use `return`, not `echo`. What you print goes into the output of the page, not into the content of the widget.
- Do not use `$modx->resource` in your widget, as there is no active resource on the Dashboard.
- The tags `<?php` and `?>` are cut off before the code runs, so a closing tag is not needed.

## See Also

1. [Dashboard Widget Type - File](building-sites/client-proofing/dashboards/widget-types/file)
2. [Dashboard Widget Type - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Dashboard Widget Type - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Dashboard Widget Type - Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)
