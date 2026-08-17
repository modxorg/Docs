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

Добавьте правила под этим хостом, чтобы существующие файлы и деревья `assets`, `manager`, `core` и `connectors` не перезаписывались:

``` lighttpd
 url.rewrite-once = (
 "^/(assets|manager|core|connectors)(.*)$" => "/$1/$2",
 "^/(?!index(?:-ajax)?\.php)(.*)\?(.*)$" => "/index.php?q=$1&$2",
 "^/(?!index(?:-ajax)?\.php)(.*)$" => "/index.php?q=$1"
 )
```

## Исключите дополнительные пути

lighttpd пропускает только перечисленные пути. Чтобы защитить ещё один веб-доступный каталог, расширьте первый шаблон через `|dirname`, например `(assets|manager|core|connectors|media)`.

Перезагрузите lighttpd, затем включите дружественные URL в Менеджере и очистите кеш.
