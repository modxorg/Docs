---
title: "Серверы с ModSecurity"
_old_id: "166"
_old_uri: "2.x/getting-started/installation/basic-installation/installation-on-a-server-running-modsecurity"
translation: "getting-started/installation/troubleshooting/modsecurity"
---

[ModSecurity](https://github.com/owasp-modsecurity/ModSecurity): WAF, часто как модуль Apache (`security2_module`). Наборы правил могут блокировать запросы, похожие на атаки.

Manager MODX отправляет много данных через `connectors/`. Часть запросов (особенно при сохранении TV, ресурсов и другого структурированного контента) попадает под generic SQL-injection и похожие правила. Тогда действие в Manager падает. Иногда видна только общая ошибка или тихий сбой. Смотрите логи Apache / ModSecurity.

Правка конфигурации Apache или ModSecurity может положить сайт. Если не уверены, обратитесь к хостеру или администратору. Многие хостинги добавляют правило в whitelist, если вы дадите id правила и URI из лога.

## Проверка, установлен ли ModSecurity

Спросите хостера или проверьте сами.

### WHM / cPanel

1. Войдите в WHM (часто `https://yoursite.com:2087/`).
2. В разделе **Plugins** найдите **Mod Security**.

![](modsecurity-whm.jpg)

### Командная строка

Список загруженных модулей Apache:

``` bash
apachectl -t -D DUMP_MODULES
```

Если `apachectl` нет в `PATH`, найдите его (например `find / -name apachectl 2>/dev/null`) и вызовите с полным путём. ModSecurity обычно отображается как `security2_module (shared)`.

Также можно искать `security2_module` или `mod_security` в основном конфиге Apache (часто `/etc/httpd/` или `/usr/local/apache/conf/`) и подключаемых каталогах.

## Логи

Воспроизведите сбой в Manager и смотрите error log Apache (путь зависит от хостинга):

``` bash
tail -f /usr/local/apache/logs/error_log
```

При наличии проверьте audit log ModSecurity, например `/usr/local/apache/logs/modsec_audit.log`.

### Что записать из ошибки

Пример:

``` text
[Sat Nov 19 19:16:32 2011] [error] [client 123.123.123.123] ModSecurity: Access denied with code 500 (phase 2).
Pattern match "(insert[[:space:]]+into.+values|select.*from.+[a-z|A-Z|0-9]|select.+from|bulk[[:space:]]+insert|union.+select|convert.+\\\\(.*from)"
at ARGS:els.
[file "/usr/local/apache/conf/modsec2.user.conf"]
[line "359"]
[id "300016"]
[rev "2"]
[msg "Generic SQL injection protection"]
[severity "CRITICAL"]
[hostname "yoursite.com"]
[uri "/connectors/element/tv.php"]
[unique_id "TshG4EWntHMAAAfIFmUAAAAI"]
```

Запишите:

- **Rule id**: `[id "300016"]`
- **Host**: `[hostname "yoursite.com"]`
- **URI**: `[uri "/connectors/element/tv.php"]`

Они нужны, чтобы снять конкретное правило только для этого пути.

## Whitelist правила для URI

Лучше узкий whitelist: убрать конкретный rule id для конкретного Location, а не отключать ModSecurity на всём сайте.

### Куда положить правило

На многих cPanel/WHM серверах основной `httpd.conf` править не стоит. Добавьте небольшой include в userdata vhost, на который ссылается блок `VirtualHost` домена, например:

- `/usr/local/apache/conf/userdata/std/2/USERNAME/*.conf`
- `/usr/local/apache/conf/userdata/std/2/USERNAME/yoursite.com/*.conf`

Серверные allow list иногда лежат в `/usr/local/apache/conf/modsec2/whitelist.conf`. Пути различаются. Используйте то, что уже подключает ваш Apache через `Include`.

Перед правками сделайте backup. На cPanel можно пересобрать конфиг:

``` bash
cd /usr/local/apache/conf
cp -p httpd.conf httpd.conf.backup
/scripts/rebuildhttpdconf
```

### Пример whitelist

Из примера лога выше:

``` apache
<LocationMatch "/connectors/element/tv.php">
 <IfModule mod_security2.c>
 SecRuleRemoveById 300016
 </IfModule>
</LocationMatch>
```

Несколько id можно указать в одной строке или несколькими директивами `SecRuleRemoveById`. Если переименовали `connectors/` или сменили путь сайта, обновите `LocationMatch`.

Другим connector или URL Manager могут понадобиться свои записи по мере нахождения в логах, например:

``` apache
<LocationMatch "/connectors/resource/index.php">
 <IfModule mod_security2.c>
 SecRuleRemoveById 300013 300014 300015 300016
 </IfModule>
</LocationMatch>
```

Затем reload или restart Apache (зависит от хостинга, например `systemctl reload httpd` или `/etc/init.d/httpd restart`). На cPanel сначала пересоберите conf, если так подключаются includes, затем перезапустите.

Если Apache не стартует, верните backup и исправьте синтаксис.

## Большие загрузки / статические ресурсы

Лимиты request body в ModSecurity могут обрезать большие загрузки (в том числе крупные Static Resources), иногда около 64 KB, иногда **без** явной строки в логе.

В WHM Mod Security → Edit Config проверьте:

- `SecRequestBodyAccess`
- `SecRequestBodyLimit`
- `SecRequestBodyInMemoryLimit`

Для location только на скачивание иногда нужно ослабить или отключить body access, например:

``` apache
SecRequestBodyAccess Off
```

(Только там, где это уместно. Не как глобальный default без понимания tradeoff.)

Похожее обрезание бывает при double gzip (nginx и Apache сжимают одновременно). Исключите это, прежде чем винить ModSecurity.

## Смотрите также

- [Безопасность MODX](getting-started/maintenance/securing-modx)
- [Устранение неполадок при установке](getting-started/installation/troubleshooting)
- [Справочник ModSecurity](https://github.com/owasp-modsecurity/ModSecurity/wiki)
