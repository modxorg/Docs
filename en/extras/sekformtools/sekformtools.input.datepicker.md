---
title: "sekFormTools.input.datepicker"
_old_id: "979"
_old_uri: "revo/sekformtools/sekformtools.input.datepicker"
---

## What is input.datepicker?

Add a datepicker to a form quickly and easily using this snippet.

## Usage

Example for input.datepicker:

``` php 
[[input.datepicker? &value=`5/3/2012`]]
```

## Properties

| Name | Description | Default | Required | Version |
|------|-------------|---------|----------|---------|
| input\_id | The id to assign to the input box. |  |  | >0.0.1 |
| name | The name to assign to the input box. |  |  | >0.0.1 |
| value | The value to assign to the input box. |  |  | >0.0.1 |
| menu | Enter "1" to add year and month drop down to the date picker. |  |  | >0.0.1 |
| date\_format | Add year and month drop down to the date picker. |  |  | >0.0.1 |
| min\_date | Set the minimum date to use. |  |  | >0.0.1 |
| max\_date | Set the maximum date that can be used. |  |  | >0.0.1 |
| animation | The method the calendar is displayed. | show |  | >0.0.1 |

### date\_format

The date can be formatted in several ways, below are a few examples:

- mm/dd/yy
- yy-mm-dd
- d M, y
- d MM, y
- DD, d MM, yy

### animation

There are several different animations available:

- show (default)
- slideDown
- fadeIn
- blind
- bounce
- clip
- drop
- fold
- slide