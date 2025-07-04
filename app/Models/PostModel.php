<?php declare(strict_types=1);

namespace App\Models;

class PostModel extends \Core\Model
{
    public function getAll()
    {
        $this->query('SELECT id, title, content FROM posts ORDER BY created_at');

        return $this->getResults();
    }

    public function create($data): bool
    {
        $this->query('INSERT INTO posts (title, content, link) VALUES (:title, :content, :link)');
        $this->bind('title', $data['title']);
        $this->bind('content', $data['content']);
        $this->bind('link', $data['link']);
        $this->execute();

        if ($this->lastInsertId()) {
            return true;
        }

        return false;
    }
}
