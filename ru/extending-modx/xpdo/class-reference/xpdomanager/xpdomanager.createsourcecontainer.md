---
title: "xPDOManager.createSourceContainer"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createsourcecontainer"
---

## xPDOManager::createSourceContainer()

Создает физический контейнер данных, представленный источником данных.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdomanager.class.html#\xPDOManager::createSourceContainer()>

```php
void createSourceContainer (
   $dsn,
   [$username = ''],
   [$password = ''],
   [$containerOptions = null]
)
```

## Примеры

Создание базы данных под названием 'MyDatabase'.

```php
$newDatabaseName = 'MyDatabase';
$dsn = 'mysql:host=localhost;dbname='.$newDatabaseName.';charset=utf8';
$manager = $xpdo->getManager();
$manager->createSourceContainer($dsn,'myusername','mypassword');
```
