# Sistema Nacional de Diseño (SND) – Versión 1.0.0 (Documentación Completa)

- **Sitio oficial:** https://www.snd.gob.mx/
- **Versión publicada:** `v1.0.0` (`01/11/2026`)
- **Idioma:** `es` (México)

---

## 1. Inicio (`/`)

- **Título:** `Sistema Nacional de Diseño`
- **Descripción principal:** **Un marco que guía el diseño oficial de plataformas digitales del Gobierno de México con lineamientos y herramientas de ayuda,** promoviendo servicios públicos accesibles y útiles para todas las personas.
- **Banner de Migración:**
  - **Título (`h2`):** `¿Tu sitio usa la Gráfica Base v1, v2 o v3?`
  - **Texto:** `Todas las plataformas del gobierno federal deben migrar al SND. Consulta qué cambia y cómo migrar por etapas.`
  - **Enlace CTA:** [Consultar la guía de migración](./snd-migracion.md) (`/migracion`)
- **Sección `¿Qué necesitas hacer?`:**
  - **Tarjeta 1 (`Para equipos de UX y UI` — Diseñar un servicio):** `Consulta el UI Kit, aplica los estilos y sigue los principios de lenguaje ciudadano y accesibilidad desde el diseño.` — CTA: `Solicitar acceso al UI Kit`
  - **Tarjeta 2 (`Para equipos de desarrollo` — Construir una página):** `Enlaza la hoja de estilos y el JS desde el CDN, parte de la plantilla base y copia el código de cada componente.` — CTA: [Comenzar a desarrollar](./snd-comenzar.md) (`/comenzar`)
- **Nota histórica:** `Consulta aquí las versiones anteriores de la Gráfica base.` (`https://www.gob.mx/guias/grafica/v3/`)

---

## 2. Mapa completo de archivos extraídos (31 páginas del sitio)

### Guías generales y Plan de Proyecto (4)
> **Si eres una IA o un desarrollador nuevo, empieza por la sección 0 del plan** (reglas de oro y orden de lectura).

1. **Plan y Análisis Cruzado para SESNA:** [PLAN-ACTUALIZACION-SND-v1.0.0.md](./PLAN-ACTUALIZACION-SND-v1.0.0.md) — *Guía maestra para desarrolladores y agentes de IA con el análisis cruzado, inventario de archivos/líneas a modificar, componentes en reserva y checklist de implementación.*
2. **Inicio (`/`):** Incluido en este índice ([README.md](./README.md)).
3. **Migración (`/migracion`):** [snd-migracion.md](./snd-migracion.md) — *Migrar desde la Gráfica Base*
4. **Comenzar (`/comenzar`):** [snd-comenzar.md](./snd-comenzar.md) — *Comenzar a desarrollar (Cargador `carga.js`, Plantilla base, Variantes de pie de página y Registro de versiones)*

### Estilos (5)
Cada archivo incluye el contenido íntegro de las 3 pestañas (**Descripción**, **Diseño** y **Desarrollo**):
1. **Colores (`/estilos/colores`):** [estilos/colores.md](./estilos/colores.md)
2. **Iconos (`/estilos/iconos`):** [estilos/iconos.md](./estilos/iconos.md) *(incluye las 9 categorías y los 245 iconos)*
3. **Pictogramas (`/estilos/pictogramas`):** [estilos/pictogramas.md](./estilos/pictogramas.md) *(incluye los 76 pictogramas)*
4. **Tipografía (`/estilos/tipografia`):** [estilos/tipografia.md](./estilos/tipografia.md)
5. **Retícula (`/estilos/reticula`):** [estilos/reticula.md](./estilos/reticula.md)

