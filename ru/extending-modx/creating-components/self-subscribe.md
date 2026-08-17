---
title: "Самостоятельная подписка \ отписка пользователя"
translation: "extending-modx/creating-components/self-subscribe"
---

Мы плавно подходим к концу разработки компонента и проведения уроков. Сегодня нового почти не будет: просто делаем самостоятельную подписку и отписку пользователя.

Для этого нужно добавить новое поле `code` в объект `sxSubscriber` (для ссылки «отписаться»), добавить в класс `sxNewsletter` новые методы проверки почты и подписки \ отписки и добавить обработку этих действий в сниппет **Sendex**

В общем, ничего интересного: обычное программирование на PHP.

## Добавляем поле code

Редактируем схему в файле `/core/components/sendex/model/schema/sendex.mysql.schema.xml`, добавляем поле и индекс:

``` xml
<object class="sxSubscriber" table="sendex_subscribers" extends="xPDOSimpleObject">
    ....
    <field key="code" dbtype="char" precision="40" phptype="string" null="true" default="" />

    ....
    <index alias="code" name="code" primary="false" unique="true" type="BTREE">
        <column key="code" length="" collation="A" null="false" />
    </index>
</object>
```

Добавляем создание поля и индекса в resolver `/_build/resolvers/resolve.tables.php`.

``` php
    $manager->addField('sxSubscriber', 'code');
    $manager->addIndex('sxSubscriber', 'code');
```

И запускаем сборку пакета (`/Sendex/_build/build.transport.php`), которая перегенерирует модель и обновит таблицу БД.

