---
title: "getOption"
translation: "extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption"
---

## xPDOObject::getOption()

Получает значение параметра для этого экземпляра `xPDOObject`, используя параметры xPDO, если не существует конкретного параметра.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getOption>

```php
mixed getOption (string $key [, array|null $options [, mixed $default [, boolean $skipEmpty]]] )
```

-   `$key`: ключ настройки или опции для загрузки.
-   `$options`: источник настройки или опции. Либо null (который пытается найти ключ в основной конфигурации), либо массив параметров.
-   `$default`: значение, возвращаемое, когда ключ не найден.
-   `$skipEmpty`: если установлено значение `true`, `$default` также будет возвращено, если значение `$key` / `$key's` является пустой строкой. **_Добавлено в xPDO 2.2.1 / MODX 2.2.0-rc2_**.

## Примеры

### Simple Option Retrieval

Получает параметр конфигурации для `xPDO::OPT_HYDRATE_FIELDS`.

```php
$hydrateFields = $xpdo->getOption(xPDO::OPT_HYDRATE_FIELDS);
```

Получает параметр конфигурации для 'test' и, если не установлен, возвращает «123».

```php
$test = $xpdo->getOption('test',null,'123');
```

Проверяет массив `$props` на наличие ключа 'depth', и, если он не существует, то проверяет `$xpdo->config` и, если он все еще не существует, устанавливает 10.

```php
$props = array();
$depth = $xpdo->getOption('depth',$props,10);
echo $depth; // prints 10

$xpdo->setOption('depth',20);
$depth = $xpdo->getOption('depth',$props,10);
echo $depth; // prints 20

$props['depth'] = 30;
$depth = $xpdo->getOption('depth',$props,10);
echo $depth; // prints 30
```
