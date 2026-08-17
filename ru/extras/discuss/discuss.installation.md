---
title: "Установка"
description: "Установка Discuss через Package Manager, ресурсы, ЧПУ, rewrite rules и настройка SSO"
translation: "extras/discuss/discuss.installation"
---

## Установка Discuss

Установка Discuss через MODX Package Manager проста. Скачайте пакет discuss и [запустите установщик](administering-your-site/installing-a-package "Installing a Package") как для любого другого пакета. В Package Manager также установите обязательные Extras:

- Login
- FormIt

При установке можно включить demo data. Если вы ставите Discuss впервые, включите её, чтобы сразу увидеть рабочие данные.

После установки через Package Manager выполните несколько шагов и настроек для рабочего форума:

1. Создайте необходимые Resources
2. Настройте Friendly Urls и rewrite rules для Discuss
3. Настройте Discuss под ваше окружение.

Ниже все шаги по порядку.

### Настройка необходимых Resources

Discuss использует один ресурс для многих представлений, поэтому при первой настройке форума создайте его.

Создайте новый ресурс с атрибутами:

- Pagetitle: Forums
- Template: empty
- Alias: forums
- Content: `[[!Discuss]]`
- Container (вкладка Settings): Yes

Alias можно изменить, но тогда нужно поправить custom rewrite rules на следующем шаге.

Discuss включает вход и регистрацию (через Login), но обычно для форума используют отдельные или уже существующие страницы входа и регистрации. Это режим SSO (разберём позже). Создайте отдельные ресурсы для login, registration и update profile.

Соберите их как обычно ([см. документацию Login](extras/login "Login")). Внешний вид и структура не ограничены. На страницах login, register и update profile добавьте pre и post hooks для Discuss:

``` php
&preHooks=`preHook.DiscussLogin`
&postHooks=`postHook.DiscussLogin`
```

Добавьте их в вызовы сниппетов.

Ниже на этой странице есть инструкции по настройке Login и Update Profile resources.

### Friendly URLs и rewrite rules для Discuss

Discuss сейчас работает только с friendly URLs. Включите friendly urls в MODX. Откройте system > system settings, фильтр «Friendly URLs». Включите use_friendly_urls и настройте остальное по необходимости. Обычно полезны automatic_alias и use_alias_path, но на Discuss они почти не влияют.

После настройки Friendly URLs добавьте rewrite rules для Discuss. Ниже фрагменты для .htaccess на Apache и конфиг для nginx.

#### Для .htaccess (Apache, mod_rewrite enabled)

##### Rewrite rules не нужны с версии 1.2.1 (релиз 23 июля 2013)

Добавьте этот блок ПЕРЕД обычными MODX rewrite rules в .htaccess, но ПОСЛЕ RewriteBase. Если alias Discuss resource не «forums» или форум в корне сайта, замените все вхождения «forums» ниже.

``` php
# If imported from SMF, you can include the following lines to make sure existing urls don't break.
RewriteRule ^forums/index.php/topic,(.*).msg(.*).html$ forums/?action=thread&thread=$1&i=1
RewriteRule ^forums/index.php/topic,(.*).(.*).html$ forums/?action=thread&thread=$1&i=1&start=$2
RewriteRule ^forums/\?topic=(.+).(.+)$ forums/?action=thread&thread=$1&i=1
RewriteRule ^forums/index.php/board,(.*).(.*).html$ forums/?action=board&board=$1&i=1&start=$2
RewriteRule ^forums/\?board=(.+).(.+)$ forums/?action=board&board=$1&i=1


# Discuss rewrite rules
RewriteRule ^forums/thread/([0-9]+)/(.*)$ forums/?action=thread&thread=$1 [L,QSA]
RewriteRule ^forums/u/(.+)$ forums/?action=user&user=$1 [L,QSA]
RewriteRule ^forums/board/([0-9]+)/(.*)$ forums/?action=board&board=$1 [L,QSA]
RewriteRule ^forums/category/([0-9]+)/(.*)$ forums/?category=$1 [L,QSA]
RewriteRule ^forums/(.+)$ forums/?action=$1 [L,QSA]
RewriteRule ^forums/(.+)/$ forums/?action=$1 [L,QSA]
```

