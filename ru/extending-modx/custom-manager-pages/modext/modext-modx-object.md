---
title: Объект MODExt MODx
_old_id: '370'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-modx-object
---

## The MODx JS Object

MODExt поставляется с глобальным объектом MODx JS на каждой странице менеджера. Этот объект имеет несколько пользовательских методов, которые могут быть выполнены с любой пользовательской страницы менеджера с использованием MODExt, а также устанавливает некоторые настройки по умолчанию.

## Custom Class Variables

The following variables are accessible from the MODx JS object:

### MODx.request

This is a JS object that contains all the current GET parameters for the page. Example:

```javascript
var id = MODx.request.id;
```

### MODx.config

This object contains all the active System Settings in MODX by key:

```javascript
var tpl = MODx.config.default_template;
```

#### Other Variables

В объекте MODx.config есть несколько других переменных, которые не являются [системными настройками](building-sites/settings "System Settings"):

Ключ | Описание
--- | ---
base_url | The base URL for the MODX site and/or active context.
connectors_url | URL к каталогу коннекторов.
manager_url | The URL to the manager.
http_host | The HTTP host variable for the active context.
site_url | The full Site URL for the active context.
custom_resource_classes | An array of custom Resource classes pulled from the System Setting custom_resource_classes

### MODx.action

This object contains a map of all the modAction objects (or MODX manager controllers), mapped by their controller to their ID:

```javascript
var actionId = MODx.action['resource/create'];
```

Начиная с MODX 2.2, неосновные действия имеют префикс своего пространства имен. До 2.2 это был бы просто контроллер действий. Например, действие «controllers/index» в пространстве имен «mycomponent» можно получить, используя следующую информацию в версии 2.2 и выше:

```javascript
var actionId = MODx.action['mycomponent:controllers/index'];
```

### MODx.version

Contains MODX version information, with the following attributes:

Ключ | Пример
--- | ---
version | 2
major_version | 1
minor_version | 0
patch_level | pl
code_name | Revolution
distro | (traditional)
full_version | 2.1.0-pl
full_appname | MODX Revolution 2.1.0-pl (traditional)

Пример:

```javascript
var fv = MODx.version.full_version;
```

### MODx.user

This object will contain the two following properties for the currently logged-in manager user:

MODx.user.id | The ID of the user.
--- | ---
MODx.user.username | Имя пользователя.

```javascript
var userId = MODx.user.id;
```

### MODx.perm

Будет содержать следующие разрешения, если они будут предоставлены пользователю (они не будут существовать, если у пользователя нет разрешения):

Название | Описание
--- | ---
MODx.perm.resource_tree | To view the Resources tree.
MODx.perm.element_tree | To view the Elements tree.
MODx.perm.file_tree | To view the Files tree.
MODx.perm.file_upload | Загружать файлы.
MODx.perm.file_manager | To use the MODX file browser.
MODx.perm.new_chunk | To create a new Chunk.
MODx.perm.new_plugin | To create a new Plugin.
MODx.perm.new_snippet | Создать новый сниппет.
MODx.perm.new_template | To create a new Template.
MODx.perm.new_tv | To create a new Template Variable.
MODx.perm.directory_create | Создать каталог в файловой системе.

```javascript
if (MODx.perm.file_upload) { /* ...код... */ }
```

## Пользовательские методы

The MODx object also has quite a few custom methods available to it:

### MODx.load

This method will create a new object of any specified xtype and passed in configuration parameters. Example:

```javascript
var w = MODx.load({
  xtype: 'modx-window-namespace-create'
  ,blankValues: true
});
w.setValues({ name: 'My Namespace' });
w.show();
```

Any defined class that has a registered xtype can be loaded from this method.

### MODx.clearCache

Этот метод запускает консоль, которая очищает кеш MODX. Он также будет запускать события beforeClearCache и afterClearCache для объекта MODx. Если системный параметр [clear_cache_refresh_trees](building-sites/settings/clear_cache_refresh_trees "clear_cache_refresh_trees") установлен в 1, он также обновит все активные деревья слева.

### MODx.releaseLock

This will release the lock on the current active Resource. This method should not be fired on non-Resource editing pages. It will fire the 'beforeReleaseLocks' and 'afterReleaseLocks' events on the MODx object.

### MODx.sleep

Этот метод заставит JavaScript засыпать (или останавливаться) на указанное количество секунд:

```javascript
MODx.sleep(3); /* остановиться на 3 секунды */
```

### MODx.logout

Этот метод автоматически выведет из менеджера активного пользователя. Он запускает события beforeLogout и afterLogout объекта MODx. Если оба события успешны, он перенаправит пользователя на экран входа в систему.

### MODx.loadHelpPane

Этот метод загрузит текущий экран справки для активной страницы. Обычно это устанавливается по умолчанию в записи modAction для страницы, а ее URL-адрес можно найти с помощью свойства MODx.config.help_url. Однако вы можете переопределить его поведение, чтобы запустить любой URL на панели:

```javascript
/* Показать сайт в модальном окне справки */
MODx.config.help_url = 'http://modx.com/';
MODx.loadHelpPane();
```

### MODx.preview

Loads the current MODX site for the active Context.

### MODx.isEmpty

Checks to see if the specified variable is "empty" (in the PHP sense). This means it is either:

- false, 'false', или 'FALSE'
- 0 или '0'
- '' (пустая строка)
- null (нуль)
- undefined (неопределено)

### MODx.debug

(Только с версии 2.1+)

Этот метод отправит сообщение об отладке тогда и только тогда, когда для [системной настройки](_legacy/administering-your-site/settings "Settings")  MODX  [ui_debug_mode](building-sites/settings/ui_debug_mode "ui_debug_mode") установлено значение Да/1. Отладочное сообщение будет использовать console.log для вывода на консоль. Это может быть полезно для добавления отладки и сравнений в ваш код, не нарушая его на рабочих сайтах (которые, вероятно, отключили бы [ui_debug_mode](building-sites/settings/ui_debug_mode "ui_debug_mode")).
