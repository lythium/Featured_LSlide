<?php
class Initialise_LSlide
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'save_settings'));
        // add_action('admin_init', array($this, 'register_settings'));
    }

    public static function install()
    {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}LSlide_Config (LSlide_id INT AUTO_INCREMENT PRIMARY KEY, LSlide_Name varchar(255) NOT NULL, LSlide_Settings varchar(255) NOT NULL);");
    }

    public static function uninstall()
    {
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}LSlide_Config;");
    }

    public function save_settings()
    {
        global $wpdb;
        if (isset($_POST['buttonSubmit']) && !empty($_POST['buttonSubmit'])) {
            if ($_POST['buttonSubmit'] === "add") {
                if (isset($_POST['add_name']) && !empty($_POST['add_name'])) {
                    $LSlide_name = $_POST['add_name'];
                    $LSlide_Settings = $_POST['add_number'];
                    $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}LSlide_Config WHERE LSlide_Name = '$LSlide_name'");
                    if (is_null($row)) {
                        $wpdb->insert(
                            "{$wpdb->prefix}LSlide_Config",
                            array(
                                'LSlide_Name' => $LSlide_name,
                                'LSlide_Settings' => $LSlide_Settings,
                            )
                        );
                        wp_redirect( admin_url('admin.php?page=LSlide&success=1') );
                    } else {
                        wp_redirect( admin_url('admin.php?page=LSlide&error=2') );
                    };
                } else {
                    wp_redirect( admin_url('admin.php?page=LSlide&error=1') );
                };
            };
        } elseif (isset($_POST['buttonUpdate']) && !empty($_POST['buttonUpdate'])) {
            if ($_POST['buttonUpdate'] === "update") {
                if (isset($_POST['update_name']) && !empty($_POST['update_name'])) {
                    global $swpdb;
                    $id_update = $_POST["update_id"];
                    $name_update = $_POST['update_name'];
                    $settings_update = $_POST['update_number'];
                    $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}LSlide_Config WHERE LSlide_id = '$id_update'");
                    if (!is_null($row)) {
                       $wpdb->update(
                           "{$wpdb->prefix}LSlide_Config",
                           array(
                               'LSlide_Name' => $name_update,
                               'LSlide_Settings' => $settings_update,
                           ),
                           array('LSlide_id' => $id_update),
                           array( "%s", "%d"),
                           array( "%d")
                       );
                       wp_redirect( admin_url('admin.php?page=LSlide&success=2') );
                   } else {
                       wp_redirect( admin_url('admin.php?page=LSlide&error=2') );
                   };
               } else {
                   wp_redirect( admin_url('admin.php?page=LSlide&error=1') );
               };
            }
        } elseif (isset($_GET['action']) && $_GET['action'] === "delete") {
            if (isset($_GET['deleteLSlide']) && !empty($_GET['deleteLSlide'])) {
                global $wpdb;
                $delete_ID = $_GET['deleteLSlide'];
                $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}LSlide_Config WHERE LSlide_id = '$delete_ID'");
                if (!is_null($row)) {
                    $wpdb->delete(
                        "{$wpdb->prefix}LSlide_Config",
                        array("LSlide_id" => $delete_ID
                        )
                    );
                    wp_redirect( admin_url('admin.php?page=LSlide&success=3') );
                } else {
                    wp_redirect( admin_url('admin.php?page=LSlide&error=2') );
                };
            };
        };
	}
};
