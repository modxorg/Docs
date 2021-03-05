---
title: "Command Line Installation"
_old_id: "349"
_old_uri: "2.x/getting-started/installation/command-line-installation"
---

CLI Installation is available only for MODX Revolution versions 2.2 and later.

## Installing MODX via the PHP Command Line

MODX allows you to do upgrades and installations via the command line (CLI) while using a config XML file. (More info on this file can be found [here](getting-started/installation/command-line-installation/the-setup-config-xml-file "The Setup Config Xml File").) This allows users to create simple batch scripts to update their MODX installations.

When running upgrades, it is **always** recommended to backup your files before upgrading.

## New CLI Installations

First off, [download MODX](https://modx.com/download/) and extract the files to your server. In the `setup/` directory, copy the file `config.dist.new.xml` and rename it to `config.xml`. MODX will automatically look for the `setup/config.xml` file during installation. You can move it outside of the `setup/` directory (and the MODX webroot, if you choose), and specify its location with the "--config=/path/to/config.xml" argument.

Next, edit the XML file and set the appropriate database information, MODX paths, and other configuration parameters, and then in your command line prompt, browse to the MODX `setup/` directory, and type:

``` php
php ./index.php --installmode=new
```

MODX will proceed to install, and when finished will display the time it took to run the installation, as well as any errors that occurred (which will also be logged in an install log file in `core/cache/logs/`).

Note : if your core folder is in a "non-standard" location, you might want to use :

``` shell
--core_path=/path/to/core/
```

## Doing a Basic Upgrade MODX via CLI

Follow the same steps as new installations, but this time in your XML file you need only specify the following attributes:

- `inplace`
- `unpacked`
- `language`
- `remove_setup_directory`

And any other attributes you would like to change during the upgrade. There is an example upgrade xml file named "config.dist.upgrade.xml". Then, once you are ready, browse to the MODX setup directory, and type:

``` shell
php ./index.php --installmode=upgrade
```

This will upgrade your MODX installation, and when finished will display the time it took to run the installation, as well as any errors that occurred (which will also be logged in an install log file in `core/cache/logs/`).

## Doing an Advanced Upgrade MODX via CLI

Follow the same steps as basic upgrade, but this time in your XML file you need all the attributes included in the config.dist.upgrade-advanced.xml file, as all can be changed in an advanced upgrade.

Then, once you are ready, browse to the MODX setup directory, and type:

``` shell
php ./index.php --installmode=upgrade-advanced
```

This will upgrade your MODX installation, and when finished will display the time it took to run the installation, as well as any errors that occurred (which will also be logged in an install log file in `core/cache/logs/`).

## Using a Helper Script

There is a helper script **installmodx.php** available on Github: [https://github.com/craftsmancoding/modx\_utils/blob/master/installmodx.php](https://github.com/craftsmancoding/modx_utils/blob/master/installmodx.php)

It provides command line options for this process.

## See Also

1. [Basic Installation](getting-started/installation/standard)
2. [Lighttpd Guide](getting-started/friendly-urls/lighttpd)
3. [Installation on a server running ModSecurity](getting-started/installation/troubleshooting/modsecurity)
4. [Nginx Server Config](getting-started/friendly-urls/nginx)
5. [Advanced Installation](getting-started/installation/advanced)
6. [Git Installation](getting-started/installation/git)
7. [Command Line Installation](getting-started/installation/cli)
8. [The Setup Config Xml File](getting-started/installation/cli/config.xml)
9. [Troubleshooting Installation](getting-started/installation/troubleshooting)
10. [Successful Installation, Now What Do I Do?](getting-started/getting-started)
