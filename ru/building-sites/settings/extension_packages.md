---
title: "extension_packages"
translation: "building-sites/settings/extension_packages"
---

## extension_packages

-   **Имя**: Расширяющие пакеты
-   **Тип**: String (JSON-массив пар «ключ — значение»)
-   **По умолчанию**: (пусто)

Настройка autoload-пакетов, которые расширяют базовые классы, например `modUser`. Формат — JSON-массив пар, где ключ — пространство имён (имя пакета), а значение — путь к его модели.

Настройка не входит в установочный транспорт. Она создаётся автоматически при первом вызове `addExtensionPackage()`, поэтому на новой установке строки `extension_packages` нет, пока какой-либо пакет не зарегистрируется.

Эффект похож на другие фреймворки (например, CodeIgniter), где базовые классы переопределяются через префикс `MY_`.

Используйте это только для классов, которые задействованы во время **initialize()**.

### Пример значения

```json
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]
```

Можно использовать плейсхолдер `[[++core_path]]`.

### Другой пример

Если расширение использует другой префикс таблиц, укажите его ключом **tablePrefix**:

```json
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/","tablePrefix":"ext_"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]
```

## Связанные функции

Функции `addExtensionPackage` и `removeExtensionPackage` добавляют и удаляют записи в настройке **extension_packages**.

### addExtensionPackage

```php
boolean addExtensionPackage ([string $pkg = ''], [string $modelpath = ''], [array $options = array()])
```

Аргумент `$pkg` задаёт подкаталог в каталоге модели. Обычно он совпадает с пространством имён пакета, но у пакета может быть несколько подкаталогов. В массиве `$options` можно указать `tablePrefix`:

```php
$modx->addExtensionPackage('mypkg', '/path/to/core/components/mypkg/model/', array('tablePrefix'=>'mypre_'));
```

### removeExtensionPackage

Удаляет запись из массива **extension_packages**:

```php
boolean removeExtensionPackage (string $pkg = '')
```
