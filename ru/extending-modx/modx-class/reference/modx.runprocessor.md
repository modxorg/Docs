---
title: "modX.runProcessor"
_old_id: "1098"
translation: "extending-modx/modx-class/reference/modx.runprocessor"
---

## modX::runProcessor

Загружает и запускает определенный процессор. Метод принимает 3 аргумента:

- `action` - Действие, которое нужно выполнить (процессор для запуска), это путь к процессору (без расширения файла), действительный для каталога `core/model/modx/processors/` (по умолчанию).
- `scriptProperties` - Массив свойств, передаваемых процессору.
- `options` - Массив опций передается процессору.
    - _processors\_path_ - Если указано, будет переопределять путь процессоров MODX по умолчанию (`core/model/modx/processors/`), где MODX ищет процессор. Это полезно, если вы пишете свои собственные процессоры и размещаете их, например, в вашем каталоге `core/components/yourextra/processors/`.

Этот метод заменяет `$modX->executeProcessor()` до версии 2.1

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::runProcessor()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::runProcessor())

``` php
mixed runProcessor(string $action = '', array $scriptProperties = array(), array $options = array())
```

## Пример

Запустите процессор создания ResourceGroup:

``` php
// Cоздать новую группу ресурсов программно
$response = $modx->runProcessor('security/resourcegroup/create', array(
    'name' => 'Test', // название новой группы ресурсов
    'access_contexts' => 'mgr,web', // контекст(ы) новой группы ресурсов ограничивает доступ в
    'access_admin' => 1, // добавляет доступ к этой группе ресурсов, доступ к этой группе ресурсов для Administrators
    'access_parallel' => 1, // создает новую группу пользователей "Test" параллельно с группой ресурсов
    'access_usergroups' => 'Editors', // добавляет доступ к новой группе ресурсов для группы пользователей "Editors"
));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [Using runProcessor](extending-modx/processors/using-runprocessor)
