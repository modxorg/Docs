---
title: "Импорт CSV"
description: "Импорт подписчиков Eletters из CSV-файла"
translation: "extras/eletters/eletters.import-csv"
---

Добавлено в 1.0 beta3

Теперь можно подготовить CSV и импортировать подписчиков напрямую, указав активность и группы.

## Подготовка CSV для импорта

Подготовка CSV проста, если вы работали с Excel или аналогом. Пример файла: core/components/eletters/docs/example-import.csv

1. Откройте Excel. В первой строке укажите имена столбцов: crm\_id, first\_name, m\_name, last\_name, company, address, city, state, zip, country, email, phone, cell. Порядок не важен, лишние столбцы можно опустить. Обязателен минимум email
  ![](header-row.png)
2. Заполните столбцы данными подписчиков
3. Сохраните файл в формате CSV
  ![](save-as-csv.png)

## Импорт CSV-файла

1. Наведите на Components и выберите Eletters
2. В разделе управления откройте вкладку Subscribers
3. Нажмите кнопку Import CSV
  ![](import-button.png)
4. В открывшемся окне выберите CSV, отметьте Active и нужные группы
  ![](import-window.png)

## См. также

1. [Eletters.API](extras/eletters/eletters.api)
2. [Eletters.FormIt](extras/eletters/eletters.formit)
3. [Eletters.Import CSV](extras/eletters/eletters.import-csv)
4. [Eletters.Templates](extras/eletters/eletters.templates)
