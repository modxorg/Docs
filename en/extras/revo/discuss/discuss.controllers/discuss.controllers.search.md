---
title: "Discuss.Controllers.search"
_old_id: "821"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.search"
---

The search controller handles search requests. If there are no results, it will use the lexicon string discuss.search\_no\_results for the results message.

The actual searching is done by the search class. This is configured with the discuss.search\_class system setting (and discuss.search\_class\_path optionally). By default, Discuss comes with a disSearch class which is a simple SQL searcher, and disSolrSearch which allows searching through a solr instance. It is possible to write custom search classes by extending disSearch.

<div>- [Basic Information](#Discuss.Controllers.search-BasicInformation)
- [Options](#Discuss.Controllers.search-Options)
- [Controller Template](#Discuss.Controllers.search-ControllerTemplate)
- [System Events](#Discuss.Controllers.search-SystemEvents)

</div>Basic Information
-----------------

<table><tbody><tr><td>Since Version</td><td>1.0</td></tr><tr><td>Controller File</td><td>controllers/web/search.class.php</td></tr><tr><td>Controller Class Name</td><td>DiscussSearchController   
</td></tr><tr><td>Controller Template</td><td>pages/search.tpl</td></tr><tr><td>Manifest Name</td><td>search</td></tr></tbody></table>Options
-------

If you don't know what the manifest is, please go back to the [Getting Started](/extras/revo/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "search" options array of the manifest.

<table><tbody><tr><th>Key</th><th>Default</th><th>Description</th></tr><tr><td>resultRowTpl</td><td>disSearchResult</td><td>The name of a (file based) chunk to wrap each result in. Placeholders include all <span class="error">\[Discuss.Database+Model\]</span> fields, as well as \[<span class="error">\[+username\]</span>\], \[<span class="error">\[\\+board\_name\]</span>\], \[<span class="error">\[+replies\]</span>\], \[<span class="error">\[+relevancy\]</span>\], \[<span class="error">\[+cls\]</span>\], \[<span class="error">\[+toggle\]</span>\].</td></tr><tr><td>toggle</td><td>+</td><td>A string to show as toggle button</td></tr><tr><td>limit</td><td>value of discuss.threads\_per\_page or 20</td><td>Amount of results per page</td></tr></tbody></table>Controller Template
-------------------

This controller template has the following placeholders you can use, on top of the placeholders mentioned in the options above:

<table><tbody><tr><th>Placeholder</th><th>Description</th></tr><tr><td> </td><td>[All fields of the disBoard object.](http://rtfm.modx.com/display/ADDON/Discuss.Database+Model#Discuss.DatabaseModel-disBoardBoards)</td></tr><tr><td>results</td><td>The search results or an error message.</td></tr><tr><td>total</td><td>Amount of results.</td></tr><tr><td>start</td><td>Number of results this page starts on.</td></tr><tr><td>end</td><td>Either the number of the last result on this page, or the total amount of results.</td></tr><tr><td>pagination</td><td>Generated pagination bits.</td></tr><tr><td>search</td><td>The search term.</td></tr></tbody></table>```
<pre class="brush: php">
<form class="m-fullw-form m-styled-form h-group m-search" action="[[~[[*id]]]]search/" method="get">
    <h1>[[%discuss.search? &namespace=`discuss` &topic=`web`]]</h1>
    <div class="m-panel f1-f8">
        <div class="f1-f5 f-pad h-group">
            <label class="search" for="dis-search">[[%discuss.search]]:</label>
            <input class="search" type="text" id="dis-search" name="s" value="[[+search]]" />
        </div>
        <div class="f-all f-pad  h-group">
            <a id="dis-search-advanced-toggle" href="a-search-adavnaced">[[%discuss.search_advanced_options]]</a>
        </div>
        <div id="dis-search-advanced" class="f-all m-grouped-content">
            <div class="f-full">
                <div class="f1-f4 f-pad">
                    <label for="dis-search-board">Post type:
                        <span class="error">[[+error.board]]</span>
                    </label>
                    <select name="board" id="dis-search-qa">
                        <option value="1">(All Posts)</option>
                        <option value="2">Discussions</option>
                        <option value="3" id="QA">Questions</option>
                    </select>
                </div>
                <div id="SubOptions" class="f5-f8 sub-options">
                    <label for="dis-search-board">Question options:
                        <span class="error">[[+error.board]]</span>
                    </label>
                    <input type="radio" name="qa-options" value="Both" checked>All Questions
                    <input type="radio" name="qa-options" value="Solved">Answered
                    <input type="radio" name="qa-options" value="Unsolved">Without Answer
                </div>
            </div>

            <div class="f-full">
                <div class="f1-f4 f-pad">
                    <label for="dis-search-board">[[%discuss.board]]:
                        <span class="error">[[+error.board]]</span>
                    </label>
                    <select name="board" id="dis-search-board">[[+boards]]</select>
                </div>
                <div class="f5-f8 f-pad">
                    <label for="dis-author">[[%discuss.author]]:</label>
                    <input type="text" id="dis-author" name="user" value="[[+user]]" class="autocomplete" data-autocomplete-action="rest/find_user" data-autocomplete-single="true" />
                </div>
            </div>

            <div class="f1-f4 f-pad">
                <label for="dis-date-start">[[%discuss.date_start]]:</label>
                <input type="text" id="dis-date-start" class="m-datepicker" name="date_start" value="[[+date_start]]"/>
            </div>

            <div class="f5-f8 f-pad">
                <label for="dis-date-end">[[%discuss.date_end]]:</label>
                <input type="text" id="dis-date-end" class="m-datepicker" name="date_end" value="[[+date_end]]"/>
            </div>
        </div>
        <div class="f1-f8 f-pad">
            <input type="submit" value="[[%discuss.search]]" />
        </div>
    </div>
</form>

[[+search:notempty=`
<header class="dis-cat-header dark-gradient h-group sticky-bar top">
    [[+results:notempty=`<h1>Displaying [[+start]]-[[+end]] of [[+total]] Results</h1>`]]
    [[+pagination]]
</header>

<div class="dis-threads">
    <ul class="dis-list search-results">`]]
        [[+results]]
    [[+search:notempty=`</ul>
</div>
<div class="paginate stand-alone bottom horiz-list">
[[+pagination]]
</div>
`]]
[[+bottom]]


```System Events
-------------

None.