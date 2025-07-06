<?php declare(strict_types=1);

namespace App\Models;

class PostModel extends \Core\Model
{
    public function getAll()
    {
        $this->query('SELECT p.id, title, content, link, name user_name FROM posts p LEFT JOIN users u ON p.user_id = u.id ORDER BY created_at DESC');

        return $this->getResults();
    }

    public function create($data): bool
    {
        $this->query('INSERT INTO posts (title, content, link, user_id) VALUES (:title, :content, :link, :user_id)');
        $this->bind('title', $data['title']);
        $this->bind('content', $data['content']);
        $this->bind('link', $data['link']);
        $this->bind('user_id', $data['user_id']);
        $this->execute();

        if ($this->lastInsertId()) {
            return true;
        }

        return false;
    }
}
