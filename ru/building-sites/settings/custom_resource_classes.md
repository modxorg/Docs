---
title: "custom_resource_classes"
translation: "building-sites/settings/custom_resource_classes"
---

## custom\_resource\_classes

**Имя**: Custom Resource Classes
**Тип**: String
**По умолчанию**:

Разделенный запятыми список пользовательских классов ресурсов. Укажите lowercase\_lexicon\_key:className (например: wiki\_resource:WikiResource). Все пользовательские классы ресурсов должны расширять modResource. Чтобы указать расположение контроллера для каждого класса, добавьте параметр с помощью \[nameOfClassLowercase\]\_delegate\_path с путем к каталогу файлов php создания/обновления. Пример: wikiresource\_delegate\_path для класса WikiResource, который расширяет modResource.
