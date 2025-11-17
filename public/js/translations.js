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
        '🚗 Estacionamientos Disponibles': '🚗 Estacionamientos Disponibles',
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
        '🚗 Estacionamientos Disponibles': '🚗 Available Parking Lots',
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
        'Matrícula': 'License Plate',
        'Anterior': 'Previous',

        // ===== MY RESERVATIONS =====
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
    }
};

/**
 * Función para traducir el contenido HTML de la página
 */
function translatePageContent(targetLanguage) {
    const dict = translations[targetLanguage] || translations['es'];

    // Traducir todos los nodos de texto
    for (const element of document.querySelectorAll('*')) {
        // Evitar traducir ciertos elementos
        if (element.classList.contains('no-translate') ||
            element.tagName === 'SCRIPT' ||
            element.tagName === 'STYLE' ||
            element.tagName === 'CODE' ||
            element.tagName === 'PRE') {
            continue;
        }

        // Traducir cada nodo de texto dentro del elemento
        for (const node of element.childNodes) {
            if (node.nodeType === Node.TEXT_NODE) {
                let text = node.textContent.trim();

                if (text && dict[text]) {
                    node.textContent = dict[text];
                }
            }
        }

        // Traducir atributos title, placeholder, alt
        const titleAttr = element.getAttribute('title');
        if (titleAttr && dict[titleAttr]) {
            element.setAttribute('title', dict[titleAttr]);
        }

        const placeholderAttr = element.getAttribute('placeholder');
        if (placeholderAttr && dict[placeholderAttr]) {
            element.setAttribute('placeholder', dict[placeholderAttr]);
        }

        const altAttr = element.getAttribute('alt');
        if (altAttr && dict[altAttr]) {
            element.setAttribute('alt', dict[altAttr]);
        }
    }

    console.log('✓ Contenido traducido a:', targetLanguage);
}
