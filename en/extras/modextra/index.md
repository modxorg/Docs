---
title: "modExtra"
_old_id: "680"
_old_uri: "revo/modextra"
---

## What is modExtra?

modExtra is a base Extra template that is useful when wanting to create a new Extra for MODX Revolution. One can git archive from this repository to start with all the file structure for beginning MODx Extra development pre-setup.

## Usage

modExtra is meant to be 'exported' from Git, not used directly, so that you can use it as a base point for your new Extras.

### Exporting from Git

First, clone this repository somewhere on your development machine:

``` php
git clone http://github.com/splittingred/modExtra.git ./
```

In practice, the actual command usually takes a specific folder as an argument, e.g.

``` php
git clone http://github.com/splittingred/modExtra.git /path/to/my/downloads/modExtra
```

Note that the git clone command expects to _create_ the target directory, so the path you specify should indicate a folder that doesn't yet exist.

Next, create the target directory where you want to house your new repo. It's important that you house your repo outside of the MODx document root: this helps avoid confusion between GIT repositories. One plausible location in in the folder _above_ your document root.

Then, navigate to the directory modExtra is now in, and do this:

``` php
git archive HEAD | (cd /path/where/I/want/my/new/repo/ && tar -xvf -)
```

Windows users can just do git archive HEAD and extract the tar file to wherever they want.

Then you can git init or whatever in that directory, and your files will be located there!

### Configuration

Now, you'll want to change references to modExtra in the files in your new copied-from-modExtra repo to whatever name of your new Extra will be. An immensely useful command to locate instances of a string is **grep**, e.g. cd into your newly created repo and run this (\*nix and Mac systems only):

``` php
grep -rl 'modExtra' .
```

OR, since you'll be replacing instances of this string, it's hugely helpful to have a text editor that allows you to do a find-and-replace across multiple files. Choose as your extra name a single word with no special characters.

For the record, instances of **modExtra** appear in the following files:

- ./\_build/build.config.sample.php
- ./\_build/build.schema.php
- ./\_build/build.transport.php
- ./\_build/data/transport.menu.php
- ./\_build/data/transport.settings.php
- ./\_build/data/transport.snippets.php
- ./\_build/properties/properties.modextra.php
- ./\_build/resolvers/resolve.paths.php
- ./\_build/resolvers/resolve.tables.php
- ./assets/components/modextra/connector.php
- ./assets/components/modextra/js/mgr/modextra.js
- ./assets/components/modextra/js/mgr/sections/home.js
- ./assets/components/modextra/js/mgr/widgets/home.panel.js
- ./assets/components/modextra/js/mgr/widgets/items.grid.js
- ./core/components/modextra/controllers/index.php
- ./core/components/modextra/controllers/mgr/header.php
- ./core/components/modextra/controllers/mgr/home.php
- ./core/components/modextra/docs/changelog.txt
- ./core/components/modextra/docs/readme.txt
- ./core/components/modextra/elements/snippets/snippet.modextra.php
- ./core/components/modextra/index.php
- ./core/components/modextra/lexicon/en/default.inc.php
- ./core/components/modextra/lexicon/en/properties.inc.php
- ./core/components/modextra/model/modextra/modextra.class.php
- ./core/components/modextra/model/modextra/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.map.inc.php
- ./core/components/modextra/model/modextra/request/modextracontrollerrequest.class.php
- ./core/components/modextra/model/schema/modextra.mysql.schema.xml
- ./core/components/modextra/processors/mgr/item/create.php
- ./core/components/modextra/processors/mgr/item/get.php
- ./core/components/modextra/processors/mgr/item/getlist.php
- ./core/components/modextra/processors/mgr/item/remove.php
- ./core/components/modextra/processors/mgr/item/update.php

Finally, you'll want to update several filenames that use the name "modextra" in them. Our friendly \*nix/Mac bash command for this would be executed in the repo directory:

``` php
find . -name *modextra*
```

And for the record, these are the files whose names you should change to reflect the name of your new upcoming component:

- ./\_build/properties/properties.modextra.php
- ./assets/components/modextra
- ./assets/components/modextra/js/mgr/modextra.js
- ./core/components/modextra
- ./core/components/modextra/elements/snippets/snippet.modextra.php
- ./core/components/modextra/model/modextra
- ./core/components/modextra/model/modextra/modextra.class.php
- ./core/components/modextra/model/modextra/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.map.inc.php
- ./core/components/modextra/model/modextra/request/modextracontrollerrequest.class.php
- ./core/components/modextra/model/schema/modextra.mysql.schema.xml

Once you've done all of that, you can create some [System Settings](building-sites/settings "System Settings") back in your MODX Revo site:

- 'mynamespace.core\_path' - Point to /path/to/my/extra/core/components/extra/
- 'mynamespace.assets\_url' - /path/to/my/extra/assets/components/extra/

Then clear the cache. This will tell the Extra to look for the files located in these directories, allowing you to develop outside of the MODx webroot!

If you made a mistake in any of that, you can trash the whole repo there and export the git head again.

## See Also

### Copyright Information

modExtra is distributed as GPL (as MODX Revolution is), but the copyright owner (Shaun McCormick) grants all users of modExtra the ability to modify, distribute, dual license and use modExtra in derivative works (not copies of modExtra) as they see fit, as long as attribution is given somewhere in the distributed source of all derivative works.
