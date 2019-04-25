---
title: "PackMan"
_old_id: "687"
_old_uri: "revo/packman"
---

## What is PackMan?

PackMan is a Transport Package building tool for packing up Templates, TVs, Snippets, Chunks and other Packages into a Transport Package, ready for distribution.

## History

PackMan was written by Shaun McCormick as a package transport Extra, and first released on June 10th, 2009. It is based originally off of the TemplatePackager Extra.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modxcms.com/extras/package/688>

### Development and Bug Reporting

PackMan is stored and developed in GitHub, and can be found here:<http://github.com/splittingred/PackMan>

Bugs can be filed here: <http://github.com/splittingred/PackMan/issues>

## Usage

Just install and load up the PackMan Custom Manager Page, under Components -> "PackMan".

Specify a name for your Package. All your Elements that you choose to package will be stored in a Category with this name. You can optionally specify a README or License file to add into your package. Finally, specify a version and release number.

Then select the Templates, Chunks, Snippets, and Subpackages you'd like to add in. When finished, click 'Export Transport Package' in the top right, and the transport zip will be downloaded to your browser.

## See Also

1. [PackMan.Roadmap](extras/packman/packman.roadmap)