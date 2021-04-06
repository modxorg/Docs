---
title: "TinyMCE Rich Text Editor custom fonts"
description: "How to connect a couple of custom fonts to the editor"
---

## How to connect couple of custom fonts?

1. Connect file in the **MODX Settings ('gear icon')** > **System settings** in the `external.config.json` field. If it does not exist, create it. It is important to specify file path properly. In most cases it will be `../assets/components/tinymcerte/external.config.json` 

2. File must contain valid JSON data. In example below `toolbar1` and `toolbar2` are also redefined, also additional font sizes have been set. Please find full list of settings [here](https://www.tiny.cloud/docs/advanced/available-toolbar-buttons/) 

   ``` php

   {
     "toolbar1": "undo redo | styleselect| bullist numlist outdent indent | link image",
     "toolbar2": "fontselect fontsizeselect forecolor|formatselect lineheight | bold italic | alignleft aligncenter alignright alignjustify|",
     "font_formats":"Open Sans=open sans; Roboto=roboto; Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
     "fontsize_formats": "8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt 72pt 96pt"
   }

   ```

3. Create own CSS file, not forget to connect it to MODX. Here you can also set default styles for the editor, fonts import is the next:

   ``` css

   @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
   @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap');

   body {
     font-family: 'Open Sans', sans-serif;
   }

   h1, h2, h3, h4, h5, h6 {
     font-family: 'Roboto', sans-serif;
   }
 
   ```

4. Include CSS style file in MODX settings in `tinymcerte.content_css`. Font view in editor will change. 

5. Optional step. Fonts are already included in the styles usually, and you only need to add them to WYSIWYG. But sometimes it is required to connect fonts on the usage page as well.

## See also

1. [Tiny Cloud Docs](https://www.tiny.cloud/docs/)
2. [TinyMCE Extra](extras/tinymce)