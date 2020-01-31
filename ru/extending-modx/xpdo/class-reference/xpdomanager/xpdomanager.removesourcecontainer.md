---
title: "xPDOManager.removeSourceContainer"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removesourcecontainer"
---

## xPDOManager::removeSourceContainer()

Удаляет физический контейнер данных, если он существует.

## Синтаксис

API Docs: [removeSourceContainer](http://api.modxcms.com/xpdo/om-mysql/xPDOManager_mysql.html#removeSourceContainer)

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
