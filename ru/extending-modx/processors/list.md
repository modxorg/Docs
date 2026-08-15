---
title: "Список процессоров ядра"
translation: "extending-modx/processors/list"
description: "Каталог процессоров ядра MODX 3.x: action-пути, краткие описания и permissions"
---

## Список процессоров ядра (MODX 3.x)

Ниже: **вызываемые процессоры ядра** из `core/src/Revolution/Processors/`. Для [`modX::runProcessor`](extending-modx/modx-class/reference/modx.runprocessor) используйте путь со слэшем (`resource/create`) или namespaced-класс (`\\MODX\\Revolution\\Processors\\Resource\\Create`).

Заметки:

- Описания переведены с docblock классов и свойства `$permission` в MODX Revolution **3.x**. Термины ACL, FC (Form Customization), TV, Media Source оставлены как в ядре.
- Не включены абстрактные базы, хелперы `Model\\*Processor` и Template Variable Configs/Renders (куски UI менеджера, обычно не цели для `runProcessor`).
- У Template Variables каталог: `Element/TemplateVar/`. Путь `element/templatevar/` резолвится. Устаревший `element/tv/` лоадер переписывает в TemplateVar.
- Permission: свойство `$permission` класса, если задано. Пустая ячейка значит, что свойства нет (проверка прав может быть в `checkPermissions()` или в другом месте).
- Нужные поля у каждого процессора свои. Если валидация падает, откройте файл класса.

В каталоге: **379** процессоров.

См. также: [Процессоры](extending-modx/processors), [Использование runProcessor](extending-modx/processors/using-runprocessor).

## Browser (файлы и каталоги)

_16 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `browser/directory/create` | Создаёт каталог. | `directory_create` |
| `browser/directory/getfiles` | Получает все файлы в каталоге | `file_list` |
| `browser/directory/getlist` | Получает список каталогов и файлов, отсортировав их сначала по папке/файлу, а затем по алфавиту. | `directory_list` |
| `browser/directory/remove` | Удаляет каталог | `directory_remove` |
| `browser/directory/rename` | Переименовывает каталог | `directory_update` |
| `browser/directory/sort` | Сортирует каталог. | `directory_update` |
| `browser/directory/update` | Переименовывает каталог. |  |
| `browser/file/create` | Создаёт файл. | `file_create` |
| `browser/file/download` | Отправляет файл пользователю | `file_view` |
| `browser/file/get` | Получает содержимое файла | `file_view` |
| `browser/file/remove` | Удаляет файл. | `file_remove` |
| `browser/file/rename` | Переименовывает файл | `file_update` |
| `browser/file/unpack` | Распаковывает архивы, на данный момент только zip | `file_unpack` |
| `browser/file/update` | Обновляет файл. | `file_update` |
| `browser/file/upload` | Загружает файлы в каталог | `file_upload` |
| `browser/visibility` | Устанавливает видимость каталога или файла | `directory_chmod` |

## Context

_19 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `context/create` | Создаёт контекст | `new_context` |
| `context/duplicate` | Дублирует контекст. | `new_context` |
| `context/get` | Получает контекст. | `view_context` |
| `context/getlist` | Получает список контекстов. | `view_context` |
| `context/group/create` | Создаёт контекстную группу. | `new_context` |
| `context/group/get` | Получает контекстную группу. | `view_context` |
| `context/group/getlist` | Получает список контекстных групп. | `view_context` |
| `context/group/remove` | Удаляет группу контекстов и снимает назначение ее контекстов. | `delete_context` |
| `context/group/update` | Обновляет группу контекста. | `edit_context` |
| `context/group/updatefromgrid` | Обновляет группу контекста из строки сетки (данные JSON). |  |
| `context/remove` | Удаляет контекст | `delete_context` |
| `context/setting/create` | Создаёт настройку контекста | `settings` |
| `context/setting/get` | Получает настройку контекста | `settings` |
| `context/setting/getlist` | Получает список настроек контекста | `settings` |
| `context/setting/remove` | Удаляет настройку контекста. |  |
| `context/setting/update` | Обновляет настройку контекста |  |
| `context/setting/updatefromgrid` | Обновляет настройку из сетки. Передается как данные JSON. |  |
| `context/update` | Обновляет контекст. | `edit_context` |
| `context/updatefromgrid` | Обновляет контекст из сетки. Передается как данные JSON. |  |

