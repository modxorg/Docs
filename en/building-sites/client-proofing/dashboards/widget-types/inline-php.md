---
title: "Inline PHP"
_old_id: "87"
_old_uri: "2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-inline-php"
---

 The Inline PHP widget acts very similar to the [Snippet Widget](building-sites/client-proofing/dashboards/widget-types/snippet "Dashboard Widget Type - Snippet"), except it runs the content of the widget as if it were a Snippet.

## Usage

 Simply place your PHP code in the content panel, and return the output of your widget.

 For example, this will display "Hello, World!":

``` php
<?php
return 'Hello, World!';
```

 A few notes about using this:

- Do not "echo" content, as it will be ignored
- Do not use `$modx->resource` in your widget, as there is no active resource for the dashboard
- Do not put a closing PHP tag at the end of your code! For some reason, it gets parsed incorrectly (as of MODX 2.2.8)

## See Also

1. [Dashboard Widget Type - File](building-sites/client-proofing/dashboards/widget-types/file)
2. [Dashboard Widget Type - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Dashboard Widget Type - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Dashboard Widget Type - Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)
