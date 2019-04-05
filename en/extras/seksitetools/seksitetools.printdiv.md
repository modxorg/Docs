---
title: "printdiv"
_old_id: "984"
_old_uri: "revo/seksitetools/seksitetools.printdiv"
---

## What is printdiv?

Printdiv will copy the content of the specified div into a popup window that will then open a print dialog box to print a "printer friendly version" of the content. After the print job is sent to the printer the popup window will automatically close.

## Usage

Example for printdiv:

``` php 
[[printdiv? &divID=`test` &linkText=`link`]]
<div id="test">test data</div>
```

You can also specify the width and height of the popup:

``` php 
[[printdiv? &divID=`test` &linkText=`link` &width=`200` &height=`300`]]
<div id="test">test data</div>
```

See the snippet properties for more options.

## Properties

| Name | Description | Default | Required | Version |
|------|-------------|---------|----------|---------|
| divID | The ID of the div content to be copied into the popup window to be printed. |  | Yes | >0.0.1 |
| linkText | Text that will be displayed as a link to the printer friendly pop up. |  | Yes | >0.0.1 |
| tplPrintDiv | The template that creates the link to the popup window | printdiv |  | >0.0.1 |
| tplJs | The template that holds the javascript that creates the pop up starts the printing process. | printdiv.js |  | >0.0.1 |
| width | Width of the pop up window. | 100 |  | >0.0.1 |
| height | Height of the pop up window. | 100 |  | >0.0.1 |
| cssFile | Specify the location of the css file to use. |  |  | >0.0.1 |