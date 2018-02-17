---
title: "The Setup Config Xml File"
_old_id: "307"
_old_uri: "2.x/getting-started/installation/command-line-installation/the-setup-config-xml-file"
---

- [The XML Configuration File](#TheSetupConfigXmlFile-TheXMLConfigurationFile)
  - [Database Configuration Options](#TheSetupConfigXmlFile-DatabaseConfigurationOptions)
  - [Installation Configuration Options](#TheSetupConfigXmlFile-InstallationConfigurationOptions)
  - [Path Configuration Options](#TheSetupConfigXmlFile-PathConfigurationOptions)
  - [Other Configuration Options](#TheSetupConfigXmlFile-OtherConfigurationOptions)
- [See Also](#TheSetupConfigXmlFile-SeeAlso)



## The XML Configuration File

The config.xml file used for running setup via CLI has the following XML nodes. They are described and outlined below:

### Database Configuration Options

KeyDescriptionDefaultdatabase\_typeThe database driver to use for this installation.mysqldatabase\_serverThe hostname where your DB server is located. To use a port, postfix with :portnumberlocalhostdatabaseThe name of the databasemodx\_modxdatabase\_userThe user to use to connect to the databasedb\_usernamedatabase\_passwordThe password to use to connect to the databasedb\_passworddatabase\_connection\_charsetThe charset to use in the connection to the databaseutf8database\_charsetThe charset of the databaseutf8database\_collationThe collation of the databaseutf8\_general\_citable\_prefixThe table prefix to use for all MODX tablesmodx\_### Installation Configuration Options

KeyDescriptionDefaultinplaceSet this to 1 if you are using MODX from Git or extracted it from the full MODX package to the server prior to installationunpackedSet this to 1 if you have manually extracted the core package from the file core/packages/core.transport.zip. This will reduce the time it takes for the installation process on systems that do not allow the PHP time\_limit and script execution time settings to be alteredlanguageThe language to install MODX for. This will set the default manager language to this. Use IANA codes.cmsadminThe username of the new Administrator account for new installsusernamecmspasswordThe password of the new Administrator account for new installspasswordcmsadminemailThe email of the new Administrator account for new installsemail@address.comremove\_setup\_directoryWhether or not to remove the setup/ directory after installation.1### Path Configuration Options

KeyDescriptionDefaultcontext\_mgr\_path  context\_mgr\_url  context\_connectors\_path  context\_connectors\_url  context\_web\_path  context\_web\_url  assets\_path  assets\_url  core\_path  processors\_path  ### Other Configuration Options

KeyDescriptionDefaulthttps\_portThe port on your server for HTTPS connections443http\_hostThe HTTP host of your server. Usually the hostname, such as mysite.comlocalhostcache\_disabledWhether or not to disable the MODX cache0## See Also

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