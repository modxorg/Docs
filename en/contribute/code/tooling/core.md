---
title: Building core
---

Building the core is necessary when a change affects the (default) installation. It is the process by which `core/packages/core.transport.zip` is created, which is used by the setup.

## Preparation

When running the build for the first time, you need to prepare some files, first. 

Copy the file `_build/build.config.sample.php` to `_build/build.config.php`. 

Copy the file `_build/build.properties.sample.php` to `_build/build.properties.php`. 

> Only copy the files - you do not typically have to make any changes to them.

## Running the build

To run the build, you'll need to execute the `_build/transport.core.php` file. This process typically takes anywhere from 5 to 30 seconds. 

You can open the file in the browser, or ideally run it from the commandline:

``` bash
php _build/transport.core.php
```

## Run setup

With the new core package generated, go through the setup process in the browser. 
