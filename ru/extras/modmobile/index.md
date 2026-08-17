---
title: "modMobile"
description: "Плагин для переключения шаблона при посещении сайта с мобильного устройства"
translation: "extras/modmobile/index"
---

## Что такое modMobile?

modMobile это плагин, который меняет шаблон, когда сайт открывают с мобильного устройства.

## История

| Version                                              | Release date  | Contributors   | Remarks / highlights                  |
| ---------------------------------------------------- | ------------- | -------------- | ------------------------------------- |
| 1.0 pl                                               | Jan 5th, 2012 | Josh Gulledge  | Added Snippet and refactored the code |
| [0.1.0 alpha](https://modx.com/extras/package/moddef) | Mar 03, 2011  | Jeroen Kenters | Initial release.                      |

### Требования

- MODX Revolution
- Mobile template

### Разработка и сообщения об ошибках

modMobile развивается на Github. Там же **[report bugs](https://github.com/jgulledge19/modMobile/issues)**, **feature requests** и **improvements**.

## Обновление

Возможно, нужно задать значение System Setting modmobile.mobile\_template. Раньше использовалось mobile\_template. Если осталась старая настройка mobile\_template, удалите её.

## Установка

Установите через Package Management

### Устранение неполадок

Это ранняя beta, после установки многое может пойти не так. Отключите plugin при проблемах. Сообщайте об ошибках на [github page](https://github.com/jgulledge19/modMobile/issues)!

## Использование

### Пример 1

Один шаблон для mobile и полной версии

1. Откройте System -> System Settings
2. Установите USE Placeholder в Yes
   
  ![](use-placeholder.png)
3. Если единственное отличие mobile и полной версии это CSS, в шаблоне сделайте так:

``` php
[[If?
    &subject=`[[+modxSiteTemplate]]`
    &operand=`mobile`
    &then=`<link rel="stylesheet" type="text/css" media="all" href="/assets/templates/css/mobileLayout.css" />`
    &else=`<link rel="stylesheet" type="text/css" media="all" href="/assets/templates/css/commonLayout.css" />
    <!--[if IE 6]>
        <link rel="stylesheet" type="text/css" media="all" href="/assets/templates/css/ie6.css" />
    <![endif]-->`
]]
```

Примечание: modxSiteTemplate это значение modmobile.get\_var и то же имя для переключения шаблона через URL. Для этого примера нужен extra If!

1. Добавьте в шаблон ссылку на mobile и обратно на полную версию:

``` html
<!-- Moblie Link -->
<a href="[[~[[*id]]]]?modxSiteTemplate=mobile">Mobile</a>
<!-- Back to Full site link -->
<a href="[[~[[*id]]]]?modxSiteTemplate=full">Full Site View</a>
```

Это необязательно, но настоятельно рекомендуется.

### Пример 2

Отдельный mobile-шаблон

1. Откройте System -> System Settings
1.1. Выберите modmobile, см. изображение
1.2. Введите ID mobile-шаблона
  ![](mobile-template-id.png)
2. Откройте сайт с iPhone или iPad. Должна показаться mobile-тема.
3. Добавьте в шаблоны ссылки на mobile и полную версию:
  Это необязательно, но настоятельно рекомендуется.
  
 ``` html
<!-- Moblie Link -->
<a href="[[~[[*id]]]]?modxSiteTemplate=mobile">Mobile</a>
<!-- Back to Full site link -->
<a href="[[~[[*id]]]]?modxSiteTemplate=full">Full Site View</a>
```
