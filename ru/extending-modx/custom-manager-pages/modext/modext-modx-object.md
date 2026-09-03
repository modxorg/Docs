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

`MODx.perm` — карта **всех** имён manager-разрешений на boolean для текущего пользователя. Config JS читает distinct-строки `modAccessPermission` и заполняет ключи через `hasPermission()`. Фиксированного subset нет. [#13924](https://github.com/modxcms/revolution/pull/13924), [#14425](https://github.com/modxcms/revolution/pull/14425)

Проверяйте любой ключ, который нужен Extra или CMP:

```javascript
if (MODx.perm.file_upload) {
    /* ...код... */
}
if (MODx.perm.view_document) {
    /* ... */
}
```

Частые ключи по-прежнему включают `resource_tree`, `element_tree`, `file_tree`, `file_upload`, `file_manager`, `new_chunk`, `new_plugin`, `new_snippet`, `new_template`, `new_tv` и `directory_create`. Отсутствующий ключ означает, что разрешения нет (считайте falsy).

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

Этот метод автоматически выведет из менеджера активного пользователя. Он запускает события `beforeLogout` и `afterLogout` объекта MODx. Если оба события успешны, он перенаправит пользователя на экран входа в систему.

### MODx.loadHelpPane

Это загрузит текущий экран справки для активной страницы. Его URL задается из свойства `MODx.config.help_url`. Вы можете переопределить это, чтобы запустить любой URL в панели:

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