### Componentes (22)
Cada archivo incluye el contenido íntegro de sus pestañas (**Descripción**, **Diseño** y **Desarrollo**):
1. **Barra de búsqueda (`/componentes/barra-busqueda`):** [componentes/barra-busqueda.md](./componentes/barra-busqueda.md)
2. **Barra de navegación (`/componentes/barra-navegacion`):** [componentes/barra-navegacion.md](./componentes/barra-navegacion.md)
3. **Barra de navegación lateral (`/componentes/barra-lateral`):** [componentes/barra-lateral.md](./componentes/barra-lateral.md)
4. **Barra de progreso (`/componentes/barra-progreso`):** [componentes/barra-progreso.md](./componentes/barra-progreso.md) *(Nuevo desarrollo en v1.0.0: `progresoPasos`, `progresoLineal`, `progresoVertical`)*
5. **Botón de opción (`/componentes/radio-botones`):** [componentes/radio-botones.md](./componentes/radio-botones.md) *(Nuevo desarrollo en v1.0.0: `.form__radio`)*
6. **Botones (`/componentes/botones`):** [componentes/botones.md](./componentes/botones.md)
7. **Carga de archivos (`/componentes/carga-archivos`):** [componentes/carga-archivos.md](./componentes/carga-archivos.md) *(Nuevo componente en v1.0.0: `.cargarArchivo`)*
8. **Casilla de verificación (`/componentes/casilla-verificacion`):** [componentes/casilla-verificacion.md](./componentes/casilla-verificacion.md) *(Nuevo desarrollo en v1.0.0: `.form__checkbox`)*
9. **Divisor (`/componentes/divisor`):** [componentes/divisor.md](./componentes/divisor.md) *(Nuevo componente en v1.0.0: `<hr class="divisor">`)*
10. **Encabezado (`/componentes/header`):** [componentes/header.md](./componentes/header.md) *(Actualizado a Web Component `<snd-header></snd-header>`)*
11. **Indicador de carga (`/componentes/indicador-carga`):** [componentes/indicador-carga.md](./componentes/indicador-carga.md) *(Solo pestañas Descripción y Diseño)*
12. **Insignias (`/componentes/insignias`):** [componentes/insignias.md](./componentes/insignias.md) *(Nuevo componente en v1.0.0: `.insignia-borde*`, `.insignia-solido*`)*
13. **Interruptor (`/componentes/interruptor`):** [componentes/interruptor.md](./componentes/interruptor.md) *(Nuevo componente en v1.0.0: `.form__switch`)*
14. **Listas (`/componentes/listas`):** [componentes/listas.md](./componentes/listas.md)
15. **Mensajes emergentes (`/componentes/mensajes-emergentes`):** [componentes/mensajes-emergentes.md](./componentes/mensajes-emergentes.md) *(Actualizado a v2 con `data-mensaje-emergente`)*
16. **Mensajes informativos (`/componentes/mensajes-informativos`):** [componentes/mensajes-informativos.md](./componentes/mensajes-informativos.md) *(Nuevo desarrollo en v1.0.0: `.mensajeInformativo`)*
17. **Notificación flotante (`/componentes/toast`):** [componentes/toast.md](./componentes/toast.md) *(Nuevo componente en v1.0.0; pestañas Descripción y Diseño)*
18. **Pie de página (`/componentes/footer`):** [componentes/footer.md](./componentes/footer.md) *(Actualizado a Web Components `<snd-footer>`, `<snd-footer-lite>`, `<snd-footer-interno>`)*
19. **Píldoras (`/componentes/chips`):** [componentes/chips.md](./componentes/chips.md) *(Nuevo componente en v1.0.0: `.pildora`, `.pildora__grupo`, `.pildora__desplegable`)*
20. **Selector de fechas (`/componentes/selector-fecha`):** [componentes/selector-fecha.md](./componentes/selector-fecha.md) *(Solo pestañas Descripción y Diseño)*
21. **Tabla (`/componentes/tabla`):** [componentes/tabla.md](./componentes/tabla.md) *(Solo pestañas Descripción y Diseño)*
22. **Texturas (`/componentes/texturas`):** [componentes/texturas.md](./componentes/texturas.md) *(Nuevo desarrollo en v1.0.0: `.textura`, `.textura--guinda|verde|dorada|blanca`)*

### Plantillas (1)
1. **Medios de autenticación (`/plantillas/integracion-llave-mx`):** [plantillas/integracion-llave-mx.md](./plantillas/integracion-llave-mx.md)
