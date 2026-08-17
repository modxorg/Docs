---
title: "getArchives"
description: "Сниппет getArchives: вывод результатов архива из ссылок Archivist"
translation: "extras/archivist/archivist.getarchives"
---

## Сниппет getArchives

Этот сниппет выводит результаты по ссылке архива, которую создал сниппет [Archivist](extras/archivist/archivist "Archivist").

## Использование

Разместите сниппет там, где нужно показать архив. getArchives сам обрабатывает FURL и входные данные из вызова [Archivist](extras/archivist/archivist "Archivist").

``` php
[[!getArchives? &parents=`4,12,33`]]
```

При использовании с [getPage](extras/getpage "getPage") задайте &cache=`0` в вызове getPage.

## Доступные параметры

getArchives это вариант [getResources](extras/getresources "getResources"). **Все параметры** **[getResources](extras/getresources "getResources")** **доступны и в getArchives**, плюс следующие:

| Имя           | Описание                                                                                                                                                  | По умолчанию |
| ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
| tpl           | Имя chunk-шаблона ресурса.                                                                                                                                |              |
| parents       | Список ID родителей через запятую.                                                                                                                        |              |
| filterField   | Поле для фильтрации по архивам. Должно совпадать с sortBy в вызове Archivist.                                                                             | publishedon  |
| filterPrefix  | Префикс GET-параметров в ссылках Archivist. Должен совпадать с filterPrefix в вызове getArchives.                                                         | arc\_        |
| tagsIndex     | Если задано и найден REQUEST-параметр с этим индексом, результаты автоматически фильтруются по значению.                                                  | tags         |
| toPlaceholder | Если задано, вывод сниппета записывается в плейсхолдер вместо прямого вывода.                                                                            |              |

Если getArchives не показывает результаты, а ресурсы **скрыты из меню**, укажите параметр &showHidden=`1` (наследуется от getResources).

## Chunks getArchives

getArchives обрабатывает один chunk. Соответствующий параметр:

- [tpl](extras/archivist/archivist.getarchives/archivist.getarchives/tpl "tpl"): chunk для каждого выводимого результата.

## Примеры

Выведите архивы для родителей 4, 12 и 33. Запишите результат в плейсхолдер results:

``` php
[[!getArchives? &parents=`4,12,33` &toPlaceholder=`results`]]

<h2>Search Results</h2>

[[!+results]]
```

## См. также

1. [Archivist](extras/archivist/archivist)
   1. [Archivist.tpl](extras/archivist/archivist/tpl)
2. [ArchivistGrouper](extras/archivist/archivist.archivistgrouper)
3. [getArchives](extras/archivist/archivist.getarchives)
   1. [getArchives.tpl](extras/archivist/archivist.getarchives/tpl)
