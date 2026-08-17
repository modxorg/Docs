---
title: "Flexibility"
description: "Готовый responsive-сайт на Foundation для быстрого старта проектов MODX Revolution"
translation: "extras/flexibility/index"
---

## Что такое Flexibility?

**Flexibility: полностью рабочий сайт на MODX Revolution.**

Быстрый старт проектов: полностью рабочий сайт MODX Revolution одним пакетом.

**Flexibility, версия 3.0.6-rc**
Пакет рассчитан на одноразовый quick-start проектов MODX. Он установит много компонентов и даст responsive-сайт на фреймворке Foundation от ZURB.

## Требования

- MODX Revolution 2.2+

## О проекте

«Flexibility» это HTML5/CSS3/jQuery фронтенд-шаблон MODX Revolution на базе «Foundation 3.2» (<http://foundation.zurb.com/>).
С пакетом вы получите рабочий сайт с выпадающей навигацией, контактной формой, слайдером и галереей изображений.

«Flexibility» спроектирован и закодирован Menno Pietersen
Портфолио и блог: DESIGNfromWITHIN <http://designfromwithin.com>
Twitter: MennoPP <https://twitter.com/MennoPP>

## Установка

- Скачайте и установите Flexibility через менеджер пакетов MODX.

### Внимание

- Template Variable «Slider items» (multiItemsGrid) после установки не будет работать, пока вы не откроете TV «multiItemsGrid» и не сохраните её снова.
  Откройте: дерево «Elements» > «Template Variables» > «Flexibility», затем TV «multiItemsGrid».
  Измените любое поле (например имя: удалите последнюю букву и введите снова) и сохраните TV. После этого «Slider Items» заработает как ожидается.
- Если вы меняете или правите чанк, сниппет, TV или плагин из пакета Flexibility, переименуйте его. Иначе при обновлениях он будет перезаписан.
- Нужные пакеты (например Wayfinder) Flexibility установит автоматически. Позже вы сможете обновлять и править подпакеты отдельно.

### Ручная установка

1. Установите MODX Revolution на сайт.
2. Скачайте пакет и загрузите файл «flexibility-3.0.6-rc.transport.zip» в «<your\_modx\_install>/core/packages/» (нужен только transport.zip, распаковывать его не нужно)
3. Установите пакет «Flexibility»: «System» > «Package Management» > «Add New Package» > «Search Locally for Packages» > «Yes» (очистите кэш: «Site» > «Clear Cache»)

## Добавление и изменение контента

Сайту на MODX нужны три основные вещи:

1. Логотип.
  Добавьте в «Resources» > «Site settings» > вкладка «Template Variables» > «Logo»
2. Email для контактной формы
  Добавьте в «Resources» > «Site settings» > «Template Variables» > «Email adress for the contactform»
3. Контент для футера
   - Выберите число блоков футера в «Resources» > «Site settings» > «Template Variables» > «Footer boxes»
   - Заполните каждый блок в «Resources» > «Site settings» > «Template Variables» > «Footer-content box 1», «Footer-content box 2», «Footer-content box 3» и «Footer-content box 4»
4. (необязательно) Слайды/контент для слайдера.
   - Добавьте в «Resources» > «Site settings» > «Template Variables» > «Slider items»
   - Включите слайдер на странице во вкладке «Template Variables».
5. Остальной контент страниц добавляйте как обычно. Дополнительные опции смотрите во вкладке «Template Variables» каждого ресурса.

## Инструкции по обновлению

- Все подпакеты (например Wayfinder) ставит Flexibility. Удалять и обновлять каждый подпакет можно в «System» > «Package Management».
- Пакет обновляется через установщик. Flexibility не перезаписывает существующие ресурсы.

## Благодарности

Всем поддерживающим и участникам:

- <http://foundation.zurb.com/>
- <http://html5boilerplate.com/> (не использовался, но подтолкнул к старту....)
- команде MODX Revolution за всю систему MODX
- Anselm Hannemann за MODX Boilerplate, <http://anselm.novolo.de/>
- сообществу MODX за советы и поддержку!

## Ошибки и запросы функций

Пишите на GitHub (<https://github.com/DESIGNfromWITHIN/Flexibility>) или на email: info@designfromwithin.com
