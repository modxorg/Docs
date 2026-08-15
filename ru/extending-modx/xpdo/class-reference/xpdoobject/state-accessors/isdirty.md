---
title: "isDirty"
translation: "extending-modx/xpdo/class-reference/xpdoobject/state-accessors/isdirty"
---

## xPDOObject::isDirty()

Показывает, изменено ли **поле** объекта (или объект ещё ни разу не сохраняли). Имя поля обязательно. Перегрузки «грязный ли весь объект» нет.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#isDirty>

```php
boolean isDirty (string $key)
```

- `$key` — имя поля (обязательный аргумент).

Возвращает `true`, если поле существует и либо есть в карте dirty-полей, либо объект новый (`isNew()`). Возвращает `false`, если поле существует и не менялось у уже сохранённого объекта. Неизвестное имя поля даёт `false` и ошибку в журнале xPDO.

## Пример

Проверка одного поля у объекта Skrewt:

```php
$skrewt = $xpdo->getObject('Skrewt', 1);

echo $skrewt->isDirty('poisonous') ? 1 : 0; // выведет 0

$skrewt->set('poisonous', false);

echo $skrewt->isDirty('poisonous') ? 1 : 0; // выведет 1
```

### Есть ли хотя бы одно dirty-поле

Вызова `isDirty()` без `$key` нет. Чтобы узнать, есть ли у объекта незаписанные изменения полей, смотрите публичную карту `$_dirty`:

```php
if (!empty($skrewt->_dirty)) {
    echo 'У Skrewt есть dirty-поля.';
} else {
    echo 'У Skrewt нет dirty-полей.';
}

print_r($skrewt->_dirty);
```

В `$_dirty` лежат ключи изменённых полей. После `save()` карта очищается. У нового объекта `isDirty($key)` вернёт `true` для любого известного поля ещё до `set()`, пока `isNew()` остаётся истинным.