Замените «forums», если alias другой.

#### Для nginx

Рекомендуемый набор правил (вызывается до основного rewrite для MODX):

``` php
rewrite ^/forums/thread/([0-9]+)/(.*)$ /index.php?q=forums/&action=thread&thread=$1 last;
rewrite ^/forums/u/(.+)$ /index.php?q=forums/&action=user&user=$1 last;
rewrite ^/forums/board/([0-9]+)/(.*)$ /index.php?q=forums/&action=board&board=$1 last;
rewrite ^/forums/category/([0-9]+)/(.*)$ /index.php?q=forums/&category=$1 last;
rewrite ^/forums/(.+)$ /index.php?q=forums/&action=$1 last;
rewrite ^/forums/(.+)/$ /index.php?q=forums/&action=$1 last;
```

Расширенный набор правил с переписыванием SMF URL в формат Discuss:

``` php
# SMF rules
rewrite ^/forums/index.php/topic,(.*).msg(.*).html$ /forums/?action=thread&thread=$1&i=1 last;
rewrite ^/forums/index.php/topic,(.*).(.*).html$ /forums/?action=thread&thread=$1&i=1&start=$2 last;

rewrite ^/forums/index.php\?topic=(.*).(.*)$ /forums/?action=thread&thread=$1&i=1 last;
if ($args ~* topic=(.*).(.*)){
    set $args action=thread&thread=$1&i=1;
}
rewrite ^/forums/\?topic=(.*).(.*)$ /forums/?action=thread&thread=$1&i=1 last;

rewrite ^/forums/index.php/board,(.*).(.*).html$ /forums/?action=board&board=$1&i=1&start=$2 last;
rewrite ^/forums/\?board=(.*).(.*)$ /forums/?action=board&board=$1&i=1 last;
rewrite ^/forums/thread/([0-9]+)/(.*)$ /forums/?action=thread&thread=$1 last;
rewrite ^/forums/thread/([0-9]+)/(.*)$ /forums/?action=thread&thread=$1 last;

rewrite ^/forums/u/(.+)$ /forums/?action=user&user=$1 last;
rewrite ^/forums/board/([0-9]+)/(.*)$ /forums/?action=board&board=$1 last;
rewrite ^/forums/board\.xml/([0-9]+)/(.*)$ /forums/?action=board.xml&board=$1 last;
rewrite ^/forums/category/([0-9]+)/(.*)$ /forums/?category=$1 last;

rewrite ^/forums/index.php?action=unread$ /forums/thread/unread last;
if ($args ~* action=unread){
    set $args action=thread/unread;
}

# Discuss main FURL
if (!-e $request_filename){
    rewrite ^/forums/(.*)$ /forums/?action=$1 last;
}
```

### Настройка Discuss под окружение

Когда friendly urls работают, настройте Discuss. Большая часть настроек в System settings: System > System settings, namespace «discuss».

