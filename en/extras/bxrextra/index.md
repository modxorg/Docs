---
title: "BxrExtra"
_old_id: "612"
_old_uri: "revo/bxrextra"
---

BxrExtra is base template for creating a new Extra for MODx Revolution. It's based on [modExtra](https://github.com/splittingred/modExtra) from [Shaun McCormick](https://github.com/splittingred).

## Setup

**Directions** how to create component with name **YourComponent** using BxrExtra.

Create directory 'yourcomponent'. Clone BxrExtra to yourcomponent directory by running 'git clone git://github.com/TheBoxer/BxrExtra.git .' **from yourcomponent folder**.

You can delete '.git' folder now.

Edit 'config.core.php' file and point 'MODX\_CORE\_PATH' constant **to your** MODx core location.

Now you want to **rename BxrExtra to YourComponent**, co first of all edit 'rename\_it.sh' and set 'repl1' to 'YourComponent', 'repl2' to 'yourcomponent' and 'path' to './yourcomponent'.

Run 'rename\_it.sh'.

Edit 'yourcomponent/core/components/yourcomponent/templates/home.tpl' and change id of div from 'bxrextra-panel-home-div' to 'yourcomponent-panel-home-div'.

After this changes **add two settings** in your System Settings (in manager):

- 'yourcomponent.core\_path' - Point to /yourcomponent/core/components/yourcomponent/
- 'yourcomponent.assets\_url' - /yourcomponent/assets/components/yourcomponent/

Assets url must be **visible** from web.

Next step is creating **namespace** with name 'YourComponent', 
**core path** 'Point to /yourcomponent/core/components/yourcomponent/' and 
**assets path** 'Point to /yourcomponent/assets/components/yourcomponent/'.

After you created namespace, **add new action** under YourComponent namespace with **index controller** and without parent controller.

**Place just created action** under Component menu (or where ever you want) with lexicon key 'yourcomponent' and description 'yourcomponent.menu\_desc'. 
Then clear the cache and refresh manager page.

If you want to **create default database table** provided in BxrExtra add new snippet in your manager, call it createDBTable and set it as **static**. Set media sources for Static files to '(None)' and Static file to '\[\[++yourcomponent.core\_path\]\]/elements/snippets/snippet.yourcomponentCreateDB.php'. Use 'createDBTable' snippet in any of your resources and run it. You shoud get **'Table created.'** message.

Now you should have fully working extra with functions described below.

## Functionality

- Integrates a custom table of "Items"
- A snippet listing Items sorted by name and templated with a chunk
- A custom manager page to manage Items on
- Class based processors
- Grid with inline editing, right menu function and new item / update item / delete item window and search box
- Drag and drop sort in grid

If you do not require all of this functionality, simply remove it and change the appropriate code.

### Removing Drag&Drop

- delete assets/components/yourcomponent/js/mgr/extra/griddraganddrop.js
- in core/components/yourcomponent/controllers/home.class.php 
  - remove $this->addJavascript($this->yourcomponent->config\['jsUrl'\].'mgr/extra/griddraganddrop.js');
- in assets/components/yourcomponent/js/mgr/widgets/items.grid.js 
  - remove ddGroup config parameter
  - remove enableDragDrop config parameter, or set to false
  - remove render and beforeDestroy listeners
  - remove getDragDropText function

#### Removing position from database (position is used for sort)

- in core/components/yourcomponent/model/schema/yourcomponent.mysql.schema.xml 
  - remove field with "position" key
- remove all php files in core/component/yourcomponent/model/yourcomponent/mysql folder
- in \_build 
  - rename build.config.sample.php to build.config.php
  - edit build.config.php and set MODX\_BASE\_PATH to path to your modx location
- run \_build/build.schema.php 
  - it should make new files in core/component/yourcomponent/model/yourcomponent/mysql folder
- remove yourcomponent\_items table from database
- run snippet that create database table (described in Setup)

## Others

Fell free to open pull requests or add [issues](https://github.com/TheBoxer/BxrExtra/issues).