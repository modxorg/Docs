---
title: "Обновление c MODX Evolution"
translation: "getting-started/maintenance/upgrading/evolution"
---

Из-за значительных различий в кодовой базе, синтаксисе тегов и пользователях, обновление с MODX Evolution до Revolution является более сложным процессом с рядом шагов, выполняемых вручную. 

**Настоятельно рекомендуется создать резервную копию данных перед выполнением любого обновления.**. Как только вы это сделаете, просто запустите обновление **setup/**, и ваши таблицы базы данных будут обновлены. 

Здесь произойдет несколько вещей. Первое - вы вероятно заметите, что большинство ваших сторонних скриптов будут сломаны. Вам нужно будет преобразовать их в ядро Revolution, а также модифицировать все ваши теги в новый [Синтаксис тегов](building-sites/tag-syntax "Синтаксис тегов"). Надеемся, что разработчики компонентов уже преобразуют свои скрипты к этому моменту, поэтому вы сможете найти пакеты, совместимые с Revolution, через [Менеджер пакетов](extending-modx/transport-packages «Менеджер пакетов») или на [modx.com](https://modx.com/extras/) или на [форумах](https://community.modx.com/). 

Также стоит отметить, что больше нет "веб-пользователей" или "пользователей-менеджеров" - только Пользователи. И [новая схема разрешений](building-sites/client-proofing/security "Безопасность (ACLs)") сильно отличается от версии 0.9.6/Evolution. 

Опять же, мы не рекомендуем это делать, но если вы _храбрая_ душа, вы можете сделать резервную копию и попробовать. 

Отличный ресурс по обновлению с Evolution можно найти здесь: <https://bobsguides.com/migrating-revolution.html>

## Изменения компонентов Evolution

Некоторые компоненты в Evolution прекратили своё существование или больше не находятся в активной разработке. Ниже приведен список дополнений Evolution и их эквивалентов в Revolution. 

| Evolution   | Revolution                                                                                                                                                                        |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Ditto       | [getResources](/extras/getresources "getResources"), [getPage](/extras/getpage "getPage"), [tagLister](/extras/taglister "tagLister"), [Archivist](/extras/archivist "Archivist") |
| Jot         | [Quip](/extras/quip "Quip")                                                                                                                                                       |
| SiteMap     | [GoogleSiteMap](/extras/googlesitemap "GoogleSiteMap")                                                                                                                            |
| MaxiGallery | [Gallery](/extras/gallery "Gallery")                                                                                                                                              |
| eForm       | [FormIt](/extras/formit "FormIt")                                                                                                                                                 |
| Wayfinder   | [Wayfinder](/extras/wayfinder "Wayfinder")                                                                                                                                        |
| DocManager  | [Batcher](/extras/batcher "Batcher")                                                                                                                                              |
| AjaxSearch  | [SimpleSearch](/extras/simplesearch "SimpleSearch")                                                                                                                               |
| WebLogin    | [Login](/extras/login "Login")                                                                                                                                                    |

## Смотри также

- [Функциональные изменения после Evolution](getting-started/maintenance/upgrading/evolution/functional-changes)
- [Руководство Боба Рэя по обновлению до Revolution](https://bobsguides.com/migrating-revolution.html)
