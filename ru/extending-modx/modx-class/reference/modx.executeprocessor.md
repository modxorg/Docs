---
title: "modX.executeProcessor"
translation: "extending-modx/modx-class/reference/modx.executeprocessor"
---

## modX::executeProcessor

Этот метод удаляется в 2.1 и заменяется `$modX->runProcessor`

Выполняет определенный процессор. Единственным аргументом является массив, который может принимать следующие значения:

- `action` - действие, которое необходимо выполнить, аналогичное обработке соединителя.
- `processors_path` - если указано, переопределит путь к процессорам MODX по умолчанию.
- `location` - префикс для загрузки файлов процессора, будет предшествовать параметру действия.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::runProcessor()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::runProcessor())

``` php
mixed executeProcessor (array $options)
```

## Пример

Выполнение процессора для получения списка контекста

``` php
$modx->executeProcessor(array(
    'location' => 'context',
    'action' => 'getList',
));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
