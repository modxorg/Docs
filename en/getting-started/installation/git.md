---
title: "Git Installation"
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
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 21 installs, 0 updates, 0 removals

- Installing psr/log (1.0.2): Loading from cache
- Installing symfony/debug (v4.0.6): Loading from cache
- Installing symfony/polyfill-mbstring (v1.7.0): Loading from cache
- Installing symfony/console (v3.4.6): Loading from cache
- Installing psr/container (1.0.0): Loading from cache
- Installing container-interop/container-interop (1.2.0): Loading from cache
- Installing xpdo/xpdo (3.x-dev 5801782): Cloning 58017821d0 from cache
- Installing mtdowling/jmespath.php (2.4.0): Loading from cache
- Installing psr/http-message (1.0.1): Loading from cache
- Installing guzzlehttp/psr7 (1.4.2): Loading from cache
- Installing guzzlehttp/promises (v1.3.1): Loading from cache
- Installing guzzlehttp/guzzle (6.3.0): Loading from cache
- Installing aws/aws-sdk-php (3.52.30): Downloading (100%)
- Installing league/flysystem (1.0.43): Loading from cache
- Installing league/flysystem-aws-s3-v3 (1.0.18): Loading from cache
- Installing psr/cache (1.0.1): Loading from cache
- Installing league/flysystem-cached-adapter (1.0.6): Loading from cache
- Installing phpmailer/phpmailer (v6.0.3): Loading from cache
- Installing smarty/smarty (v3.1.31): Loading from cache
- Installing james-heinrich/phpthumb (v1.7.14): Loading from cache
- Installing pelago/emogrifier (v2.0.0): Loading from cache
symfony/console suggests installing symfony/event-dispatcher ()
symfony/console suggests installing symfony/lock ()
symfony/console suggests installing symfony/process ()
xpdo/xpdo suggests installing ext-redis (Allows caching using Redis)
aws/aws-sdk-php suggests installing aws/aws-php-sns-message-validator (To validate incoming SNS notifications)
aws/aws-sdk-php suggests installing doctrine/cache (To use the DoctrineCacheAdapter)
league/flysystem suggests installing league/flysystem-aws-s3-v2 (Allows you to use S3 storage with AWS SDK v2)
league/flysystem suggests installing league/flysystem-azure (Allows you to use Windows Azure Blob storage)
league/flysystem suggests installing league/flysystem-eventable-filesystem (Allows you to use EventableFilesystem)
league/flysystem suggests installing league/flysystem-rackspace (Allows you to use Rackspace Cloud Files)
league/flysystem suggests installing league/flysystem-sftp (Allows you to use SFTP server storage via phpseclib)
league/flysystem suggests installing league/flysystem-webdav (Allows you to use WebDAV storage)
league/flysystem suggests installing league/flysystem-ziparchive (Allows you to use ZipArchive adapter)
league/flysystem suggests installing spatie/flysystem-dropbox (Allows you to use Dropbox storage)
league/flysystem suggests installing srmklive/flysystem-dropbox-v2 (Allows you to use Dropbox storage for PHP 5 applications)
league/flysystem-cached-adapter suggests installing ext-phpredis (Pure C implemented extension for PHP)
phpmailer/phpmailer suggests installing league/oauth2-google (Needed for Google XOAUTH2 authentication)
phpmailer/phpmailer suggests installing hayageek/oauth2-yahoo (Needed for Yahoo XOAUTH2 authentication)
phpmailer/phpmailer suggests installing stevenmaguire/oauth2-microsoft (Needed for Microsoft XOAUTH2 authentication)
Writing lock file
Generating autoload files
```

It may be necessary from time-to-time to run `composer update` to make sure you're up-to-date.

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

### DYLD error with MAMP on Mac OS X

If you use MAMP on Mac OS X, you may get problems (errors about DYLD libraries not being included) when trying to execute `transport.core.php` from the terminal. This is because the MAMP PHP libraries won't be on the dynamic linker path by default.

To adjust the dynamic linker library path to include the MAMP PHP libraries, run the following command via the terminal:

``` bash
export DYLD_LIBRARY_PATH=/Applications/MAMP/Library/lib:$\{DYLD_LIBRARY_PATH\}
```

You can then execute `transport.core.php` by using the absolute path to the MAMP PHP executable:

``` bash
/Applications/MAMP/bin/php5/bin/php transport.core.php
```

### Making sure `php` is in your PATH

If you're encountering issues with running the composer or build steps, check if PHP is in your PATH by doing the following:

``` bash
$ php -v
PHP 7.2.3 (cli) (built: Mar 8 2018 10:30:06) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
 with Zend OPcache v7.2.3, Copyright (c) 1999-2018, by Zend Technologies
```

If you do not get something like the above, please ask someone or Google on how to get it installed.

In some local development environments (e.g. MAMP, XAMMP), you may also want to verify which version of PHP you're using. 

``` bash
$ which php
/Applications/MAMP/bin/php/php7.4.12/bin/php
```

If that does not return the path you're expecting, edit the `$PATH` in your `~/.bash_profile` or `~/.zshrc`. 
