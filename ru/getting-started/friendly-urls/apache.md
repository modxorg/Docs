---
title: "Дружественные URL на Apache"
description: "Дружественные URL на Apache с mod_rewrite."
translation: "getting-started/friendly-urls/apache"
---

MODX поставляет файл `ht.access` в корне сайта. Apache игнорирует его, пока вы не переименуете или не скопируете его в `.htaccess`. Нужен включённый `mod_rewrite`.

Настройки MODX (`friendly_urls`, base href, кеш) описаны на странице [Использование дружественных URL](getting-started/friendly-urls).

## Минимальные правила

Для установки в корень сайта используйте минимум следующее. Эти правила оставляют доступным `.well-known/` для Let's Encrypt, запрещают остальные dotfiles, скрытые каталоги (например `.git`) и прямой доступ к `core/`:

``` apache
RewriteEngine On
RewriteBase /

# Allow .well-known (Let's Encrypt and similar)
RewriteRule "^\.well-known/" - [L]

# Block other dotfiles / hidden directories and core/
RewriteRule "/\.|^\.(?!well-known/)|^core(/|$)" - [F]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
```

В поставляемом `ht.access` также есть закомментированные редиректы HTTPS и www. Для более жёсткой блокировки (`config.core.php`, `_build/` и связанных путей) см. [Усиление безопасности MODX](getting-started/maintenance/securing-modx).

## Установка в подкаталог

Если MODX стоит в подкаталоге, задайте `RewriteBase` с этим путём, включая завершающий слэш:

``` apache
RewriteBase /subdirectoryName/
```

Чаще всего это нужно на локальных установках в подпапке.

## Куда положить `.htaccess`

Поместите файл в корень сайта MODX (рядом с `index.php`, `manager/`, `connectors/`). Он может лежать выше по дереву, но обычно его кладут в корень сайта.

Если у хостера в этой директории уже есть `.htaccess`, объединяйте аккуратно: сделайте резервную копию, затем добавьте блок перезаписи MODX ниже правил хостера, если документация хостера не говорит иначе.

## Необязательно: принудительный www или домен без www

Раскомментируйте только один из блоков www в `ht.access` и замените пример домена на свой. Пример редиректа `www.yoursite.com` на `yoursite.com` по HTTPS:

``` apache
RewriteCond %{HTTP_HOST} .
RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
```

## Необязательно: принудительный HTTPS

``` apache
RewriteCond %{HTTPS} !=on [OR]
RewriteCond %{SERVER_PORT} !^443
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## Необязательно: убрать дубликаты `/index.php`

Поисковики считают `/`, `/index.php` и похожие URL дублирующим контентом. Типичное исправление:

``` apache
RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /index\.(php|html|htm)\ HTTP/
RewriteRule ^(.*)index\.(php|html|htm)$ $1 [R=301,L]
```

Перед правками всегда сохраняйте рабочую резервную копию `.htaccess`. Синтаксическая ошибка может полностью отключить сайт, пока вы не восстановите файл.
