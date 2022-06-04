<?php
require_once('create_json.php');

include 'connect_db.php';
$is_page_home = basename($_SERVER['SCRIPT_NAME']) === 'index.php';
if ($is_page_home) {
    $first_path = './inc/';
} else {
    $first_path = '../inc/';
}
$category_output_order = file_get_contents($first_path . 'category_output_order.txt');
$sql = "SELECT *
FROM `repertoire`
ORDER BY FIND_IN_SET (
    category,'$category_output_order'
    ),
    FIELD(sub_category, 'Популярные') desc,
    sub_category,
    executor";
$repertoire = mysqli_query($link, $sql);
$create_json = createJson($repertoire);
?>
<section data-repertoires='<?= $create_json ?>' class="content__repertoire repertoire" id="repertoire">
    <div class="repertoire__body">
        <h1 class="title">Репертуар</h1>
        <?php if ($is_page_home) { ?>
            <form action="./inc/download_repertoire.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="repertoire[]" value='<?= $create_json ?>'>
                <button type="submit" class="repertoire__btn-download">Скачать репертуар</button>
            </form>
        <?php } ?>
        <ul class="repertoire__items" id="repertoire__items">
            <!-- Здесь отображается музыка -->
        </ul>
    </div>
</section>
<?php
mysqli_close($link);
