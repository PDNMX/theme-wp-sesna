# 05 - Tipografía (Estándar SND)

**Estado:** IMPLEMENTADA
**Componentes afectados:** Home (section-sna, section-programas, section-integrantes, section-noticias), Global.

## Reglas de Tipografía

El Sistema Nacional de Diseño (SND) estipula dos familias tipográficas y un sistema de clases riguroso:

1. **Patria**: Únicamente para títulos y encabezados breves. (Clase: `.patria`)
2. **Noto Sans**: Tipografía predeterminada para el cuerpo de texto, subtítulos, botones y enlaces.

### Equivalencias implementadas (Bootstrap -> SND)

Se han estandarizado los componentes del *home* para que utilicen las clases semánticas de tipografía y color del framework SND en lugar de clases de utilidad de Bootstrap.

| Antes (Bootstrap / Tema V2) | Después (SND Guinda) | Uso en SND |
|---|---|---|
| `fw-bold font-patria text-burgundi` | `.h2b .patria .color--pguinda600` | Título secundario H2 (32pt, Bold) |
| `fw-bold text-dark` | `.sh0b .color--neutro800` | Subtítulo 0 (24pt, Bold, Noto Sans) |
| `text-muted` | `.b1r .color--neutro600` | Cuerpo de texto B1 (16pt, Regular, Gris) |
| `fw-bold fs-5 text-guinda` | `.sh1b .color--pguinda600` | Texto destacado grande (20pt, Bold) |
| `fs-8` | `.sdsb` | Detalles (14pt, Semibold) |

### Reglas de Color Institucional
* **Textos institucionales:** `.color--pguinda600`
* **Textos primarios/títulos de tarjetas:** `.color--neutro800`
* **Textos secundarios (párrafos descriptivos):** `.color--neutro600` o `.color--neutro500`
* **Negro absoluto (excepciones):** `<span style="color: #000;">` (ej. siglas SNA por mandato visual específico).

### Consideraciones para futuras homologaciones
1. **Evitar etiquetas híbridas:** No mezclar etiquetas como `<h1 class="h3">`. En SND, se respeta la semántica, utilizando la etiqueta correcta (`h2`, `h3`) junto a la clase de tamaño correspondiente (`.h2b`, `.sh0b`).
2. **Jerarquía H1:** Por regla de SEO y accesibilidad (WCAG), solo debe existir **un único** `<h1>` (con clase H0 o H1) por página.
3. **Control de pesos:** Las clases utilitarias de Bootstrap como `fw-bold` o `fw-normal` se vuelven redundantes. El peso de la fuente viene integrado en la última letra de la clase del SND (`b` para bold, `m` para medium, `r` para regular, `sb` para semibold).
