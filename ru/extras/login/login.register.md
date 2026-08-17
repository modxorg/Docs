---
title: "Register"
description: "Документация сниппета Register для обработки форм регистрации"
translation: "extras/login/login.register"
---

## Что такое Register?

Register обрабатывает форму регистрации. Это [Snippet](developing-in-modx/basic-development/snippets "Snippets"). Пример вызова: [here](extras/login/login.register/example-form-1 "Register.Example Form 1").

## Использование

Разместите сниппет Register на ресурсе с формой регистрации. Пакет [Login](extras/login "Login") поставляет форму по умолчанию `lgnRegisterForm`. Сниппет требует активации: пользователь получит письмо о регистрации.

### Свойства по умолчанию

| Name                              | Description                                                                                                                                                                                                                                | Default             |
| --------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------- |
| activation                        | Требовать ли активацию для завершения регистрации. Если true, пользователи не станут активными, пока не активируют аккаунт. По умолчанию true. Работает только если форма передаёт поле email.           | 1                   |
| activationEmailSubject            | Тема письма активации.                          |    `register.activation_email_subject` lexicon value                 |
| activationEmailTpl                | Шаблон письма активации. Текст включает ссылку для активации, username и (сгенерированный) password.                                                                                    | lgnActivateEmailTpl |
| activationEmailTplType            | Тип шаблона для письма активации.                                                                                                                                                                                  | modChunk            |
| activationResourceId              | ID ресурса со сниппетом ConfirmRegister для активации.                                                                                                                                                               | 1                   |
| activationttl                     | Минут до истечения письма активации. По умолчанию 3 часа.                                                                                                                                                                 | 180                 |
| autoLogin                         | Автоматически входить после успешной регистрации. Требует activation = 0.                                                                                                                                    | 0                   |
| customValidators                  | Список имён пользовательских валидаторов (сниппетов) через запятую. Их нужно указать явно, иначе они не запустятся.                                                                                    |                     |
| emailField                        | Имя поля email нового пользователя.                                                                                                                                                                             | email               |
| ensurePasswordStrength            | Если Yes, Register проверит, что пароль достаточно сильный. Сильные пароли содержат несколько слов или неалфавитные символы.                                                                     | 0                   |
| ensurePasswordStrengthSuggestions | Если ensurePasswordStrength=Yes и пароль не прошёл проверку, Register предложит столько вариантов улучшения пароля.                                                                    | 5                   |
| errTpl                         | | `<span class="error">[[+error]]</span>`                   |
| excludeExtended                   | Список полей, которые не сохранять как extended, через запятую.                                                                                                                                                               |                     |
| generatePassword                  | Если Yes, Register сгенерирует случайный пароль и перезапишет переданный. Полезно для автогенерации.                                                                                       | 0                   |
| jsonResponse                      |   | 0                   |
| maximumPossibleStrongerPasswords  | Если ensurePasswordStrength=Yes, это максимум подсказок, которые Register может найти, чтобы считать пароль «сильным». Большее число мягче проверка. Меньшее строже. | 25                  |
| minimumStrongPasswordWordCount    | Если ensurePasswordStrength=Yes, пароль с таким числом слов считается сильным.                                                                                                           | 3                   |
| moderatedResourceId               | Если prehook помечает пользователя как moderated, перенаправить на этот ресурс вместо submittedResourceId. Если пусто, шаг пропускается.                                                                                                             |                     |
| passwordField                     | Имя поля password нового пользователя.                                                                                                                                                                                  | password            |
| passwordWordSeparator             | Если ensurePasswordStrength=Yes, разделитель слов при подсчёте слов в пароле.                                                                                              |                     |
| persistParams                     | Необязательно. JSON-объект параметров, которые сохраняются на протяжении регистрации. Полезно при redirect в ConfirmRegister (например для корзины).                                                          |                     |
| preHooks                          | Список «хуков» или сниппетов через запятую. Выполняются до регистрации, но после валидации. Можно указать `recaptcha` как хук.                                                                          |                     |
| preserveFieldsAfterRegister
| postHooks                         | Список «хуков» или сниппетов через запятую. Выполняются после регистрации пользователя.                                                                                                                                        |                     |
| redirectUnsetDefaultParams        | Если true, параметры по умолчанию убираются из URL перенаправления.                                                                                                                                                                          | 0                   |
| submitVar                         | Переменная, по которой Register определяет отправку. Если пусто или false, форма обрабатывается при любом POST.                                                                                                    | login-register-btn  |
| successMsg                        | Необязательно. Если нет redirect через submittedResourceId, показывает это сообщение.                                                                                                                                   |                     |
| submittedResourceId               | Если задано, перенаправляет на указанный ресурс после отправки формы регистрации.                                                                                                                                              |                     |
| trimPassword                      | Если Yes, Register обрежет пробелы в начале и конце пароля при обработке.                                                                                                                                  | 1                   |
| useExtended                       | Сохранять ли дополнительные поля формы в extended-поле Profile. Полезно для пользовательских полей.                                                                                                       | 1                   |
| usergroups                        | Необязательно. Список имён или ID групп пользователей для нового пользователя через запятую.                                                                                                                                           |                     |
| usergroupsField                   | Необязательно. Имя поля формы для групп пользователя, например checkbox или radio.                                                                                                                                   |                     |
| usernameField                     | Имя поля username нового пользователя.                                                                                                                                                                                  | username            |
| validate                          | Список полей для валидации через запятую в формате name:validator (например username:required,email:required). Валидаторы можно цепочкой: email:email:required. Свойство можно задать в несколько строк.  |                     |
| validatePassword                  | Валидировать ли переданный пароль при регистрации. Оставьте Yes, если не генерируете пароль в хуке.                                                                                        | 1                   |
| validationErrorMessage            | Общее сообщение при ошибке валидации. Используйте свойство и плейсхолдер `validation_error_message`                                                                         | `register.validation_error_message` lexicon value                   |

