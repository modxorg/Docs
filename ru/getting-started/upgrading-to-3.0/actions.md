---
title: "modAction и связанные"
translation: "getting-started/upgrading-to-3.0/actions"
---

`modAction` и `modAccessAction` удалены в MODX 3 (см. [Удалённые объекты](#удаленные-объекты) ниже); `modActionDom`, `modAccessActionDom`, `modActionField` и таблицы `actiondom` / `access_actiondom` / `actions_fields` остались и по-прежнему используются правилами Form Customization. Вместе с этим была выполнена очистка классов `modManagerResponse` и `modManagerController`.

Это означает, что URL-адреса менеджера в виде `/manager/?a=15` (где `15` — это идентификатор действия) больше не будут работать. Дополнения, которые на них полагаются, должны перейти на маршрутизацию на основе пространства имён в форме `/manager/?namespace=myextra&a=action`. Страница, на которую попадает пользователь после входа, задаётся настройками `welcome_action` и `welcome_namespace`.

Для некоторых дополнений это может потребовать переписывания контроллеров. Для других достаточно просто изменить определение меню (в Admin > Меню).

## Удален: `MODx.action` (JavaScript)

`MODx.action` переменная javascript в менеджере больше недоступна и может вызвать ошибку при доступе без проверки, существует ли она.

## Удален: `modX::$actionMap`

С удалением действий `actionMap` больше не служит цели и был удален.

## Удален: `modCacheManager::generateActionMap()`

Вместе с `modX::$actionMap`, метод, который его генерирует, `modCacheManager::generateActionMap()` также был удален.

## Удален: `modManagerRequest::loadActionMap()`

Использовался для заполнения `modX::$actionMap`, был удален.

## Изменено: параметры переданы в событие OnBeforeManagerPageInit

Раньше [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit) получал параметр `$action` в виде массива. Теперь событие получает массив конфигурации контроллера со следующими ключами:

-   `namespace` пространство имён для запроса
-   `namespace_path` (core-)путь для пространства имён
-   `action` роутер/действие в пространстве имён
-   `controller` имя контроллера, выбранное для запроса

## Удалена: константа `MODX_INCLUDES_PATH`

Не известно использование этой константы, поэтому она была удалена.

## Изменено: выбрасывание исключений

При инициализации контроллера вы можете теперь выдать новое исключение `MODX\Revolution\Controllers\Exceptions\NotFoundException` или `MODX\Revolution\Controllers\Exceptions\AccessDeniedException`. Они будут обработаны классом `modManagerResponse`, чтобы показать более приятную страницу с ошибкой.

Обязательно предоставьте полезное сообщение в исключении.

Это также поддерживает возврат ложного y возвращаемого значения из `modManagerController::checkPermissions`, но это не позволяет предоставлять настраиваемое сообщение, если вы сами не выбросите исключение.

`\Exception`s и `\Error`s вызванный рендерингом контроллера, также будет пойман теперь.

## Удалены: `loadControllerClass` и `instantiateController` в `modManagerResponse`

Поскольку логика загрузки контроллеров была изменена в `modManagerResponse`, методы `loadControllerClass` и `instantiateController` были удалены.

Теперь контроллеры могут лежать в автозагружаемом пространстве имён `\MODX\Revolution\Controllers\`: `getControllerClassName()` сначала ищет `\MODX\Revolution\Controllers\{action}` и только потом — на файловой системе в `{namespace_path}/controllers/`. Если класс контроллера автозагружается там, дополнительная настройка не нужна.

Некоторые подписи немного изменились:

-   `checkForMenuPermissions(string $action): bool` теперь определяет тип параметра `string` и тип возвращаемого значения `bool`
-   `getControllerClassName(string $action): string` теперь требует предоставления `$action` и либо возвращает строку, либо выдает `NotFoundException`.

## Удаленные объекты

-   `modAccessAction` (таблица `access_actions`)
-   `modAction` (таблица `actions`)
