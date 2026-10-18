---
title: "xPDOGenerator.outputClasses"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputclasses"
---

## xPDOGenerator::outputClasses

Записывает сгенерированные PSR-4 PHP-файлы классов для разобранной схемы в указанный каталог. `$update` управляет тем, какие файлы перезаписываются (0 — никакие, 1 — только классы платформы, 2 — все), а `$regenerate` принудительно пересобирает их.

## Синтаксис

```php
boolean outputClasses (string $path, [integer $update = 1], [integer $regenerate = 0], [string $namespacePrefix = ''])
```

## Пример

```php
$generator->outputClasses(MODX_CORE_PATH . 'components/mypackage/model/', 2, 0, 'MyVendor\\MyPackage\\');
```

## Смотрите также

-   [outputMeta](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputmeta "outputMeta")
-   [parseSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.parseschema "parseSchema")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")