---
title: "amazonSES mailing list"
description: "Рассылка через Amazon SES для массовой отправки email без собственного почтового сервера"
translation: "extras/amazonses-mailing-list/index"
---

## Что такое Amazon SES Mailing List?

Amazon SES Mailing list. полноценная рассылка, которая использует [Amazon SES](http://aws.amazon.com/ses/) для массовой отправки писем за небольшую плату (например, 0.10$ за 1000 писем) без собственного почтового сервера.

## Требования

- MODX Revolution 2.2.X
- PHP5 или новее

## Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management), или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/amazonsesmailinglist>

## Установка

1. Установите пакет через _Package Management_
2. Откройте _System Settings_ и отфильтруйте настройки по _Namespace **aSES**_
3. Укажите _Amazon ID (Access Key ID)_ и _Amazon Secret_ (_Secret Access Key_). [https://console.aws.amazon.com/iam/home?#security\_credential](https://console.aws.amazon.com/iam/home?#security_credential). _Access Key_
4. Создайте _MODX resource_ и поместите в контент

``` php
[[!aSES]]
```

## Свойства

**&tpl**. имя чанка с сообщением об отписке при успешной отписке (по умолчанию: aSESUnsubscribe)

**&tpl\_error**. имя чанка с сообщением об ошибке, если email не найден в базе (по умолчанию: aSESUnsubscribeError)

## Настройка Cron

Откройте crontab _(например CentOS: crontab -e)_ и добавьте строку:

``` plain
* * * * * php /absoulte/path/to/modx/web/directory/assets/components/aSES/cron.php
```

Это запускает cron.php каждую минуту каждого часа каждого дня.

cron.php отправляет 100 писем за запуск. Отправляется каждое письмо, потому что amazonSESMailingList поддерживает персонализированные письма (можно использовать плейсхолдер `[[+name]]` в email)

## Использование

В _Components_ откройте _aSESmailings_ и создайте новый _Mailing list_. После создания дважды щёлкните по нему. откроются три вкладки: _Mails | Basic settings | Emails_

- _Mails_. список писем, которые вы готовите, отправляете или уже отправили. Также видна базовая информация о каждом письме
- _Basic settings_. самая важная часть рассылки. Здесь задаются имя и email отправителя.

Не забудьте вставить плейсхолдер **`[[+content]]`** в шаблон рассылки, иначе при отправке не будет контента.

Каждый email в поле «from» должен быть верифицирован в Amazon SES. Если email ещё не верифицирован, нажмите _Verify email with Amazon SES_. придёт письмо подтверждения от Amazon SES.

Если у вас нет доступа к **production environment**, нужно верифицировать каждый email, **на который** вы хотите отправлять письма. Подробнее: [здесь](http://aws.amazon.com/ses/#functionality).

- _Emails_. список подписчиков. Поскольку AmazonSESMailingList рассчитан на персонализированные письма, у каждого подписчика может быть имя, доступное через плейсхолдер `[[+name]]` в письме.

Создайте новое письмо и откройте его двойным щелчком. Добавьте тему и контент. Сохраните и вернитесь на предыдущую страницу. На вкладке _Emails_ добавьте email и укажите свой адрес. Перейдите на вкладку _Mails_. у нового письма появится тема. Щёлкните правой кнопкой и выберите _Send mail_. Готово. Если cron настроен правильно, письмо скоро придёт.

Приятного использования.

AmazonSESMailingList основан на ses.php, созданном Dan Myer.

ses.php. beta-версия от Dan Myer. Как всегда, автор **не несёт ответственности** за ущерб от использования пакета amazonSESMailingList.
