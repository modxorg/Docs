---
title: "mail_smtp_autotls"
description: "Allow the user to disable the use of TLS, even if the server communication seems to allow this. It changes the value of the PHPMailer 6 SMTPAutoTLS, which currently defaults to true."
---

-   **Name**: SMTP Auto TLS  
-   **Type**: Yes/No  
-   **Default**: Yes  
-	**Available In**: 2.8.2+

Whether to enable TLS encryption automatically if a server supports it, even if [`mail_smtp_secure`](building-sites/settings/mail_smtp_secure) is not set to `tls`.
