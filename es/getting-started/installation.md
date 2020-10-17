---
title: "Instalación"
sortorder: "3"
_old_id: "165"
_old_uri: "2.x/getting-started/installation"
---

Esta página es solo para **nuevas instalaciones**. Para actualizaciones, por favor, consulta la documentación [Actualizando MODX](getting-started/maintenance/upgrading "Upgrading MODX").

Antes de instalar asegúrate de que se cumplen los [Requisitos del Servidor](getting-started/server-requirements "Server Requirements").

## Descargando MODX

MODX Revolution 2.x se puede descargar directamente desde el  [Sitio de Modx](https://modx.com/download) o via [Git](http://github.com/modxcms).

### Desde el sitio de MODX

La forma más rápida de descargar MODX es directamente desde la página [MODX Downloads](https://modx.com/download/).

Ten en cuenta que los paquetes enumerados en esta página son instantáneas de Git, nuestro software de control de versiones, desde el momento en que se empaquetaron. Sin embargo, Git siempre tendrá la última instantánea actualizada de Revolution, que puede contener varias correcciones de errores y nuevas características adicionales.


#### "Tradicional" o "Avanzado"

Existen dos versiones de paquete de instalación distintas de MODX, "Avanzado" y "Tradicional".

- Tradicional - Estos paquetes son instantáneas preconstruidas de Git. Simplemente extraiga los archivos a su servidor y siga la guía [Instalación Básica](getting-started/installation/standard "Basic Installation") para instalar MODX. La mayoría de los usuarios deberían elegir esta versión.

- Avanzado - Estos paquetes son un poco menos de la mitad de tamaño de las descargas "tradicionales", ya que los contenidos del "core" (`núcleo`) están comprimidos. El programa de instalación de MODX intentará desempaquetar o "compilar" este paquete durante la instalación. Se recomienda el uso de esta versión si hay planes de mover los directorios del núcleo(`core`), administrador (`manager`) o conectores (`connectors`). Se requerirá acceso SSH y una familiaridad con hacer las carpetas escribibles. Por favor, lée el documento [Instalación Avanzada](getting-started/installation/advanced "Advanced Installation") para más detalles sobre esta distribución.

### Desde Git

MODX Revolution es gestionado en [GitHub](http://github.com/modxcms). Por favor, lée el documento [Instalación desde Git](getting-started/installation/git "Git Installation") para aprender a utilizar MODX desde Git.

## Instalando MODX

MODX viene en múltiples distribuciones para descargar y los pasos de instalación difieren en cada distribución. Selecciona la guía de instalación de la distribución correspondiente utilizando los siguientes enlaces:

- Distribució Tradicional: [Instalación Básica](getting-started/installation/standard "Basic Installation")
- Distribución Avanzada: [Instalación Avanzada](getting-started/installation/advanced "Advanced Installation")
- Construyendo desde Git: [Instalación desde Git](getting-started/installation/git "Git Installation")

También puedes echar un vistazo a [Istalación desde línea de comandos](getting-started/installation/cli "Command Line Installation").

Después de finalizar la instalación, si encuentras algún problema, puedes buscar soluciones en la página [Solución de problemas de Instalación](getting-started/installation/troubleshooting "Troubleshooting Installation").
