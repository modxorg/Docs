---
title: "bx-container-open"
_old_id: "1320"
_old_uri: "revo/boilerx/bx-container-open"
---

## Container Open Chunk

Opens the body tag and in acts Chrome frame for unsupported browsers.

 ``` php
    [[++bx.show_comments:if=`[[++bx.show_comments]]`:eq=`1`:then=`    <!-- Use these body classes to target any combination of specific templates, ids, children, and class_keys -->
    `]]    <body class="t-[[*template]] id-[[*id]] p-[[*parent]] ck-[[*class_key]]">
    <!--[if lt IE [[++bx.chrome_frame_version:add=`1`]]]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
```

## See Also

 ``` php
[[getResources@section?
    &parents=`1316`
    &context=`extras`
    &limit=`0`
    &resources=`1316,[[*id]]`
]]
