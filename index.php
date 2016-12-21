<?php
/*
Plugin Name: LoadCache
Plugin URI: http://www.popothemes.com/downloads/loadcache-plugin/
Description: Speed Cache is a wordpress plugin that improves the wordpress website performance by adding additional optimization like static cache or browser caching. 
Author: Sanyog Shelar
Author URI: http://www.sanyog.in/
Version: 1.0.0  
*/

require_once('lc-function.php');

/*================= Load Cache site .htaccess ===========*/
global $lc;
global $lc_link;
global $lc1;
global $lc2;
global $lc3;
global $lc4;
global $lc5;
global $lc6;

$lc_url = strtolower(get_bloginfo('url'));
$lc_url = str_replace('https://','',$lc_url);
$lc_url = str_replace('http://','',$lc_url);
$lc_url = str_replace('www.','',$lc_url);

$lc_link = "
#==== Load Cache Plugin Code Starts Here =======

RewriteEngine on
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?".$lc_url." [NC]
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?google.com [NC]
RewriteRule \.(jpg|jpeg|png|gif)$ - [NC,F,L]
 
";

	$lc1 .= '# GZIP '."\r\n"."\r\n";
	$lc1 .= '<IfModule mod_deflate.c>'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE text/plain'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE text/html'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE text/xml'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE text/css'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE text/javascript'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/xml'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/xhtml+xml'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/rss+xml'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/javascript'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-javascript'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-httpd-php'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-httpd-fastphp'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/vnd.ms-fontobject'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-font'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-font-opentype'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-font-otf'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-font-truetype'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE application/x-font-ttf'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE image/svg+xml'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE image/x-icon'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE font/opentype'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE font/otf'."\r\n";
	$lc1 .= 'AddOutputFilterByType DEFLATE font/ttf'."\r\n";
	$lc1 .= 'BrowserMatch ^Mozilla/4 gzip-only-text/html'."\r\n";
	$lc1 .= 'BrowserMatch ^Mozilla/4\.0[678] no-gzip'."\r\n";
	$lc1 .= 'BrowserMatch \bMSI[E] !no-gzip !gzip-only-text/html'."\r\n";
	$lc1 .= 'Header append Vary User-Agent env=!dont-vary'."\r\n";
	$lc1 .= '</IfModule>'."\r\n"."\r\n";

	$lc2 .= '# Leverage Browser Caching Start'."\r\n"."\r\n";
	$lc2 .= '<IfModule mod_expires.c>'."\r\n";
	$lc2 .= 'ExpiresActive On'."\r\n";
	$lc2 .= 'ExpiresByType image/jpg "access 1 year"'."\r\n";
	$lc2 .= 'ExpiresByType image/jpeg "access 1 year"'."\r\n";
	$lc2 .= 'ExpiresByType image/gif "access 1 year"'."\r\n";
	$lc2 .= 'ExpiresByType image/png "access 1 year"'."\r\n";
	$lc2 .= 'ExpiresByType text/css "access 1 month"'."\r\n";
	$lc2 .= 'ExpiresByType text/html "access 1 month"'."\r\n";
	$lc2 .= 'ExpiresByType application/pdf "access 1 month"'."\r\n";
	$lc2 .= 'ExpiresByType application/javascript "access plus 1 year"'."\r\n";
	$lc2 .= 'ExpiresByType text/x-javascript "access 1 month"'."\r\n";
	$lc2 .= 'ExpiresByType application/x-shockwave-flash "access 1 month"'."\r\n";
	$lc2 .= 'ExpiresByType image/x-icon "access 1 year"'."\r\n";
	$lc2 .= 'ExpiresDefault "access 1 month"'."\r\n";
	$lc2 .= '</IfModule>'."\r\n"."\r\n";
	
	$lc3 .= '# Caching of common files Start'."\r\n"."\r\n";
	$lc3 .= '<IfModule mod_headers.c>'."\r\n";
	$lc3 .= '<FilesMatch "\.(ico|pdf|flv|swf|js|css|gif|png|jpg|jpeg|ico|txt|html|htm)$">'."\r\n";
	$lc3 .= 'Header set Cache-Control "max-age=2592000, public"'."\r\n";
	$lc3 .= '</FilesMatch>'."\r\n";
	$lc3 .= '</IfModule>'."\r\n"."\r\n";

	$lc4 .= '# Enable Keepalive Start'."\r\n"."\r\n";
	$lc4 .= '<ifModule mod_headers.c>'."\r\n";
	$lc4 .= 'Header set Connection keep-alive'."\r\n";
	$lc4 .= '</ifModule>'."\r\n"."\r\n";
	
	$lc5 .= '# Use UTF-8 encoding Start'."\r\n"."\r\n";
	$lc5 .= 'AddDefaultCharset utf-8'."\r\n"."\r\n";
	
	$lc6 .= '# Enable Vary: Accept-Encoding Start'."\r\n"."\r\n";
	$lc6 .= '<IfModule mod_headers.c>'."\r\n";
	$lc6 .= '<FilesMatch "\.(js|css|xml|gz)$">'."\r\n";
	$lc6 .= 'Header append Vary: Accept-Encoding'."\r\n";
	$lc6 .= '</FilesMatch>'."\r\n";
	$lc6 .= '</IfModule>'."\r\n"."\r\n";

	$lc6 .= '# ==== Load Cache Plugin Code End Here ======='."\r\n"."\r\n";

	$lc = ABSPATH.'.htaccess';
/*=========== Load Cache Activate =================*/
	function lc_activate() {
		global $lc;
		global $lc_link;
		global $lc1;
		global $lc2;
		global $lc3;
		global $lc4;
		global $lc5;
		global $lc6;
	
		if (file_exists($lc)) {
			$ds = fopen($lc, 'r');
			$lc_access = fread($ds, filesize($lc));
			fclose($ds);
		}
		$ds = fopen($lc, 'w') or die("can't open file");
		fwrite($ds, $lc_access.$lc_link);
		fwrite($ds, $lc1);
		fwrite($ds, $lc2);
		fwrite($ds, $lc3);
		fwrite($ds, $lc4);
		fwrite($ds, $lc5);
		fwrite($ds, $lc6);
		fclose($ds);
	}
	register_activation_hook( __FILE__, 'lc_activate' );
 
/*========== speedup wp site Deactivate ============*/
	function lc_deactivate() {
		global $lc;
		global $lc_link;
		global $lc1;
		global $lc2;
		global $lc3;
		global $lc4;
		global $lc5;
		global $lc6;
	
		if (file_exists($lc)) {
			$ds = fopen($lc, 'r');
			$lc_access = fread($ds, filesize($lc));
			fclose($ds);
			$lc_access = str_replace($lc_link, "", $lc_access);
			$lc_access = str_replace($lc1, "",$lc_access);
			$lc_access = str_replace($lc2, "",$lc_access);
			$lc_access = str_replace($lc3, "",$lc_access);
			$lc_access = str_replace($lc4, "",$lc_access);
			$lc_access = str_replace($lc5, "",$lc_access);
			$lc_access = str_replace($lc6, "",$lc_access);
			$ds = fopen($lc, 'w') or die("can't open file");
			fwrite($ds, $lc_access);
			fclose($ds);
		}
	}
register_deactivation_hook( __FILE__, 'lc_deactivate' );