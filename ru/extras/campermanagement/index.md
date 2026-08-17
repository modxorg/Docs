---
title: "CamperManagement"
description: "Add-on для управления транспортными средствами в MODX Revolution (больше не поддерживается)"
translation: "extras/campermanagement/index"
---

**CamperManagement больше не поддерживается. Не используйте, если вы не разработчик, готовый взять проект на себя.**

Download: <https://modx.com/extras/package/campermanagement> (или установка через Package Manager)
 Source & Bugs: <https://github.com/Mark-H/CamperManagement>

![](camper-grid.png)

CamperManagement это add-on для управления транспортными средствами в MODX Revolution, разработанный и протестированный в 2.1.0-rc3 и новее Mark Hamstra. Есть модуль управления в бэкенде и гибкие сниппеты для фронтенда, как принято в MODX.
 Доступная документация:

- [CamperManagement.Customizing the Component](extras/campermanagement/campermanagement.customizing-the-component "CamperManagement.Customizing the Component")
- [CamperManagement.Developing the front-end](extras/campermanagement/campermanagement.developing-the-front-end "CamperManagement.Developing the front-end")
    - [CamperManagement.cmCamperDetails Snippet](extras/campermanagement/campermanagement.developing-the-front-end/cmcamperdetails-snippet "CamperManagement.cmCamperDetails Snippet")
    - [CamperManagement.cmCampers Snippet](extras/campermanagement/campermanagement.developing-the-front-end/cmcampers-snippet "CamperManagement.cmCampers Snippet")
    - [CamperManagement.Placeholders you can use](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use")
- [CamperManagement.Managing your vehicle](extras/campermanagement/campermanagement.managing-your-vehicle "CamperManagement.Managing your vehicle")
- [CamperManagement.Module home](extras/campermanagement/campermanagement.module-home "CamperManagement.Module home")

 Сетку можно полностью настроить через чанки и сниппеты, вплоть до вывода изображений. Опций настолько много, что при желании можно сделать карусель из миниатюр в grid view. Или горизонтальные строки со всеми деталями.

![](camper-details.png)

Как и grid, страница деталей настраивается под ваши задачи. Создайте ресурс с нужным шаблоном и вызовите сниппет cmCamperDetails для заполнения плейсхолдеров данными. Если id camper не существует, можно показать пустые поля или перенаправить на указанный ресурс (например, страницу каталога).
