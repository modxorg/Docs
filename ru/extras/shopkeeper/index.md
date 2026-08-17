---
title: "Shopkeeper"
description: "Корзина и управление заказами для MODX Revolution"
translation: "extras/shopkeeper/index"
---

Корзина и управление заказами для MODX Revolution.

## Установка

1. Скачайте и установите
   1. Extra можно скачать в менеджере: «System» -> «Package Management». Нажмите «Download extras». Затем «Extras» -> «E-commerce», строка «Shopkeeper», «Download», затем «Finish».
   2. Если вы скачали файл с modx.com (<https://modx.com/extras/package/shopkeeper2>), загрузите «shopkeeper-2.0-\*.transport.zip» в /core/packages/ сайта. В менеджере: «System» -> «Package Management» -> «Search Locally for Packages» -> «Download extras» -> «Yes».
2. В списке пакетов появится «shopkeeper». Нажмите «Install».
3. Завершите установку.

## Настройки

1. Откройте «Elements» -> «Snippets» -> «Shopkeeper» -> «Properties».
2. Нажмите «Add Property Set», отметьте «Create New Property Set» и заполните поля.
3. В списке слева выберите созданный набор и при необходимости измените настройки.
4. В шаблоне в месте вывода корзины вызовите Shopkeeper с именем Property Set.

Пример:

``` php
[[!Shopkeeper@catalog?propertySetName=`catalog`]]
```

propertySetName это имя Property Set. То же имя указывается после символа «@».

Редактировать свойства сниппета по умолчанию не рекомендуется: они могут измениться при обновлении.

В админ-панели в конфигурации компонента («System» -> «System Settings» -> «shopkeeper») задайте «Default snippet Property Set». Этот набор используется при отправке заказа.

Товары создаются как ресурсы. Для удобства можно использовать компонент **Group Edit** (<https://modx.com/extras/package/groupedit>).

## Дополнительные параметры товаров

Товарам можно задать параметры, которые покупатель выбирает при добавлении в корзину.
Параметры выводятся выпадающим списком shk\_select, radio shk\_radio или checkbox shk\_checkbox.
Output Type задаётся в настройках TV на вкладке «Output Options».

Значения параметров (на странице редактирования ресурса/товара) вводятся так:

**Parameter name 1==Price 1||Parameter name 2==Price 2||...**

Можно указать значение с умножением: **Weight==\*0.5||Weight==\*1**
Тогда цена товара умножается на цену параметра.

В чанке getResources параметры выводятся как плейсхолдеры:

``` php
[[+tv.param1]]
```

На странице товара замените ID параметра фильтром replace:

``` php
[[*param1:replace=`[[+id]]==[[*id]]`]]
```

## Письма покупателю при смене статуса заказа

Чтобы при смене статуса заказа покупателю уходил email, в конфигурации модуля (basic settings) создайте параметр с ключом «shk.mailstatus\_1», где 1 это номер статуса с нуля.
В значении укажите имя чанка шаблона письма, например «@FILE mailChangeStatus.tpl». Namespace: «shopkeeper».

## События для plugins

**OnSHKaddProduct** - Adding Item to cart. $purchaseArray
**OnSHKgetProductPrice** - Call for Price product when you add to cart. $purchaseArray
**OnSHKcalcTotalPrice** - Calculating the total price of the products in your cart. $price\_total, $purchases
**OnSHKbeforeCartLoad** - Called before the formation of HTML-code cart.
**OnSHKcartLoad** - The output cart. $items\_total, $price\_total
**OnSHKChangeStatus** - Change the order status. Available: $order\_id, $status.
**OnSHKsaveOrder** - Sending an order. $order\_id

## JS-callback функции

**SHKfillCartCallback(form)** - given command to add product to cart;
**SHKemptyCartCallback()** - given the command to empty the cart;
**SHKloadCartCallback()** - Cart is loaded / updated;
**SHKtoCartCallback(form)** - given the command to send product to cart.

Создайте функции с этими именами, и они вызовутся при соответствующем действии.
