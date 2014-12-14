<?php
define("DB_NAME", "{{ wp_db_name }}");
define("DB_USER", "{{ wp_db_user }}");
define("DB_PASSWORD", "{{ wp_db_password }}");
define("DB_HOST", "localhost");
define("DB_CHARSET", "utf8");
define("DB_COLLATE", "");

{{ wp_salt.stdout }}

$table_prefix  = "{{ wp_table_prefix }}";

define("WPLANG", "{{ wp_lang }}");
define("WP_DEBUG", {{ wp_debug }});
define("WP_ENV", "{{ env }}");
define("CONCATENATE_SCRIPTS", false);

if (!defined("ABSPATH"))
  define("ABSPATH", dirname(__FILE__) . "/");

require_once(ABSPATH . "wp-settings.php");
