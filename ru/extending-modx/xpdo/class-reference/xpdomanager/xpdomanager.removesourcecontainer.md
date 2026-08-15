---
title: "xPDOManager.removeSourceContainer"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removesourcecontainer"
---

## xPDOManager::removeSourceContainer()

Удаляет физический контейнер данных, если он существует.

## Синтаксис

API Docs: [removeSourceContainer](https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdomanager.class.html#\xPDOManager::removeSourceContainer())

```php
int removeSourceContainer (string $dsn, string $username, string $password)
```

## Примеры

Удаление базы данных под названием 'MyDatabase'.

```php
$newDatabaseName = 'MyDatabase';
$dsn = 'mysql:host=localhost;dbname='.$newDatabaseName.';charset=utf8';
$manager = $xpdo->getManager();
$manager->removeSourceContainer($dsn,'myusername','mypassword');
```
