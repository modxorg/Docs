---
title: "Login.Using Custom Fields"
description: "Пользовательские extended-поля в сниппетах Login"
translation: "extras/login/login.tutorials/using-custom-fields"
---

## Что такое пользовательские поля?

Login сохраняет пользовательские («Extended») поля через extended-поле профиля пользователя Revolution. MODX хранит данные в JSON-объекте, который можно получить в любой момент.

Login делает это через свойство `&useExtended` в сниппетах [Register](extras/login/login.register "Login.Register"), [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") и [Profile](extras/login/login.profile "Login.Profile"). По умолчанию включено.

## Использование

Добавьте поле в формы [Register](extras/login/login.register "Login.Register") и [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile"). Сниппеты проверят POST-поля, которых нет в таблице User, и сохранят их как extended. При [Profile](extras/login/login.profile "Login.Profile") поля развернутся в плейсхолдеры. Пример фрагмента формы Register:

``` php
[[!Register? &submitVar=`go`]]
...
<label>Favorite Color:
<span class="error">[[+error.color]]</span>
<input type="text" name="color:required" value="[[+color]]" />
</label>
...
<input type="submit" name="go" value="Register!" />
```

Поле `color` сохранится в extended. На custom-поля работают валидаторы, например `:required` в этом примере.

Login не сохранит поле из `&submitVar`. Здесь `go` не попадёт в extended, потому что передано в `&submitVar`.

Вывод через [Profile](extras/login/login.profile "Login.Profile"):

``` php
[[!Profile]]

<p>[[+username]]'s Favorite Color: [[+color]]</p>
```

То же в форме [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile"):

``` php
[[!UpdateProfile]]
...
<label>Favorite Color:
<span class="error">[[+error.color]]</span>
<input type="text" name="color:required" value="[[+color]]" />
</label>
```

### Прямое создание и заполнение контейнеров атрибутов

``` php
  <input type="hidden" name="january[Spaces]" value="" />
  <input type="hidden" name="january[Tables]" value="" />
  <input type="hidden" name="january[Chairs]" value="" />
  <input type="hidden" name="january[NeedsElectric]" value="" />
  <input type="hidden" name="january[Misc]" value="" />
```

![](login.extendedusercontainers.png)

### Исключение полей из сохранения в extended

У [Register](extras/login/login.register "Login.Register") и [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") есть свойство `excludeExtended` со списком имён полей через запятую. Пример для полей `nospam` и `customProp`:

``` php
[[!Register? &excludeExtended=`nospam,customProp`]]
```

### В менеджере

Extended-поля можно редактировать в менеджере: пользователь, вкладка «Extended Fields». Если добавляете поля там, включите их в формы UpdateProfile и/или Register.

Если extended-поле в контейнере, например `test -> boo`:

![](login.extended.nest.png)

Доступ через точечную нотацию:

``` php
[[!Profile]]

Value of nested attribute: [[+test.below]]
```

... выведет `boo!`.

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
10. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/using-pre-and-post-hooks)
