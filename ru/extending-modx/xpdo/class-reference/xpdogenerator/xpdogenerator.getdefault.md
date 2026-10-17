---
title: "xPDOGenerator.getDefault"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getdefault"
---

## xPDOGenerator::getDefault

Возвращает значение по умолчанию, которое нужно использовать для определения поля, согласно настройкам генератора. Используется при создании файлов классов и карт.

## Синтаксис

```php
mixed getDefault (mixed $value)
```

## Пример

```php
$generator = $manager->getGenerator();
$default = $generator->getDefault('0');
```

## Смотрите также

-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")