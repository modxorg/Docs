---
title: "MIGX"
_old_id: "674"
_old_uri: "revo/migx"
---

- [What is MIGX?](#MIGX-WhatisMIGX%3F)
- [Requirements](#MIGX-Requirements)
- [Download](#MIGX-Download)
- [Installation Instructions](#MIGX-InstallationInstructions)
  - [Step 1: Package Installation](#MIGX-Step1%3APackageInstallation)
  - [Step 2: Set up the MIGX Configurator Custom Manager Page (CMP) and Package Manager](#MIGX-Step2%3ASetuptheMIGXConfiguratorCustomManagerPage%28CMP%29andPackageManager)
- [Upgrading to MIGX 2.0](#MIGX-UpgradingtoMIGX2.0)
  - [Step 1: Backup your database](#MIGX-Step1%3ABackupyourdatabase)
  - [Step 2: Component Upgrade](#MIGX-Step2%3AComponentUpgrade)
- [Development and Bug Reporting](#MIGX-DevelopmentandBugReporting)
- [Usage](#MIGX-Usage)
  - [Step 1: Install MIGX](#MIGX-Step1%3AInstallMIGX)
  - [Step 2: Backend Usage](#MIGX-Step2%3ABackendUsage)
  - [Step 3: Data Entry](#MIGX-Step3%3ADataEntry)
  - [Step 4: Frontend Usage](#MIGX-Step4%3AFrontendUsage)



##  What is MIGX? 

 MIGX is a [custom](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-input-type "Adding a Custom TV Input Type") [Template Variable](making-sites-with-modx/customizing-content/template-variables "Template Variables") (TV) input type for aggregating multiple TVs into one TV. This aggregation greatly simplifies the workflow for end users of the manager to add complex data items to the manager. A data item can consist of any number of any other TVs, including text, images, files, checkboxes, etc.

 The package is highly customizable and allows the developer to define a custom input window for the MIGX TV. From this input window, items can be added, modified, and reordered.

 The package also ships with a snippet ( [getImageList](/extras/revo/migx/migx.frontend-usage "MIGX.Frontend-Usage")) that facilitates the easy retrieval of the complex data items from the custom MIGX TV input type.

 Please read below for install instructions for MIGX as they differ from typical MODX packages.

 MIGX stands for **M**ulti**I**tems**G**ridtv for MOD**X**.

##  Requirements 

- MODX Revolution 2.1 rc4 or later
- PHP5 or later  MIGX also works on Revolution 2.0.8 with limited functionality.

##  Download 

 MIGX can be downloaded from within the Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, available here: <http://modx.com/extras/package/migx>

##  Installation Instructions 

###  Step 1: Package Installation 

 Install the package via the the link above.

###  Step 2: Set up the MIGX Configurator Custom Manager Page (CMP) and Package Manager 

 Since Version 2.8 this steps (1-19) are not longer needed. 

 Note: It would be prudent to create a snapshot of your MODX database before setup as this process will change your database structure. 

1. Open the "System" menu from within the Revolution Manager
2. Click the "Actions" menu item
3. Find the MIGX category from the list of actions on left. Right click on it.
4. Click "Create Action Here"
5. Type "index" for controller
6. Ensure "migx" is selected for the namespace
7. Select "No Action" for the parent controller
8. Click "Save"
9. Refresh the page
10. Find the Components category from the list of top menu items on the right. Right click on it.
11. Click "Place Action Here" 
  1. Lexicon Key: migx
  2. Description: Configurator and Package Manager
  3. Action: migx - index (there are multiple pages sorted alphabetically. Make sure you go past all the core actions)
  4. Icon: (leave blank)
  5. Parameters: &configs=packagemanager||migxconfigs||setup
  6. Handler: (leave blank)
  7. Permissions: (leave blank)
12. Click "save"
13. Refresh the page
14. Open the "Components" menu
15. Click the new MIGX Action item you created.
16. Click the Setup / Upgrade tab
17. WARNING: Before this next step, you probably want to ensure that you've created a snapshot of your database.
18. Click the Setup button
19. Done!

##  Upgrading to MIGX 2.0 

 MIGX 2.0 requires a new field in the MIGX table within your database to work properly. This procedure will add a new auto\_increment field, MIGX\_id, that is required for the [getImageList](/extras/revo/migx/migx.frontend-usage "MIGX.Frontend-Usage") snippet to work correctly. It is important that you create a snapshot of your database before any database structure changes.

###  Step 1: Backup your database 

 Make a backup of your database tables, specifically the modx\_site\_tmplvar\_contentvalues table.

###  Step 2: Component Upgrade 

1. Open the "Components" menu from within the Revolution Manager
2. Click the MIGX Action Item
3. Click the Setup / Upgrade tab
4. WARNING: Before this next step, you probably want to ensure that you've created a snapshot of your database.
5. Click the Upgrade button
6. Done!

##  Development and Bug Reporting 

 MIGX is stored and developed by Bruno17 using GitHub: <https://github.com/Bruno17/migx>

##  Usage 

###  Step 1: Install MIGX 

 Follow the instructions in this document.

###  Step 2: Backend Usage 

 Create a new TV and apply it to a template

 [View Instructions](/extras/revo/migx/migx.backend-usage "MIGX.Backend-Usage")

###  Step 3: Data Entry 

 Fill in content into your new TV.

 [View Instructions](/extras/revo/migx/migx.data-entry "MIGX.Data-Entry")

###  Step 4: Frontend Usage 

 Use the getImageList snippet to display content from your new TV.

 [View Instructions](/extras/revo/migx/migx.frontend-usage "MIGX.Frontend-Usage")