---
title: "ModDef"
_old_id: "679"
_old_uri: "revo/moddef"
---

# What is ModDef?

ModDef is a component for managing definitions of terms used on your site. These definitions will show up as tooltips.

## Features

- definitions management
- use the same definition in multiple languages

## History

Being developed since Mar 02, 2011 by [Jeroen Kenters](http://modx.com/extras/author/jeroenkenters).

| Version                                              | Release date | Contributors   | Remarks / highlights |
| ---------------------------------------------------- | ------------ | -------------- | -------------------- |
| [0.1.0 alpha](http://modx.com/extras/package/moddef) | Mar 02, 2011 | Jeroen Kenters | Initial release.     |

### Requirements

- MODX Revolution

### Development & Bug reporting

ModDef is currently being developed on Github. That is also the place to **[report bugs](https://github.com/jkenters/ModDef/issues)**, file **feature requests** and **improvements**. You may also fetch the latest commits from the Develop branch.

Github: <https://github.com/jkenters/ModDef>

## Installation

1. Install through Package Management
2. if jQuery is already in your template; remove it from the moddefHeader chunk
3. add the moddefHeader chunk to your template (in the head section)
4. customize the CSS if you want

### Troubleshooting

Since this is a early beta, a lot of things might go wrong after installing this package. Just disable the plugin if you run into any problems and you should be fine. Don't forget to report bugs on our [github page](https://github.com/jkenters/ModDef/issues)!

## Usage

After installation, go to Components -> ModDef. Here you can add/update/remove definitions. Simply enter language code (en, nl, etc.), text to replace and the definition. After your save the definition it will be replaced in all paragraphs (<p> tags) on your site.

## Examples

Let's say you want to explain to your visitors that CMS means Content Management system.

1. Go to the manager
2. Choose ModDef from the Components menu
3. Click on the 'New definition' button
4. Fill in the fields;
4.1. Language: en (or whatever language code your site uses)
4.2. Text: CMS
4.3. Definition: Content Management System
5. Click on save

From now on the word CMS will be a tooltip on all paragraphs on your site, explaining that CMS means Content Management System.

## Roadmap

All of the following features will come up in later versions:

- only replace text once per page
- snippet to show definition
- translations