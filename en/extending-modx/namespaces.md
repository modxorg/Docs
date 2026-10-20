---
title: "Namespaces"
description: How MODX namespaces resolve lexicons, manager controllers, and model packages, and what runs inside a namespace bootstrap.php"
_old_id: "208"
_old_uri: "2.x/developing-in-modx/advanced-development/namespaces"
---

A namespace is an organizational unit for Components. It maps a short name to a directory on disk, which lets MODX find that Component's lexicons, manager controllers, and model packages without hard-coded paths.

Lexicons and controllers resolve through a namespace. **Processors do not** — see [Processors](extending-modx/processors) for how they are located.

## Usage

A manager page is identified by two query parameters: `namespace` (default `core`) and `a`, which carries the action. Given `?a=some/action&namespace=quip`, MODX looks for the controller inside the `quip` namespace directory — most often `core/components/quip/controllers/some/action.class.php`.

If a namespace "quip" has the path `/www/modx/core/components/quip/`, that file resolves to `/www/modx/core/components/quip/controllers/some/action.class.php`.

Menu entries store the same pair: `modMenu` carries an `action` column and a `namespace` column (default `core`). There is no `controller` column — the 2.x `modAction` class and its `controller` field were removed in 3.0. The full resolution order lives under [Controllers and Menus](extending-modx/menus/actions "Controllers and Menus").

## Lexicons in Namespaces

Namespaces isolate Lexicons and Lexicon Topics. To load the "comment" topic from the "quip" namespace, prefix the topic with the namespace and a colon:

```php
$modx->lexicon->load('quip:comment');
```

In English this looks for `lexicon/en/comment.inc.php` inside the namespace path, so topics can live outside the MODX core directories and load on demand.

- [Internationalization](extending-modx/internationalization "Internationalization")

## Bootstrapping Services

If a file named `bootstrap.php` sits in the namespace root, MODX includes it during initialisation. Use it to [inject services into the dependency injection container](extending-modx/di-container).

Inside the file you have access to:

- `MODX\Revolution\modX $modx`
- `array $namespace`

> [!WARNING]
> `_initNamespaces()` runs early — before extension packages load, before culture initialisation, and before the `OnMODXInit` event. At that point `$modx->lexicon` is still `null`, and no Component models are registered yet. Register autoloaders and services here; resolve anything that depends on a lexicon or a model from `OnMODXInit` instead.

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