---
title: "ClientConfig"
description: "Extra для настройки клиентских параметров сайта через удобный интерфейс в MODX Revolution"
translation: "extras/clientconfig/index"
---

ClientConfig это extra для MODX Revolution 2.2 и новее. Администраторы настраивают простые опции для клиентов. Вы задаёте группы (вкладки) и настройки с разными типами полей, клиент заполняет значения, а вы используете их в шаблонах или коде.

ClientConfig поддерживает Mark Hamstra на Github. Ошибки и запросы функций отправляйте туда. Pull requests приветствуются! <https://github.com/Mark-H/ClientConfig>. Первый релиз: 9 декабря 2012 года. Пакет доступен на [MODX.com](https://modx.com/extras/package/clientconfig).

[Обсуждение ClientConfig на форумах](http://forums.modx.com/thread/81490/clientconfig-custom-configuration-cmp-for-clients#dis-post-449423).

## Настройка опций конфигурации

ClientConfig позволяет определить, что именно будет управлять клиент. Пакет поставляется как пустой холст, который вы настраиваете под проект.

Откройте ClientConfig из меню Components и нажмите Admin в правом верхнем углу. Начните с группы на вкладке Groups. Группы группируют настройки во вкладках клиентского интерфейса. Настройка без группы клиенту не видна. Создайте группу кнопкой New Group. Укажите имя и описание.

Затем добавьте настройки на вкладке Settings. Нажмите Add Setting и заполните форму. Ниже разобраны основные опции.

## Настройки

У каждой настройки есть фиксированный набор полей:

- **key**: ключ для получения значения: `[[++key]]`, `'key' | config` в fenom или $modx->getOption('key') в коде.
- **label**: видимое имя поля.
- **xtype** (тип поля): допустимый тип поля, см. ниже.
- **description**: описание поля для контекста. Показывается при наведении.
- **is\_required**: отметьте, если поле обязательно.
- **value**: текущее сохранённое значение.
- **default**: значение по умолчанию (условно устарело)
- **group**: группа, в которой показывается поле
- **options**: конфигурация, специфичная для типа поля. Доступна только для части типов. См. ниже.

После создания и сохранения настройки доступны как `[[++key]]` или через $modx->getOption('key') в коде.

Если есть системные или контекстные настройки с тем же `[[++key]]`, значения ClientConfig их переопределят.

## Типы полей

Для конфигурации доступны разные типы полей. xtype в скобках для ExtJS-разработчиков, которые хотят знать, что используется в форме.

- Text (xtype: textfield)
- Textarea (xtype: textarea)
- Number (xtype: numberfield)
- Checkbox (xtype: xcheckbox)
- Date (xtype: datefield)
- Time (xtype: timefield)
- Selectbox (xtype: modx-combo). properties: Text==value||Text2==value

Тип Selectbox можно использовать для поведения yes||no как у некоторых System Settings, задав options поля как на скриншоте:

![](screen-shot.png)
