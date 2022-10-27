<?php

namespace App\Controllers;

use App\Lib\Debug;
use App\Core\Controller;
use App\Repositories\ProductsRepository;
use App\Repositories\Repository;

class ProductsController extends Controller
{

    /**
     * @description Делает запрос на  все данные из таблицы и задает название title
     *
     * @return void
     */
    public function getAllAction(): void
    {
        $repository = new ProductsRepository();
        $vars = $repository->getAll();
        $this->view->render('Продукты', $vars);

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function createAction(): void
    {
        $data = ['tableName' => 'products',
            'name' => $_POST['name'],
            'image' => $_POST['image'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'style_id' => $_POST['style_id'],
        ];

        $repository = new ProductsRepository();
        $repository->create($data);
    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function updateAction(): void
    {

        $this->view->render('Продукты');

    }

    public function editAction(): void
    {

        if (!empty($_POST)) {

            $data = ['tableName' => 'products',
                'name' => $_POST['inputName'],
                'image' => $_POST['inputImage'],
                'price' => $_POST['inputPrice'],
                'description' => $_POST['inputDescription'],
                'style_id' => $_POST['inputStyleId'],
            ];

            $field = 'id';
            $operation = '=';
            $value = $_GET['id'];

            $repository = new ProductsRepository();
            $repository->update($data, $field, $operation, $value);

            $_POST = [];
        }

        $this->view->redirect('/products/index');

    }

    public function selectAction(): void
    {
        if (!empty($_GET['id'])) {

            $repository = new ProductsRepository();
            $data = $repository->getOne('id', '=', $_GET['id']);
            foreach ($data as $key => $item) {
                $params[] = $key . '=' . $item;
            }
            $params = implode('&', $params);
            $this->view->redirect('/products/update' . '/?' . $params);
        }

    }

}
