---
title: "YAMS Mime-type Dependent Alias Suffixes"
_old_id: "751"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-mime-type-dependent-alias-suffixes"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Mime-type Dependent Alias Suffixes](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-mime-type-dependent-alias-suffixes)</td></tr></table></div>How can I get YAMS to use the .xml suffix for xml documents, .rss for rss documents, etc.
=========================================================================================

There is an option to do this. Set

Modules>YAMS>Other Params>URL Formatting>Use Mime-type dependent suffixes?

to yes. Then clear the cache so that document URLs get regenerated.

The default mime-type => suffix mapping is as follows:

```
<pre class="brush: php">
$this->itsMimeSuffixMap = array(
    'application/xhtml+xml' => '.xhtml'
    , 'application/javascript' => '.js'
    , 'text/javascript' => '.js'
    , 'application/rss+xml' => '.rss'
    , 'application/xml' => '.xml'
    , 'text/xml' => '.xml'
    , 'text/css' => '.css'
    , 'text/html' => '.html'
    , 'text/plain' => '.txt'
    );

```This can be changed by editing the assets/modules/yams/yams.config.inc.php file directly.

**WARNING** It is not necessary to use the [SEO Strict URLs plugin](http://modxcms.com/extras/package/395) in combination with YAMS since YAMS has SEO friendly behaviour built in. Furthermore, the plugin is not compatible with YAMS.