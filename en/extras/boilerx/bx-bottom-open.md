---
title: "bx-bottom-open"
_old_id: "1323"
_old_uri: "revo/boilerx/bx-bottom-open"
---

## Bottom Open Chunk

Deferred JavaScript and Google Analytics tracking.

 ``` php 

        <script src="ajax.googleapis.com/ajax/libs/jquery/[[++bx.jquery_version]]/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="[[++assets_url]]components/boilerx/js/vendor/jquery-[[++bx.jquery_version]].min.js"><\/script>')</script>
        <script src="[[++assets_url]]components/boilerx/js/plugins.js"></script>
        <script src="[[++assets_url]]components/boilerx/js/main.js"></script>

        [[++bx.show_comments:if=`[[++bx.show_comments]]`:eq=`1`:then=`<!-- Change UAXXXXXXXX1 to be your site's ID by setting bx.ga-id System Setting to auto-enable tracking -->
`]]        <[[++bx.ga-id:if=`[[++bx.ga-id]]`:eq=`UAXXXXXXXX1`:then=`!--`]]script>
            var _gaq=[ ['_setAccount','[[++bx.ga-id]]'],['_trackPageview'] ];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script[[++bx.ga-id:if=`[[++bx.ga-id]]`:eq=`UAXXXXXXXX1`:then=`--`]]>

```

## <a name="boilerX-SeeAlso"></a>See Also

 \[\[getResources@section? &parents=`1316` &context=`extras` &limit=`0` &resources=`1316,-\[\[\*id\]\]`\]\]