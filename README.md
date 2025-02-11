# Proyecto de Aplicación Web con Laravel, Jetstream y Livewire

¡Bienvenido(a) a este proyecto! Aquí encontrarás toda la información necesaria para entender y poner en marcha una aplicación web que combina autenticación, autorización, un sistema de gestión de artículos y etiquetas, y un formulario de contacto. Este proyecto está construido sobre **Laravel**, aprovechando **Jetstream** y **Livewire** para crear una experiencia fluida y dinámica.

---

## Tabla de Contenidos

1. [Descripción General](#descripción-general)  
2. [Estructura de Tablas](#estructura-de-tablas)  
3. [Funcionalidades Clave](#funcionalidades-clave)  
4. [Requisitos Previos](#requisitos-previos)  
5. [Instalación y Configuración](#instalación-y-configuración)  
6. [Uso del Proyecto](#uso-del-proyecto)  
7. [Generación de Datos de Prueba](#generación-de-datos-de-prueba)  
8. [Contribuir](#contribuir)  
9. [Licencia](#licencia)

---

## Descripción General

Este proyecto muestra cómo construir un sistema **multiusuario** que permita:

- **Registro e inicio de sesión** con verificación de correo electrónico.  
- Gestión de artículos (CRUD) asociando cada artículo a un usuario y a una etiqueta específica.  
- **Roles y políticas** para asegurar que solo el propietario de un artículo pueda editarlo o eliminarlo.  
- Un CRUD de etiquetas accesible solamente por usuarios con privilegios de administrador.  
- **Formulario de contacto** que cualquier persona (autenticada o no) puede usar para enviar un mensaje por correo.  
- Uso de **factories y seeders** para crear datos de prueba realistas.

El objetivo es demostrar buenas prácticas de desarrollo en Laravel, organizando el código y siguiendo un flujo de trabajo claro.

---

## Estructura de Tablas

A continuación, se describen las entidades principales del proyecto:

### Tabla `articles`

- **id**: Identificador primario.  
- **user_id**: Clave foránea hacia la tabla `users`.  
- **tag_id**: Clave foránea hacia la tabla `tags`.  
- **title**: Título del artículo.  
- **content**: Contenido completo del artículo.  
- **created_at** / **updated_at**: Tiempos de creación y actualización.

#### Relación
- Un **usuario** puede tener **muchos** artículos.
- Un **artículo** pertenece a un solo **usuario** y está vinculado a **una** etiqueta.

### Tabla `tags`

- **id**: Identificador primario.  
- **name**: Nombre de la etiqueta.  
- **description**: Descripción (opcional).  
- **created_at** / **updated_at**: Tiempos de creación y actualización.

#### Relación
- Una **etiqueta** puede estar asociada a **muchos** artículos.

### Tabla `users` (campo adicional)

- Se sugiere añadir un campo **is_admin** (booleano) que ayude a distinguir entre usuarios administradores y regulares.

---

## Funcionalidades Clave

1. **Autenticación y verificación de correo**:  
   - Registro de usuarios.  
   - Envío de correo de verificación.  
   - Acceso restringido a ciertas funcionalidades solo a usuarios con email verificado.

2. **CRUD de Artículos**:  
   - Crear, leer, actualizar y eliminar artículos.  
   - Políticas (Policies) que solo permiten a un usuario editar/eliminar artículos propios.

3. **CRUD de Etiquetas**:  
   - Crear, leer, actualizar y eliminar etiquetas (Tags).  
   - Acceso limitado a usuarios autenticados y administradores (is_admin).  
   - Middleware personalizado para restringir este acceso.

4. **Formulario de Contacto**:  
   - Permite a cualquier usuario (autenticado o no) enviar un correo.  
   - Validación de datos antes de enviar.  
   - Integración con servicios como Mailtrap para pruebas locales.

5. **Factories y Seeders**:  
   - Generación automática de datos de prueba para usuarios, artículos y etiquetas.  
   - Asegura relaciones coherentes (por ejemplo, cada artículo vinculado a un usuario real y a una etiqueta existente).

---

## Requisitos Previos

- **PHP >= 8.0** (recomendado)  
- **Composer** para la instalación de dependencias.  
- **Node.js** y **NPM** (o Yarn) para compilar recursos (si lo requieres con Laravel Mix o Vite).  
- **Base de datos** MySQL / PostgreSQL / SQLite (configurada en tu `.env`).  
- Servidor de correo configurado o **Mailtrap** para pruebas.

---

## Instalación y Configuración

1. **Clonar el repositorio**  
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd <NOMBRE_DE_LA_CARPETA>
