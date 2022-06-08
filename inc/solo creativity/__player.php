<?php
$first_dir = '';
if (basename($_SERVER['SCRIPT_NAME']) !== 'solo_creativity.php') {
    $first_dir = '../';
}
$audio_dir = $first_dir . 'audio';
$audio_folders = array_diff(scandir($audio_dir), array('..', '.'));
$id = 1;
?>
<section class="content__players players">
    <?php
    foreach ($audio_folders as $audio_folder) {
        $dir_audio_folder = $audio_dir . '/' . $audio_folder;
        $files = array_diff(scandir($dir_audio_folder, 1), array('..', '.'));
        foreach ($files as $file) {
            $file_path = $dir_audio_folder . '/' . $file;
            if (exif_imagetype($file_path)) {
                $dir_audio_image = $file_path;
                $image_name = $file;
            } else {
                $dir_audio_file = $file_path;
                $file_name = $file;
            }
        }
        // pathinfo - разбивате путь на массив
        $r_filename = pathinfo(basename($file_name))['filename'];
        ?>
        <div class="players__player">
            <div class="players__container">
                <div class="players__image">
                    <img class="players__img" src="<?= $dir_audio_image ?>" alt="<?= $image_name ?>">
                </div>
            </div>
            <div class='audio-container'>
                <audio src="<?= $dir_audio_file ?>"
                       class='audio-player' id='audio-player-<?= $id ?>' preload='metadata'></audio>
                <div class='audio-hud'>
                    <div class='audio-hud__element audio-hud__action audio-hud__action_pause'
                         id='audio-player-<?= $id ?>__action'></div>
                    <div class='audio-hud__element audio-hud__curr-time' id='audio-player-<?= $id ?>__curr-time'>
                        00:00
                    </div>
                    <input type="range" class="range" value="0" min="0" max="100"
                           class='audio-hud__element audio-hud__progress-bar'
                           id='audio-player-<?= $id ?>__progress-bar'/>
                    <div class='audio-hud__element audio-hud__duration' id='audio-player-<?= $id ?>__duration'></div>
                </div>
            </div>
            <?php if (basename($_SERVER['SCRIPT_NAME']) === 'audios.php') { ?>
                <form class="form delete" action='./audio/del_audio.php' method='POST'>
                    <input type='hidden' name='filename' value='<?= $r_filename ?>'/>
                    <button class="btn-delete" type='submit'>Удалить</button>
                </form>
                <?php
            }
            ?>
        </div>
        <?php
        $id++;
    } ?>
</section>
