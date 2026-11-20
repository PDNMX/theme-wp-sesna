# Sistema Nacional de Diseño (SND) – Migrar desde la Gráfica Base

- **Fuente:** https://www.snd.gob.mx/migracion
- **Título de la página:** Migrar desde la Gráfica Base | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)
- **Idioma:** es (México)

El Sistema Nacional de Diseño es la base común para diseñar y desarrollar los servicios digitales del Gobierno de México. Si el sitio de tu dependencia usa la Gráfica Base v1, v2 o v3, esta guía te indica qué cambia, en qué orden migrar y qué hacer con lo que el SND todavía no cubre.

## Migración por etapas

> **Nota:** **La migración requiere atención y esfuerzo.** El SND no reemplaza la Gráfica Base de forma automática: hay que revisar y modificar el código HTML de cada página para cambiar clases, estructuras y scripts por sus equivalentes en el SND. Planea el trabajo por etapas y prueba cada página antes de publicarla.

1. **Estructura:** Quita `main.css` y `gobmx.js`, agrega el cargador del SND y coloca el encabezado y el pie de página. Parte de la [plantilla base](./snd-comenzar.md).
2. **Retícula y tipografía:** Cambia `.row` y `.col-*` por las clases de [retícula](./estilos/reticula.md), y los títulos y textos por las clases [tipográficas](./estilos/tipografia.md).
3. **Componentes publicados:** Utiliza los componentes de la librería para estructurar la página de tu dependencia. Consulta sus equivalencias en la tabla de abajo.
4. **Componentes pendientes:** Actualiza los componentes pendientes conforme se vayan liberando.
5. **Revisión:** Prueba con teclado, con zoom al 200 % y en móvil. Confirma que no queden clases ni scripts de la Gráfica Base.

## Equivalencias de componentes

Ubica cada estilo y componente en el SND y su equivalente en la Gráfica Base para identificar qué cambiar en tu HTML.

| Componente | Sistema Nacional de Diseño | Gráfica Base |
| :--- | :--- | :--- |
| **Estilos** | | |
| Colores | [Ver en el SND](./estilos/colores.md) (`/estilos/colores`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#colores) |
| Iconos | [Ver en el SND](./estilos/iconos.md) (`/estilos/iconos`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#iconos) |
| Pictogramas | [Ver en el SND](./estilos/pictogramas.md) (`/estilos/pictogramas`) | Sin equivalente |
| Tipografía | [Ver en el SND](./estilos/tipografia.md) (`/estilos/tipografia`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#encabezados) |
| Retícula | [Ver en el SND](./estilos/reticula.md) (`/estilos/reticula`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#sistema-de-reticula) |
| **Componentes** | | |
| Barra de búsqueda | [Ver en el SND](./componentes/barra-busqueda.md) (`/componentes/barra-busqueda`) | Sin equivalente |
| Barra de navegación | [Ver en el SND](./componentes/barra-navegacion.md) (`/componentes/barra-navegacion`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#navegacion) |
| Barra de navegación lateral | [Ver en el SND](./componentes/barra-lateral.md) (`/componentes/barra-lateral`) | Sin equivalente |
| Barra de progreso | [Ver en el SND](./componentes/barra-progreso.md) (`/componentes/barra-progreso`) | Sin equivalente |
| Botón de opción | [Ver en el SND](./componentes/radio-botones.md) (`/componentes/radio-botones`) | Sin equivalente |
| Botones | [Ver en el SND](./componentes/botones.md) (`/componentes/botones`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#botones) |
| Carga de archivos | [Ver en el SND](./componentes/carga-archivos.md) (`/componentes/carga-archivos`) | Próximamente |
| Casilla de verificación | [Ver en el SND](./componentes/casilla-verificacion.md) (`/componentes/casilla-verificacion`) | Sin equivalente |
| Divisor | [Ver en el SND](./componentes/divisor.md) (`/componentes/divisor`) | Próximamente |
| Encabezado | [Ver en el SND](./componentes/header.md) (`/componentes/header`) | Sin equivalente |
| Indicador de carga | [Ver en el SND](./componentes/indicador-carga.md) (`/componentes/indicador-carga`) | Sin equivalente |
| Insignias | [Ver en el SND](./componentes/insignias.md) (`/componentes/insignias`) | Próximamente |
| Interruptor | [Ver en el SND](./componentes/interruptor.md) (`/componentes/interruptor`) | Próximamente |
| Listas | [Ver en el SND](./componentes/listas.md) (`/componentes/listas`) | Sin equivalente |
| Mensajes emergentes | [Ver en el SND](./componentes/mensajes-emergentes.md) (`/componentes/mensajes-emergentes`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#tooltips) |
| Mensajes informativos | [Ver en el SND](./componentes/mensajes-informativos.md) (`/componentes/mensajes-informativos`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#alertas) |
| Notificación flotante | [Ver en el SND](./componentes/toast.md) (`/componentes/toast`) | Próximamente |
| Pie de página | [Ver en el SND](./componentes/footer.md) (`/componentes/footer`) | Sin equivalente |
| Píldoras | [Ver en el SND](./componentes/chips.md) (`/componentes/chips`) | Próximamente |
| Selector de fechas | [Ver en el SND](./componentes/selector-fecha.md) (`/componentes/selector-fecha`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#datepicker) |
| Tabla | [Ver en el SND](./componentes/tabla.md) (`/componentes/tabla`) | [Ver en la Gráfica Base](https://www.gob.mx/guias/grafica/v3/#tablas) |
| Texturas | [Ver en el SND](./componentes/texturas.md) (`/componentes/texturas`) | Sin equivalente |

## Preguntas frecuentes

- **¿Puedo utilizar la gráfica base y el Sistema Nacional de Diseño (SND) al mismo tiempo?**
  La gráfica base y el SND no deben utilizarse en una misma página, ya que se pueden generar conflictos de estilos que afecten el funcionamiento de los componentes.
- **¿Puedo utilizar Bootstrap para los componentes que aún no están disponibles en el SND?**
  No se recomienda, ya que los estilos de Bootstrap pueden generar conflictos con los del SND y afectar el funcionamiento de los componentes. Si necesitas alguno que aún no esté disponible, te sugerimos esperar a que se incorpore.
- **¿Puedo descargar los archivos CSS del SND o debo enlazarlos?**
  No es posible descargar los archivos CSS del SND. Para utilizarlo, vincula el archivo Javascript que aparece en la sección de Comenzar.
- **¿Tengo que migrar todo el sitio al mismo tiempo?**
  No, puedes realizar la migración de forma gradual, por páginas o secciones. Solo asegúrate de que cada página utilice un único sistema: el SND o la gráfica Base, sin combinarlos.
- **¿La migración cambia algo para las personas que usan mi sitio?**
  Sí, pero para bien: el sitio se verá con la identidad gráfica actual del Gobierno de México y será más accesible desde el celular, con teclado y con lectores de pantalla. Los contenidos y trámites de tu sitio no cambian; solo su presentación.
