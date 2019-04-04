---
title: "Настройка форм"
translation: "/_legacy/administering-your-site/fc-resource"
---

## Создание и обновление ресурса

Эти наборы охватывают следующие действия:

- resource/update
- resource/create

При использовании действия _resource/create_ ограничивающее значение будет применяться по **родительскому** ресурсу. Итак, ограничивающее значение:

- modResource
- parent
- 2

... будет применять правило для всех новых ресурсов, являющимися дочерними для ресурса с ID 2.

## Доступные поля

| Поле                            | Название              | Область                            |
| ------------------------------- | --------------------- | ---------------------------------- |
| ID                              | id                    | modx-resource-main-left            |
| Page Title                      | pagetitle             | modx-resource-main-left            |
| Long Title                      | longtitle             | modx-resource-main-left            |
| Description                     | description           | modx-resource-main-left            |
| Introtext                       | introtext             | modx-resource-main-left            |
| Template                        | template              | modx-resource-main-right           |
| Alias                           | alias                 | modx-resource-main-right           |
| Menu Title                      | menutitle             | modx-resource-main-right           |
| Link Attributes                 | link\_attributes      | modx-resource-main-right           |
| Hide from Menus                 | hidemenu              | modx-resource-main-right           |
| Published                       | published             | modx-resource-main-right           |
| Content                         | modx-resource-content | modx-resource-content              |
| Parent                          | parent-cmb            | modx-page-settings-left            |
| Class Key                       | class\_key            | modx-page-settings-left            |
| Content Type                    | content\_type         | modx-page-settings-left            |
| Content Disposition             | content\_dispo        | modx-page-settings-left            |
| Menu Index                      | menuindex             | modx-page-settings-left            |
| Published On                    | publishedon           | modx-page-settings-right           |
| Publish Date                    | pub\_date             | modx-page-settings-right           |
| Un-Publish Date                 | unpub\_date           | modx-page-settings-right           |
| Container                       | isfolder              | modx-page-settings-right-box-left  |
| Searchable                      | searchable            | modx-page-settings-right-box-left  |
| Use current alias in alias path | alias\_visible        | modx-page-settings-right-box-left  |
| Rich Text                       | richtext              | modx-page-settings-right-box-left  |
| Freeze URI                      | uri\_override         | modx-page-settings-right-box-left  |
| URI for Freeze URI              | uri                   | modx-page-settings-right-box-left  |
| Cacheable                       | cacheable             | modx-page-settings-right-box-right |
| Empty Cache                     | syncsite              | modx-page-settings-right-box-right |
| Deleted                         | deleted               | modx-page-settings-right-box-right |

## Дотсупные области

Эти области доступны для переименования:

| Область              | Название (#ID)                   |
| -------------------- | -------------------------------- |
| Документ             | modx-resource-settings           |
| Настройки            | modx-page-settings               |
| TV                   | modx-panel-resource-tv           |
| Группы ресурсов      | modx-resource-access-permissions |

Эти области доступны для сокрытия:

| Область                                                  | Название (#ID)                     |
| -------------------------------------------------------- | ---------------------------------- |
| Документ (от "Заголовка" до "Аннотации")                 | modx-resource-main-left            |
| Документ (от "Шаблона" до "Опубликован")                 | modx-resource-main-right           |
| Настройки (от "Родительский ресурс" до "Позиции в меню") | modx-page-settings-left            |
| Настройки (от "Опубликован" до "Даты отмены публикации") | modx-page-settings-right           |
| Настройки (от "Контейнер" до "Заморозить URI")           | modx-page-settings-right-box-left  |
| Настройки (от "Кэшируемый" до "Удален")                  | modx-page-settings-right-box-right |

## Скрытие поля содержимого

Используйте эти настройки:

**Поле**: modx-resource-content
**Область**: modx-resource-content
**Правило**: Видимый
**Значение**: 0

## TV

Повлиять на TV в ресурсе довольно просто - установите "tv#" для атрибута "Имя" нужного правила и замените # на ID TV, на который вы хотите повлиять. Вы можете оставить содержание пустым.

Правила для TV на панели "Ресурсы" применяются как для создания, **так и** обновления. Вам понадобится только одно правило.
