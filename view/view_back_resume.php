<div id="acf-field-group-wrap" class="wrap LSlide-display-backoff">
    <div class="acf-columns-2">
        <h1 class="wp-heading-inline"><?= get_admin_page_title() ?></h1>
        <?php include_once plugin_dir_path(__FILE__).'view_back_off_alert.php'; ?>
        <p>Bienvenue sur la page d'accueil du plugin</p>
        <table class="wp-list-table widefat fixed striped pages">
            <thead>
                <tr>
                    <td scope="col" id="fields" class="manage-column column-cb check-column"><span>ID</span></td>
                    <th scope="col" id="fields" class="manage-column column-title column-primary column-fields">Name</th>
                    <th scope="col" id="settings" class="manage-column column-fields">Settings</th>
                    <th scope="col" id="shortcode" class="manage-column column-fields">Shortcode</th>
                </tr>
            </thead>
            <tbody id="the-list">
            <?php

                global $wpdb;
                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}LSlide_Config"); // Options in DB
                if ($results):
                    foreach ($results as $key):
                        $ID = $key->LSlide_id;
                        $Name = $key->LSlide_Name;
                        $url_update =  "admin.php?page=LSlide&select=".$ID;
                        $url_delete = "admin.php?page=LSlide&action=delete&deleteLSlide=".$ID;
                        $settings = unserialize($key->LSlide_Settings);
                        $setting_number = $settings["number"];
                        $setting_speed = $settings["speed"];
                        $select_id = "cb-select-" . $ID;
            ?>
                        <tr class="iedit level-0 type-page status-publish hentry">
                            <form class="update_LSlide_<?= $ID ?>" action="<?= admin_url('admin.php?page=LSlide') ?>" method="post">
                                <!-- ID -->
                                <th class="id-column check-column column">
                                    <strong class="hide-update"><span><?= $ID ?></span></strong>
                                    <input type="hidden" name="update_id" value="<?= $ID ?>">
                                </th>
                                <!-- Title -->
                                <td class="title column-title has-row-actions column-primary page-title" data-colname="Titre">
                                    <div class="locked-info">';
                                        <span class="locked-avatar"></span>
                                        <span class="locked-text"></span>
                                    </div>
                                    <strong class="hide-update_<?= $ID ?>"><a class="row-title" href=""><?= $Name ?></a></strong>
                                    <input class="show-update_<?= $ID ?>" name="update_name" value="<?= $Name ?>"> <!-- Name update-->
                                    <!-- Actions -->
                                    <div class="hide-update_<?= $ID ?>">
                                        <div class="row-actions hide-update_<?= $ID ?>" style="left:0;">
                                            <span class="edit inline">
                                                <!-- Update -->
                                                <a id="btn-update_<?= $ID ?>" class="btn-update" href="" >Modifier</a>
                                            </span>
                                            <span class="inline"> | </span>
                                            <span class="trash inline">
                                                <!-- Delete -->
                                                <a href="<?= admin_url($url_delete) ?>">Supprimer</a>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="button" class="toggle-row">
                                        <span class="screen-reader-text">Afficher plus de détails</span>
                                    </button>
                                </td>
                                <!-- Settings -->
                                <td class="settings column-settings" data-colname="Settings">
                                    <span class="hide-update_<?= $ID ?>">
                                        <strong>Number featured Post: <?= $setting_number ?></strong><br>
                                        <strong>Speed: <?= $setting_speed ?> </strong>
                                    </span>
                                    <div class="show-update_<?= $ID ?>"> <!-- Settings update-->
                                        <label for="update_number">Number of featured posts:</label>
                                        <select class="" name="update_number">
                                            <option value="3" <?= selected( $setting_number, 3 ) ?> >3</option>
                                            <option value="4" <?= selected( $setting_number, 4 ) ?> >4</option>
                                            <option value="6" <?= selected( $setting_number, 6 ) ?> >6</option>
                                            <option value="8" <?= selected( $setting_number, 8 ) ?> >8</option>
                                        </select><br>
                                        <label for="update_speed">Speed:</label>
                                        <input type="text" name="update_speed" value="7000">
                                    </div>
                                </td>
                                <!-- Shortcode -->
                                <td class="shortcode column-shortcode" data-colname="Shortcode">
                                    <span class="hide-update_<?= $ID ?>">
                                        <strong>[LSlide id=<?= $ID ?>]</strong>
                                    </span>
                                    <div class="show-update_<?= $ID ?>"> <!-- Button update-->
                                        <button type="submit" class="btn btn-submit" name="buttonUpdate" value="update">Update</button>
                                        <button id="btn-cancel-update_<?= $ID ?>"type="button" class="btn btn-cancel" name="buttonCancel">Cancel</button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-items">
                        <td class="colspanchange" colspan="7">Sorry, None LSlide</td>
                    </tr>
                <?php endif; ?>
					<tr class="iedit tr-add-SLide is-expanded">
                        <form class="add_LSlide" action="<?= admin_url('admin.php?page=LSlide') ?>" method="post">
    					    <th class="btn_lslide_add">
    				        	<button type="button" class="btn btn-add" href="">Add LSlide</button>
    					    </th>
                            <!-- Button d'ajout -->
                            <td class="options-td column-primary">
                                <div class="form-add-SLide">
                                    <label for="add_name">Nom du Slide</label>
                                    <input type="text" name="add_name" value="">
                                </div>
                            </td>
                            <!-- Form d'ajout -->
                            <td class="options-td resp-column">
                                <div class="form-add-SLide">
                                    <label for="add_number">Number of featured posts.</label>
                                    <select class="" name="add_number">
                                        <option value="3" selected>3</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                        <option value="8">8</option>
                                    </select><br>
                                    <label for="add_speed">Speed:</label>
                                    <input type="text" name="add_speed" value="7000">
                                </div>
                            </td>
                            <td class="submit-td resp-column">
                                <div class="form-add-SLide">
                                    <button type="submit" class="btn btn-submit" name="buttonSubmit" value="add">Add</button>
                                    <button type="button" class="btn btn-cancel" name="buttonCancel">Cancel</button>
                                </div>
                            </td>
                        </form>
					</tr>
            </tbody>
        </table>
    </div>
</div>
