<?php

  define("DB_HOST",     "localhost:3306");
  define("DB_USER",     "root");
  define("DB_PASSWORD", "");
  define("DB_NAME",     "corsi");
  define("DB_PREFIX",   "msg_");
  define("DB_CHARSET",  "utf8");

  define("SESSIONS_TABLE",      DB_PREFIX . "sessioni");
  define("USERS_TABLE",         "utenti");
  define("USERS_PROFILE_TABLE", DB_PREFIX . "utenti_profili");
  define("ROOMS_TABLE",         DB_PREFIX . "stanze");
  define("MESSAGES_TABLE",      DB_PREFIX . "messaggi");
  define("ATTACHMENTS_TABLE",   DB_PREFIX . "allegati");

  define("DEBUG",               false);
  define("STORAGE_DIR",         ABSPATH . "/msg/storage");
  define("AVATARS_DIR",         "img/utente");
  define("AVATARS_DIR_OUTSIDE", "img/utente");
  //define("DEFAULT_AVATAR",      "./msg/img/default-avatar.png");
  define("DEFAULT_AVATAR",      "assets/pages/media/profile/profile_user.jpg");

  if(!$settings = json_decode( file_get_contents(ABSPATH . "/_settings.json") )) die("Error in _settings.json");
  $settings->profile_items = @json_decode("{" . $settings->profile_items_enc . "}");

  header("Content-Type: text/html; charset=utf-8");
  ini_set("display_errors", (boolean) DEBUG);
  if (DEBUG)
      error_reporting(E_ERROR | E_WARNING | E_PARSE); //or -1
    else
      error_reporting(0);

  $db = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($db->connect_error) die("DB CONNECTION ERROR! Error " . $db->connect_errno . ": ". $db->connect_error);
  if (!$db->set_charset(DB_CHARSET)) die("DB CAHRSET ERROR! Error " . $db->connect_errno . " : ". $db->connect_error);
