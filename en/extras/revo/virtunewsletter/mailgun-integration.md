---
title: "Mailgun integration"
_old_id: "1754"
_old_uri: "revo/virtunewsletter/mailgun-integration"
---

Since v.2.0.0-rc1, virtuNewsletter has [mailgun](http://mailgun.com) integration.

To do such, you need to

1. download Mailgun's Official SDK for PHP from [https://github.com/mailgun/mailgun-php](https://github.com/mailgun/mailgun-php,) ,
2. [](https://github.com/mailgun/mailgun-php,)place the files on core/components/virtunewsletter/vendors/mailgun-php (remove "-master" suffix name if any),
3. run composer inside the folder,
4. update System Settings, look for : "virtunewsletter.mailgun.endpoint", fill in the domain target (or sandbox domain) URL from the mailgun's dashboard,
5. and then fill "virtunewsletter.mailgun.api\_key" with URL's API key.

virtuNewsletter does not send messages using mailgun's batchMessage feature, but send them one by one.

It is done so to parse the placeholders and output filters.

Since then, when the cron runs, it uses high memory.

To avoid out of memory, reduce "virtunewsletter.email\_limit", 30 is recommended.