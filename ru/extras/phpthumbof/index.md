---
title: "phpThumbOf"
description: "Безопасный пользовательский Output Filter для phpThumb на любом URL изображения в placeholder"
translation: "extras/phpthumbof/index"
---

## Что такое phpThumbOf?

phpThumbOf это безопасный пользовательский [Output Filter](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") для MODX Revolution. С его помощью вы применяете phpThumb к любому URL изображения, указанному в placeholder.

### Требования

- MODX Revolution 2.0.4 или новее
- PHP5 или новее

### История

phpThumbOf написал [Shaun McCormick](https://github.com/splittingred) как безопасный output filter для phpThumb. Первый релиз вышел 3 ноября 2010 года.

### Загрузка

Пакет устанавливают через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачивают из репозитория MODX Extras: <https://modx.com/extras/package/phpthumbof>

### Атрибуты

- w = ширина (в пикселях)
- h = высота (в пикселях)
- zc = Zoom Cropping. Укажите 1, чтобы включить zoom cropping.

## Примеры использования

Преобразуйте изображение до 120×120 px.

``` php
[[*image:phpthumbof=`w=120&h=120`]]
```

Создайте миниатюру 300×300 с zoom cropping.

``` php
[[*thumbnailImage:phpthumbof=`w=300&h=300&zc=1`]]
```

Если вы используете TV, Output Type для TV **должен** быть `text`.

Перечисленные свойства не единственные для phpthumbof. Дополнительную документацию по phpThumb найдёте через Google или [в readme](http://phpthumb.sourceforge.net/demo/docs/phpthumb.readme.txt) (все свойства примерно на треть ниже).

### Дальше

Больше примеров [серверной обработки изображений](case-studies-and-tutorials/quick-and-easy-modx-tutorials/automated-server-side-image-editing "Automated Server-Side Image Editing") и подробный разбор продвинутого использования phpthumbof от Aaron Belafonte на его блоге: [статья здесь](http://www.belafontecode.com/image-manipulation-with-phpthumbof-in-modx-revolution/).

## Использование Amazon S3

phpThumbOf может хранить кэшированные изображения в Amazon S3 вместо локального диска. Вы также можете раздавать их через CDN Amazon CloudFront. Сначала создайте аккаунт Amazon AWS и bucket Amazon S3 для phpThumbOf. Для CloudFront настройте distribution для этого bucket и при необходимости алиас домена.

Следующие системные настройки включают Amazon S3 в phpThumbOf. Их можно переопределить, вызвав phpThumbOf как сниппет с другими параметрами в вызове или через property set.

| System Setting Name                         | Key                           | Description                                                                                                                                                                                                                                                                                                                                                     |
| ------------------------------------------- | ----------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Amazon S3 Bucket                            | phpthumbof.s3\_bucket         | Имя bucket Amazon S3 для phpThumbOf.                                                                                                                                                                                                                                                                                               |
| Amazon S3 Cache Time                        | phpthumbof.s3\_cache\_time    | Сколько часов хранить миниатюру в Amazon S3. Более старые миниатюры автоматически пересоздаются при некэшированном вызове phpThumbOf. Если включён плагин phpThumbOfCacheManager, он очищает все миниатюры в Amazon S3 при очистке кэша сайта.                                                                          |
| Use PHP get\_headers to Check Modified Date | phpthumbof.s3\_headers\_check | При значении «Yes» phpThumbOf использует get\_headers PHP для проверки даты изменения thumbos в S3. По умолчанию «No»: phpThumbOf вызывает Amazon S3 get\_object\_url, что быстрее. Включите эту опцию при проблемах с кэшированием.                                                                                                   |
| Amazon S3 Host Alias                        | phpthumbof.s3\_host\_alias    | Если вы используете CNAME или другой алиас для домена S3, укажите его здесь без завершающего слэша. Для CloudFront укажите домен доставки: домен distribution или алиас для него. |
| Amazon S3 Key                               | phpthumbof.s3\_key            | Access Key ID аккаунта Amazon S3 со страницы Security Credentials.                                                                                                                                                                                                                         |
| Amazon S3 Bucket Path                       | phpthumbof.s3\_path           | Путь в bucket Amazon S3 для файлов кэша phpThumbOf.                                                                                                                                                                                                                                                                              |
| Amazon S3 Secret Key                        | phpthumbof.s3\_secret\_key    | Secret Access Key аккаунта Amazon S3 со страницы Security Credentials                                                                                                                                                                                                                                                             |
| Use Amazon S3                               | phpthumbof.use\_s3            | После настройки всех параметров выше установите «Yes», чтобы хранить кэшированные миниатюры в bucket Amazon S3.                                                                                                                                                                                                                                  |

Если места на диске достаточно и вы не генерируете много разных динамических миниатюр, отключите плагин phpThumbOfCacheManager при работе с Amazon S3 для лучшей производительности. После очистки кэша сайта или при некэшированном вызове phpThumbOf проверяет, есть ли миниатюра уже в Amazon S3, прежде чем создать её заново. phpThumbOf всё равно пересоздаёт кэш при некэшированном вызове, если миниатюра старше числа часов из настройки Amazon S3 Cache Time.

## Примеры не для изображений

phpThumb принимает широкий набор форматов при включённом ImageMagick на сервере, что открывает интересные сценарии. Список форматов зависит от провайдера. Среди вариантов:

- AI
- AVI
- EPS
- M4V
- MP4
- PDF
- PSD

**Supported Input Formats**
 A, AI, ART, ARW, AVI, AVS, B, BGR, BMP, BMP2, BMP3, BRF, BRG, C, CALS, CAPTION, CIN, CIP, CLIP, CMYK, CMYKA, CR2, CRW, CUR, CUT, DCM, DCR, DCX, DDS, DFONT, DNG, DOT, DPS, DPX, EPDF, EPI, EPS, EPS2, EPS3, EPSF, EPSI, EPT, EPT2, EPT3, ERF, FAX, FITS, FRACTAL, FTS, G, G3, GBR, GIF, GIF87, GRADIENT, GRAY, GRB, HALD, HISTOGRAM, HRZ, HTM, HTML, ICB, ICO, ICON, INFO, INLINE, IPL, ISOBRL, JNG, JP2, JPC, JPEG, JPG, JPX, K, K25, KDC, LABEL, M, M2V, M4V, MAP, MAT, MATTE, MIFF, MNG, MONO, MOV, MP4, MPC, MPEG, MPG, MRW, MSL, MSVG, MTV, MVG, NEF, NULL, O, ORF, OTB, OTF, PAL, PALM, PAM, PATTERN, PBM, PCD, PCDS, PCL, PCT, PCX, PDB, PDF, PDFA, PEF, PFA, PFB, PFM, PGM, PGX, PICON, PICT, PIX, PJPEG, PLASMA, PNG, PNG24, PNG32, PNG8, PNM, PPM, PREVIEW, PS, PS2, PS3, PSD, PTIF, PWP, R, RADIAL-GRADIENT, RAF, RAS, RBG, RGB, RGBA, RGBO, RLA, RLE, SCR, SCT, SFW, SGI, SHTML, SR2, SRF, STEGANO, SUN, SVG, SVGZ, TEXT, TGA, THUMBNAIL, TIFF, TIFF64, TILE, TIM, TTC, TTF, TXT, UBRL, UIL, UYVY, VDA, VICAR, VID, VIFF, VST, WBMP, WMF, WMV, WMZ, WPG, X, X3F, XBM, XC, XCF, XPM, XPS, XV, XWD, Y, YCbCr, YCbCrA, YUV

С phpThumbOf вы работаете с большинством этих форматов напрямую и динамически создаёте превью. Если вы отдаёте PDF для скачивания, можно сгенерировать jpg-превью так:

``` php
[[*downloadable-pdf:phpthumbof=`w=610&f=jpg`]]

[[!phpthumbof? &input=`[[+pdf-link]]` &options=`&w=610&f=jpg`]]
```

При работе с крупными файлами выше риск превысить лимиты ресурсов. Кэширование сильно снижает вероятность проблем.

## Устранение неполадок

- Убедитесь, что каталог `assets/components/phpthumbof/cache` создан и доступен PHP для записи
- Убедитесь, что ImageMagick установлен и включён в PHP
- Если хост использует symlinks в структуре каталогов, проверьте, что они указывают на корректный реальный путь в `core/config/config.inc.php`

## Смотрите также

Вы также можете вызывать phpThumbOf как обычный сниппет:

``` php
[[!phpthumbof? &input=`[[+filename]]` &options=`&w=640&h=480&zc=0&aoe=0&far=0`]]
```

&aoe=0&far=0 не увеличивает изображения меньше заданного размера.

Чтобы получить скруглённые «сферические» изображения в IE7/IE8, добавьте `&fltr\[\]=ric|x|x` к аргументам. Замените X на width/2 и height/2. :)

[Проект](https://github.com/modxcms/phpthumbof/) на GitHub, там же сообщают об ошибках.
