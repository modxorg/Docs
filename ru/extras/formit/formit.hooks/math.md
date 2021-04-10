---
title: "math"
description: "Хук math для Formit"
translation: "extras/formit/formit.hooks/math"
---

## Хук math для Formit

Хук *math* позволит вам иметь математический вопрос в вашей форме, чтобы предотвратить спам. Он отобразит математическое выражение, которое необходимо сосчитать, чтобы ответить правильно, а именно: 

> 12 + 23?

## Поддерживаемые параметры

| Имя               | Описание                                                              | По умолчанию  |
| ----------------- | --------------------------------------------------------------------- | -------- |
| mathMinRange      | Минимальное значение для каждого числа в уравнении.                   | 10       |
| mathMaxRange      | Максимальное значение для каждого числа в уравнении.                  | 100      |
| mathField         | Имя поля ввода для ответа.                                            | math     |
| mathOp1Field      | Имя поля/плейсхолдера для 1-го числа в уравнении.                     | op1      |
| mathOp2Field      | Имя поля/плейсхолдера для 1-го числа в уравнении.                     | op2      |
| mathOperatorField | Имя поля/плейсхолдера для оператора в уравнении.                      | operator |

## Использование

Включите его как хук в вызове FormIt:

``` php
[[!FormIt? &hooks=`math`]]
```

Чтобы сделать вычисление математического выражения обязательным, используйте вызов следующим образом: 

``` php
[[!FormIt? &hooks=`math` &validate=`math:required`]]
```

Вставьте этот образец HTML-кода в ту часть формы, в которую вы хотите включить математический вопрос: 

``` html
<label>[[!+fi.op1]] [[!+fi.operator]] [[!+fi.op2]]?</label>
[[!+fi.error.math]]
<input type="text" name="math" value="[[!+fi.math]]" />
<input type="hidden" name="op1" value="[[!+fi.op1]]" />
<input type="hidden" name="op2" value="[[!+fi.op2]]" />
<input type="hidden" name="operator" value="[[!+fi.operator]]" />
```

Математический вопрос в месте поля ввода с именем "math".

ПРИМЕЧАНИЕ. Поля формы "op1", "op2" и "operator" больше не используются, начиная с версии FormIt 2.2.11 и выше. 

### Настройка описания операции 

Если вы не хотите использовать только "-" или "+" в качестве оператора и хотите еще больше скрыть его от спам-ботов, вы можете использовать выходные фильтры, чтобы еще больше добавить неоднозначности в математическое уравнение. Измените строку с текстом уравнения на: 

``` php
<label>[[!+fi.op1]] [[!+fi.operator:is=`-`:then=`минус`:else=`плюс`]] [[!+fi.op2]]?</label>
```

В результате уравнение будет выглядеть как "23 плюс 41?" или "50 минус 12?" вместо символа -/+, что усложняет работу спам-ботов. 

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
