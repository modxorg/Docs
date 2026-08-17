---
title: "Шаблоны"
description: "Кастомные шаблоны Eletters и плейсхолдеры подписчиков"
translation: "extras/eletters/eletters.templates"
---

## Создание кастомного шаблона

- Проще всего дублировать шаблон EletterSample. В менеджере MODX откройте вкладку Elements, разверните Templates, затем Eletters. Щёлкните правой кнопкой по EletterSample и выберите Duplicate Template. Задайте имя
  ![](duplicate.png)
- Просмотрите код и адаптируйте под себя. Все TV Eletters должны быть выбраны, иначе письмо не сгенерируется

## Плейсхолдеры в шаблоне

Доступны все MODX-теги и элементы, как в обычном шаблоне. Эти плейсхолдеры работают в TV и в области контента.

Пример: `[[+manageSubscriptionsUrl]]`

| Имя                                                       | Описание                                                                                                                                                                              |
| --------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| trackingImage                                             | Используйте `[[+trackingImage]]` для изображения. Кастомный баннер: `[[+trackingImage]]`image=test.jpg, файл положите в assets/components/eletters/images/                        |
| Пример: <img src="`[[+trackingImage]]`" alt="" />         |                                                                                                                                                                                       |
| manageSubscriptionsUrl                                    | URL для управления подписками. Ссылка содержит уникальный код подписчика                                                                                                              |
| unsubscribeUrl                                            | URL для отписки от рассылок. Ссылка содержит уникальный код подписчика                                                                                                               |
| manageSubscriptionsID                                     | ID страницы управления подписками                                                                                                                                                     |
| unsubscribeID                                             | ID страницы отписки                                                                                                                                                                   |

### Плейсхолдеры персональных данных подписчика

Для каждого поля данные должны быть собраны заранее. Рекомендуется сделать first\_name, last\_name и email обязательными в формах подписки. date\_created генерируется автоматически, не добавляйте это поле в форму регистрации.

| Имя           | Описание                                                            |
| ------------- | ------------------------------------------------------------------- |
| first\_name   | Имя                                                                 |
| m\_name       | Отчество                                                            |
| last\_name    | Фамилия                                                             |
| fullname      | Имя + фамилия                                                       |
| company       | Компания                                                            |
| address       | Адрес                                                               |
| city          | Город                                                               |
| state         | Регион / штат                                                       |
| zip           | Индекс                                                              |
| country       | Страна                                                              |
| email         | Email                                                               |
| phone         | Телефон                                                             |
| cell          | Мобильный телефон                                                   |
| crm\_id       | ID в CRM (Customer Relationship Manager), если используете такую систему |
| date\_created | Дата подписки или добавления администратором                        |

## См. также

1. [Eletters.API](extras/eletters/eletters.api)
2. [Eletters.FormIt](extras/eletters/eletters.formit)
3. [Eletters.Import CSV](extras/eletters/eletters.import-csv)
4. [Eletters.Templates](extras/eletters/eletters.templates)
