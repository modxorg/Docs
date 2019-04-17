---
title: "sekFormTools"
_old_id: "704"
_old_uri: "revo/sekformtools"
---

## What is sekFormTools?

SekFormTools is a quick way to add combo boxes with a customized appearance, auto-complete text fields, date pickers, and input fields with prompts to your form. Grab data from any table object and display in a combo box or filter through an auto-complete field with no snippet or chunk modification, just a simple json array of data. Methods have been built in to filter a combo box based on the selection of another combo box. Have text input or text area fields with a prompt overlaying the field. Add a date picker to the form with an easy to use snippet call.

### Requirements

- MODX Revolution 2.2.0-pl2 or later
- PHP5 or later

### History

SekFormTools was written by Stephen Smith, and first released on May 3th, 2012.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/sekformtools>.

### Development and Bug Reporting

SekFormTools is on GitHub: <https://github.com/insomnix/sekFormTools>, report any issues or feature requests here: <https://github.com/insomnix/sekFormTools/issues>.

### Data

SekFormTools will install 5 tables, a country, state, US cities, US zipcodes, and a US city zip cross reference. Because of the size of the data files and number of records, the data for these tables are optionally downloaded and installed. If you wish to install this data, download [sekformtoolsdata.zip](http://www.seknetsolutions.com/downloads/sekformtoolsdata.zip), copy/paste each file into a temporary snippet, and run the snippet to install the data to the database. If anyone wishes to contribute to the these files, please contact me or post to the [current support thread](http://forums.modx.com/thread/76302/support-comments-for-sekformtools-beta).

## Usage

The sekFormTools is called through several snippets using the below tags?

- [sekFormTools.input.autocomplete](extras/sekformtools/sekformtools.input.autocomplete "sekFormTools.input.autocomplete") - A jquery auto-complete field.
- [sekFormTools.input.combobox](extras/sekformtools/sekformtools.input.combobox "sekFormTools.input.combobox") - A jquery auto-complete combo box.
- [sekFormTools.input.datepicker](extras/sekformtools/sekformtools.input.datepicker "sekFormTools.input.datepicker") - A jquery date picker field.
- [sekFormTools.input.textfield](extras/sekformtools/sekformtools.input.textfield "sekFormTools.input.textfield") - A jquery text field with suggestion overlay.
- [sekFormTools.input.helper](extras/sekformtools/sekformtools.input.helper "sekFormTools.input.helper") - Called from a blank page, used to fill auto-complete and combo boxes from a database.
- spellchecker - Call the \[\[spellchecker\]\] snippet from anywhere on a page will load spelling and grammar checking on every textarea.

For more complex setups, try [Advanced Examples](extras/sekformtools/sekformtools-advanced-examples "sekFormTools Advanced Examples").

## Available Settings

| Name                              | Description                                                                                                                                                                                                                                             | Default    | Version |
| --------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------- | ------- |
| sekformtools.load\_jquery         | This will enable or disable JQuery from being loaded when sekFormTools is called on a page. If JQuery is being loaded from another extra used on the same pages as sekFormTools, or it is loaded in a template, this setting should be set to No/False. | Yes/True   | >0.0.1  |
| sekformtools.customcss            | Location of the css file in relation to the modx assets folder.                                                                                                                                                                                         |            | >0.0.1  |
| sekformtools.theme                | The theme to use for the form fields.                                                                                                                                                                                                                   | smoothness | >0.0.1  |
| sekformtools.helper\_resource\_id | The id of the page making the jquery calls.This only needs to be set if you plan to use the autocomplete snippet or filter a combobox,                                                                                                                  |            | >0.0.1  |

## Themes

SekFormTools comes with 8 themes. Additional themes can be downloaded from the jquery.ui website and placed in the css folder.

| Theme Name     | Version |
| -------------- | ------- |
| blitzer        | >0.0.1  |
| eggplant       | >0.0.1  |
| flick          | >0.0.1  |
| overcast       | >0.0.1  |
| pepper-grinder | >0.0.1  |
| redmond        | >0.0.1  |
| smoothness     | >0.0.1  |
| ui-lightness   | >0.0.1  |
| humanity       | >0.0.5  |