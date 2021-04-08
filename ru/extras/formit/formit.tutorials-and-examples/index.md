---
title: "Руководства и примеры"
translation: "extras/formit/formit.tutorials-and-examples"
description: "Руководства и примеры"
---

Эта страница представляет собой список руководств и примеров для FormIt, а также общие советы по использованию.

## Руководства

### Создание формы

-   [Обработка выпадающих списков, чекбоксов и радио кнопок](extras/formit/formit.tutorials-and-examples/handling-selects,-checkboxes-and-radios "Обработка выпадающих списков, чекбоксов и радио кнопок")
-   [Использование пустого поля для защиты от спама](extras/formit/formit.tutorials-and-examples/using-a-blank-nospam-field "Использование пустого поля для защиты от спама")

### Обработка email

-   [Указание адреса получателя в форме](extras/formit/formit.hooks/email#FormIt.Hooks.email-SpecifyingaDynamicToAddress)
-   [Использование поля темы в качестве строки темы электронного письма](extras/formit/formit.hooks/email#FormIt.Hooks.email-UsingaSubjectFieldastheEmailSubjectLine)

### Перенаправление

-   [Перенаправление на другую страницу после успешной отправки](extras/formit/formit.hooks/redirect "Перенаправление на другую страницу после успешной отправки")
-   [Перенаправление с GET параметрами](extras/formit/formit.hooks/redirect#FormIt.Hooks.redirect-RedirectingwithParameters)

## Примеры

-   [Пример простой формы](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page "Пример простой формы")

## Решение проблем

Иногда ваша форма просто зависает: вы отправляете ее, но ничего не происходит. В чем дело?

Распространенная ошибка здесь связана с проверкой. Попробуйте удалить фрагмент из `&validation`, чтобы проверить, исправляет ли это форму. Если это так, значит, вы знаете, что именно в этом и заключается ваша проблема. Распространенная ошибка возникает, когда правила проверки ссылаются на неправильные имена полей. Например, если вы изменили имена полей по сравнению с тем, что они были в примере, вы также должны изменить имена валидируемых полей, используемые в правилах проверки.

Например, если ваша форма имеет следующее:

```html
...
<input type="text" name="firstname" id="firstname" value="[[!+fi.firstname]]" />
...
```

Тогда следующее правило проверки не будет работать (полный пример вызова Сниппета смотрите [здесь](extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)):

```php
...
&validate=`name:required`
...
```

Почему? Посмотрите, имя поля называется `firstname`, тогда как правило проверки ищет поле с именем `name`. Проверяйте их очень внимательно при создании и тестировании формы.

Другая причина, которая может вызвать _молчаливый_ сбой FormIt - это отсутствие атрибута `name` в полях формы. Обязательно добавьте атрибут name во все поля, иначе FormIt завершится неудачно, не вернув никаких ошибок.

## Смотрите также

1. [Хуки](extras/formit/formit.hooks)
2. [Валидаторы](extras/formit/formit.validators)
3. [FormItRetriever](extras/formit/formit.formitretriever)
4. [Руководства и примеры](extras/formit/formit.tutorials-and-examples)
5. [FormItCountryOptions](extras/formit/formit.formitcountryoptions)
6. [FormItStateOptions](extras/formit/formit.formitstateoptions)
