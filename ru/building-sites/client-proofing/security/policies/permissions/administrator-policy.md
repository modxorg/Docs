---
title: Политика Администратора
translation: building-sites/client-proofing/security/policies/permissions/administrator-policy
---

## Политика Администратора

Эта политика упакована в MODX и предоставляется пользователям в контексте mgr, которые хотят иметь полный доступ к управлению содержимым MODX

## Разрешения по умолчанию

| название                  | Описание доступа                                                                                                                                                                                            |
| ------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| about                     | О странице.                                                                                                                                                                                                 |
| access_permissions        | Любые связанные с разрешением доступа страницы и действия.                                                                                                                                                  |
| action_ok                 |
| actions                   | Страница [действий](extending-modx/menus/actions "Действия и меню") .                                                                                                                                       |
| change_password           | Пользователь может изменить свой пароль пользователя.                                                                                                                                                       |
| change_profile            | Пользователь может изменить свой профиль.                                                                                                                                                                   |
| Content_Types             | Страница [типов контента](building-sites/resources/content-types "Типы контента") .                                                                                                                         |
| create                    | Базовый «создать» доступ к объектам.                                                                                                                                                                        |
| credits                   | Просмотрите страницу «Кредиты».                                                                                                                                                                             |
| customize_forms           | Просмотр и управление [настройкой](building-sites/client-proofing/form-customization "Настройка менеджера") страницы [менеджера](building-sites/client-proofing/form-customization "Настройка менеджера") . |
| database                  | Страница Информация о системе                                                                                                                                                                               |
| database_truncate         | Возможность усекать таблицу базы данных.                                                                                                                                                                    |
| delete_category           | Удалить или удалить любые Категории.                                                                                                                                                                        |
| delete_chunk              | Удалить или удалить любые [чанки](building-sites/elements/chunks "Куски") .                                                                                                                                 |
| delete_context            | Удалить или удалить любые [контексты](building-sites/contexts "Контексты") .                                                                                                                                |
| delete_document           | Удалить или удалить любые [Ресурсы](building-sites/resources "Ресурсы") .                                                                                                                                   |
| delete_eventlog           | Очистить журнал событий.                                                                                                                                                                                    |
| delete_plugin             | Удалить или удалить любые [плагины](extending-modx/plugins "Плагины") .                                                                                                                                     |
| delete_snippet            | Удалить или удалить любые [фрагменты](extending-modx/snippets "обрывки") .                                                                                                                                  |
| delete_template           | Удалить или удалить любые [шаблоны](building-sites/elements/templates "Шаблоны") .                                                                                                                          |
| delete_tv                 | Удалить или удалить любые [переменные шаблона](building-sites/elements/template-variables "Переменные шаблона") .                                                                                           |
| delete_role               | Удалить или удалить любые [роли](building-sites/client-proofing/security/roles "Роли") .                                                                                                                    |
| delete_user               | Удалить или удалить любого [пользователя](building-sites/client-proofing/security/users "пользователей") .                                                                                                  |
| edit_category             | Для редактирования любых категорий.                                                                                                                                                                         |
| edit_chunk                | Для редактирования любых [чанков](building-sites/elements/chunks "Куски") .                                                                                                                                 |
| edit_context              | Для редактирования любых [контекстов](building-sites/contexts "Контексты") .                                                                                                                                |
| edit_document             | Для редактирования любых [ресурсов](building-sites/resources "Ресурсы") .                                                                                                                                   |
| edit_locked               | Позволяет пользователю отменять блокировку и редактировать заблокированный ресурс.                                                                                                                          |
| edit_parser               |
| edit_plugin               | Для редактирования любых [плагинов](extending-modx/plugins "Плагины") .                                                                                                                                     |
| edit_role                 | Редактировать любые [роли](building-sites/client-proofing/security/roles "Роли") .                                                                                                                          |
| edit_snippet              | Для редактирования любых [фрагментов](extending-modx/snippets "обрывки") .                                                                                                                                  |
| edit_template             | Для редактирования любых [шаблонов](building-sites/elements/templates "Шаблоны") .                                                                                                                          |
| edit_tv                   | Для редактирования любых [переменных шаблона](building-sites/elements/template-variables "Переменные шаблона") .                                                                                            |
| edit_user                 | Для редактирования любого [пользователя](building-sites/client-proofing/security/users "пользователей") .                                                                                                   |
| element_tree              | Возможность просмотра дерева элементов на левой панели.                                                                                                                                                     |
| empty_cache               | Очистить кеш сайта.                                                                                                                                                                                         |
| export_static             | Для экспорта сайта в статический HTML.                                                                                                                                                                      |
| file_manager              | Использовать файловый менеджер, в том числе создание / удаление файлов.                                                                                                                                     |
| file_tree                 | Для просмотра дерева файлов на левой панели.                                                                                                                                                                |
| flush_sessions            | Может сбрасывать сеансы по всему сайту.                                                                                                                                                                     |
| frames                    | Чтобы использовать интерфейс диспетчера MODX на всех.                                                                                                                                                       |
| help                      | Для просмотра страницы справки.                                                                                                                                                                             |
| home                      | Для просмотра страницы приветствия.                                                                                                                                                                         |
| import_static             | Для просмотра или использования страниц импорта.                                                                                                                                                            |
| languages                 | Редактировать или просматривать лексикон Языки.                                                                                                                                                             |
| lexicons                  | Для редактирования или просмотра лексиконов и [интернационализации](extending-modx/internationalization "интернационализация") .                                                                            |
| list                      | Базовое разрешение «перечислить» любой объект. Список означает получить коллекцию объектов.                                                                                                                 |
| load                      | Базовое разрешение «загрузить» любой объект или иметь возможность вернуть его как экземпляр вообще.                                                                                                         |
| logout                    | Чтобы можно было выйти из системы как пользователь.                                                                                                                                                         |
| logs                      | Для просмотра журналов, таких как ошибки и журналы менеджера.                                                                                                                                               |
| menus                     | Для редактирования или сохранения любых топовых пунктов меню.                                                                                                                                               |
| messages                  | Для отправки или просмотра любых личных сообщений.                                                                                                                                                          |
| namespaces                | Для редактирования или просмотра [пространств имен](extending-modx/namespaces "Пространства имен") .                                                                                                        |
| new_category              | Создать новую категорию.                                                                                                                                                                                    |
| new_chunk                 | Создать новый [чанк](building-sites/elements/chunks "Куски") .                                                                                                                                              |
| new_context               | Создать новый [контекст](building-sites/contexts "Контексты") .                                                                                                                                             |
| new_document              | Для создания новых [ресурсов](building-sites/resources "Ресурсы") .                                                                                                                                         |
| new_plugin                | Создать новый [плагин](extending-modx/plugins "Плагины") .                                                                                                                                                  |
| new_role                  | Создать новую [роль](building-sites/client-proofing/security/roles "Роли") .                                                                                                                                |
| new_snippet               | Создать новый [фрагмент](extending-modx/snippets "обрывки") .                                                                                                                                               |
| new_template              | Создать новый [шаблон](building-sites/elements/templates "Шаблоны") .                                                                                                                                       |
| new_tv                    | Создать новую [переменную шаблона](building-sites/elements/template-variables "Переменные шаблона") .                                                                                                       |
| new_user                  | Создать нового [пользователя](building-sites/client-proofing/security/users "пользователей") .                                                                                                              |
| packages                  | Использовать любые транспортные пакеты в системе [управления](extending-modx/transport-packages "Управление пакетами") пакетами.                                                                            |
| property_sets             | Для просмотра и редактирования [свойств и наборов свойств](building-sites/properties-and-property-sets "Свойства и наборы свойств") .                                                                       |
| провайдеры                | Для просмотра и редактирования [провайдеров](building-sites/extras/providers "Провайдеры") по всему сайту.                                                                                                  |
| publish_document          | Опубликовать или отменить публикацию любого ресурса.                                                                                                                                                        |
| purge_deleted             | Чтобы очистить корзину.                                                                                                                                                                                     |
| remove                    | Основное разрешение на удаление любого объекта.                                                                                                                                                             |
| remove_locks              | Удалить все существующие блокировки по всему сайту.                                                                                                                                                         |
| resource_tree             | Для просмотра дерева ресурсов в левой навигационной панели.                                                                                                                                                 |
| save                      | Базовое разрешение на сохранение любого объекта.                                                                                                                                                            |
| save_category             | Чтобы сохранить любые категории.                                                                                                                                                                            |
| save_chunk                | Чтобы сохранить любые [куски](building-sites/elements/chunks "Куски") .                                                                                                                                     |
| save_context              | Сохранить любой [контекст](building-sites/contexts "Контексты") .                                                                                                                                           |
| save_document             | Чтобы сохранить любые [ресурсы](building-sites/resources "Ресурсы") .                                                                                                                                       |
| save_plugin               | Чтобы сохранить любые [плагины](extending-modx/plugins "Плагины") .                                                                                                                                         |
| save_role                 | Чтобы сохранить любые [роли](building-sites/client-proofing/security/roles "Роли") .                                                                                                                        |
| save_snippet              | Чтобы сохранить любые [фрагменты](extending-modx/snippets "обрывки") .                                                                                                                                      |
| save_template             | Сохранить любые [шаблоны](building-sites/elements/templates "Шаблоны") .                                                                                                                                    |
| save_tv                   | Сохранить любые [переменные шаблона](building-sites/elements/template-variables "Переменные шаблона") .                                                                                                     |
| save_user                 | Сохранить любого [пользователя](building-sites/client-proofing/security/users "пользователей") .                                                                                                            |
| search                    | Чтобы использовать страницу поиска.                                                                                                                                                                         |
| settings                  | Для просмотра и редактирования любых настроек системы.                                                                                                                                                      |
| steal_locks               | Чтобы «украсть» блокировки, переопределяя текущую блокировку документа.                                                                                                                                     |
| unlock_element_properties | Чтобы иметь возможность редактировать свойства по умолчанию для любого элемента.                                                                                                                            |
| view                      | Базовое разрешение на «просмотр» любого объекта.                                                                                                                                                            |
| view_category             | Для просмотра любых категорий.                                                                                                                                                                              |
| view_chunk                | Для просмотра любых [чанков](building-sites/elements/chunks "Куски") .                                                                                                                                      |
| view_context              | Для просмотра любых [контекстов](building-sites/contexts "Контексты") .                                                                                                                                     |
| view_document             | Для просмотра любых [ресурсов](building-sites/resources "Ресурсы") .                                                                                                                                        |
| view_eventlog             | Для просмотра журнала событий.                                                                                                                                                                              |
| view_offline              |
| view_plugin               | Для просмотра любых [плагинов](extending-modx/plugins "Плагины") .                                                                                                                                          |
| view_role                 | Для просмотра любых [ролей](building-sites/client-proofing/security/roles "Роли") .                                                                                                                         |
| view_snippet              | Для просмотра любых [сниппетов](extending-modx/snippets "обрывки") .                                                                                                                                        |
| view_template             | Для просмотра любых [шаблонов](building-sites/elements/templates "Шаблоны") .                                                                                                                               |
| view_tv                   | Для просмотра любых [переменных шаблона](building-sites/elements/template-variables "Переменные шаблона") .                                                                                                 |
| view_unpublished          | Для просмотра любых неопубликованных [ресурсов](building-sites/resources "Ресурсы") .                                                                                                                       |
| view_user                 | Для просмотра любой [пользователь](building-sites/client-proofing/security/users "пользователей") .                                                                                                         |
| workspaces                | Использовать [управление пакетами](extending-modx/transport-packages "Управление пакетами") .                                                                                                               |

## Пользовательские разрешения

Если вы создали свои собственные действия и пункты меню [страницу настраиваемого менеджера](extending-modx/custom-manager-pages "Пользовательский менеджер страниц Учебникl"), то вы можете определить настраиваемые элементы разрешений при создании элемента меню (Система -> Действия -> Создать меню), который соответствует разрешения перечислены здесь.

![](/2.x/en/building-sites/client-proofing/security/policies/permissions/modx+custom+permission.jpg)

## Смотрите также

1. [Разрешения - Политика администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
2. [Разрешения - Ресурсная политика](building-sites/client-proofing/security/policies/permissions/resource-policy)
