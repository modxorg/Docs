---
title: "getRelated"
_old_id: "652"
_old_uri: "revo/getrelated"
---

getRelated is a snippet for MODX Revolution that helps you list related resources.

It allows you to customize the algorithm through its vital &fields property allowing you to specify fields to use in comparison and the weight every field has.

<div>- [Links & History](#getRelated-Links%26History)
- [How getRelated works (Mandatory Read!)](#getRelated-HowgetRelatedworks%28MandatoryRead%5C%21%29)
- [Snippet Properties](#getRelated-SnippetProperties)
- [Usage](#getRelated-Usage)
  - [Optimizing Performance](#getRelated-OptimizingPerformance)

</div>Links & History
---------------

<table><tbody><tr><th>Version   
</th><th>Released On   
</th><th>Highlights   
</th></tr><tr><td>1.2.0-pl   
</td><td>June 7th, 2012   
</td><td>Add &stopwords property, properly handling multiple calls per page, can also be used with Russian now.   
</td></tr><tr><td>1.1.2-pl</td><td>January 21st, 2012</td><td>Add &hideContainers property. Prevent E\_NOTICE errors. Fix &includeDeleted property.</td></tr><tr><td>1.1.1-pl</td><td>December 10th, 2011</td><td>Fix issue with &parents. Fix issue with &fields with only one resource field chosen.</td></tr><tr><td>1.1.0-pl</td><td>December 4th, 2011</td><td>Adds TVs to the result set using new &returnTVs propery, and also a new &exclude property to hide certain results.</td></tr><tr><td>1.0.2-pl   
</td><td>November 10th, 2011   
</td><td>Fixes bug with filtering out current resource, now searches case insensitively and fixes ignoreHidden and ignoreUnpublished properties. Also improves legibility of debug data.   
</td></tr><tr><td>1.0.1-pl(2)   
</td><td>October 26th, 2011   
</td><td>Fixes bugs with tpl properties, &parents and &fields   
</td></tr><tr><td>1.0.0-pl   
</td><td>October 13th, 2011   
</td><td>First public release. Versions < 1.0 were only released for HandyMan Contributors through its beta channel.   
</td></tr></tbody></table>The source is public at Github: <https://github.com/Mark-H/getRelated>  
... which is also the place for bugs and feature requests: <https://github.com/Mark-H/getRelated/Issues>

Discussion on the forum in this topic: <http://forums.modx.com/thread/71009/getrelated-automatically-listing-related-resources-for-revolution>

Developed by [Mark Hamstra](http://www.markhamstra.nl) for [Vierkante Meter](http://vierkante-meter.nl).

How getRelated works (Mandatory Read!)
--------------------------------------

To properly use the properties to customize the results, it is important to understand how getRelated works.

The following steps are taken in collecting related resources:

1. getRelated finds the resource you are using as the base, usually the current resource. It takes the fields you specify (&fields) and tears them apart to find distinct words.
2. It uses stopwords, defined in the language specific lexicons, to filter out common stop words leaving only words that really should matter.
3. It uses the related words in a database query limited to the contexts, parents (and their children) you define to find only resources that contain one or more of these resources. **This is the comparison sample.** This is done for resource fields and template variables based on your fields property.
4. The sample is processed against the weights you define in your fields property (&fields) to calculate a ranking for each of those resource.
5. The result set is sorted based on ranking (highest ranking first) and then outputted on screen using the tpl properties.

The properties below can be used to customize behavior in one or more of the steps above. In the table below you can find the step(s) a property applies to.

Snippet Properties
------------------

<table><tbody><tr><th>Property   
</th><th>Step(s)   
</th><th>Description   
</th><th>Default Value   
</th></tr><tr><td>resource</td><td>1   
</td><td>Either the Resource ID to find related resources for or "current" or empty to find related for the current resource.</td><td>current   
</td></tr><tr><td>fields</td><td>1, 3, 4   
</td><td>Comma separated list of fieldname:weight to use in the comparison. Prefix TVs with "tv.". Don\\'t use the content unless you want to kill performance. Example of use: pagetitle:3,tv.MyTags:7,tv.MySubjects:15,introtext:2</td><td>pagetitle:3,introtext:2</td></tr><tr><td>defaultWeight   
</td><td>4   
</td><td>(int) Weight to assign to fields that don't have a weight set specifically.</td><td>5   
</td></tr><tr><td>returnFields</td><td>5 (3)   
</td><td>Resource Fields (use &returnTVs for template variables) to include in the output. By default you will have access to the resource ID as well.   
</td><td>pagetitle,longtitle,introtext</td></tr><tr><td>returnTVs</td><td>5</td><td>Specify a comma separated list of TV names to include in the results. These TVs are not used in the comparison process, but are only retrieved when returning the top ranking results. Do _not_ prefix with "tv." like you would in the &fields property.</td><td> </td></tr><tr><td>parents</td><td>3   
</td><td>Comma separated list of parents to use in finding related resources</td><td> </td></tr><tr><td>parentsDepth</td><td>3   
</td><td>The depth to search parents for</td><td>10   
</td></tr><tr><td>exclude</td><td>3</td><td>Comma separated list of resource IDs you want to exclude from the results.</td><td> </td></tr><tr><td>contexts</td><td>3   
</td><td>Comma separated list of Contexts to search in</td><td>current   
</td></tr><tr><td>includeUnpublished</td><td>3   
</td><td>\[1|0\] Also use unpublished resources in the result set.   
</td><td>0   
</td></tr><tr><td>includeHidden</td><td>3   
</td><td>\[1|0\] Also use resources marked as hidden in menus in the result set. Set to 0 to exclude them.   
</td><td>1   
</td></tr><tr><td>hideContainers</td><td>3</td><td>\[1|0\] _Added in 1.2.0._ When set to 1 this will exclude resources which have "isfolder" set to true, ie those that are containers.</td><td>0</td></tr><tr><td>stopwords   
</td><td>2   
</td><td>_Added in 1.2.0_ | A comma separated list of words to filter out of the match data, on top of the language specific stopwords.   
</td><td> </td></tr><tr><td>limit</td><td>5   
</td><td>Number of related resources to output to screen.   
</td><td>3   
</td></tr><tr><td>fieldSample</td><td>3   
</td><td>Number of resources to collect for the **sample** in comparing based on **resource fields**. Can have a huge impact on performance so if you're experiencing long load times, try decreasing this number or adjusting the stopwords in your language lexicon.</td><td>125   
</td></tr><tr><td>fieldSort</td><td>3   
</td><td>Resource field to sort by in collecting the sample, used in conjunction with the fieldSample propert. (_Does not sort the related resources output, only the sample used in determining related resources!_)</td><td>createdon   
</td></tr><tr><td>fieldSortDir</td><td>3   
</td><td>Sort direction for the fieldSort property, used in collecting the sample.   
</td><td>desc   
</td></tr><tr><td>tvSample</td><td>3   
</td><td>Number of TV results to include (note: one resource can have more than one result depending on your fields property) in the **sample** in comparing based on TV values.</td><td>125   
</td></tr><tr><td>tvSort</td><td>3   
</td><td>Resource field to sort by in the TV query, used in conjunction with the tvSample property. (_Does not sort the related resources output, only the sample used in determining related resources!_)</td><td>createdon   
</td></tr><tr><td>tvSortDir</td><td>3   
</td><td>Sort direction for the tvSort property, used in collecting the sample.   
</td><td>desc   
</td></tr><tr><td>tplOuter</td><td>5   
</td><td>Chunk name to use as outer (or wrapper) template. The \[\[+wrapper\]\] placeholder will be filled with the individual rows, separated by whatever is in the rowSeparator property (see below). Placeholders you can use are \[\[+count\]\] and \[\[+wrapper\]\].   
  
  
```
<pre class="brush: php">
<h3>[[%getrelated.pagesfound? &namespace=`getrelated` &count=`[[+count]]`]]</h3>
<ul>
  [[+wrapper]]
</ul>

```</td><td>relatedOuter   
</td></tr><tr><td>tplRow</td><td>5   
</td><td>Chunk name to use as row template, used in every related resource.   
  
The placeholders you can use include the fields in your &fields property (minus TVs), as well as those in the returnFields property. The resource ID is always accessible with \[\[+id\]\], the ranking (the result of the algorithm) as \[\[+rank\]\] and the number of the result with \[\[+idx\]\].   
  
Default chunk (stored as file in core/components/getrelated/elements/chunks/):   
  
```
<pre class="brush: php">
<li>
  <a href="[[~[[+id]]]]" title="[[+longtitle:default=`[[+pagetitle]]`]]">
    [[+longtitle:default=`[[+pagetitle]]`]] ([[+rank]])
  </a>
</li>

```</td><td>relatedRow   
</td></tr><tr><td>noResults</td><td>5   
</td><td>Text or output when there are no related resources found. (Hint: you could add a \[\[$chunk\]\] to the property to output that when there are no results: &noResults=`\[\[$chunkname\]\]`)</td><td>"No related pages found."   
</td></tr><tr><td>rowSeparator</td><td>5   
</td><td>String to use as separator between rows.</td><td>\\n   
</td></tr><tr><td>debug</td><td> </td><td>\[1|0\] Enable/disable debug mode. When enabled it will dump lots of information on screen.</td><td>0   
</td></tr></tbody></table>Usage
-----

<div class="note">There is absolutely no valid reason that I can think of to call this snippet uncached. Especially when you are running a bigger site, calling the snippet uncached can easily result in a great performance hit that is simply not needed. This snippet looks at resource data, and by default the cache is cleared when a resource is updated. So in between resource updates there is no data change that getRelated cares about. SO DO NOT CALL IT UNCACHED!!! If you're not sure you're calling it uncached: Uncached snippets are prefixed with an exclamation mark: \[\[!snippetname\]\], so we will want to use it **without** the exclamation mark: \[\[snippetname\]\].

</div>The minimum snippet call for getRelated to use is just the tag itself.

```
<pre class="brush: php">
[[getRelated]]

```This creates an unordered list with a max of three related resources based on the pagetitle and introtext. You can further refine that using the &fields property (see above) to use your tag or category TV or another field that contains a brief summary or keywords.

### Optimizing Performance

If you're getting a slow performance caused by getRelated, here's some suggestions/thoughts:

1. Make sure the snippet is called **cached**! I wont help you figuring out slow performance if you are not caching this snippet..
2. Do not use fields like the content as there will simply be too much
3. It is possible the query used to collect the sample is too broad. There can be multiple causes & fixes for that: 
  1. There is no translation for the language you use yet, resulting in the English stopwords being stripped and not stopwords in your native language. There's a real easy fix that will benefit others as well: translate [the English Lexicon](https://github.com/Mark-H/getRelated/blob/master/core/components/getrelated/lexicon/en/default.inc.php) to your language & send it back for inclusion in the addon. Do not translate the long list of stop words in there, but rather find a list of stopwords in your language from a reliable source.
  2. All your resources use similar words (a company name, the name of a product being sold, or your editor's favorite word) resulting in the sample being distorted by that. If you enable debug (&debug=`1` in the snippet) you can see the Match Data which are the words that will be matched, so you can verify if there's any words use that it shouldn't.   
      If that is the case, you can filter out these words by adding them to the "getrelated.stopwords" lexicon in your language. Go to System > Lexicon Management and in the dropdown that defaults to "core" select "getrelated". If not using English, select the right language from the language drop down as well. Now find the stopwords lexicon and add the words distorting the result set to the list. If you think the stopwords should be added to the main package, file a [bug report](https://github.com/Mark-H/getRelated/issues).
4. Your site has too much related resources. If you have too much resources and have optimized what you could with the above options, you could: 
  1. Adjust the sample sizes. The default settings resulting in test results of around 1 second which is "okay" for a first load (cause you are getting results from the cache after that, right?!), but this depends on the number of the fields you are using, whether they are resource fields or TVs and in general how the values are stored in the database. If you use a lot of TVs in your &fields property, you can bring the tvSample down to, say, 50 to only get 50 results per TV. If you use 3 TVs, that could theoretically bring down the total amount of resources being processed from 375 to 150.   
      To make sure you still get the right results, you can change order in which the sample is fetched with tvSort and tvSortDir as well as fieldSort and fieldSortDir. By default it sorts on the createdon date, with the newest first.
5. It could be that the returnTVs property with a lot of TVs and a large result set has a performance impact. I haven't tested this extensively, but you should try to keep your result set limited (see earlier tips) and only use the TVs you really need.
6. It's a bug! While this addon has gone through testing on various installs and site sizes, it's possible something weird is going on. Please post in the forum topic or on Github and we can see what's going on. (links above)