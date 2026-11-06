# 🎓 Plataforma Educativa UTA

[![PHP](https://img.shields.io/badge/PHP-7.4%20|%208.x-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?logo=javascript&logoColor=black)](https://developer.mozilla.org/es/docs/Web/JavaScript)
[![Composer](https://img.shields.io/badge/Composer-2.x-885630?logo=composer&logoColor=white)](https://getcomposer.org/)
[![Google OAuth 2.0](https://img.shields.io/badge/Google-OAuth%202.0-4285F4?logo=google&logoColor=white)](https://developers.google.com/identity/protocols/oauth2)
[![Microsoft SSO](https://img.shields.io/badge/Microsoft-365%20Auth-0078D4?logo=microsoft&logoColor=white)](https://learn.microsoft.com/azure/active-directory/develop/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

Portal web académico y sistema de gestión de acceso docente desarrollado para la **Universidad Técnica de Ambato (UTA)** - **Facultad de Ingeniería en Sistemas, Electrónica e Industrial (FISEI)**. 

Este proyecto implementa una solución integral para el registro, verificación en dos pasos, autenticación federada (SSO) y panel de control docente institucional.

---

## 📌 Tabla de Contenidos

- [🎓 Plataforma Educativa UTA](#-plataforma-educativa-uta)
  - [📌 Tabla de Contenidos](#-tabla-de-contenidos)
  - [🚀 Características Principales](#-características-principales)
    - [🔐 1. Autenticación Multicanal y Single Sign-On (SSO)](#-1-autenticación-multicanal-y-single-sign-on-sso)
    - [📝 2. Registro y Verificación Docente](#-2-registro-y-verificación-docente)
    - [📊 3. Panel de Control y Experiencia de Usuario (Dashboard)](#-3-panel-de-control-y-experiencia-de-usuario-dashboard)
    - [🤖 4. Asistente Virtual / Chatbot Académico](#-4-asistente-virtual--chatbot-académico)
  - [🏗 Arquitectura y Módulos](#-arquitectura-y-módulos)
  - [📂 Estructura del Proyecto](#-estructura-del-proyecto)
  - [💻 Tecnologías Utilizadas](#-tecnologías-utilizadas)
  - [📋 Requisitos Previos](#-requisitos-previos)
  - [⚙️ Instalación y Configuración](#️-instalación-y-configuración)
    - [1. Clonar el repositorio](#1-clonar-el-repositorio)
    - [2. Configurar la Base de Datos](#2-configurar-la-base-de-datos)
    - [3. Instalar Dependencias de Composer](#3-instalar-dependencias-de-composer)
    - [4. Configurar Variables de Entorno](#4-configurar-variables-de-entorno)
    - [5. Ejecutar la Aplicación](#5-ejecutar-la-aplicación)
  - [🗄 Modelo de Base de Datos](#-modelo-de-base-de-datos)
    - [Tabla: `logindocente`](#tabla-logindocente)
  - [🛡️ Seguridad y Buenas Prácticas](#️-seguridad-y-buenas-prácticas)

---

## 🚀 Características Principales

### 🔐 1. Autenticación Multicanal y Single Sign-On (SSO)
- **Inicio de sesión nativo:** Validación segura de credenciales contra base de datos MySQL con sesiones PHP activas.
- **Google OAuth 2.0:** Integración con Google Identity API para inicio de sesión con cuentas institucionales `@uta.edu.ec` o personales.
- **Microsoft 365 / Azure Active Directory:** Flujo OAuth 2.0 con Microsoft Graph para acceso directo vía correo institucional de Outlook/Office 365.

### 📝 2. Registro y Verificación Docente
- Formulario de alta con validación exhaustiva en tiempo real:
  - Formato estricto de nombres y apellidos con auto-capitalización.
  - Validación numérica de cédula de identidad ecuatoriana (10 dígitos).
  - Reglas de validación para correo institucional/Outlook.
- **Activación de cuenta con código de verificación:** Generación y validación de tokens únicos para activación de cuentas antes de habilitar el ingreso al sistema.

### 📊 3. Panel de Control y Experiencia de Usuario (Dashboard)
- **Identidad institucional:** Diseño con la paleta de colores oficial de la Universidad Técnica de Ambato (rojo granate y gris pizarra).
- **Generación dinámica de avatar:** Algoritmo en JavaScript que procesa los nombres del usuario en sesión y genera un distintivo circular con sus iniciales.
- **Monitor de conectividad en tiempo real:** Script vigilante (`checkConnection`) que detecta caídas de red o desconexión con el servidor y despliega un banner de alerta al usuario sin bloquear la interfaz.
- **Navegación modular:** Accesos directos a Dashboard, Cursos, Calificaciones, Calendario y Cierre de Sesión.

### 🤖 4. Asistente Virtual / Chatbot Académico
- Módulo de asistencia interactiva (`chatbot.php` y `Chat/`) para resolución rápida de dudas frecuentes (subida de tareas, navegación institucional y soporte técnico).

---

## 🏗 Arquitectura y Módulos

```
                                ┌───────────────────────────────────┐
                                │       LoginPlataforma.php         │
                                └─────────────────┬─────────────────┘
                                                  │
            ┌─────────────────────────────────────┼─────────────────────────────────────┐
            ▼                                     ▼                                     ▼
┌───────────────────────┐             ┌───────────────────────┐             ┌───────────────────────┐
│     Inicio Nativo     │             │     Google OAuth      │             │     Microsoft SSO     │
│   (Validacion.php)    │             │ (Configuracion.php)   │             │ (RegistroCorreo.php)  │
└───────────┬───────────┘             └───────────┬───────────┘             └───────────┬───────────┘
            │                                     │                                     │
            └─────────────────────────────────────┼─────────────────────────────────────┘
                                                  ▼
                                      ┌───────────────────────┐
                                      │  plataformaMain.php   │
                                      │    (Dashboard UTA)    │
                                      └───────────┬───────────┘
                                                  │
                                  ┌───────────────┴───────────────┐
                                  ▼                               ▼
                      ┌───────────────────────┐       ┌───────────────────────┐
                      │    Gestión Docente    │       │   Chatbot Académico   │
                      │    (Dashboard.php)    │       │     (chatbot.php)     │
                      └───────────────────────┘       └───────────────────────┘
```

---

## 📂 Estructura del Proyecto

```text
Plataforma-UTA/
├── .env.example                  # Plantilla de variables de entorno y credenciales
├── .gitignore                    # Reglas de exclusión de Git (secrets, vendor, binarios)
├── composer.json                 # Definición de dependencias de Composer
├── composer.lock                 # Bloqueo de versiones de dependencias
├── conexion.php                  # Conexión centralizada a base de datos MySQL (con env vars)
├── index.php                     # Punto de entrada y redirección principal
├── LoginPlataforma.php           # Portal de acceso principal (UI institucional)
├── Validacion.php                # Lógica de verificación y apertura de sesión
├── CreacionRegistroDocente.php   # Formulario de registro docente con validaciones
├── DatosDocente.php              # Inserción en base de datos y control de activación
├── Activacion.php                # Pantalla de verificación de código de activación
├── RegistroExitosoDocente.php    # Confirmación de activación exitosa
├── Dashboard.php                 # Panel de control de cursos y eventos
├── plataformaMain.php            # Vista principal con barra de navegación institucional
├── saludo.php                    # Script auxiliar de bienvenida al docente
├── chat.php                      # Widget y botón flotante del asistente
├── chatbot.php                   # Lógica backend del asistente conversacional
├── database/
│   └── schema.sql                # Script de creación de tablas y datos de prueba
├── Chat/                         # Interfaz moderna del Chatbot interactivo
│   ├── Main.html
│   ├── script.js
│   └── styles.css
├── Complementos/                 # Recursos estáticos y estilos
│   ├── Css/                      # Hojas de estilo (Login, Registro, Dashboard)
│   ├── imagenes/                 # Logotipos, fondos e iconografía oficial UTA
│   └── JavaScrip/                # Funciones interactivas del dashboard
└── Composter/Google/             # Módulo de integración Google API Client
    ├── Autentificacion.php
    └── Configuracion.php
```

---

## 💻 Tecnologías Utilizadas

- **Lenguaje Backend:** PHP 7.4 / 8.x
- **Base de Datos:** MySQL 5.7+ / MariaDB 10.4+
- **Frontend:** HTML5 semántico, CSS3 (Flexbox, estilos institucionales), JavaScript (ES6+)
- **Librerías y SDKs:**
  - `google/apiclient`: Integración con Google Identity Services y OAuth 2.0.
  - `adnanhussainturki/microsoft-api-php`: Integración con Microsoft Azure AD / Graph API.
  - `phpmailer/phpmailer`: Gestión y envío de correos de activación SMTP.

---

## 📋 Requisitos Previos

1. Servidor web local o productivo:
   - [XAMPP](https://www.apachefriends.org/), [WampServer](https://www.wampserver.com/), [Laragon](https://laragon.org/) o Apache/Nginx + PHP.
2. PHP >= 7.4 con extensiones habilitadas:
   - `mysqli`
   - `curl`
   - `json`
   - `mbstring`
3. [Composer](https://getcomposer.org/) instalado globalmente.
4. Servidor MySQL / MariaDB activo.

---

## ⚙️ Instalación y Configuración

### 1. Clonar el repositorio
```bash
git clone https://github.com/T1Angel4220/Plataforma-UTA.git
cd Plataforma-UTA
```

### 2. Configurar la Base de Datos
1. Inicie su servidor MySQL (ej. a través del panel de XAMPP).
2. Abra **phpMyAdmin** o su cliente MySQL preferido.
3. Importe el archivo localizado en `database/schema.sql` o ejecute:
```bash
mysql -u root -p < database/schema.sql
```
Este script creará la base de datos `plataforma_educativa` y las tablas necesarias con un registro de prueba.

### 3. Instalar Dependencias de Composer
```bash
composer install
```

### 4. Configurar Variables de Entorno
Cree una copia del archivo `.env.example` con el nombre `.env`:
```bash
cp .env.example .env
```
Edite `.env` con los parámetros de su entorno:
```ini
# Base de datos
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=plataforma_educativa

# Google OAuth 2.0 (Opcional para desarrollo local)
GOOGLE_CLIENT_ID=tu_cliente_id.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=tu_cliente_secret
GOOGLE_REDIRECT_URI=http://localhost/Plataforma-UTA/callback_google.php

# Microsoft 365 (Opcional para desarrollo local)
MS_TENANT_ID=common
MS_CLIENT_ID=tu_microsoft_client_id
MS_CLIENT_SECRET=tu_microsoft_client_secret
MS_REDIRECT_URI=http://localhost/Plataforma-UTA/callback.php
```

### 5. Ejecutar la Aplicación
Coloque la carpeta del proyecto dentro del directorio raíz de su servidor web (por ejemplo, `C:\xampp\htdocs\Plataforma-UTA`) y acceda desde su navegador:
```text
http://localhost/Plataforma-UTA/
```

> **Credenciales de prueba iniciales:**
> - **Usuario:** `docente.demo`
> - **Contraseña:** `Demo123*`
> - **Código de Activación Demo:** `123456`

---

## 🗄 Modelo de Base de Datos

El sistema utiliza las siguientes tablas principales:

### Tabla: `logindocente`
Almacena el perfil completo y el estado de activación de los docentes registrados.

| Campo | Tipo | Descripción |
|---|---|---|
| `id_Docente` | `INT(11)` | Identificador autonumérico (Clave Primaria) |
| `id_PrimerNombre` | `VARCHAR(50)` | Primer nombre del docente |
| `id_SegundoNombre` | `VARCHAR(50)` | Segundo nombre del docente |
| `id_PrimerApellido` | `VARCHAR(50)` | Primer apellido del docente |
| `id_SegundoApellido` | `VARCHAR(50)` | Segundo apellido del docente |
| `id_NumeroDocumento` | `VARCHAR(10)` | Número de cédula de 10 dígitos (Único) |
| `id_NombreUsuario` | `VARCHAR(50)` | Nombre de usuario para el inicio de sesión (Único) |
| `id_CorreoElectronico` | `VARCHAR(100)` | Correo electrónico de contacto/institucional (Único) |
| `id_Clave` | `VARCHAR(255)` | Contraseña del docente |
| `id_Verificacion` | `VARCHAR(100)` | Token único de verificación de cuenta |
| `id_Activo` | `TINYINT(1)` | Estado de activación (`0` inactivo, `1` activo) |
| `fecha_creacion` | `TIMESTAMP` | Marca temporal del registro |

---

## 🛡️ Seguridad y Buenas Prácticas

- **Cero Secretos en Repositorio:** El repositorio implementa un `.gitignore` estricto que previene la subida accidental de archivos `.env`, carpetas de dependencias (`vendor/`), archivos comprimidos (`.zip`, `.rar`) o documentos privados.
- **Variables de Entorno con Fallback:** Todas las credenciales sensibles (claves de BD, secretos de OAuth) se obtienen dinámicamente mediante `getenv()`.
- **Sanitización de Entradas:** Filtrado de entradas de formularios para mitigar vulnerabilidades comunes y control de tipos en JavaScript.

---