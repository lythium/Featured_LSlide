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
                    if (isset($_POST['add_speed']) && !empty($_POST['add_speed'])) {
                        $LSlide_name_add = (string)sanitize_text_field($_POST['add_name']);
                        $Number_add = (int)$_POST['add_number'];
                        $Speed_add = (int)sanitize_text_field($_POST['add_speed']);
                        if (is_string($LSlide_name_add) && is_int($Speed_add) && is_int($Number_add)) {
                            $LSlide_Settings_add = (string)serialize(
                                array(
                                    'number' => $Number_add,
                                    'speed' => $Speed_add
                                )
                            );

                            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}LSlide_Config WHERE LSlide_Name = '$LSlide_name_add'");
                            if (is_null($row)) {
                                $wpdb->insert(
                                    "{$wpdb->prefix}LSlide_Config",
                                    array(
                                        'LSlide_Name' => $LSlide_name_add,
                                        'LSlide_Settings' => $LSlide_Settings_add,
                                    )
                                );
                                wp_redirect( admin_url('admin.php?page=LSlide&success=1') );
                            } else {
                                wp_redirect( admin_url('admin.php?page=LSlide&error=4') );
                            };
                        } else {
                            wp_redirect( admin_url('admin.php?page=LSlide&error=3') );
                        };
                    } else {
                        wp_redirect( admin_url('admin.php?page=LSlide&error=1') );
                    };
                } else {
                    wp_redirect( admin_url('admin.php?page=LSlide&error=1') );
                };
            };
        } elseif (isset($_POST['buttonUpdate']) && !empty($_POST['buttonUpdate'])) {
            if ($_POST['buttonUpdate'] === "update") {
                if (isset($_POST['update_name']) && !empty($_POST['update_name'])) {
                    if (isset($_POST['update_speed']) && !empty($_POST['update_speed'])) {
                        global $swpdb;
                        $id_update = (int)$_POST["update_id"];
                        $LSlide_name_update = (string)sanitize_text_field($_POST['update_name']);
                        $Number_update = (int)$_POST['update_number'];
                        $Speed_update = (int)sanitize_text_field($_POST['update_speed']);
                        if (is_string($LSlide_name_update) && is_int($Speed_update) && is_int($Number_update)) {
                            $LSlide_Settings_update = (string)serialize(
                                array(
                                    'number' => $Number_update,
                                    'speed' => $Speed_update
                                )
                            );
                            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}LSlide_Config WHERE LSlide_id = '$id_update'");
                            if (!is_null($row)) {
                                $wpdb->update(
                                    "{$wpdb->prefix}LSlide_Config",
                                    array(
                                        'LSlide_Name' => $LSlide_name_update,
                                        'LSlide_Settings' => $LSlide_Settings_update,
                                    ),
                                    array('LSlide_id' => $id_update),
                                    array( "%s", "%s"),
                                    array( "%s")
                                );
                                wp_redirect( admin_url('admin.php?page=LSlide&success=2') );
                            } else {
                                wp_redirect( admin_url('admin.php?page=LSlide&error=2') );
                            };
                        } else {
                            wp_redirect( admin_url('admin.php?page=LSlide&error=3') );
                        };
                    } else {
                        wp_redirect( admin_url('admin.php?page=LSlide&error=1') );
                    };
                } else {
                    wp_redirect( admin_url('admin.php?page=LSlide&error=1') );
                };
            }
        } elseif (isset($_GET['action']) && $_GET['action'] === "delete") {
            if (isset($_GET['deleteLSlide']) && !empty($_GET['deleteLSlide'])) {
                global $wpdb;
                $delete_ID = (int)$_GET['deleteLSlide'];
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
