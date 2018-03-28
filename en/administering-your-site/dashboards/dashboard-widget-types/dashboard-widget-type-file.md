---
title: "Dashboard Widget Type - File"
_old_id: "85"
_old_uri: "2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-file"
---

The File Dashboard Widget Type runs a file on the filesystem, which can either:

- Return the output of the file, rendering it in the content pane of the widget
- Return the name of a class that extends modDashboardWidgetInterface, a MODX-provided abstract class, that has a render() method that will return the output to render to the content pane of the widget

## Usage

Simply place the name of the file in the content textarea of the widget. You can use the following placeholders to reference the widget path:

- \[\[++base\_path\]\]
- \[\[++core\_path\]\]
- \[\[++manager\_path\]\]
- \[\[++assets\_path\]\]
- \[\[++manager\_theme\]\]

### Returning the Output

There are two methods in your external file to return the content of the widget. The first is simply returning the output, like so:

``` php 
<?php
return 'Hello, world!';
```

Will render "Hello, world!" in the content panel of the widget.

### Returning a Class Name

You can also return a class name of a class you have defined in your external file that extends the class modDashboardWidgetInterface, which is an abstract class provided by MODX for rendering of widgets. This is useful for widget developers who want an OOP approach that unit tests can be run against.

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

This widget would return as its content:

> Hello, World! Version: 1.0

## Available Variables

File-based widgets have the following PHP variables available to them:

- $modx - A reference to the MODX instance.
- $scriptProperties - An array of properties of this Dashboard Widget, as if toArray() were run on the widget object.

## See Also

1. [Dashboard Widget Type - File](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-file)
2. [Dashboard Widget Type - HTML](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-html)
3. [Dashboard Widget Type - Inline PHP](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-inline-php)
4. [Dashboard Widget Type - Snippet](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-snippet)