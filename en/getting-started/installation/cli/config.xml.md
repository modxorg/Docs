---
title: "The Setup Config Xml File"
_old_id: "307"
_old_uri: "2.x/getting-started/installation/command-line-installation/the-setup-config-xml-file"
---

## The XML Configuration File

CLI setup reads an XML file (usually `setup/config.xml`). Copy `setup/config.dist.new.xml` from a MODX 3.x package, rename it to `config.xml`, and edit the values for your server. You can keep the file outside the web root and point to it with `--config=/path/to/config.xml`.

The sample below matches [`setup/config.dist.new.xml`](https://github.com/modxcms/revolution/blob/3.x/setup/config.dist.new.xml) on the 3.x branch. Replace database credentials, admin account, host, and filesystem paths before you run install.

### Minimal new-install example

```xml
<modx>
    <database_type>mysql</database_type>
    <database_server>localhost</database_server>
    <database>modx_modx</database>
    <database_user>db_username</database_user>
    <database_password>db_password</database_password>
    <database_connection_charset>utf8</database_connection_charset>
    <database_charset>utf8</database_charset>
    <database_collation>utf8_general_ci</database_collation>
    <table_prefix>modx_</table_prefix>
    <https_port>443</https_port>
    <http_host>localhost</http_host>

    <!-- 1 = files already in place (Git checkout or full extract before setup) -->
    <inplace>0</inplace>

    <!-- 1 = core.transport.zip already extracted under core/packages/ -->
    <unpacked>0</unpacked>

    <!-- IANA language code for the default manager language -->
    <language>en</language>

    <cmsadmin>username</cmsadmin>
    <cmspassword>password</cmspassword>
    <cmsadminemail>email@address.com</cmsadminemail>

    <core_path>/www/modx/core/</core_path>

    <context_mgr_path>/www/modx/manager/</context_mgr_path>
    <context_mgr_url>/modx/manager/</context_mgr_url>
    <context_connectors_path>/www/modx/connectors/</context_connectors_path>
    <context_connectors_url>/modx/connectors/</context_connectors_url>
    <context_web_path>/www/modx/</context_web_path>
    <context_web_url>/modx/</context_web_url>

    <remove_setup_directory>1</remove_setup_directory>
</modx>
```

Then from `setup/`:

```shell
php ./index.php --installmode=new
```

See [Command Line Installation](getting-started/installation/cli) for `--config`, upgrades, and `upgrade-advanced`.

### Minimal upgrade example

For `--installmode=upgrade`, `setup/config.dist.upgrade.xml` only needs the keys below (plus any other values you want to change):

```xml
<modx>
    <inplace>0</inplace>
    <unpacked>0</unpacked>
    <language>en</language>
    <core_path>/www/modx/core/</core_path>
    <remove_setup_directory>1</remove_setup_directory>
</modx>
```

## Database Configuration Options

| Key | Description | Default |
| --- | ----------- | ------- |
| database\_type | The database driver to use for this installation. | mysql |
| database\_server | The hostname where your DB server is located. To use a port, postfix with `:portnumber`. | localhost |
| database | The name of the database. | modx\_modx |
| database\_user | The user to use to connect to the database. | db\_username |
| database\_password | The password to use to connect to the database. | db\_password |
| database\_connection\_charset | The charset to use in the connection to the database. | utf8 |
| database\_charset | The charset of the database. | utf8 |
| database\_collation | The collation of the database. | utf8\_general\_ci |
| table\_prefix | The table prefix to use for all MODX tables. | modx\_ |

## Installation Configuration Options

| Key | Description | Default |
| --- | ----------- | ------- |
| inplace | Set this to `1` if you are using MODX from Git or extracted the full package to the server before installation. | |
| unpacked | Set this to `1` if you already extracted `core/packages/core.transport.zip`. Speeds up install when PHP `time_limit` cannot be raised. | |
| language | Default manager language. Use IANA codes. | |
| cmsadmin | Username of the new administrator account (new installs). | username |
| cmspassword | Password of the new administrator account (new installs). | password |
| cmsadminemail | Email of the new administrator account (new installs). | email@address.com |
| remove\_setup\_directory | Whether to remove the `setup/` directory after installation. | 1 |

## Path Configuration Options

| Key | Description | Default |
| --- | ----------- | ------- |
| core\_path | Absolute path to the `core/` directory. | |
| context\_mgr\_path | Absolute path to the manager context. | |
| context\_mgr\_url | URL path to the manager (for example `/modx/manager/`). | |
| context\_connectors\_path | Absolute path to the connectors directory. | |
| context\_connectors\_url | URL path to the connectors. | |
| context\_web\_path | Absolute path to the web root for the `web` context. | |
| context\_web\_url | URL path to the site root (for example `/modx/`). | |
| assets\_path | Absolute path to `assets/` (optional; defaults under the web path). | |
| assets\_url | URL path to `assets/` (optional). | |
| processors\_path | Absolute path to processors (optional; MODX sets a default). | |

## Other Configuration Options

| Key | Description | Default |
| --- | ----------- | ------- |
| https\_port | The port on your server for HTTPS connections. | 443 |
| http\_host | The HTTP host of your server (hostname, such as `mysite.com`). | localhost |
| cache\_disabled | Whether to disable the MODX cache. | 0 |

## See Also

1. [Basic Installation](getting-started/installation/standard)
    1. [Lighttpd Guide](getting-started/friendly-urls/lighttpd)
    2. [Installation on a server running ModSecurity](getting-started/installation/troubleshooting/modsecurity)
    3. [Nginx Server Config](getting-started/friendly-urls/nginx)
2. [Advanced Installation](getting-started/installation/advanced)
3. [Git Installation](getting-started/installation/git)
4. [Command Line Installation](getting-started/installation/cli)
    1. [The Setup Config Xml File](getting-started/installation/cli/config.xml)
5. [Troubleshooting Installation](getting-started/installation/troubleshooting)
6. [Successful Installation, Now What Do I Do?](getting-started/getting-started)
