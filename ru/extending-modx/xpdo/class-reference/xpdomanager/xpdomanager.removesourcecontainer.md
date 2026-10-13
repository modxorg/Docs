---
title: "xPDOManager.removeSourceContainer"
description: "Удаляет физический контейнер данных, если он существует."
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removesourcecontainer"
---

## xPDOManager::removeSourceContainer()

Удаляет физический контейнер данных, если он существует.

## Синтаксис

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
