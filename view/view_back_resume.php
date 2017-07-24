<div id="acf-field-group-wrap" class="wrap lcs-display">
    <div class="acf-columns-2">
        <h1 class="wp-heading-inline"><?= get_admin_page_title() ?></h1>
        <p>Bienvenue sur la page d'accueil du plugin</p>
        <table class="wp-list-table widefat fixed striped pages">
            <thead>
                <tr>
                    <th scope="col" id="fields" class="manage-column column-cb id-column">ID</th>
                    <th scope="col" id="fields" class="manage-column column-title column-primary column-fields">Name</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Settings</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Shortcode</th>
                </tr>
            </thead>
            <tbody id"the-list">
            <?php


                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}LSlide_Config"); // Options in DB
                if ($results):
                    foreach ($results as $key):
                        $id = $key->LSlide_id;
                        $name = $key->LSlide_Name;
                        // $url_update =  "admin.php?page=LSlide&select=".$id;
                        // $url_delete = "admin.php?page=LSlide&delete=".$id;
                        $settings = unserialize($key->LSlide_Settings);
                        $select_id = "cb-select-" . $id;
            ?>
                        <tr class="iedit level-0 type-page status-publish hentry">
                            <!-- ID -->
                            <td class="id-column column">
                                <strong><span><?= $id ?></span></strong>
                            </td>
                            <!-- Title -->
                            <td class="column-primary" data-colname="Titre">
                                <div class="locked-info">';
                                    <span class="locked-avatar"></span>
                                    <span class="locked-text"></span>
                                </div>
                                <strong><a class="row-title" href=""><?= $key->LCS_Name ?></a></strong>
                                <!-- Actions -->
                                <div class="row-actions">
                                    <span class="edit inline">
                                        <!-- Update -->
                                        <input type="hidden" name="select_id" value="<?= $id ?>">
                                        <a href="<?= admin_url($url_update) ?>" >modifier</a>
                                    </span>
                                    <span class="inline"> | </span>
                                    <span class="trash inline">
                                        <!-- Delete -->
                                        <input type="hidden" name="delete" value="<?= $id ?>">
                                        <a href="<?= admin_url($url_delete) ?>">Supprimer</a>
                                    </span>
                                </div>
                            </td>
                            <!-- Settings -->
                            <td class="title column-title has-row-actions column page-title">
                                <span>
                                    <strong>

                                    </strong>
                                </span>
                            </td>
                            <!-- Shortcode -->
                            <td class="column">
                                <span>
                                    <strong>[LSlide id=<?= $id ?>]</strong>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-items">
                        <td class="colspanchange" colspan="7">Sorry, None LSlide</td>
                    </tr>
                <?php endif; ?>
					<tr class="iedit btn_lslide_add">
						<button class="page-title-action" href="" class="page-title-action">Ajouter</button>
					</tr>
					<tr class="iedit">

					</tr>
            </tbody>
        </table>
    </div>
</div>
