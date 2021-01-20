---
title: "Использование дружественных URL"
sortorder: "5"
translation: "getting-started/friendly-urls"
---

Вы можете получить дружественные URL-адреса, полностью работающие менее чем за две минуты, выполнив простой четырехэтапный процесс.

## 1) Рабочий образец .htaccess

MODX предоставляет файл ht.access для редактирования в соответствии с настройками вашего сервера. Он находится в корне сайта MODX. Этот файл будет игнорироваться сервером, пока вы не переименуете его или (лучше) скопируете его в файл с именем .htaccess. Всякий раз, когда браузер запрашивает страницу, сервер проверяет файл с именем .htaccess, который может содержать информацию о том, как должны обрабатываться различные URL-адреса.

Файл .htaccess может находиться в любом месте над установкой MODX, но обычное расположение находится в корне сайта MODX (вместе с файлом ht.access, а также каталогами assets, manager и connectors, как показано на рисунке ниже). Для большинства установок вам не нужно вносить какие-либо изменения в файл, чтобы заставить работать FURL. Есть одно изменение, которое вы должны сделать, но сначала включите FURL, и мы обсудим это изменение в конце этой страницы.

![](/2.x/en/getting-started/shawnwilkerson_09_01.jpg)

Вот файл ht.access, который поставляется с одной версией MODX (ваша версия может немного отличаться).

``` php
# MODX supports Friendly URLs via this .htaccess file. You must serve web
# pages via Apache with mod_rewrite to use this functionality, and you must
# change the file name from ht.access to .htaccess.
#
# Make sure RewriteBase points to the directory where you installed MODX.
# E.g., "/modx" if your installation is in a "modx" subdirectory.
#
# You may choose to make your URLs non-case-sensitive by adding a NC directive
# to your rule: RewriteRule ^(.*)$ index.php?q=$1 [L,QSA,NC]

RewriteEngine On
RewriteBase /


# Prevent rewrite the .well-known directory used by LetsEncrypt by rules below of this rule
RewriteRule "^\.well-known/" - [L]


# Prevent dot directories (hidden directories like .git) to be exposed to the public
# Except for the .well-known directory used by LetsEncrypt a.o
RewriteRule "/\.|^\.(?!well-known/)" - [F]


# Rewrite www.example.com -> example.com -- used with SEO Strict URLs plugin
#RewriteCond %{HTTP_HOST} .
#RewriteCond %{HTTP_HOST} ^www.(.*)$ [NC]
#RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
#
# or for the opposite example.com -> www.example.com use the following
# DO NOT USE BOTH
#
#RewriteCond %{HTTP_HOST} !^$
#RewriteCond %{HTTP_HOST} !^www\. [NC]
#RewriteCond %{HTTP_HOST} (.+)$
#RewriteRule ^(.*)$ https://www.%1/$1 [R=301,L] .


# Force rewrite to https for every host
#RewriteCond %{HTTPS} !=on [OR]
#RewriteCond %{SERVER_PORT} !^443
#RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]


# Redirect the manager to a specific domain - don't rename the ht.access file
# in the manager folder to use this this rule
#RewriteCond %{HTTP_HOST} !^example\.com$ [NC]
#RewriteCond %{REQUEST_URI} ^/manager [NC]
#RewriteRule ^(.*)$ https://example.com/$1 [R=301,L]


# The Friendly URLs part
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]


# For servers that support output compression, you should pick up a bit of
# speed by un-commenting the following lines.

#php_flag zlib.output_compression On
#php_value zlib.output_compression_level 5
```

Вы также можете поместить файл в `/htdocs` или `/public_html` или в то, что использует ваш сервер, если он находится в корневом каталоге MODX или выше.

Имейте в виду, что некоторым хостам нравится писать собственный .htaccess чуть выше уровня сайта, но если ваш .htaccess находится в корне сайта MODX, он должен работать нормально. Если ваш хост поместил файл .htaccess в корень сайта MODX, возможно, вам придется вставить код из файла MODX ht.access ниже кода хоста в этом файле. Обязательно сделайте резервную копию файла хоста первым! Таким образом, вы можете восстановить его, если дела пойдут плохо.

Строка RewriteBase должна заканчиваться на / для корневых установок. RewriteBase для установки подкаталога может быть введен как: RewriteBase / subdirectoryName /, хотя обычно это необходимо только для установок localhost. Строка RewriteBase почти всегда должна заканчиваться косой чертой.

## 2) Настройка MODX Revolution

Затем измените настройки в области «Дружественные URL-адреса» системных настроек MODX (см. Следующее изображение). В MODX 2.3 щелкните значок шестеренки в правом верхнем углу и выберите «Системные настройки». В более ранних версиях перейдите в Система -> Настройки системы. В поле «Поиск по ключу» в правом верхнем углу сетки введите «friendly» (без кавычек) и нажмите Enter. Это отобразит все настройки Friendly URL. Главное, что вы хотите, это в нижней части: использовать дружественные URL (`friendly_urls`). Дважды щелкните «Нет» и измените его на «Да».

Если вы не видите все настройки MODX FURL, просто измените раскрывающийся список «Площадь» в верхней части сетки на Friendly URL, как я это сделал.

