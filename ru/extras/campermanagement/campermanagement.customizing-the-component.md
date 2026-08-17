---
title: "Настройка компонента"
description: "Как менять терминологию, лексикон и кнопки CamperManagement без правок кода"
translation: "extras/campermanagement/campermanagement.customizing-the-component"
---

CamperManagement создавали под конкретный сайт, поэтому в нём есть узкая терминология и специфичные возможности. Благодаря гибкости MODX и встроенной настройке многое можно изменить без опыта разработки. На этой странице обзор подхода.

## Изменение терминологии и полей компонента

Дополнение использует термины вроде «Campers», «Brands» и т.д. Их сделали переводимыми при разработке, и через Lexicon Management (System в главном меню) вы меняете формулировки по всему компоненту. В релизе 1.0 доступно 82 строки: от «CamperManagement» до «Car» и сообщений об ошибках.

В этом примере меняем заголовок компонента («CamperManagement») и подписи полей под контекст б/у землеройной техники.

### Первое знакомство с Lexicon Management

Перейдите в [namespace](developing-in-modx/advanced-development/namespaces "Namespaces") «campermanagement». На экране Lexicon Management есть выпадающий список, по умолчанию «core». Откройте его и выберите campermanagement. ![](screenlexmgmt.png)
У каждой строки есть имя (ключ), которое код вызывает для вывода текста. Имена обычно узнаваемы. Кнопка «Back to Overview» (справа вверху на странице списка кемперов) имеет ключ «campermgmt.button.backtooverview», заголовок вкладки «Options», ключ «campermgmt.tab.options». Если нужную строку не находите, введите видимый текст в поле поиска справа.

### Изменение строк

Поменяем заголовок дополнения на «Used Equipment Management». Заголовок это строка «campermgmt». Дважды щёлкните значение и введите свой текст.

После обновления сетки (кнопка refresh внизу) строка станет зелёной и получит дату «Last modifed on». ![](screenlexmgmt2.png)
Переопределения в Lexicon Management сохраняются в базе. При обновлении дополнения или MODX они не пропадут, в отличие от правок файлов лексикона в поставке компонента.

Перед проверкой результата **очистите кеш**. Лексиконы кешируются, без сброса изменения не появятся. Site > Clear Cache, затем обновите страницу компонента. Если меняли пункт меню (ключ campermgmt или campermgmt.description), иногда нужно принудительно обновить меню: удалите файл в core/cache/menu/mgr/menus/ и снова откройте страницу.

Дальше меняйте другие строки. Если поля «Plate» нет, а нужно «Capacity», замените лексикон «Place» на «Capacity» в компоненте. Имя поля для фронтенда не меняется (останется `[[+plate]]`), но после разработки это редко смотрят.

#### Имена статусов

Разные имена статусов задаются через лексикон: campermgmt.status0 … campermgmt.status5.

## Пользовательская кнопка над сеткой Campers

Одну кнопку над сеткой кемперов добавляют системной настройкой, текст кнопки меняют в Lexicon Management.

Создайте системную настройку с ключом campermanagement.overview. Для порядка укажите namespace campermanagement. Значение это валидный ID ресурса (фронтенд-страница).

В Lexicon Management измените строку campermgmt.overview на текст кнопки.

По клику пользователь попадёт на указанный ресурс, поэтому там стоит разместить полезный контент. Изначально кнопка задумывалась для печатного обзора техники на складе: на ресурсе вызывают cmCampers и строят таблицу. Пользователь уже авторизован в менеджере, страницу можно оставить неопубликованной.

Пример вызова:

``` php
[[!cmCampers? &limit=`0` &sort=`keynr` &dir=`asc` &includeImages=`false` &status=`1,2,3,4` &tplOuter=`cmVoorraadOuter` &tplItem=`cmVoorraadItem` &optionsSeparator=` / `]]
```

Чанк cmVoorradOuter:

``` php
<table id="voorraadPrint">
   [[+items]]
</table>
```

Чанк cmVoorraadItem:

``` php
<tr>
  <td rowspan="2">
    <strong>[[+keynr:notempty=`Nr. [[+keynr]]`]]
      [[+plate:notempty=`<br />[[+plate]]`]]</strong>
  </td>

  <td rowspan="2">
    [[+brand]] / [[+type]] / [[+car:notempty=`[[+car]] /`]] [[+engine:notempty=`[[+engine]] /`]] Bouwjaar [[+manufactured:eq=`0`:then=`onbekend`:else=`[[+manufactured]]`]] / Gewicht [[+weight:eq=`0`:then=`onbekend`:else=`[[+weight]]`]] /
    [[+beds]] Slaapplaatsen / Kilometerstand [[+mileage:eq=`0`:then=`onbekend`:else=`[[+mileage]]`]] / APK tot [[+periodiccheck:eq=`0`:then=`onbekend`:else=`[[+periodiccheck]]`]] /
    [[+options]]
    [[+remarks]]
  </td rowspan="2">

  <td>

[[+status:eq=`2`:then=`
<img src="/assets/templates/lighthouse/cmimg/banner_topper_sm.png" alt="Topper" />`]]
[[+status:eq=`3`:then=`<img src="/assets/templates/lighthouse/cmimg/banner_optie_sm.png" alt="In optie" />
`]]
[[+status:eq=`4`:then=`
<img src="/assets/templates/lighthouse/cmimg/banner_verkocht_sm.png" alt="Verkocht" />
`]]
</td></tr><tr><td>
    <strong>&euro; [[+price]]</strong>
  </td>
</tr>
```

С CSS результат выглядит так:

![](overview.png)

## Пользовательские пункты контекстного меню

Поддерживаются до двух пунктов контекстного меню. Их добавили для печатной страницы деталей в салоне и для генерации «договора» с данными владельца и техники.

Работает как у кнопки: системные настройки campermanagement.ctxmenu1 и campermanagement.ctxmenu2 с ID ресурса. Лексикон: campermgmt.ctxmenu1 и campermgmt.ctxmenu2. Переход: siteurl + index.php?id= + ID из настройки + &cid= + ID техники. Обычно на ресурсе вызывают cmCamperDetails с параметром cid. При других gateway-настройках (не index.php или другой параметр ID) правьте assets/components/campermanagement/js/mgr/widgets/grids/grid.campers.js, примерно в середине файла собирается меню.

На ресурсе вызовите `[[!cmCamperDetails]]` и используйте плейсхолдеры `[[!+cm.<fieldname>]]`. Ограничение только в вашей фантазии.
