<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;

class News extends Controller 
{
    public function __construct()
    {
        $this->model = new NewsModel();
    }
    public function index()
    {

        $data = [
            'news'  => $this->model->getNews(),
            'title' => 'News archive'
        ];
        
        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null)
    {
        $data['news'] = $this->model->getNews($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannt find the news item: '.$slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        if (! $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ])) {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        } else {
            $this->model->save([
                'title' => $this->request->getVar('title'),
                'slug'  => url_title($this->request->getVar('title'), '-', TRUE),
                'body'  => $this->request->getVar('body'),
            ]);
            echo view('news/success');
        }
    }
}