---
title: "Self subscription \ unsubscribe user"
translation: "extending-modx/creating-components"
---

The component is nearly done. This lesson adds self-service subscription and unsubscription for site users:

1. a `code` field on `sxSubscriber` (the unsubscribe link);
2. methods on `sxNewsletter`: email check, subscribe, unsubscribe;
3. handling of these actions in the **Sendex** snippet.

Plain PHP, nothing exotic.

## Add a field code

Edit the schema `/core/components/sendex/model/schema/sendex.mysql.schema.xml` — add the field and the index:

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

Add the field and the index creation to the resolver `/_build/resolvers/resolve.tables.php`:

``` php
    $manager->addField('sxSubscriber', 'code');
    $manager->addIndex('sxSubscriber', 'code');
```

Then run the build (`php ~/www/Extras/Sendex/_build/build.php` — current scaffolds have no `build.transport.php`); it regenerates the model and updates the table on install.

[Commit](https://github.com/bezumkin/Sendex/commit/e006accb6861a21f0eb46fa3d23ebdb5f89eabfb).

## Methods in sxNewsletter

Edit `/core/components/sendex/model/sendex/sxnewsletter.class.php` — four new methods.


### checkEmail

Checks the user's email before the subscription is confirmed. It uses `modRegistry` — MODX's storage for temporary data that can be read and deleted later (password reset works the same way):

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

The data stays available for `ttl` seconds; the next method reads it while the confirmation link is still valid.

### confirmEmail

The user follows the confirmation link, which carries the unique hash saved in `modRegistry`:

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

A page can carry several subscription forms, so the method resolves the `sxNewsletter` object that owns the hash — otherwise subscriptions would mix.

### Subscribe

Creates the subscriber after the usual input checks:

``` php
$subscriber = $this->xpdo->newObject('sxSubscriber');
$subscriber->fromArray(array(
    'newsletter_id' => $this->id,
    'user_id' => $user_id,
    'email' => $email
), '', true, true);
```

Note: the new `code` field is **not** set here — `save()` fills it in. Override `save()` so every subscriber always gets a unique unsubscribe code:

``` php
public function save($cacheFlag = null) {
    $hash = sha1(uniqid(sha1($this->user_id . $this->newsletter_id . $this->email), true));

    $this->set('code', $hash);
    return parent::save($cacheFlag);
}
```

[Commit of sxsubscriber.class.php](https://github.com/bezumkin/Sendex/commit/efbe679327d42168f60cd83db84d4447cc409d98)

### unSubscribe

Takes the code, finds the record and deletes it:

``` php
if ($subscriber = $this->xpdo->getObject('sxSubscriber', array('code' => $code))) {
    return $subscriber->remove();
}
```

No confirmation needed: whoever holds the unique code unsubscribes in one step.

[Commit with all methods](https://github.com/bezumkin/Sendex/commit/4d154cda6e514354fcb22d9d2b347d6303ae464e). Now the **Sendex** snippet has to call them.

## Work with a subscription in the snippet

The snippet still shows different forms depending on the user's state. New: it also reads the `sx_action` variable from `$_REQUEST`. If the variable is present, the user has submitted a form and the request must be processed. Three actions:


### subscribe

Validates the email and calls `checkEmail()` on the newsletter object. The result is one of three: `true` — already subscribed; `false` — error; anything else — a unique key to read the data from `modRegistry`.

The key is needed to send the confirmation letter — that is what [Sendex::sendEmail()](https://github.com/bezumkin/Sendex/commit/fb71d844b45a924ddf00e315ffb3bce642e0517e) does. The letter body is the chunk `tpl.Sendex.subscribe.activate`.

### confirm

The user receives the letter and follows the link, which carries `sx_action=confirm` and the hash. The snippet calls `sxNewsletter::confirmEmail()` with that hash. If the hash is correct, the method reads the data and creates an `sxSubscriber`; on save it generates the unique unsubscribe code.

### unsubscribe

A subscribed user sees the unsubscribe form with a hidden `code` input. On submit with `sx_action=unsubscribe` the code goes to `sxNewsletter::unSubscribe()` and the subscription is deleted.

The code is random and `sha1` collisions are practically impossible — only the person who opened the form gets unsubscribed.

## Error handling and limitations

Abnormal situations happen: already subscribed, invalid email, and so on. Messages go to the `[[+message]]` placeholder; errors also set the `error` placeholder.


After a successful `sx_action` the page reloads to clear `$_POST` — otherwise pressing F5 resubmits the form.

The snippet is a teaching sketch; a production version should use AJAX and show errors more clearly.

[Commit with the snippet, chunks and lexicons](https://github.com/bezumkin/Sendex/commit/f5f50f3376dbe4f8cfee83cd5d6fad49fd302762). [More lexicons](https://github.com/bezumkin/Sendex/commit/71f21e170a72d281b5c0f4df76988c0589df086e).

## Conclusion

The snippet now shows two forms depending on the user's state, and on submit calls the newsletter methods to subscribe and unsubscribe. Subscription verifies the email; unsubscription does not.

Once users can subscribe, letters can be generated through the manager or the API. The next lesson adds the queue script: fill it on events, send it by cron — and the first beta of the component is ready.
