---
title: "virtuNewsletter"
description: "Система рассылок для MODX Revolution с CMP, cron и шаблонами писем"
translation: "extras/virtunewsletter/index"
---

virtuNewsletter: система рассылок для MODX Revolution.

Старые docs см. [virtunewsletter](extras/virtunewsletter).

## Загрузка

virtuNewsletter скачивается через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из MODX Extras Repository: <https://modx.com/extras/package/virtunewsletter>

## Разработка и сообщения об ошибках

virtuNewsletter на GitHub: <https://github.com/virtudraft/virtuNewsletter>

## Кратко

1. Настройте формат рассылки через обычный ресурс в дереве слева
2. В CMP добавьте category как группу рассылки. К category можно привязать usergroups
3. Добавьте newsletter в category
4. Выберите « _is recurring_»: рассылка повторяется по заданному диапазону (weekly, monthly, yearly) и делится на число повторений (1: monthly, 7: weekly, то есть daily).

virtuNewsletter отправляет рассылки через cron.

Note: MODX Cloud сейчас не предоставляет cron как сервис.

Подробнее о настройке cron см. раздел ниже.

## Email Templates

Нужны email-шаблоны для подтверждений. Это ресурсы, не чанки и не стандартные templates. Их можно не публиковать или скрыть.
**pagetitle** станет _subject_ письма, **content**: _body_.

Сниппеты и чанки внутри ресурса обрабатываются. getResources может дать обновления сайта в теле письма. Ресурсы удобнее для нетехнических редакторов, чем HTML в чанке.

Схема назначения ресурсов:

![](virtunewsletter-bpml.jpg)

### Email «Thank you for your subscription»

Шаблон подтверждения подписки. По умолчанию: **core/components/virtunewsletter/elements/emails/activation-email.tpl**

Update 1.6.0-beta2: шаблон можно создать в CMP и настроить под culture key.

Update 1.6.0-beta-1: `[[+virtuNewsletter.email.subid]]` = `[[+virtuNewsletter.email.id]]`

``` php
<p>Hello [[+virtuNewsletter.email.name:default=`[[+virtuNewsletter.email.email]]`]],</p>
<p>Thank you for your subscription.</p>
<p>To complete this, please click this link to activate your account:
    <a href="[[~62?
        &subid=`[[+virtuNewsletter.email.subid]]`
        &h=`[[+virtuNewsletter.email.hash]]`
        &act=`subscribe`
        &scheme=`full`]]"
        target="_blank">activate</a>.
</p>
<p>You can unsubscribe back later if it is required.</p>
<p> </p>
<p>Regards,</p>
<p><a href="http://www.example.com" target="_blank">Example.com</a></p>

```

ID# **62** замените на id ресурса страницы подтверждения с содержимым:

``` php
[[!virtuNewsletter.confirm]]
```

### Email «Your subscription has been activated successfully»

Update 1.6.0-beta2: шаблон можно создать в CMP и настроить под culture key.

Шаблон подтверждённой подписки. По умолчанию: **core/components/virtunewsletter/elements/emails/activated-email.tpl**

``` html
<p>Thank you.</p>
<p>Your subscription has been activated successfully.</p>
<p>We will send you the upcoming newsletter once they are published.</p>
<p> </p>
<p>Regards,</p>
<p><a href="http://www.example.com" target="_blank">Example.com</a></p>
```

### Email «You have been unsubscribed successfully»

Update 1.6.0-beta2: шаблон можно создать в CMP и настроить под culture key.

Шаблон отписки.

В каждой рассылке есть ссылка отписки. Она ведёт на ту же страницу подтверждения, но с действием unsubscribe. По умолчанию: **core/components/virtunewsletter/elements/emails/deactivated-email.tpl**

``` html
<p>Thank you.</p>
<p>Your subscription has been cancelled successfully.</p>
<p>We will no longer send you the upcoming newsletters.</p>
<p> </p>
<p>Regards,</p>
<p><a href="http://www.example.com" target="_blank">Example.com</a></p>
```

На этом этапе подписчик не удаляется из системы. Он только деактивируется.

## System Settings

| Settings                                     | Description                                                                                                                                                                                           |
| -------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| virtunewsletter.usergroups                   | Имена usergroups через запятую. Эти группы подписываются автоматически                                                                                                            |
| virtunewsletter.email\_debug                 | Включите, чтобы писать плейсхолдеры письма в error log MODX без отправки                                                                                                           |
| virtunewsletter.email\_limit                 | Число писем в час для cron. Уточните лимиты у хостера. 0 или пусто: без лимита, все письма одним batch. Default: 50. |
| virtunewsletter.email\_sender                | Отправитель в header письма. По умолчанию значение **emailsender**                                                                               |
| virtunewsletter.subscribe\_confirmation\_tpl | ID ресурса как email-шаблон новой подписки, как шаблон _Thank you for your subscription_                                                                               |
| virtunewsletter.subscribe\_succeeded\_tpl    | ID ресурса как email-шаблон подтверждения отписки                                                                                                                               |
| virtunewsletter.unsubscribe\_succeeded\_tpl  | ID ресурса как email-шаблон завершённой отписки                                                                                                              |
| virtunewsletter.readerpage                   | ID ресурса, где посетитель читает рассылку в браузере                                                                                                                                         |

