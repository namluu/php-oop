<?php declare(strict_types=1);

namespace Core;

class Message
{
    public static function setSuccessMessage(string $message): void
    {
        $_SESSION['success_message'] = $message;
    }

    public static function setErrorMessage(string $message): void
    {
        $_SESSION['error_message'] = $message;
    }

    /**
     * @return mixed message string | null
     */
    public static function getSuccessMessage(): mixed
    {
        if (isset($_SESSION['success_message'])) {
            $message = $_SESSION['success_message'];
            unset($_SESSION['success_message']);

            return $message;
        }

        return null;
    }

    /**
     * @return mixed message string | null
     */
    public static function getErrorMessage(): mixed
    {
        if (isset($_SESSION['error_message'])) {
            $message = $_SESSION['error_message'];
            unset($_SESSION['error_message']);

            return $message;
        }

        return null;
    }
}