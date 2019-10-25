---
title: 'Коннекторы'
translation: "extending-modx/processors/connectors"
note: 'This is a stub. You can help by expanding it.'
---

Коннекторы - это простые PHP-файлы, которые могут использоваться статистами для демонстрации своих процессоров пользователям-менеджерам.

Коннектор ядра (`connectors/index.php`) позволяет только направлять запросы AJAX в менеджере на основные процессоры, поэтому дополнительные функции обычно размещают свои `assets/components/NAME-OF-EXTRA/connector.php`, и использовать это для своих собственных [пользовательских страниц менеджера](extending-modx/custom-manager-pages).
