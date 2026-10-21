---
title: "Интернационализация"
description: "Как лективы MODX хранят, загружают и адресуют переведённые строки по языкам, темам и пространствам имён — в тегах, PHP и JavaScript"
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

Свойства `topic` и `language` можно опускать: тема по умолчанию — `default`, язык — язык текущего запроса. Свойство `namespace` тоже по умолчанию равно `core`, поэтому для лексикона вне пространства имён ядра его нужно указать — иначе тег ищет только в ядре.

Плейсхолдеры в записи заполняются из свойств тега, которые идут после `?`:

```
[[!%key? &userinput=`amazing`]]
```

Префикс `!` помечает тег некэшируемым — нужно, когда строка меняется от запроса к запросу.

### В PHP

Сервис лексикона регистрируется при инициализации культуры, поэтому `$modx->lexicon` сразу готов. `getService('lexicon', 'modLexicon')` работает, но короткое имя класса — устаревший алиас.

`modLexicon::load()` принимает `<topic>`, `<namespace>:<topic>` или `<language>:<namespace>:<topic>`. Каждый аргумент — такая координата, отдельного параметра для пространства имён нет:

``` php
$modx->lexicon->load('chunk');                 // тема во всех пространствах имён
$modx->lexicon->load('school:playground');    // тема одного пространства имён
$modx->lexicon->load('es:school:playground'); // тема одного пространства имён на одном языке
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

Страница объявляет нужные темы, а менеджер грузит их в `MODx.lang`. Чтобы добавить темы своего компонента, назовите их в `getLanguageTopics()` контроллера компонента — это расширяет список лексиконов, загруженных для страницы:

``` php
/**
 * Specify the language topics to load
 * @return array
 */
public function getLanguageTopics()
{
    return ['mycomponent:default'];
}
```

Если странице нужна тема сверх объявленных контроллером, она добавляется через `addLexiconTopic()`:

``` php
$this->addLexiconTopic('mycomponent:settings');
```

За темы страницы менеджер обращается к коннектору `connectors/lang.js.php`: он читает параметр `topic`, делит его по запятым и загружает каждую координату через `modLexicon::load()`. Шаблоны ядра поступают так же: `manager/templates/default/header.tpl` запрашивает `?ctx=mgr&topic=topmenu,file,resource,…`.

Коннектор не расширяет лексикон уже идущей страницы: он отвечает темами своего запроса — `core:default` и запрошенными, — а ответ заменяет `MODx.lang`. Поэтому темы страницы нужно объявить до её отрисовки.

## Лексиконы для настроек

Подпись системной настройки — это ключ `setting_<key>`, а её описание — `setting_<key>_desc`. Ключ самой настройки сохраняет префикс компонента, например `gallery.display_thumbs`.

Ядро хранит подписи в теме `setting` (`core/lexicon/en/setting.inc.php`):

``` php
$_lang['setting_manager_date_format'] = 'Manager Date Format';
$_lang['setting_manager_date_format_desc'] = 'The format string, in PHP date() format, for the dates represented in the manager.';
```

Компонент вне пространства имён ядра хранит их в теме `default` (`lexicon/en/default.inc.php`) — туда же менеджер записывает перевод подписи:

``` php
$_lang['setting_gallery.display_thumbs'] = 'Display Thumbnails';
$_lang['setting_gallery.display_thumbs_desc'] = 'When set to true, this will display thumbnails for the gallery.';
```

Грид настроек грузит обе темы пространства имён настройки, поэтому ключ с префиксом `setting_` находится в любой из них. Ключ без этого префикса подпись настройки не создаёт.

## Смотрите также

- [modX.lexicon](extending-modx/modx-class/reference/modx.lexicon "modX.lexicon")
- [Пространства имён](extending-modx/namespaces "Пространства имён")
- [locale](building-sites/settings/locale)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture")