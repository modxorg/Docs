---
title: "Самостоятельная подписка\отписка пользователя"
translation: "extending-modx/creating-components/self-subscribe"
---

Мы плавно подходим к окончанию разработки компонента и проведения уроков. Сегодня не будет ничего нового просто делаем самостоятельную подписку и отписку пользователя.

Для этого нужно будет добавить новое поле `code` в объект `sxSubscriber` (для ссылки «отписаться от рассылки»), прописать в классе `sxNewsletter` новые методы для проверки почты и подписки\отписки и добавить обработку этих действий в сниппет **Sendex**.

В общем, ничего интересного, обычное программирование на PHP.

## Добавляем поле code

Редактируем нашу схему в файле `/core/components/sendex/model/schema/sendex.mysql.schema.xml`, добавляем поле и индекс:

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

Добавляем создание поля и индекса в ресолвере `/_build/resolvers/resolve.tables.php`.

``` php
    $manager->addField('sxSubscriber', 'code');
    $manager->addIndex('sxSubscriber', 'code');
```

И запускаем сборку пакета (`/Sendex/_build/build.transport.php`), которая перегенерирует модель и обновит таблицу БД.

Как видите, с каждым разом это всё проще и проще. [Вот коммит](https://github.com/bezumkin/Sendex/commit/e006accb6861a21f0eb46fa3d23ebdb5f89eabfb).

## Методы в sxNewsletter

Редактируем файл `/core/components/sendex/model/sendex/sxnewsletter.class.php`.

Всего мы добавляем 4 метода.

### checkEmail

Метод для проверки email пользователя.

Здесь используется очень интересный сервис MODX [modRegistry](http://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/modx-services/modregistry). Это специальная система MODX, куда вносятся временные данные, которые потом можно проверить и удалить. Например, через `modRegistry` работает сброс паролей.

``` php
// Подключем сервис
$registry = $this->xpdo->getService('registry', 'registry.modRegistry');
$instance = $registry->getRegister('user', 'registry.modDbRegister');
$instance->connect();

// Создаём свой канал
$instance->subscribe('/sendex/subscribe/');
// Сохраняем нужные данные
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

Теперь в течении времени **ttl** можно получить сохранённые данные в следующем методе.

### confirmEmail

Метод для подтверждения email пользователя. К нему приходит ссылка, по которой он должен перейти с уникальным hash — его мы сохранили в modRegistry в предыдущем методе.

``` php
// Подключем сервис
// ...
// Подписываемся на канал, указывая уникальный хэш из письма
$instance->subscribe('/sendex/subscribe/' . $hash);

// Читаем данные и удаляем после этого.
$entry = $instance->read(array('poll_limit' => 1));
// Если код верный, и мы что-то прочитали - проверяем и вызываем следующий метод
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

На странице может быть несколько сниппетов с подписками, поэтому я предусмотрел вызов нужного объекта `sxNewsletter`, иначе может быть путаница.

### Subscribe

Метод для подписки пользователя на рассылку. Тут все просто: обычные проверки входящих данных и создание объекта:

``` php
$subscriber = $this->xpdo->newObject('sxSubscriber');
$subscriber->fromArray(array(
    'newsletter_id' => $this->id,
    'user_id' => $user_id,
    'email' => $email
), '', true, true);
```

Обратите внимание, что здесь **не** указывается поле новое **code**, его мы будем задавать при сохранении объекта `sxSubscriber`.

Я расширяю метод `save()` для того, чтобы гарантировать, что у юзера всегда будет уникальный код для отписки от рассылки.

``` php
public function save($cacheFlag = null) {
    $hash = sha1(uniqid(sha1($this->user_id . $this->newsletter_id . $this->email), true));

    $this->set('code', $hash);
    return parent::save($cacheFlag);
}
```

[Коммит файла sxsubscriber.class.php](https://github.com/bezumkin/Sendex/commit/efbe679327d42168f60cd83db84d4447cc409d98)

### unSubscribe

Метод для отписки читателя от рассылки. Получает code, ищет по нему запись в БД и удаляет.

``` php
if ($subscriber = $this->xpdo->getObject('sxSubscriber', array('code' => $code))) {
    return $subscriber->remove();
}
```

Пользователю не нужно ничего подтверждать. Если у него есть уникальный код для отписки — он отписывается в одно движение.

[Вот коммит со всеми методами](https://github.com/bezumkin/Sendex/commit/4d154cda6e514354fcb22d9d2b347d6303ae464e). Теперь нужно доработать сниппет Sendex, чтобы он мог их вызывать.

## Работа с подпиской в сниппете

Сниппет, как и прежде, показывает разные формы, в зависимости от статуса пользователя. Но теперь он еще и случает в переменную **sx_action** массива `$_REQUEST`.

Если такая переменная есть, значит пользователь отправил форму, и нужно её обработать. Всего я предусмотрел 3 действия.

### subscribe

Проверяем email и вызываем метод checkEmail из объекта подписки. Если в ответ приходит `true`, значит юзер уже подписан, если `false` — ошибка, в противном случае мы получаем уникальный ключ для доступа к данным в modRegistry.

Нужно отправить его письмом юзеру, и для этого я [добавил метод Sendex::sendEmail()](https://github.com/bezumkin/Sendex/commit/fb71d844b45a924ddf00e315ffb3bce642e0517e). Для оформления письма с активацией используется новый чанк `tpl.Sendex.subscribe.activate`

### confirm

Юзер получает письмо и должен пройти по ссылке. В ней, конечно, указан другой `sx_action — confirm`. Для него сниппет вызывает `sxNewsletter::confirmEmail()` и передаёт туда хэш из ссылки в письме.

Если хэш верный, то метод получит данные и создаст нового подписчика sxSubscriber. При сохранении, как мы помним, ему будет сгенерирован уникальный код отписки.

### unsubscribe

Если пользователь уже подписан на рассылку, ему показывается форма отписки и в неё я добавил скрытый input code. Если юзер отправит эту форму с `sx_action = ubsubscribe`, то код пойдёт в метод `sxNewsletter::unSubscribe()` и юзер будет отписан.

Код генерируется случайно, алгоритм `sha1` практически исключает коллизии, так что отписан будет именно тот, кто нажал форму.

## Еще пара замечаний

Во время работы сниппета могут проиходить разные нештатные ситуации. Юзер уже подписан, meail неверный и т.д.
Так вот, если есть сообщение, то оно сохраняется в плейхолдер `[[+message]]`, а если это ошибка, то выставляется и плейхолдер `error`.

Если же всё в порядке, то после обработки `sx_action` страница перезагружается, чтобы удалить данные из `$_POST`. Иначе, при нажатии F5 брайзер будет отправлять форму повторно.

Сниппет далек от идеала, и пока представлен в няглядной форме, для обучения. По хорошему, его нужно бы научить работать через ajax и более понятно выводить ошибки.

Но для наших целей и этого достаточно.

Вот [коммит со всеми изменениями](https://github.com/bezumkin/Sendex/commit/f5f50f3376dbe4f8cfee83cd5d6fad49fd302762) сниппета, чанков и лексиконов. Ах да, вот [еще лексиконы](https://github.com/bezumkin/Sendex/commit/71f21e170a72d281b5c0f4df76988c0589df086e).

## Заключение

Итак, у нас есть сниппет, выводящий 2 формы, в зависимости от статуса юзера.

При отправке этих форм он вызывает методы в объекте рассылки и подписывает\отписывает юзеров. При подписке проверяется email, при отписке — нет.

Как только пользователь подписался, можно генерирвоать письма через админку или api и отпарвлять. На следующем занятии мы набросаем скрипты для автоматической постановки писем в очередь при разных событиях, и отправки по cron.

После этого, я думаю, вы позадаёте мне вопросы, и наши занятия закончатся, потому что первая бета-версия компонента будет готова.