### Validators

Валидаторы в Login используют тот же синтаксис, что и [FormIt Validators](extras/formit/formit.validators "FormIt.Validators").

### Custom Validators

Можно создать пользовательский валидатор как сниппет. Его имя **обязательно** укажите в customValidators, иначе он не запустится. Пример: сниппет `equalTo` и поле:

``` php
<label>
  Boxes:<span class="error">[[+error.boxes]]</span>
  <input type="text" name="boxes" id="boxes" value="[[+boxes]]" />
</label>
```

Вызов Register:

``` php
[[!Register?
  &validate=`boxes:equalTo=^123^`
  &customValidators=`equalTo`
]]
```

Код сниппета:

``` php
<?php
if ($scriptProperties['value'] !== $scriptProperties['param']) {
    return 'Value not equal to: '.$scriptProperties['param'];
}
return true;
?>
```

`true` означает, что поле прошло проверку. Любое другое значение станет текстом ошибки. Сниппет получает параметры в массиве `$scriptProperties`:

- **key**: имя поля.
- **value**: значение поля.
- **param**: параметр валидатора, если передан.
- **Type**: имя валидатора.
- **validator**: ссылка на экземпляр lgnValidator.

## После валидации

После успешной валидации Register может:

- добавить пользователя в группы
- отправить письмо активации
- перенаправить на ресурс (например «Registered!»)
- показать сообщение об успехе

### Назначение пользователя в группы

Укажите список имён или ID групп в свойстве `&usergroups`. Пример для групп «Marketing» и «Research»:

``` php
[[!Register? &usergroups=`Marketing,Research`]]
```

Можно указать роль после имени группы через двоеточие:

``` php
[[!Register? &usergroups=`Marketing:Member,Research:Super User`]]
```

### Отправка письма активации

Register по умолчанию требует активации аккаунта перед входом. Сниппет создаёт modUser с `active=0`. Пользователь получает письмо со ссылкой. После перехода аккаунт получает `active=1`, и пользователь может войти.

Создайте страницу активации: новый ресурс и сниппет [ConfirmRegister](extras/login/login.confirmregister "Login.ConfirmRegister").

Задайте чанк для письма. Пример: `lgnActivateEmailTpl`.

Пример вызова Register с активацией:

``` php
[[!Register?
   &activationEmailTpl=`myActivationEmailTpl`
   &activationEmailSubject=`Please activate your account!`
   &activationResourceId=`26`
   &submittedResourceId=`325`
]]
```

Пользователь получит письмо из чанка `myActivationEmailTpl` с указанной темой. Ссылка ведёт на ресурс 26 для активации. После отправки письма пользователь попадёт на ресурс 325.

Отключите активацию через `&activation=``. Тогда любой, включая спам-ботов, сможет зарегистрироваться и сразу стать активным.

`&activationEmailTpl` по умолчанию это имя чанка. Тип меняется через `&activationEmailTplType`:

- **modChunk**: имя чанка (по умолчанию).
- **file**: файл с абсолютным путём. Плейсхолдеры: {core\_path}, {base\_path}, {assets\_path}.
- **inline**: HTML прямо в значении свойства.

Время жизни письма активации задаётся в `activationttl` (минуты). По умолчанию 3 часа.

### Перенаправление после валидации

Укажите ID ресурса в `submittedResourceId`:

``` php
[[!Register? &submittedResourceId=`23`]]
```

Перенаправление идёт на ресурс 23. К URL добавятся GET-параметры `username` и `email`.

### Сообщение об успехе

Если `submittedResourceId` не задан, Register выводит сообщение в плейсхолдер `[[+error.message]]`. Значение берётся из `successMsg`:

``` php
[[!Register? &successMsg=`Thanks for registering!`]]
```

После отправки валидной формы на странице с `[[Register]]` появится «Thanks for registering!» в `[[+error.message]]`.

## Типичная настройка

При регистрации легко запутаться в страницах. В типичной схеме четыре отдельные страницы:

**Register**: страница с формой регистрации. Перенаправляет на «Thanks for Registering». Содержит форму и вызов Register.

**Thanks for Registering**: страница после отправки формы. Только текст без сниппетов: «Thank you for Registering - you'll get an email» и т. п.

**Confirm Register**: страница по ссылке из письма. Пользователь её не видит напрямую. Активирует аккаунт и перенаправляет на Registration Confirmed. Только вызов ConfirmRegister.

**Registration Confirmed**: страница после Confirm Register. Только текст: «Congratulations, you're now an active user».

## См. также

1. [Login.Login](extras/login/login)
2. [Login.Profile](extras/login/login.profile)
3. [Login.UpdateProfile](extras/login/login.updateprofile)
4. [Login.Register](extras/login/login.register)
   1. [Register.Example Form 1](extras/login/login.register/example-form-1)
5. [Login.ConfirmRegister](extras/login/login.confirmregister)
6. [Login.ForgotPassword](extras/login/login.forgotpassword)
7. [Login.ResetPassword](extras/login/login.resetpassword)
8. [Login.ChangePassword](extras/login/login.changepassword)
9. [Login.Tutorials](extras/login/login.tutorials)
   1. [Login.Basic Setup](extras/login/login.tutorials/basic-setup)
   2. [Login.Extended User Profiles](extras/login/login.tutorials/extended-user-profiles)
   3. [Login.Request Membership](extras/login/login.tutorials/request-membership)
   4. [Login.User Profiles](extras/login/login.tutorials/user-profiles)
   5. [Login.Using Custom Fields](extras/login/login.tutorials/using-custom-fields)
   6. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/using-pre-and-post-hooks)
