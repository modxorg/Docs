---
title: "encode"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/encode"
---

## xPDOObject::encode

Кодирует значение перед сохранением. В xPDO 3.x принимаются только типы `password` и `md5`, и оба дают одинаковый MD5-хеш. Любой другой тип пишет ошибку в журнал и возвращает исходное значение без изменений. Нестроковое или пустое `$source` тоже логируется и возвращается как есть.

Чтобы использовать более стойкий алгоритм, переопределите этот метод в своём производном классе `xPDOObject`.

## Синтаксис

```php
string encode (string $source, [string $type = 'md5'])
```

-   `$source` — кодируемое значение.
-   `$type` — тип кодирования. И `password`, и `md5` приводят к вызову `md5()`.

## Пример

```php
$hash = $user->encode($plainPassword, 'password');
```

## Смотрите также

-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")