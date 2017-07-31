<?php
if (isset($_GET["success"])):  ?>
    <?php if ($_GET["success"] == 1): ?>
        <div id="message" class="updated notice LSlide_alert_delete is-dismissible">
            <p>L'élément a bien été créer.</p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Ne pas tenir compte de ce message.</span>
            </button>
        </div>
    <?php elseif ($_GET["success"] == 2): ?>
        <div id="message" class="updated notice LSlide_alert_delete is-dismissible">
            <p>L'élément a bien été mis à jour.</p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Ne pas tenir compte de ce message.</span>
            </button>
        </div>
    <?php elseif ($_GET["success"] == 3): ?>
        <div id="message" class="updated notice LSlide_alert_delete is-dismissible">
            <p>L'élément a bien été supprimé.</p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Ne pas tenir compte de ce message.</span>
            </button>
        </div>
    <?php endif; ?>
<?php elseif (isset($_GET["error"])):  ?>
    <?php if ($_GET["error"] == 1): ?>
        <div id="message" class="updated notice error LSlide_alert_delete is-dismissible">
            <p>Erreur le nom est vide</p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Ne pas tenir compte de ce message.</span>
            </button>
        </div>
    <?php elseif ($_GET["error"] == 2): ?>
        <div id="message" class="updated notice error LSlide_alert_delete is-dismissible">
            <p>Erreur de Database.</p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Ne pas tenir compte de ce message.</span>
            </button>
        </div>
    <?php endif; ?>
<?php endif; ?>
