---
title: "Descripción general de MODX"
sortorder: "1"
_old_id: "22"
_old_uri: "2.x/getting-started/an-overview-of-modx/"
---

## ¿Qué es MODX?

MODX es una plataforma de aplicación de contenido. ¿Qué significa esto? Bueno, eso depende de quién seas:

![](avgjoe.png)

### Usuarios finales (El Manolo promedio)

MODX le ofrece un sistema que le permite publicar su contenido fuera de línea en la web en cualquier forma, manera o estilo que desee. También ofrece una interfaz de back-end completamente personalizable que puede hacer tan simple (o tan compleja) como desee.

Con MODX puede construir todo, desde un sitio web simple, a un blog, a una presencia web a gran escala , y mantener su interfaz de administrador simple y manejable. Arrastrar y soltar las páginas web para reordenarlas y moverlas. Disponer de una completa vista WYSIWYG (lo que ves es lo que obtienes) de los recursos. Dejar  recursos sin publicar antes de terminarlos. Programar recursos para publicarlos en determinados momentos.

 MODX te ayuda a organizar tu contenido de la manera que lo desees y a obtener excelentes resultados de SEO. MODX es totalmente compatible con URL 100% amigable, por lo que obtener mysite.com/my/own/custom/url.html es increíblemente simple y tan fácil como estructurar tu sitio de esa manera.

![](coolcarl.png)

### Diseñadores (El genial Carlos)

¿Alguna vez quisiste total libertad con tu HTML y CSS? ¿Cansado de hackear los sistemas existentes para que tu diseño funcione de la manera en que lo codificaste? MODX no genera una sola línea de HTML, sino que deja el diseño del front-end a tu libre albedrío.

Puedes usar MODX como tu sistema de gestión de contenido (CMS) preferido, ya que MODX ofrece plantillas completamente flexibles y entrega de contenido sin restricciones. Pon tu CSS e imágenes donde quieras. Y una vez que haya terminado de diseñar, entregua las tareas de desarrollo a tu desarrollador o instala Extras con solo un clic, directamente desde el administrador. Sencillo.

![](badassbilly.png)

### Desarrolladores (El dañino Guillermo)

Has examinado diferentes CMS, pero has descubierto que desarrollar en ellos es una mezcla de demasiados códigos sin conectar, o simplemente no son lo suficientemente potentes o elegantes. Has estudiado los frameworks PHP y has descubierto que tienen el potencial, pero no hacen Manejo de Contenido ni tienen una interfaz de usuario lo suficientemente buena para tus clientes. Deseas el poder y la flexibilidad de un framework, con la interfaz de usuario y la gestión de contenido de un CMS.

Entra en MODX Revolution. Una API completamente flexible, potente y robusta, basada en los principios de POO y que utiliza un Modelo relacional de objetos (ORM) con PDO, llamado [xPDO](extending-modx/xpdo). Agrega una potente interfaz [Sencha](http://sencha.com) para tus clientes, totalmente personalizable. Propiedades y ajustes personalizados. Soporta internacionalización. Distribución de paquetes integrada para que puedas empaquetar tu código y distribuirlo en cualquier instalación de Revolution. Agrega páginas de administrador personalizadas para ejecutar aplicaciones completas dentro de MODX.

## Conceptos básicos

En esencia, MODX lo forman un montón de partes engranadas. Pero las partes básicas son:

### Recursos

[Recursos](building-sites/resources "Resources") son básicamente una ubicación de página web. Puede ser contenido HTML real, o un archivo, enlace de reenvío o un enlace simbólico, o cualquier otra cosa a la que se pueda acceder mediante una URL.

### Plantillas

Las [Plantillas](building-sites/elements/templates "Templates") son la casa en la que habita un Recurso. Normalmente incluyen la cabecera y el pie de página.

### Variables de Plantilla

Las [Variables de Plantilla](building-sites/elements/template-variables "Template Variables") (TVs) son campos personalizados para una plantilla que permiten al usuario asignar valores dinámicos a un recurso. Un gran ejemplo sería una TV de 'etiquetas' que te permite especificar etiquetas para un recurso. Puede tener un número ilimitado de TVs por página.

### Chunks (Trozos)

[Chunks](building-sites/elements/chunks "Chunks") son simplemente pequeños bloques de contenido, con lo que quieras poner dentro de ellos. Pueden contener [Snippets](extending-modx/snippets "Snippets"), o cualquier otro tipo de Elemento (Snippet, Chunk, TV, etc).

### Snippets (scripts)

[Snippets](extending-modx/snippets "Snippets") son scripts dinámicos de código PHP que se ejecutan cuando se carga la página. Pueden hacer cualquier cosa que se pueda codificar, incluida la creación de menús personalizados, capturar datos personalizados, etiquetar elementos, procesar formularios, capturar tweets, etc, etc.
                                                                                                                              


### Plugins

Los Plugins son scripts que se ejecutan cuando sucede alguno de los eventos asociado a ellos. Por lo general, se usan para extender el núcleo de Revolution para hacer algo durante una parte del proceso de carga, como eliminar palabras malas en el contenido, agregar enlaces de diccionario a palabras, administrar redireccionamientos para páginas antiguas, etc.

### Ajustes de Sistema

Los Ajustes de Sistema te ofrecen opciones de configuración casi infinitas. La mayoría de ellos están preconfigurados de la manera estandar más idónea, pero algunas cosas (como son las [Urls Amigables](getting-started/friendly-urls "Using Friendly URLs")) están deshabilitados de forma predeterminada y pueden adaptarse a tus necesidades específicas simplemente cambiando un valor de configuración. Después de la instalación, diríjete a Sistema> Configuración del Sistema en el Administrador y explora las opciones disponibles. Por supuesto, revisa el área "Sitio" (usa el desplegable que dice "Filtrar por área..."), en donde hay algunas cosas interesantes para esperándote.

## Entonces, ¿qué pasa con una solicitud de página?

MODX carga el [Recurso](building-sites/resources "Resources") solicitado, busca la [Plantilla](building-sites/elements/templates "Templates") del Recurso, y coloca el contenido del Recurso en la Plantilla. MODX luego analiza el contenido combinado resultante, incluidas las etiquetas que puedan estar en él, en el orden en que se encuentran. De ahí, envía la respuesta al explorador del usuario.

## Ver también

1. [Glosario de términos de Revolution](getting-started/an-overview-of-modx/glossary-of-revolution-terms)
    1. [Explicación de la Estructura de Directorios](getting-started/an-overview-of-modx/glossary-of-revolution-terms/explanation-of-directory-structure)
