---
title: "Интернационализация"
description: Как лективы MODX хранят, загружают и адресуют переведённые строки по языкам, темам и пространствам имён — в тегах, PHP и JavaScript"
translation: "extending-modx/internationalization"
---

## Общее представление

Лексикон — набор строк, сгруппированных по языку и теме. Записи лежат в файлах `lexicon/<lang>/<topic>.inc.php` внутри [пространства имён](extending-modx/namespaces), поэтому строки компонента не сталкиваются со строками ядра.

- **Языки** — ключи IANA, например `en`, `de`, `ru`
- **Темы** — файлы, группирующие связанные записи
- **Пространства имён** — область каталогов; по умолчанию `core`

Разбиение по темам делает языковые файлы небольшими и дешёвыми в загрузке — как на сервере, так и в браузере.

### Локали

MODX поддерживает локали в ядре. Системная настройка [locale](building-sites/settings/locale) применяется через `setlocale(LC_ALL, …)` при инициализации культуры; опция `setlocale` управляет этим вызовом, в менеджере она не выведена, поэтому задаётся в `core/config/config.inc.php`.

Используйте UTF-8 локаль вида `de_DE.utf8`, иначе серверная часть отрисуется неверно. Чтобы менять локаль на каждый запрос, а не на весь сайт, задавайте её в плагине на [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture").

## Записи лексиконов

У записи есть ключ и переведённое значение, а также координаты, по которым её находят:

| Поле | Значение | По умолчанию |
| --- | --- | --- |
| `name` | Ключ, на который вы ссылаетесь | — |
| `value` | Перевод | — |
| `topic` | Тема, к которой относится запись | `default` |
| `namespace` | Пространство имён, где лежит тема | `core` |
| `language` | Ключ IANA целевого языка | текущий `cultureKey`, иначе `en` |
| `createdon` / `editedon` | Отметки времени | проставляются автоматически |

Файлы — источник истины. Таблица `modLexiconEntry` (`MODX\Revolution\modLexiconEntry`) хранит переопределения из базы, которые накладываются поверх файлов; переводы не рождаются в ней.

## Загрузка и использование лексиконов

Темы подгружаются по требованию. Меняйте язык через настройку сайта или контекста, а не в каждом теге — обычно это отдельный контекст на язык.

### В контенте, чанках и шаблонах

```
[[%key? &topic=`topicname` &namespace=`namespace_name` &language=`en`]]
```

Все три свойства необязательны. Плейсхолдеры в записи заполняются из свойств тега:

```
[[!%userinput=`amazing`]]
```

Префикс `!` помечает тег некэшируемым — нужно, когда строка меняется от запроса к запросу.

### В PHP

Сервис лексикона регистрируется при инициализации культуры, поэтому `$modx->lexicon` сразу готов. `getService('lexicon', 'modLexicon')` работает, но короткое имя класса — устаревший алиас.

`modLexicon::load()` принимает `<topic>`, `<namespace>:<topic>` или `<language>:<namespace>:<topic>` и сколько угодно тем за раз:

``` php
$modx->lexicon->load('chunk','user','school:playground');
$modx->lexicon->load('es:school:playground');
```

Отдельную запись читают методом `modX::lexicon()`. Вторым аргументом передаётся массив для подстановки плейсхолдеров:

``` php
$modx->lexicon('school.basketball');
$modx->lexicon('school.basketball', ['userinput' => 'amazing']);
```

### В JavaScript (внутри MODX)

В CMP `_()` читает из лексикона, загруженного для страницы:

``` js
 _('lexicon.key');
 _('lexicon.key', { userinput: 'amazing' });
```

Подгружайте темы по требованию у `connectors/lang.js.php` с параметром `topic` через запятую:

```
/connectors/lang.js.php?topic=myextra:default,myextra:settings
```

Ответ заменяет `MODx.lang`, поэтому вызывайте его до использования нужных строк. Ядро само грузит `core:default`.

## Лексиконы для настроек

Системные настройки берут подписи из темы `setting`, а не только из `default`. Префиксуйте записи пространством имён компонента, чтобы избежать коллизий:

**Тема default** (`lexicon/en/default.inc.php`):

``` php
$_lang['gallery.display_thumbs'] = 'Display Thumbnails';
```

**Тема setting** (`lexicon/en/setting.inc.php`):

``` php
$_lang['setting_gallery.display_thumbs'] = 'Display Thumbnails';
$_lang['setting_gallery.display_thumbs_desc'] = 'When set to true, this will display thumbnails for the gallery.';
```

Грид настроек грузит обе темы, поэтому ключ без префикса `setting_` подпись настройки не создаст.

## Смотрите также

- [modX.lexicon](extending-modx/modx-class/reference/modx.lexicon "modX.lexicon")
- [Пространства имён](extending-modx/namespaces "Пространства имён")
- [locale](building-sites/settings/locale)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture")