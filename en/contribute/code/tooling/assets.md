---
title: Building assets
---

The assets in MODX affect the manager, and include core JavaScript and Sass/CSS files.

## Location

Source assets can be found in these locations:

- `_build/templates/default/` contains the build workflow, as well as a `package.json` that is used to import some third party dependencies.
- `_build/templates/default/sass/` contains the source Sass files (in scss format), 
- `manager/assets/` contains all manager-related javascript files. The files that are necessary on each page are combined and compressed through the build workflow in `_build/templates/default`. 

## Building assets

[Please find detailed information about installing and running the assets workflow on GitHub](https://github.com/modxcms/revolution/blob/2.x/_build/templates/default/README.md)