## Element (чанки, сниппеты, плагины, шаблоны, TV, наборы свойств)

_68 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `element/category/create` | Создаёт категорию. | `save_category` |
| `element/category/get` | Получает категорию. | `view_category` |
| `element/category/getlist` | Захватывает список категорий. |  |
| `element/category/remove` | Удаляет категорию. Сбрасывает все элементы этой категории в 0. | `delete_category` |
| `element/category/update` | Обновляет категорию. | `save_category` |
| `element/chunk/create` | Создаёт чанк. | `new_chunk` |
| `element/chunk/duplicate` | Дублирует фрагмент. | `new_chunk` |
| `element/chunk/get` | Получает кусок. | `view_chunk` |
| `element/chunk/getlist` | Захватывает список кусков. | `view_chunk` |
| `element/chunk/remove` | Удаляет кусок. | `delete_chunk` |
| `element/chunk/update` | Обновляет чанк. | `save_chunk` |
| `element/duplicate` | Абстрактный класс для процессоров дублирования элементов. Расширяется для каждого типа элемента. |  |
| `element/exportproperties` | Экспортирует свойства и выходной URL-адрес для загрузки в браузер. |  |
| `element/getclasses` | Выводит список подклассов Element. |  |
| `element/getinsertproperties` | Возвращает свойства элемента для диалога вставки. |  |
| `element/getlistbyclass` | Получает список элементов по их подклассу |  |
| `element/getnodes` | Захватывает все элементы дерева элементов |  |
| `element/importproperties` | Импортирует свойства из файла |  |
| `element/plugin/activate` | Активирует плагин. | `save_plugin` |
| `element/plugin/create` | Создаёт плагин | `new_plugin` |
| `element/plugin/deactivate` | Деактивирует плагин. | `save_plugin` |
| `element/plugin/duplicate` | Дублирует плагин | `new_plugin` |
| `element/plugin/event/associate` | Связывает событие с плагинами. | `save_plugin` |
| `element/plugin/event/get` | Получает событие плагина | `view_plugin` |
| `element/plugin/event/getassoc` | Получает список плагинов, связанных с системным событием. | `view_plugin` |
| `element/plugin/event/getlist` | Получает список системных событий | `view_plugin` |
| `element/plugin/event/remove` | Удаляет событие из плагина | `delete_plugin` |
| `element/plugin/event/update` | Обновляет событие плагина | `save_plugin` |
| `element/plugin/event/updatefromgrid` | Обновляет событие плагина из сетки |  |
| `element/plugin/get` | Получает плагин | `view_plugin` |
| `element/plugin/getlist` | Захватывает список плагинов. | `view_plugin` |
| `element/plugin/remove` | Удаляет плагин. | `delete_plugin` |
| `element/plugin/update` | Обновляет плагин. | `save_plugin` |
| `element/propertyset/addelement` | Добавляет элемент в набор свойств. | `save_propertyset` |
| `element/propertyset/associate` | Связывает набор свойств с элементом или создаёт набор свойств. |  |
| `element/propertyset/create` | Создаёт набор свойств | `new_propertyset` |
| `element/propertyset/duplicate` | Дублирует набор свойств | `new_propertyset` |
| `element/propertyset/get` | Захватывает набор свойств | `view_propertyset` |
| `element/propertyset/getlist` | Получает список наборов свойств для создания раскрывающихся (комбинированных) полей. | `view_propertyset` |
| `element/propertyset/getnodes` | Захватывает все элементы дерева набора свойств. | `view_propertyset` |
| `element/propertyset/getproperties` | Получает свойства для набора свойств. |  |
| `element/propertyset/remove` | Удаляет набор свойств | `delete_propertyset` |
| `element/propertyset/removeelement` | Удаляет элемент из набора свойств. | `delete_propertyset` |
| `element/propertyset/update` | Обновляет набор свойств | `save_propertyset` |
| `element/propertyset/updatefromelement` | Сохраняет набор свойств |  |
| `element/snippet/create` | Создаёт фрагмент. | `new_snippet` |
| `element/snippet/duplicate` | Дублирует фрагмент. | `new_snippet` |
| `element/snippet/get` | Получает фрагмент. | `view_snippet` |
| `element/snippet/getlist` | Захватывает список фрагментов. | `view_snippet` |
| `element/snippet/remove` | Удаляет фрагмент. | `delete_snippet` |
| `element/snippet/update` | Обновляет фрагмент | `save_snippet` |
| `element/sort` | Сортирует элементы в дереве элементов. |  |
| `element/template/create` | Создаёт шаблон | `new_template` |
| `element/template/duplicate` | Дублирует шаблон. | `new_template` |
| `element/template/get` | Получает шаблон | `view_template` |
| `element/template/getlist` | Захватывает список шаблонов. | `view_template` |
| `element/template/remove` | Удаляет шаблон. | `delete_template` |
| `element/template/templatevar/getlist` | Получает список TVов, отмечая те, которые связаны с шаблоном. |  |
| `element/template/update` | Обновляет шаблон | `save_template` |
| `element/templatevar/create` | Создаёт переменную шаблона. | `new_tv` |
| `element/templatevar/duplicate` | Дублирует TV | `new_tv` |
| `element/templatevar/get` | Получает TV | `view_tv` |
| `element/templatevar/getlist` | Захватывает список TVов. | `view_tv` |
| `element/templatevar/remove` | Удаляет TV | `delete_tv` |
| `element/templatevar/resourcegroup/getlist` | Получает список групп ресурсов, связанных с TV. |  |
| `element/templatevar/template/getlist` | Получает список шаблонов, связанных с TV. |  |
| `element/templatevar/template/updatefromgrid` | Назначает или снимает назначение шаблона для TV. Данные передаются в JSON. |  |
| `element/templatevar/update` | Обновляет TV | `save_tv` |

