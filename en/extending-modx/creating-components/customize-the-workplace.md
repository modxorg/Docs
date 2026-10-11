---
title: "Customize the workplace: MODXCloud + PhpStorm"
translation: "extending-modx/creating-components/customize-the-workplace"
---

For development you need a web server and an IDE. Any hosting with SFTP access works — shared, VPS or cloud. For a uniform setup across all course participants, the examples use a [free MODXCloud account](https://modxcloud.com/signup/lab-account.html) and the [30-day PhpStorm trial](http://www.jetbrains.com/phpstorm/download/).

## Register and configure MODXCloud

Register, create a cloud: **Clouds → Add new cloud**, plan **Development**, **Complete Cloud Creation**.

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-1.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-2.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-3.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-4.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-5.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-6.png)

Wait about 5 minutes for the cloud to start. A notification appears at the top of the screen, and the cloud shows up in the list. Open it: at the very bottom is the **SFTP access** block — it holds the credentials.

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-7.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-8.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-9.png)

That is the whole hosting setup. Site credentials arrive in a notification:

![](/ru/extending-modx/creating-components/customize-the-workplace/customize-10.png)

## Setting PhpStorm

[Download](http://www.jetbrains.com/phpstorm/download/) and install PhpStorm; the trial lasts 30 days without functional limits — enough to finish the course and decide on a purchase. The IDE will prompt you if it needs Java.

Create a new project named **Sendex**.

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-1.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-2.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-3.png)

Theme, fonts and panel layout are a matter of taste — keep the defaults unless you have a preference.

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-4.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-5.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-6.png)

Now connect the server — this is the central step of the whole course setup. In the menu: **Tools → Deployment → Configuration**, add a new server and enter the MODXCloud data:

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-7.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-8.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-9.png)

Tick the checkbox in the upper left corner of the window to make this server the default for the project. Then press **Apply** and **Test SFTP connection**:

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-10.png)

A success message means the connection works. From now on the project works with the server files: open the **Remote host** tab on the right — the site sits in the `www` directory; create a `Sendex` directory there.

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-11.png)

Now map the local project to the remote **Sendex** directory — same **Deployment** settings, **Mapping** tab:

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-12.png)

Create a **test.php** file in the project to verify the setup:

``` php
<?php
// Load MODX
define('MODX_API_MODE', true);
require '../index.php';

// Enable error handling
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

echo '<pre>';
print_r($modx->config);
```

Synchronize the project with the server via the context menu, then open the file in the browser: [c2263.paas2.ams.modxcloud.com/Sendex/test.php](c2263.paas2.ams.modxcloud.com/Sendex/test.php)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-13.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-14.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-15.png)

It is convenient to turn on automatic synchronization so files upload on **Ctrl+S**:

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-16.png)

The file already works with the MODX kernel — and it lives in the project, not on the server.

One snag: the editor flags _undefined variable 'modx'_:

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-17.png)

PhpStorm does not know MODX out of the box. Download the latest MODX Revolution from the official site, unpack it anywhere and attach it to the project via the context menu **External Libraries** in the project files window. The IDE indexes the files and starts resolving variables and their methods:

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-18.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-19.png)

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-20.png)

After saving, all errors disappear except the missing `index.php` — it is on the server, not in the project; ignore it. Method completion works, and **Ctrl+B** navigates to a method definition.

![](/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-21.png)

## Conclusion

The workplace is ready: hosting, project, IDE and file synchronization.

Next lesson: clone [ModExtra3 from the repository](https://github.com/modx-pro/ModExtra3) and explore its structure.
