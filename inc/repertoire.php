<?php
require_once('create_json.php');
include 'connect_db.php';
$sql = "SELECT * FROM repertoire ORDER BY category, sub_category";
$repertoire = mysqli_query($link, $sql);
?>
<section data-repertoires='<?= createJson($repertoire) ?>' class="content__repertoire repertoire" id="repertoire">
    <h1 class="title">Репертуар</h1>
    <ul class="repertoire__items" id="repertoire__items">
        <!-- Здесь отображается музыка -->
    </ul>
</section>
<?php
mysqli_close($link);
