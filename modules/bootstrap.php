<?php
    echo "Running\n";
    
    //Reading variables from .env file
    $env = parse_ini_file('.env');

    $BOT_TOKEN = $env['BOT_TOKEN'];
    
    $USE_PROXY = $env['USE_PROXY'];
    
    $DB_HOST = $env['DB_HOST'];
    $DB_PORT = $env['DB_PORT'];
    $DB_NAME = $env['DB_NAME'];
    $DB_USER = $env['DB_USER'];
    $DB_PASS = $env['DB_PASS'];
    
    $DISPLAY_ERRORS = $env['DISPLAY_ERRORS'];

    $ADMIN_CHAT_ID = $env['ADMIN_CHAT_ID'];
    $ADMIN_USER_NAME = $env['ADMIN_USER_NAME'];
    $ASSOCIATED_CHANNEL = $env['ASSOCIATED_CHANNEL'];

    //Setting wether to display errors
    if($DISPLAY_ERRORS) {
        ini_set('display_errors', "on");
        error_reporting(error_level: E_ALL);
    }

    include_once("./modules/variables.php");
    include_once("./modules/curl.php");
    include_once("./modules/db.php");
    include_once("./classes/telegram.php");
    include_once("./classes/user.php");
    include_once("./modules/buttons.php");
    include_once("./classes/memes.php");
    
    //Create the needed objects
    $user = new User;
    $telegram = new Telegram;
    $memes = new Memes;
    
    if(!is_dir("files")){
        mkdir("files");
    }