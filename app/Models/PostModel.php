<?php declare(strict_types=1);

namespace App\Models;

class PostModel extends \Core\Model
{
    public function getAll()
    {
        $this->query('SELECT id, title, content FROM posts ORDER BY created_at');

        return $this->getResults();
    }
}
