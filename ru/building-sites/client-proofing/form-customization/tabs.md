---
title: "Настройка вкладок"
translation: "building-sites/client-proofing/form-customization/tabs"
description: "Области формы ресурса в MODX, которые настройка форм может спрятать или переименовать, и как добавить свою область."
---

Когда вы используете настройку форм для настройки форм в менеджере MODX, вы можете либо разрешить / запретить доступ к определенным полям, либо разрешить / запретить доступ ко всем вкладкам или *частям* вкладок.

**Если область — не вкладка** При настройке правил в разделе **Admin → Form Customization**, а затем при редактировании набора, существует список «Областей», но он не соответствует непосредственно знакомым «Документ», «Настройки», «Переменные шаблона» и «Ресурсные группы». Идентификаторы областей, перечисленные здесь, относятся ко всем вкладкам или *частям* вкладок.

## Области формы

Это различные области вкладок, видимость которых можно переключать.

| ID | Заголовок области по умолчанию | Описание |
| --- | --- | --- |
| modx-resource-settings | Документ | Основная вкладка |
| modx-resource-main-left | | |
| modx-resource-content-above | | |
| modx-resource-content-below | | |
| modx-resource-main-right | | |
| modx-resource-main-right-top | | |
| modx-resource-main-right-middle | | |
| modx-resource-main-right-bottom | | |
| modx-page-settings | Настройки | Основная вкладка |
| modx-page-settings-left | | |
| modx-page-settings-right | | |
| modx-page-settings-box-left | | |
| modx-page-settings-box-right | | |
| modx-panel-resource-tv | Переменные шаблона | Основная вкладка |
| modx-resource-access-permissions | Ресурсные группы | Основная вкладка |

Набор, привязанный к действию **Create Resource**, предлагает на две области меньше: `modx-resource-content-above` и `modx-resource-content-below`.

Список областей хранится в справочнике и заполняется при установке MODX. На базе, обновлённой с 2.x, список может быть короче.

## Добавление новых вкладок

Добавить новую вкладку довольно просто. Отредактируйте свой набор и откройте вкладку **Regions**. Нажмите **Создать**, задайте области идентификатор, например `my-new-tab`, и **Title**.

![](fc_new_tab.jpg)

Каждый раз, когда вам нужно обратиться к области, например при переносе TV на новую вкладку, используйте идентификатор, который вы ей дали.

Идентификатор должен быть уникален в пределах набора. Область, созданная так, удаляется снова пунктом **Delete** её контекстного меню; области самой формы удалить нельзя.

## Смотрите также

1. [Настройка менеджера](building-sites/client-proofing/form-customization)
2. [Профили настройки формы](building-sites/client-proofing/form-customization/profiles)
3. [Наборы настроек формы](building-sites/client-proofing/form-customization/sets)
   1. [Правила настройки формы](building-sites/client-proofing/form-customization/rules)
   2. [Настройка вкладок](building-sites/client-proofing/form-customization/tabs)
4. [Пользовательские темы системы управления](building-sites/client-proofing/custom-manager-themes)
