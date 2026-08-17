---
title: "Права доступа"
description: "Список permission keys Fred для Manager и фронтенд-контекстов"
translation: "extras/fred/site_admin/acls/permissions"
---

Ниже перечислены права Fred. Подзаголовок это ключ permission в коде, далее кратко, где и что он контролирует. Большинство прав работает и в контексте `mgr`, и на фронтенде вроде `web`. Есть права только для `mgr` или только для фронтенда.

Например, право `fred` в контексте `mgr` показывает Fred Extra в Manager. На фронтенде оно включает элементы управления Fred при просмотре сайта (если шаблон страницы назначен). Право `fred_settings` в `mgr` ничего не даёт: оно только для фронтенда и открывает вкладку Settings в sidebar.

## Общие права

### fred

Просмотр Fred (mgr) (web)

### fred_settings

Просмотр меню Settings в sidebar (web)

### fred_settings_advanced

Просмотр Advanced Settings в меню Settings (web)

### fred_settings_tvs

Просмотр раздела TVs в меню Settings (web)

### fred_settings_tags

Просмотр раздела Tags в меню Settings (web)

### fred_media_sources

Просмотр Media Sources (mgr)

## Права Elements

### fred_elements

Просмотр Elements (mgr) (web)

### fred_element_save

Создание, правка и дублирование Elements (mgr)

### fred_element_delete

Удаление Elements (mgr)

### fred_element_front_end_delete

Удаление Elements из drop zone (web)

### fred_element_screenshot

Скриншот для превью Element в sidebar (web)

### fred_element_move

Drag and drop Elements в drop zones (web)

### fred_element_rebuild

Просмотр вкладки Rebuild (mgr)

### Права категорий Element

#### fred_element_categories

Просмотр категорий Fred Element (mgr)

#### fred_element_category_save

Создание, правка и дублирование Element (mgr)

#### fred_element_category_delete

Удаление категорий Element (mgr)

#### fred_element_cache_refresh

Кнопка обновления кеша на панели Element (web)

## Права RTE Config

### fred_element_rtes

Просмотр RTE configs (mgr)

### fred_element_rte_config_save

Создание, правка и дублирование RTE configs (mgr)

### fred_element_rte_config_delete

Удаление RTE configs (mgr)

## Права Option Sets

### fred_element_option_sets

Просмотр Option Sets (mgr)

### fred_element_option_sets_save

Создание, правка и дублирование Option Sets (mgr)

### fred_element_option_sets_delete

Удаление Option Sets (mgr)

## Права Blueprints

### fred_blueprints

Просмотр Blueprints (mgr) (web)

### fred_blueprints_save

Создание, правка и дублирование Blueprints (mgr) (web)

### fred_blueprints_delete

Удаление Blueprints (mgr)

### fred_blueprints_create_public

Создание публичных Blueprints (mgr) (web)

### Права категорий Blueprint

#### fred_blueprint_categories

Просмотр категорий Blueprint (mgr)

#### fred_blueprint_categories_save

Создание, правка и дублирование категорий Blueprint (mgr) (web)

#### fred_blueprint_categories_delete

Удаление категорий Blueprint (mgr)

#### fred_blueprint_categories_create_public

Создание публичных категорий Blueprint (mgr) (web)

## Права тем

### fred_themes

Просмотр вкладки Themes (mgr)

### fred_themes_save

Создание, правка и дублирование Themes (mgr)

### fred_themes_delete

Удаление Themes (mgr)

### fred_themes_build

Сборка Themes (mgr)

### Права Themed Template

#### fred_themed_templates

Просмотр привязок Theme/Template (mgr)

#### fred_themed_templates_save

Назначение и обновление Fred Themes для шаблонов MODX (mgr)

#### fred_themed_templates_delete

Снятие Theme с шаблонов MODX (mgr)

## Права MODX

### new_document

Создание ресурсов (mgr) (web)

### new_document_in_root

Создание ресурсов в корне web root (mgr) (web)

### save_document

Сохранение ресурсов (mgr) (web)

### view_unpublished

Просмотр неопубликованных ресурсов (web)

### resource_duplicate

Дублирование ресурсов (mgr) (web)

### publish_document

Публикация ресурсов (mgr) (web)

### unpublish_document

Снятие с публикации (mgr) (web)

### delete_document

Удаление ресурсов (mgr) (web)

### undelete_document

Восстановление удалённых ресурсов (mgr) (web)
