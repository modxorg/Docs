---
title: "TinyMCE Rich Text Editor"
description: "TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor. It allows non-technical users to format content without knowing how to code"
---

## What is TinyMCE Rich Text Editor?

TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor. It allows non-technical users to format content without knowing how to code. This release was done as a companion project for the [a11y.modx.com] (https://a11y.modx.com) to provide an accessible RTE. It is based on the TinyMCE 5 code base. 

## New in TinyMCE Rich Text Editor 2.0.0

    
- Upgrade TinyMCE to 5
- MODX 3 compatibility
- Refactored `modxlink` TinyMCE plugin to use the nested `link_list` option
- Refactored `modximage` TinyMCE plugin
- Recursive merge the external config with the config
- Remove the deprecated `file_browser_callback` and use the `file_picker_callback`
- Add `link_list_enable` system setting
- Allow direct JSON based `style_formats` items
- MODX `skintool.json` for [TinyMCE 5 Skin Tool](http://skin.tiny.cloud/t5/)


## History

- Author: Jan Peca [theboxer](https://github.com/theboxer)
- Contributors: [jako](https://modx.com/extras/author/jako)

## Download

TinyMCE Rich Text Editor can be downloaded and installed from within the MODX Revolution Manager via [Package Manager](developing-in-modx/advanced-development/package-management "Package Manager") (**Extras** > **Installer**), or from the [MODX Extras Repository](https://modx.com/extras/package/tinymcerichtexteditor).

## Development and Bug Reporting

TinyMCE Rich Text Editor is stored and developed using GitHub, and can be found here: [TinyMCE RTE GitHub main page](https://github.com/modxcms/tinymce-rte).

Bugs and feature requests can be filed here: [TinyMCE Rich Text Editor issues page.](https://github.com/modxcms/tinymce-rte/issues).

## See also

1. [Tiny Cloud Docs](https://www.tiny.cloud/docs/)
2. [Connecting custom fonts](extras/tinymcerte/customfonts)
3. [TinyMCE Extra](extras/tinymce)