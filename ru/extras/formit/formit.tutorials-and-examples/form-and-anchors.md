---
title: "Форма и якоря"
translation: "extras/formit/formit.tutorials-and-examples/form-and-anchors"
description: "Formit форма и использование якорей"
---

Посмотрите для начала валидацию ошибок формы здесь: [(http://forums.modx.com/thread/47715/jump-to-top-of-form-on-page-on-error-validation)](http://forums.modx.com/thread/47715/jump-to-top-of-form-on-page-on-error-validation)

## Пример

``` html
<form action="[[~[[*id]]]]#message" method="post" class="form">
<div id="message">
... Содержимое вашего сообщения здесь ...
</div>
... Ваши поля ввода здесь ...
</form>
```

## Как сделать

1. Добавьте имя якоря в атрибут `action`
2. Добавьте идентификатор к элементу html, к которому нужно перейти.

## Смотрите также

1. [Пользовательский произвольный хук](extras/formit/formit.tutorials-and-examples/examples.custom-hook)
2. [Пример простой формы](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page)
3. [Обработка выпадающих списков, чекбоксов и радио кнопок](extras/formit/formit.tutorials-and-examples/handling-selects,-checkboxes-and-radios "Обработка выпадающих списков, чекбоксов и радио кнопок")
4. [Валидаторы](extras/formit/formit.validators "Валидаторы")
