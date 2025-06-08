<?php namespace App\Controllers;

use App\Models\SearchModel;

class Search extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        // echo 'Connected to database: ' . $db->getDatabase();  // ⬅️ Tambahkan baris ini
        return view('search_form');
    }

    public function result()
    {
        $keyword = $this->request->getPost('keyword');
        $model = new SearchModel();
        $data['results'] = $model->search($keyword);
        return view('search_result', $data);
    }
}
