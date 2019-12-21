---
title: "modX.toPlaceholders"
translation: "extending-modx/modx-class/reference/modx.toplaceholders"
---

## modX::toPlaceholders

Устанавливает плейсхолдеры из значений, хранящихся в массивах и объектах.

Каждый рекурсивный уровень в массиве `$placeholder` добавляет префикс, создавая путь доступа с использованием необязательного разделителя.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::toPlaceholders()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::toPlaceholders())

``` php
array toPlaceholders (array|object  $subject, [string $prefix = ''], [string $separator = '.'], [boolean $restore = false])
```

## Пример

Установите массив заполнителей и префикс «my». Возвращает многомерный массив, содержащий до двух элементов: «keys», который всегда содержит массив ключей-заполнителей, которые были установлены, и при необходимости, если для параметра restore задано значение true, «restore», содержащий массив значений-заполнителей, которые были перезаписаны метод.

``` php
$modx->toPlaceholders(array(
  'name' => 'John',
  'email' => 'jdoe@gmail.com',
),'my');
```

## Пример с вложенными плейсхолдерами

Использование вложенных данных в качестве `$placeholders`:

``` php
$modx->toPlaceholders(array(
  'document' => array('pagetitle' => 'My Page')
));
```

Соответствует плейсхолдерам, таким как `[[+ document.pagetitle]]`
Обратите внимание, что использование префикса $ во вложенных заполнителях добавляет префикс $ в начало _each key_. Например:

``` php
$modx->toPlaceholders(
  array(
    'test' => 'this',
    'document' => array('pagetitle' => 'My Page')
  ), 'tmp'
);
```

Будет иметь плейсхолдеры, такие как `[[+tmp.test]]` и `[[+tmp.document.pagetitle]]`

## Смотрите также

- [modX.toPlaceholder](extending-modx/modx-class/reference/modx.toplaceholder "modX.toPlaceholder")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.setPlaceholders](extending-modx/modx-class/reference/modx.setplaceholders "modX.setPlaceholders")
- [modX.getPlaceholder](extending-modx/modx-class/reference/modx.getplaceholder "modX.getPlaceholder")
