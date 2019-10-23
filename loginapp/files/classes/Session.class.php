<?php
session_start();
class Session {
    public static function destroy(){
            session_destroy();
    }
}

?>