---
title: "Filters"
_old_id: "1750"
_old_uri: "evo/doclister/filters"
---

Filters
-------

 The package includes the following filters:

 <table><tbody><tr><td> **content** </td> <td> for filtering by site\_content table fields; can be substituted by the _addWhereList_ parameter </td> </tr><tr><td> **tv** </td> <td> for filtering by template variables </td> </tr><tr><td> **tvd** </td> <td> for filtering by template variables taking default values into account </td> </tr><tr><td> **private** </td> <td> for filtering documents taking access rights into account </td></tr></tbody></table>### Filter construction

 Example:

`    OR(AND(filter:field:operator:value;filter2:field:operator:value);(...))`

### Operators

 <dl><dt>**=, eq, is**</dt> <dd>Equal.</dd> <dt>**!=, no, isnot**</dt> <dd>Not equal.</dd> <dt>**>, gt**</dt> <dd>Greater than.</dd> <dt>**<, lt**</dt> <dd>Less than.</dd> <dt>**<=, elt**</dt> <dd>Equal or less than.</dd> <dt>**>=, egt**</dt> <dd>Equal or greater than.</dd> <dt>**%, like**</dt> <dd>Contains string.</dd> <dt>**like-r**</dt> <dd>At end of string.</dd> <dt>**like-l**</dt> <dd>At start of string.</dd> <dt>**regexp**</dt> <dd>Selection using regular expressions [REGEXP](https://dev.mysql.com/doc/refman/5.5/en/regexp.html).</dd> <dt>**against**</dt> <dd>Fulltext search.</dd><dd>Example:</dd>`    [[DocLister? &filters=`AND(content:pagetitle,description,content,introtext:against:search string)`]]` <dd>This example assumes the database has FULLTEXT indexes for the pagetitle, description, content and introtext fields</dd> <dt>**containsOne**</dt> <dd>Search for any word or part of a word using LIKE.</dd><dd>Example:</dd>`    [[DocLister? &filters=`AND(content:content:containsOne:when,begin,peace)`]]` <dd>This will build a SQL query element thus:</dd>`    (content LIKE '%when%' OR content LIKE '%begin%' OR content LIKE '%peace%')` <dd>That is, the end result will be the selection of documents where the words “when” or “begin” or “peace” are used in the text.</dd><dd>Is it evident from the example that the words are separated by commas. This behaviour can be defined with the _filter\_delimiter_ parameter</dd> <dt>**in**</dt> <dd>Is in the set.</dd> <dt>**notin**</dt> <dd>Is not in the set.</dd></dl> An example of a call filtering by price between 0 and 300:

`    [[DocLister? &filters=`AND(tv:price:gt:0;tv:price:lt:300)`]]`

 The same thing, but taking default values into account:

`    [[DocLister? &filters=`AND(tvd:price:gt:0;tvd:price:lt:300)`]]`