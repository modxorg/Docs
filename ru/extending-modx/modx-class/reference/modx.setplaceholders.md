---
title: "modX.setPlaceholders"
translation: "extending-modx/modx-class/reference/modx.setplaceholders"
---

## modX::setPlaceholders

Устанавливает коллекцию плейсхолдеров, хранящихся в массиве или в виде объектных переменных.
Необязательный параметр пространства имен может быть добавлен перед каждым ключом-плейсхолдера в коллекции, чтобы изолировать коллекцию-плейсхолдеров.

Обратите внимание, что в отличие от [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders") и [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk"), эта функция не добавляет разделители между пространством имен и ключом-плейсхолдера. Используйте [toPlaceholders()](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders") при работе с многомерными массивами или объектами с переменными, отличными от скаляров, поэтому каждый уровень разделяется разделителем.

## Синтаксис

API Doc: [modX::setPlaceholders()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setPlaceholders())

``` php
void setPlaceholders (array|object  $placeholders, [string $namespace = ''])
```

В отличие от `getChunk`, массив `$placeholder` может не быть глубоко вложенным. Это должен быть простой ассоциативный массив.

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
