---
title: "Дружественные URL на lighttpd"
_old_id: "169"
_old_uri: "2.x/getting-started/installation/basic-installation/lighttpd-guide"
translation: "getting-started/friendly-urls/lighttpd"
---

lighttpd не использует `.htaccess` в стиле Apache. Правила перезаписи для дружественных URL задают в `lighttpd.conf` (на Linux часто `/etc/lighttpd/lighttpd.conf`).

Такая схема для MODX встречается редко. По возможности выберите [Apache](getting-started/friendly-urls/apache) или [nginx](getting-started/friendly-urls/nginx). Когда перезапись заработает, завершите шаги MODX из [Использование дружественных URL](getting-started/friendly-urls).

## Включите mod_rewrite

1. Откройте `lighttpd.conf`.
2. Найдите `server.modules`.
3. Убедитесь, что `mod_rewrite` указан и не закомментирован.
4. Перезагрузите lighttpd после сохранения.

## Добавьте правила перезаписи

Найдите блок хоста / document-root для сайта, например:

``` lighttpd
$SERVER["socket"] == ":80" {
 $HTTP["host"] =~ "example.com" {
 server.document-root = "/var/www/example.com"
 server.name = "example.com"
```

Добавьте правила под этим хостом, чтобы существующие файлы и пути `assets`, `manager`, `connectors` и `.well-known` не перезаписывались. `core/` намеренно не включён в список, чтобы его файлы (например `core/docs/changelog.txt`) никогда не отдавались как статические — запросы уходят в MODX и получают 404:

``` lighttpd
    url.rewrite-once = (
        "^/(assets|manager|connectors|\.well-known)(.*)$" => "/$1/$2",
        "^/(?!index\.php)(.*)\?(.*)$" => "/index.php?q=$1&$2",
        "^/(?!index\.php)(.*)$" => "/index.php?q=$1"
    )
```

## Исключите дополнительные пути

lighttpd пропускает только перечисленные пути. Чтобы защитить ещё один веб-доступный каталог, расширьте первый шаблон через `|dirname`, например `(assets|manager|connectors|media)`. Добавьте в тот же шаблон `|robots\.txt|/favicon\.ico`, если эти файлы лежат в корне документа и должны отдаваться напрямую.

Эти правила рассчитаны на lighttpd 1.4.x: он матчит полный URI запроса, включая query string.

Перезагрузите lighttpd, затем включите дружественные URL в Менеджере и очистите кеш.
