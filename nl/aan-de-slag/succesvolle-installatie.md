---
title: "Succesvolle installatie, wat nu?"
sortorder: "4"
translation: "getting-started/getting-started"
description: "Na een geslaagde installatie kom je op de Manager-login"
---

Na een geslaagde installatie zie je de Manager-login. Log in met de gegevens die je tijdens setup hebt opgegeven.

## Basisbeveiliging

Pak meteen de beveiligingswaarschuwingen aan. Die gaan meestal over een nog aanwezige `setup/`-map, of over een publiek bereikbare `core/`-map. Verwijder `setup/` en hernoem op Apache `core/ht.access` naar `core/.htaccess`. Meer over hardenen: [Securing MODX (EN)](/current/en/getting-started/maintenance/securing-modx).

## De standaard Resource bewerken

MODX maakt standaard een starter-Resource (tab Resources) en een starter-Template (tab Elements > Templates). Bekijk de site via **Content > Preview Site**, of klik rechts op de Resource en kies **View**.

Om te bewerken: open de Resource, pas de content in het Content-veld aan, en eventueel paginatitel, description, summary, publicatiestatus en alias ([vriendelijke URL](aan-de-slag/vriendelijke-urls)).

Sla op met **Save** rechtsboven, of **Ctrl + S**. Bekijk daarna de wijzigingen met **View**.

## De standaard Template bewerken

Er is een starter-Template genaamd `BaseTemplate` onder Elements > Templates. Open die om naam, description en content aan te passen, bijvoorbeeld:

```html
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <base href="[[!++site_url]]" />
        <title>[[*pagetitle]]</title>
        <!-- CSS, scripts en andere assets -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        />
    </head>
    <body>
        <main>
            [[*content]]
        </main>
    </body>
</html>
```

De strings tussen vierkante haken zijn MODX-tags. `[[*content]]` plaatst de content van de Resource; `[[*pagetitle]]` de paginatitel. Meer over tagsyntax: [Tag syntax (EN)](/current/en/building-sites/tag-syntax).

Sla op en bekijk de site opnieuw.

## Een nieuwe Resource maken

Op de tab Resources: klik op het **+**-icoon naast Website, of rechtsklik op Website en kies **Create > Document** of **Quick Create > Document**. Bewerk daarna zoals hierboven.

## Een nieuwe Template maken

Op de tab Elements: klik op het **+**-icoon naast Templates, of rechtsklik en kies **New Template** of **Quick Create Template**.

## Gebruikerservaring en beveiliging

MODX heeft krachtig gebruikers- en groepsbeheer, en je kunt de loginmethode aanpassen. Besteed aandacht aan:

- [Users (EN)](/current/en/building-sites/client-proofing/security/users)
- [Form customization (EN)](/current/en/building-sites/client-proofing/form-customization)
- [Manager themes (EN)](/current/en/building-sites/client-proofing/custom-manager-themes)
- [Passwordless login (EN)](/current/en/building-sites/client-proofing/security/passwordless-login)

## Volgende stappen

- [Vriendelijke URLs inschakelen](aan-de-slag/vriendelijke-urls)
- [Wat is MODX?](aan-de-slag/wat-is-modx) voor de basisconcepten
