<?php
/*Controlador para el manejo de las sesiones en el sistema */
class Admin extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        /* Direccionamiento a la pagina inicial para el usuario */
        $stats = $this->getStatistics();

        $this->view->render('admin/index', [
            "stats" => $stats
        ]);
    }

    function createCategory(){
        /* Direccionamiento a la pagina de creacion de las categorias de productos */
        $this->view->render('admin/create-category');
    }

    function newCategory(){
       /* Al crear la categoria, se muestra una alerta solicitando los datos de nombre y color para el panel */
        if($this->existPOST(['name', 'color'])){
            $name = $this->getPost('name');
            $color = $this->getPost('color');

            $categoriesModel = new CategoriesModel();

            if(!$categoriesModel->exists($name)){
                $categoriesModel->setName($name);
                $categoriesModel->setColor($color);
                $categoriesModel->save();
                $this->redirect('admin', ['success' => Success::'Se agrego una nueva categoria']);
            }else{
                $this->redirect('admin', ['error' => Errors::'Fallo en la administracion']);
            }
        }
    }

    private function getStatistics(){
        /* Extraccion de datos en la BD */
        $res = [];

        $userModel = new UserModel();
        $users = $userModel->getAll();
        
        $expenseModel = new ExpensesModel();
        $expenses = $expenseModel->getAll();

        $categoriesModel = new CategoriesModel();
        $categories = $categoriesModel->getAll();

        $res['count-users'] = count($users);
        $res['count-expenses'] = count($expenses);
        $res['max-expenses'] = $this->getMaxAmount($expenses);
        $res['min-expenses'] = $this->getMinAmount($expenses);
        $res['avg-expenses'] = $this->getAverageAmount($expenses);
        $res['count-categories'] = count($categories);
        $res['mostused-category'] = $this->getCategoryMostUsed($expenses);
        $res['lessused-category'] = $this->getCategoryLessUsed($expenses);
        return $res;
    }

    private function getMaxAmount($expenses){
        $max = 0;
        foreach ($expenses as $expense) {
            $max = max($max, $expense->getAmount());
        }

        return $max;
    }
    private function getMinAmount($expenses){
        $min = $this->getMaxAmount($expenses);
        foreach ($expenses as $expense) {
            $min = min($min, $expense->getAmount());
        }

        return $min;
    }

    private function getAverageAmount($expenses){
        $sum = 0;
        foreach ($expenses as $expense) {
            $sum += $expense->getAmount();
        }

        return ($sum / count($expenses));
    }

    private function getCategoryMostUsed($expenses){
        $repeat = [];

        foreach ($expenses as $expense) {
            if(!array_key_exists($expense->getCategoryId(), $repeat)){
                $repeat[$expense->getCategoryId()] = 0;    
            }
            $repeat[$expense->getCategoryId()]++;
        }

        $categoryMostUsed = max($repeat);
        $categoryModel = new CategoriesModel();
        $categoryModel->get($categoryMostUsed);

        $category = $categoryModel->getName();

        return $category;
    }

    private function getCategoryLessUsed($expenses){
        $repeat = [];

        foreach ($expenses as $expense) {
            if(!array_key_exists($expense->getCategoryId(), $repeat)){
                $repeat[$expense->getCategoryId()] = 0;    
            }
            $repeat[$expense->getCategoryId()]++;
        }

        $categoryMostUsed = min($repeat);
        $categoryModel = new CategoriesModel();
        $categoryModel->get($categoryMostUsed);

        $category = $categoryModel->getName();

        return $category;
    }
}

?>