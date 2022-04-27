<?php
$audio_dir = './audio';
$audio_folders = array_diff(scandir($audio_dir), array('..', '.'));
$id = 1;
foreach ($audio_folders as $audio_folder) {
    $dir_audio_folder = array_diff(scandir($audio_dir . '/' . $audio_folder, 1), array('..', '.'));
    $dir_audio_image = $audio_dir . '/' . $audio_folder . '/' . $dir_audio_folder[1];
    $dir_audio_file = $audio_dir . '/' . $audio_folder . '/' . $dir_audio_folder[0];
?>
    <div class="players__player">
        <div class="players__container">
            <div class="players__image">
                <img class="players__img" src="<?= $dir_audio_image ?>" alt="<?= $dir_audio_folder[1] ?>">
            </div>
        </div>
        <div class='audio-container'>
            <audio style="overflow-y: scroll; -webkit-overflow-scrolling: touch;" src="<?= $dir_audio_file ?>" class='audio-player' id='audio-player-<?= $id ?>' preload='metadata'></audio>
            <div class='audio-hud'>
                <div class='audio-hud__element audio-hud__action audio-hud__action_pause' id='audio-player-<?= $id ?>__action'></div>
                <div class='audio-hud__element audio-hud__curr-time' id='audio-player-<?= $id ?>__curr-time'>
                    00:00
                </div>
                <input type="range" class="range" value="0" min="0" max="100" class='audio-hud__element audio-hud__progress-bar' id='audio-player-<?= $id ?>__progress-bar' />
                <div class='audio-hud__element audio-hud__duration' id='audio-player-<?= $id ?>__duration'>
                    00:00
                </div>
            </div>
        </div>
    </div>
<?php
    $id++;
}
