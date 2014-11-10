<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'netwosp6_wo9431');

/** MySQL database username */
define('DB_USER', 'netwosp6_wo9431');

/** MySQL database password */
define('DB_PASSWORD', '1bqXUg3W8hW9');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'GV^]MggkLegb-!tMypvE]t@qbBUQ[u@ZlJIlu^/Psv({YlWEjqHd{bRt<Q!iReJplzXAj[[/z}Qq;H+>F=Gdl@l|l!&Sw_mRY]aaQHvg_G%]zYFqA;&DPI[kcx+a&$me');
define('SECURE_AUTH_KEY', 'Vd+i}Qe*</mJ!rkyn<kMTk?fo=;e;sbxOGN{=G^kGj$]}WyvN^yB>vf|CKvta^HS!%}CKeZvbvEUS]ibwcxD<)E;jljZXCl<^VS$Dx@Eo-hdqDufI{kOY^;Sl;%R|eD)');
define('LOGGED_IN_KEY', '%LI;bIk[U@W&[FnRwPlhsUo(R/mr({>$NPAFL=E@J!mY&hTJsKRSvavuiXwx;;abQK^D/XKrAgb/Y!(_wSUGwCGE-ZH[mCdNvyJw&UeN_Y[(HyrOp!AbG<iLUy|}BP(^');
define('NONCE_KEY', '(=*d=ZE$Tn-jM-D!bf-BhBy>Ni>-vFvzDNYwqRCuN)cTV@<Tkm}<Wd{nPqBWlv<K+IVl(ej[RZwB;C@QBTAVQPMUY?lM(fmj;}$_|f<PzlTV]_jlUDt*TK+OmSssI<//');
define('AUTH_SALT', 'ugO=K;m?j>?y{kSc-)/$C<o{iT>&-quypC?ixdY;KQCTJHNkWwc=ao/!koPck)(I>nLr]*!fn)dIV-yb[qRRq/P-MB^iKL$Ny)/do&L_p%bn{NKBO-_m+;G=kirQ[Zpa');
define('SECURE_AUTH_SALT', '()R*]P!YVa|!hk_dbLdrf[%&_Mr|Qp|>?l}cuJtlVCQH!tSQkguJ[MNj>*OVrTl$w!Vs@?l;ZO/qTdV|wHhJWldN{FsJp_FVfxEC}hhWRx>}hp<wo;jFxmTxg@>vHkeR');
define('LOGGED_IN_SALT', 'fay//Et{NJOrN<!}qqoZn@zbNddL<;y/AFmG-R|%(cMtkxIPLsW_gl-u{r|p(|K*JPwO;bLcgVSCR$J;l_&h&cwW^aPfKDsLrUtprJ@CyePLboxi+^sr$Kq^FGCASh&i');
define('NONCE_SALT', ']ZvR&u&&CO@inBuLF;&MTZWc<Z$Mct^Rwfdr$kA/]jBQZt}fk[ng*[GvM*x;[Hky+=/k;l)xq{*Lb=JZmUIzOuQS*{uV!-Iy&ra+myB|Vt$}&XUO%_iQ]mYGGcvND&xh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_aiqz_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

define('WP_HOME','http://dev.npp.com');
define('WP_SITEURL','http://dev.npp.com');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
