<?php

use App\Models\AppSetting;

function GetSettings($settingName) {
    return AppSetting::where('setting_name', $settingName)->value('setting_value');
}

?>

