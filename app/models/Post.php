<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query("
            SELECT 
                *,
                p.id as postId,
                u.id as userId,
                p.created_at as postCreated
            FROM posts p
            INNER JOIN users u ON u.id = p.user_id
            ORDER BY p.created_at DESC;
        ");

        $results = $this->db->resultSet();

        return $results;
    }

    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, body, user_id) VALUES (:title, :body, :user_id)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);
        return $this->db->execute();
    }

    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function editPost($data, $id)
    {
        $this->db->query('Update posts set title = :title, body = :body WHERE id = :id');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
