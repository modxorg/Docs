---
title: "extension_packages"
translation: "building-sites/settings/extension_packages"
---

## extension\_packages

**Имя**: Extension Packages
**Тип**: String(a JSON encoded array of key value pairs)
**По умолчанию**: Да

Используйте этот параметр для автозагрузки пакетов, расширяющих базовые классы, например, если вы расширяете modUser. Формат должен быть массивом JSON пар «key/value», где ключ - это пространство имен (то есть имя пакета), а значение - путь к его модели.

Этот эффект здесь аналогичен другим структурам, например, CodeIgniter, который позволяет переопределять базовые классы с помощью специального префикса имени класса "MY\_".

Используйте это только тогда, когда вы расширяете основные классы, которые используются во время **initialize()**

### Sample value

 ``` json
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]
```

Вы можете использовать

``` php
[[++core_path]]
```

плейсхолдеры.

### Другой пример

Если ваше расширение использует другой префикс таблицы, вы должны указать это в своем JSON, используя **tablePrefix** ключ, например:

 ``` json
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/","tablePrefix":"ext_"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]
```

## Связанные функции

В какой-то момент в истории последних версий `addExtensionPackage` и `removeExtensionPackage` удобные функции были добавлены для облегчения добавления и удаления данных в настройках **extension\_packages**.

### addExtensionPackage

``` php
boolean addExtensionPackage ([string $pkg = ''], [string $modelpath = ''], [array $options = array()])
```

Аргумент `$pkg` действительно указывает подпапку в названной директории модели. В большинстве пакетов это имя совпадает с пространством имен пакета, но другие пакеты могут указывать несколько подпапок в своей модели. Обратите внимание, что массив `$options` может указывать ключ "tablePrefix", например:

``` php
$modx->addExtensionPackage('mypkg', '/path/to/core/components/mypkg/model/', array('tablePrefix'=>'mypre_'));
```

### removeExtensionPackage

Когда пришло время для очистки, удалите ваш узел из **extension\_packages** массива, используя эту вспомогательную функцию:

``` php
boolean removeExtensionPackage (string $pkg = '')
```
