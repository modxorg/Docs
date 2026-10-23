---
title: "File"
description: "The File Dashboard Widget of MODX: the ways a file can return the content of a widget, and the variables it has available."
_old_id: "85"
_old_uri: "2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-file"
---

The File Dashboard Widget Type runs a file on the filesystem. The file can return the content of the widget in three ways:

- Return the output of the file, which is rendered in the content pane of the widget.
- Print the output of the file and return nothing.
- Return the name of a class that extends `modDashboardWidgetInterface`, the abstract class that MODX provides for widgets. The class has a `render()` method that returns the output.

## Usage

Simply place the name of the file in the content textarea of the widget. You can use the following placeholders to reference the widget path:

- `[[++base_path]]`
- `[[++core_path]]`
- `[[++manager_path]]`
- `[[++assets_path]]`
- `[[++manager_theme]]`

**Use an absolute path**
A relative path is resolved against the working directory of the PHP process, not against the root of MODX. It does not survive a move of the installation. Build the path from `[[++manager_path]]` and the like.

### Returning the Output

The first way to return the content of the widget is to return the output, like so:

``` php
<?php
return 'Hello, world!';
```

The widget renders "Hello, world!" in its content panel.

### Printing the Output

A file that prints its output and returns nothing works as well:

``` php
<?php
echo 'Hello, world!';
```

The output of the file is captured and rendered in the content panel of the widget.

### Returning a Class Name

You can also return the name of a class that you have defined in your external file and that extends `modDashboardWidgetInterface`. This is useful for widget developers who want an OOP approach that unit tests can be run against.

An example class-based widget would look like this:

``` php
class modDashboardWidgetHelloWorld extends modDashboardWidgetInterface {
    public $version = '1.0';

    public function render() {
        $o = 'Hello, World! Version: '.$this->version;
        return $o;
    }
}
return 'modDashboardWidgetHelloWorld';
```

This widget returns as its content:

> Hello, World! Version: 1.0

## Available Variables

File-based widgets have the following PHP variables available to them:

- `$modx` - A reference to the MODX instance.
- `$scriptProperties` - An array of properties of this Dashboard Widget, as if `toArray()` were run on the widget object.

## See Also

1. [Dashboard Widget Type - File](building-sites/client-proofing/dashboards/widget-types/file)
2. [Dashboard Widget Type - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Dashboard Widget Type - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Dashboard Widget Type - Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)
