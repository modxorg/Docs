---
title: "Файлы"
translation: "building-sites/client-proofing/dashboards/widget-types/file"
description: "Виджет панели управления типа «Файл» в MODX: способы вернуть содержимое виджета из файла."
---

Тип виджета File Dashboard запускает файл из файловой системы. Результатом работы может быть:

- возврат результата работы файла с отрисовкой его в панели содержимого виджета;
- вывод результата работы файла без `return`;
- возврат имени класса, который расширяет `modDashboardWidgetInterface` — абстрактный класс, предоставляемый MODX, у которого есть метод `render()`, возвращающий вывод для панели содержимого виджета.

## Использование 

Поместите имя файла в текстовую область содержимого виджета. Вы можете использовать следующие плейсхолдеры для ссылки в пути виджета:

- `[[++base_path]]`
- `[[++core_path]]`
- `[[++manager_path]]`
- `[[++assets_path]]`
- `[[++manager_theme]]`

**Используйте абсолютный путь**
Относительный путь разрешается от рабочего каталога процесса PHP, а не от корня MODX, поэтому он не переносится между установками. Соберите путь из `[[++manager_path]]` и подобных.

### Возврат результата

Первый способ — просто вернуть результат:

``` php
<?php
return 'Hello, world!';
```

В панели контента виджета отобразится "Hello, world!".

### Вывод результата

Подойдёт и файл, который печатает результат и ничего не возвращает:

``` php
<?php
echo 'Hello, world!';
```

Вывод файла перехватывается и отрисовывается в панели контента виджета.

### Возврат имени класса

Вы также можете вернуть имя класса, определённое во внешнем файле, который расширяет абстрактным класс `modDashboardWidgetInterface`, предоставляемый MODX для визуализации виджетов. Это полезно для разработчиков виджетов, которым нужен ООП-подход и с которым можно запускать модульные тесты.

Пример виджета на основе классов:

``` php
class modDashboardWidgetHelloWorld extends modDashboardWidgetInterface {
    public $version = '1.0';

    public function render() {
        $o = 'Hello, World! Version: '.$this->version;
        return $o;
    }
}
return 'modDashboardWidgetHelloWorld';
```

Вывод виджета:

> Hello, World! Version: 1.0

## Доступные переменные

Для файловых виджетов доступны следующие переменные PHP:

- `$modx` - ссылка на экземпляр MODX.
- `$scriptProperties` - Массив свойств этого виджета Dashboard, как будто `toArray()` был запущен для объекта виджета.

## Смотрите также

1. [Тип виджета панели инструментов - Файл](building-sites/client-proofing/dashboards/widget-types/file)
2. [Тип виджета панели инструментов - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Тип виджета Dashboard - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Тип виджета на приборной панели - сниппет](building-sites/client-proofing/dashboards/widget-types/snippet)
