---
title: "Git Installation"
sortorder: "4"
_old_id: "154"
_old_uri: "2.x/getting-started/installation/git-installation"
---

Installing MODX from git is a great way to have the very latest version, and is also required if you're planning to contribute to the development of MODX. It does require a few more steps than a standard installation.

## Installation process

You'll need to:

- get the files from GitHub
- install composer dependencies 
- build the core package
- run the standard setup

Each step is discussed below in detail.

### Get the files from GitHub

Git clone the [revolution repository on GitHub](http://github.com/modxcms/revolution) using this syntax:

``` bash
git clone http://github.com/modxcms/revolution.git -b 3.x www
```

Note that it's preselecting the 3.x branch and installs into the `www` directory, you may tweak that to match your desired setup.

Or, if you'd like to contribute back: [fork modxcms/revolution to your own GitHub account](http://help.github.com/forking/), clone that repository as "origin" and add the modxcms/revolution repository as a remote called "upstream":

``` bash
git clone git@github.com:yourgitusernamehere/revolution.git
cd revolution
git remote add upstream -f http://github.com/modxcms/revolution.git -b 3.x www
```

You can switch to a different branch using `git checkout <name-of-branch>` or `git checkout -b 3.x upstream/3.x`

### Install dependencies with Composer

MODX uses Composer to manage internal dependencies that are necessary to run 3.x.

If you do not yet have Composer installed on your system [find the installation instructions here](https://getcomposer.org/download/). The command below assumes you've installed Composer globally, for example by running `mv composer.phar /usr/local/bin/composer` after the installation instructions linked above. 

Run `composer install` in the root of the `www` directory.

``` bash
$ composer install
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Package operations: 40 installs, 0 updates, 0 removals
  - Installing xpdo/xpdo (3.2.0): Extracting archive
  - Installing league/flysystem (2.5.0): Extracting archive
  - Installing phpmailer/phpmailer (v6.9.1): Extracting archive
  - Installing smarty/smarty (v4.5.0): Extracting archive
  - Installing guzzlehttp/guzzle (7.8.1): Extracting archive
  ...
Generating optimized autoload files
```

Exact package versions change over time; a successful run ends with Composer generating the autoloader under `core/vendor/`.

It may be necessary from time to time to run `composer update` so dependencies stay current with the branch you are on.

### Run the build

After the dependencies are installed, `cd` to the `_build` folder and copy config files there.

``` bash
cd www/_build
cp build.config.sample.php build.config.php
cp build.properties.sample.php build.properties.php
```

Typically, no changes to these files are necessary, but you can change the database connection settings if needed.

Next, run `php transport.core.php`  within the `_build` folder:

``` bash
$ php transport.core.php
[2018-03-22 07:38:12] (INFO @ transport.core.php) Beginning build script processes...
[2018-03-22 07:38:12] (INFO @ transport.core.php) Removed pre-existing core/ and core.transport.zip.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Core transport package created.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Core Namespace packaged.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Default workspace packaged.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged modx.com transport provider.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 2 modMenus.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged all default modContentTypes.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged all default modClassMap objects.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 189 default events.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 225 default system settings.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 2 default context settings.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 1 default user groups.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 1 default dashboards.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 1 default media sources.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 5 default dashboard widgets.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 2 default roles Member and SuperUser.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in 6 default Access Policy Template Groups.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in 7 default Access Policy Templates.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in 12 default Access Policies.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in web context.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in mgr context.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in connectors.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Beginning to zip up transport package...
[2018-03-22 07:38:14] (INFO @ transport.core.php) Transport zip created. Build script finished.

Execution time: 1.8067 s
```

You can also run this from the project root as `php _build/transport.core.php` if you're previously created the configuration files.

### Run Setup

Now you are ready to execute the standard setup through the browser, e.g. `http://localhost/setup/`.

Make sure you check both the "Core package has been manually unpacked" and "Files are already in-place" options when installing from Git. Typically, these are pre-selected for you.

Continue with the setup and then you're all set!

## Upgrading Your Local Git Repository After Commits

Run the following to update your local git repository after commits.

``` bash
git fetch upstream
git rebase upstream/3.x
```

If you cloned directly from `modxcms/revolution`, use `origin`:

``` bash
git fetch origin
git rebase origin/3.x
```

You can replace `3.x` with any other branch.

It may be necessary to run the build step and setup again after loading changes. 

## Contributing By Sending Pull Requests

If you've fixed a bug or added an improvement, and you're working on a fork of the revolution repository, you can send a pull request to MODX which will be reviewed by the core integrators. 

[See the Contribute section for more information](contribute/code).

## Switching Branches

If you want to switch to a different branch (that you have already checked out locally), simply type these commands:

``` bash
git fetch upstream
git checkout 2.5.x upstream/2.5.x
```

Of course, replacing 2.5.x with the actual name of the branch you want to switch to. After you've done so, run the build and run `setup/` again, since different branches might have different databases.

Switching _backwards_ is not always recommended; ie, switching from 2.x (the latest features in development for next minor release) to 2.5.x (the latest patches for next patch release), since database changes cannot be executed in reverse. While no major issues should occur, be careful when doing this or keep your work in separate databases for each branch you work on.

## Additional Information

### Alternative: using create-project

The `composer create-project` command will clone, install dependencies, and build the core in one step.

From the parent directory into which you want to install MODX, run the following command where `your_directory` is the directory you want MODX installed into. (This can also be `.` to install into the current, empty, directory.)

```bash
composer create-project modx/revolution your_directory 3.x-dev
cd your_directory
```

If you want to point git at your own fork to contribute back to MODX:

1. `git remote add upstream https://github.com/modxcms/revolution.git`
2. `git remote set-url origin {your github repo url}`
3. You may also need: `git remote set-url --push origin {your github repo url}`

Now navigate to the standard setup, e.g. `http://localhost/setup/` to configure and install MODX.

### Using MAMP’s PHP on macOS

If `php -v` in Terminal shows a different version than MAMP (or the build fails with library errors), call MAMP’s PHP binary explicitly. Paths vary by MAMP version; a typical PHP 8.2 install looks like:

``` bash
/Applications/MAMP/bin/php/php8.2.0/bin/php transport.core.php
```

You can also put that `bin` directory early in your `PATH` (see below) so plain `php` and `composer` use the same version.

### Making sure `php` is in your PATH

If you're encountering issues with running the composer or build steps, check if PHP is in your PATH by doing the following:

``` bash
$ php -v
PHP 8.2.12 (cli) (built: Nov 21 2023 08:00:00) ( NTS )
Copyright (c) The PHP Group
Zend Engine v4.2.12, Copyright (c) Zend Technologies
 with Zend OPcache v8.2.12, Copyright (c), by Zend Technologies
```

You need **PHP 8.1 or higher** for current MODX 3.x (required since 3.2). If `php -v` reports an older version, install or select a newer PHP before continuing.

In some local development environments (e.g. MAMP, XAMPP), you may also want to verify which version of PHP you're using. 

``` bash
$ which php
/Applications/MAMP/bin/php/php8.2.0/bin/php
```

If that does not return the path you're expecting, edit the `$PATH` in your `~/.bash_profile` or `~/.zshrc`. 
