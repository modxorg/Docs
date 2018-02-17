---
title: "FILE Binding"
_old_id: "125"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/file-binding"
---

## What is the @FILE Binding?

The @FILE Binding returns the contents of any specified file.

## Syntax

```
<pre class="brush: php">
@FILE file_path

```Binds the variable to a file, where **_file\_path_** is the path and name of the file. The return value is a string containing the content of the file. The file path is the absolute path from the root of the server or your particular installation.

The **@FILE** command is very useful in cases where we might want to generate data that's available in file. By using the **||** and **==** characters as a delimiter we could interface with any external database application.

## Usage

For example: Let's say we have a text file called headline\_news.txt that is external to our database system. This file is constantly being updated with up-to-the-minute news items by another external system. We want to display these news items on our website for our visitors to see. How can we do that?

First, we might create a new Template Variable. We then add the @FILE command inside the default value of the TV. This will point to where the headline\_news.txt is located in our example. Our default value might look like this:

> @FILE assets/news/headline\_news.txt

Let's say each headline in the headline\_news.txt file is separated by a new-line (lf or \\n) character. We can use the Delimiter render to separate each item and display them one at a time. Our fields will look like this:

![](/download/attachments/18678209/tv-file-input-opt.png?version=1&modificationDate=1330458315000)

![](/download/attachments/18678209/tv-file-output-opt.png?version=1&modificationDate=1330458328000)

And voila! We have our dynamically rendering @FILE binding.

## See Also

- [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables")
- [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings "Bindings")