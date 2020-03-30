---
title: "Namespaces"
_old_id: "208"
_old_uri: "2.x/developing-in-modx/advanced-development/namespaces"
---

Namespaces are organizational elements for Components. They relate lexicon strings and packages to one another, as well as provide a basic way for Revolution to know what objects belong to what package.

Lexicons, controllers, processors and model packages are typically contained in a specific namespace. 

## Usage

Revolution uses namespace paths to determine where to load 3rd Party Component files for custom manager pages, as well as managing custom language strings for those 3rd Party Components.

For example, if a Namespace called "quip" has a path of "/www/modx/core/components/quip/", then when the CMP is loaded from the [Action](extending-modx/menus/actions "Actions and Menus") with a value on the controller of "index", it will look for the index controller file in the namespace path, ie: "/www/modx/core/components/quip/index.php". This will then load in place of the Custom Manager Page. A useful value for the controller on the Action is "controllers/index", so that you can point it to "/www/modx/core/components/quip/controllers/index.php" (which is the standard practice for paths for Extras in MODX).

## Lexicons in Namespaces

Namespaces can be used to isolate Lexicons and Lexicon Topics. For example, when loading a Lexicon, you can specify the Namespace of the topic prior to the name of the topic with a colon. For example, to load the "comment" topic for the "quip" Namespace:

```php
$modx->lexicon->load('quip:comment');
```

Assuming we're in English, this will look for the lexicon/en/comment.inc.php file in the Namespace path for Quip. This allows Lexicon topics to be loaded dynamically based on the Namespace path, rather than requiring the topic files to be put inside the MODX core directories.

- [Internationalization](extending-modx/internationalization "Internationalization")

## Bootstrapping Services 

If a file named `bootstrap.php` is present in the root of the namespace, it will be automatically included during the initialisation of MODX. 

This can be used to [inject services into the dependency injection container](extending-modx/di-container). 

In the `bootstrap.php` file, you have access to:

- `MODX\Revolution\modX $modx`
- `array $namespace`

### Examples

To add a PSR4 autoloader pointing to the `src` directory in your namespace:

```php
\MODX\Revolution\modX::getLoader()->addPsr4('My\\Component\\', $namespace['path'] . 'src/');
```

To load an xPDO model:

```php
$modx->addPackage('My\\Component\\Model', $namespace['path'] . 'src/', null, 'My\\Component\\');
```

To register a service into the [dependency injection container](extending-modx/di-container):

```php
$modx->services->add('my_service', function($c) use ($modx) {
    return new My\Component\MyService($modx);
});
```

(Make sure your service name is properly unique.)
