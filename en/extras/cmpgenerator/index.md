---
title: "CMPGenerator"
_old_id: "620"
_old_uri: "revo/cmpgenerator"
---

## What is CMPGenerator?

CMPGenerator is intended to be used by PHP developers that want to create custom database tables to be used via a snippet, plugin or CMP. CMPGenerator is a GUI and it will create the xpdo scheme files and xpdo classes for your custom database tables with just a click of a button. This allows you to quickly start using xpdo in your custom projects.

## Required developer knowledge

You need to understand:

- Databases - [MySQL](http://dev.mysql.com/)
- [PHP](http://php.net)
- And then you can begin to use [XPDO](developing-in-modx/basic-development/xpdo "xPDO")
- [MODX Coding standards](developing-in-modx/code-standards "Code Standards")

## History

CMPGenerator was written by Josh Gulledge to simply creating and adding custom tables to your CMP, snippet or plugin. CMPGenerator was written July 2011 and the first public release was in early 2012.

### Install

Install CMPGenerator from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"). See the extras page: <https://modx.com/extras/package/cmpgenerator>.

### Development and Bug Reporting

CMPGenerator is on GitHub: <https://github.com/jgulledge19/CMPGenerator>, report any issues or feature requests here: <https://github.com/jgulledge19/CMPGenerator/issues>.

## How to use

- Create your database tables(s) via your preferred method - phpmyadmin, SQLYog, ect..
  Note your auto increment primary key should be named id
- Now create a new Package
    - Choose a unique name, it is a good idea to create a prefix for your packages.
      Example you could use your initials like First Middle Last: fmlMyCustomPackage
      Also make sure you only use alphanumberic values
    - List the tables that you just created via a comma separated list
    - Put in the prefix for the table if any. It is best practice to use the same prefix as your MODX install does.
    - Select if you want to build the schema. If you don't do this you can't use your tables.
    - Select build Package and this will generate all necessary files.
- Once the files are created and if you are using tables that have a relationship you will want to manually add that code in the file: core/components/YOUR-CMP/model/YOUR-CMP/YOUR-CMP.mysql.custom.schema.xml. See Documentation on Defining Relationships for more info: <http://rtfm.modx.com/display/xPDO20/Defining+Relationships>.
  Once you have updated this file to show the relationships you can now regenerate the package. Set the Build Scheme to No and set Build Package to Yes and save.

**Build Scheme** this creates or recreates the xml file. Make sure you set this option to No if you made any modifications to the file.

**Build Package** this creates or recreates the xpdo class files called a package.

When creating a new CMP, CMPGenerator will create all folders for the CMP in both assets/components/MYCMP and core/components/MYCMP.

## See Also

1. [CMPGenerator.5 minute example](extras/cmpgenerator/cmpgenerator.5-minute-example)
2. [CMPGenerator.Foreign Databases](extras/cmpgenerator/cmpgenerator.foreign-databases)
