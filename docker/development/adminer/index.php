<?php
namespace docker {
function adminer_object() {
    require_once('plugins/plugin.php');

    class Adminer extends \AdminerPlugin {
        function _callParent($function, $args) {
            if ($function === 'loginForm') {
                ob_start();
                $return = \Adminer::loginForm();
                $form = ob_get_clean();

                echo str_replace('name="auth[server]" value="" title="hostname[:port]"', 'name="auth[server]" value="db" title="hostname[:port]"', $form);

                return $return;
            }

            return parent::_callParent($function, $args);
        }

        // Переопределяем форму логина и подставляем необходимые значения
        function loginForm() {
            global $drivers;
            ?>
                <table cellspacing="0">
                    <tr><th><?php echo lang('System'); ?><td><select name="auth[driver]"><option value="server" >MySQL</option><option value="sqlite">SQLite 3</option><option value="sqlite2">SQLite 2</option><option value="pgsql" selected="">PostgreSQL</option><option value="oracle">Oracle</option><option value="mssql">MS SQL</option><option value="firebird">Firebird (alpha)</option><option value="simpledb">SimpleDB</option><option value="mongo">MongoDB (beta)</option><option value="elastic">Elasticsearch (beta)</option></select>
                    <tr><th><?php echo lang('Server'); ?><td><input name="auth[server]" value="sprut-devdb:9331" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
                    <tr><th><?php echo lang('Username'); ?><td><input name="auth[username]" id="username" value="db_user" autocapitalize="off">
                    <tr><th><?php echo lang('Password'); ?><td><input type="password" name="auth[password]" value="db_password">
                    <tr><th><?php echo lang('Database'); ?><td><input name="auth[db]" value="db_database" autocapitalize="off">
                </table>
                <script type="text/javascript">
                    focus(document.getElementById('username'));
                </script>
            <?php
                echo "<p><input type='submit' value='" . lang('Login') . "'>\n";
                echo checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang('Permanent login')) . "\n";
        }


    }

    $plugins = [];
    foreach (glob('plugins-enabled/*.php') as $plugin) {
        $plugins[] = require($plugin);
    }

    return new Adminer($plugins);
    }
}

namespace {
    if (basename($_SERVER['REQUEST_URI']) === 'adminer.css' && 
is_readable('adminer.css')) {
    header('Content-Type: text/css');
    readfile('adminer.css');
    exit;
}

function adminer_object() {
    return \docker\adminer_object();
}

    require('adminer.php');
}
