---
title: "xPDOManager.removeObjectContainer"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeobjectcontainer"
---

## xPDOManager::removeObjectContainer()

Удаляет таблицу, если она существует.

Это будет работать только в том случае, если для таблицы существует соответствующий класс xPDO и его пакет загружен. MODX не удалит таблицу, если слой ORM не определил таблицу.

## Синтаксис

API Docs: [removeObjectContainer](http://api.modxcms.com/xpdo/om-mysql/xPDOManager_mysql.html#removeObjectContainer)

```php
int removeObjectContainer (string $className)
```

## Примеры

Удаление таблицы, связанную с объектом "Person":

```php
$manager = $xpdo->getManager();
$manager->removeObjectContainer('Person');
```

## Альтернативы

Если вы пытаетесь удалить таблицы после удаления или переименования базовых классов xPDO, вам может потребоваться выполнить ручной запрос `DROP TABLE`.

```php
$removed = $modx->exec('DROP TABLE IF EXISTS your_table');
if ($removed === false && $modx->errorCode() !== '' && $modx->errorCode() !== PDO::ERR_NONE) {
    print 'Не удалось удалить таблицу! ОШИБКА: ' . print_r($modx->pdo->errorInfo(),true);
}
else {
    print 'Таблица успешно удалена.';
}
```
