<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wordpress');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'qgk112358');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'dN}+[xnd9V(l5E;J/Mu]bE!ElYJlS|UV?@dbSxL&:e$~OPD$rkr]/plitzIf)!>9');
define('SECURE_AUTH_KEY',  '&kvob{^]dRc6s1sC(xb*of+9Q_6Sp n9M0+:@Tb[%IQ0uH>j#aNDjCx[M8 k@3+x');
define('LOGGED_IN_KEY',    'L]l2F($Rl+k%iZ0Drn|v1Ln> 2@YM_c}`XO-IBwXVb&Uf{{rqveF+jpA# eC m(D');
define('NONCE_KEY',        'bi-{GuEn5eUPniPO,;KXH#I#eB Zm|vtr@43@LR 1tb-T#mE9L#Ofv@>Z_;Xo ei');
define('AUTH_SALT',        ',;b;aX/|)*e$vG]|}}Q?lT=-ea3mCmM=w{q:%mj2:bAJjZ<^54wy6HKVdQ`Aakl&');
define('SECURE_AUTH_SALT', 'E?&01~=[{i Ab(ijfu%A!w^]8OcJ&-)R4x2+M85J}yN+V>@:p|7x^G-3Q9K<(@w^');
define('LOGGED_IN_SALT',   'kxxe!aq#-Rp6$GX0Til{e^{ptqEY/ bPw~L:*z|@z:)jA$OnmSQ2/OuVb}TF&kf|');
define('NONCE_SALT',       '{&3u@ f4VZcQfAG0@Hrp~<^L_IV!,ytycu&wk4kU1+H3YZ}+MiF-YhnA=xlc.9|D');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
