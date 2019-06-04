---
title: "Self subscription \ unsubscribe user"
translation: "extending-modx/creating-components/self-subscribe"
---

We smoothly come to the end of the development of the component and conduct lessons. Today there will be nothing new, just make an independent subscription and unsubscribe from the user.

To do this, you will need to add a new `code` field to the `sxSubscriber` object (for the “unsubscribe” link), add new methods for checking mail and subscribe \ unsubscribe in the `sxNewsletter` class and add processing of these actions to the snippet **Sendex**

In general, nothing interesting, the usual programming in PHP.

## Add a field code

Edit our scheme in the file `/core/components/sendex/model/schema/sendex.mysql.schema.xml`, add the field and the index:

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

Add the creation of the field and the index in the resolver `/_build/resolvers/resolve.tables.php`.

``` php
    $manager->addField('sxSubscriber', 'code');
    $manager->addIndex('sxSubscriber', 'code');
```

And run the build package (`/Sendex/_build/build.transport.php`), which will regenerate the model and update the database table.

As you can see, each time it is all easier and simpler. [Here is a commit](https://github.com/bezumkin/Sendex/commit/e006accb6861a21f0eb46fa3d23ebdb5f89eabfb).

## Methods in sxNewsletter

Editing the file `/core/components/sendex/model/sendex/sxnewsletter.class.php`.

In total, we add 4 methods.

### checkEmail

Method to check the user's email.

It uses a very interesting service MODX. [modRegistry](http://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/modx-services/modregistry). This is a special MODX system, where temporary data is entered, which can then be checked and deleted. For example, passwords can be reset via `modRegistry`.

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

Now over time **ttl** you can get the saved data in the following method.

### confirmEmail

Method to confirm user email. A link comes to it, according to which it should go with a unique hash - we saved it in modRegistry in the previous method.

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

There may be several subscriptions with snippets on the page, so I provided for a call to the desired object `sxNewsletter`, otherwise there may be confusion.

### Subscribe

A method for subscribing to a newsletter. Everything is simple: the usual checks of incoming data and the creation of an object:

``` php
$subscriber = $this->xpdo->newObject('sxSubscriber');
$subscriber->fromArray(array(
    'newsletter_id' => $this->id,
    'user_id' => $user_id,
    'email' => $email
), '', true, true);
```

Please note that here **not** indicates the new **code** field, we will set it when saving the `sxSubscriber` object.

I extend the `save()` method in order to ensure that the user will always have a unique code for unsubscribing from the list.

``` php
public function save($cacheFlag = null) {
    $hash = sha1(uniqid(sha1($this->user_id . $this->newsletter_id . $this->email), true));

    $this->set('code', $hash);
    return parent::save($cacheFlag);
}
```

[Коммит файла sxsubscriber.class.php](https://github.com/bezumkin/Sendex/commit/efbe679327d42168f60cd83db84d4447cc409d98)

### unSubscribe

Method for unsubscribing the reader from the list. Gets code, searches for a record in the database and deletes it.

``` php
if ($subscriber = $this->xpdo->getObject('sxSubscriber', array('code' => $code))) {
    return $subscriber->remove();
}
```

The user does not need to confirm anything. If he has a unique code for unsubscribe - he unsubscribes in one motion.

[Here is a commit with all methods](https://github.com/bezumkin/Sendex/commit/4d154cda6e514354fcb22d9d2b347d6303ae464e). Now you need to modify the Sendex snippet so that it can call them.

## Work with a subscription in the snippet

Snippet, as before, shows different forms, depending on the status of the user. But now it also happens in the **sx_action** variable of the `$_REQUEST` array.

If there is such a variable, then the user has submitted the form, and you need to process it. In total, I provided for 3 actions.

### subscribe

We check email and call the checkEmail method from the subscription object. If the answer is `true`, then the user is already signed, if `false` is an error, otherwise we get a unique key to access the data in modRegistry.

It is necessary to send him a letter to the user, and for this I [added method Sendex::sendEmail()](https://github.com/bezumkin/Sendex/commit/fb71d844b45a924ddf00e315ffb3bce642e0517e). For registration of the letter with activation, a new chunk is used. `tpl.Sendex.subscribe.activate`

### confirm

The user receives the letter and must follow the link. It certainly contains another `sx_action - confirm`. For it, the snippet calls `sxNewsletter::confirmEmail()` and passes the hash from the link in the letter there.

If the hash is correct, the method will receive the data and create a new sxSubscriber subscriber. When you save, as we remember, it will generate a unique unsubscribe code.

### unsubscribe

If the user is already subscribed to the newsletter, the unsubscribe form is shown to him and I added a hidden input code to it. If the user sends this form with `sx_action = ubsubscribe`, then the code will go to the `sxNewsletter::unSubscribe()` method and the user will be unsubscribed.

The code is generated randomly, the `sha1` algorithm virtually eliminates collisions, so the exact person who clicked the form will be unsubscribed.

## Another couple of comments

During the snippet, various abnormal situations may occur. User is already signed, meail is incorrect, etc.
So, if there is a message, then it is saved to the `[[+message]]]` playholder, and if this is an error, then the `error` playholder is set.

If everything is fine, after processing the `sx_action` page reloads to remove the data from `$ _POST`. Otherwise, pressing F5 will re-send the form.

Snippet is far from ideal, and so far presented in a subtle form, for training. For good, it should be taught to work through ajax and more clearly display errors.

But for our purposes this is enough.
Here is [commit with all changes](https://github.com/bezumkin/Sendex/commit/f5f50f3376dbe4f8cfee83cd5d6fad49fd302762) snippet, chunks and lexicons. Oh yeah, that [more lexicons](https://github.com/bezumkin/Sendex/commit/71f21e170a72d281b5c0f4df76988c0589df086e).

## Conclusion

So, we have a snippet that displays 2 forms, depending on the status of the user.

When sending these forms, it calls methods in the distribution object and signs / unsubscribes users. When subscribing, email is checked, when unsubscribing - no.

As soon as the user has subscribed, you can generate letters through the admin or api and send them. In the next lesson, we will script scripts to automatically queue letters at various events, and send them by cron.

After that, I think you will ask me questions, and our classes will end, because the first beta version of the component will be ready.
