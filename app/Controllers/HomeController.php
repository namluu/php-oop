<?php declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    public function indexAction(): void
    {
        View::render('home/index.php', [
            'name' => 'Nam'
        ]);
    }

    public function abcdAction(): void
    {
        echo 'Home controller - abcdAction';
    }
}
