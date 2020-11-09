<?php

const CM_SIGN_SDK = 'CmSignSdk';

spl_autoload_register(function ($className) {
    if (strpos($className, CM_SIGN_SDK) === 0) {
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
        $className = str_replace(CM_SIGN_SDK, 'src', $className);
        include_once '../' . $className . '.php';
    }
});