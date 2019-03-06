---
title: "Git Installation"
_old_id: "154"
_old_uri: "2.x/getting-started/installation/git-installation"
---

- [Installation Process](#GitInstallation-InstallationProcess)
  - [Git Location](#GitInstallation-GitLocation)
      - [Major-Version Branch](#GitInstallation-MajorVersionBranch)
      - [Minor-Version Branch](#GitInstallation-MinorVersionBranch)
  - [Run the Build](#GitInstallation-RuntheBuild)
  - [Run Setup](#GitInstallation-RunSetup)
- [Upgrading Your Local Git Repository After Commits](#GitInstallation-UpgradingYourLocalGitRepositoryAfterCommits)
  - [Contributing By Sending Pull Requests](#GitInstallation-ContributingBySendingPullRequests)
  - [Switching Branches](#GitInstallation-SwitchingBranches)
- [Additional Information](#GitInstallation-AdditionalInformation)
  - [Using MAMP on Mac OS X](#GitInstallation-UsingMAMPonMacOSX)



## Installation Process

 Here are some notes on participating in MODX Revolution testing and/or development. Unlike previous versions of MODX, Revolution will not install directly from Git. Because of the nature of the new packaging and installation system, you must first create the core installation package using a PHP build script before running the setup.

### Git Location

 Git clone the revolution repository on GitHub at: <http://github.com/modxcms/revolution/> using this syntax:

 ``` php 
git clone <a href="http://github.com/modxcms/revolution.git"> <a href="http://github.com/modxcms/revolution.git"> http://github.com/modxcms/revolution.git
</a>
</a>

```

 Or, if you'd like to contribute back, [fork it in your GitHub repository](http://help.github.com/forking/) and clone that repository as "origin" and add the modxcms/revolution repository as a remote called "upstream":

 ``` php 
git clone git@github.com:yourgitusernamehere/revolution.git
cd revolution
git remote add upstream -f <a href="http://github.com/modxcms/revolution.git"> <a href="http://github.com/modxcms/revolution.git"> http://github.com/modxcms/revolution.git
</a>
</a>

```

 Forking it with your GitHub account will allow you to contribute back to MODX by sending pull requests by clicking the "Pull Request" button on your GitHub page. (You'll need to [submit a CLA](http://develop.modx.com/contribute/cla/) before we can accept your code, though.) If you decide to fork, it'd be helpful for you to read our [Git Contributors Guide](/display/community/MODX+GitHub+Contributor%27s+Guide "MODX GitHub Contributor's Guide") for detailed information on keeping your fork up-to-date.

 If you're not familiar with Git, please read the excellent tutorial from [GitHub](http://learn.github.com/) and view the [GitHub help pages](http://help.github.com).

 From there, make sure you are working on the **2.x** branch, if you're wanting the latest bugfixes and features targeted for the next release. There are two significant branches in the modxcms/revolution GitHub repository related to the version 2 releases of MODX Revolution:

#### Major-Version Branch

- **2.x** - The latest development branch for MODX Revolution version 2; all new features and bugfixes targeted for the next minor release will exist here.

#### Minor-Version Branch

- **2.5.x** - A minor version branch for current stable minor releases; contains only bug fixes targeted for the next patch release.

 To create a local tracking branch from one in the origin remote; after cloning, just type:

 ``` php 
git checkout -b 2.x origin/2.x

```

 And git will handle the rest.

 There may be other temporary branches in the repository from time to time, representing features in collaborative development, specific releases being prepared, and/or critical bug patches for supported releases. 

### Run the Build

 If this is the first time you are building from Git, copy the file **\_build/build.config.sample.php** to **\_build/build.config.php** and edit the properties to point at a valid database with proper credentials (since Revolution 2.1.x, you either need to copy & edit the same way **\_build/build.properties.sample.php** to **\_build/build.properties.php**). NOTE that this database does not have to contain anything; the build script just needs to be able to make a connection to a MySQL database.

 From the command line, change your working directory to **\_build/** and execute the command "**php transport.core.php**". If the PHP executable is not in your path, you will need to either edit the path or give the full path to the PHP executable in the command line. The build process may take an extended period of time (10 to 30 seconds likely), so be patient. (Note: on Mac Mini (1.66Ghz Intel Core Duo with 2GB RAM) running the Leopard development environment as outlined below, this only takes 5-10 seconds.)

 Note that you can also do this from the browser by browsing to the **\_build/transport.core.php** directory, if that directory is accessible in your web server setup. 

 Once that script is finished executing, confirm that you now have a file named core/packages/core.transport.zip and a directory core/packages/core/ containing a manifest.php and many other files/directories.

### Run Setup

 Now you are ready to execute the new setup script at the setup/ URL (e.g. <http://localhost/modxrevo/setup/> if installed in a subdirectory of the web root named modxrevo/).

 Make sure you check both the "Core package has been manually unpacked" and "Files are already in-place" options when installing from Git. 

 If you change any paths on the Context Paths setup step, make sure and move the corresponding directories as appropriate; this is intended for installs from the core package with files not already in-place, where the installer will place the files in the specified locations (assuming the locations allow the PHP process to write to them).

 The actual install process requires more than the default 8M of memory allocated to PHP in many default php.ini files; if you get a blank page when you click "install", try increasing the memory\_limit configuration to 32M or more (16M may work, but why not give php a little space, eh?). 

## Upgrading Your Local Git Repository After Commits

 Simply run these two commands:

 ``` php 
git fetch origin
git rebase origin/2.x

```

 And Git will update your install. (Substitute '2.5.x' for '2.x' if you're testing/contributing to a specific minor-version branch, or whatever branch you might be working from.)

 If you're working from a fork, rather than straight from the modxcms/revolution repository, you'll have to fetch from upstream, rather than origin (since origin is your fork). Please read the \[MODX GitHub Contributor's Guide\] for more information. 

 When a commit is made, this message might show up in the commit:

- **\[ReUp\]** - If your updates require a core transport rebuild (such as anything modified in the \_build directory, database model changes, or default data changes), then prefix your commit message with this. If you see this message, simply rebuild the core transport and run setup/ again.

 If this message does not show up, you're done after you fetch and rebase.

### Contributing By Sending Pull Requests

 If you've fixed a bug or added an improvement, and you're working on a fork of the revolution repository, you can send a pull request to MODX and one of the Integration Managers will review your patch.

 You'll need to [submit a CLA](http://develop.modx.com/contribute/cla/) before we can accept your code. 

 MODX recommends you to work on features or bugs in their own separate branches. This way, if MODX doesn't accept your pull request exactly as-is, but still updates those files, you wont have to 'git checkout' the develop (or whatever) branch over again. You can just trash the bugfix/feature branch and reload from your clean develop branch.

 For example, lets say you want to add a feature for workflow for MODX. You'd create a local branch from the '2.x' branch called 'myworkflow' with:

 ``` php 
git checkout -b myworkflow 2.x

```

 ...and then do your coding there. Once you're done, you'd push that branch to your fork, and then send the Pull Request over. Once MODX has integrated your code (or rejected it and you're finished with it), you can then delete the branch like so:

 ``` php 
git checkout 2.x
git branch -d myworkflow

```

 The first step takes us back to the develop branch, and then deletes the custom branch. This allows you to easily update MODX without having to worry about invalid or no-longer used commits, and keeps your main branch clean.

 You can always "git merge --ff-only origin/2.x" new commits incoming from 2.x (or 2.5.x, etc) into your branch after running "git fetch origin" while having your branch checked out. 

 For more information on using GitHub forks, see the [GitHub Forking Help Page](http://help.github.com/forking/).

### Switching Branches

 If you want to switch to a different branch (that you have already checked out locally), simply type these commands:

 ``` php 
git fetch upstream
git checkout 2.5.x upstream/2.5.x

```

 Of course, replacing 2.5.x with the actual name of the branch you want to switch to. After you've done so, run the build and run setup/ again, since different branches might have different databases.

 Switching _backwards_ is not always recommended; ie, switching from 2.x (the latest features in development for next minor release) to 2.5.x (the latest patches for next patch release), since database changes cannot be executed in reverse. While no major issues should occur, be careful when doing this or keep your work in separate databases for each branch you work on. 

## Additional Information

### Using MAMP on Mac OS X

 If you use MAMP on Mac OS X, you may get problems (errors about DYLD libraries not being included) when trying to execute ''transport.core.php'' from the terminal. This is because the MAMP PHP libraries won't be on the dynamic linker path by default.

 To adjust the dynamic linker library path to include the MAMP PHP libraries, run the following command via the terminal:

 ``` php 
export DYLD_LIBRARY_PATH=/Applications/MAMP/Library/lib:$\{DYLD_LIBRARY_PATH\}

```

 You can then execute ''transport.core.php'' by using the absolute path to the MAMP PHP executable:

 ``` php 
/Applications/MAMP/bin/php5/bin/php transport.core.php

```

### Git Install for 3.x Development

This assumes you have a local web server, pointed at the directory herein referred to as "your\_directory".

1. Locally cd into the directory, from which you want to deploy modx into a subfolder: `cd /path/to/parent/directory`
2. Run: `composer create-project modx/revolution your_directory 3.x-dev`
3. Change directory and checkout the 3.x branch: `cd your_directory && git checkout 3.x`
4. Checkout a feature branch: `git checkout -b 3.x-myfeaturebranch`

Optionally fork [MODX Revolution on Github](https://github.com/modxcms/revolution/) to your own Github account, at which point you'll want to do the following:

1. `git remote add upstream https://github.com/modxcms/revolution.git` (different URL if you're using SSH)
2. `git remote set-url origin {your github repo url}`
3. You may also need: ` git remote set-url --push origin {your github repo url}`

Build the core:

1. `cp build.config.sample.php build.config.php && cp build.properties.sample.php build.properties.php`
2. Edit those two files, adding your paths and database credentials
3. Then run: `php transport.core.php`
4. Run the installer in a browser.