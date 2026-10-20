---
title: "Политика Администратора"
translation: "building-sites/client-proofing/security/policies/permissions/administrator-policy"
description: "Политика администратора MODX и полный список её разрешений."
---

## Политика Администратора

Эта политика упакована в MODX и предоставляется пользователям в контексте mgr, которые хотят иметь полный доступ к управлению содержимым MODX

## Разрешения по умолчанию

| название | Описание доступа |
| --- | --- |
| about | О странице. |
| access_permissions | Любые связанные с разрешением доступа страницы и действия. |
| actions | Страница [действий](extending-modx/menus/actions "Действия и меню") . |
| change_password | Пользователь может изменить свой пароль пользователя. |
| change_profile | Пользователь может изменить свой профиль. |
| charsets | Видеть список кодировок. |
| class_map | Видеть список классов в карте классов. |
| components | Видеть меню «Пакеты». |
| content_types | Страница «Типы содержимого». |
| countries | Смотреть список стран. |
| create | Базовый «создать» доступ к объектам. |
| credits | Просмотрите страницу «Кредиты». |
| customize_forms | Просмотр и управление [настройкой](building-sites/client-proofing/form-customization "Настройка менеджера") страницы [менеджера](building-sites/client-proofing/form-customization "Настройка менеджера") . |
| dashboards | Просмотр и управление панелями. Пункт в верхнем меню — «Панели управления». |
| database | Страница Информация о системе |
| database_truncate | Возможность усекать таблицу базы данных. |
| delete_category | Удалить или удалить любые Категории. |
| delete_chunk | Удалить или удалить любые [чанки](building-sites/elements/chunks "Куски") . |
| delete_context | Удалить или удалить любые [контексты](building-sites/contexts "Контексты") . |
| delete_document | Удалить или удалить любые [Ресурсы](building-sites/resources "Ресурсы") . |
| delete_eventlog | Очистить журнал событий. |
| delete_plugin | Удалить или удалить любые [плагины](extending-modx/plugins "Плагины") . |
| delete_propertyset | Отключать и удалять наборы параметров. |
| delete_role | Удалить или удалить любые [роли](building-sites/client-proofing/security/roles "Роли") . |
| delete_snippet | Удалить или удалить любые [сниппеты](extending-modx/snippets "обрывки") . |
| delete_static_resource | Для удаления или отключения статического ресурса требуется разрешение "delete_document". |
| delete_symlink | Для удаления или отключения символической ссылки требуется разрешение "delete_document". |
| delete_template | Удалить или удалить любые [шаблоны](building-sites/elements/templates "Шаблоны") . |
| delete_tv | Удалить или удалить любые [переменные шаблона](building-sites/elements/template-variables "Переменные шаблона") . |
| delete_user | Удалить или удалить любого [пользователя](building-sites/client-proofing/security/users "пользователей") . |
| delete_weblink | Для удаления или отключения ссылки требуется разрешение "delete_document". |
| directory_chmod | Изменять права доступа (chmod) к каталогам. |
| directory_create | Создавать каталоги в файловой системе. |
| directory_list | Видеть список подкаталогов для каталога в файловой системе. |
| directory_remove | Удалять папки в файловой системе. |
| directory_update | Переименовывать каталоги в файловой системе. |
| edit_category | Для редактирования любых категорий. |
| edit_chunk | Для редактирования любых [чанков](building-sites/elements/chunks "Куски") . |
| edit_context | Для редактирования любых [контекстов](building-sites/contexts "Контексты") . |
| edit_document | Для редактирования любых [ресурсов](building-sites/resources "Ресурсы") . |
| edit_locked | Позволяет пользователю отменять блокировку и редактировать заблокированный ресурс. |
| edit_plugin | Для редактирования любых [плагинов](extending-modx/plugins "Плагины") . |
| edit_propertyset | Редактировать наборы параметров. |
| edit_role | Редактировать любые [роли](building-sites/client-proofing/security/roles "Роли") . |
| edit_snippet | Для редактирования любых [сниппетов](extending-modx/snippets "обрывки") . |
| edit_static_resource | Для редактирования статических ресурсов требуется разрешение "edit_document". |
| edit_symlink | Для редактирования символических ссылок требуется разрешение "edit_document". |
| edit_template | Для редактирования любых [шаблонов](building-sites/elements/templates "Шаблоны") . |
| edit_tv | Для редактирования любых [переменных шаблона](building-sites/elements/template-variables "Переменные шаблона") . |
| edit_user | Для редактирования любого [пользователя](building-sites/client-proofing/security/users "пользователей") . |
| edit_weblink | Для редактирования ссылок требуется разрешение "edit_document". |
| element_tree | Возможность просмотра дерева элементов на левой панели. |
| empty_cache | Очистить кеш сайта. |
| error_log_erase | Очищать журнал ошибок. |
| error_log_view | Просматривать журнал ошибок. |
| events | Видеть Системные события. |
| export_static | Для экспорта сайта в статический HTML. |
| file_create | Создавать файлы. |
| file_list | Видеть список файлов в папках. |
| file_manager | Использовать файловый менеджер, в том числе создание / удаление файлов. |
| file_remove | Удалять файлы в файловой системе. |
| file_tree | Для просмотра дерева файлов на левой панели. |
| file_unpack | Распаковать zip-архивы. |
| file_update | Редактирование содержимого физических файлов. <strong>ВНИМАНИЕ: дает возможность выполнить произвольный код на сервере.</strong> |
| file_upload | Загружать файлы в папку. |
| file_view | Просматривать содержимое файла. |
| flush_sessions | Может сбрасывать сеансы по всему сайту. |
| frames | Чтобы использовать интерфейс диспетчера MODX на всех. |
| help | Для просмотра страницы справки. |
| home | Для просмотра страницы приветствия. |
| language | Переключать текущий язык в панели управления. |
| languages | Редактировать или просматривать лексикон Языки. |
| lexicons | Для редактирования или просмотра лексиконов и [интернационализации](extending-modx/internationalization "интернационализация") . |
| list | Базовое разрешение «перечислить» любой объект. Список означает получить коллекцию объектов. |
| load | Базовое разрешение «загрузить» любой объект или иметь возможность вернуть его как экземпляр вообще. |
| logout | Чтобы можно было выйти из системы как пользователь. |
| menu_reports | Показывать в главном меню пункт «Отчёты». |
| menu_security | Показывать в главном меню пункт «Безопасность», не используется. |
| menu_site | Показывать в главном меню пункт «Содержимое». |
| menu_support | Показывать в главном меню пункт «Поддержка», не используется. |
| menu_system | Показывать в главном меню пункт «Система», не используется. |
| menu_tools | Показывать в главном меню пункт «Управление». |
| menu_trash | Показывать в главном меню пункт «Корзина». |
| menu_user | Показывать в главном меню пункт «Пользователь». |
| menus | Для редактирования или сохранения любых топовых пунктов меню. |
| messages | Для отправки или просмотра любых личных сообщений. |
| mgr_log_erase | Очищать журнал системы управления. |
| mgr_log_view | Видеть журнал системы управления. |
| namespaces | Для редактирования или просмотра [пространств имен](extending-modx/namespaces "Пространства имен") . |
| new_category | Создать новую категорию. |
| new_chunk | Создать новый [чанк](building-sites/elements/chunks "Куски") . |
| new_context | Создать новый [контекст](building-sites/contexts "Контексты") . |
| new_document | Для создания новых [ресурсов](building-sites/resources "Ресурсы") . |
| new_document_in_root | Создавать [ресурс](building-sites/resources "Ресурсы") в корне сайта. Заменяет удалённую настройку `udperms_allowroot`. |
| new_plugin | Создать новый [плагин](extending-modx/plugins "Плагины") . |
| new_propertyset | Создавать наборы параметров. |
| new_role | Создать новую [роль](building-sites/client-proofing/security/roles "Роли") . |
| new_snippet | Создать новый [сниппет](extending-modx/snippets "обрывки") . |
| new_static_resource | Создавать статичные ресурсы. |
| new_symlink | Создавать символические ссылки. |
| new_template | Создать новый [шаблон](building-sites/elements/templates "Шаблоны") . |
| new_tv | Создать новую [переменную шаблона](building-sites/elements/template-variables "Переменные шаблона") . |
| new_user | Создать нового [пользователя](building-sites/client-proofing/security/users "пользователей") . |
| new_weblink | Создавать новые веб-ссылки. |
| packages | Использовать любые транспортные пакеты в системе [управления](extending-modx/transport-packages "Управление пакетами") пакетами. |
| policy_delete | Удалять политики доступа. |
| policy_edit | Редактирование политик доступа. <strong>ВНИМАНИЕ: в сочетании с разрешением policy_save, предоставляет возможность повышения привилегий, включая права, связанные с безопасностью.</strong> |
| policy_new | Создавать новые политики доступа. |
| policy_save | Сохранять политики доступа. |
| policy_template_delete | Удалять шаблоны политик доступа. |
| policy_template_edit | Редактировать шаблоны политик доступа. |
| policy_template_new | Создавать шаблоны политик доступа. |
| policy_template_save | Сохранять шаблоны политик доступа. |
| policy_template_view | Просматривать шаблоны политик доступа. |
| policy_view | Просматривать политики доступа. |
| property_sets | Для просмотра и редактирования [свойств и наборов свойств](building-sites/properties-and-property-sets "Свойства и наборы свойств") . |
| providers | Смотреть и изменять поставщиков пакетов. |
| publish_document | Опубликовать или отменить публикацию любого ресурса. В UI менеджера проверка идёт на контексте **`mgr`** через `hasPermission('publish_document')`. Выдача только на другом контексте кнопки публикации не откроет. См. [ACL](building-sites/client-proofing/security/policies/acls#публикация-в-менеджере-и-несколько-групп). |
| purge_deleted | Чтобы очистить корзину. |
| remove | Основное разрешение на удаление любого объекта. |
| remove_locks | Удалить все существующие блокировки по всему сайту. |
| resource_duplicate | Создавать копию Ресурса. |
| resource_quick_create | Использовать «Быстро создать Ресурс» в дереве ресурсов слева. |
| resource_quick_update | Использовать «Быстро редактировать ресурс» в контекстном меню. |
| resource_tree | Для просмотра дерева ресурсов в левой навигационной панели. |
| resourcegroup_delete | Удалять Группы ресурсов. |
| resourcegroup_edit | Редактировать Группы ресурсов. |
| resourcegroup_new | Создавать новые Группы ресурсов. |
| resourcegroup_resource_edit | Редактировать Ресурсы в Группе ресурсов. |
| resourcegroup_resource_list | Просматривать Ресурсы в Группе ресурсов. |
| resourcegroup_save | Сохранять Группы ресурсов. |
| resourcegroup_view | Просматривать Группы ресурсов. |
| save | Базовое разрешение на сохранение любого объекта. |
| save_category | Чтобы сохранить любые категории. |
| save_chunk | Чтобы сохранить любые [куски](building-sites/elements/chunks "Куски") . |
| save_context | Сохранить любой [контекст](building-sites/contexts "Контексты") . |
| save_document | Чтобы сохранить любые [ресурсы](building-sites/resources "Ресурсы") . |
| save_plugin | Чтобы сохранить любые [плагины](extending-modx/plugins "Плагины") . |
| save_propertyset | Сохранять Наборы параметров. |
| save_role | Чтобы сохранить любые [роли](building-sites/client-proofing/security/roles "Роли") . |
| save_snippet | Чтобы сохранить любые [сниппеты](extending-modx/snippets "обрывки") . |
| save_template | Сохранить любые [шаблоны](building-sites/elements/templates "Шаблоны") . |
| save_tv | Сохранить любые [переменные шаблона](building-sites/elements/template-variables "Переменные шаблона") . |
| save_user | Сохранить любого [пользователя](building-sites/client-proofing/security/users "пользователей") . |
| search | Чтобы использовать страницу поиска. |
| set_sudo | Сделать любого пользователя Суперпользователем. |
| settings | Для просмотра и редактирования любых настроек системы. |
| source_delete | Удалять Источник файлов. |
| source_edit | Редактировать Источник файлов. |
| source_save | Создавать и сохранять Источник файлов. |
| source_view | Видеть Источник файлов. |
| sources | Управлять Источниками файлов и Типами источников файлов. |
| steal_locks | Чтобы «украсть» блокировки, переопределяя текущую блокировку документа. |
| tree_show_element_ids | Показывать ID в Дереве элементов. |
| tree_show_resource_ids | Показывать ID в Дереве ресурсов. |
| undelete_document | Возможность отменять удаление Ресурсов. |
| unlock_element_properties | Чтобы иметь возможность редактировать свойства по умолчанию для любого элемента. |
| unpublish_document | Отменять публикацию ресурсов. |
| usergroup_delete | Удалять Группы пользователей. |
| usergroup_edit | Редактирование групп пользователей. <strong>ВНИМАНИЕ: раскрывает настройки UserGroup, которые могут переопределить параметры системы, связанные с безопасностью, такие как загружаемые типы файлов и учетные данные API.</strong> |
| usergroup_new | Создавать новые Группы пользователей. |
| usergroup_save | Сохранять Группы пользователей. |
| usergroup_user_edit | Редактировать Пользователей в Группе пользователей. |
| usergroup_user_list | Видеть список Пользователей в Группе пользователей. |
| usergroup_view | Просматривать Группы пользователей. |
| view | Базовое разрешение на «просмотр» любого объекта. |
| view_category | Для просмотра любых категорий. |
| view_chunk | Для просмотра любых [чанков](building-sites/elements/chunks "Куски") . |
| view_context | Для просмотра любых [контекстов](building-sites/contexts "Контексты") . |
| view_document | Для просмотра любых [ресурсов](building-sites/resources "Ресурсы") . |
| view_element | Получать список Элементов или Классов элементов. |
| view_eventlog | Для просмотра журнала событий. |
| view_offline | Просматривать сайт, если он находится режиме офлайна. |
| view_plugin | Для просмотра любых [плагинов](extending-modx/plugins "Плагины") . |
| view_propertyset | Просматривать Наборы параметров. |
| view_role | Для просмотра любых [ролей](building-sites/client-proofing/security/roles "Роли") . |
| view_snippet | Для просмотра любых [сниппетов](extending-modx/snippets "обрывки") . |
| view_sysinfo | Просматривать страницу информации о системе. |
| view_template | Для просмотра любых [шаблонов](building-sites/elements/templates "Шаблоны") . |
| view_tv | Для просмотра любых [переменных шаблона](building-sites/elements/template-variables "Переменные шаблона") . |
| view_unpublished | Для просмотра любых неопубликованных [ресурсов](building-sites/resources "Ресурсы") . |
| view_user | Для просмотра любой [пользователь](building-sites/client-proofing/security/users "пользователей") . |
| workspaces | Использовать [управление пакетами](extending-modx/transport-packages "Управление пакетами") . |

## Пользовательские разрешения

Если вы создали свои собственные действия и пункты меню [страницу настраиваемого менеджера](extending-modx/custom-manager-pages "Пользовательский менеджер страниц Учебникl"), то вы можете определить настраиваемые элементы разрешений при создании элемента меню (Система -> Действия -> Создать меню), который соответствует разрешения перечислены здесь.

![](modx+custom+permission.jpg)

## Смотрите также

1. [Разрешения - Политика администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
2. [Разрешения - Ресурсная политика](building-sites/client-proofing/security/policies/permissions/resource-policy)