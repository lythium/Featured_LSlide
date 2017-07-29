<div id="acf-field-group-wrap" class="wrap LSlide-display-backoff">
    <div class="acf-columns-2">
        <h1 class="wp-heading-inline"><?= get_admin_page_title() ?></h1>
        <p>Bienvenue sur la page d'accueil du plugin</p>
        <table class="wp-list-table widefat fixed striped pages">
            <thead>
                <tr>
                    <td scope="col" id="fields" class="manage-column column-cb check-column"><span>ID</span></td>
                    <th scope="col" id="fields" class="manage-column column-title column-primary column-fields">Name</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Settings</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Shortcode</th>
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
                        $url_delete = "admin.php?page=LSlide&delete=".$ID;
                        $settings = $key->LSlide_Settings;
                        $select_id = "cb-select-" . $ID;
            ?>
                        <tr class="iedit level-0 type-page status-publish hentry">
                            <!-- ID -->
                            <th class="id-column check-column column">
                                <strong><span><?= $ID ?></span></strong>
                            </th>
                            <!-- Title -->
                            <td class="title column-title has-row-actions column-primary page-title" data-colname="Titre">
                                <div class="locked-info">';
                                    <span class="locked-avatar"></span>
                                    <span class="locked-text"></span>
                                </div>
                                <strong><a class="row-title" href=""><?= $Name ?></a></strong>
                                <!-- Actions -->
                                <div class="row-actions" style="left:0;">
                                    <span class="edit inline">
                                        <!-- Update -->
                                        <input type="hidden" name="select_id" value="<?= $ID ?>">
                                        <a href="<?= admin_url($url_update) ?>" >modifier</a>
                                    </span>
                                    <span class="inline"> | </span>
                                    <span class="trash inline">
                                        <!-- Delete -->
                                        <input type="hidden" name="delete" value="<?= $ID ?>">
                                        <a href="<?= admin_url($url_delete) ?>">Supprimer</a>
                                    </span>
                                </div>
                                <button type="button" class="toggle-row">
                                    <span class="screen-reader-text">Afficher plus de détails</span>
                                </button>
                            </td>
                            <!-- Settings -->
                            <td class="title column-title has-row-actions column-primary page-title ">
                                <span><strong>Number featured Post: <?= $settings ?></strong></span>
                            </td>
                            <!-- Shortcode -->
                            <td class="column">
                                <span>
                                    <strong>[LSlide id=<?= $ID ?>]</strong>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-items">
                        <td class="colspanchange" colspan="7">Sorry, None LSlide</td>
                    </tr>
                <?php endif; ?>
					<tr class="iedit tr-add-SLide">
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
                            <td class="options-td">
                                <div class="form-add-SLide">
                                    <label for="add_number">Number of featured posts.</label>
                                    <select class="" name="add_number">
                                        <option value="2" selected>2</option>
                                        <option value="2">3</option>
                                        <option value="2">4</option>
                                        <option value="2">6</option>
                                    </select>
                                </div>
                            </td>
                            <td class=".submit-td">
                                <div class="form-add-SLide">
                                    <button type="submit" class="btn btn-submit" name="buttonSubmit" value="add">Add</button>
                                    <button type="button" class="btn btn-cancel" name="buttonCancel">Cancel</button>
                                </div>
                            </td>
                        </form>
					</tr>
            </tbody>
        </table>
        <pre><?php var_dump($_POST); ?></pre>
    </div>
</div>
