---
title: "Сборка мусора сессий"
translation: "getting-started/maintenance/session-garbage-collection"
description: "Почему растёт таблица modx_session, как PHP session GC работает с modSessionHandler и как чистить просроченные сессии"
---

По умолчанию Revolution хранит сессии в базе через [`MODX\Revolution\modSessionHandler`](building-sites/settings/session_handler_class) (таблица `{table_prefix}session`, часто `modx_session`). PHP должен вызывать сборку мусора (GC) у этого обработчика. Иначе просроченные строки остаются навсегда.

На многих хостингах, особенно Debian и Ubuntu, `session.gc_probability` равен `0`: ОС чистит **файловые** сессии своим cron. Этот cron **не** трогает таблицу сессий MODX. По данным SiteDash около 2021 года примерно у трёх из десяти сайтов на MODX GC не работал. Таблицы на несколько гигабайт и падение сайта — известный исход ([modxcms/revolution#16275](https://github.com/modxcms/revolution/issues/16275)).

В текущих релизах Setup предупреждает, если вероятность GC равна нулю ([modxcms/revolution#16448](https://github.com/modxcms/revolution/pull/16448)). Уже установленные сайты всё равно нужно проверить вручную.

## Как запускается GC

На части запросов PHP вызывает метод `gc()` у обработчика сессий. Шанс равен `session.gc_probability` / `session.gc_divisor`: при `1` / `100` GC запускается примерно на 1% запросов.

`modSessionHandler::gc()` удаляет строки сессий, у которых `access` старше [`session_gc_maxlifetime`](building-sites/settings/session_gc_maxlifetime) секунд. По умолчанию `604800` (семь дней). Эта настройка также задаёт `session.gc_maxlifetime` при старте сессии в MODX.

Если `session.gc_probability` равен `0`, `gc()` не вызывается. Новые визиты добавляют строки. Таблица только растёт.

## Проверка сервера

В SSH или одноразовом PHP-скрипте:

```bash
php -i | grep -E 'session.gc_probability|session.gc_divisor|session.gc_maxlifetime'
```

Или временный PHP-файл:

```php
<?php
header('Content-Type: text/plain');
foreach (['session.gc_probability', 'session.gc_divisor', 'session.gc_maxlifetime'] as $key) {
    echo $key, '=', ini_get($key), PHP_EOL;
}
```

После просмотра значений файл удалите.

В MySQL смотрите размер и число строк:

```sql
SHOW TABLE STATUS LIKE 'modx_session';
SELECT COUNT(*) FROM modx_session;
```

Подставьте свой префикс таблиц, если это не `modx_`.

## Исправление: включить PHP session GC

Лучше закрепить значения в php.ini (или в pool PHP-FPM), чтобы их видел каждый запрос:

```ini
session.gc_probability = 1
session.gc_divisor = 100
```

`1` / `100` — нормальная отправная точка. Поднимайте вероятность, только если таблица всё ещё растёт при высокой нагрузке.

Если основной php.ini недоступен:

- часть хостингов допускает `.user.ini` в корне сайта с теми же ключами;
- Apache с `AllowOverride` может принять `php_value session.gc_probability 1` в `.htaccess`;
- PHP-FPM: задайте значения в конфиге pool и перезагрузите PHP.

Проверьте и `php -i` (CLI), и веб-скрипт с `ini_get()`. У CLI и веб-SAPI часто разные ini.

Когда GC снова работает, старые строки уходят по [`session_gc_maxlifetime`](building-sites/settings/session_gc_maxlifetime). Согласуйте эту настройку с [`session_cookie_lifetime`](building-sites/settings/session_cookie_lifetime), чтобы сроки cookie и очистки совпадали.

## Исправление: cron, если нельзя менять php.ini

Если хостинг держит `session.gc_probability` на `0`, поставьте свою очистку по расписанию.

**Вариант A — cron, который поднимает MODX и вызывает GC** (пути поправьте):

```bash
# Пример: раз в сутки
0 3 * * * php /path/to/public_html/core/components/your-tool/session-gc.php
```

Минимальный CLI-скрипт, который поднимает MODX и вызывает GC обработчика (по возможности держите вне веб-корня):

```php
<?php
define('MODX_API_MODE', true);
require '/path/to/config.core.php';
require MODX_CORE_PATH . 'vendor/autoload.php';
$modx = \MODX\Revolution\modX::getInstance();
$modx->initialize('web');
$handler = new \MODX\Revolution\modSessionHandler($modx);
$handler->gc(0); // аргумент игнорируется: границей всегда служит session_gc_maxlifetime
```

У `modSessionHandler::gc($max)` параметр `$max` не используется — строки удаляются только по настройке [`session_gc_maxlifetime`](building-sites/settings/session_gc_maxlifetime) (поэтому подойдёт любое целое, например `0`).

Лучше небольшой компонент или скрипт проекта, чем случайный файл в веб-корне.

**Вариант B — SQL по cron** для просроченных строк (срок как у `session_gc_maxlifetime`, по умолчанию семь дней):

```sql
DELETE FROM modx_session
WHERE access < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 7 DAY));
```

Запускайте только если понимаете нужный срок жизни. Слишком короткий интервал выкинет пользователей раньше времени.

## Аварийно: очистить все сессии

В Менеджере пункт **Доступ → Завершить все сеансы** (меню пользователя справа сверху, разрешение `flush_sessions`) очищает таблицу через `modSessionHandler::flushSessions()`. Выходят все, включая вас.

Так делают, когда таблица уже огромная и нужно место сейчас. Затем включите GC или cron, иначе она снова заполнится.

Тот же эффект даёт `TRUNCATE TABLE modx_session;` в SQL.

## Проверка в установщике

Новые установки вызывают `_checkSessionsGarbageCollector()`. При вероятности `0` Setup пробует `ini_set('session.gc_probability', 1)` на время установки и показывает предупреждение с текущими probability и divisor. Удачный `ini_set` в Setup **не** чинит сервер навсегда: для постоянного эффекта нужны php.ini, pool или cron.

## Связанные настройки

| Настройка | Назначение |
| --- | --- |
| [`session_handler_class`](building-sites/settings/session_handler_class) | По умолчанию `MODX\Revolution\modSessionHandler` пишет сессии в БД. Пустое значение — стандартный обработчик PHP (часто файлы). |
| [`session_gc_maxlifetime`](building-sites/settings/session_gc_maxlifetime) | Возраст в секундах, после которого GC удаляет строку. По умолчанию `604800`. |
| [`session_cookie_lifetime`](building-sites/settings/session_cookie_lifetime) | Время жизни cookie в браузере. Смотрите рядом с max lifetime GC. |
| [`session_cookie_secure`](building-sites/settings/session_cookie_secure), [`session_cookie_httponly`](building-sites/settings/session_cookie_httponly), [`session_cookie_samesite`](building-sites/settings/session_cookie_samesite), [`session_cookie_path`](building-sites/settings/session_cookie_path), [`session_cookie_domain`](building-sites/settings/session_cookie_domain) | Как выставляется cookie сессии (только HTTPS, запрет доступа из JS, SameSite, область видимости). |
| [`cache_db_session`](building-sites/settings/cache_db_session), [`cache_db_session_lifetime`](building-sites/settings/cache_db_session_lifetime) | Кэшируют строки сессий в кэше MODX вместо чтения из таблицы на каждом запросе; время жизни — четверть от `session_gc_maxlifetime`. |
| [`session_enabled`](building-sites/settings/session_enabled) / [`anonymous_sessions`](building-sites/settings/anonymous_sessions) | Когда на фронтенде стартуют сессии. Примечание: `session_enabled` не поставляется системной настройкой — ядро читает её со значением по умолчанию `true`, поэтому для переключения её нужно создать вручную (System Settings → Add). |

## Смотрите также

- [PHP session.gc_probability](https://www.php.net/manual/ru/session.configuration.php#ini.session.gc-probability)
- [modxcms/revolution#16275](https://github.com/modxcms/revolution/issues/16275)
- [Усиление безопасности MODX Revolution](getting-started/maintenance/securing-modx)
