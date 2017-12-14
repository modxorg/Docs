---
title: "Package Dependencies"
_old_id: "1737"
_old_uri: "2.x/developing-in-modx/advanced-development/package-management/package-dependencies"
---

New in MODX 2.4 is the ability to define package dependencies in transport packages. When these are set, the user will not be able of installing the package until the dependencies have been fulfilled.

Adding Package Dependencies to your Build
-----------------------------------------

Package Dependencies are added to the package attributes, which were already used for the license, readme and changelog contents, typically looking like this toward the end of your [build script](https://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/package-management/creating-a-3rd-party-component-build-script). If you use a different way of creating packages, you might need to check that documentation to see if it supports these attributes and how you can defined the dependencies there.

```
<pre class="brush: php">$builder->setPackageAttributes(array(
    'license' => file_get_contents($sources['docs'].'license.txt'),
    'readme' => file_get_contents($sources['docs'].'readme.txt'),
    'changelog' => file_get_contents($sources['docs'].'changelog.txt'),
    'setup-options' => array(
        'source' => $sources['build'].'setup.options.php',
    ),
));
```To add the package dependencies, simply add the `requires` option, providing an array of package names and the minimum version requirements.

For example to indicate a package requires FormIt 2.2 or higher:

```
<pre class="brush: php">$builder->setPackageAttributes(array(
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
```You can add more packages to the list by simply adding additional elements to that array. You can also add checks for "modx" and "php" to require a specific version of MODX or PHP.

<div class="info">Keep in mind that these package dependencies only work in MODX 2.4 and up. If you intend to support older versions, you might want to add an additional check in a resolver, or add instructions to your documentation.</div>There are different ways of specifying the version numbers that each carry different meaning. You can also add multiple constraints by separating them with a comma.

<table><tbody><tr><td>Token</td><td>What it does</td><td>Example version string</td></tr><tr><td>~</td><td>Requires at least the specified version, up to the next significant version</td><td>~1.0 translates to >=1.0,<2.0  
~1.3.0 translates to >=1.3.0,<1.4.0</td></tr><tr><td>n.\*</td><td>Wildcard for a specific part of the version string</td><td>1.\* translates to >=1.0,<2.0</td></tr><tr><td><, >, !</td><td>At least that version, at most that version, or not that version</td><td></td></tr><tr><td>\*</td><td>Anything goes</td><td></td></tr></tbody></table>