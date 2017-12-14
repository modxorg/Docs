---
title: "SimpleSearch.Faceted Search Through PostHooks"
_old_id: "995"
_old_uri: "revo/simplesearch/simplesearch.simplesearch/simplesearch.faceted-search-through-posthooks"
---

<div>- [Doing Faceted Search in SimpleSearch](#SimpleSearch.FacetedSearchThroughPostHooks-DoingFacetedSearchinSimpleSearch)
- [Setting up your Resource](#SimpleSearch.FacetedSearchThroughPostHooks-SettingupyourResource)
- [Setting up the PostHook](#SimpleSearch.FacetedSearchThroughPostHooks-SettingupthePostHook)
- [Separate Templating Per Facet](#SimpleSearch.FacetedSearchThroughPostHooks-SeparateTemplatingPerFacet)

</div>Doing Faceted Search in SimpleSearch
------------------------------------

SimpleSearch 1.3.0+ allows faceted search results to be set through postHooks, allowing you to fine-grain your search results and even integrate other, non-MODX-Resource results into your search results. This basic tutorial shows you how to get started with setting up faceted search.

Basically, SimpleSearch puts all main, resource-based results into a 'default' facet. In postHooks, you can add other facets to the results and allow users to target their search into those facets. We're going to create a 'people' facet that searches our Users and creates results that have links to a profile Resource (ID 10).

Setting up your Resource
------------------------

First off, you'll want to have a place to show your results

```
<pre class="brush: php">
[[!SimpleSearch?
  &toPlaceholder=`sisea.results`
  &perPage=`10`
  &postHooks=`PeopleFacetHook`
  &facetLimit=`5`
]]

<h2>Search Results</h2>
[[+sisea.results]]

<br />
<h2>People Results ([[+sisea.people.total]])</h2>
<ol>[[+sisea.people.results]]</ol>

<a href="[[~123]]?facet=people&search=[[!+sisea.query]]">Get more Peoples...</a>

```Note we have the standard 'sisea.results' placeholder, but we've also added a 'sisea.people.results' placeholder. This will have the top results from our postHook's search in it. The 'people' in between the placeholder name is the name of our custom facet. We only want to grab the top 5 results out of our custom facet search, so we used facetLimit to set it to 5.

Then at the bottom, we'll have a page that links to another page (ID 123) that will let us fine-grain our search results, showing only People results, and showing 20 at a time:

```
<pre class="brush: php">
[[!SimpleSearch?
  &toPlaceholder=`sisea.results`
  &perPage=`20`
  &postHooks=`PeopleFacetHook`
  &facetLimit=`5`
]]

<h2>Search Results</h2>
[[+sisea.results]]

```Setting up the PostHook
-----------------------

Go ahead and make a Snippet named 'PeopleFacetHook', and put this in it:

```
<pre class="brush: php">
<?php
$c = $modx->newQuery('modUser');
$c->innerJoin('modUserProfile','Profile');
$c->where(array(
    'username:LIKE' => '%'.$search.'%',
    'OR:Profile.fullname:LIKE' => '%'.$search.'%',
    'OR:Profile.email:LIKE' => '%'.$search.'%',
));
$count = $modx->getCount('modUser',$c);
$c->select(array(
    'modUser.*',
    'Profile.fullname',
    'Profile.email',
));
$c->limit($limit,$offset);
$users = $modx->getCollection('modUser',$c);

$results = array();
foreach ($users as $user) {
    $results[] = array(
        'pagetitle' => $user->get('fullname'),
        'longtitle' => $user->get('email'),
        'link' => $modx->makeUrl(10,'',array(
            'user' => $user->get('id'),
        )),
        'excerpt' => '',
    );
}
$hook->addFacet('people',$results,$count);
return true;

```So basically, in this snippet, we're grabbing all the Users who's username, fullname, or email match the search string. Note we're also limiting as well in this, and grabbing a 'total' count (for our pagination in the 2nd Resource). SimpleSearch passes in the following variables for our postHook:

- **$search** - The search string
- **$limit** - The number of results to limit this facet search to
- **$offset** - The starting index to begin this facet search at

Then, once we've got our $users collection, we'll loop over that and put it in an array format that SimpleSearch can use. We're also going to tell SimpleSearch to make the links on the results send to the Resource ID 10 with a GET parameter of 'user' that points to the user's ID. (This postHook would make for an excellent profile search page). We could also do an excerpt here as well, for search results, if we wanted.

Then we call the $hook->addFacet method, which takes 3 parameters:

- The name of the custom facet. Note here it's 'people', which we described above.
- The results array we compiled.
- The total number of results (since we're only returning a subset of them)

Separate Templating Per Facet
-----------------------------

Let's say we wanted a separate chunk template for our "people" results, rather than the standard one we set in the &tpl property on the SimpleSearch call. Remember how we set the "name" of the facet to "people"? Well, SimpleSearch allows us to pass facet-specific tpl calls, such as a custom chunk called "OurPeopleChunk" by postfixing the name of the facet to the property &tpl, if we wish:

```
<pre class="brush: php">
[[!SimpleSearch?
  &toPlaceholder=`sisea.results`
  &perPage=`20`
  &postHooks=`PeopleFacetHook`
  &tplpeople=`OurPeopleChunk`
  &facetLimit=`5`
]]

<h2>Search Results</h2>
[[+sisea.results]]

<h2>People</h2>
[[+sisea.people.results]]

```It will default to the standard &tpl if no facet-specific tpl is specified.

That's it! Your search is now faceted and can be drilled down, and has its own template for each facet.