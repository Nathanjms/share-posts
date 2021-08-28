<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome',
        ];

        return $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About Us'];
        return $this->view('pages/about', $data);
    }
}
