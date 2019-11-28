---
title: "Файлы"
_old_uri: "building-sites/client-proofing/dashboards/widget-types/file"
---

Тип виджета File Dashboard запускает файл из файловой системы. Результатом работы может быть:

- возврат результата работы файла отрендарив его в панели содержимого виджета.
- возврат имени класса, который расширяет modDashboardWidgetInterface, абстрактный класс, предоставляемый MODX, который имеет метод render(), который будет возвращать выходные данные для визуализации на панель содержимого виджета.

## Использование 

Поместите имя файла в текстовую область содержимого виджета. Вы можете использовать следующие плейсхолдеры для ссылки в пути виджета:

- `[[++base_path]]`
- `[[++core_path]]`
- `[[++manager_path]]`
- `[[++assets_path]]`
- `[[++manager_theme]]`

### Вывод результата

Существует два метода, при помощи которых можно вернуть результаты работы вашего файла. Первый - просто вернуть результат:

``` php
<?php
return 'Hello, world!';
```

В панели контента виджета отобразиться "Hello, world!".

### Возврат имени класса

Вы также можете вернуть имя класса, определённое во внешнем файле, который расширяет абстрактным класс modDashboardWidgetInterface, предоставляемый MODX для визуализации виджетов. Это полезно для разработчиков виджетов, которым нужен ООП-подход и с которым можно запускать модульные тесты.

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

## Available Variables

Для файловых виджетов доступны следующие переменные PHP:

- `$modx` - ссылка на экземпляр MODX.
- `$scriptProperties` - Массив свойств этого виджета Dashboard, как будто `toArray()` был запущен для объекта виджета.

## Смотрите также

1. [Тип виджета панели инструментов - Файл](building-sites/client-proofing/dashboards/widget-types/file)
2. [Тип виджета панели инструментов - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Тип виджета Dashboard - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Тип виджета на приборной панели - сниппет](building-sites/client-proofing/dashboards/widget-types/snippet)
