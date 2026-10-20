---
title: "Расширение источников файлов"
translation: "building-sites/media-sources/extending"
description: "Свой тип источника файлов в MODX: контракт modMediaSourceInterface, свойства типа и события."
---

## Что такое тип источника

Тип источника — это класс PHP, который хранит и отдаёт файлы источника. В ядре MODX их три: «Файловая система», FTP и Amazon S3, и каждый из них — класс в пространстве имён `MODX\Revolution\Sources`.

Тип источника, который есть в списке менеджера, наследует `MODX\Revolution\Sources\modMediaSource`, а тот реализует интерфейс `MODX\Revolution\Sources\modMediaSourceInterface`. Список типов строится по карте классов xPDO: пакет, который поставляет класс, наследующий `modMediaSource`, и регистрирует его в метаданных модели, добавляет тип в список. Больше ничего регистрировать не нужно.

## Контракт типа источника

Свой тип реализует интерфейс `MODX\Revolution\Sources\modMediaSourceInterface`. Интерфейс объявляет все методы, которые вызывает менеджер и дерево файлов.

### Файлы и папки

| Метод | Назначение |
| --- | --- |
| `getContainerList($path)` | Возвращает папки каталога. |
| `getObjectsInContainer($path)` | Возвращает файлы каталога. |
| `createContainer($name, $parentContainer)` | Создаёт папку. |
| `removeContainer($path)` | Удаляет папку. |
| `renameContainer($oldPath, $newName)` | Переименовывает папку. |
| `uploadObjectsToContainer($container, array $objects = [])` | Загружает файлы в папку. |
| `getObjectContents($objectPath)` | Читает файл. |
| `updateObject($objectPath, $content)` | Записывает файл. |
| `createObject($objectPath, $name, $content)` | Создаёт файл. |
| `removeObject($objectPath)` | Удаляет файл. |
| `renameObject($oldPath, $newName)` | Переименовывает файл. |
| `moveObject($from, $to, $point = 'append')` | Перемещает файл или папку. |
| `getOpenTo($value, array $parameters = [])` | Возвращает папку, в которой открывается браузер. |

### Сам источник

| Метод | Назначение |
| --- | --- |
| `initialize()` | Открывает соединение с хранилищем. Возврат `false` прерывает работу источника. |
| `getBasePath($object = '')` | Возвращает путь в хранилище. |
| `getBaseUrl($object = '')` | Возвращает публичный адрес хранилища. |
| `getObjectUrl($object = '')` | Возвращает публичный адрес одного объекта. |
| `getTypeName()` | Возвращает имя типа в списке типов источников. |
| `getTypeDescription()` | Возвращает описание под именем. |
| `getDefaultProperties()` | Возвращает свойства типа. |

## Свойства типа источника

`getDefaultProperties()` возвращает массив описаний свойств. Менеджер и сам источник читают эти ключи каждого описания:

| Ключ | Что в нём |
| --- | --- |
| `name` | Имя свойства. Источник хранит значение под этим именем. |
| `desc` | Ключ описания в словаре. |
| `type` | Тип поля. Менеджер рисует подходящий элемент формы. |
| `options` | Варианты поля типа `list`. |
| `value` | Значение, которое у свойства, пока его не изменили. |
| `lexicon` | Пространство имён словаря, в котором лежит описание. |

```php
public function getDefaultProperties()
{
    return [
        'basePath' => [
            'name' => 'basePath',
            'desc' => 'prop_file.basePath_desc',
            'type' => 'textfield',
            'value' => '',
            'lexicon' => 'core:source',
        ],
    ];
}
```

Менеджер рисует по одной строке на каждое свойство на странице редактирования источника и хранит значения вместе с источником. Источник читает их обратно через `getPropertyList()`, который объединяет сохранённые значения со значениями по умолчанию.

## События

Плагины реагируют на то, что происходит с источниками и с файлами, которые они отдают:

| Событие | Когда срабатывает |
| --- | --- |
| `OnMediaSourceBeforeFormSave` | Перед сохранением источника из менеджера. |
| `OnMediaSourceFormSave` | После сохранения источника из менеджера. |
| `OnMediaSourceBeforeFormDelete` | Перед удалением источника из менеджера. |
| `OnMediaSourceFormDelete` | После удаления источника из менеджера. |
| `OnMediaSourceDuplicate` | После дублирования источника. |
| `OnMediaSourceGetProperties` | При чтении свойств источника. Плагин, вернувший массив свойств, заменяет их. |
| `OnFileManagerBeforeUpload` | Перед загрузкой файлов. |
| `OnFileManagerUpload` | После загрузки файлов. |
| `OnFileManagerDirCreate` | После создания папки. |
| `OnFileManagerDirRemove` | После удаления папки. |
| `OnFileManagerDirRename` | После переименования папки. |
| `OnFileManagerFileCreate` | После создания файла. |
| `OnFileManagerFileRemove` | После удаления файла. |
| `OnFileManagerFileRename` | После переименования файла. |
| `OnFileManagerFileUpdate` | После записи в файл. |
| `OnFileManagerMoveObject` | После перемещения файла или папки. |

## Смотрите также

1. [Источники файлов](building-sites/media-sources)
2. [Добавление источника файлов](building-sites/media-sources/creating)
3. [Назначение источника файлов для TV](building-sites/media-sources/assigning-to-tvs)
4. [Защита медиа источника](building-sites/media-sources/securing)
   1. [Руководство по созданию источника файлов для клиентов](building-sites/media-sources/securing/clients-tutorial)
5. [Типы источника файлов](building-sites/media-sources/types)
   1. [Тип источника файлов - Файловая система](building-sites/media-sources/types/media-source-type-file-system)
   2. [Тип источника файлов - FTP](building-sites/media-sources/types/media-source-type-ftp)
   3. [Тип источника файлов - S3](building-sites/media-sources/types/media-source-type-s3)
6. [Расширение источников файлов](building-sites/media-sources/extending)
