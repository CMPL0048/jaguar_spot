/**
 * Diccionario de traducciones del lado del cliente
 * Automáticamente traduce el contenido cuando se cambia el idioma
 */

const translations = {
    es: {
        // ===== NAVEGACIÓN =====
        'Inicio': 'Inicio',
        'Estacionamientos': 'Estacionamientos',
        'Puestos Reservados': 'Puestos Reservados',
        'Cerrar Sesión': 'Cerrar Sesión',
        'Iniciar Sesión': 'Iniciar Sesión',
        'Registrarse': 'Registrarse',
        'Ayuda': 'Ayuda',

        // ===== PÁGINA DE INICIO =====
        'Bienvenido a Jaguar Spot': 'Bienvenido a Jaguar Spot',
        'El estacionamiento de la UT Nayarit': 'El estacionamiento de la UT Nayarit',
        'Jaguar Spot te permitirá tener el control de tu estacionamiento dentro de la universidad, ¿qué esperas para estacionarte de manera efectiva?': 'Jaguar Spot te permitirá tener el control de tu estacionamiento dentro de la universidad, ¿qué esperas para estacionarte de manera efectiva?',
        'Comenzar a usar': 'Comenzar a usar',

        // ===== LISTA DE ESTACIONAMIENTOS =====
        '🚗 Estacionamientos Disponibles': '🚗 Estacionamientos Disponibles', // Legacy
        'Estacionamientos Disponibles': 'Estacionamientos Disponibles', // New clean key
        'Selecciona un Estacionamiento': 'Selecciona un Estacionamiento',
        'Capacidad:': 'Capacidad:',
        'espacios': 'espacios',
        'Estacionamiento Turismo': 'Estacionamiento Turismo',
        'Estacionamiento Gimnasio': 'Estacionamiento Gimnasio',
        'Estacionamiento Rectoría': 'Estacionamiento Rectoría',
        'Estacionamiento Vinculación': 'Estacionamiento Vinculación',

        // ===== DETALLE DE ESTACIONAMIENTO =====
        'Selecciona un Puesto': 'Selecciona un Puesto',

        // ===== LOGIN =====
        'Ingresa tus credenciales para acceder': 'Ingresa tus credenciales para acceder',
        'Nombre de Usuario': 'Nombre de Usuario',
        'Ingrese su usuario': 'Ingrese su usuario',
        'Contraseña': 'Contraseña',
        'Ingrese su contraseña': 'Ingrese su contraseña',
        '¿Aún no tienes cuenta? Regístrate aquí': '¿Aún no tienes cuenta? Regístrate aquí',
        '¿Ya tienes cuenta? Inicia sesión aquí': '¿Ya tienes cuenta? Inicia sesión aquí',
        'Ingresar': 'Ingresar',

        // ===== SIGNUP / REGISTRO =====
        'Información Personal': 'Información Personal',
        'Comencemos con tus datos básicos': 'Comencemos con tus datos básicos',
        'Nombre Completo': 'Nombre Completo',
        'Ej: Juan Pérez García': 'Ej: Juan Pérez García',
        'Ej: juanperez123': 'Ej: juanperez123',
        'Mínimo 4 caracteres, sin espacios': 'Mínimo 4 caracteres, sin espacios',
        'Tipo de Usuario': 'Tipo de Usuario',
        'Seleccione una opción': 'Seleccione una opción',
        'Alumno': 'Alumno',
        'Docente': 'Docente',
        'Discapacitado': 'Discapacitado',
        'Persona con Discapacidad': 'Persona con Discapacidad',
        'Invitado': 'Invitado',
        'Selecciona el tipo que mejor te describe': 'Selecciona el tipo que mejor te describe',
        'Identificador': 'Identificador',
        '¿También eres?': '¿También eres?',
        'Siguiente': 'Siguiente',
        'Credenciales de Acceso': 'Credenciales de Acceso',
        'Crea tu cuenta de forma segura': 'Crea tu cuenta de forma segura',
        'Correo Electrónico': 'Correo Electrónico',
        'ejemplo@correo.com': 'ejemplo@correo.com',
        'Mínimo 8 caracteres': 'Mínimo 8 caracteres',
        'Usa letras, números y símbolos para mayor seguridad': 'Usa letras, números y símbolos para mayor seguridad',
        'Confirmar Contraseña': 'Confirmar Contraseña',
        'Datos de Vehículos': 'Datos de Vehículos',
        'Agrega los vehículos que utilizarás': 'Agrega los vehículos que utilizarás',
        'Marca del Vehículo': 'Marca del Vehículo',
        'Matrícula': 'Matrícula',
        'Anterior': 'Anterior',
        'Información de Vehículos': 'Información de Vehículos',
        'Registra los vehículos que usarás en el estacionamiento': 'Registra los vehículos que usarás en el estacionamiento',
        'Agregar Vehículo': 'Agregar Vehículo',

        // ===== TEXTOS ADICIONALES FORMULARIOS =====
        'Datos de tu vehículo': 'Datos de tu vehículo',
        'Agregar vehículo': 'Agregar vehículo',
        'Paso 1 de 3': 'Paso 1 de 3',
        'Paso 2 de 3': 'Paso 2 de 3',
        'Paso 3 de 3': 'Paso 3 de 3',
        'Este campo es requerido': 'Este campo es requerido',
        'El nombre de usuario debe tener al menos 4 caracteres': 'El nombre de usuario debe tener al menos 4 caracteres',
        'Ingrese un correo electrónico válido': 'Ingrese un correo electrónico válido',
        'La contraseña debe tener al menos 8 caracteres': 'La contraseña debe tener al menos 8 caracteres',
        'Las contraseñas no coinciden': 'Las contraseñas no coinciden',
        'Contraseña débil': 'Contraseña débil',
        'Contraseña media': 'Contraseña media',
        '¡Contraseña fuerte!': '¡Contraseña fuerte!',

        // Nombres de Estacionamientos
        'Estacionamiento Turismo': 'Estacionamiento Turismo',
        'Estacionamiento Gimnasio': 'Estacionamiento Gimnasio',
        'Estacionamiento Rectoría': 'Estacionamiento Rectoría',
        'Estacionamiento Vinculación': 'Estacionamiento Vinculación',
        'Tus Vehículos': 'Tus Vehículos',
        'Ej: Toyota': 'Ej: Toyota',
        'Ej: Corolla': 'Ej: Corolla',
        'Ej: Blanco': 'Ej: Blanco',
        'Ej: ABC-123': 'Ej: ABC-123',

        // ===== SECCIÓN ADICIONAL VEHÍCULOS =====
        'Vehículos': 'Vehículos',
        'Vehículos 1': 'Vehículos 1',
        'Vehículos 2': 'Vehículos 2',
        'Vehículos 3': 'Vehículos 3',
        'Eliminar': 'Eliminar',
        'Marca': 'Marca',
        'Modelo': 'Modelo',
        'Color': 'Color',
        'Placas': 'Placas',
        'Año': 'Año',
        'Tipo': 'Tipo',
        'Auto': 'Auto',
        'Moto': 'Moto',
        'Camión': 'Camión',
        'Seleccione una opción': 'Seleccione una opción',

        // ===== INDICADORES DE PASOS =====
        'Datos personales': 'Datos personales',
        'Credenciales': 'Credenciales',
        'Vehículos': 'Vehículos',
        'Paso': 'Paso',

        // ===== NOMBRES DE ESTACIONAMIENTOS =====
        'Estacionamiento Turismo': 'Estacionamiento Turismo',
        'Estacionamiento Gimnasio': 'Estacionamiento Gimnasio',
        'Estacionamiento Rectoría': 'Estacionamiento Rectoría',
        'Estacionamiento Rectoria': 'Estacionamiento Rectoría', // Variante sin tilde
        'Estacionamiento Vinculación': 'Estacionamiento Vinculación',
        'Estacionamiento Vinculacion': 'Estacionamiento Vinculación', // Variante sin tilde
        'Selecciona un Puesto': 'Selecciona un Puesto',

        // ===== PANEL ADMIN =====
        'Panel de Administración': 'Panel de Administración',
        'Reservas Pendientes': 'Reservas Pendientes',
        'Puestos Ocupados': 'Puestos Ocupados',

        // ===== MIS RESERVAS =====
        '📌 Mis Reservas': '📌 Mis Reservas',
        'No tienes reservas activas en este momento.': 'No tienes reservas activas en este momento.',
        'Puesto:': 'Puesto:',
        'Puesto para Discapacitados': 'Puesto para Discapacitados',
        'Puesto Normal': 'Puesto Normal',
        'Solicitado:': 'Solicitado:',
        'Aceptado:': 'Aceptado:',
        'Ver QR': 'Ver QR',
        'Tu reserva ha sido rechazada.': 'Tu reserva ha sido rechazada.',
        'Pendiente': 'Pendiente',
        'Aceptada': 'Aceptada',
        'Rechazada': 'Rechazada',
        'aceptado': 'aceptado',
        'pendiente': 'pendiente',
        'rechazado': 'rechazado',
        'Solicitado': 'Solicitado', // Sin dos puntos
        'Aprobado': 'Aprobado', // Sin dos puntos
        'Ver código QR': 'Ver código QR',
        'Puesto': 'Puesto', // Sin dos puntos
        'Mis Reservas': 'Mis Reservas', // Sin emoji para coincidir con el HTML
        'Reserva aprobada con éxito.': 'Reserva aprobada con éxito.',
        'Reserva rechazada y puesto liberado.': 'Reserva rechazada y puesto liberado.',
        'Puesto liberado y reserva eliminada con éxito.': 'Puesto liberado y reserva eliminada con éxito.',
        'Debes iniciar sesión para reservar un puesto.': 'Debes iniciar sesión para reservar un puesto.',
        'Este puesto ya está ocupado o en espera de aprobación.': 'Este puesto ya está ocupado o en espera de aprobación.',
        'Puesto reservado con éxito. Verifica en tu lista de reservas.': 'Puesto reservado con éxito. Verifica en tu lista de reservas.',
        'Reserva aprobada y puesto marcado como aceptado.': 'Reserva aprobada y puesto marcado como aceptado.',
        'Registro exitoso. Ahora puedes iniciar sesión.': 'Registro exitoso. Ahora puedes iniciar sesión.',

        // ===== ADMIN =====
        'Admin Dashboard': 'Admin Dashboard',
        'Cargando datos...': 'Cargando datos...',
        '🚧 Reservas Pendientes': '🚧 Reservas Pendientes',
        'No hay reservas pendientes en este momento.': 'No hay reservas pendientes en este momento.',
        '✅ Puestos Ocupados': '✅ Puestos Ocupados',
        'No hay puestos ocupados en este momento.': 'No hay puestos ocupados en este momento.',
        'Usuario:': 'Usuario:',

        // ===== MENSAJES GENERALES =====
        'Error': 'Error',
        'Éxito': 'Éxito',
        'Aceptar': 'Aceptar',
        'Cancelar': 'Cancelar',
        'Guardar': 'Guardar',
        'Eliminar': 'Eliminar',
        'Editar': 'Editar',
        'Volver': 'Volver',
        'Cargando...': 'Cargando...',
        'Credenciales incorrectas': 'Credenciales incorrectas',
        'Inicio de sesión exitoso': 'Inicio de sesión exitoso',
        'Has cerrado sesión': 'Has cerrado sesión',
        'Registro completado': 'Registro completado',
        'Reserva aprobada': 'Reserva aprobada',
        'Reserva rechazada': 'Reserva rechazada',
        'Puesto liberado': 'Puesto liberado',
        'Error al reservar': 'Error al reservar',
        'Usuario no encontrado': 'Usuario no encontrado',
        'Contraseña incorrecta': 'Contraseña incorrecta',
        'Oops...': 'Oops...',
        'Algo salió mal': 'Algo salió mal',
        'Bienvenido al panel de administración': 'Bienvenido al panel de administración',
        'Sesión cerrada correctamente': 'Sesión cerrada correctamente',
        'Ingrese su matrícula': 'Ingrese su matrícula',
        'Ingrese su clave de trabajador': 'Ingrese su clave de trabajador',
        'Ingrese su CURP': 'Ingrese su CURP',
        'Atención': 'Atención',
        'Por favor, completa el campo': 'Por favor, completa el campo',
        'Favor de rellenar los campos solicitados': 'Favor de rellenar los campos solicitados',

        // ===== LEYENDA DE COLORES =====
        'Glosario': 'Glosario',
        'Pendiente de Aprobación': 'Pendiente de Aprobación',
    },
    en: {
        // ===== NAVIGATION =====
        'Inicio': 'Home',
        'Estacionamientos': 'Parking Lots',
        'Puestos Reservados': 'Reserved Spaces',
        'Cerrar Sesión': 'Sign Out',
        'Iniciar Sesión': 'Sign In',
        'Registrarse': 'Register',
        'Ayuda': 'Help',

        // ===== HOME PAGE =====
        'Bienvenido a Jaguar Spot': 'Welcome to Jaguar Spot',
        'El estacionamiento de la UT Nayarit': 'UT Nayarit Parking',
        'Jaguar Spot te permitirá tener el control de tu estacionamiento dentro de la universidad, ¿qué esperas para estacionarte de manera efectiva?': 'Jaguar Spot will give you control over your parking within the university. What are you waiting for to park effectively?',
        'Comenzar a usar': 'Get Started',

        // ===== PARKING LOTS LIST =====
        '🚗 Estacionamientos Disponibles': '🚗 Available Parking Lots', // Legacy
        'Estacionamientos Disponibles': 'Available Parking Lots', // New clean key
        'Selecciona un Estacionamiento': 'Select a Parking Lot',
        'Capacidad:': 'Capacity:',
        'espacios': 'spaces',
        'Estacionamiento Turismo': 'Tourism Parking',
        'Estacionamiento Gimnasio': 'Gym Parking',
        'Estacionamiento Rectoría': 'Rectory Parking',
        'Estacionamiento Vinculación': 'Linkage Parking',

        // ===== PARKING DETAILS =====
        'Selecciona un Puesto': 'Select a Space',

        // ===== LOGIN =====
        'Ingresa tus credenciales para acceder': 'Enter your credentials to access',
        'Nombre de Usuario': 'Username',
        'Ingrese su usuario': 'Enter your username',
        'Contraseña': 'Password',
        'Ingrese su contraseña': 'Enter your password',
        '¿Aún no tienes cuenta? Regístrate aquí': 'Don\'t have an account? Register here',
        '¿Ya tienes cuenta? Inicia sesión aquí': 'Already have an account? Sign in here',
        'Ingresar': 'Login',

        // ===== SIGNUP / REGISTER =====
        'Información Personal': 'Personal Information',
        'Comencemos con tus datos básicos': 'Let\'s start with your basic information',
        'Nombre Completo': 'Full Name',
        'Ej: Juan Pérez García': 'Ex: Juan Pérez García',
        'Ej: juanperez123': 'Ex: juanperez123',
        'Mínimo 4 caracteres, sin espacios': 'Minimum 4 characters, no spaces',
        'Tipo de Usuario': 'User Type',
        'Seleccione una opción': 'Select an option',
        'Alumno': 'Student',
        'Docente': 'Teacher',
        'Discapacitado': 'Disabled',
        'Persona con Discapacidad': 'Person with Disability',
        'Invitado': 'Guest',
        'Selecciona el tipo que mejor te describe': 'Select the type that best describes you',
        'Identificador': 'Identifier',
        '¿También eres?': 'Are you also?',
        'Siguiente': 'Next',
        'Credenciales de Acceso': 'Access Credentials',
        'Crea tu cuenta de forma segura': 'Create your account securely',
        'Correo Electrónico': 'Email Address',
        'ejemplo@correo.com': 'example@email.com',
        'Mínimo 8 caracteres': 'Minimum 8 characters',
        'Usa letras, números y símbolos para mayor seguridad': 'Use letters, numbers and symbols for greater security',
        'Confirmar Contraseña': 'Confirm Password',
        'Datos de Vehículos': 'Vehicle Data',
        'Agrega los vehículos que utilizarás': 'Add the vehicles you will use',
        'Marca del Vehículo': 'Vehicle Brand',
        'Matrícula': 'Driver´s ID',
        'Anterior': 'Previous',
        'Información de Vehículos': 'Vehicle Information',
        'Registra los vehículos que usarás en el estacionamiento': 'Register the vehicles you will use in the parking lot',
        'Agregar Vehículo': 'Add Vehicle',

        // ===== TEXTOS ADICIONALES FORMULARIOS =====
        'Datos de tu vehículo': 'Your vehicle information',
        'Agregar vehículo': 'Add Vehicle',
        'Paso 1 de 3': 'Step 1 of 3',
        'Paso 2 de 3': 'Step 2 of 3',
        'Paso 3 de 3': 'Step 3 of 3',
        'Este campo es requerido': 'This field is required',
        'El nombre de usuario debe tener al menos 4 caracteres': 'Username must be at least 4 characters',
        'Ingrese un correo electrónico válido': 'Enter a valid email address',
        'La contraseña debe tener al menos 8 caracteres': 'Password must be at least 8 characters',
        'Las contraseñas no coinciden': 'Passwords do not match',
        'Contraseña débil': 'Weak password',
        'Contraseña media': 'Medium password',
        '¡Contraseña fuerte!': 'Strong password!',

        // Parking Lot Names
        'Estacionamiento Turismo': 'Tourism Parking',
        'Estacionamiento Gimnasio': 'Gymnasium Parking',
        'Estacionamiento Rectoría': 'Rectory Parking',
        'Estacionamiento Rectoria': 'Rectory Parking',
        'Estacionamiento Vinculación': 'Linkage Parking',
        'Estacionamiento Vinculacion': 'Linkage Parking',
        'Tus Vehículos': 'Your Vehicles',
        'Ej: Toyota': 'Ex: Toyota',
        'Ej: Corolla': 'Ex: Corolla',
        'Ej: Blanco': 'Ex: White',
        'Ej: ABC-123': 'Ex: ABC-123',

        // ===== SECCIÓN ADICIONAL VEHÍCULOS =====
        'Vehículos': 'Vehicles',
        'Vehículos 1': 'Vehicles 1',
        'Vehículos 2': 'Vehicles 2',
        'Vehículos 3': 'Vehicles 3',
        'Eliminar': 'Delete',
        'Marca': 'Brand',
        'Modelo': 'Model',
        'Color': 'Color',
        'Placas': 'License Plate',
        'Año': 'Year',
        'Tipo': 'Type',
        'Auto': 'Car',
        'Moto': 'Motorcycle',
        'Camión': 'Truck',
        'Seleccione una opción': 'Select an option',

        // ===== INDICADORES DE PASOS =====
        'Datos personales': 'Personal Information',
        'Credenciales': 'Credentials',
        'Vehículos': 'Vehicles',
        'Paso': 'Step',

        // ===== NOMBRES DE ESTACIONAMIENTOS =====
        'Estacionamiento Turismo': 'Tourism Parking',
        'Estacionamiento Gimnasio': 'Gymnasium Parking',
        'Estacionamiento Rectoría': 'Rectory Parking',
        'Estacionamiento Rectoria': 'Rectory Parking',
        'Estacionamiento Vinculación': 'Linkage Parking',
        'Estacionamiento Vinculacion': 'Linkage Parking',
        'Selecciona un Puesto': 'Select a Space',

        // ===== PANEL ADMIN =====
        'Panel de Administración': 'Administration Panel',
        'Reservas Pendientes': 'Pending Reservations',
        'Puestos Ocupados': 'Occupied Spaces',

        // ===== MIS RESERVAS =====
        '📌 Mis Reservas': '📌 My Reservations',
        'No tienes reservas activas en este momento.': 'You have no active reservations at this moment.',
        'Puesto:': 'Space:',
        'Puesto para Discapacitados': 'Disabled Space',
        'Puesto Normal': 'Normal Space',
        'Solicitado:': 'Requested:',
        'Aceptado:': 'Accepted:',
        'Ver QR': 'View QR',
        'Tu reserva ha sido rechazada.': 'Your reservation has been rejected.',
        'Pendiente': 'Pending',
        'Aceptada': 'Accepted',
        'Rechazada': 'Rejected',
        'aceptado': 'accepted',
        'pendiente': 'pending',
        'rechazado': 'rejected',
        'Solicitado': 'Requested',
        'Aprobado': 'Approved',
        'Ver código QR': 'View QR code',
        'Puesto': 'Space',
        'Mis Reservas': 'My Reservations',
        'Reserva aprobada con éxito.': 'Reservation approved successfully.',
        'Reserva rechazada y puesto liberado.': 'Reservation rejected and spot released.',
        'Puesto liberado y reserva eliminada con éxito.': 'Spot released and reservation deleted successfully.',
        'Debes iniciar sesión para reservar un puesto.': 'You must log in to reserve a spot.',
        'Este puesto ya está ocupado o en espera de aprobación.': 'This spot is already occupied or awaiting approval.',
        'Puesto reservado con éxito. Verifica en tu lista de reservas.': 'Spot reserved successfully. Check your reservations list.',
        'Reserva aprobada y puesto marcado como aceptado.': 'Reservation approved and spot marked as accepted.',
        'Registro exitoso. Ahora puedes iniciar sesión.': 'Registration successful. You can now log in.',

        // ===== MISSING KEYS ADDED =====
        'Cargando': 'Loading',
        'Usuario': 'User',
        'Verificación de QR': 'QR Verification',
        'Estado': 'Status',
        'Hora de Solicitud': 'Request Time',
        'Aprobar Reserva': 'Approve Reservation',
        'Rechazar Reserva': 'Reject Reservation',
        'Código QR no encontrado': 'QR Code not found',
        '¿Aún no tienes cuenta?': 'Don\'t have an account?',
        'Regístrate aquí': 'Register here',
        'Por favor ingresa tu nombre completo': 'Please enter your full name',
        'El usuario debe tener al menos 4 caracteres': 'Username must be at least 4 characters',
        'Este campo es obligatorio': 'This field is mandatory',
        'Repite tu contraseña': 'Repeat your password',
        '¿Ya tienes cuenta?': 'Already have an account?',
        'Inicia sesión aquí': 'Login here',
        'Clave de Trabajador': 'Worker ID',
        'CURP': 'CURP',
        'Motocicleta': 'Motorcycle',
        'Camioneta': 'Pickup Truck',
        'No tienes reservas activas.': 'You have no active reservations.',
        'Ingrese su matrícula': 'Enter your driver\'s ID',
        'Ingrese su clave de trabajador': 'Enter your worker ID',
        'Ingrese su CURP': 'Enter your CURP',
        'Atención': 'Attention',
        'Por favor, completa el campo': 'Please complete the field',
        'Favor de rellenar los campos solicitados': 'Please fill in the requested fields',

        // ===== LEYENDA DE COLORES =====
        'Glosario': 'Legend',
        'Pendiente de Aprobación': 'Pending Approval',

        // ===== ADMIN =====
        'Admin Dashboard': 'Admin Dashboard',
        'Cargando datos...': 'Loading data...',
        '🚧 Reservas Pendientes': '🚧 Pending Reservations',
        'No hay reservas pendientes en este momento.': 'No pending reservations at this moment.',
        '✅ Puestos Ocupados': '✅ Occupied Spaces',
        'No hay puestos ocupados en este momento.': 'No occupied spaces at this moment.',
        'Usuario:': 'User:',

        // ===== GENERAL MESSAGES =====
        'Error': 'Error',
        'Éxito': 'Success',
        'Aceptar': 'Accept',
        'Cancelar': 'Cancel',
        'Guardar': 'Save',
        'Eliminar': 'Delete',
        'Editar': 'Edit',
        'Volver': 'Back',
        'Cargando...': 'Loading...',
        'Credenciales incorrectas': 'Incorrect credentials',
        'Inicio de sesión exitoso': 'Login successful',
        'Has cerrado sesión': 'You have logged out',
        'Registro completado': 'Registration completed',
        'Reserva aprobada': 'Reservation approved',
        'Reserva rechazada': 'Reservation rejected',
        'Puesto liberado': 'Spot released',
        'Error al reservar': 'Error reserving',
        'Usuario no encontrado': 'User not found',
        'Contraseña incorrecta': 'Incorrect password',
        'Oops...': 'Oops...',
        'Algo salió mal': 'Something went wrong',
        'Bienvenido al panel de administración': 'Welcome to the administration panel',
        'Sesión cerrada correctamente': 'Session closed successfully',
    }
};

