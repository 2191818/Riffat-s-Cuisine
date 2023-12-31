<?php
class LogoutController {
    function route() {
        session_start();
        session_destroy();

        header("Location: index.php?controller=login&action=index");
        exit();
    }
}
