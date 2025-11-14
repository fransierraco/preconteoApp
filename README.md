# 🗳️ Sistema de Preconteo Electoral  
Aplicación web desarrollada con **Laravel 12** y **Filament v4**, diseñada para gestionar de manera ágil, segura y estructurada los procesos de **preconteo electoral** a nivel territorial. Incluye administración completa del territorio, corporaciones, candidatos, testigos, capturas E14 y un dashboard con métricas y reportes.

---

## 📌 Objetivo del Sistema  
Ofrecer una plataforma intuitiva y moderna para la **captura, consulta y administración de resultados preliminares** en procesos electorales.  
El sistema prioriza:

- Usabilidad y claridad visual  
- Flujo de captura guiado (wizard)  
- Visualización de métricas y gráficos  
- Jerarquía territorial completa  
- Seguridad y coherencia en la entrada de datos

---

# 🚀 Tecnologías Utilizadas
- **PHP 8.1+**
- **Laravel 12**
- **Filament v4** (Panel administrativo)
- **MySQL/MariaDB 5.7+**
- **Node.js + NPM**
- Librerías de UI simples para mock de gráficas

---

# 🧩 Arquitectura Funcional

La base de datos `preconteo` contiene las siguientes entidades principales:

### **Territorio**
- **Departamentos**
- **Municipios**
- **Zonas**
- **Puestos**
- **Mesas**

### **Actores y Resultados**
- **Corporaciones**
- **Candidatos**
- **Testigos**
- **Testigo_E14s** (asignación de testigos a mesas)
- **E14s** (captura de votos)

### **Relaciones clave**
- Departamento → Municipios → Zonas → Puestos → Mesas → E14  
- Corporaciones → Candidatos → E14  
- Testigos ↔ E14  

---

# 🖥️ Interfaz Gráfica (UI / UX)

La aplicación usa un **diseño de dashboard moderno**, pensado para uso en escritorio y tablets.

## **Layout Principal**
### 🧭 Topbar
- Logo o texto: **Preconteo Electoral**
- Nombre de la elección (ej. “Elecciones Congreso 2026”)
- Selector rápido de **Corporación**
- Menú de usuario (Perfil / Configuración / Salir)

### 📚 Sidebar (menú lateral)
1. Dashboard  
2. Territorio  
   - Departamentos  
   - Municipios  
   - Zonas  
   - Puestos  
   - Mesas  
3. Corporaciones y Candidatos  
4. Testigos  
5. Captura de Resultados (E14)  
6. Consultas y Reportes  

### 🧩 Componentes UI incluidos
- Tablas ordenables y paginadas  
- Formularios validados  
- Tarjetas de métricas  
- Gráficos simples (mock)  
- Estados de carga y error  
- CRUD completo para todas las entidades  

---

# 📊 Módulos del Sistema

## **1) Dashboard Principal**
Incluye:
- Tarjetas de resumen:  
  - Mesas totales  
  - Mesas informadas  
  - Mesas en reconteo  
  - Total de votos (según corporación)
- Filtros globales en cascada  
- Gráfico de votos por candidato  
- Tabla comparativa por corporación  
- Barra de progreso de preconteo  

---

## **2) Módulo Territorio**
CRUD completo para:
- Departamentos  
- Municipios  
- Zonas  
- Puestos  
- Mesas  

Cada página incluye:
- Tabla paginada  
- Buscador  
- Formularios validados  
- Acciones: Ver / Editar / Eliminar  

---

## **3) Corporaciones y Candidatos**
### Corporaciones
- Tabla: ID, Nombre  
- Formulario simple de creación/edición

### Candidatos
- Filtro por corporación  
- Tabla: ID, nombre, corporación  
- CRUD completo  

---

## **4) Testigos**
### Gestión de Testigos
- Tabla con buscador  
- CRUD simple

### Asignación Testigos–E14
- Filtros territoriales  
- Selección de mesa  
- Listado de E14 disponibles  
- Multi-select para asignar testigos  

---

## **5) Captura de Resultados (E14)**
Flujo **tipo asistente (wizard)**:

### **Paso 1: Selección Territorial**
Selects en cascada: Depto → Municipio → Zona → Puesto → Mesa

### **Paso 2: Acta**
- Selección de corporación  
- Bandera de “¿Es reconteo?”  
- Generación de ID de acta (simulada)

### **Paso 3: Captura**
- Tabla editable por candidato  
- Validación de números ≥ 0  
- Totalizador automático  

### **Paso 4: Confirmación**
- Resumen del acta  
- Opción de volver a editar  
- Botón “Guardar Preconteo” (mock)

### Gestión de E14
- Página independiente  
- Filtros territoriales y por corporación  
- Tabla plana con todos los registros  

---

## **6) Consultas y Reportes**
Incluye:
- Filtros completos de territorio  
- Selección de corporación  
- Tipo de acta: Preconteo / Reconteo / Ambos

### Pestañas de visualización:
#### 📌 Resumen por candidato
- Tabla con:  
  - Candidato  
  - Corporación  
  - Total votos  
  - % sobre total  

#### 📌 Resumen por mesa
- Tabla de mesas con totales  
- Opción de expandir para ver detalle por candidato  

Incluye gráficos simples generados con mock data.

---

# 🏗️ Instalación y Configuración

## 1. Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/preconteo-electoral.git
cd preconteo-electoral
```
## 2. Instalar dependencias de PHP
```bash
composer install
``` 
## 3. Instalar dependencias frontend
```bash
npm install
```
## 4. Configurar el archivo .env
```bash
cp .env.example .env
php artisan key:generate
```
```
Configura las variables de entorno, especialmente la conexión a la base de datos.

DB_DATABASE=preconteo
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```
## 5. Ejecutar migraciones
```bash
php artisan migrate
```
## 6. Compilar assets frontend
```bash
npm run dev
```
## 🤝 Contribuir

```
Los PRs son bienvenidos.
Por favor:

Usa commits descriptivos

Realiza PRs pequeños y enfocados

Sigue estándares de Laravel/Filament
```

## Licencia
```
Copyright (c) 2024.

```
