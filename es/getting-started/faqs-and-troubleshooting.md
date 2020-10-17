---
title: "Preguntas frecuentes y solución de problemas"
_old_id: "1689"
_old_uri: "2.x/faqs-and-troubleshooting"
note: "Esta página no se ha actualizado en un tiempo, y podría necesitar una buena revisión."
---

Este documento tiene como objetivo comenzar con problemas/preguntas comunes sobre MODX Revolution, ya sea respondiéndolos, o apuntando a los recursos adecuados. No es de ninguna manera exclusivo, y una buena búsqueda en los foros y en esta documentación puede encontrar más recursos para lo que está buscando. En todos los casos - si no puede encontrar lo que necesita, pregunte en los [foros](http://forums.modx.com) o en IRC: irc.freenode.org canal: #MODX.
La numeración de preguntas no representa nada más que eso - un número para indicar qué pregunta está buscando para ayudar a navegar a través de ellas.

¡Este documento siempre será un trabajo en progreso a medida que se agreguen/cambien nuevas funciones, y podría ser útil su ayuda para mantenerlo estructurado y actualizado! Si no tiene acceso para editar este documento, [por favor, publica cualquier cosa que desees ver agregada o actualizada en este tema en los foros](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

## Tabla de Contenidos

Preguntas frecuentes y/o solución de problemas sobre temas específicos en otros lugares:

- [Solución de problemas de instalación](getting-started/installation/troubleshooting "Solución de problemas de instalación")
- [Solución de problemas de actualizaciones](getting-started/maintenance/upgrading/troubleshooting "Solución de problemas de actualizaciones")
- [Solución de problemas de gestión de paquetes](building-sites/extras/troubleshooting "Solución de problemas de gestión de paquetes")
- [Solución de problemas de seguridad](building-sites/client-proofing/security/troubleshooting-security "Solución de problemas de seguridad")

Subpáginas que tratan temas específicos:

- [Preguntas frecuentes y solución de problemas de desarrollo de CMP (Páginas personalizadas del Administrador)](extending-modx/custom-manager-pages/troubleshooting "Preguntas frecuentes y solución de problemas de desarrollo de CMP (Páginas personalizadas del Administrador)")

En esta página, encontrarás las siguientes categorías y preguntas:

## 1. MODX 101

### 1.1. ¿Qué es MODX Evolution y qué es MODX Revolution? ¿Cual es la diferencia?

MODX Evolution es el código heredado en las versiones 1.x. Ha impulsado cientos de miles de sitios web en los últimos cinco años y es lo que ha dado forma a MODX.

MODX Revolution es una reescritura completa de MODX Evolution que comparte las mismas ideas pero se basa en xPDO, una capa de abstracción de base de datos, y finalmente vio la luz del día en 2010.

En este momento, hay tres tipos de productos MODX :

- 0.9.6.x – es la base de código original que comenzó con su primera versión de producción/estable como la versión 0.9.0 a finales de octubre del 2005. Ya no es compatible, y REALMENTE debería actualizar a la última versión de Evolution. ¡Las vulnerabilidades en 0.9.6.x han sido reparadas hace mucho tiempo!
- Evolution 1.x – una distribución limpia y refinada de 0.9.6.x con convenciones y terminología más acorde con nuestro totalmente reescrito Revolution.
- Revolution 2.x – una derivación completamente orientada a objetos y completamente nueva que ha estado en desarrollo durante más de 3 años, que aborda las limitaciones encontradas en la base del código original, como tener un analizador verdaderamente recursivo y eliminar el límite máximo de 5,000 documentos.

Otras lecturas:

- "La Evolución de una Revolución" <http://modx.com/about/blog/the-evolution-of-a-revolution/>
- "¿Cuáles son las diferencias básicas entre Evolución y Revolución?" <http://modx.com/revolution/product/faq/#q1>
- Hay una gran cantidad de temas importantes en los foros, además de discutir evo y revo, que pueden ser interesantes si buscas una discusión más profunda de las diferencias. Dado que Revolution lleva más de tres años en desarrollo, revise la fecha en que se publicó algo para asegurarse de que sigan siendo relevantes.

### 1.2. ¿Qué etiquetas diferentes puedo usar? Que es `[[*pagetitle]]`, `[[Wayfinder]]` etc?

Consulta la documentación de [Sintáxis de Etiquetas](building-sites/tag-syntax "Sintáxis de Etiquetas"). Puedes encontrar los campos de recursos que puedes usar en Revolution en la [Documentación de recursos](building-sites/resources "Recursos").

## 2. El Manager

### 2.1. ¡Ayuda! ¿A dónde se fue la barra lateral?

Probablemente la escondiste en algún momento. Hay una flecha sutil en el lado izquierdo de la pantalla ([ver esta imagen](/download/attachments/36634926/subtlearrow.PNG)) en la que puedes hacer clic para recuperarla. En algunos casos, deberás actualizar la página para que los contenidos de la barra lateral se carguen correctamente.

### 2.2 ¿Cómo puedo modificar los campos de recursos que son visibles al crear o editar un [Recurso](building-sites/resources "Recurso")? ¿Existe algo como [Administrador del Manager](http://modx.com/extras/package/managermanager) en Revolution?

Puede usar la [Personalización de formularios](building-sites/client-proofing/form-customization "Personalización de Formularios") (que se encuentra bajo el menú de Seguridad) para cambiar los campos. No ofrece todo el complemento ManagerManager (Evolution) pero llega bastante lejos.

### 2.3 ¿Qué significa modDocument/modWeblink/modSymLink/modStaticResource?

Son los nombres de clase de Documentos, Weblinks, Symlinks y Recursos estáticos. Son "subtipos" de recursos (nombre de clase modResource) y cada uno tiene su propio objetivo específico. Todos aparecen en el Árbol de recursos y pueden aparecer en cualquier lugar de la jerarquía.

- [Documentos](building-sites/resources "Recursos") (comúnmente conocidos como Recursos, ver sección 2.4 a continuación) son páginas regulares y tienen contenido.
- Un [Weblink](building-sites/resources/weblink "Weblink") redirige a un usuario a un recurso diferente o una URL externa.
- Un [Symlink](building-sites/resources/symlink "Symlink") actúa como una copia de un documento.
- [Recursos estáticos](building-sites/resources/static-resource "Recursos estáticos") actúan como documentos, sin embargo, su contenido proviene de un archivo en el sistema de archivos en vez de la base de datos.

### 2.4 ¿Cuál es la diferencia entre un recurso y un documento?

Técnicamente, un Recurso (modResource) es un objeto abstracto del cual un Documento (modDocument) es una implementación.

Prácticamente ambos términos se usan para indicar lo mismo: un documento que contiene cierto contenido. Tomando de la implementación técnica, un [Weblink](building-sites/resources/weblink "Weblink"), [Symlink](building-sites/resources/symlink "Symlink") ó [Recurso Estático](building-sites/resources/static-resource "Recurso Estático"), también se incluyen cuando se hace referencia a "Recursos", ya que también son implementaciones de la clase modResource.

### 2.5 ¡Estoy bloqueado! ¡No puedo acceder al Manager! ¡Olvidé mi contraseña y la recuperación no funciona!

No estás condenado [Consulta estas instrucciones para Revolution](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually "Restablecer una contraseña de usuario manualmente").

## 3. Problemas de visualización del sitio web público.

### 3.1 Páginas en blanco en el sitio resueltas Borrando Caché

En Revolution 2.2.5, la forma en que xPDO/MODX escribe archivos de caché se ha refactorizado. Si tienes problemas con las páginas frontend en blanco que se resuelven después de borrar la memoria caché del sitio, puedes intentar configurar _use\_flock_. Esto debería ayudar con el alojamiento RackSpace Cloud, el alojamiento GoDaddy y algunos otros proveedores.

En su archivo de configuración MODX, agregue la configuración _use\_flock_ en su matriz $config\_options y configúrelo en falso.

Ver publicación original: <http://forums.modx.com/thread/78611/core-cache-file-locks-and-will-not-update#dis-post-434053>

### 3.2 Problemas generales de Snippets

Si encuentras que un snippet y/o plugin no funciona correctamente a pesar del código correcto, verifica que se haya instalado.
