---
title: "FAQ и устранение неполадок"
sortorder: 8
_old_id: "1689"
_old_uri: "2.x/faqs-and-troubleshooting"
translation: "getting-started/faqs-and-troubleshooting"
---

Частые вопросы и быстрые решения для MODX 3. Не получилось? Спросите в [сообществе MODX](https://community.modx.com) или [Slack](https://modx.org).

## Связанные материалы по устранению неполадок

- [Устранение неполадок при установке](getting-started/installation/troubleshooting)
- [Устранение неполадок при обновлении](getting-started/maintenance/upgrading/troubleshooting)
- [Устранение неполадок при управлении пакетами](building-sites/extras/troubleshooting)
- [Устранение неполадок безопасности](building-sites/client-proofing/security/troubleshooting-security)
- [FAQ и устранение неполадок при разработке CMP](extending-modx/custom-manager-pages/troubleshooting)

## 1. MODX 101

### 1.1. Что такое MODX / MODX Revolution / MODX Evolution?

На форумах и в поиске часто смешивают линейки продукта. Краткая карта:

- **MODX** / **MODX Revolution 3.x** — CMS, описанная в этой документации; текущие релизы: **3.x**. Концепции см. в [Обзор MODX](getting-started/what-is-modx).
- **MODX Revolution 2.x** — предыдущая мажорная линейка Revolution. Многие боевые сайты всё ещё на ней. Переход на 3.x поддерживается при планировании; начните с [Обновление с 2.x до 3.0](getting-started/upgrading-to-3.0).
- **MODX Evolution** — отдельная старая ветка **1.x**, которую эти документы для 3.x не покрывают. Переход с неё — проект; обновления в один клик нет. См. [Обновление с Evolution](getting-started/maintenance/upgrading/evolution).

### 1.2. Какая версия PHP и сервера нужна?

См. [Требования к серверу](getting-started/server-requirements). Текущий MODX 3.x (**3.2 и новее**) требует **PHP 8.1 или выше**; до 3.2: PHP 7.2.5+ (3.0), PHP 7.4+ (3.1).

### 1.3. Какие теги можно использовать? Что такое `[[*pagetitle]]`, `[[Wayfinder]]` и т. д.?

См. [Синтаксис тегов](building-sites/tag-syntax). Поля ресурсов для тегов перечислены на странице [Ресурсы](building-sites/resources).

## 2. Менеджер

### 2.1. Куда делась боковая панель / дерево ресурсов?

Скорее всего вы её свернули: нажмите маленькую стрелку на левом краю экрана ([см. изображение](subtlearrow.PNG)), чтобы вернуть дерево. Обновите страницу, если после разворота оно пустое.

### 2.2. Как изменить, какие поля ресурса видны при редактировании?

Используйте [Настройку форм](building-sites/client-proofing/form-customization), чтобы скрыть, переименовать или переставить поля на экранах создания и редактирования ресурса (и ограничить правила группами пользователей или шаблонами).

### 2.3. Что означают modDocument / modWeblink / modSymLink / modStaticResource?

Имена классов встроенных типов ресурсов (в 3.x они в пространстве имён `MODX\Revolution\`, короткие имена всё ещё часто используют). Все отображаются в дереве ресурсов:

- [Документы](building-sites/resources) (класс `modDocument`): обычные страницы с контентом. Часто говорят «ресурс», имея в виду именно документ.
- [Веб-ссылки](building-sites/resources/weblink): редирект на другой ресурс или внешний URL
- [Симлинки](building-sites/resources/symlink): повторное использование контента другого документа по другому URL
- [Статические ресурсы](building-sites/resources/static-resource): контент берётся из файла на диске

### 2.4. В чём разница между ресурсом и документом?

Ресурс (`modResource`) — базовый класс, документ (`modDocument`) — обычная HTML-страница. В разговоре «ресурс» часто значит «та страница в дереве»: документ, веб-ссылка, симлинк или статический ресурс.

### 2.5. Меня заблокировали в Менеджере / я забыл пароль

См. [Ручной сброс пароля пользователя](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually).

### 2.6. В Менеджере ошибка 500 Internal Server Error

Попробуйте по порядку:

1. Очистите или переименуйте `core/cache/` (частая причина: повреждённый кеш).
2. Откройте Менеджер в приватном/инкognito-окне (исключит битые cookie и сессии).
3. Убедитесь, что PHP соответствует [требованиям к серверу](getting-started/server-requirements) для вашей версии MODX.
4. Проверьте `core/cache/logs/error.log`: там будет реальная PHP-ошибка. (Если на сайте задан свой PSR-3 логгер через `modX::setLogger()`, ошибки уходят туда.)

Больше случаев при установке: в [Устранение неполадок при установке](getting-started/installation/troubleshooting).

### 2.7. Менеджер пустой / показывает «undefined» / сломанная вёрстка

Не загрузились JS/CSS или битый кеш. Очистите `core/cache/`, сделайте жёсткое обновление браузера и см. чеклист сообщества: [Blank manager with undefined message](https://community.modx.com/t/blank-manager-with-undefined-message/3799/20). Также [Устранение неполадок при установке](getting-started/installation/troubleshooting), включая отключение `compress_js` / `compress_css`, если URL ресурсов не открываются.

## 3. Фронтенд и проблемы с кешем

### 3.1. Пустые страницы фронтенда, которые оживают после очистки кеша

На некоторых хостах (особенно cloud/shared) блокировка файлов при записи кеша даёт пустые страницы или 500 после сохранения, пока не удалите `core/cache/`.

В `core/config/config.inc.php` отключите flock: добавьте `use_flock` в `$config_options` и установите `false`:

``` php
$config_options = array(
    'use_flock' => false,
);
```

(Объедините с уже существующими записями `$config_options`, не заменяйте массив целиком.) При `use_flock = false` MODX использует lock-файлы в `core/cache/locks/` вместо файловой блокировки.

### 3.2. Сниппет или плагин ничего не делает

Проверьте, что он установлен и включён (Extras → Installer / дерево элементов), что имя в теге совпадает, и что вы очистили кеш после установки или правки. Закешированные страницы будут отдавать старый вывод, пока кеш не сбросите.

## 4. Обновление

### 4.1. Как обновиться в рамках 3.x или с 2.x на 3.x?

Следуйте [Обновление MODX](getting-started/maintenance/upgrading). Для любого перехода с 2.x на 3.x сначала прочитайте [Обновление с 2.x до 3.0](getting-started/upgrading-to-3.0): меняются пространства имён классов, процессоры, путь к ядру и требования к PHP. **3.2+ требует PHP 8.1+**.
