---
title: "Хуки"
description: "preHooks, postHooks и postPaymentHooks сниппета mhPayPal"
translation: "extras/mhpaypal/mhpaypal.snippet-usage/hooks"
---

## Хуки

_Этот документ описывает хуки сниппета mhPayPal, их свойства и примеры. Обзор пакета: [mhPayPal](extras/mhpaypal "mhPayPal"). О сниппете: [mhPayPal.Snippet Usage](extras/mhpaypal/mhpaypal.snippet-usage "mhPayPal.Snippet Usage")._

## Введение

Через &preHooks, &postHooks и &postPaymentHooks вы настраиваете поток mhPayPal и добавляете функции без правок ядра, что сохраняет путь обновлений.

Хук встроен в mhPayPal или это сниппет в вашей установке MODX.

## Встроенные хуки

### email, email2

Хуки email и email2 работают одинаково и позволяют отправить два разных письма на разные адреса. Поддерживают одни и те же свойства.

Свойства ниже задаются в вызове сниппета mhPayPal.

Для хука email2 добавьте «2» к имени свойства, например emailTo → emailTo2.

| &property     | Описание                                                                                                                                                              | Значение по умолчанию            | Версия |
| ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------- | ------ |
| emailTpl      | \[string\] Чанк содержимого письма.                                                                                                                                   | mhPayPalEmail (file-based)       | 1.1.0  |
| emailSubject  | \[string\] Тема письма. Может включать плейсхолдеры из возвращённых данных.                                                                                           | Thank you for your Donation!     | 1.1.0  |
| emailTo       | \[string\] Адреса получателей через запятую. Можно `[[+email]]`, подставится email от PayPal.                                                                         | The "emailsender" system setting | 1.1.0  |
| emailCC       | \[string\] Адреса CC через запятую.                                                                                                                                   |                                  | 1.1.0  |
| emailBCC      | \[string\] Адреса BCC через запятую.                                                                                                                                  |                                  | 1.1.0  |
| emailFrom     | \[string\] Адрес отправителя.                                                                                                                                         | The "emailsender" system setting | 1.1.0  |
| emailFromName | \[string\] Имя отправителя.                                                                                                                                           | The "site\_name" system setting. | 1.1.0  |

### Redirect

Хук redirect перенаправляет пользователя на другую страницу. Обычно после оплаты, на страницу «Спасибо».

| &property       | Описание                                                                                                                                                                               | Значение по умолчанию                        | Версия |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------- | ------ |
| redirectTo      | \[integer                                                                                                                                                                               string\] ID ресурса или полный URL. |         | 1.1.0 |
| redirectParams  | \[JSON string\] JSON-строка с дополнительными параметрами URL. Только если redirectTo это ID ресурса.                                                                                 |                                              | 1.1.0  |
| redirectContext | \[string\] Ключ контекста для построения URL, если redirectTo это ID ресурса.                                                                                                          | Current context                              | 1.1.0  |
| redirectScheme  | Допустимое значение [modX::makeUrl](developing-in-modx/other-development-resources/class-reference/modx/modx.makeurl "modX.makeUrl") scheme для типа URL.                            | link\_tag\_scheme setting or -1              | 1.1.0  |

## Разработка кастомных хуков

Кастомные хуки могут быть ещё не полностью реализованы, но появятся в будущих версиях.

Укажите сниппет в одном из свойств хуков, и он выполнится.

В $scriptProperties и как $variables доступны все данные на этом этапе, свойства конфигурации и класс $mhpp.

### Примеры

Пока нет. Извините!

## Дополнительная документация

- [mhPayPal.Snippet Usage](extras/mhpaypal/mhpaypal.snippet-usage "mhPayPal.Snippet Usage")
