<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
   
    public function index()
    {
        $model = model(NewsModel::class);

    
        $data_header=[
            'title'=> 'Home', // Capitalize the first letter
            'link'=>$this->htmlLoad()['css'],
        ]; 
        $data_body=[
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];
        $data_footer=[
            'script'=>$this->htmlLoad()['js']
        ];

        return view('templates/header', $data_header)
            . view('news/index',$data_body)
            . view('templates/footer',$data_footer);
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news']=$model->getNews($slug);
        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        //$data['title'] = $data['news']['title'];
       //$data['title'] = $data['news'];

       $data_header=[
        'title'=> 'Home', // Capitalize the first letter
        'link'=>$this->htmlLoad()['css'],
    ]; 
    $data_body=[
        'news'  => $data['news'],
        'title' => $data['news']['title']
    ];
    $data_footer=[
        'script'=>$this->htmlLoad()['js']
    ];

    	/*Se verifica que la página exista*/
        if (! is_file(APPPATH . 'Views/news/' . $slug . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($slug);
        }
        return view('templates/header', $data_header)
            . view('news/'.$slug, $data_body)
            . view('templates/footer', $data_footer);
    }


    public function create()
    {
        helper('form');

        $data_header=[
            'title'=> 'Create a news item', // Capitalize the first letter
            'link'=>$this->htmlLoad()['css'],
        ]; 
        $data_body=[
            'news'  => '',
            'title' => ''
        ];
        $data_footer=[
            'script'=>$this->htmlLoad()['js']
        ];

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', $data_header)
                . view('news/create',$data_body)
                . view('templates/footer', $data_footer);
        }

        $post = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', $data_header)
                . view('news/create', $data_body)
                . view('templates/footer', $data_footer);
        }

        $model = model(NewsModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', $data_header)
            . view('news/success', $data_body)
            . view('templates/footer', $data_footer);
    }

    
}