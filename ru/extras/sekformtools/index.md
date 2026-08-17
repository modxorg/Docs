---
title: "sekFormTools"
description: "Combo box, автодополнение, date picker и поля с подсказками для форм MODX"
translation: "extras/sekformtools/index"
---

## Что такое sekFormTools?

SekFormTools быстро добавляет combo box с настраиваемым видом, поля автодополнения, date picker и поля с подсказками в форму. Данные берутся из любой таблицы и выводятся в combo box или фильтруются через автодополнение без правок сниппетов и чанков, достаточно простого JSON-массива. Встроена фильтрация combo box по выбору в другом combo box. Текстовые поля и textarea с подсказкой поверх поля. Date picker подключается простым вызовом сниппета.

### Требования

- MODX Revolution 2.2.0-pl2 или новее
- PHP5 или новее

### История

SekFormTools написал Stephen Smith, первый релиз вышел 3 мая 2012 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](extending-modx/transport-packages "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/sekformtools>.

### Разработка и сообщения об ошибках

SekFormTools на GitHub: <https://github.com/insomnix/sekFormTools>, issues и запросы функций: <https://github.com/insomnix/sekFormTools/issues>.

### Данные

SekFormTools устанавливает 5 таблиц: страны, штаты, города США, почтовые индексы США и перекрёстную таблицу город-индекс. Из-за объёма данных установка опциональна. Чтобы установить данные, скачайте [sekformtoolsdata.zip](http://www.seknetsolutions.com/downloads/sekformtoolsdata.zip), вставьте каждый файл во временный сниппет и выполните его для загрузки в базу. Чтобы дополнить эти файлы, свяжитесь с автором или напишите в [тему поддержки](http://forums.modx.com/thread/76302/support-comments-for-sekformtools-beta).

## Использование

sekFormTools вызывается несколькими сниппетами:

- [sekFormTools.input.autocomplete](extras/sekformtools/sekformtools.input.autocomplete "sekFormTools.input.autocomplete"). поле jQuery автодополнения.
- [sekFormTools.input.combobox](extras/sekformtools/sekformtools.input.combobox "sekFormTools.input.combobox"). combo box jQuery автодополнения.
- [sekFormTools.input.datepicker](extras/sekformtools/sekformtools.input.datepicker "sekFormTools.input.datepicker"). поле date picker jQuery.
- [sekFormTools.input.textfield](extras/sekformtools/sekformtools.input.textfield "sekFormTools.input.textfield"). текстовое поле jQuery с подсказкой.
- [sekFormTools.input.helper](extras/sekformtools/sekformtools.input.helper "sekFormTools.input.helper"). вызывается с пустой страницы, заполняет автодополнение и combo box из базы.
- spellchecker. вызов `[[spellchecker]]` на странице включает проверку орфографии и грамматики во всех textarea.

Для сложных сценариев см. [Advanced Examples](extras/sekformtools/sekformtools-advanced-examples "sekFormTools Advanced Examples").

## Доступные настройки

| Имя                              | Описание                                                                                                                                                                                                                                             | По умолчанию    | Версия |
| --------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------- | ------- |
| sekformtools.load\_jquery         | Включает или отключает загрузку JQuery при вызове sekFormTools на странице. Если JQuery уже грузится другим extra или в шаблоне, установите No/False. | Yes/True   | >0.0.1  |
| sekformtools.customcss            | Путь к CSS относительно папки assets modx.                                                                                                                                                                                         |            | >0.0.1  |
| sekformtools.theme                | Тема полей формы.                                                                                                                                                                                                                   | smoothness | >0.0.1  |
| sekformtools.helper\_resource\_id | ID страницы с jquery-вызовами. Нужен только для autocomplete или фильтрации combobox,                                                                                                                  |            | >0.0.1  |

## Темы

SekFormTools поставляется с 8 темами. Дополнительные темы можно скачать с сайта jquery.ui и положить в папку css.

| Имя темы     | Версия |
| -------------- | ------- |
| blitzer        | >0.0.1  |
| eggplant       | >0.0.1  |
| flick          | >0.0.1  |
| overcast       | >0.0.1  |
| pepper-grinder | >0.0.1  |
| redmond        | >0.0.1  |
| smoothness     | >0.0.1  |
| ui-lightness   | >0.0.1  |
| humanity       | >0.0.5  |
