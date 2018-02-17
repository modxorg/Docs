---
title: "Using MODx Revolution from SVN"
_old_id: "332"
_old_uri: "2.x/getting-started/installation/using-modx-revolution-from-svn"
---

Note: The MODx repository has moved to GitHub as of MODx 2.1, so the information on this page is no longer correct. See the following links for more information: - [Git Installation](getting-started/installation/git-installation "Git Installation")
- [Using Git with MODx](http://rtfm.modx.com/display/community/Using+GitHub)
- [MODx Revolution repository at GitHub](https://github.com/modxcms/revolution)
- [MODx Evolution repository at GitHub](https://github.com/modxcms/evolution)



- [Installation Process](#UsingMODxRevolutionfromSVN-InstallationProcess)
  - [SVN Locations](#UsingMODxRevolutionfromSVN-SVNLocations)
  - [Run the Build](#UsingMODxRevolutionfromSVN-RuntheBuild)
  - [Run Setup](#UsingMODxRevolutionfromSVN-RunSetup)
- [Upgrading After Commits](#UsingMODxRevolutionfromSVN-UpgradingAfterCommits)
- [Using MAMP on Mac OS X](#UsingMODxRevolutionfromSVN-UsingMAMPonMacOSX)



## Installation Process

Here are some notes on participating in MODx Revolution testing and/or development. Unlike previous versions of MODx, Revolution will not install directly from SVN. Because of the nature of the new packaging and installation system, you must first create the core installation package using a PHP build script before running the setup.

### SVN Locations

Checkout or export the latest Revolution code from SVN at the URL:

- <http://svn.modxcms.com/svn/tattoo/tattoo/branches/2.0/> - Latest 2.0 dev
- <http://svn.modxcms.com/svn/tattoo/tattoo/branches/2.0-ui/> - For default mgr UI/design work

### Run the Build

If this is the first time you are building from SVN, copy the file build.config.sample.php to build.config.php and edit the properties to point at a valid database with proper credentials. NOTE that this database does not have to contain anything; the build script just needs to be able to make a connection to a MySQL database.

From the command line, change your working directory to \_build/ and execute the command "php transport.core.php". If the PHP executable is not in your path, you will need to either edit the path or give the full path to the PHP executable in the command line. The build process may take an extended period of time (10 to 30 seconds likely), so be patient. (Note: on Mac Mini (1.66Ghz Intel Core Duo with 2GB RAM) running the Leopard development environment as outlined below, this only takes 5-10 seconds.)

Note that you can also do this from the browser by browsing to the \_build/transport.core.php directory, if that directory is accessible in your web server setup.

Once that script is finished executing, confirm that you now have a file named core/packages/core.transport.zip and a directory core/packages/core/ containing a manifest.php and many other files/directories.

### Run Setup

Now you are ready to execute the new setup script at the setup/ URL (e.g. <http://localhost/modxrevo/setup/> if installed in a subdirectory of the web root named modxrevo/).

Make sure you check both the "Core package has been manually unpacked" and "Files are already in-place" options when installing from SVN.

If you change any paths on the Context Paths setup step, make sure and move the corresponding directories as appropriate; this is intended for installs from the core package with files not already in-place, where the installer will place the files in the specified locations (assuming the locations allow the PHP process to write to them).

The actual install process requires more than the default 8M of memory allocated to PHP in many default php.ini files; if you get a blank page when you click "install", try increasing the memory\_limit configuration to 32M or more (16M may work, but why not give php a little space, eh?).

Only the absolute required minimal data is included; there are no documents or add-ons installed by default, etc. as of this time.

Give it a try at your earliest convenience and record any issues or problems you encounter. There is a lot of work going on still, and plenty left to go, so expect the unexpected as we work through changes, fixes and refactorings.

See [Development Environments](/community/contribute/becoming-a-contributor/development-environments "Development Environments") for recommended tools and setups for contributing directly to MODx core code.

## Upgrading After Commits

When a commit is made to an SVN branch, one of two messages might show up in the commit.

- \[REBUILD/UPGRADE REQUIRED\] - If your updates require a core transport rebuild (such as anything modified in the \_build directory, database model changes, or default data changes), then prefix your commit message with this. If you see this message, simply rebuild the core transport and run setup/ again.

If neither of these messages show up, you simply need to svn update, and you're done.

## Using MAMP on Mac OS X

If you use MAMP on Mac OS X, you may get problems (errors about DYLD libraries not being included) when trying to execute ''transport.core.php'' from the terminal. This is because the MAMP PHP libraries won't be on the dynamic linker path by default.

To adjust the dynamic linker library path to include the MAMP PHP libraries, run the following command via the terminal:

```
<pre class="brush: php">
export DYLD_LIBRARY_PATH=/Applications/MAMP/Library/lib:$
{DYLD_LIBRARY_PATH}

```You can then execute ''transport.core.php'' by using the absolute path to the MAMP PHP executable:

```
<pre class="brush: php">
/Applications/MAMP/bin/php5/bin/php transport.core.php

```