<?php

class Post extends Controller
{
    private $postModel;

    public function __construct() {
        $this->postModel = $this->model('PostModel');
    }

    /**
     * @return void
     */
    public function index() {
        // $posts =
        $this->view('post/index', $posts);
    }

    /**
     * @param $id
     * @return void
     */
    public function show($id) {
        $post = $this->postModel->getPostById($id);
        $data = [
            'id' => $post['id'],
            'title' => $post['title'],
            'body' => $post['body']
        ];
        $this->view('post/show', $data);
    }

}
