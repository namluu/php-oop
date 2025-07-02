<?php declare(strict_types=1);

namespace App\Controllers;

class HomeController
{
    public function indexAction(): void
    {
        echo 'Home controller';
    }

    public function abcdAction(): void
    {
        echo 'Home controller - abcdAction';
    }
}
