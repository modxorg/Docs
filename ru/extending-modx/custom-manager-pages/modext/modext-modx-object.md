---
title: "Объект MODExt MODX"
translation: "extending-modx/custom-manager-pages/modext/modext-modx-object"
---

## Объект MODx JS

MODExt поставляется с глобальным объектом MODx JS на каждой странице менеджера. Этот объект имеет несколько пользовательских методов, которые могут быть выполнены с любой пользовательской страницы менеджера с использованием MODExt, а также устанавливает некоторые настройки по умолчанию.

## Пользовательские переменные класса

Следующие переменные доступны из объекта MODx JS:

### MODx.request

Это объект JS, который содержит все текущие параметры GET для страницы. Пример:

```javascript
var id = MODx.request.id;
```

### MODx.config

Этот объект содержит все активные системные настройки в MODX по ключу:

```javascript
var tpl = MODx.config.default_template;
```

#### Другие переменные

В объекте MODx.config есть несколько других переменных, которые не являются [системными настройками](building-sites/settings "System Settings"):

| Ключ                    | Описание                                                                                            |
| ----------------------- | --------------------------------------------------------------------------------------------------- |
| base_url                | Базовый URL для сайта MODX и / или активного контекста.                                             |
| connectors_url          | URL к каталогу коннекторов.                                                                         |
| manager_url             | URL к менеджеру.                                                                                    |
| http_host               | Переменная хоста HTTP для активного контекста.                                                      |
| site_url                | Полный URL сайта для активного контекста.                                                           |
| custom_resource_classes | Массив пользовательских классов ресурсов, извлеченных из системных настроек custom_resource_classes |

### MODx.version

Содержит информацию о версии MODX со следующими атрибутами:

| Ключ          | Пример                                 |
| ------------- | -------------------------------------- |
| версия        | 2                                      |
| major_version | 1                                      |
| minor_version | 0                                      |
| patch_level   | pl                                     |
| кодовое имя   | Revolution                             |
| дистрибутив   | (Traditional)                          |
| полная версия | 2.1.0-пл                               |
| full_appname  | MODX Revolution 2.1.0-pl (Traditional) |

Пример:

```javascript
var fv = MODx.version.full_version;
```

### MODx.user

Этот объект будет содержать два следующих свойства для текущего пользователя администратора, вошедшего в систему:

| MODx.user.id       | The ID of the user. |
| ------------------ | ------------------- |
| MODx.user.username | Имя пользователя.   |

```javascript
var userId = MODx.user.id;
```

### MODx.perm

Будет содержать следующие разрешения, если они будут предоставлены пользователю (они не будут существовать, если у пользователя нет разрешения):

| Название                   | Описание                            |
| -------------------------- | ----------------------------------- |
| MODx.perm.resource_tree    | Для просмотра дерева ресурсов.      |
| MODx.perm.element_tree     | Для просмотра дерева элементов.     |
| MODx.perm.file_tree        | Для просмотра дерева файлов.        |
| MODx.perm.file_upload      | Загружать файлы.                    |
| MODx.perm.file_manager     | Использовать файловый браузер MODX. |
| MODx.perm.new_chunk        | Создать новый чанк.                 |
| MODx.perm.new_plugin       | Создать новый плагин.               |
| MODx.perm.new_snippet      | Создать новый сниппет.              |
| MODx.perm.new_template     | Создать новый шаблон.               |
| MODx.perm.new_tv           | Создать новую переменную шаблона.   |
| MODx.perm.directory_create | Создать каталог в файловой системе. |

```javascript
if (MODx.perm.file_upload) {
    /* ...код... */
}
```

## Пользовательские методы

Объект MODx также имеет довольно много пользовательских методов:

### MODx.load

Этот метод создаст новый объект любого указанного xtype и переданный в параметрах конфигурации. Пример:

```javascript
var w = MODx.load({
    xtype: "modx-window-namespace-create",
    blankValues: true
});
w.setValues({ name: "My Namespace" });
w.show();
```

Любой определенный класс, имеющий зарегистрированный тип xtype, может быть загружен из этого метода.

### MODx.clearCache

Этот метод запускает консоль, которая очищает кеш MODX. Он также будет запускать события beforeClearCache и afterClearCache для объекта MODx. Если системный параметр [clear_cache_refresh_trees](building-sites/settings/clear_cache_refresh_trees "clear_cache_refresh_trees") установлен в 1, он также обновит все активные деревья слева.

### MODx.releaseLock

Это снимет блокировку с текущего активного ресурса. Этот метод не должен запускаться на страницах редактирования, не относящихся к ресурсам. Он будет запускать события beforeReleaseLocks и afterReleaseLocks объекта MODx.

### MODx.sleep

Этот метод заставит JavaScript засыпать (или останавливаться) на указанное количество секунд:

```javascript
MODx.sleep(3); /* остановиться на 3 секунды */
```

### MODx.logout

Этот метод автоматически выведет из менеджера активного пользователя. Он запускает события beforeLogout и afterLogout объекта MODx. Если оба события успешны, он перенаправит пользователя на экран входа в систему.

### MODx.loadHelpPane

This will load the current Help screen for the active page. Its URL is set from the `MODx.config.help_url` property; you can override this to fire up any URL into the panel:

```javascript
/* Показать сайт в модальном окне справки */
MODx.config.help_url = "https://modx.com/";
MODx.loadHelpPane();
```

### MODx.preview

Загружает текущий сайт MODX для активного контекста.

### MODx.isEmpty

Проверяет, является ли указанная переменная «пустой» (в смысле PHP). Это означает, что это либо:

-   false, 'false', или 'FALSE'
-   0 или '0'
-   '' (пустая строка)
-   null (нуль)
-   undefined (неопределено)

### MODx.debug

(Только с версии 2.1+)

Это отправит сообщение об отладке тогда и только тогда, когда MODX [Системные настройки](_legacy/administering-your-site/settings "Настройки") [ui_debug_mode](building-sites/settings/ui_debug_mode "ui_debug_mode") установлен в Yes/1. Отладочное сообщение будет использовать console.log для вывода на консоль. Это может быть полезно для добавления отладки и утверждений в ваш код, не нарушая его на рабочих сайтах (что, вероятно, [ui_debug_mode](building-sites/settings/ui_debug_mode "ui_debug_mode") off).
