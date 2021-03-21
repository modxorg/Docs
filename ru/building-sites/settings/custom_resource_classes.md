---
title: "custom_resource_classes"
translation: "building-sites/settings/custom_resource_classes"
description: "Разделенный запятыми список пользовательских классов ресурсов"
---

## custom_resource_classes

-   **Имя**: Пользовательский класс ресурсов
-   **Тип**: String
-   **По умолчанию**:
-   **Удалено в**: Revolution 2.2.0

Разделенный запятыми список пользовательских классов ресурсов. Укажите `lowercase_lexicon_key:className` (например:`wiki_resource:WikiResource`). Все пользовательские классы ресурсов должны расширять modResource. Чтобы указать расположение контроллера для каждого класса, добавьте параметр с помощью `nameOfClassLowercase_delegate_path` с путем к каталогу файлов php создания/обновления. Пример: `wikiresource_delegate_path` для класса `WikiResource`, который расширяет modResource.
