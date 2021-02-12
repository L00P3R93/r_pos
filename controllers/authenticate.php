<?php
    session_start();
    if(isset($_SESSION['pos_'])){
        header('Location: home');
    }