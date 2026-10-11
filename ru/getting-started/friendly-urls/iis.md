---
title: "Дружественные URL на IIS"
description: "Перезапись дружественных URL на Microsoft IIS с модулем URL Rewrite"
translation: "getting-started/friendly-urls/iis"
---

Эта страница нужна, если MODX работает на Microsoft IIS и нужны дружественные URL (FURL). На Apache используют `ht.access` / `.htaccess`. На IIS — файл `web.config` и модуль [URL Rewrite](https://www.iis.net/downloads/microsoft/url-rewrite).

Базовые правила ниже применяются к IIS 7 и новее, включая актуальные версии Windows Server.

## Требования

1. Установите на сервере модуль **IIS URL Rewrite**, если его ещё нет. Без него IIS не применяет правила из `web.config`.
2. Положите `web.config` в **корень сайта** рядом с `index.php` (на одном уровне с `assets/`, `manager/` и `connectors/`). Не кладите его в `core/`. Оттуда правила не переписывают публичные запросы к страницам.
3. Убедитесь, что сайт или приложение IIS указывает на этот корень.

## Пример `web.config`

Создайте `web.config` в корне сайта (или вставьте эти правила в уже существующий файл). Правило Friendly URLs повторяет суть корневого `ht.access` в Revolution: неизвестные пути отдаются в `index.php?q=…`.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<configuration>
  <system.webServer>
    <rewrite>
      <rules>
        <!-- Опционально: блокировать internal dummy connection, если они есть в логах -->
        <rule name="Block internal dummy connection" stopProcessing="true">
          <match url=".*" />
          <conditions>
            <add input="{HTTP_USER_AGENT}" pattern="internal dummy connection" />
          </conditions>
          <action type="CustomResponse" statusCode="403"
            statusReason="Forbidden" statusDescription="Forbidden" />
        </rule>

        <!-- Блокировать прямой доступ к внутренним путям (минимальные правила в стиле Apache) -->
        <rule name="Block internal paths" stopProcessing="true">
          <match url="^(core|_build|_gitify|_backup|config\.core\.php)(/|$)" />
          <action type="CustomResponse" statusCode="404"
            statusReason="Not Found" statusDescription="Not Found" />
        </rule>

        <rule name="MODX Friendly URLs" stopProcessing="true">
          <match url="^(.*)$" />
          <conditions logicalGrouping="MatchAll">
            <add input="{REQUEST_FILENAME}" matchType="IsFile" negate="true" />
            <add input="{REQUEST_FILENAME}" matchType="IsDirectory" negate="true" />
          </conditions>
          <action type="Rewrite" url="index.php?q={R:1}" appendQueryString="true" />
        </rule>
      </rules>
    </rewrite>
  </system.webServer>
</configuration>
```

Если MODX лежит в подкаталоге (например `/modx`), поправьте `url` в rewrite так, чтобы он указывал на `index.php` этой папки, либо сделайте корень приложения IIS равным web-корню MODX. Тогда пример выше можно не менять.

## Необязательно: принудительный www или HTTPS

Добавьте эти правила **выше** правила Friendly URLs в том же блоке `<rules>` и замените примерные домены на свои:

```xml
<!-- Принудительно канонический хост (www -> домен без www) -->
<rule name="Redirect www to apex" stopProcessing="true">
  <match url="^(.*)$" />
  <conditions>
    <add input="{HTTP_HOST}" pattern="^www\.(.+)$" />
  </conditions>
  <action type="Redirect" url="https://{C:1}/{R:1}"
    redirectType="Permanent" appendQueryString="true" />
</rule>

<!-- Принудительно HTTPS -->
<rule name="Redirect to HTTPS" stopProcessing="true">
  <match url="^(.*)$" />
  <conditions>
    <add input="{HTTPS}" pattern="off" ignoreCase="true" />
  </conditions>
  <action type="Redirect" url="https://{HTTP_HOST}/{R:1}"
    redirectType="Permanent" appendQueryString="true" />
</rule>
```

Без этих правил `www` и домены без www (и HTTP вместе с HTTPS) отдают дублирующийся контент — по той же причине в руководстве по Apache в `ht.access` идут закомментированные блоки www/HTTPS.

## Включение Friendly URLs в MODX

Включайте FURL в панели управления **после** того, как rewrite уже работает.

1. Откройте в браузере URL без реального файла (например `/about`) и проверьте, что IIS отдаёт запрос в MODX, а не статический 404.
2. В **Системных настройках** поставьте `friendly_urls` в Yes.
3. Очистите кэш сайта.
4. В шаблоне(ах) задайте базовый URL, чтобы CSS и JS продолжали грузиться, например:

```html
<base href="[[!++site_url]]" />
```

Если включить `friendly_urls` до рабочего rewrite, ссылки на ресурсы станут «красивыми», а стили и скрипты сломаются. Сначала почините rewrite, потом меняйте настройку.

## Мультиязычные сайты

Дополнения вроде Babel или XRouting сначала требуют рабочих FURL. Когда базовое правило выше уже работает, добавьте дополнительные правила IIS из документации этих дополнений (префиксы языка, домены). В типичном случае на IIS мультиязычность «не ехала», пока не стояли URL Rewrite и корневой `web.config`.

## См. также

- [Использование дружественных URL](getting-started/friendly-urls)
- [Усиление безопасности MODX](getting-started/maintenance/securing-modx)
- [Расширенная установка](getting-started/installation/advanced)
- [Дружественные URL на nginx](getting-started/friendly-urls/nginx)
- [Дружественные URL на lighttpd](getting-started/friendly-urls/lighttpd)
