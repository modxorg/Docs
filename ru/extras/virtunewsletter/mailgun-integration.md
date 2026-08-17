---
title: "Интеграция Mailgun"
description: "Настройка отправки virtuNewsletter через Mailgun SDK"
translation: "extras/virtunewsletter/mailgun-integration"
---

 С версии v.2.0.0-rc1 virtuNewsletter поддерживает [mailgun](http://mailgun.com).

 Для настройки:

1. скачайте Official SDK for PHP Mailgun с <https://github.com/mailgun/mailgun-php>,
2. [](https://github.com/mailgun/mailgun-php,)положите файлы в core/components/virtunewsletter/vendors/mailgun-php (уберите суффикс «-master», если есть),
3. запустите composer в этой папке,
4. обновите System Settings: «virtunewsletter.mailgun.endpoint»: URL домена (или sandbox) из dashboard Mailgun,
5. заполните «virtunewsletter.mailgun.api\_key» API key этого URL.

 virtuNewsletter не использует batchMessage Mailgun. Письма отправляются по одному.

 Так сделано для парсинга плейсхолдеров и output filters.

 При запуске cron растёт потребление памяти.

 Чтобы избежать out of memory, уменьшите «virtunewsletter.email\_limit». Рекомендуется 30.
