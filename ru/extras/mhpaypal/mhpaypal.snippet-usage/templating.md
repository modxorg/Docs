---
title: "Шаблоны"
description: "Чанки formTpl, errorTpl и successTpl для mhPayPal"
translation: "extras/mhpaypal/mhpaypal.snippet-usage/templating"
---

## Шаблоны

_Этот документ описывает шаблонизацию сниппета mhPayPal. Обзор пакета: [mhPayPal](extras/mhpaypal "mhPayPal")._

Шаблонизация mhPayPal выполняется через tpl-чанки.

## formTpl, formTplAnonymous

По умолчанию:

``` php
<form action="[[+action]]" method="[[+config.method]]" id="mhpp_form_[[+config.id]]">
    <p>Your donation will be safely processed by PayPal, allowing you to donate via a PayPal account or directly with a credit card.</p>
    [[+errors:notempty=`
        <p>Uh oh.. The following error(s) were found in your form: <br />[[+errors]]</p>
    `]]
    <div>
        <label for="mhpp_amount_[[+config.id]]">Amount</label>
        <div>
            <select name="currency" id="mhpp_currency_[[+config.id]]">
                <option value="EUR"[[+currency_EUR:notempty=` selected="selected"`]]>EUR &euro;</option>
                <option value="USD"[[+currency_USD:notempty=` selected="selected"`]]>USD &#36;</option>
                <option value="GBP"[[+currency_GBP:notempty=` selected="selected"`]]>GBP &#163;</option>
            </select>


            <input type="text" name="amount" id="mhpp_amount_[[+config.id]]" />
            [[+currency.error]] [[+amount.error]]
        </div>
    </div>

    <div>
        <div>
            <input type="submit" name="[[+config.submitVar]]" value="Donate!" />
        </div>
    </div>
</form>
```

Доступные плейсхолдеры

| Плейсхолдер `[[+name here]]` | Описание                                                                                                                                         |
| ---------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------ |
| config.\_\_\_                | Значение свойства сниппета, указанного через \_\_. Все свойства см. в [mhPayPal].                                                               |
| action                       | URL текущей страницы для POST на себя.                                                                                                           |
| amount                       | Введённая сумма (если есть).                                                                                                                     |
| currency                     | Выбранная валюта (если есть).                                                                                                                    |
| currency\_CURRENCYKEY        | Для выбранной валюты плейсхолдер равен 1, например currency\_USD. Удобно для select, как в шаблоне по умолчанию.                                 |
| \_\_\_\_\_.error             | Где \_\_\_\_\_ это имя поля, содержит ошибку для этого поля.                                                                                     |
| errors                       | Сбор ошибок в формате fieldname: error, разделённых свойством &errorSeparator.                                                                   |

### Примеры

Bring it on..

## errorTpl

По умолчанию:

``` php
<span>[[+error]]</span>
```

Плейсхолдеры:

| Плейсхолдер `[[+name here]]` | Описание        |
| ---------------------------- | --------------- |
| error                        | Текст ошибки.   |

## successTpl

По умолчанию:

``` php
<div>
    <h3>Thanks! You're awesome!</h3>
    <p>PayPal says your [[+description]] ([[+currency]] [[+amount]]) transaction is [[+PAYMENTSTATUS]]! You're really cool for helping out on this project further. Do not hesitate to get in touch should you need help!</p>
</div>
```

| Плейсхолдер `[[+name here]]` | Описание             |
| ---------------------------- | -------------------- |
| Any data fields' name        | Значение поля данных. |
