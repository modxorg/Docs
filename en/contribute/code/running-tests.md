---
title: Running Tests
---

MODX comes with a set of unit tests (when installed from Git), which verify the code works as it should. They are run automatically on every push to `modxcms/revolution` including in pull requests.

The tests are written to be run by PHPUnit 6.
 
To run the tests locally, you need to set them up first. 

## Prepare the configuration

Copy the file `_build/test/properties.sample.inc.php` to `_build/test/properties.inc.php` and open it in an editor.

Around line 23, change `$properties['config_key']` to use your actual MODX configuration key. That can be found in your `config.core.php` in the root. 

Around line 27, change `$properties['mysql_string_dsn_test']` to match your actual database connection details. Find this in your `core/config./config.inc.php` file. (Note: leave the the other two `mysql_string_dsn_*` definitions alone)

Around line 30 and 31, enter your database credentials in `$properties['mysql_string_username']` and `$properties['mysql_string_password']`

## Run the tests

From the root of the project, execute the following command to run the tests:

```
composer run phpunit
```

To limit the tests to a specific subset of tests (which will speed it up a lot), add the proper path to the command. For example to only run Model related tests:

```
composer run phpunit _build/test/Tests/Model
```

## When to write tests

As much as possible. If it's possible to use unit tests to verify a change or feature works as expected, then tests should be added. 

The more tests we have, the less likely it is for bugs to make it into a release. More tests also make it easier to make bigger changes to the core, as we'll have tests to make sure things still work as expected.
