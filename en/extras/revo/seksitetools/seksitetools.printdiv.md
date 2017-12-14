---
title: "sekSiteTools.printdiv"
_old_id: "984"
_old_uri: "revo/seksitetools/seksitetools.printdiv"
---

What is printdiv?
-----------------

Printdiv will copy the content of the specified div into a popup window that will then open a print dialog box to print a "printer friendly version" of the content. After the print job is sent to the printer the popup window will automatically close.

Usage
-----

Example for printdiv:

```
<pre class="brush: php">
[[printdiv? &divID=`test` &linkText=`link`]]
<div id="test">test data</div>

```You can also specify the width and height of the popup:

```
<pre class="brush: php">
[[printdiv? &divID=`test` &linkText=`link` &width=`200` &height=`300`]]
<div id="test">test data</div>

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>divID</td><td>The ID of the div content to be copied into the popup window to be printed.   
</td><td>  
</td><td>Yes   
</td><td>>0.0.1</td></tr><tr><td>linkText</td><td>Text that will be displayed as a link to the printer friendly pop up.   
</td><td> </td><td>Yes   
</td><td>>0.0.1</td></tr><tr><td>tplPrintDiv</td><td>The template that creates the link to the popup window   
</td><td>printdiv</td><td> </td><td>>0.0.1</td></tr><tr><td>tplJs</td><td>The template that holds the javascript that creates the pop up starts the printing process.   
</td><td>printdiv.js</td><td> </td><td>>0.0.1</td></tr><tr><td>width</td><td>Width of the pop up window.   
</td><td>100   
</td><td> </td><td>>0.0.1</td></tr><tr><td>height</td><td>Height of the pop up window.   
</td><td>100   
</td><td> </td><td>>0.0.1</td></tr><tr><td>cssFile</td><td>Specify the location of the css file to use.   
</td><td> </td><td> </td><td>>0.0.1</td></tr></tbody></table>