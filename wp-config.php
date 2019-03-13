<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+t(}5S*UlXa84p;{,M=aU~+%=&41E#`sA*PvH1AXWA?5Iv=fV;#,cF,ZWCZH!>.c');
define('SECURE_AUTH_KEY',  '#WR3.l9e6zK^4]-BZ(&*I7qhtLI+YQ>s<{#KA}lr4{eR4YrfEl+7naf]LJ)JR2_(');
define('LOGGED_IN_KEY',    'S^Z/`y.SByUHvL<{|v&ZRG1Nl}i/1R,-onUG[%}#Gg#{1=YR-/<f|BV9N5[f-:2d');
define('NONCE_KEY',        'y1sMKj~tKt</90gys2q1AmfRfysCA)cCx(NPyGnW^eFJW!zyAnNyb@~#?)vB}v<x');
define('AUTH_SALT',        ';6md{7OTlTUVRm0sTa/.l7`|OK<q?MhxhXf$/i4H9R{$Pvm3ivBY%[8=S[TlHI]b');
define('SECURE_AUTH_SALT', '[p~_Ooq;/[X!%7_Y}.iG6J5;`8W2c8%Aj_^1k!OT%$n#3,_[(`R6P>07eGEAuFki');
define('LOGGED_IN_SALT',   '<MO(5V|e(_;x#K.H]`/SJcSZ3Wniur/-F1$/Q+%moA5,<0QJ%@WFjOyn5V,8~El.');
define('NONCE_SALT',       'Wn=2}gS*H]0sdgK P03G|$,-zIG;ni9%AH!I9dH>1dgc-`A`8=_cw{5;K6Gw,*J5');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');