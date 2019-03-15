---
title: "Среды разработки"
translation: "contribute/code/development-environment"
note: "This page is old. Really old. Needs to be rewritten to explain how to set up a git-based version of MODX properly for development."
---

## Рекомендуемые средства разработки и среды для MODX Revolution

При разработке MODX команда нашла следующее программное обеспечение и среды бесценными:

### Netbeans

- Netbeans 6.8
- Netbeans Git plugin

### Eclipse

- Eclipse 3.2.+ (рекоментдуется последняя 3.5.1)
- Web Standard Tools Project (WST) 2.0.1 (<http://download.eclipse.org/webtools/updates/>)
- eGit
- PHPEclipse 1.2.3 (<http://update.phpeclipse.net/update/nightly>)
- Spket IDE 1.6.18 (<http://spket.com/update/>)

#### Установка Eclipse

- Просто установите последнюю версию Eclipse Classic
- Запустить Eclipse / выбрать рабочее пространство
- Используйте опцию Install Software в меню справки
- Щелкните правой кнопкой мыши и скопируйте каждую из ссылок выше (выполнение их по порядку не повредит)
- Нажмите кнопку «Добавить»
- Назовите «repo» WST, Subclipse, PHPEclipse или Spket, так как они связаны с URL
- Вставьте URL
- Нажмите ОК
- Повторите для каждой из ссылок выше при необходимости
- Индивидуальные заметки:
  - WST - выберите самую последнюю платформу веб-инструментов (это займет много времени)
  Subclipse - просто установите параметр Subclipse
  - PHPEclipse - установить все, что предлагается
  - Spket - Установить все, что предлагается

### Другие инструменты

Для Mac:

- [PhpStorm](http://www.jetbrains.com/phpstorm/) - IDE
- [TextMate](http://macromates.com/) - IDE
- [Coda](http://www.panic.com/coda/) - IDE

Для PC:

- [PhpStorm](http://www.jetbrains.com/phpstorm/) - IDE
- [UltraEdit](http://www.ultraedit.com/) - IDE
- [E](http://www.e-texteditor.com/) - IDE
- [msysgit](http://code.google.com/p/msysgit/) - git in a linux-like shell

Для Linux:

- [PhpStorm](http://www.jetbrains.com/phpstorm/) - IDE
- [Kate](http://kate-editor.org/) - IDE for Linux / KDE

## Среды разработки сервера

Мы также используем MacPorts, XAMPP и MAMP и следующие инструменты / библиотеки при разработке MODX Revolution:

- **PHPUnit** - это движок фреймворка модульного тестирования PHP 5.1+ для xPDO, и мы скоро добавим более надежный набор тестов в MODX
- **PHPDocumentor** - все классы в MODX Revolution документированы в формате PHPDoc, и мы будем разрабатывать учебные пособия и другую расширенную документацию для включения в PHPDocs в формате DocBook XML
- **Phing** - будет использоваться для автоматизации ночных сборок, различных сборок дистрибутива, модульного тестирования и многих других задач разработки
