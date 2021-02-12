<?php
    session_start();
    unset($_SESSION['pos']);
    session_destroy();
    header('Location: login');