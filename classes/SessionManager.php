<?php

class SessionManager
{
    public function start(): void
    {
        session_start();
        if (!isset($_SESSION['time'])) {
            $_SESSION['time'] = date('H:i:s');
            $_SESSION['activity'] = time();
        }
    }

    public function write(): void
    {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
    }

    public function read(): void
    {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo $username;
        } else {
            $_SESSION['username'] = $_POST['username'];
        }
    }

    public function clean(): void
    {
        if (isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > 300)) {
            session_unset();
        }
    }

    public function destroy(): void
    {
        if (isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > 600)) {
            session_destroy();
        }
    }

    public function protectSession(): void
    {
        $session_cookie = session_get_cookie_params();

        if ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['browser'] !== $_SERVER['HTTP_USER_AGENT']) {
            setcookie(
                session_name(),
                '',
                time() - 1500,
                $session_cookie['path'],
                $session_cookie['domain'],
                $session_cookie['secure'],
                $session_cookie['httponly']
            );

            $this->destroy();
            header("https://" . $_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR);
        }
    }
}