<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

//ob_clean();
if(!isset($_SESSION['siteblocked'])):

$senha = (isset($_POST['senha']))?$_POST['senha']:"";
if(trim($senha)=='conexo2021'){
	$_SESSION['siteblocked']="nomore";
	ob_clean();
	header("Location: ".$_SERVER['REQUEST_URI']);
	exit();	
}
?>
<script>
	window.onload = function(){
		document.forms[0].senha.focus();
	};
</script>
<style>
	html,body{ min-width:100%;min-height:100vh; margin:0px; padding:0px; }
	input{ border:1px solid #e9e9e9; border-radius:5px; background-color: #fff; padding: 10px; }

</style>

<table style='width:100%; height: 100vh;' >
	<tr>
		<td align="center" valign="middle" height="100%" >

			<div class="login">
				<img src="/wp-content/themes/Conexo/assets/images/logo.png" alt="" width='150' />
				<br><br>
				<form action="" method="post" >
					<input type="password" name="senha" />
				</form>
			</div>

		</td>
	</tr>
</table>

<?php

exit();
endif;

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'conexo' );
//define( 'DB_NAME', 'instituto_conexo_lp' );

// /** MySQL database username */
define( 'DB_USER', 'root' );
//define( 'DB_USER', 'inst_conexo' );
// * MySQL database password 
define( 'DB_PASSWORD', 'being' );
//define( 'DB_PASSWORD', '1c0n3x0XPF#' );

// /** MySQL hostname */
define( 'DB_HOST', 'localhost' );
//define( 'DB_HOST', 'mariadbbeing.chbspdsjqiyv.us-east-1.rds.amazonaws.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'OOGFsTLmlB_}l412j/?K<= P0 Wm$CF>l/@Q9&NEtger?BP>75=6?D{8ic3g94p0' );
define( 'SECURE_AUTH_KEY',  'dVU,5js9KKV|pCn_!<K]#M,sEs 2_p)tEa/GjyuV*%3q&Gw_85Ul]caj`dk:&Ky^' );
define( 'LOGGED_IN_KEY',    '~2UIv-wsu[P8hUKS}HK6=U`E@pR2Iv>WD6cu4ZMZ-F$)QadAua[y71c.W#vTAhWI' );
define( 'NONCE_KEY',        'RMxwsYv:<?N%d&=$GkE<n`}S}Ai4b=z7n&xK#n~9vq^H4)_2?${>(/=Ee7w,JSU+' );
define( 'AUTH_SALT',        'H.3icJ!@knN[4rup2UnF^f>)LG&z8Qa@9b)@W74L/)Q50%jey.L4FPoVJ7I&A64:' );
define( 'SECURE_AUTH_SALT', 'sF`x_QoXrE*N`?/K#d/]s;q7$;LzO#dF6ZV;zpTl[;%(>:(`%}75B;3>BL~MT?V2' );
define( 'LOGGED_IN_SALT',   'nv%Xroy1x]SMu!RW]r@n3NVdp]Ll<~OJ4L1#^z;s9L3^BM5en:9b2}dWT$,osw}W' );
define( 'NONCE_SALT',       '.Zv*j2E(M%2iPIom1<j$2~3/`J_tzI7}|LVKKhVI/8-YPj+,_v2(6#,X|+njb1TK' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'conexo_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
