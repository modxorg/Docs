---
title: Написание плагинов
translation: extending-modx/plugins
---

## Что такое плагин?

Плагины похожи на сниппеты тем, что они представляют собой кусочки кода PHP, которые имеют доступ к API MODX. Наибольшая разница, однако, заключается в том, *когда* выполняется код. Вы помещаете сниппеты внутри страницы или внутри шаблона, и они запускаются при просмотре страницы, тогда как плагины настроены на выполнение во время определенных системных событий, например сохранение чанка или очистка кеша. Поэтому, когда данное событие «срабатывает», любой плагин «прослушивает» это событие. После выполнения кода плагина управление возвращается к точке после того места, где было инициировано системное событие.

**Другие CMS**
Каждая CMS использует некое понятие «плагин», но точная номенклатура может отличаться. Например, в WordPress плагины «подключаются» к событиям, называемым «действиями» или «фильтрами».

Поскольку они выполняются во время различных событий, плагины не ограничиваются обработкой внешнего интерфейса. Многие события запускаются событиями, которые происходят только в менеджере MODX. Список системных событий MODX можно посмотреть [здесь](http://wiki.modxcms.com/index.php/System_Events "MODx System Events").

Любой закрывающий тег PHP ?> будет удален из кода вашего плагина при его сохранении. Это не нужно (и нежелательно), потому что код плагина при запуске будет находиться внутри другого кода PHP.

## Модель события

MODX вызывает системные события в своих процессах кода, чтобы вы могли изменять функциональность ядра без взлома ядра. К этим системным событиям может быть прикреплено любое количество плагинов, и они будут запускать каждый плагин в соответствии с его приоритетом (сначала самые низкие номера)

## Обработка события

В вашем плагине способ обработки выходных данных зависит от системного события, в котором вы находитесь. Для некоторых системных событий вы возвращаете значение из плагина. Для других вы получаете доступ к выводу по ссылке и изменяете его.

Если вам нужно знать, какое событие вызвало ваш плагин (скажем, для плагина, который прослушивает более одного события), вы можете получить доступ к имени события следующим образом:

```php
$eventName = $modx->event->name;
```

Код для плагина, прослушивающего более одного события, выглядит следующим образом:

```php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnWebPageInit':
        /* сделать что-то */
        break;
    case 'OnWebPagePrerender':
        /* сделать что-то другое */
        break;
}
```

## Примеры плагинов

Плагины могут быть использованы для различных целей, ниже приведены несколько примеров:

### Сообщение пользователю:

**Описание:** Отправьте сообщение пользователю при создании/редактировании страницы.
**Системные события:** OnDocFormPrerender

```php
$modx->event->output('Привет, пользователь!');
```

---

### Пользовательская проверка

**Описание:** Выполните некоторую пользовательскую проверку при сохранении ресурса страницы.
**Системные события:** OnBeforeDocFormSave

```php
// Сделать какую-нибудь логичную штуку... если проверка не удалась:
$modx->event->output('Что-то не прошло проверку!');
return "Этот текст пойдет в логи";
```

Хитрость в том, что то, что вы хотите сообщить пользователю, должно быть передано функции **$modx->gt;output()**; любой текст, который вы хотите записать в журналы, может быть просто возвращен плагином. Если вы прошли валидацию, просто верните ноль.

**HTML код не разрешен**
Выходные данные, которые вы устанавливаете в **$modx->gt;event->output()**, не должны содержать HTML! Используйте только простой текст! Это связано с тем, что сообщение передается пользователю через модальное окно JavaScript.

Возвращаемое значение должно быть строкой. Если возвращаемое значение будет числом, объедините его с пустой строкой.

---

### Фильтр слов

**Описание:** Отфильтруйте слова из документа перед его отображением в Интернете.
**Системные события:** OnWebPagePrerender

```php
$words = array("snippet", "template"); // слова для фильтрации
$output = &$modx->resource->_output; // получить ссылку для вывода
$output = str_replace($words,"<b>[отфильтровано]</b>",$output);
```

---

### Перенаправитель страницы "Не найдено":

**Описание:** Перенаправляет пользователя на выбранный документ и отправляет сообщение.
**Системные события:** OnPageNotFound
**Системные настройки:**

- *pnf.page*: Идентификатор ресурса (ID)
- *pnf.mailto*: E-mail адрес получателя
- *pnf.mailfrom*: E-mail адрес отправителя

```php
if ($modx->event->name == 'OnPageNotFound') {
     $errorPage = $modx->getOption('pnf.page');
     if (empty($errorPage)) {
         $modx->sendErrorPage();
     } else {
         $mailto = $modx->getOption('pnf.mailto');
         if (!empty($mailto)) {
            // отправить сообщение на локальный профиль
            $resourceId = $modx->resource->get('id');
            $subject = 'Страница не найдена';
            $body = 'Кто-то пытался зайти на страницу с ID '.$resourceId;
            $modx->getService('mail', 'mail.modPHPMailer');
            $modx->mail->set(modMail::MAIL_BODY, $body);
            $modx->mail->set(modMail::MAIL_FROM, $modx->getOption('pnf.mailfrom'));
            $modx->mail->set(modMail::MAIL_FROM_NAME, 'MODX');
            $modx->mail->set(modMail::MAIL_SENDER, 'MODX');
            $modx->mail->set(modMail::MAIL_SUBJECT, $subject);
            $modx->mail->address('to',$mailto);
            $modx->mail->setHTML(true);
            $modx->mail->send();
         }
         $url = $this->makeUrl($scriptProperties['page']);
         $modx->sendRedirect($url, 1);
         exit;
    }
}
```

## Смотрите также

1. [Системные события](extending-modx/plugins/system-events)
2. [OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
3. [OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
4. [OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
5. [OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
6. [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
7. [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
8. [OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
9. [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
10. [OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
11. [OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
12. [OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
13. [OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
14. [OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
15. [OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
16. [OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
17. [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
18. [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
19. [OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
20. [OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
21. [OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
22. [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
23. [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
24. [OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
25. [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
26. [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
27. [OnWebLogout](extending-modx/plugins/system-events/onweblogout)
28. [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)
29. [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
30. [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
31. [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)
32. [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
33. [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
34. [OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
35. [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
36. [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
37. [OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
38. [OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
39. [OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
40. [OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
41. [OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
42. [OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
43. [OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
44. [OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
45. [OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
46. [OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
47. [OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
48. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
49. [OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
50. [OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
51. [OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
52. [OnCategorySave](extending-modx/plugins/system-events/oncategorysave)
53. [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
54. [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
55. [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
56. [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
57. [OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
58. [OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
59. [OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
60. [OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
61. [OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
62. [OnContextSave](extending-modx/plugins/system-events/oncontextsave)
63. [OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
64. [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
65. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
66. [OnInitCulture](extending-modx/plugins/system-events/oninitculture)
67. [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
68. [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
69. [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
70. [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
71. [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
72. [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
73. [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
74. [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
75. [OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
76. [OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
77. [OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
78. [OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
79. [OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
80. [OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
81. [OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
82. [OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
83. [OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
84. [OnPluginSave](extending-modx/plugins/system-events/onpluginsave)
85. [OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
86. [OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
87. [OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
88. [OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)
89. [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
90. [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
91. [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
92. [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
93. [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
94. [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
95. [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
96. [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
97. [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
98. [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
99. [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
100. [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
101. [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
102. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
103. [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
104. [OnUserSave](extending-modx/plugins/system-events/onusersave)
105. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
106. [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
107. [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
