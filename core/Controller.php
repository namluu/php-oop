<?php declare(strict_types=1);

namespace Core;

abstract class Controller
{
    public function __construct(
        protected array $routeParams = []
    ) {
        session_start();
    }

    /**
     * Check form post method
     *
     * @return bool
     */
    protected function isPostSubmitted(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Sanitize and validate input
     *
     * @return array
     */
    protected function getSanitizedData(): array
    {
        return filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
    }

    /**
     * @param string $message
     * @param int $code
     * @return void
     */
    protected function responseError(string $message, int $code = 400): void
    {
        http_response_code($code);
        echo json_encode(['error' => $message]);
    }

    /**
     * @param string $message
     * @param int $code
     * @return void
     */
    protected function responseSuccess(string $message, int $code = 200): void
    {
        http_response_code($code);
        echo json_encode(['success' => $message]);
    }

    protected function redirect(string $url, int $code = 302): void
    {
        header('Location: ' . $url, true, $code);
        exit();
    }

    protected function createUserSession(mixed $user): void
    {
        $_SESSION['user_data'] = $user;
    }

    protected function getUserSession(): mixed
    {
        return $_SESSION['user_data'] ?? null;
    }

    protected function removeUserSession(): void
    {
        unset($_SESSION["user_data"]);
    }
}
