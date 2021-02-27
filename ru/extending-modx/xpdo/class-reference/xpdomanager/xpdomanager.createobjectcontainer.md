---
title: "xPDOManager.createObjectContainer"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer"
---

## xPDOManager::createObjectContainer()

Создает контейнер для постоянного объекта данных. В этой реализации контейнер источника является синонимом таблицы базы данных MySQL. Имя таблицы будет сгенерировано схемой, однако связанные таблицы **не будут** созданы.

## Синтаксис

API Docs: [createObjectContainer](http://api.modxcms.com/xpdo/om-mysql/xPDOManager_mysql.html#createObjectContainer)

```php
void createObjectContainer (string $className)
```

## Примеры

Создание таблицы для класса 'Person':

```php
$manager = $xpdo->getManager();
$manager->createObjectContainer('Person');
```

Если вам нужно сделать это в сниппете MODX, вы должны использовать объект `$modx`, вам нужно сначала убедиться, что вы добавили свой пакет (и его классы моделей):

```php
$modx->addPackage('yourpkg',MODX_CORE_PATH.'components/yourpkg/model/','prefix_');
$manager = $modx->getManager();
$manager->createObjectContainer('Myobject');
```

Обратите внимание, что префикс базы данных здесь не зависит от префикса MODX. У вас может быть `modx_` для вашего префикса MODX и`mypkg_` для таблиц вашего пакета.
