---
title: "Session Garbage Collection"
description: "Why the modx_session table grows, how PHP session GC works with modSessionHandler, and how to keep sessions pruned"
---

## Session Garbage Collection

By default Revolution stores sessions in the database with [`MODX\Revolution\modSessionHandler`](building-sites/settings/session_handler_class) (table `{table_prefix}session`, often `modx_session`). PHP must run session garbage collection (GC) on that handler, or expired rows stay forever.

On many hosts, especially Debian and Ubuntu, `session.gc_probability` is `0` because the OS cleans **file** sessions with a cron job. That cron does **not** touch the MODX session table. SiteDash data around 2021 suggested roughly three in ten MODX sites had no working GC. Tables of several gigabytes and dead sites are a known outcome ([modxcms/revolution#16275](https://github.com/modxcms/revolution/issues/16275)).

Setup in current Revolution releases warns when GC probability is zero ([modxcms/revolution#16448](https://github.com/modxcms/revolution/pull/16448)). Existing installs still need a manual check.

### How GC runs

On a share of requests, PHP calls the session handler’s `gc()` method. Probability is:

`session.gc_probability` / `session.gc_divisor`

Example: `1` / `100` means about 1% of requests run GC.

`modSessionHandler::gc()` deletes session rows whose `access` timestamp is older than [`session_gc_maxlifetime`](building-sites/settings/session_gc_maxlifetime) (seconds). Default is `604800` (seven days). That setting also drives `session.gc_maxlifetime` when MODX starts the session.

If `session.gc_probability` is `0`, `gc()` never runs. New visits keep inserting rows. The table only grows.

### Check your server

In SSH or a one-off PHP script:

```bash
php -i | grep -E 'session.gc_probability|session.gc_divisor|session.gc_maxlifetime'
```

Or create a temporary PHP file:

```php
<?php
header('Content-Type: text/plain');
foreach (['session.gc_probability', 'session.gc_divisor', 'session.gc_maxlifetime'] as $key) {
    echo $key, '=', ini_get($key), PHP_EOL;
}
```

Remove the file after you read the values.

In MySQL, watch table size and row count:

```sql
SHOW TABLE STATUS LIKE 'modx_session';
SELECT COUNT(*) FROM modx_session;
```

Use your real table prefix if it is not `modx_`.

### Fix it: enable PHP session GC

Prefer a lasting php.ini (or pool) change so every request sees the same values:

```ini
session.gc_probability = 1
session.gc_divisor = 100
```

`1` / `100` is a common starting point. Raise probability only if the table still grows under heavy traffic.

If you cannot edit the main php.ini:

- Some hosts allow `.user.ini` in the web root with the same keys.
- Apache with `AllowOverride` may accept `php_value session.gc_probability 1` in `.htaccess`.
- PHP-FPM: set the values in the pool config and reload PHP.

Confirm with `php -i` (CLI) **and** a web `ini_get()` script. CLI and the web SAPI often load different ini files.

After GC runs again, old rows drop according to [`session_gc_maxlifetime`](building-sites/settings/session_gc_maxlifetime). Align that setting with [`session_cookie_lifetime`](building-sites/settings/session_cookie_lifetime) so cookies and DB cleanup agree.

### Fix it: scheduled cleanup when you cannot change ini

If the host locks `session.gc_probability` at `0`, schedule your own cleanup.

**Option A — cron that boots MODX and calls GC** (adjust paths):

```bash
# Daily example
0 3 * * * php /path/to/public_html/core/components/your-tool/session-gc.php
```

A minimal CLI script that loads MODX and runs handler GC (put it outside the web root when you can; adjust paths):

```php
<?php
define('MODX_API_MODE', true);
require '/path/to/config.core.php';
require MODX_CORE_PATH . 'vendor/autoload.php';
$modx = \MODX\Revolution\modX::getInstance();
$modx->initialize('web');
$handler = new \MODX\Revolution\modSessionHandler($modx);
$handler->gc(0);
```

Prefer a small Extra or a documented project script over dropping ad-hoc files in the web root.

**Option B — SQL cron** for expired rows (match `session_gc_maxlifetime`, default seven days):

```sql
DELETE FROM modx_session
WHERE access < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 7 DAY));
```

Run this only when you understand the lifetime you want. Wrong intervals log users out early.

### Emergency: clear all sessions

Manager menu **Manage → Logout All Users** truncates the session table via `modSessionHandler::flushSessions()`. Everyone is logged out, including you. Use this when the table is already huge and you need space now. Then enable GC or a cron so it does not fill again.

You can also `TRUNCATE TABLE modx_session;` in SQL with the same effect.

### Installer check

New installs run `_checkSessionsGarbageCollector()`. If probability is `0`, Setup tries `ini_set('session.gc_probability', 1)` for the setup process and shows a warning with the current probability and divisor. A successful `ini_set` during Setup does **not** permanently fix the server. You still need php.ini, pool config, or a cron for production.

### Related settings

| Setting | Role |
| --- | --- |
| [`session_handler_class`](building-sites/settings/session_handler_class) | Default `MODX\Revolution\modSessionHandler` stores sessions in the DB. Empty uses PHP’s default (often files). |
| [`session_gc_maxlifetime`](building-sites/settings/session_gc_maxlifetime) | Age in seconds before GC deletes a session row. Default `604800`. |
| [`session_cookie_lifetime`](building-sites/settings/session_cookie_lifetime) | Browser cookie lifetime. Keep in mind next to GC max lifetime. |
| [`session_enabled`](building-sites/settings/session_enabled) / [`anonymous_sessions`](building-sites/settings/anonymous_sessions) | When sessions start for front-end traffic. |

### See also

- [PHP session.gc_probability](https://www.php.net/manual/en/session.configuration.php#ini.session.gc-probability)
- [modxcms/revolution#16275](https://github.com/modxcms/revolution/issues/16275)
- [Hardening MODX Revolution](getting-started/maintenance/securing-modx)
