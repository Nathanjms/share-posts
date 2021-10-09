<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        return $this->db->execute();
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

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashedPassword = $row->password;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        }

        return false;
    }
}
