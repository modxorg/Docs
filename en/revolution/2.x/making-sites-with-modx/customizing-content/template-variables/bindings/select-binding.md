---
title: "SELECT Binding"
_old_id: "272"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/select-binding"
---

What is the @SELECT Binding?
----------------------------

The @SELECT binding calls a database query based on the provided value and returns the result.

Syntax
------

```
<pre class="brush: php">
@SELECT `pagetitle` AS `name`,`id` FROM `[[+PREFIX]]site_content` WHERE `published` = 1 AND `deleted` = 0

```To write one of these, you need to be familiar with [MySQL syntax](http://dev.mysql.com/doc/refman/5.1/en/). It is recommended that you first write a functional MySQL statement that executes without error in the MySQL command line (see errors, below for some pit-falls). Once you've verified that your query works, then you can create a @SELECT binding with it.

All you need to do is after you've got a working MySQL query is:

- add an '@' symbol in front of your SELECT
- omit the final semi-colon and any comments
- put the query on a single line (no returns!)

You can place this binding in one of two places:

- On a page (edit the page in the manager). The page where you want to put this binding must be using a valid template, and that template must have the correct template variable(s) associated with it. If you've created the [Template Variable](/revolution/2.x/making-sites-with-modx/customizing-content/template-variables "Template Variables") and associated it with a [Template](/revolution/2.x/making-sites-with-modx/structuring-your-site/templates "Templates"), and the page you're working on is using that [Template](/revolution/2.x/making-sites-with-modx/structuring-your-site/templates "Templates"), then you'll have a place to enter in some text for that variable when you edit the page. Paste the "@SELECT ..." stuff in there. It sounds more complicated than it is, but this section is written verbosely for the sake of clear documentation.
- You can also place the query into the "Default Value" box for the Template Variable. If you replace the default text of a Template Variable that's already in use, be careful, because your pages might require a specific type of output, e.g. the output type that a @SELECT binding returns.

<div class="warning">REMEMBER: The query must be on ONE LINE. No returns!</div>You'll need to select only 2 columns - the first being the display value, the second being the value of each row (the input value).

For example, to grab a list of active users in a SELECT box:

```
<pre class="brush: php">
@SELECT `username` AS `name`,`id` FROM `[[+PREFIX]]users` WHERE `active` = 1

```Alternatives
------------

Before we get any more complicated, consider doing this a different way. A [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") might do the job more easily than a binding.

If your query needs to work with template variables and you need specialized formatting for the output, the @SELECT binding is probably not the way to go. Pretty much everything that's done with the bindings is also possible with [Snippets](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets"); the bindings just provide a shortcut. When you start over-using the shortcut, you may run into headaches.

Having a blank Option
---------------------

Select queries are a great way to power a listbox dropdown, but since they ALWAYS return results, it can be problematic if you want your dropdown to have an empty option? We can rely on MySQL's "UNION ALL" feature to accomplish this.

Consider the following query:

```
<pre class="brush: php">
@SELECT '-none-' AS username, 0 AS id UNION ALL 
SELECT `username`,`id` FROM `[[+PREFIX]]users` WHERE `active` = 1 ORDER BY username ASC

```Just be aware that the sort order here may force your empty option somewhere into the stack instead of keeping it on top. In the above example, a hyphen is used in the username to ensure that it sorts to the top of the list.

More Complex Example: Template Variables
----------------------------------------

What if you need to write a query that accesses the template variables associated with a particular page? Those variables aren't directly stored in the _site\_content_ table, they are stored in other tables. This forces you to write a JOIN statement. Here's a more tangible example: let's say all the pages in a particular folder have a template variable for _opening\_date_... that field doesn't exist in the "site\_content" table. Hold onto your butts, because this gets complicated. You have to look at MODx's gory plumbing in order to pull this off. You have to understand how MODx extends the data stored in the "site\_content" table and makes use of the custom fields known as "Template Variables". This is open to some debate, but unfortunately, MODx's database schema doesn't follow the strict best practices for foreign keys... it's not always clear which table is being referenced by a particular column... it's not even always clear that a column ''is'' a foreign key, but rest assured, it is possible... it just takes a bit of patience to figure out.

First, have a look at the following tables (you may have prefixes to your table names):

- _site\_templates_ - contains the actual template code used for the site (lots of HTML appears in the content field).
- _site\_tmplvars_ - contains the name of template variable. The "name" field is what triggers the substitution. E.g. A name of "my\_template\_variable" should be used as "\[\[\*my\_template\_variable\]\]". If you care to think of this architecturally, this table defines the variable class: the name and type of variable that a series of pages will have.
- _site\_tmplvar\_contentvalues_ - contains the values of the template variables for each page that uses them. The database table has 4 fields: id, tmplvarid (foreign key back to site\_tmplvars.id), contentid (foreign key back to site\_content.id), value (a text field). Architecturally, this table represents _instances_ of the particular class. In other words, one row in the _site\_tmplvars_ table might have multiple rows in this table (one row for each instance of the variable).
- _site\_tmplvar\_templates_ - This is a mapping table which associates a Template Variable with a Template (maps site\_template:id to site\_tmplvars:id). Contains 3 fields: tmplvarid, templateid, rank.

In our example, we want to filter based on a custom date field named "opening\_date", but if you look closely, the site\_tmplvar\_contentvalues.value field is a _text_ field. MySQL won't automatically recognize arbitrary text as a date value, so you'll have to make use of MySQL's [str\_to\_date()](http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_str-to-date) function. You may think that the site\_tmplvars.display\_params is a savior here, but it's not... you end up smashing your nose directly into the nasty truth that the formats used by PHP's [strftime()](http://www.php.net/strftime) (stored in site\_tmplvars.display\_params) are **not** the same as what MySQL can use in its STR\_TO\_DATE() function. There may be a way to automatically do this, but it's easier to just hard-code it. You might end up with a query like this:

```
<pre class="brush: php">
SELECT
        page.alias,
        tv_val.value,
        DATE_FORMAT(STR_TO_DATE(tv_val.value, '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as `Formatted Opening Date`,

FROM site_content as page
JOIN site_tmplvar_contentvalues as tv_val ON page.id=tv_val.id
WHERE
        page.parent='95'
        AND tv_val.tmplvarid='6' /* 6 is the opening_date */
        AND DATE_FORMAT(STR_TO_DATE(tv_val.value, '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s')>'2008-10-24 13:04:57'
;

```<div class="note">MODx uses the MyISAM table engine, not InnoDB, so it does not rigidly enforce the foreign key constraints that are inferred by the table structure.</div>Errors
------

What if your MySQL statement executes perfectly, but once you put it in your SELECT binding, it fails? Well, there are some pit-falls. The implementation isn't perfect. Pay close attention to the following:

- Your query **MUST** appear on one line. Newline characters cause the @SELECT binding to choke.
- Delete all MySQL comments /\* this style \*/ and -- this style
- Make sure you have entered the table names correctly! Many sites use table-prefixes, so it is imperative that you test your queries before trying to use them in a @SELECT Binding. If your query has an error, MODx will log the error to the error log.

Next Step: Formatting
---------------------

Ok, so you can return a bunch of data from the database... now what? If you need to format it intelligently, you might get some mileage out of the Output Renders, but you might find the available options limiting to you. You can write your own [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") that formats the value of a Template Variable.

Security
--------

Does this binding let you execute UPDATE, INSERT, or DELETE queries (or, **gasp**, DROP TABLE statements)? Even if it doesn't _directly_ support this, you may be able to construct and execute a complex query that SELECT's the result of a such a destructive query. At the very least, a user could construct a query to select another user's password hash or to see documents that the user isn't supposed to have access to. A lot of the CMS's out there give **full** access to the database (including DROP and DELETE statements) with the database handle used by the application. That's dangerous, and the @SELECT binding may expose some of those same vulnerabilities.

See Also
--------

- [Template Variables](/revolution/2.x/making-sites-with-modx/customizing-content/template-variables "Template Variables")
- [Bindings](/revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings "Bindings")