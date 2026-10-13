---
title: "modX.setPlaceholders"
description: "Устанавливает коллекцию плейсхолдеров, хранящихся в массиве или в виде объектных переменных."
translation: "extending-modx/modx-class/reference/modx.setplaceholders"
---

## modX::setPlaceholders

Устанавливает коллекцию плейсхолдеров, хранящихся в массиве или в виде объектных переменных.
Необязательный параметр пространства имен может быть добавлен перед каждым ключом-плейсхолдера в коллекции, чтобы изолировать коллекцию-плейсхолдеров.

Обратите внимание, что в отличие от [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders") и [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk"), эта функция не добавляет разделители между пространством имен и ключом-плейсхолдера. Используйте [toPlaceholders()](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders") при работе с многомерными массивами или объектами с переменными, отличными от скаляров, поэтому каждый уровень разделяется разделителем.

## Синтаксис

``` php
void setPlaceholders (array|object  $placeholders, [string $namespace = ''])
```

Разделитель не вставляется — ни между пространством имен и ключом, ни между уровнями вложенного массива. Поэтому `setPlaceholders(['a' => ['b' => 1]])` с пустым пространством имен устанавливает один плейсхолдер с именем `ab`.

Вложенные массивы объединяются так же: `getChunk` и `toPlaceholders` вставляют точку между уровнями, а `setPlaceholders` — нет. Для многомерных массивов и объектов со значениями, отличными от скалярных, используйте [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders"), который разделяет каждый уровень разделителем (по умолчанию точкой).

## Пример

Добавьте массив плейсхолдеров и префикс "my." к их ключу.

``` php
$modx->setPlaceholders(array(
   'name' => 'John',
   'email' => 'jdoe@gmail.com',
),'my.');
```

## Смотрите также

- [modX.toPlaceholder](extending-modx/modx-class/reference/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.getPlaceholder](extending-modx/modx-class/reference/modx.getplaceholder "modX.getPlaceholder")
