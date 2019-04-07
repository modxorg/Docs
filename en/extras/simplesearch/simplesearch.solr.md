---
title: "Solr"
_old_id: "1004"
_old_uri: "revo/simplesearch/simplesearch.solr"
---

## Requirements for Solr Search

Solr searching in SimpleSearch has a few requirements:

- You are running SimpleSearch version 1.4 or later
- You have installed the PECL Solr package, which [can be found here](http://pecl.php.net/package/solr).
- You have a running Solr server with an index that can be used for the MODX installation.

If you need more help getting a Solr server installed, the [official Solr documentation](http://wiki.apache.org/solr/) is quite helpful.

SimpleSearch also provides you with a sample schema.xml for your Solr configuration. You can find it in the following location:

- core/components/simplesearch/docs/solr.schema.xml

Rename the file to 'schema.xml' and place in your appropriate Solr core's conf/ directory, and then restart Solr.

Those who installed SimpleSearch prior to 1.4.0-pl will need to update their schema.xml file to the latest version (referenced above in the docs/ directory) and reindex all their Resources to take advantage of TV-based searching.

## Configuring SimpleSearch to use Solr

Go to [System Settings](administering-your-site/settings/system-settings "System Settings") and change the following settings:

- **sisea.driver\_class** -> Change to "SimpleSearchDriverSolr"
- **sisea.driver\_db\_specific** -> Change to "No", since Solr does not depend on SQL databases

From there, also check to make sure any other Solr-specific configuration options are correct.

If you are running multiple cores in Solr, often your "sisea.solr.path" setting will be something like "solr/corename".

### Index Your Existing Resources

From there, you'll need to index your already existing Resources into Solr. Well, SimpleSearch provides you with a utility Snippet for just that! Simply place the "SimpleSearchIndexAll" snippet onto any page, and view the page. (Make sure you've already setup Solr as outlined above first!) The snippet will run, indexing all your existing Resources into the Solr index. After it has run, you should remove the Snippet call.

As you continue to develop your site, SimpleSearch will automatically index Resources as you work on them, via the SimpleSearchIndexer plugin.

That's it! You now have Solr-powered search on your site.

## Other Notes

A few SimpleSearch properties do not apply to Solr-based searches. These are:

- maxWords, useAllWords, searchStyle, fieldPotency, customPackages

These properties on the SimpleSearch snippet will be ignored if you are using Solr search.

## Note for 2.1.0-rc4 and Earlier Users

Due to a bug in MODX 2.1.0-rc4 and earlier, you will need to patch the file here:

core/model/modx/processors/resource/unpublish.php

Find the string "OnDocUnpublished" in the invokeEvent call. Replace it with: "OnDocUnPublished" (note the capital P). This will allow Solr to reindex the Resource if it gets unpublished via the tree.

This issue has been fixed in MODX Revolution 2.1.0-pl and later.

## See Also

1. [SimpleSearch.Roadmap](extras/simplesearch/simplesearch.roadmap)
2. [SimpleSearch.SimpleSearch](extras/simplesearch/simplesearch.simplesearch)
     1. [SimpleSearch.SimpleSearch.containerTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.containertpl)
     2. [SimpleSearch.SimpleSearch.currentPageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.currentpagetpl)
     3. [SimpleSearch.SimpleSearch.pageTpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.pagetpl)
     4. [SimpleSearch.SimpleSearch.tpl](extras/simplesearch/simplesearch.simplesearch/simplesearch.simplesearch.tpl)
     5. [SimpleSearch.Faceted Search Through PostHooks](extras/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks)
3. [SimpleSearch.SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform)
     1. [SimpleSearch.SimpleSearchForm.tpl](extras/simplesearch/simplesearch.simplesearchform/simplesearch.simplesearchform.tpl)
4. [SimpleSearch.Solr](extras/simplesearch/simplesearch.solr)