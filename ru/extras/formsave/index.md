---
title: "FormSave"
description: "Hook для FormIt: сохранение форм в БД и экспорт в CSV/XML/Print"
translation: "extras/formsave/index"
---

FormSave это hook для FormIt, который сохраняет практически любую форму в базу данных и экспортирует результаты в CSV/XML/Print view из коробки. Вы также можете добавить свои шаблоны экспорта.

FormSave создан и поддерживается [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

## Требования

FormSave требует MODX® Revolution 2.2.0 или новее.

## История

| Version   | Release date     | Author                                                                                                                                      | Changes                                            |
| --------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------- |
| 1.0.1-PL1 | June 8th, 2012   | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Added ability to delete form entries, fixed a bug. |
| 1.0.0-PL1 | April 24th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release.                                   |

## Загрузка и установка

Установите пакет через менеджер пакетов MODX®.

## Что нужно знать

FormSave это hook для FormIt. Нужен установленный FormIt и понимание его работы. Если вы не знакомы с FormIt, прочитайте его документацию.

## Использование FormSave на фронтенде

## Использование сниппета

Пример вызова с контактной страницы FormIt:

``` php
[[!FormIt?
   &hooks=`recaptcha,spam,email,redirect`
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &redirectTo=`123`
   &validate=`name:required,
      email:email:required,
      subject:required,
      text:required:stripTags,
      numbers:required,
      colors:required`
]]
```

Чтобы сохранить форму в базу для просмотра результатов позже, добавьте hook и параметр в вызов FormIt:

``` php
[[!FormIt?
   &hooks=`recaptcha,spam,FormSave,email,redirect`      <-- added the hook here after spam and recaptcha check
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &redirectTo=`123`
   &fsFormTopic=`contact`                               <-- added the form topic to specify which form this is
   &validate=`name:required,
      email:email:required,
      subject:required,
      text:required:stripTags,
      numbers:required,
      colors:required`
]]
```

Параметры для вызова FormIt:

| Parameter       | Explanation                                                                                                       |
| --------------- | ----------------------------------------------------------------------------------------------------------------- |
| fsFormTopic     | The topic for the form. Used to separate multiple forms. (Defaults to "form")                                     |
| fsFormFields    | A comma separated list of fields to save, if omitted all form fields will be saved. (example: name,email,message) |
| fsFormPublished | Whether or not the form should have published "1" in the database. Currently unused.                              |

## Внешние источники

Сайт разработчика: <http://scherpontwikkeling.nl/modx/formsave>

[](http://www.scherpontwikkeling.nl/portfolio/modx-addons/formsave.html)

GitHub repository: <http://www.github.com/b03tz/FormSave/>

Report bugs and request features: <http://www.github.com/b03tz/FormSave/issues>
