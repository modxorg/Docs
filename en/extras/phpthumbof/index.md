---
title: "phpThumbOf"
_old_id: "691"
_old_uri: "revo/phpthumbof"
---

## What is phpThumbOf?

phpThumbOf is a secure, custom [Output Filter](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") for MODx Revolution that allows you to use phpThumb on any image URL specified in a placeholder.

### Requirements

- MODx Revolution 2.0.4 or later
- PHP5 or later

### History

phpThumbOf was written by [Shaun McCormick](/display/~splittingred) as a secure phpThumb output filter, and first released on November 3rd, 2010.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/phpthumbof>

### Attributes

- w = Width (in pixels)
- h = Height (in pixels)
- zc = Zoom Cropping. Set to 1 to enable zoom cropping.

## Usage Examples

Transform an image to 120px by 120px.

``` php
[[*image:phpthumbof=`w=120&h=120`]]
```

Make a 300x300 size thumbnail, with zoom cropping.

``` php
[[*thumbnailImage:phpthumbof=`w=300&h=300&zc=1`]]
```

If using a TV, the Output Type for the TV **must** be 'text'.

The above properties are not the only ones you can use with phpthumbof. You can find more documentation on phpThumb using Google or [in the readme](http://phpthumb.sourceforge.net/demo/docs/phpthumb.readme.txt) (all properties are about 1/3rds down).

### Taking it Further

You can see more examples of [server side image processing](case-studies-and-tutorials/quick-and-easy-modx-tutorials/automated-server-side-image-editing "Automated Server-Side Image Editing") and also Aaron Belafonte's great write up including examples more advanced usages of phpthumbof on his Blog. [You can find it here](http://www.belafontecode.com/image-manipulation-with-phpthumbof-in-modx-revolution/).

## Using Amazon S3

phpThumbOf can use Amazon S3 to store cached images instead of storing them locally. You can also use the Amazon CloudFront content delivery network to serve these images. You will first need to create an account with Amazon AWS and create an Amazon S3 bucket to use with phpThumbOf. To use CloudFront, create a CloudFront distribution to use with this bucket, and set up a domain alias if you wish to use one.

Use the following system settings to configure phpThumbOf to use Amazon S3. These settings can be overridden by calling phpThumbOf as a snippet and specifying different settings in the snippet call, or by using a property set.

| System Setting Name                         | Key                           | Description                                                                                                                                                                                                                                                                                                                                                     |
| ------------------------------------------- | ----------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Amazon S3 Bucket                            | phpthumbof.s3\_bucket         | The name of the Amazon S3 bucket you wish to use with phpThumbOf.                                                                                                                                                                                                                                                                                               |
| Amazon S3 Cache Time                        | phpthumbof.s3\_cache\_time    | The number of hours to cache a thumbnail for on Amazon S3. Thumbnails older than this will be automatically regenerated when phpThumbOf is called uncached. If the phpThumbOfCacheManager plugin is enabled, it will clear all thumbnails on Amazon S3 when the site cache is cleared.                                                                          |
| Use PHP get\_headers to Check Modified Date | phpthumbof.s3\_headers\_check | If set to "Yes" phpThumbOf will use PHP's get\_headers to check the modified date on S3 thumbos. By default this is set to "No" meaning phpThumbOf will use Amazon S3 get\_object\_url, which is faster. Turn this on if you are experiencing caching issues.                                                                                                   |
| Amazon S3 Host Alias                        | phpthumbof.s3\_host\_alias    | If you are using a CNAME or other alias to change the domain of the S3 service, enter it here (with no trailing slash). If you are using Amazon CloudFront for content delivery, enter the domain you are using for CloudFront delivery. This could be the domain of your CloudFront distribution, or a domain you are using as an alias for that distribution. |
| Amazon S3 Key                               | phpthumbof.s3\_key            | Set this to the Access Key ID of your Amazon S3 account, which you can find on the Security Credentials page of your Amazon S3 account.                                                                                                                                                                                                                         |
| Amazon S3 Bucket Path                       | phpthumbof.s3\_path           | The path in your Amazon S3 bucket where you want the phpThumbOf cache files to go.                                                                                                                                                                                                                                                                              |
| Amazon S3 Secret Key                        | phpthumbof.s3\_secret\_key    | Set this to the Secret Access Key of your Amazon S3 account, found on the Security Credentials page                                                                                                                                                                                                                                                             |
| Use Amazon S3                               | phpthumbof.use\_s3            | Once you have configured all of the above settings, set this to "Yes" to use your Amazon S3 bucket to store cached thumbnails.                                                                                                                                                                                                                                  |

Unless storage space is a problem or you are using many different dynamically-generated thumbnails, you may wish to disable the phpThumbOfCacheManager plugin when using Amazon S3 to improve performance. After the site cache is cleared or when phpThumbOf is called uncached, phpThumbOf will check whether the thumbnail already exists on AmazonS3 before regenerating it. phpThumbOf will still regenerate the cached thumbnail when called uncached and the thumbnail is older than the number of hours specified in the Amazon S3 Cache Time setting.

## Non-Image Examples

phpThumb accepts a wide range of formats if your server has ImageMagick enabled, which allows for some interesting options. The list of formats supported may vary based on your provider, however there are several interesting options including:

- AI
- AVI
- EPS
- M4V
- MP4
- PDF
- PSD

**Supported Input Formats**
 A, AI, ART, ARW, AVI, AVS, B, BGR, BMP, BMP2, BMP3, BRF, BRG, C, CALS, CAPTION, CIN, CIP, CLIP, CMYK, CMYKA, CR2, CRW, CUR, CUT, DCM, DCR, DCX, DDS, DFONT, DNG, DOT, DPS, DPX, EPDF, EPI, EPS, EPS2, EPS3, EPSF, EPSI, EPT, EPT2, EPT3, ERF, FAX, FITS, FRACTAL, FTS, G, G3, GBR, GIF, GIF87, GRADIENT, GRAY, GRB, HALD, HISTOGRAM, HRZ, HTM, HTML, ICB, ICO, ICON, INFO, INLINE, IPL, ISOBRL, JNG, JP2, JPC, JPEG, JPG, JPX, K, K25, KDC, LABEL, M, M2V, M4V, MAP, MAT, MATTE, MIFF, MNG, MONO, MOV, MP4, MPC, MPEG, MPG, MRW, MSL, MSVG, MTV, MVG, NEF, NULL, O, ORF, OTB, OTF, PAL, PALM, PAM, PATTERN, PBM, PCD, PCDS, PCL, PCT, PCX, PDB, PDF, PDFA, PEF, PFA, PFB, PFM, PGM, PGX, PICON, PICT, PIX, PJPEG, PLASMA, PNG, PNG24, PNG32, PNG8, PNM, PPM, PREVIEW, PS, PS2, PS3, PSD, PTIF, PWP, R, RADIAL-GRADIENT, RAF, RAS, RBG, RGB, RGBA, RGBO, RLA, RLE, SCR, SCT, SFW, SGI, SHTML, SR2, SRF, STEGANO, SUN, SVG, SVGZ, TEXT, TGA, THUMBNAIL, TIFF, TIFF64, TILE, TIM, TTC, TTF, TXT, UBRL, UIL, UYVY, VDA, VICAR, VID, VIFF, VST, WBMP, WMF, WMV, WMZ, WPG, X, X3F, XBM, XC, XCF, XPM, XPS, XV, XWD, Y, YCbCr, YCbCrA, YUV

You are able to use phpThumbOf to interact with most if not all of these formats directly, enabling you to dynamically create preview images. If you are offering PDF files for download, you could generate a jpg preview using the following:

``` php
[[*downloadable-pdf:phpthumbof=`w=610&f=jpg`]]

[[!phpthumbof? &input=`[[+pdf-link]]` &options=`&w=610&f=jpg`]]
```

It's important to remember when interacting with larger files there is a greater potential to exceed your allotted resources. Caching is highly recommended to reduce the likelihood of problems.

## Troubleshooting

- Make sure that the "assets/components/phpthumbof/cache" directory is created and is writable by PHP
- Make sure you have ImageMagick installed and enabled on your PHP installation
- If your host is using symlinks for its directory structure, make sure they point to the correct, true path in core/config/config.inc.php

## See Also

You can also use this as a normal snippet:

``` php
[[!phpthumbof? &input=`[[+filename]]` &options=`&w=640&h=480&zc=0&aoe=0&far=0`]]
```

&aoe=0&far=0 prevents smaller images getting enlarged.

A neat trick to get rounded, orb/sphere-like images to work in IE7/IE8, is to add "&fltr\[\]=ric|x|x" to the arguments. Replace X with width/2 and height/2. :)

The [project](https://github.com/modxcms/phpthumbof/) is hosted on github where bugs can be reported.