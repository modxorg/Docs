---
title: "Installatie"
sortorder: "3"
translation: "getting-started/installation"
note: "Deze documentatie is nog niet compleet vertaald."
---

Deze pagina gaat over nieuwe installaties. [Wil je MODX upgraden naar een nieuwe versie?](aan-de-slag/onderhoud/upgraden)

[Controleer hier de server vereisten voor MODX voor je begint](aan-de-slag/server-vereisten).

## Download MODX

Globaal zijn er 2 keuzes om MODX te downloaden: van de MODX website, of via Git(Hub).

### MODX Website

Voor de meeste gebruikers is het aan te raden om een [distributie te downloaden van MODX.com](https://modx.com/download/). Op de MODX website vind je de downloads voor verschillende versies van MODX. 

De downloads worden in verschillende varianten aangeboden. Dit zijn allemaal dezelfde versie van MODX, waarbij in de installatie enkele verschillen zitten:

- **Traditional** is de standaard download.
- **Advanced** maakt het mogelijk om tijdens de installatie de mappen te hernoemen. Dit is een geavanceerdere functie waarmee je MODX als het ware kunt verbergen, wat de veiligheid ten goede kan komen. Het hernoemen van de mappen kan je ook na de installatie doen voor een Traditional installatie ([zie "Securing MODX" (EN)](/current/en/getting-started/maintenance/securing-modx)).
- **SDK** is een variant specifiek voor ontwikkelaars van uitbreiding; deze bevat namelijk een leesbare versie van de ExtJS code die de manager gebruikt, waardoor het debuggen makkelijker kan worden. 

### Git(Hub)

Daarnaast is het mogelijk om MODX direct [vanuit de officiele broncode](https://github.com/modxcms/revolution) te installeren. Gemiddeld 6-10x per jaar komt er een update voor MODX via de website uit, maar via GitHub heb je altijd de allerlaatste versie. 

De installatie via Git omvat wel een paar extra stappen. Lees daarvoor verder in [Git Installation (EN)](/current/en/getting-started/installation/git-installation "Git Installation").

## Bestanden uploaden

Nadat je MODX hebt gedownload, moet je alle bestanden uploaden naar je webserver. Je kan het zip bestand uploaden, en op de server (bijvoorbeeld via een control panel of via SSH) het bestand unzippen, of je kunt op je computer het bestand unzippen en de losse bestanden uploaden. Als je de toegang hebt is het aan te raden om het unzippen op de server te doen, omdat je daarmee het risico op corrupte uploads minimaliseert, en het is vaak nog een stuk sneller ook.

Het is aan te raden om MODX direct in de webroot te plaatsen (de `public_html` of `www` map) zodat je MODX na de installatie op `example.com` kunt benaderen. Als dat niet kan, bijvoorbeeld omdat daar een bestaande website draait of omdat de domein nog niet is geregistreerd, is het ook mogelijk om MODX in een submap of subdomein te installeren. Als je klaar bent om de site te verplaatsen naar de hoofdmap kan je de [Moving your site documentatie (EN)](/current/en/getting-started/maintenance/moving-your-site) nalezen voor de stappen die je moet nemen. 

## Installeren

Bestanden geupload? Dan is het tijd om de setup uit te voeren. Dat kan via de browser, of via de [command line (EN)](/current/en/getting-started/installation/cli). 

Navigeer naar `http://example.com/setup/` om de setup te beginnen. 

Direct worden er enkele verificaties uitgevoerd om, onder andere, zeker te weten dat sessies en de tijdzone juist zijn geconfigureerd op de server. Als die checks mislukken krijg je daar een melding van te zien, en moet de server configuratie aangepast worden voor je verder kunt met de installatie. Neem hiervoor contact op met je server administrator of hosting partij. 


[Lees hier verder in het Engels](/current/en/getting-started/installation/standard).