Не находишь `friendly_url_prefix` и `friendly_url_suffix` среди настроек на изображении ниже - они устарели в пользу расширений, определенных [Типы контента](building-sites/resources/content-types "Типы контента") и `container_suffix` (для контейнерных ресурсов с типами контента, имеющими `mime_type` из text/html). Параметр «Контейнерный суффикс» по умолчанию теперь «/», что приводит к URL-адресам ресурсов контейнера, а не к типу содержимого контейнера (другими словами, URL-адреса ресурсов, помеченных как контейнеры, будут / вместо чего-то вроде .html). Если вы хотите, чтобы ваши контейнерные ресурсы отображались как их тип контента (например, .html), удалите «/» из этого параметра. Если у вас есть проблемы с пакетами, которые используют суффикс контейнера для FURLS (например, [Статьи](/extras/articles "Статьи")), вернуть эту настройку "/".

![](/2.x/en/getting-started/furl_settings.png)

Параметр `Использовать дружественный путь псевдонима` (`use_alias_path`) позволяет сайту отображать структуры каталогов. Если для этого параметра установлено значение «Нет», все документы на сайте будут отображаться в URL-адресах, как если бы они находились непосредственно вне корня, независимо от путей. Если для этого параметра установлено значение «Да» (по умолчанию), вы увидите полный путь к текущей странице в URL-адресах.

`friendly_alias_urls` настройка была удалена в MODX 2.1+. Включение `friendly_alias_urls` подразумевает, что вы используете `friendly_alias_urls` в 2.1+, и эта настройка больше не нужна или не нужна.

## 3) Измените ваш шаблон(ы)

Убедитесь, что у вас есть следующий тег в разделе заголовка всех ваших шаблонов. Если у вас есть только один внешний интерфейс (например, «Интернет»), вы обычно можете не указывать восклицательный знак на скорость загрузки страниц:

``` html
<base href="[[!++site_url]]" />
```

## 4) Очистить кеш сайта

Самый простой способ воспользоваться полностью квалифицированными дружественными URL-адресами - это позволить MODX создавать ссылки, используя теги ссылок, описанные на этой странице: [link tag syntax](building-sites/resources "Linking to a Resources") создавать ссылки на различные ресурсы легко, если привязать их к тегу ссылки ниже (где 1 - идентификатор ресурса страницы, на которую вы хотите перейти). Это дает дополнительное преимущество, заключающееся в возможности перемещать ресурсы по веб-проекту без необходимости исправлять кучу неработающих ссылок, поскольку MODX просто обновляет ссылки, созданные таким образом, автоматически.

``` html
<a href="[[~1]]" title="some title">Some Page</a>
```

## 5) Конвертируйте WWW URLs в non-WWW или наоборот

Ранее мы упоминали одно изменение, которое вы всегда должны вносить в файл .htaccess, когда у вас работают FURL. Это касается URL, которые начинаются с «www» (или нет). Пользователь может получить доступ к большинству сайтов с доменным именем или доменным именем, перед которым стоит «www». Вы всегда должны конвертировать URL в один или другой. Причины сложны, но если вы этого не сделаете, на вашем сайте могут произойти странные вещи. Например, пользователи, которые вошли в систему, могут внезапно потерять этот статус.

Исправить это действительно легко. В приведенном выше коде файла .htaccess вы увидите два раздела, оба закомментированы. Один меняет не-www URL-адреса на www-URL-адреса, а другой - наоборот. Решите, какой из них вы хотите, и просто раскомментируйте раздел, который делает это, удалив знак # в начале каждой строки. Будьте осторожны, вы будете раскомментировать только три строки.

Например, чтобы удалить «www.» Из всех запросов на сайт с доменом «yoursite.com» измените этот раздел:

``` php
# Rewrite www.domain.com -> domain.com -- used with SEO Strict URLs plugin
#RewriteCond %{HTTP_HOST} .
#RewriteCond %{HTTP_HOST} !^example-domain-please-change\.com [NC]
#RewriteRule (.*) http://example-domain-please-change.com/$1 [R=301,L]
```

выглядеть так:

``` php
# Rewrite www.domain.com -> domain.com -- used with SEO Strict URLs plugin
RewriteCond %{HTTP_HOST} .
RewriteCond %{HTTP_HOST} !^yoursite\.com [NC]
RewriteRule (.*) http://yoursite.com/$1 [R=301,L]
```

Обратите внимание, что мы не рас комментировали первую строку. Это настоящий комментарий. Раскомментирование заставит сервер обращаться с ним как с кодом, и это может привести к сбою сервера.

Severs может быть довольно обидчивым о том, что находится в файле .htaccess. Всегда делайте резервную копию рабочего файла .htaccess перед его изменением. Таким образом, если ваша работа приводит к сбою сервера, вы можете просто скопировать сохраненную версию обратно в .htaccess и начать заново.

## 6) Исправление дубликатов главной страницы

Поисковые системы будут индексировать каждую страницу (index.php, index.html, index.htm и т.д.) и плохо реагировать на дублирующийся контент.

``` php
RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /index\.(php|html|htm)\ HTTP/
RewriteRule ^(.*)index\.(php|html|htm)$ $1 [R=301,L]
```
