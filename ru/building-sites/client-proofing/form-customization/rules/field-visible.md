---
title: "Видимость поля"
translation: "building-sites/client-proofing/form-customization/rules/field-visible"
description: "Правило «Видимость поля» набора настройки формы в MODX: как оно прячет поле формы."
---

## Что делает правило

Прячет поле формы менеджера. Поле не выводится вовсе, а значение ресурса в нём остаётся.

## Где задаётся

Вкладка **Поля** набора, колонка **Visible**. Снятая отметка у поля создаёт правило; поставленная обратно — удаляет его.

## К чему применяется

К полям формы ресурса:

`id`, `pagetitle`, `alias`, `longtitle`, `description`, `introtext`, `content`, `published`, `deleted`, `publishedon`, `pub_date`, `unpub_date`, `template`, `hidemenu`, `menutitle`, `link_attributes`, `menuindex`, `class_key`, `content_type`, `parent`, `content_dispo`, `isfolder`, `show_in_tree`, `hide_children_in_tree`, `alias_visible`, `uri_override`, `uri`, `richtext`, `cacheable`, `searchable`, `syncsite`.

Список полей хранится в справочнике формы и заполняется при установке MODX. На базе, обновлённой с 2.x, список может быть короче.

## Смотрите также

1. [Правила настройки формы](building-sites/client-proofing/form-customization/rules)
2. [Наборы настроек формы](building-sites/client-proofing/form-customization/sets)
3. [Настройка вкладок](building-sites/client-proofing/form-customization/tabs)
