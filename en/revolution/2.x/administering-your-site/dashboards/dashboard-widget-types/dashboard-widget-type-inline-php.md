---
title: "Dashboard Widget Type - Inline PHP"
_old_id: "87"
_old_uri: "2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-inline-php"
---

 The Inline PHP widget acts very similar to the [Snippet Widget](/revolution/2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-snippet "Dashboard Widget Type - Snippet"), except it runs the content of the widget as if it were a Snippet.

Usage
-----

 Simply place your PHP code in the content panel, and return the output of your widget.

 For example, this will display "Hello, World!":

 ```
<pre class="brush: php">
<?php
return 'Hello, World!';

``` A few notes about using this:

- Do not "echo" content, as it will be ignored
- Do not use $modx->resource in your widget, as there is no active resource for the dashboard
- Do not put a closing PHP tag at the end of your code! For some reason, it gets parsed incorrectly (as of MODX 2.2.8)

See Also
--------

1. [Dashboard Widget Type - File](/revolution/2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-file)
2. [Dashboard Widget Type - HTML](/revolution/2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-html)
3. [Dashboard Widget Type - Inline PHP](/revolution/2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-inline-php)
4. [Dashboard Widget Type - Snippet](/revolution/2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-snippet)