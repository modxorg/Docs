---
title: "Git basics and the first commit of a component on Github"
translation: "extending-modx/creating-components"
---

This lesson: upload the scaffold to the server, rename it to Sendex, and push the first commit to GitHub. PhpStorm must be configured for Git first.

## Server synchronization

Once the local project is connected to the server, the PhpStorm context menu gains new items:

![](/ru/extending-modx/creating-components/git-basics/git-basics-1.png)

* Upload files to server
* Download files from server
* Sync remote and local files

Upload and download can **overwrite existing files** — use them carefully. Synchronization is safer: it shows the differences and lets you pick actions per file. Its drawback is confirming every deleted file, which takes time; PhpStorm lets you sync a single directory or file instead of the whole project.

First upload has nothing to overwrite — click **Upload to MODXCloud**, then check the files in the admin panel:

![](/ru/extending-modx/creating-components/git-basics/git-basics-2.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-3.png)

## Rename the scaffold

Rename the modExtra stub to Sendex with the `rename_it.php` script:

``` php
http://c2263.paas2.ams.modxcloud.com/Sendex/rename_it.php
```

Called without parameters, it asks for a new name:

``` php
You need to specify a new name for the component as first argument, or send it via $_GET["name"].
```

Pass the name in the URL:

``` php
http://c2263.paas2.ams.modxcloud.com/Sendex/rename_it.php?name=Sendex
```

The script prints the renamed files and directories — the scaffold is now a real component.

It can already be built and installed, but that would create demo tables in the database; we will build after writing our own schema and generating the model.

The admin panel shows the new files, but the local project still has the old names — synchronize. Nothing changed locally, so click **Download from MODXCloud**; the IDE will warn about overwriting.

![](/ru/extending-modx/creating-components/git-basics/git-basics-4.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-5.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-6.png)

Delete the leftovers:

* `/core/components/modextra/`
* `/assets/components/modextra/`
* `rename_it.php`
* `rename_it.sh`

If **Automatic upload** is enabled in the Deployment settings, all changes sync immediately:

![](/ru/extending-modx/creating-components/git-basics/git-basics-7.png)

Automatic synchronization works in one direction: local → server. Edits made through the admin panel must be synchronized manually.

The project is ready for the first commit on GitHub.

## Work with GitHub

This section is optional: you can keep the project on your computer without any repository. A public repository, however, gives history, review from users, and a free backup.

[Register on GitHub](https://github.com/join) and [download their app](http://windows.github.com/). The app is optional, but it installs console git, which we need.

Back in PhpStorm, open the settings, search for `git`:

![](/ru/extending-modx/creating-components/git-basics/git-basics-8.png)

Check the GitHub credentials and the path to the git executable.

If `Sendex/.git` still exists (from modExtra), delete it — we need a new local repository.

**VCS → Enable version control**, select git, save:

![](/ru/extending-modx/creating-components/git-basics/git-basics-9.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-10.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-11.png)

Files turn brown — they are not in the repository yet. Add them via the context menu (**Git** item); they turn green:

![](/ru/extending-modx/creating-components/git-basics/git-basics-12.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-13.png)

Git is a version control system: it stores file changes and can roll them back. Its advantage over alternatives is easy branching — work in a branch, then merge it into the main project, resolving conflicts. New to git? [This tutorial](http://githowto.com/ru/git_how_to) covers the command line; the course does the same in PhpStorm.

Git stores everything in a single `.git` directory — `Sendex/.git` *is* the repository. That is why the old modExtra `.git` had to go.

The new repository is **local**: no commits yet, not attached to GitHub, but fully working — copy the project to a flash drive and the history goes with it.

To keep files out of version control, use `.gitignore` in the repository root:

```
.idea
```

This disables tracking of the PhpStorm service directory.

So why GitHub? To link all your machines and copies of the project in one place. GitHub is a hosting for such central repositories, and [MODX lives there too](https://github.com/modxcms/revolution/).

**README.md** at the project root is the short description — edit it, then make the first commit: a save point you can roll back to.

Open the **Changes** tab at the bottom of the IDE and select **Commit changes** in the context menu. The IDE lists all changed files (currently the whole project) and asks for a commit message:

![](/ru/extending-modx/creating-components/git-basics/git-basics-14.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-15.png)

The first commit has no changes yet — write “First commit” and click commit; ignore the code warnings. The **Version control** tab shows the git log.

The changes are saved in the local repository. From now on, a modified file turns blue — its changes are not committed yet:

![](/ru/extending-modx/creating-components/git-basics/git-basics-17.png)

Last step: link the local repository to GitHub. Create a new project there — GitHub shows the exact commands:

![](/ru/extending-modx/creating-components/git-basics/git-basics-18.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-19.png)

To push an existing repository, run in the console:

``` bash
git remote add origin https://github.com/bezumkin/Sendex.git
git push -u origin master
```

The second command can be run from PhpStorm — select the **master** branch to push:

![](/ru/extending-modx/creating-components/git-basics/git-basics-20.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-21.png)

[Our project is on GitHub](https://github.com/bezumkin/Sendex). You can now fork it and send commits back. The GitHub desktop client can also host the local repository and push to the remote:

![](/ru/extending-modx/creating-components/git-basics/git-basics-22.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-23.png)

![](/ru/extending-modx/creating-components/git-basics/git-basics-24.png)

## Conclusion

The project is on the server, renamed, synchronized and under version control — with its first commit on GitHub.

Next lesson: design the component logic, write the schema and generate the database model.
