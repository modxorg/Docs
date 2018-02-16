---
title: "The Setup Config Xml File"
_old_id: "307"
_old_uri: "2.x/getting-started/installation/command-line-installation/the-setup-config-xml-file"
---

<div>- [The XML Configuration File](#TheSetupConfigXmlFile-TheXMLConfigurationFile)
  - [Database Configuration Options](#TheSetupConfigXmlFile-DatabaseConfigurationOptions)
  - [Installation Configuration Options](#TheSetupConfigXmlFile-InstallationConfigurationOptions)
  - [Path Configuration Options](#TheSetupConfigXmlFile-PathConfigurationOptions)
  - [Other Configuration Options](#TheSetupConfigXmlFile-OtherConfigurationOptions)
- [See Also](#TheSetupConfigXmlFile-SeeAlso)

</div>The XML Configuration File
--------------------------

The config.xml file used for running setup via CLI has the following XML nodes. They are described and outlined below:

### Database Configuration Options

<table id="TBL1376497247030"><tbody><tr><th>Key</th><th>Description</th><th>Default</th></tr><tr><td>database\_type</td><td>The database driver to use for this installation.</td><td>mysql</td></tr><tr><td>database\_server</td><td>The hostname where your DB server is located. To use a port, postfix with :portnumber</td><td>localhost</td></tr><tr><td>database</td><td>The name of the database</td><td>modx\_modx</td></tr><tr><td>database\_user</td><td>The user to use to connect to the database</td><td>db\_username</td></tr><tr><td>database\_password</td><td>The password to use to connect to the database</td><td>db\_password</td></tr><tr><td>database\_connection\_charset</td><td>The charset to use in the connection to the database</td><td>utf8</td></tr><tr><td>database\_charset</td><td>The charset of the database</td><td>utf8</td></tr><tr><td>database\_collation</td><td>The collation of the database</td><td>utf8\_general\_ci</td></tr><tr><td>table\_prefix</td><td>The table prefix to use for all MODX tables</td><td>modx\_</td></tr></tbody></table>### Installation Configuration Options

<table id="TBL1376497247031"><tbody><tr><th>Key</th><th>Description</th><th>Default</th></tr><tr><td>inplace</td><td>Set this to 1 if you are using MODX from Git or extracted it from the full MODX package to the server prior to installation</td></tr><tr><td>unpacked</td><td>Set this to 1 if you have manually extracted the core package from the file core/packages/core.transport.zip. This will reduce the time it takes for the installation process on systems that do not allow the PHP time\_limit and script execution time settings to be altered</td></tr><tr><td>language</td><td>The language to install MODX for. This will set the default manager language to this. Use IANA codes.</td></tr><tr><td>cmsadmin</td><td>The username of the new Administrator account for new installs</td><td>username</td></tr><tr><td>cmspassword</td><td>The password of the new Administrator account for new installs</td><td>password</td></tr><tr><td>cmsadminemail</td><td>The email of the new Administrator account for new installs</td><td>email@address.com</td></tr><tr><td>remove\_setup\_directory</td><td>Whether or not to remove the setup/ directory after installation.</td><td>1</td></tr></tbody></table>### Path Configuration Options

<table id="TBL1376497247032"><tbody><tr><th>Key</th><th>Description</th><th>Default</th></tr><tr><td>context\_mgr\_path</td><td> </td><td> </td></tr><tr><td>context\_mgr\_url</td><td> </td><td> </td></tr><tr><td>context\_connectors\_path</td><td> </td><td> </td></tr><tr><td>context\_connectors\_url</td><td> </td><td> </td></tr><tr><td>context\_web\_path</td><td> </td><td> </td></tr><tr><td>context\_web\_url</td><td> </td><td> </td></tr><tr><td>assets\_path</td><td> </td><td> </td></tr><tr><td>assets\_url</td><td> </td><td> </td></tr><tr><td>core\_path</td><td> </td><td> </td></tr><tr><td>processors\_path</td><td> </td><td> </td></tr></tbody></table>### Other Configuration Options

<table id="TBL1376497247033"><tbody><tr><th>Key</th><th>Description</th><th>Default</th></tr><tr><td>https\_port</td><td>The port on your server for HTTPS connections</td><td>443</td></tr><tr><td>http\_host</td><td>The HTTP host of your server. Usually the hostname, such as mysite.com</td><td>localhost</td></tr><tr><td>cache\_disabled</td><td>Whether or not to disable the MODX cache</td><td>0</td></tr></tbody></table>See Also
--------

1. [Basic Installation](getting-started/installation/basic-installation)
  1. [MODx Revolution on Debian](getting-started/installation/basic-installation/modx-revolution-on-debian)
  2. [Lighttpd Guide](getting-started/installation/basic-installation/lighttpd-guide)
  3. [Problems with WAMPServer 2.0i](getting-started/installation/basic-installation/problems-with-wampserver-2.0i)
  4. [Installation on a server running ModSecurity](getting-started/installation/basic-installation/installation-on-a-server-running-modsecurity)
  5. [MODX and Suhosin](getting-started/installation/basic-installation/modx-and-suhosin)
  6. [Nginx Server Config](getting-started/installation/basic-installation/nginx-server-config)
2. [Advanced Installation](getting-started/installation/advanced-installation)
3. [Git Installation](getting-started/installation/git-installation)
4. [Command Line Installation](getting-started/installation/command-line-installation)
  1. [The Setup Config Xml File](getting-started/installation/command-line-installation/the-setup-config-xml-file)
5. [Troubleshooting Installation](getting-started/installation/troubleshooting-installation)
6. [Successful Installation, Now What Do I Do?](getting-started/installation/successful-installation,-now-what-do-i-do)
7. [Using MODx Revolution from SVN](getting-started/installation/using-modx-revolution-from-svn)