---
title: "MIGX"
translation: "extras/migx"
---

## What is MIGX?

MIGX is a [custom](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-input-type "Adding a Custom TV Input Type") [Template Variable](making-sites-with-modx/customizing-content/template-variables "Template Variables") (TV) input type for aggregating multiple TVs into one TV. This aggregation greatly simplifies the workflow for end users of the manager to add complex data items to the manager. A data item can consist of any number of any other TVs, including text, images, files, checkboxes, etc.

The package is highly customizable and allows the developer to define a custom input window for the MIGX TV. From this input window, items can be added, modified, and reordered.

The package also ships with a snippet ( [getImageList](extras/migx/migx.frontend-usage "MIGX.Frontend-Usage")) that facilitates the easy retrieval of the complex data items from the custom MIGX TV input type.

Please read below for install instructions for MIGX as they differ from typical MODX packages.

MIGX stands for **M**ulti**I**tems**G**ridtv for MOD**X**.

## Requirements

-   MODX Revolution 2.1 rc4 or later
-   PHP5 or later MIGX also works on Revolution 2.0.8 with limited functionality.

## Download

MIGX can be downloaded from within the Revolution manager via [Package Management]("Package Management"), or from the MODX Extras Repository, available here: <https://modx.com/extras/package/migx>

## Installation Instructions

### Step 1: Package Installation

Install the package via the the link above.

### Step 2: Set up the MIGX Configurator Custom Manager Page (CMP) and Package Manager

Since Version 2.8 this steps (1-19) are not longer needed.

Note: It would be prudent to create a snapshot of your MODX database before setup as this process will change your database structure.

-   Open the "System" menu from within the Revolution Manager
-   Click the "Actions" menu item
-   Find the MIGX category from the list of actions on left. Right click on it.
-   Click "Create Action Here"
-   Type "index" for controller
-   Ensure "migx" is selected for the namespace
-   Select "No Action" for the parent controller
-   Click "Save"
-   Refresh the page
-   Find the Components category from the list of top menu items on the right. Right click on it.
-   Click "Place Action Here"
    -   Lexicon Key: migx
    -   Description: Configurator and Package Manager
    -   Action: migx - index (there are multiple pages sorted alphabetically. Make sure you go past all the core actions)
    -   Icon: (leave blank)
    -   Parameters: &configs=packagemanager||migxconfigs||setup
    -   Handler: (leave blank)
    -   Permissions: (leave blank)
-   Click "save"
-   Refresh the page
-   Open the "Components" menu
-   Click the new MIGX Action item you created.
-   Click the Setup / Upgrade tab
-   WARNING: Before this next step, you probably want to ensure that you've created a snapshot of your database.
-   Click the Setup button
-   Done!

## Upgrading to MIGX 2.0

MIGX 2.0 requires a new field in the MIGX table within your database to work properly. This procedure will add a new auto_increment field, MIGX_id, that is required for the [getImageList](extras/migx/migx.frontend-usage "MIGX.Frontend-Usage") snippet to work correctly. It is important that you create a snapshot of your database before any database structure changes.

### Step 1: Backup your database

Make a backup of your database tables, specifically the modx_site_tmplvar_contentvalues table.

### Step 2: Component Upgrade

1. Open the "Components" menu from within the Revolution Manager
2. Click the MIGX Action Item
3. Click the Setup / Upgrade tab
4. WARNING: Before this next step, you probably want to ensure that you've created a snapshot of your database.
5. Click the Upgrade button
6. Done!

## Development and Bug Reporting

MIGX is stored and developed by Bruno17 using GitHub: <https://github.com/Bruno17/migx>

## Usage

### Step 1: Install MIGX

Follow the instructions in this document.

### Step 2: Backend Usage

Create a new TV and apply it to a template

[View Instructions](extras/migx/migx.backend-usage "MIGX.Backend-Usage")

### Step 3: Data Entry

Fill in content into your new TV.

[View Instructions](extras/migx/migx.data-entry "MIGX.Data-Entry")

### Step 4: Frontend Usage

Use the getImageList snippet to display content from your new TV.

[View Instructions](extras/migx/migx.frontend-usage "MIGX.Frontend-Usage")
