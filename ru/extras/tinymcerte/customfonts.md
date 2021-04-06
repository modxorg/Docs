---
title: "TinyMCE Rich Text Editor подключение своих шрифтов"
description: "Tiny MCE RTE подключение своих шрифтов"
translation: "extras/tinymcerte/customfonts"
---

## Как подключить свои шрифты?

1. Подключаем в Настройках **'Шестёренка'** > **Системные настройки** в поле `external.config.json` будущий файл. Если его нет - создаем. Важно правильно прописать путь к файлу! Скорее всего в большинстве случаев это будет `../assets/components/tinymcerte/external.config.json` 

2. В файле должен быть валидный JSON массив данных. В примере ниже `toolbar1` и `toolbar2` переопределяются, также задаются дополнительные размеры шрифтов.
Полный список настроек есть [здесь](https://www.tiny.cloud/docs/advanced/available-toolbar-buttons/) 

``` php

{
  "toolbar1": "undo redo | styleselect| bullist numlist outdent indent | link image",
  "toolbar2": "fontselect fontsizeselect forecolor|formatselect lineheight | bold italic | alignleft aligncenter alignright alignjustify|",
  "font_formats":"Open Sans=open sans; Roboto=roboto; Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
  "fontsize_formats": "8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt 72pt 96pt"
}

```

3. Создаем свой CSS файл стилей, не забываем подключить его к MODX. Здесь же можно задать стили по умолчанию для редактора, внутри также импортируем шрифты:

``` css

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap');

body {
  font-family: 'Open Sans', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'Roboto', sans-serif;
}

```

4. Подключаем файл стилей в настройках MODX в переменной `tinymcerte.content_css`. Поэксперементируйте, отображение шрифтов в редакторе измениться.  

5. Необязательный шаг. Шрифты обычно уже включены в стили, и вам нужно только добавить их в WYSIWYG. Но иногда требуется подключить шрифты и на странице использования.

## Смотри также

1. [Tiny Cloud Документация](https://www.tiny.cloud/docs/)
2. [TinyMCE редактор](extras/tinymce)