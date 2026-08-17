---
title: "Login.Using Pre and Post Hooks"
description: "Pre- и post-хуки в сниппетах Login"
translation: "extras/login/login.tutorials/using-pre-and-post-hooks"
---

## Подключение хуков в Login

У [Register](extras/login/login.register "Login.Register"), [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile") и [Login](extras/login/login "Login.Login") есть свойства `preHooks` и `postHooks`. Они запускают свой код до и после основного действия сниппета.

## Пользовательские хуки

Хук, это сниппет, который выполняется после валидации формы. Хуки можно цепочкой. Первый выполняется, при успехе идёт следующий. Сниппет возвращает true при успехе и false или текст ошибки при провале. При false следующие хуки из списка не выполняются. Если сниппет не найден, следующие хуки в списке всё равно выполнятся.

Пользовательский сниппет-хук должен возвращать **true**. `false` означает ошибку, процесс останавливается (Login или Register).

- Pre-Hooks в Login срабатывают до действия, но после валидации полей. При ошибке preHook сниппет не выполнит основное действие.
- Post-Hooks срабатывают после действия. Пользователь уже сохранён. getUser() не обязательно вернёт активный объект пользователя.

## Написание хуков

Создайте сниппет и укажите его имя в `&preHooks` или `&postHooks` в Register и/или UpdateProfile.

### Доступ к полям в хуке

Поля формы доступны через Hooks API в `fields`. Пример:

``` php
$email = $hook->getValue('email');
```

Все значения формы:

``` php
$formFields = $hook->getValues();
$email = $formFields['email'];
```

Post-Hooks добавляют специальные поля помимо полей формы:

#### Register

``` php
// A reference to the modUser object
$user = $hook->getValue('register.user');
// A reference to the modUserProfile object
$profile = $hook->getValue('register.profile');
// An array of usergroup names that the User joined
$usergroups = $hook->getValue('register.usergroups');
```

#### UpdateProfile

``` php
// A reference to the modUser object
$user = $hook->getValue('updateprofile.user');
// A reference to the modUserProfile object
$profile = $hook->getValue('updateprofile.profile');
// A boolean stating if the username was changed
$changed = $hook->getValue('updateprofile.usernameChanged');
```

### Доступ к свойствам сниппета

Свойства Register и Login:

``` php
$properties = $hook->login->controller->config;
```

### Возвращаемые значения preHook

Сниппет возвращает true при успехе. При ошибке задайте сообщения в `$hook->errors` и верните false. Следующие хуки из `&preHooks` не выполнятся.

Объект `$hook` доступен в сниппете как `$scriptProperties['hook']`. Через него можно вернуть общую ошибку:

``` php
$errorMsg = 'User not found';
$hook->addError('user',$errorMsg);
return false;
```

## Примеры

### PostHook Register с письмом

Отправлять письмо на communitymanager@jerrys.com при каждой регистрации.

Сниппет `hookComEmail`:

``` php
$message = 'Hi, a new User signed up: '.$hook->getValue('username')
 . ' with email '.$hook->getValue('email').'.';
$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,'admin@jerrys.org');
$modx->mail->set(modMail::MAIL_FROM_NAME,'Jerrys Site');
$modx->mail->set(modMail::MAIL_SENDER,'Jerrys Site');
$modx->mail->set(modMail::MAIL_SUBJECT,'New User Signed Up');
$modx->mail->address('to','communitymanager@jerrys.com');
$modx->mail->setHTML(true);
if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$err);
}
$modx->mail->reset();
/* tell our snippet we're good and can continue */
return true;
```

Вызов Register:

``` php
[[!Register? &postHooks=`hookComEmail`]]
```

### PreHook Register с вложением в письмо активации

Чтобы прикрепить документ к письму активации, используйте `prehook`. Сниппет `attachFile`:

``` php
// it can be a list/array of files and even passed to the hook from the outside. This example will be limited to a single hard-fixed file

$attachment = 'relative_file_path.pdf';
$hook->modx->getService('mail', 'mail.modPHPMailer');
$hook->modx->mail->mailer->AddAttachment(MODX_BASE_PATH.$attachment);
return true;
```

В Register:

``` php
[[!Register? &preHooks=`attachFile`]]
```

### PostHook обновления аватара профиля

Сначала расширьте HTML-форму [UpdateProfile](https://docs.modx.com/current/en/extras/login/login.updateprofile#the-updateprofile-form):

```html
<div>
  <img src="[[+photo:default=`/assets/photouser/default.jpg`]]">
</div>
<label for="photo">Photo
    <span class="error">[[+error.photo]]</span>
</label>
<input type="file" id="photo" name="photo" value="[[+photo]]">

```

Создайте хук `hookUpdateProfilePhoto`. Папки должны существовать с нужными правами.
Код сниппета:

```php

<?php
// get user details
$profile = $modx->user->getOne('Profile');
//if post
if(isset($_POST['login-updprof-btn'])) {
    //set extensions
    $validExt=array('jpg','png','jpeg');
    //set path for file
    $pathToFile = $modx->config['base_path'].'site_content/content/users/';
    // set path for cmp because of media resource
    $pathToFileProfile = 'users/';
    // get file name
    $nameFile = $_FILES['photo']['name'];
    // lowercase and exxtention
    $extFile = mb_strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));
    // the tmp file
    $tmpFile = $_FILES['photo']['tmp_name'];
    // upload is ok then
    if((is_uploaded_file($tmpFile)) &&! ($_FILES['photo']['error'])){
        // check extention types
        if (in_array($extFile,$validExt)) {
            // make a file name
            $tmpzname='user'.$modx->user->get('id');
            // add a hash and extension
            $nameFile=hash('adler32',$tmpzname).'.'.$extFile;
            //full name with path
            $fullNameFile = $pathToFile.$nameFile;
            // copy the tmp to new one move_uploaded_file1 and rename1 did not work this will overwrite the old pic as they all have same name
            copy($tmpFile, $fullNameFile);
            // name and path for profile as its different because of media resource
            $fullNameFileProfile = $pathToFileProfile.$nameFile;
            // delete old pic in profile
            $hook->setValue('photo','');
            //set new pic path
            $hook->setValue('photo',$fullNameFileProfile);
        }
        else{
            $modx->log(modX::LOG_LEVEL_ERROR,'The image has an invalid extension');
        }
    }
      else {
        $modx->log(modX::LOG_LEVEL_ERROR,'Error loading file. Error code:'.$_FILES['photo']['error']);
    }
} 
return true;

```

Добавьте хук в `preHooks` UpdateProfile:

```php
[[!UpdateProfile? &preHooks=`hookUpdateProfilePhoto`]]
```

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
