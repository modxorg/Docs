---
title: "modSwiftMailer"
_old_id: "682"
_old_uri: "revo/modswiftmailer"
---

# modSwiftMailer

On some poorly migrated copies of MODX the package might not install. This problem may also appear with default installations when the folders are not Apache/root assigned. Please refer to the troubleshooting section for more information.

## What is modSwiftMailer?

modSwiftMailer is a 3rd-party core add-on by Mark Ernst that extends the [modMail](developing-in-modx/advanced-development/modx-services/modmail "modMail") functionality and provides a much more configurable implementation of the native modMail (in combination with PHPMailer) class. modSwiftMailer is based on [Swift Mailer](http://swiftmailer.org/) which is an open-source library by Chris Corbyn. Although the usage of modSwiftMailer is almost exactly the same as modPHPMailer in core functionality, it provides a couple of differences and advantages.

### Roadmap

I've got some features planned which you can find in the readme.txt when you download modSwiftMailer. Below is the roadmap for modSwiftMailer. The additions are not necessarily in order of importance and these are not binding, which means that they might be pushed sooner or later, depending on their importance at the time.

- Inline attachments
- Extend debug functionality towards the mod log function
- Make auto-configurable (with one command)
- Make auto-launchable (with one command)
- Native date headers
- More complete readme documentation
- E-mail validation addon: MX Record check
- Rebuild a native MODX/Swift Mailer decorator to work with the modParser class

### Current version

The current version supports about 90% of Swift Mailer's regular usage functionality. Please refer to the changelog.txt to see what has been added/fixed/improved and the Roadmap above for plans in the near future.

## Requirements

- MODx Revolution 2.0.2-pl or later
- PHP5 or later
- Knowledge of [modMail](developing-in-modx/advanced-development/modx-services/modmail "modMail")

## History

modSwiftMailer was created and programmed by Mark Ernst (ReSpawN) and released on 18th of July, 2011.

### Download

modSwiftMailer is available in the [MODX Extras repository](http://modx.com/extras/package/modswiftmailer) (direct link) and in your MODX Revolution' [Package Management](developing-in-modx/advanced-development/package-management "Package Management").

## Usage

I tried to make it as easy as possible to switch from modPHPMailer to modSwiftMailer, so with that in mind the following wouldn't be that different from what you already have.

### A basic little e-mail

Firstly we're going to create a plain, little e-mail. This is a neat piece of code that you most likely will use to test a chunk of development code.

``` php
$modx->getService('mail', 'mail.modSwiftMailer');

$modx->mail->address('to', 'recipient@domain.tld', 'Recipient');
$modx->mail->address('sender', 'sender@domain.tld');
$modx->mail->subject('Dear GOD why won\'t my code function properly!');
$modx->mail->body(print_r($data, true));

$modx->mail->send();
```

Hey you! Go ahead and slap that sucker into a snippet. ;) It will, if you have set up your MODX in the right manner, send you an e-mail with a subject and printed array.

**You might have noticed** that next to modPHPMailer, you're missing a couple of lines of code. For example, we're missing modMail::MAIL\_FROM lines, the reply-to field, setHTML, error catching and the reset function.
What basically happens is, modSwiftMailer nativly sends UTF-8 encoded, 8bit encrypted text/html mails for your pleasure. This means that you can natively incorporate ANY chunk into modSwiftMailer without changing defaults or overriding behaviours (such as setHTML). More on that later.

By now you would've recieved your first modSwiftMailer e-mail and you're ready to rock. Try expanding your e-mail with the following examples.

## Examples

### Sending a simple e-mail

The following code allows you to send a e-mail to **one** recipient. If you want to use this code in a for(each) loop, you should most definitly use $modx->mail->reset() after (thus inside) each loop.

``` php
$modx->getService('mail', 'mail.modSwiftMailer');

$modx->mail->address('to', 'recipient@domain.tld', 'Recipient');
$modx->mail->address('sender', 'sender@domain.tld');
$modx->mail->subject('A simple e-mail');
$modx->mail->body('<h1>Simple e-mail</h1><p>With a basic message</p>');

$modx->mail->send();
```

### Getting more complex; multiple recipients

By design, modSwiftMailer allows you to send your mail to, literally, an array of recipients. This is achieved in a couple of ways.

First off, start with starting the modSwiftMailer service. Really? Yes, really.

``` php
$modx->getService('mail', 'mail.modSwiftMailer');
```

Now, modSwiftMailer allows to insert basically any format you wish, but each has a different output.

``` php
$modx->mail->address('to', 'recipient@domain.tld', 'Recipient');
```

Will add **one** e-mail, "recipient@domain.tld" with the **name** "Recipient".

I like a little real work scenario with my e-mails, so lets mail the partial cast of How I Met Your Mother.

``` php
$modx->mail->address('to', array(
        'barneystinson@howimetyourmother.tld' => 'Barney Stison',
        'tedmosby@howimetyourmother.tld' => 'Ted Mosby'
));
```

Will add **two** e-mails, "barneystinson@howimetyourmother.tld" with the **name** "Barney Stison" and "tedmosby@howimetyourmother.tld" with the **name** "Ted Mosby".

Aside from that little example, there is another way to send an e-mail to the same person with multiple e-mail addresses. Granted, you will not be using this unless you're e-mailing an entire Korean family called "Li", but that's a whole different matter.

``` php
$modx->mail->address('to', array(
        'barneystinson@howimetyourmother.tld',
        'tedmosby@howimetyourmother.tld'
), 'How I Met Your Mother cast');
```

Will add **two** e-mails, "barneystinson@howimetyourmother.tld" and "tedmosby@howimetyourmother.tld" both with the **name** "How I Met Your Mother cast".

Finally, imagine your form was plugged into a [FormIt](/extras/formit "FormIt") postHook which has an optional fullname (or name or username) field, which isn't always set or contains data. Your e-mails would look pretty crappy, won't they? Nay!

``` php
$modx->mail->address('to', array(
        'barneystinson@howimetyourmother.tld',
        'tedmosby@howimetyourmother.tld' => 'Ted Mosby'
));
```

Granted, I reckon the first, second and fourth examples will be used the most, but I like a little challenge.

Again, in a poorly scripted [FormIt postHook](/extras/formit/formit.hooks "FormIt.Hooks") you also want to e-mail the same e-mail to a BCC (\*B\*lind \*C\*arbon \*C\*opy) recipient. Easy pease, exactly the same functionality as to;

``` php
$modx->mail->address('bcc', 'phantom@theopera.tld', 'Phantom');
```

Now comes the part which sets your e-mail apart from those pesky, instant-coffee-like e-mails out there, the 'couple-liners' that define the origination of the e-mail.

``` php
$modx->mail->address('sender', 'sender@domain.tld');
$modx->mail->address('from', 'from@domain.tld', 'Graphical sender');
```

The "sender" always appears in your e-mail's headers. Usually this is the webserver' pre-coded no-reply e-mail address but that isn't always the case. Want to prevent your e-mail from being marked as spam, just use that! (if your e-mail however is as "spammy" as they come, that won't help) The "from" is basically what will be picked up by your e-mail program. It will show the name next to the subject ("Graphical sender") and when you view the details (or the headers), it will appear as Graphical sender <from@domain.tld>.

