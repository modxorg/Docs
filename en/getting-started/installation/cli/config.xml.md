---
title: "The Setup Config Xml File"
_old_id: "307"
_old_uri: "2.x/getting-started/installation/command-line-installation/the-setup-config-xml-file"
---

- [The XML Configuration File](#the-xml-configuration-file)
  - [Database Configuration Options](#database-configuration-options)
  - [Installation Configuration Options](#installation-configuration-options)
  - [Path Configuration Options](#path-configuration-options)
  - [Other Configuration Options](#other-configuration-options)
- [See Also](#see-also)



## The XML Configuration File

The config.xml file used for running setup via CLI has the following XML nodes. They are described and outlined below:

### Database Configuration Options

| Key                           | Description                                                                           | Default           |
| ----------------------------- | ------------------------------------------------------------------------------------- | ----------------- |
| database\_type                | The database driver to use for this installation.                                     | mysql             |
| database\_server              | The hostname where your DB server is located. To use a port, postfix with :portnumber | localhost         |
| database                      | The name of the database                                                              | modx\_modx        |
| database\_user                | The user to use to connect to the database                                            | db\_username      |
| database\_password            | The password to use to connect to the database                                        | db\_password      |
| database\_connection\_charset | The charset to use in the connection to the database                                  | utf8              |
| database\_charset             | The charset of the database                                                           | utf8              |
| database\_collation           | The collation of the database                                                         | utf8\_general\_ci |
| table\_prefix                 | The table prefix to use for all MODX tables                                           | modx\_            |

### Installation Configuration Options

| Key                      | Description                                                                                                                                                                                                                                                                     | Default           |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------- |
| inplace                  | Set this to 1 if you are using MODX from Git or extracted it from the full MODX package to the server prior to installation                                                                                                                                                     |
| unpacked                 | Set this to 1 if you have manually extracted the core package from the file core/packages/core.transport.zip. This will reduce the time it takes for the installation process on systems that do not allow the PHP time\_limit and script execution time settings to be altered |
| language                 | The language to install MODX for. This will set the default manager language to this. Use IANA codes.                                                                                                                                                                           |
| cmsadmin                 | The username of the new Administrator account for new installs                                                                                                                                                                                                                  | username          |
| cmspassword              | The password of the new Administrator account for new installs                                                                                                                                                                                                                  | password          |
| cmsadminemail            | The email of the new Administrator account for new installs                                                                                                                                                                                                                     | email@address.com |
| remove\_setup\_directory | Whether or not to remove the setup/ directory after installation.                                                                                                                                                                                                               | 1                 |

### Path Configuration Options

| Key                       | Description | Default |
| ------------------------- | ----------- | ------- |
| context\_mgr\_path        |             |         |
| context\_mgr\_url         |             |         |
| context\_connectors\_path |             |         |
| context\_connectors\_url  |             |         |
| context\_web\_path        |             |         |
| context\_web\_url         |             |         |
| assets\_path              |             |         |
| assets\_url               |             |         |
| core\_path                |             |         |
| processors\_path          |             |         |

### Other Configuration Options

| Key             | Description                                                            | Default   |
| --------------- | ---------------------------------------------------------------------- | --------- |
| https\_port     | The port on your server for HTTPS connections                          | 443       |
| http\_host      | The HTTP host of your server. Usually the hostname, such as mysite.com | localhost |
| cache\_disabled | Whether or not to disable the MODX cache                               | 0         |

## See Also

1. [Basic Installation](getting-started/installation/standard)
  1. [MODx Revolution on Debian](_legacy/getting-started/modx-revolution-on-debian)
  2. [Lighttpd Guide](getting-started/friendly-urls/lighttpd)
  3. [Problems with WAMPServer 2.0i](_legacy/getting-started/problems-with-wampserver-2.0i)
  4. [Installation on a server running ModSecurity](getting-started/installation/troubleshooting/modsecurity)
  5. [MODX and Suhosin](_legacy/getting-started/modx-and-suhosin)
  6. [Nginx Server Config](getting-started/friendly-urls/nginx)
2. [Advanced Installation](getting-started/installation/advanced)
3. [Git Installation](getting-started/installation/git)
4. [Command Line Installation](getting-started/installation/cli)
  1. [The Setup Config Xml File](getting-started/installation/cli/config.xml)
5. [Troubleshooting Installation](getting-started/installation/troubleshooting)
6. [Successful Installation, Now What Do I Do?](getting-started/getting-started)
7. [Using MODx Revolution from SVN](_legacy/getting-started/using-modx-revolution-from-svn)