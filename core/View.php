<?php declare(strict_types=1);

namespace Core;

class View
{
    public static function render(string $view, array $args = []): void
    {
        extract($args, EXTR_SKIP);
        $file = 'app/Views/' . $view;
        $layout = 'app/Views/layout.php';
        if (is_readable($file)) {
            require $file;
            require $layout;
        } else {
            throw new \Exception($file . ' not found');
        }
    }
}