Как видите, с каждым разом всё проще и проще. [Вот коммит](https://github.com/bezumkin/Sendex/commit/e006accb6861a21f0eb46fa3d23ebdb5f89eabfb).

## Методы в sxNewsletter

Редактируем файл `/core/components/sendex/model/sendex/sxnewsletter.class.php`.

Всего добавляем 4 метода.

### checkEmail

Метод проверки email пользователя.

Здесь используется очень интересный сервис MODX [modRegistry](http://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/modx-services/modregistry). Это специальная система MODX, куда кладут временные данные, которые потом можно проверить и удалить. Например, через `modRegistry` работает сброс паролей.

``` php
// Connect service
$registry = $this->xpdo->getService('registry', 'registry.modRegistry');
$instance = $registry->getRegister('user', 'registry.modDbRegister');
$instance->connect();

// Create your channel
$instance->subscribe('/sendex/subscribe/');
// We save the necessary data
$instance->send('/sendex/subscribe/',
    array(
        $hash => array(
            'user_id' => $user_id,
            'newsletter_id' => $this->id,
            'email' => $email,
        )
    ),
    array(
        'ttl' => $linkTTL
    )
);
```

Теперь в течение времени **ttl** сохранённые данные можно получить в следующем методе.

### confirmEmail

Метод подтверждения email пользователя. Ему приходит ссылка, по которой он должен перейти с уникальным hash. Мы сохранили его в modRegistry в предыдущем методе.

``` php
// Connect service
// ...
// Subscribe to the channel, indicating a unique hash from the letter
$instance->subscribe('/sendex/subscribe/' . $hash);

// We read the data and delete after that.
$entry = $instance->read(array('poll_limit' => 1));
// If the code is correct and we have read something, we check and call the following method.
if (!empty($entry[0])) {
    $entry = reset($entry);
    if ($this->id != $entry['newsletter_id']) {
        /** @var sxNewsletter $newsletter */
        if ($newsletter = $this->xpdo->getObject('sxNewsletter', array('id' => $entry['newsletter_id'], 'active' => 1))) {
            $newsletter->Subscribe($entry['user_id'], $entry['email']);
        }
        else {
            return false;
        }
    }
    else {
        return $this->Subscribe($entry['user_id'], $entry['email']);
    }
}
```

На странице может быть несколько сниппетов с подписками, поэтому я предусмотрел вызов нужного объекта `sxNewsletter`. Иначе возможна путаница.

### Subscribe

Метод подписки на рассылку. Всё просто: обычные проверки входящих данных и создание объекта:

``` php
$subscriber = $this->xpdo->newObject('sxSubscriber');
$subscriber->fromArray(array(
    'newsletter_id' => $this->id,
    'user_id' => $user_id,
    'email' => $email
), '', true, true);
```

Обратите внимание: здесь **не** указывается новое поле **code**. Мы зададим его при сохранении объекта `sxSubscriber`.

Я расширяю метод `save()`, чтобы у пользователя всегда был уникальный код для отписки от списка.

``` php
public function save($cacheFlag = null) {
    $hash = sha1(uniqid(sha1($this->user_id . $this->newsletter_id . $this->email), true));

    $this->set('code', $hash);
    return parent::save($cacheFlag);
}
```

[Коммит файла sxsubscriber.class.php](https://github.com/bezumkin/Sendex/commit/efbe679327d42168f60cd83db84d4447cc409d98)

### unSubscribe

Метод отписки читателя от списка. Получает code, ищет запись в БД и удаляет её.

``` php
if ($subscriber = $this->xpdo->getObject('sxSubscriber', array('code' => $code))) {
    return $subscriber->remove();
}
```

Пользователю ничего подтверждать не нужно. Если у него есть уникальный код отписки, он отписывается одним действием.

[Вот коммит со всеми методами](https://github.com/bezumkin/Sendex/commit/4d154cda6e514354fcb22d9d2b347d6303ae464e). Теперь нужно доработать сниппет Sendex, чтобы он мог их вызывать.

## Работа с подпиской в сниппете

Сниппет по-прежнему показывает разные формы в зависимости от статуса пользователя. Но теперь он ещё слушает переменную **sx_action** массива `$_REQUEST`.

Если такая переменная есть, пользователь отправил форму, и её нужно обработать. Всего я предусмотрел 3 действия.

### subscribe

Проверяем email и вызываем метод checkEmail у объекта подписки. Если ответ `true`, пользователь уже подписан. Если `false`, это ошибка. Иначе получаем уникальный ключ для доступа к данным в modRegistry.

Нужно отправить пользователю письмо, и для этого я [добавил метод Sendex::sendEmail()](https://github.com/bezumkin/Sendex/commit/fb71d844b45a924ddf00e315ffb3bce642e0517e). Для оформления письма с активацией используется новый чанк `tpl.Sendex.subscribe.activate`

### confirm

Пользователь получает письмо и должен перейти по ссылке. В ней, конечно, указан другой `sx_action - confirm`. Для него сниппет вызывает `sxNewsletter::confirmEmail()` и передаёт туда hash из ссылки в письме.

Если hash верный, метод получит данные и создаст нового подписчика sxSubscriber. При сохранении, как мы помним, ему сгенерируется уникальный код отписки.

### unsubscribe

Если пользователь уже подписан на рассылку, ему показывают форму отписки. В неё я добавил скрытый input code. Если пользователь отправит эту форму с `sx_action = ubsubscribe`, код уйдёт в метод `sxNewsletter::unSubscribe()`, и пользователь будет отписан.

Код генерируется случайно. Алгоритм `sha1` практически исключает коллизии, поэтому отпишется именно тот, кто нажал форму.

## Ещё пара замечаний

Во время работы сниппета возможны разные нештатные ситуации. Пользователь уже подписан, email неверный и т.д.
Если есть сообщение, оно сохраняется в плейсхолдер `[[+message]]]`, а если это ошибка, выставляется ещё плейсхолдер `error`.

Если всё в порядке, после обработки `sx_action` страница перезагружается, чтобы убрать данные из `$ _POST`. Иначе при нажатии F5 форма отправится снова.

Сниппет далёк от идеала и пока показан в наглядной форме для обучения. По-хорошему его стоит научить работать через ajax и яснее показывать ошибки.

Но для наших целей этого достаточно.
Вот [коммит со всеми изменениями](https://github.com/bezumkin/Sendex/commit/f5f50f3376dbe4f8cfee83cd5d6fad49fd302762) сниппета, чанков и лексиконов. Ах да, вот [ещё лексиконы](https://github.com/bezumkin/Sendex/commit/71f21e170a72d281b5c0f4df76988c0589df086e).

## Заключение

Итак, у нас есть сниппет, который показывает 2 формы в зависимости от статуса пользователя.

При отправке этих форм он вызывает методы объекта рассылки и подписывает / отписывает пользователей. При подписке проверяется email, при отписке нет.

Как только пользователь подписался, письма можно генерировать через админку или api и отправлять. В следующем уроке мы набросаем скрипты для автоматической постановки писем в очередь при разных событиях и отправки по cron.

После этого, думаю, вы зададите мне вопросы, и занятия закончатся, потому что первая бета-версия компонента будет готова.
