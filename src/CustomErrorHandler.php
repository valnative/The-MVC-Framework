<?php

namespace App;

use Exception;

class CustomErrorHandler
{
    public function registerHandler(): void
    {
        set_error_handler([$this, 'customErrorHandler']);
        register_shutdown_function([$this, 'customFatalErrorHandler']);
        set_exception_handler(([$this, 'exceptionErrorHandler']));
        ob_start();
    }

    public function customErrorHandler(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        $this->ErrorHandler($errno, $errstr, $errfile, $errline);

        return true;
    }

    public function customFatalErrorHandler(): void
    {
        $this->fatalErrorHandler();
    }

    public function exceptionErrorHandler(Exception $exception): bool
    {
        echo $this->printErrorLog(
            get_class($exception),
            $exception->getMessage(),
            $exception ->getFile(),
            $exception ->getLine()
        );
        $this->writeErrorLog(
            get_class($exception),
            $exception->getMessage(),
            $exception ->getFile(),
            $exception ->getLine()
        );
        return true;
    }

    protected function errorHandler(int $errno, string $errstr, string $errfile, int $errline, $type_error = ''): bool
    {
        switch ($errno) {
            case 2:
                $type_error = 'WARNING';
                break;
            case 8:
                $type_error = 'NOTICE';
                break;
            case 2048:
                $type_error = 'STRICT';
                break;
            case 8192:
                $type_error = 'DEPRECATED';
                break;
            default:
                echo "Unknown ERROR: [" . $errno . "] " . $errstr;
                break;
        }

        echo $this->printErrorLog($type_error, $errstr, $errfile, $errline) . PHP_EOL . "<br><br>";
        $this->writeErrorLog($type_error, $errstr, $errfile, $errline);

        return true;
    }

    protected function fatalErrorHandler($type_error = ''): bool
    {
        $error = error_get_last();

        if ($error === null) {
            return false;
        }

        if (
            $error['type']
            & (1 | E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING)
        ) {
            ob_get_clean();
            switch ($error['type']) {
                case 1:
                    $type_error = 'ERROR';
                    break;
                case 4:
                    $type_error = 'PARSE ERROR';
                    break;
                case 16:
                    $type_error = 'CORE ERROR';
                    break;
                case 32:
                    $type_error = 'CORE WARNING';
                    break;
                case 64:
                    $type_error = 'COMPILE ERROR';
                    break;
                case 128:
                    $type_error = 'COMPILE WARNING';
                    break;
                default:
                    echo "Unknown FATAL ERROR: [" . $error['type'] . "] " . $error["message"];
                    break;
            }

            echo $this->printErrorLog($type_error, $error["message"], $error["file"], $error["line"]);
            $this->writeErrorLog($type_error, $error["message"], $error["file"], $error["line"]);
        }

        return true;
    }

    public function printErrorLog(string $type_error, string $errstr, string $errfile, int $errline): string
    {
        $datetime = date("d-M-Y H:i:s");
        $backtrace = print_r(debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10), true);

        return "[$datetime] $type_error: $errstr in $errfile at line $errline Stack trace: $backtrace" . PHP_EOL;
    }

    public function writeErrorLog(string $type_error, string $errstr, string $errfile, int $errline): void
    {
        $dir = __DIR__ . "../../logs/error.log";
        error_log($this->printErrorLog($type_error, $errstr, $errfile, $errline), 3, $dir);
    }
}