## Resources, Snippets and Chunks

Создайте ещё 3 ресурса со сниппетами:

### 1. Subscribe

Создайте ресурс и поместите сниппет в content.

**Example: this is the ID# 61 for the subscribe form below.**

``` php
[[!virtuNewsletter.subscribe]]
```

### 2. Confirm

Создайте ресурс и поместите сниппет в content.

**Example: this is the ID# 62 in my template examples above.**

``` php
[[!virtuNewsletter.confirm]]
```

### 3. Read

Создайте ресурс и поместите сниппет в content.

**Example: this is the ID# 63 for the link in the email's body of the newsletter below.**
This resource will be the website's newsletter reader page.
Use the MODX's original **BaseTemplate**, without any CSS styles.

``` php
[[!virtuNewsletter.reader]]
```

Чтобы вывести плейсхолдеры:

``` php
[[!virtuNewsletter.reader? &toArray=`1`]]
```

### 4. Chunk

Форма подписки (может быть чанком):

``` php
<form action="[[~61]]" method="POST">
    <p>Email: <input type="email" name="email"></p>
    <input type="hidden" name="category" value="Customer News">
    <p><input type="submit" name="submit" value="Subscribe"></p>
</form>
```

**NO FORMIT, NO HOOK!**

Просто укажите action на [Subscribe page](extras/virtunewsletter#virtuNewsletter-1.Subscribe) выше.
Поле **category** _required_: подписчик попадёт в нужную **Category** в CMP.

Снова: **УБЕДИТЕСЬ, ЧТО CATEGORY ЕСТЬ В CMP.**

Имя поля можно менять, но тогда обновите **`[[!virtuNewsletter.subscribe? &categoryKey=`category`]]`** на [Subscribe page](extras/virtunewsletter#virtuNewsletter-1.Subscribe)

### 5. Рассылки

Теперь можно создавать рассылки через обычный ресурс.

1. Создайте шаблон, который будет телом письма, без тегов html и body.

2. Поместите CSS внутрь тега style. Стили автоматически станут inline в теле письма.

3. Добавьте плейсхолдеры для ссылки отписки или чтения рассылки на сайте:

Update 1.6.0-beta-1: `[[+virtuNewsletter.email.newsid]]` = `[[+virtuNewsletter.email.id]]`

``` php
<!-- unsubscribe link -->
<a href="[[~62?
    &subid=`[[+virtuNewsletter.email.subid]]`
    &h=`[[+virtuNewsletter.email.hash]]`
    &act=`unsubscribe`
    &scheme=`full`
]]">
Unsubscribe
</a>
<!-- read the newsletter on the website -->
<a href="[[~63?
    &scheme=`full`
    &newsid=`[[+virtuNewsletter.email.newsid]]`
    &e=`[[+virtuNewsletter.email.email]]`
    &h=`[[+virtuNewsletter.email.hash]]`
]]">read this newsletter on the website</a>
```

Note: нужен &e **или** &h. Достаточно одного из них.

Во всех ссылках указывайте **&scheme=`full`**, чтобы URL был полным.

## Custom Manager Page (CMP)

### Newsletters

#### Category

Category: группа подписчиков. Подписчики из usergroups или анонимные с веб-формы. Форма подписки **must** содержать поле category (или имя из `[[!virtuNewsletter.subscriber? &categoryKey=`category`]]`).

Сначала создайте category в CMP.

### Subscribers

Здесь зарегистрированные подписчики и auto-registered из **virtunewsletter.usergroups**. При необходимости синхронизируйте.

## Cron

На своём хостинге задайте команду:

``` php
php -q /home/xxx[absolute_path]xxx/public_html/assets/components/virtunewsletter/conn/web.php action=web/crons/queues/process site_id=modx12abc345678d90.12345678
```

Аргументы в CLI без «?» и «&».

Для стороннего cron-сервиса укажите URL:

``` php
hxxp://www.your_cool_website.com/assets/components/virtunewsletter/conn/web.php?action=web/crons/queues/process&site_id=modx12abc345678d90.12345678

```

**site\_id** обязателен! Замените **site\_id=modx12abc345678d90.12345678** на id вашего сайта из core/config/config.inc.php, переменная **$site\_id**. Обновляйте после каждого обновления MODX. Значение меняется!

**Heads Up**
Не делитесь site\_id! Это секрет MODX от cross-site scripting. На форуме подменяйте значение!