- **discuss.forums_resource_id**. ID ресурса с форумом Discuss.
- **discuss.login_resource_id**. ID ресурса с вызовом [Login](extras/login "Login").
- **discuss.register_resource_id**. ID ресурса с [Register](extras/login/login.register "Login.Register").
- **discuss.update_profile_resource_id**. ID ресурса с [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile").
- Установите **discuss.sso_mode** в yes. Discuss будет использовать ваши страницы login, register и update_profile вместо встроенных.

Другие полезные настройки:

- При создании кастомной темы включите **discuss.debug_templates**, чтобы в HTML-комментариях показывались используемые chunks.
- **discuss.theme** загружает шаблоны и assets. Пока подойдёт default, позже укажите имя каталога темы в «themes» Discuss.
- **discuss.forum_title**. название форума.
- По умолчанию Discuss использует простой текстовый поиск (если тема его использует). Для Solr установите **discuss.search_class** в disSolrSearch и заполните настройки solr.

## Страницы Login, Register и Update Profile с Discuss

Этот блок формально не часть установки Discuss, но ниже инструкции для login, register и update profile в режиме SSO.

### Настройка Login

В вызове [Login](extras/login "Login") укажите pre и post hooks:

``` php
&preHooks=`preHook.DiscussLogin`
&postHooks=`postHook.DiscussLogin`
```

Discuss добавит дополнительную логику к вашему Login.

### Настройка Register

Добавьте участников в группу «Forum Members» для доступа к форуму:

``` php
&usergroups=`Forum Members:Member`
```

В вызове [Register](extras/login/login.register "Login.Register").

### Настройка UpdateProfile

Для UpdateProfile нужно несколько шагов.

Добавьте post-hook в вызов UpdateProfile:

``` php
&postHooks=`postHook.DiscussUpdateProfile`
```

Затем **после** вызова UpdateProfile разместите:

``` php
[[!DiscussUpdateProfileLoader]]
```

Дополнительные поля формы для профиля Discuss:

``` html
<label for="signature">Signature <span class="error">[[!+up.error.signature:stripTags=`p,b,strong,i,a,ul,li`]]</span></label>
<textarea name="signature:allowTags" id="signature">[[!+up.signature]]</textarea>

<label for="use_display_name">Use Display Name in Forums <span class="error">[[!+up.error.use_display_name]]</span></label>
<input type="hidden" name="use_display_name" id="use_display_name_hidden" value="0" />
<input type="checkbox" name="use_display_name" id="use_display_name" value="1" [[!+up.use_display_name:FormItIsChecked=`1`]] />

<label for="display_name">Display Name <span class="error">[[!+up.error.display_name]]</span></label>
<input type="text" name="display_name" id="display_name" value="[[+up.display_name]]" />

<label for="show_online">Show Online Status <span class="error">[[!+up.error.show_online]]</span> </label>
<input type="hidden" name="show_online" id="show_online_hidden" value="0" />
<input type="checkbox" name="show_online" id="show_online" value="1" [[!+up.show_online:FormItIsChecked=`1`]] />

<label for="show_email">Show Email in Forums <span class="error">[[!+up.error.show_email]]</span></label>
<input type="hidden" name="show_email" id="show_email_hidden" value="0" />
<input type="checkbox" name="show_email" id="show_email" value="1" [[!+up.show_email:FormItIsChecked=`1`]] />
```

Эти поля позволяют пользователям менять значения в профиле.

## Смотрите также

1. [Discuss.Installation](extras/discuss/discuss.installation)
  1. [Discuss.Installation from Git](extras/discuss/discuss.installation/installation-from-git)
2. [Discuss.Getting Started](extras/discuss/discuss.getting-started)
3. [Discuss.Creating a Discuss Theme](extras/discuss/discuss.creating-a-discuss-theme)
4. [Discuss.Controllers](extras/discuss/discuss.controllers)
   1. [Discuss.Controllers.board](extras/discuss/discuss.controllers/board)
      1. [Discuss.Controllers.board.xml](extras/discuss/discuss.controllers/board/xml)
   2. [Discuss.Controllers.home](extras/discuss/discuss.controllers/home)
   3. [Discuss.Controllers.login](extras/discuss/discuss.controllers/login)
   4. [Discuss.Controllers.logout](extras/discuss/discuss.controllers/logout)
   5. [Discuss.Controllers.profile](extras/discuss/discuss.controllers/profile)
   6. [Discuss.Controllers.register](extras/discuss/discuss.controllers/register)
   7. [Discuss.Controllers.search](extras/discuss/discuss.controllers/search)
5. [Discuss.Controllers.thread](extras/discuss/discuss.controllers/thread)
6. [Discuss.Database Model](extras/discuss/discuss.database-model)
7. [Discuss.Contributing](extras/discuss/discuss.contributing)
8. [Discuss.ChunkMap](extras/discuss/discuss.chunkmap)
9. [Discuss.Features](extras/discuss/discuss.features)
10. [Configuring Sphinx for Search](extras/discuss/configuring-sphinx-for-search)
