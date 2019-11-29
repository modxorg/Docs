---
title: "If"
_old_id: "661"
_old_uri: "revo/if"
---

## What is If?

A logical conditional snippet that allows for conditionals in MODX.

## History

If was written by Jason Coward (opengeek) and Shaun McCormick (splittingred) and first released on Oct 29th, 2009.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modxcms.com/extras/package/600>

### Development and Bug Reporting

If is stored and developed in GitHub, and can be found here:<http://github.com/splittingred/If>

Bugs can be filed here: <http://github.com/splittingred/If/issues>

## Usage

The If snippet can be called using the tags:

``` php
[[If]]
```

or, in case your subject can be modified before the resource cache get cleared use the uncached syntax:

``` php
[[!If]]
```

### Available Properties

| Name     | Description                                                             | Default Value |
| -------- | ----------------------------------------------------------------------- | ------------- |
| subject  | The value to perform the conditional on.                                |               |
| operator | The operator to compare the subject against.                            | =             |
| operand  | If needed, the value to compare the subject against using the operator. |               |
| then     | If the condition is true, output this.                                  |               |
| else     | If the condition is false, output this.                                 |               |
| debug    | If true, print out all the passed properties.                           | 0             |
| die      | If debug and this is true, die() after printing the properties.         | 0             |

### Available Operators

| Operator                                    | Description                                                                  |
| ------------------------------------------- | ---------------------------------------------------------------------------- |
| !=,neq,not,isnot,isnt,unequal,notequal      | Passes if the subject is unequal to the operand.                             |
| ==,=,eq,is,equal,equals,equalto             | Passes if the subject is equal to the operand.                               |
| <,lt,less,lessthan                          | Passes if the subject is less than the operand.                              |
| >,gt,greater,greaterthan                    | Passes if the subject is greater than the operand.                           |
| <=,lte,lessthanequals,lessthanorequalto     | Passes if the subject is less than or equal to the operand.                  |
| >=,gte,greaterthanequals,greaterthanequalto | Passes if the subject is greater than or equal to the operand.               |
| isempty,empty                               | Passes if the subject is empty.                                              |
| !empty,notempty,isnotempty                  | Passes if the subject is not empty.                                          |
| isnull,null                                 | Passes if the subject is null.                                               |
| inarray,in\_array,ia                        | Passes if the subject is found in the operand list. (comma-delimited string) |

## Examples

Numeric comparison:

``` php
[[!If? &subject=`[[+total]]` &operator=`GT` &operand=`3` &then=`You have more than 3 items!`]]
```

String comparison:

``` php
[[!If?
   &subject=`[[+name]]`
   &operator=`EQ`
   &operand=`George`
   &then=`Hey George! Long time no see!`
   &else=`You're not George. Go away.`
]]
```

Inline snippet calls:

``` php
[[!If?
   &subject=`[[+modx.user.id]]`
   &operator=`EQ`
   &operand=`0`
   &then=`[[Login]]`
   &else=`[[Logout]]`
]]
```

When using the If snippet for checking a resource field or template variable (or other value that doesn't change before the cache does), be sure to use the **cached** snippet call to check the condition to make sure it doesn't need to process on every request.

``` php
[[If?
   &subject=`[[*hidemenu]]`
   &operator=`EQ`
   &operand=`1`
   &then=`This resource is not visible in the menu.`
   &else=`This resource shows up in the menu in spot [[*menuindex]].`
]]
```

Example with in\_array:

``` php
[[If?
   &subject=`[[*id]]`
   &operator=`inarray`
   &operand=`3,4`
   &then=`This text will show if id is 3 or 4.`
   &else=`This text is printed for all other resource id's.`
]]
```
