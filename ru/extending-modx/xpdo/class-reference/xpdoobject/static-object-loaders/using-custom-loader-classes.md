---
title: "Использование пользовательских классов загрузчика"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/using-custom-loader-classes"
---

Вы можете предоставить любой из следующих статических методов в своих пользовательских производных классах `xPDOObject` для переопределения их поведения, в том числе в классах, зависящих от драйвера:

-   `_loadRows`
-   `_loadInstance`
-   `_loadCollectionInstance`
-   `load`
-   `loadCollection`
-   `loadCollectionGraph`

Это делается с помощью метода `xPDO::call()`.

Переопределение этих методов позволяет вам реализовать дополнительное поведение или полностью изменить поведение загрузки ваших табличных объектов через методы объекта и коллекции, предоставляемые [xPDO](extending-modx/xpdo "xPDO") и [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject"). Например, его можно использовать для проверки безопасности или для добавления обработки i18n перед загрузкой строки.

До версии 2.0.0-pl можно указывать пользовательские классы загрузчиков, которые расширяют или переопределяют поведение загрузчиков объектов по умолчанию, указав эти классы в массиве параметров xPDO при создании экземпляра экземпляра xPDO.

```php
$xpdo = new xPDO($dsn, $username, $password, array(
    xPDO::OPT_LOADER_CLASSES => array('myCustomLoaderClass')
));
```
