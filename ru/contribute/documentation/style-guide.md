---
title: "Руководство по стилю контента"
translation: "contribute/documentation/style-guide"
note: "Последовательный текст полезен пользователям, но точность важнее. Не бойтесь насмешек или отказа из-за опечатки или небольшого отступления от этого руководства."
---

Это руководство содержит базовые правила, советы и рекомендации для авторов и редакторов документации MODX, в первую очередь о стиле письма. Когда разные документы следуют одним правилам, их проще читать, объединять и переиспользовать. По возможности следуйте этим рекомендациям.

## Используйте американский английский

Во всём MODX для письменных материалов принят US English.

### Общие правила

### -our и -or

Британские слова на -our (например, flavour) в US English теряют u: flavour → flavor, colour → color. То же часто верно для -our в середине слова: behaviour → behavior.

### Двойные согласные

При переводе глагола в форму -ing в US English обычно одна согласная, не две: travelling → traveling, levelling → leveling и т.д.

### Распространённые отличия UK и US

Более полный список см. на [Wikipedia](http://en.wikipedia.org/wiki/American_and_British_English_spelling_differences)

| **UK English**         | **US English**       |
| ---------------------- | -------------------- |
| Analyse                | Analyze              |
| Behaviour              | Behavior             |
| Cancelling / Cancelled | Canceling / Canceled |
| Centre                 | Center               |
| Cheque                 | Check                |
| Colour                 | Color                |
| Customisation          | Customization        |
| Customise              | Customize            |
| Favourite              | Favorite             |
| Labour                 | Labor                |
| Licence                | License              |
| Travelling             | Traveling            |

## Правила написания

Эти правила делают документы яснее, точнее и проще для чтения.

### Пишите проще

Используйте короткие предложения и пунктуацию. Одна идея, понятие или действие на предложение.

#### Неправильно

The manufacturing module allows users to define the process plans, work requirements and work efforts; this is how the processes that produce intermediate and final goods work.

#### Правильно

The manufacturing module allows users to define the process plans, work requirements and work efforts. This section describes how processes that produce intermediate and final goods function.

### Времена

Используйте настоящее время. По возможности избегайте прошедшего и будущего.

Старайтесь не использовать _must_, _have to_, _need to_, _will_, _should_ и похожие формы.

Помните: руководство описывает обязательные шаги для выполнения задачи.

#### Неправильно

You will have to press return to reboot the system.

#### Правильно

Press return to reboot the system.

### Агрессивные формулировки

Избегайте агрессивных глаголов.

#### Неправильно

Hit return to reboot the system.

#### Правильно

Press return to reboot the system.

### Активный залог

Пишите в активном залоге, где это возможно.

#### Неправильно

The alarm was fired by the system.

#### Правильно

The system fired the alarm.

Активный залог упрощает чтение и понимание. Он яснее показывает, кто что делает. В пользовательской документации это важно.

В сообщениях об ошибках допустим пассивный залог, чтобы не обвинять пользователя.

### Третье лицо

Где возможно, используйте императив от третьего лица. Например:

#### Run the installation script

лучше, чем:

#### You should run the installation script

Если это не звучит агрессивно, можно обращаться к читателю напрямую через «you», когда так проще следовать инструкции.

Не называйте читателя «the user», например: «Users should log into the system using their passwords», если вы не различаете пользователя и, скажем, администратора.

Исключение: сообщения об ошибках. Прямое обращение может звучать обвинительно. Например:

'Error: incorrect password'

лучше, чем:

'Error: you have entered an invalid password'

### Пунктуация

#### Восклицательные знаки

Практически нет случаев, когда восклицательный знак уместен в документации или сообщениях об ошибках.

#### Сокращения

Не ставьте апостроф во множественном числе сокращений:

#### Неправильно: Use the Purchase Order window to create PO's

**Правильно**: Use the Purchase Order window to create POs

### Без личных мнений

Руководство или другой технический документ не место для мнений о конкурентах, продуктах или описанных функциях.

#### Неправильно

Select the _Report_ option to generate a full report of the customer data. Most of the time is better to export the data and generate a report from third-party applications due to the lack of configuration settings.

#### Правильно

Select the _Report_ option to generate a full report of the customer data. It is also possible to export data and generate a report from third-party applications.

Не пишите, что задача «лёгкая» или «простая». Если читатель ошибётся после такой формулировки, ему может быть неловко, даже если ошибка не его вина. Избегайте фраз вроде:

"It is easy to configure the application using the Wizard".

### Капитализация

Не злоупотребляйте заглавными буквами. Не капитализируйте слова только потому, что они «важные»: это выглядит неаккуратно и усложняет единообразие. Заглавные нужны для имён собственных, пунктов меню и проприетарных названий.

### Без гендерной дискриминации

Читатели документации и мужчины, и женщины. В английском нет нейтрального местоимения для человека. Избегайте формулировок с явным родом. Особенно следите за _she_, _he_, _him_, _her_.

#### Неправильно

Every user has his home directory.

#### Правильно

Every user has a home directory.

Технически неверно, но многие авторы используют «they» / «their» как нейтральное местоимение вместо «s/he» или «his or hers». Это не идеально, но иногда упрощает чтение. Лучше перефразировать предложение, как в примере выше.

User stories и учебные сценарии хорошее место для разнообразия.

В английском пол есть только у людей. Большинство других существительных нейтральны.

### Описывайте только текущую функциональность

Не пишите о будущих функциях или планах продукта.

#### Неправильно

Graphics can be saved as a GIF image. Support for new formats will be added in future versions.

#### Правильно

Graphics can be saved as a GIF image.

### Терминология

#### Checkbox

Checkbox это одно слово (не check box). Checkbox либо selected, либо cleared.

Например:

"Select the **Active** checkbox to make the field visible" "Clear the **Active** checkbox to make the field invisible".

#### Login vs Log in

Глагол: **Log in** и **Log into**. "**Log in** using the password provided" "**Log into** MODX ERP"

Существительное или прилагательное: Login. "You will need valid **Login** credentials to use the system"

Не logon, log, log-in и т.д.

## Испанский и английский: ложные друзья и другие ловушки

Если ваш родной язык испанский, обратите внимание на типичные ошибки.

### Dudas / doubts

«Doubt» в английском часто звучит негативно. Лучше questions или queries.

Неправильно: If you have any doubts about MODX, consult the wiki.
Лучше: If you have any questions about MODX, consult the wiki.

### His / hers

В английском пол есть только у людей. Вещи нейтральны и берут притяжательное местоимение «its» (без апострофа).

## Жирный и курсив

Мы используем ограниченный набор форматирования (в том числе из Mediawiki):

- **Bold**. Экономно для акцента, путей к файлам или имён опций, например:

From the **File** menu, select **New**.

- _Italic._ Для цитат, текста на другом языке или примеров, например текста для ввода в поле.

## Пути к файлам и меню

Пути к файлам используют формат `Directory/subdirectory/file.extension`.

- Для навигации по меню выделяйте весь путь жирным и разделяйте пункты символом `>`.

Начинайте с первого элемента, который ищет пользователь. Например:

From the **File** menu, select **Document > New > Template**.

а не

Select **Document > New > Template** from the **File** menu.

## Именование изображений и скриншотов

При загрузке изображений имя должно соответствовать заголовку страницы. Если изображений несколько, добавьте номер. На странице Payment Method, например: _paymentmethod01_, _paymentmethod02_ и т.д.

## Платформа

MODX работает на разных платформах. Если поведение зависит от платформы, укажите платформу перед примером или исключением. Тогда читатель может пропустить нерелевантные разделы.

Формулируйте текст так, чтобы редакторы, знакомые с платформой, могли добавить корректные примеры. Платформенные отличия чувствительная тема. Держите язык нейтральным и фактическим. Например:

### Неправильно

To start MODX POS double click start.bat

### Правильно

#### Linux

To start MODX POS run the shell script start.sh either by clicking it or by typing ./start.sh from a shell.

#### Windows

To start MODX POS run the batch file start.bat either by double clicking it or by typing start.bat from the command line.

## Другие соглашения

При описании опций идите слева направо и сверху вниз.

- Списки (например, файлов для загрузки) упорядочивайте по алфавиту, если нет более логичного порядка.
- Описывайте похожие процессы одинаково. Не смешивайте навигацию мышью и горячие клавиши в одной процедуре без необходимости. Выберите стиль взаимодействия (меню, клавиши и т.д.) и придерживайтесь его.
- Не используйте сокращения (don't, you're и т.д.)

## Письмо для глобальной аудитории

Open source по определению глобален. Помните, что документацию читают по всему миру.

Рекомендации:

- Избегайте имён, адресов и примеров, не типичных для английского языка.

- Валюты и форматы дат и чисел различаются по регионам.

## Форматирование страницы и разметка

Набор элементов форматирования ограничен, чтобы редакторам было проще, а читателям привычнее. Ниже доступные форматы HTML и специальные форматы документации MODX.

### Разрешённая HTML-разметка

| Format Type    | Usage                                                                                                                                        | Example |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| Normal Text    | This is the text format used for all paragraph text and inside tables.                                                                       |         |
| Bold           | (TBD)                                                                                                                                        |         |
| Italics        | (TBD)                                                                                                                                        |         |
| Bulleted Lists | (TBD)                                                                                                                                        |         |
| Numbered Lists | (TBD)                                                                                                                                        |         |
| Indents        | Reserve indentation for use in creating nested or child lists. Paragraphs should not be                                                      |         |
| Images         | (TBD)                                                                                                                                        |         |
| Media          | (TBD)                                                                                                                                        |         |
| Table          | (TBD)                                                                                                                                        |         |
| Links          | (TBD)                                                                                                                                        |         |
| Text-Alignment | Reserve text-alignment for table cells. It should not be used to center, right or jusitfy text. Paragraph and headings must be left-aligned. |         |

### Специальные форматы

| Format Type | Usage                                                                                                                                                                            | Example |
| ----------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| PHP Code    | This is a special macro-format for wrapping code examples including PHP, HTML, CSS and Javascript. This will enable syntax highlighting and enhance the readibility of the page. |         |
| Note        | (TBD)                                                                                                                                                                            |         |
| Warning     | (TBD)                                                                                                                                                                            |         |
| Danger      | (TBD)                                                                                                                                                                            |         |
| Info        | (TBD)                                                                                                                                                                            |         |

Не используйте другие HTML-элементы (div, span, blockquote, address и т.д.). Это усложняет поддержку и может ломать вёрстку. Не используйте classes и IDs в разметке. Специальные классы создаются макросами Special Format, перечисленными выше.

## Финальный чеклист

Перед тем как считать документ или правку готовой, пройдите короткий чеклист:

- Понятно? Текст логично переходит от абзаца к абзацу?
- Лаконично? Стиль общения ясен?
- Связно? Текст не прыгает между темами?
- Грамматически верно? Вы проверили орфографию? Попросили носителя языка вычитать текст?
