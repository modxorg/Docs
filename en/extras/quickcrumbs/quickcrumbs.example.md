---
title: "Example"
_old_id: "956"
_old_uri: "revo/quickcrumbs/quickcrumbs.example"
---

``` php
<!--Call-->
<div id="crumbs">
    <nav class="container">
        <ul>
            [[QuickCrumbs?
            &tpl=`Crumb`
            &selfTpl=`Here`
            &siteStartTpl=`Home`
            &separator=``
            &hideEmptyContainers=`1`
            &showSiteStart=`1`
            ]]
        </ul>
    </nav>
</div>

<!--Crumb-->
<li><a href="[[~[[+id]]]]">[[+menutitle:default=`[[+pagetitle]]`]]</a></li>

<!--Here-->
<li class="last clearfix"><span>[[+menutitle:default=`[[+pagetitle]]`]]</span></li>
<li class="end">&nbsp;</li>

<!--Home-->
<li class="first"><a href="[[~[[+id]]]]">[[+menutitle:default=`[[+pagetitle]]`]]</a></li>
```

I just pulled this from Jay Gilmore's gist share: <https://gist.github.com/1222034>
