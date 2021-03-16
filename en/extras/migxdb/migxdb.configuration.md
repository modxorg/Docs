---
title: "Configuration"
_old_id: "931"
_old_uri: "revo/migxdb/migxdb.configuration"
---

## How the MIGXdb TV-input-type works

With MIGXdb you can manage records of custom-tables.

The visible records in the grid, can be related to the resource, which you are editing, by default joined with the field 'resource\_id' in your custom table.

Each field of your db-record can have a TV-input-type in the editor-window. This is configurable by the MIGX-configurator and/or by config files for more advanced situations.

For each input-field you can use TV-input-types for example:

- image-TV
- checkbox-TV
- dropdown-TV
- richtext-TV
- radio-TV

and most other TV-input-types and also custom-TV-input-types.

MIGXdb does also have a little package-management-tool and you can use MIGXdb to create CMPs to manage custom-tables.

It has a configurable default-grid and some default-processors.
Its possible to add context-menues, action-buttons and related functions with clicking some checkboxes.
You can also create own context-menues, action-buttons, and functions, which will be reusable for different grids.
Of course you can also use your complete own extjs-grid and your own processors.

## Installation Package-Manager / MIGX-Configurator CMP

### Create a new action

System->Actions

right-click 'migx' ->create Action here

controller: index

### Create a new menu

System->Actions

right-click 'Components' ->Place Action here

- lexicon key: **migx**
- action: **migx - index**
- parameters: `&configs=packagemanager||migxconfigs||setup`

### Setup for Revo 2.3 +

System->Top Menu, select 'Components', click 'Create Menu'

- lexicon key: **migx**
- action: **index**
- parameters: `&configs=packagemanager||migxconfigs||setup`
- namespace: **migx**

to make sure the configuration-table is created and up to date,
go to components -> migx -> setup-tab -> click 'setup'

## Upgrading from MIGX - versions prior 2.0

first, make a backup of your db-tables, specially the modx\_site\_tmplvar\_contentvalues - table, go to components -> migx -> setup-tab, go to tab upgrade. click 'upgrade'.
This will add a new autoincrementing field `MIGX_id` to all your MIGX-TV-items
The getImageList-snippet needs this field to work correctly.

## Configure your first MIGXdb - setup

The best way to learn how to setup MIGXdb is, to walk thrue all steps in a little tutorial from creating the db-schema and a table to its management by a MIGXdb-TV.

see [MIGXdb-Tutorials](extras/migxdb/migxdb.tutorials "MIGXdb.Tutorials")
