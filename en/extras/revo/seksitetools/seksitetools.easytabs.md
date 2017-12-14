---
title: "sekSiteTools.easytabs"
_old_id: "982"
_old_uri: "revo/seksitetools/seksitetools.easytabs"
---

What is easytabs?
-----------------

Easytabs will create css tabs on a page.

Usage
-----

Example for easytabs:

```
<pre class="brush: php">
[[easytabs? &tabContent=`
                [{"tab_id":"one","tab_name":"One","tab_content":"Content 1"},
                {"tab_id":"two","tab_name":"Two","tab_content":"Content 2"},
                {"tab_id":"three","tab_name":"Three","tab_content":"$chunkName"}]
            `]]

```See the snippet properties for more options.

Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>tabContent</td><td>JSON array of data to display in the tabs.   
</td><td> </td><td>Yes   
</td><td>>0.0.2</td></tr><tr><td>cssFile</td><td>Specify the location of the css file to use.   
</td><td> </td><td> </td><td>>0.0.2</td></tr></tbody></table>### tabContent

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>tab\_id</td><td>ID for the field.   
</td><td> </td><td>Yes   
</td><td>>0.0.2</td></tr><tr><td>tab\_name</td><td>Name to display on the tab.   
</td><td> </td><td>Yes   
</td><td>>0.0.2</td></tr><tr><td>tab\_content</td><td>Content to display in the tab. To display content from a chunk prefix the chunk name with a "$".   
</td><td> </td><td>Yes   
</td><td>>0.0.2</td></tr></tbody></table>