## Resource

_27 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `resource/create` | Создаёт ресурс. | `new_document` |
| `resource/data` | Возвращает данные ресурса. |  |
| `resource/delete` | Удаляет ресурс. | `delete_document` |
| `resource/duplicate` | Дублирует ресурс и, при необходимости, все его дочерние элементы. |  |
| `resource/emptyrecyclebin` | Очищает корзину. |  |
| `resource/event/getlist` | Собирает данные расписания сайта. |  |
| `resource/event/updatefromgrid` | Обновляет ресурс из сетки расписания сайта. |  |
| `resource/get` | Извлекает ресурс по его идентификатору. | `view` |
| `resource/getlist` | Получает список ресурсов. | `view` |
| `resource/getnodes` | Получает узлы для дерева ресурсов |  |
| `resource/gettoolbar` | Получает динамическую панель инструментов для дерева ресурсов. |  |
| `resource/locks/release` | Снять блокировку ресурса |  |
| `resource/locks/steal` | Украсть блокировку ресурса |  |
| `resource/publish` | Публикует ресурс. |  |
| `resource/reload` | сохранить данные формы ресурса для перезагрузки |  |
| `resource/resourcegroup/getlist` | Получает список групп ресурсов для ресурса. |  |
| `resource/resourcegroup/updatefromgrid` | Назначает или снимает назначение группы ресурсов для ресурса. | `resource` |
| `resource/search` | Ищет определенные ресурсы и возвращает их в массиве. | `search` |
| `resource/sort` | Сортирует дерево ресурсов |  |
| `resource/translit` | Извлекает строку и возвращает ее в транслитерированном виде для использования в различных приложениях, но в основном для псевдонима в реальном времени. |  |
| `resource/trash/getlist` | Получает список ресурсов для диспетчера мусора. | `view` |
| `resource/trash/purge` | Очищает корзину. |  |
| `resource/trash/restore` | Восстанавливает удаленные файлы. |  |
| `resource/undelete` | Восстанавливает ресурс. |  |
| `resource/unpublish` | Отменяет публикацию ресурса. |  |
| `resource/update` | Обновляет ресурс. | `save_document` |
| `resource/updatefromgrid` | _(нет docblock у класса)_ | `save_document` |

## Search

_1 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `search/search` | Поиск элементов, ресурсов и пользователей |  |

## Security (пользователи, ACL, формы, сообщения)

