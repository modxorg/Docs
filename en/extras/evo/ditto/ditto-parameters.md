---
title: "Ditto Parameters"
_old_id: "631"
_old_uri: "evo/ditto/ditto-parameters"
---

 Parameter description for Ditto version 2.1.1 (bundled with MODX 1.0.15)

Main parameters
---------------

 <table><tbody><tr><th> Parameter </th> <th> Description </th> <th> Options </th> <th> Default </th> </tr><tr><td> config </td> <td> Load a custom configuration </td> <td> "default" - default blank config file   
 CONFIG\_NAME - Other configs installed in the configs folder or in any folder within the MODX base path via @FILE </td> <td> `default` </td> </tr><tr><td> dateFormat </td> <td> Format the \[+date+\] placeholder in human readable form </td> <td> Any valid format for PHP function [strftime()](http://php.net/manual/en/function.strftime.php) </td> <td> $\_lang\["dateFormat"\] - From Ditto language file. Default for English language is `%d-%b-%y %H:%M` </td> </tr><tr><td> dateSource </td> <td> Source of the \[+date+\] placeholder </td> <td> Any UNIX timestamp from MODX fields or TVs such as createdon, pub\_date, or editedon </td> <td> `createdon` </td> </tr><tr><td> debug </td> <td> Output debugging information </td> <td> 0 (off), 1 (on) </td> <td> `0` </td> </tr><tr><td> depth </td> <td> Depth of document tree levels to fetch from </td> <td> positive integer (0 for unlimited) </td> <td> `1` </td> </tr><tr><td> display </td> <td> Number of documents to display   
 (per page if pagination is on) </td> <td> positive integer, `all` (all documents found) </td> <td> `all` </td> </tr><tr><td> ditto\_base </td> <td> Location of Ditto files </td> <td> Any valid folder location containing the Ditto source code with a trailing slash </td> <td> \[(base\_path)\]assets/snippets/ditto/ </td> </tr><tr><td> documents </td> <td> IDs of documents for Ditto to retrieve. Overrides &parents property. </td> <td> Comma-separated list of IDs of resources to list </td> <td> none </td> </tr><tr><td> extenders </td> <td> Load an extender which adds functionality to Ditto </td> <td> Any extender in the extenders folder or in any folder within the MODX base path via @FILE. May be a comma separated list of extenders. </td> <td> none </td> </tr><tr><td> format </td> <td> Output format to use </td> <td> html, json, xml, atom, rss </td> <td> `html` </td> </tr><tr><td> hiddenFields </td> <td> Allow Ditto to retrieve fields its template parser cannot handle such as nested placeholders and \[\*fields\*\] </td> <td> Any valid MODX fieldnames or TVs comma separated </td> <td> none </td> </tr><tr><td> hideFolders </td> <td> Don't show folders in the returned results </td> <td> 0 - show folders  
 1 - hide folders </td> <td> `0` </td> </tr><tr><td> hidePrivate </td> <td> Don't show documents the guest or user does not have permission to see </td> <td> 0 - show private documents  
 1 - hide private documents </td> <td> `1` </td> </tr><tr><td> id </td> <td> Unique ID for this Ditto instance for connection with other scripts (like Reflect) and unique URL parameters </td> <td> Any combination of characters a-z, underscores, and numbers 0-9 (This is case sensitive) </td> <td> blank </td> </tr><tr><td> keywords </td> <td> Enable fetching of associated keywords for each document. Can be used as \[+keywords+\] or as a tagData source </td> <td> 0 (off), 1 (on) </td> <td> `0` </td> </tr><tr><td> language </td> <td> language for defaults, debug, and error messages </td> <td> Any language name with a corresponding file in the &ditto\_base/lang folder </td> <td> `english` </td> </tr><tr><td> noResults </td> <td> Text or chunk to display when there are no results </td> <td> Any valid chunk name or text </td> <td> $\_lang\['no\_documents'\] - From Ditto language file. Default for English language is `<p>No documents found.</p>` </td> </tr><tr><td> orderBy </td> <td> Sort the result set </td> <td> Any valid MySQL style orderBy statement </td> <td> `createdon DESC` </td> </tr><tr><td> parents </td> <td> IDs of containers for Ditto to retrieve their children to &depth depth </td> <td> Comma-separated list of resource IDs </td> <td> current resource </td> </tr><tr><td> phx </td> <td> Use PHx formatting </td> <td> 0 (off), 1 (on) </td> <td> `1` </td> </tr><tr><td> queryLimit </td> <td> Number of documents to retrieve from the database, same as MySQL LIMIT </td> <td> positive integer, `0` (automatic) </td> <td> `0` </td> </tr><tr><td> randomize </td> <td> Randomize the order of the output </td> <td> 0 (off), 1 (on), Any MODX field or TV name (for weighted random by that field) </td> <td> `0` </td> </tr><tr><td> removeChunk </td> <td> Name of chunks to be stripped from content separated by commas. Commonly used to remove comments. </td> <td> Any valid chunkname that appears in the output </td> <td> none </td> </tr><tr><td> save </td> <td> Saves the ditto object and results set to placeholders for use by other snippets </td> <td> 0 - off; returns output  
 1 - remaining; returns output  
 2 - all;  
 3 - all; returns ph only </td> <td> `0` </td> </tr><tr><td> seeThruUnpub </td> <td> See through unpublished folders to retrive their children. Used when depth is greater than 1. </td> <td> 0 (off), 1 (on) </td> <td> `0` </td> </tr><tr><td> showInMenuOnly </td> <td> Show only documents visible in the menu </td> <td> 0 - show all documents   
 1 - show only documents with the "show in menu" flag checked </td> <td> `0` </td> </tr><tr><td> showPublishedOnly </td> <td> Show only published documents </td> <td> 0 - show only unpublished documents   
 1 - show both published and unpublished documents </td> <td> `1` </td> </tr><tr><td> start </td> <td> Number of documents to skip in the results </td> <td> positive integer, `0` (don't skip) </td> <td> `0` </td> </tr><tr><td> total </td> <td> Number of documents to retrieve </td> <td> positive integer, `all` (all documents found) </td> <td> `all` </td> </tr><tr><td> where </td> <td> Custom MySQL WHERE statement </td> <td> A valid MySQL WHERE statement using only document object items (no TVs) </td> <td> blank </td></tr></tbody></table>Filtering
---------

 <table><tbody><tr><th> Parameter </th> <th> Description </th> <th> Options </th> <th> Default </th> </tr><tr><td> filter </td> <td> Removes items not meeting a critera. Thus, if pagetitle == joe then it will be removed. </td> <td> Use in the format "field,criteria,mode" with the comma being the local delimiter.  
  
**Mode - Meaning**  
 1 - != (not equal)   
 2 - == (equals)   
 3 - < (lower than)   
 4 - > (greater than)   
 5 - <= (lower than or equal)   
 6 - >= (greater than or equal)   
 7 - Text not in field value   
 8 - Text in field value   
 9 - case insenstive version of #7   
 10 - case insenstive version of #8   
 11 - checks leading character of the field   
  
**@EVAL:**  
 @EVAL in filters works the same as it does in MODX exect it can only be used with basic filtering, not custom filtering (tagging, etc). Make sure that you return the value you wish Ditto to filter by and that the code is valid PHP. </td> <td> none </td> </tr><tr><td> globalFilterDelimiter </td> <td> Filter delimiter used to separate filters in the filter string </td> <td> Any character not used in the filters </td> <td> `|` </td> </tr><tr><td> localFilterDelimiter </td> <td> Delimiter used to separate individual parameters within each filter string </td> <td> Any character not used in the filter itself </td> <td> `,` </td></tr></tbody></table>Pagination
----------

 <table><tbody><tr><th> Parameter </th> <th> Description </th> <th> Options </th> <th> Default </th> </tr><tr><td> paginate </td> <td> Paginate the results set into pages of &display length.   
 Use &total to limit the number of documents retrieved. </td> <td> 0 (off), 1 (on) </td> <td> `0` </td> </tr><tr><td> paginateAlwaysShowLinks </td> <td> Determine whether or not to always show previous next links </td> <td> 0 (off), 1 (on) </td> <td> `0` </td> </tr><tr><td> paginateSplitterCharacter </td> <td> Splitter to use if always show is disabled </td> <td> Any valid character </td> <td> $\_lang\['button\_splitter'\] - From Ditto language file. Default for English language is `|` </td> </tr><tr><td> tplPaginateCurrentPage </td> <td> Template for the current page link </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> `<span class='ditto\_currentpage'>\[+page+\]</span>` </td> </tr><tr><td> tplPaginateNext </td> <td> Template for the next link </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> `<a href='\[+url+\]' class='ditto\_next\_link'>\[+lang:next+\]</a>` </td> </tr><tr><td> tplPaginateNextOff </td> <td> Template for the next link when it is off </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> `<span class='ditto\_next\_off ditto\_off'>\[+lang:next+\]</span>` </td> </tr><tr><td> tplPaginatePage </td> <td> Template for the page link </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> `<a class='ditto\_page' href='\[+url+\]'>\[+page+\]</a>` </td> </tr><tr><td> tplPaginatePrevious </td> <td> Template for the previous link </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> `<a href='\[+url+\]' class='ditto\_previous\_link'>\[+lang:previous+\]</a>` </td> </tr><tr><td> tplPaginatePreviousOff </td> <td> Template for the previous link when it is off </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> `<span class='ditto\_previous\_off ditto\_off'>\[+lang:previous+\]</span>` </td></tr></tbody></table>Templates
---------

 <table><tbody><tr><th> Parameter </th> <th> Description </th> <th> Options </th> <th> Default </th> </tr><tr><td> tpl </td> <td> User defined chunk to format the documents </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> HTML code block $\_lang\['default\_template'\] from Ditto language file (using @CODE). </td> </tr><tr><td> tplAlt </td> <td> User defined chunk to format every other document </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> value of &tpl </td> </tr><tr><td> tplCurrentDocument </td> <td> User defined chunk to format the current document </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> value of &tpl </td> </tr><tr><td> tplFirst </td> <td> User defined chunk to format the first document </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> value of &tpl </td> </tr><tr><td> tplLast </td> <td> User defined chunk to format the last document </td> <td> - Any valid chunk name  
 - Code via @CODE  
 - File via @FILE </td> <td> value of &tpl </td></tr></tbody></table>