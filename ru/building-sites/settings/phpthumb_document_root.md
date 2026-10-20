---
title: "phpthumb_document_root"
translation: "building-sites/settings/phpthumb_document_root"
---

## phpthumb_document_root

-   **Имя**: Разрешить перенаправление через контексты
-   **Тип**: textfield
-   **По умолчанию**:
-   **Доступно в**: 2.1+

Установите это, если у вас возникают проблемы с серверной переменной DOCUMENT_ROOT или вы получаете ошибки с OutputThumbnail или !is_resource. Укажите абсолютный корневой путь, который хотите использовать. Если поле пустое, MODX берёт `base_path` (корень установки MODX), а не серверную переменную `DOCUMENT_ROOT`.
