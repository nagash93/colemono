<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'colemono');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '2u}bqEd>sPy1QBl*/|zqA^(|lK^){|3n@My({:b1F^Lq`)fX]7vhmB;bXw41-?V<'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', '>%nXbaSLPx^*8,t&tK8%UAc,-lRl|MCy0/En$<8kyzi+s%;m~GgMSb_?V8Yg[!yv'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', '7)QEB}O3O69R+zI?sdfs<t_r,M]K!~=4_PvY8uyp4K17FGj|YUgD{=.0NfB1G8L;'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'KMA/Dyqg=I{P%[d>u_^n9 npa)yuY9vfpipfe4S:G:oSxJ()1?xA3;.#k}3M5)8+'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '%r+w]{.KQFklpNY h1A-qrpPCIG=_kctdjfrWj.OY(BU>rXt&~P#w3SUla^&NO7l'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '=Mi0!AOId4!rg%W`Pp!$j95G[w4!{DitxA~ORvS%nQJ_*l_nvk: ~RJbI$b^~{rc'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '/reqU_-,-? &Ar8]/_!;a@);w<$~zdC,JoVKxUZHd;`4BLCPad816SzV,;&,q?ID'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '9Kyq@UpW)N{;|PCx!xt` G+0H0{uEuwbgfOWhbvZ<akXPulQsfm_Y+ZxB2&EJ).='); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

