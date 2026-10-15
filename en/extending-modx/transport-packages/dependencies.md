---
title: "Package Dependencies"
description: "A transport package can declare dependencies and refuse to install until they are met"
---

Package dependencies are listed in the `requires` package attribute. Until every requirement is met, the package cannot be installed.

## Adding Package Dependencies to your Build

Add `requires` to the package attributes at the end of your [build script](extending-modx/transport-packages/build-script):

```php
$builder->setPackageAttributes(array(
    'license' => file_get_contents($sources['docs'].'license.txt'),
    'readme' => file_get_contents($sources['docs'].'readme.txt'),
    'changelog' => file_get_contents($sources['docs'].'changelog.txt'),
    'setup-options' => array(
        'source' => $sources['build'].'setup.options.php',
    ),
    'requires' => array(
        'formit' => '>=2.2.0',
    )
));
```

Each element pairs a package name with a version constraint — here FormIt 2.2 or higher. Add elements to the array for more packages. The keys `modx` and `php` check the MODX version and the PHP version instead of a package.

Other package builders may not pass these attributes; check their documentation.

Dependencies require MODX 2.4 or higher. For older versions, check them in a [Resolver](getting-started/glossary#resolver-from-transport-package) or in your documentation.

## Version Constraints

Version constraints use the tokens below. Several constraints combine with a comma and no space, as in `'>=2.0,<3.0'`. A space after the comma is not trimmed by the current parser and silently fails the check.

| Token                  | What it does                                                                | Example version string          |
| ---------------------- | --------------------------------------------------------------------------- | ------------------------------- |
| ~                      | Requires at least the specified version, up to the next significant version | ~1.0 translates to >=1.0,<2.0; ~1.3.0 translates to >=1.3.0,<1.4.0 |
| n.\*                   | Wildcard for a specific part of the version string                          | 1.\* translates to >=1.0,<2.0   |
| <, <=                  | No higher than that version                                                 | <2.0 or <=1.9.9                 |
| >, >=                  | No lower than that version                                                  | >=2.2.0                         |
| !=                     | Any version except that one                                                 | !=2.0                           |
| plain version          | Exactly that version                                                        | 2.2.0                           |
| \*                     | Anything goes                                                               |                                 |

Do not use the bare `!` operator ("not that version") or the textual operators `eq`, `ne`, `le`, `ge`: the parser only understands the symbols above. Anything else either never matches or — with a bare `!` — is passed to PHP's `version_compare()`. On PHP 8.1+ that call rejects it with a `ValueError`, which can abort the install request.

## How Unsatisfied Dependencies Block Install

Before installing, MODX checks every `requires` entry against the installed packages (plus the special `modx` and `php` keys). If any requirement is unmet, the install request is aborted and a `package_dependency_unsatisfied` message is logged.

The package attribute **abort_install_on_unsatisfied_dependency** (default `true`) controls this. Set it to `false` in the same attributes array as `requires` to let the install continue anyway. The unsatisfied-dependency message is still logged, but no longer stops the package.

## Downloading Dependencies from the Manager

The package install dialog lists requirements on its **Dependencies** tab, showing for each whether it is already installed or can be downloaded from a provider. The Download action there looks the dependency up through the registered providers and installs what it finds.

Known limitation: the resolver currently reports every resolution attempt as unsuccessful — see [#17065](https://github.com/modxcms/revolution/issues/17065). After downloading a dependency the install still stays blocked until the dependency is installed in its own right (or `abort_install_on_unsatisfied_dependency` is set to `false`).
