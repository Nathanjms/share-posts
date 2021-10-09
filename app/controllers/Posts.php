<?php
class Posts extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => '',
            'body' => '',
            'title_error' => '',
            'body_error' => ''
        ];
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST date
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // POST data
            $data['title'] = trim($_POST['title']);
            $data['body'] = trim($_POST['body']);
            $data['user_id'] = $_SESSION['user_id'];

            // Validations
            if (!$data['title']) {
                $data['title_error'] = 'Please enter a valid title address';
            } elseif (strlen($data['title']) > 255) {
                $data['title_error'] = 'Title must be less than than 256 characters';
            
            }
            
            if (!$data['body']) {
                $data['body_error'] = 'Please Enter a valid body';
            } 

            if (!$data['title_error'] && !$data['body_error']) {
                if($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    return redirect('posts/add');
                } 
                flash('post_message', 'Something went wrong when adding post :c', 'alert alert-danger');
                return redirect('posts/add');
            }
        }

        $this->view('posts/add', $data);
    }
    
    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user,
        ];
        $this->view('posts/show', $data);
    }

    public function edit($id)
    {
        $post = $this->postModel->getPostById($id);

        if($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
        }

        $data = [
            'id' => $id,
            'title' => $post->title,
            'body' => $post->body,
            'title_error' => '',
            'body_error' => ''
        ];
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST date
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // POST data
            $data['title'] = trim($_POST['title']);
            $data['body'] = trim($_POST['body']);
            $data['user_id'] = $_SESSION['user_id'];

            // Validations
            if (!$data['title']) {
                $data['title_error'] = 'Please enter a valid title address';
            } elseif (strlen($data['title']) > 255) {
                $data['title_error'] = 'Title must be less than than 256 characters';
            
            }
            
            if (!$data['body']) {
                $data['body_error'] = 'Please Enter a valid body';
            } 

            if (!$data['title_error'] && !$data['body_error']) {
                if($this->postModel->editPost($data, $id)) {
                    flash('post_message', 'Post Edited Successfully');
                    return redirect('posts/show/' . $data['id']);
                } 
                flash('post_message', 'Something went wrong when editing post :c', 'alert alert-danger');
                return redirect('posts/show/' . $data['id']);
            }
        }

        $this->view('posts/edit', $data);
    }
}
