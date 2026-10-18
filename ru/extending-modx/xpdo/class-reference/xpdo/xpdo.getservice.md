---
title: "xPDO.getService"
description: "Загружает сервисный объект и возвращает его."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getservice"
---

## xPDO::getService

Загружает сервисный класс и возвращает его экземпляр, либо уже загруженный экземпляр, если сервис запрашивался ранее в текущем запросе.

> [!WARNING]
> `getService()` устарел начиная с xPDO 3.0 и будет удалён в 3.1. Обращайтесь к сервисам через контейнер внедрения зависимостей.

## Синтаксис

``` php
object|boolean getService (string $name, [string $class = ''], [string $path = ''], [array $params = array()])
```

-   `$name` — имя, под которым хранится сервис.
-   `$class` — имя класса сервиса.
-   `$path` — путь к файлу класса.
-   `$params` — параметры конструктора сервиса.

## Пример

``` php
$service = $xpdo->getService('myService', 'myServiceClass', '/path/to/model/root/', array('param1' => $param1));
```

## Смотрите также

-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")