_128 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `security/access/addacl` | Добавляет ACL | `access_permissions` |
| `security/access/flush` | Сбрасывает разрешения для вошедшего в систему пользователя. |  |
| `security/access/getacl` | Получает ACL. | `access_permissions` |
| `security/access/getlist` | Получает список ACL. | `access_permissions` |
| `security/access/getnodes` | Получает список узлов ACL. | `access_permissions` |
| `security/access/permission/getlist` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/policy/create` | Создаёт политику доступа. | `policy_new` |
| `security/access/policy/duplicate` | Дублирует политику | `policy_new` |
| `security/access/policy/export` | Экспортирует шаблон политики. | `policy_view` |
| `security/access/policy/getlist` | Получает список политик. | `policy_view` |
| `security/access/policy/import` | Импортирует шаблон политики. | `policy_view` |
| `security/access/policy/remove` | Удаляет политику | `policy_delete` |
| `security/access/policy/removemultiple` | Удаляет несколько политик | `policy_delete` |
| `security/access/policy/template/create` | Создаёт шаблон политики доступа | `policy_template_new` |
| `security/access/policy/template/duplicate` | Дублирует шаблон политики | `policy_template_new` |
| `security/access/policy/template/export` | Экспортирует шаблон политики. | `policy_template_view` |
| `security/access/policy/template/getlist` | Получает список шаблонов политик. | `policy_template_view` |
| `security/access/policy/template/group/getlist` | Получает список групп шаблонов политик. | `policy_template_view` |
| `security/access/policy/template/import` | Импортирует шаблон политики. | `policy_template_view` |
| `security/access/policy/template/remove` | Удаляет шаблон политики | `policy_template_delete` |
| `security/access/policy/template/removemultiple` | Удаляет несколько шаблонов политик. | `policy_template_delete` |
| `security/access/policy/template/update` | Обновляет шаблон политики | `policy_template_save` |
| `security/access/policy/template/updatefromgrid` | Обновляет шаблон политики из сетки |  |
| `security/access/policy/update` | Обновляет политику | `policy_save` |
| `security/access/policy/updatefromgrid` | Обновляет политику из сетки |  |
| `security/access/removeacl` | Удаляет ACL. | `access_permissions` |
| `security/access/updateacl` | Обновляет ACL. | `access_permissions` |
| `security/access/usergroup/accessnamespace/create` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/usergroup/accessnamespace/getlist` | Получает список ACL. | `access_permissions` |
| `security/access/usergroup/accessnamespace/remove` | Удаляет ACL группы ресурсов для группы пользователей | `access_permissions` |
| `security/access/usergroup/accessnamespace/update` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/usergroup/category/create` | Создаёт класс | `access_permissions` |
| `security/access/usergroup/category/getlist` | Получает список ACL. | `access_permissions` |
| `security/access/usergroup/category/remove` | Удаляет ACL группы ресурсов для группы пользователей | `access_permissions` |
| `security/access/usergroup/category/update` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/usergroup/context/create` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/usergroup/context/getlist` | Получает список ACL. | `access_permissions` |
| `security/access/usergroup/context/remove` | Удаляет контекстного ACL для группы пользователей | `access_permissions` |
| `security/access/usergroup/context/update` | Обновляет ACL для контекста | `access_permissions` |
| `security/access/usergroup/resourcegroup/create` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/usergroup/resourcegroup/getlist` | Получает список ACL. | `access_permissions` |
| `security/access/usergroup/resourcegroup/remove` | Удаляет ACL группы ресурсов для группы пользователей | `access_permissions` |
| `security/access/usergroup/resourcegroup/update` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/usergroup/source/create` | _(нет docblock у класса)_ | `access_permissions` |
| `security/access/usergroup/source/getlist` | Получает список ACL. | `access_permissions` |
| `security/access/usergroup/source/remove` | Удаляет ACL источника мультимедиа для группы пользователей | `access_permissions` |
| `security/access/usergroup/source/update` | _(нет docblock у класса)_ | `access_permissions` |
| `security/flush` | Сбрасывает все сеансы |  |
| `security/forms/profile/activate` | Активирует профиль FC | `customize_forms` |
| `security/forms/profile/activatemultiple` | Активирует несколько профилей FC |  |
| `security/forms/profile/create` | Создаёт профиль FC | `customize_forms` |
| `security/forms/profile/deactivate` | Деактивирует профиль FC | `customize_forms` |
| `security/forms/profile/deactivatemultiple` | Деактивирует несколько профилей FC |  |
| `security/forms/profile/duplicate` | Дублирует профиль FC | `customize_forms` |
| `security/forms/profile/getlist` | Получает список профилей настройки формы. | `customize_forms` |
| `security/forms/profile/remove` | Удаляет профиль FC | `customize_forms` |
| `security/forms/profile/removemultiple` | Удаляет несколько профилей FC |  |
| `security/forms/profile/update` | Обновляет профиль FC | `customize_forms` |
| `security/forms/profile/updatefromgrid` | Обновляет профиль FC из сетки |  |
| `security/forms/set/activate` | Активирует набор FC | `customize_forms` |
| `security/forms/set/activatemultiple` | Активирует несколько наборов FC |  |
| `security/forms/set/create` | Создаёт набор FC | `customize_forms` |
| `security/forms/set/deactivate` | Деактивирует набор FC | `customize_forms` |
| `security/forms/set/deactivatemultiple` | Деактивирует несколько наборов FC |  |
| `security/forms/set/duplicate` | Дублирует набор FC | `customize_forms` |
| `security/forms/set/export` | Экспортирует набор настроек формы. | `customize_forms` |
| `security/forms/set/getlist` | Получает список наборов настроек формы. | `customize_forms` |
| `security/forms/set/import` | Импортирует набор настроек формы из файла XML | `customize_forms` |
| `security/forms/set/remove` | Удаляет набор FC | `customize_forms` |
| `security/forms/set/removemultiple` | Удаляет несколько наборов FC |  |
| `security/forms/set/update` | Сохраняет набор настроек формы. | `customize_forms` |
| `security/forms/set/updatefromgrid` | Обновляет профиль FC из сетки | `customize_forms` |
| `security/group/create` | Создаёт группу пользователей | `usergroup_new` |
| `security/group/getlist` | Получает список групп пользователей | `usergroup_view` |
| `security/group/getnodes` | Получает группы пользователей в формате узла дерева. |  |
| `security/group/remove` | Удаляет группы пользователей | `usergroup_delete` |
| `security/group/setting/create` | Создаёт настройку группы пользователей |  |
| `security/group/setting/getlist` | Получает список настроек группы пользователей. |  |
| `security/group/setting/remove` | Удаляет настройки группы пользователей и ее словарных строк. |  |
| `security/group/setting/update` | Обновляет настройки группы пользователей |  |
| `security/group/setting/updatefromgrid` | Обновляет настройки группы пользователей из сетки |  |
| `security/group/sort` | Сортирует пользователей и группы пользователей, эффективно распределяя пользователей по нужным группам. |  |
| `security/group/update` | Обновляет группы пользователей | `usergroup_save` |
| `security/group/user/create` | Добавляет пользователя в группу пользователей |  |
| `security/group/user/getlist` | Получает список пользователей в группе пользователей | `usergroup_user_list` |
| `security/group/user/remove` | Удаляет пользователя из группы пользователей |  |
| `security/group/user/update` | Обновляет роли пользователей в группе пользователей |  |
| `security/login` | Правильно войдите в систему и настройте сеанс. |  |
| `security/logout` | Правильно выйдите из системы, запустив все события и очистив сеанс. |  |
| `security/message/create` | Создаёт сообщение | `messages` |
| `security/message/getlist` | Получает список сообщений | `messages` |
| `security/message/read` | Отметить сообщение как прочитанное | `messages` |
| `security/message/remove` | Удаляет сообщение | `messages` |
| `security/message/unread` | Отметить сообщение как непрочитанное | `messages` |
| `security/profile/changepassword` | Изменяет пароль пользователя |  |
| `security/profile/get` | Получает профиль пользователя |  |
| `security/profile/update` | Обновляет профиль пользователя |  |
| `security/resourcegroup/create` | Создаёт группу ресурсов | `resourcegroup_new` |
| `security/resourcegroup/getlist` | Получает список групп ресурсов | `resourcegroup_view` |
| `security/resourcegroup/getnodes` | Получает группы ресурсов как узлы |  |
| `security/resourcegroup/remove` | Удаляет группы ресурсов |  |
| `security/resourcegroup/removeresource` | Удаляет пары ресурс-группа ресурсов |  |
| `security/resourcegroup/update` | Обновляет группы ресурсов |  |
| `security/resourcegroup/updateresourcesin` | Обновляет документов в группе ресурсов | `resourcegroup_resource_edit` |
| `security/role/create` | Создаёт роль на основе запроса POST. | `new_role` |
| `security/role/get` | Получает роль | `view_role` |
| `security/role/getauthoritylist` | Получает список ролей |  |
| `security/role/getlist` | Получает список ролей | `view_role` |
| `security/role/remove` | Удаляет роль. | `delete_role` |
| `security/role/update` | Обновляет роли из POST-запроса | `save_role` |
| `security/role/updatefromgrid` | Обновляет роль из сетки. Передано как данные JSON |  |
| `security/user/activatemultiple` | Активирует несколько пользователей |  |
| `security/user/create` | Создаёт пользователя | `new_user` |
| `security/user/deactivatemultiple` | Деактивирует несколько пользователей |  |
| `security/user/delete` | Удаляет пользователя | `delete_user` |
| `security/user/duplicate` | Дублирует пользователя. | `new_user` |
| `security/user/get` | Получает пользователя | `view_user` |
| `security/user/getlist` | Получает список пользователей | `view_user` |
| `security/user/getonline` | Получает список всех пользователей, находящихся в сети. |  |
| `security/user/getrecentlyeditedresources` | Получает список недавно отредактированных пользователем ресурсов. | `view_document` |
| `security/user/removemultiple` | Удаляет несколько пользователей |  |
| `security/user/setting/create` | Создаёт пользовательскую настройку |  |
| `security/user/setting/getlist` | Получает список пользовательских настроек |  |
| `security/user/setting/remove` | Удаляет пользовательской настройки и ее словарных строк. |  |
| `security/user/setting/update` | Обновляет настройку пользователя |  |
| `security/user/setting/updatefromgrid` | Обновляет настройку из сетки |  |
| `security/user/update` | Обновляет пользователя. | `save_user` |
| `security/user/updatefromgrid` | Обновляет пользователя из сетки |  |

## Software update

_3 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `softwareupdate/base` | Предоставляет базовые методы и общие свойства для построения данных о состоянии, используемых при отображении обновлений программного обеспечения (MODX и Extras). |  |
| `softwareupdate/getfile` | Получает URL-адрес загружаемого файла и другие метаданные для указанного пакета обновления MODX. |  |
| `softwareupdate/getlist` | Извлекает данные о состоянии для использования во внешнем интерфейсе обновлений программного обеспечения (MODX и Extras). |  |

## Media Source

_8 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `source/create` | Создаёт источник мультимедиа | `source_save` |
| `source/duplicate` | Дублирует источник. | `source_save` |
| `source/getlist` | Получает список источников мультимедиа. | `source_view` |
| `source/remove` | Удаляет источник мультимедиа | `source_delete` |
| `source/removemultiple` | Удаляет несколько источников мультимедиа |  |
| `source/type/getlist` | Получает список типов медиа-источников. |  |
| `source/update` | Обновляет источник мультимедиа | `source_save` |
| `source/updatefromgrid` | Обновляет источник из сетки. Отправляется через параметр data в формате JSON. |  |

## System (настройки, меню, дашборды, логи)

_72 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `system/activeresource/getlist` | Получает список активных ресурсов | `view_document` |
| `system/charset/getlist` | Получает список кодировок |  |
| `system/clearcache` | Обновляет кэш сайта |  |
| `system/configcheck` | Запускает проверку конфигурации |  |
| `system/configjs` | Выводит $modx->config в JSON. |  |
| `system/console` | Читает данные реестра в консоль. |  |
| `system/contenttype/create` | Создаёт тип контента | `content_types` |
| `system/contenttype/getlist` | Получает список типов контента |  |
| `system/contenttype/remove` | Удаляет тип контента | `content_types` |
| `system/contenttype/update` | Обновляет тип контента из сетки. Отправляется через параметр data в формате JSON. | `content_types` |
| `system/contenttype/updatefromgrid` | Обновляет тип контента из сетки. Отправляется через параметр data в формате JSON. |  |
| `system/country/getlist` | Получает список кодов стран |  |
| `system/dashboard/create` | Создаёт панель мониторинга | `dashboards` |
| `system/dashboard/duplicate` | Дублирует панель мониторинга. | `dashboards` |
| `system/dashboard/getlist` | Получает список информационных панелей | `dashboards` |
| `system/dashboard/remove` | Удаляет панель мониторинга | `dashboards` |
| `system/dashboard/removemultiple` | Удаляет несколько информационных панелей |  |
| `system/dashboard/update` | Обновляет панель мониторинга | `dashboards` |
| `system/dashboard/updatefromgrid` | Обновляет панель мониторинга из сетки. Отправляется через параметр data в формате JSON. |  |
| `system/dashboard/user/create` | Создаёт класс |  |
| `system/dashboard/user/getlist` | Получает список виджетов дашборда пользователя. |  |
| `system/dashboard/user/remove` | Удаляет размещение виджета на дашборде пользователя. |  |
| `system/dashboard/user/resize` | Изменяет размер виджета на дашборде пользователя. |  |
| `system/dashboard/user/sort` | Сортирует виджеты дашборда пользователя. |  |
| `system/dashboard/widget/create` | Создаёт новый виджет панели мониторинга. | `dashboards` |
| `system/dashboard/widget/feed` | Загружает ленты новостей и безопасности на дашборде через AJAX. Обработанный HTML возвращается в object->html. |  |
| `system/dashboard/widget/getlist` | Получает список информационных панелей | `dashboards` |
| `system/dashboard/widget/remove` | Удаляет виджет информационной панели | `dashboards` |
| `system/dashboard/widget/removemultiple` | Удаляет несколько виджетов информационной панели |  |
| `system/dashboard/widget/update` | Обновляет виджет информационной панели | `dashboards` |
| `system/databasetable/getlist` | Получает список таблиц базы данных |  |
| `system/databasetable/mysql/getlist` | MySQL-специфичный процессор листинга таблиц |  |
| `system/databasetable/mysql/optimize` | _(нет docblock у класса)_ |  |
| `system/databasetable/mysql/optimizedatabase` | _(нет docblock у класса)_ |  |
| `system/databasetable/mysql/truncate` | _(нет docblock у класса)_ |  |
| `system/databasetable/optimize` | Оптимизирует таблицу базы данных |  |
| `system/databasetable/optimizedatabase` | Оптимизирует базу данных |  |
| `system/databasetable/truncate` | Усечь таблицу базы данных |  |
| `system/deprecatedlog/clear` | Очищает журнал ошибок |  |
| `system/deprecatedlog/getlist` | Получает список настроек системы |  |
| `system/derivatives/getlist` | Получает список производных классов для класса. |  |
| `system/downloadoutput` | Вывод данных в файл для скачивания |  |
| `system/errorlog/clear` | Очищает журнал ошибок |  |
| `system/errorlog/download` | Возьмите и загрузите журнал ошибок |  |
| `system/errorlog/get` | Захватывает и выведите журнал ошибок |  |
| `system/event/create` | Создаёт системное событие | `events` |
| `system/event/getlist` | Получает список системных событий |  |
| `system/event/grouplist` | Создаёт системную настройку |  |
| `system/event/remove` | Удаляет систему даже | `events` |
| `system/info` | Снимает блокировки со всех объектов |  |
| `system/language/getlist` | Захватывает список языков лексики |  |
| `system/log/getlist` | Получает список действий журнала менеджера. |  |
| `system/log/truncate` | Очищает журнал действий менеджера. |  |
| `system/menu/create` | Создаёт пункт меню | `menus` |
| `system/menu/getlist` | Получает список пунктов меню | `menus` |
| `system/menu/getnodes` | Получает пункты меню в формате узла | `menus` |
| `system/menu/remove` | Удаляет пункт меню | `menus` |
| `system/menu/sort` | Сортирует пункты меню в дереве. |  |
| `system/menu/update` | Обновляет пункт меню | `menus` |
| `system/phpinfo` | Отобразить phpinfo() |  |
| `system/phpthumb` | Создаёт миниатюру |  |
| `system/refreshuris` | Восстанавливает URI ресурсов системы в базе данных. |  |
| `system/registry/register/read` | Читает данные из реестра. |  |
| `system/registry/register/send` | Отправляет сообщение в реестр. |  |
| `system/removelocks` | Снимает блокировки со всех объектов |  |
| `system/rte/getlist` | Получает список зарегистрированных RTE |  |
| `system/settings/create` | Создаёт системную настройку | `settings` |
| `system/settings/getareas` | Получает список областей настройки | `settings` |
| `system/settings/getlist` | Получает список настроек системы | `settings` |
| `system/settings/remove` | Удаляет системной настройки | `settings` |
| `system/settings/update` | Обновляет системные настройки | `settings` |
| `system/settings/updatefromgrid` | Обновляет настройки из сетки |  |

## Workspace (пакеты, лексикон, namespaces)

_37 процессоров_

| Action | Описание | Permission |
| ------ | -------- | ---------- |
| `workspace/lexicon/create` | Обновляет словарную статью из сетки |  |
| `workspace/lexicon/getlist` | Получает список записей словаря |  |
| `workspace/lexicon/reloadfrombase` | Восстанавливает строки из файлов базового словаря, сбрасывая любые настройки. |  |
| `workspace/lexicon/revert` | Обновляет словарную статью из сетки |  |
| `workspace/lexicon/topic/getlist` | Получает список тем словаря |  |
| `workspace/lexicon/updatefromgrid` | Обновляет словарную статью из сетки |  |
| `workspace/packagenamespace/create` | Создаёт пространство имен | `namespaces` |
| `workspace/packagenamespace/getlist` | Получает список пространств имен | `namespaces` |
| `workspace/packagenamespace/remove` | Удаляет пространство имен. | `namespaces` |
| `workspace/packagenamespace/removemultiple` | Удаляет пространства имен. |  |
| `workspace/packagenamespace/update` | Обновляет пространство имен из сетки | `namespaces` |
| `workspace/packagenamespace/updatefromgrid` | Обновляет пространство имен из сетки |  |
| `workspace/packages/checkforupdates` | Обновляет пакет от его поставщика. |  |
| `workspace/packages/dependency/download` | Загружает пакет, устранив ограничения зависимого пакета. |  |
| `workspace/packages/get` | Получает транспортный пакет. | `packages` |
| `workspace/packages/getattribute` | Получает атрибут пакета |  |
| `workspace/packages/getdependencies` | Получает список пакетов | `packages` |
| `workspace/packages/getlist` | Получает список пакетов | `packages` |
| `workspace/packages/install` | Устанавливает пакет |  |
| `workspace/packages/purge` | Очищает старые версии пакета |  |
| `workspace/packages/remove` | Удаляет пакет |  |
| `workspace/packages/rest/download` | Загружает пакет, указав его местоположение. |  |
| `workspace/packages/rest/getinfo` | _(нет docblock у класса)_ |  |
| `workspace/packages/rest/getlist` | _(нет docblock у класса)_ |  |
| `workspace/packages/rest/getnodes` | _(нет docblock у класса)_ |  |
| `workspace/packages/scanlocal` | Сканирует локальные пакеты для добавления в рабочую область. |  |
| `workspace/packages/uninstall` | Удаляет пакет |  |
| `workspace/packages/update` | Получает кусок. |  |
| `workspace/packages/upload` | Загружает транспортный пакет в каталог Packages. |  |
| `workspace/packages/version/getlist` | Получает список версий пакета для пакета. | `packages` |
| `workspace/packages/version/remove` | Удаляет пакет |  |
| `workspace/providers/create` | Создаёт поставщика | `providers` |
| `workspace/providers/getlist` | Получает список провайдеров | `providers` |
| `workspace/providers/remove` | Удаляет провайдера | `providers` |
| `workspace/providers/update` | Обновляет провайдера | `providers` |
| `workspace/providers/updatefromgrid` | Обновляет провайдера из сетки |  |
| `workspace/theme/getlist` | Получает список тем менеджера | `settings` |