/**
 * Función para traducir el contenido HTML de la página
 * Usa atributos data-i18n para una traducción precisa y eficiente
 */
function translatePageContent(lang) {
    const dict = translations[lang] || translations['es'];

    // 1. Traducir elementos con data-i18n
    const i18nElements = document.querySelectorAll('[data-i18n]');
    for (const element of i18nElements) {
        const key = element.dataset.i18n;
        if (dict[key]) {
            // Si es un input, traducir placeholder
            if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                element.placeholder = dict[key];
            } else if (element.tagName === 'OPTION') {
                element.textContent = dict[key];
            } else {
                // Mantener HTML interno si es necesario (para iconos, etc)
                // Si tiene data-i18n-html="true", usar innerHTML, si no textContent
                if (element.dataset.i18nHtml === 'true') {
                    element.innerHTML = dict[key];
                } else {
                    element.textContent = dict[key];
                }
            }
        }
    }

    // 2. Traducir atributos específicos (alt, title, aria-label)
    const altElements = document.querySelectorAll('[data-i18n-alt]');
    for (const element of altElements) {
        const key = element.dataset.i18nAlt;
        if (dict[key]) element.alt = dict[key];
    }

    const titleElements = document.querySelectorAll('[data-i18n-title]');
    for (const element of titleElements) {
        const key = element.dataset.i18nTitle;
        if (dict[key]) element.title = dict[key];
    }

    const ariaLabelElements = document.querySelectorAll('[data-i18n-aria-label]');
    for (const element of ariaLabelElements) {
        const key = element.dataset.i18nAriaLabel;
        if (dict[key]) element.setAttribute('aria-label', dict[key]);
    }

    console.log(`✓ Página traducida a: ${lang}`);
}

// Exponer funciones globalmente
globalThis.translatePageContent = translatePageContent;
globalThis.translations = translations;

// Inicializar traducción al cargar
document.addEventListener('DOMContentLoaded', () => {
    const savedLang = localStorage.getItem('app_language') || 'es';
    if (savedLang !== 'es') {
        translatePageContent(savedLang);
    }
});
