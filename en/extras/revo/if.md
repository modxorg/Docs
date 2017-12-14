---
title: "If"
_old_id: "661"
_old_uri: "revo/if"
---

<div>- [What is If?](#If-WhatisIf%3F)
- [History](#If-History)
  - [Download](#If-Download)
  - [Development and Bug Reporting](#If-DevelopmentandBugReporting)
- [Usage](#If-Usage)
  - [Available Properties](#If-AvailableProperties)
  - [Available Operators](#If-AvailableOperators)
- [Examples](#If-Examples)

</div>What is If?
-----------

A logical conditional snippet that allows for conditionals in MODx.

History
-------

If was written by Jason Coward (opengeek) and Shaun McCormick (splittingred) and first released on Oct 29th, 2009.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modxcms.com/extras/package/600>

### Development and Bug Reporting

If is stored and developed in GitHub, and can be found here:<http://github.com/splittingred/If>

Bugs can be filed here: <http://github.com/splittingred/If/issues>

Usage
-----

The If snippet can be called using the tags:

```
<pre class="brush: php">[[If]]

```or, in case your subject can be modified before the resource cache get cleared use the uncached syntax:

```
<pre class="brush: php">[[!If]]

```### Available Properties

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>subject</td> <td>The value to perform the conditional on.</td> <td> </td> </tr><tr><td>operator</td> <td>The operator to compare the subject against.</td> <td>=</td> </tr><tr><td>operand</td> <td>If needed, the value to compare the subject against using the operator.</td> <td> </td> </tr><tr><td>then</td> <td>If the condition is true, output this.</td> <td> </td> </tr><tr><td>else</td> <td>If the condition is false, output this.</td> <td> </td> </tr><tr><td>debug</td> <td>If true, print out all the passed properties.</td> <td>0</td> </tr><tr><td>die</td> <td>If debug and this is true, die() after printing the properties.</td> <td>0</td></tr></tbody></table>### Available Operators

<table><tbody><tr><th>Operator</th> <th>Description</th> </tr><tr><td>!=,neq,not,isnot,isnt,unequal,notequal</td> <td>Passes if the subject is unequal to the operand.</td> </tr><tr><td>==,=,eq,is,equal,equals,equalto</td> <td>Passes if the subject is equal to the operand.</td> </tr><tr><td><,lt,less,lessthan</td> <td>Passes if the subject is less than the operand.</td> </tr><tr><td>>,gt,greater,greaterthan</td> <td>Passes if the subject is greater than the operand.</td> </tr><tr><td><=,lte,lessthanequals,lessthanorequalto</td> <td>Passes if the subject is less than or equal to the operand.</td> </tr><tr><td>>=,gte,greaterthanequals,greaterthanequalto</td> <td>Passes if the subject is greater than or equal to the operand.</td> </tr><tr><td>isempty,empty</td> <td>Passes if the subject is empty.</td> </tr><tr><td>!empty,notempty,isnotempty</td> <td>Passes if the subject is not empty.</td> </tr><tr><td>isnull,null</td> <td>Passes if the subject is null.</td> </tr><tr><td>inarray,in\_array,ia</td> <td>Passes if the subject is found in the operand list. (comma-delimited string)   
</td></tr></tbody></table>Examples
--------

Numeric comparison:

```
<pre class="brush: php">[[!If? &subject=`[[+total]]` &operator=`GT` &operand=`3` &then=`You have more than 3 items!`]]

```String comparison:

```
<pre class="brush: php">[[!If?
   &subject=`[[+name]]`
   &operator=`EQ`
   &operand=`George`
   &then=`Hey George! Long time no see!`
   &else=`You're not George. Go away.`
]]

```Inline snippet calls:

```
<pre class="brush: php">[[!If?
   &subject=`[[+modx.user.id]]`
   &operator=`EQ`
   &operand=`0`
   &then=`[[Login]]`
   &else=`[[Logout]]`
]]

```When using the If snippet for checking a resource field or template variable (or other value that doesn't change before the cache does), be sure to use the **cached** snippet call to check the condition to make sure it doesn't need to process on every request.

```
<pre class="brush: php">[[If?
   &subject=`[[*hidemenu]]`
   &operator=`EQ`
   &operand=`1`
   &then=`This resource is not visible in the menu.`
   &else=`This resource shows up in the menu in spot [[*menuindex]].`
]]

```Example with in\_array:

```
<pre class="brush: php">[[If?
   &subject=`[[*id]]`
   &operator=`inarray`
   &operand=`3,4`
   &then=`This text will show if id is 3 or 4.`
   &else=`This text is printed for all other resource id's.`
]]
```