Lastly, you **can** define a bounce address and reply-to address. If you don't provide a reply-to address, it will nativly pick up the senders or from e-mail address (depends on the program).

``` php
$modx->mail->bounce('bounce@domain.tld');
$modx->mail->receipt('receipt@domain.tld');
$modx->mail->replyto('no-reply@domain.tld');
```

Oh yea, I snug a little receipt in there. It isn't supported by webbrowsers but I _guess_ Outlook and Thunderbird pick it up as a read-confirmation.

Finally, of course, we want to send that e-mail to all defined recipients (to, cc and bcc). Oh yea, we're gonna add some content and a subject too - of course.

``` php
$modx->mail->subject('A subject');
$modx->mail->body('Some content');

$modx->mail->send();
```

## Troubleshooting

### My e-mails are not being sent

**I am using native mail()**
Your current SMTP provider doesn't accept your commands or query or the e-mail address you're trying to mail is invalid. When working on a local machine, Windows 32/64bit, Linux or Mac, all need a valid, up and working SMTP from your current host. Most of the time, this can be found out by "tracert"-ing your current IP (Windows tested). Simply tracert your external IP and a part of your host should at least appear (dynamic.host.tld). Enter that value into your php.ini (WAMP, LAMP) and you're ready to go.

**I am using sendmail (Linux)**
This is a tricky feature at best, since every Linux based machine is set up differently. Please check your MAIL\_ENGINE\_PATH (which is used with sendmail) and validate of that works. You might even try that with modPHPMailer. If modPHPMailer works (thus pwns modSwiftMailer), please give me a heads-up.

**I am using an internal SMTP (ISP)**
ISP stands for Interner Service Provider and is your "SMTP provider" in **I am using native mail()**. Please refer to that troubleshooting section for more information.

**I am using an external SMTP**
Please check if you have your authentication set up right. SMTP most of the time requirs the right hostname, port and authentication. Usually a authentication is in the format of a username an password (user: smtp@domain.tld, pass: **doh**?).

### It wont sent my e-mails because of something called a Return-Path

Try setting one of three (preferably all three): sender, bounce (Return-Path) and from addresses.

### My package won't install

This might be a small glitch on my part. Try setting the model/modx/mail directory to CHMOD 0777 and try it again.

Bug reporting isn't up yet. Please submit your bugs via the MODX forum! :)

<http://modxcms.com/forums/index.php/topic,66815.0.html>