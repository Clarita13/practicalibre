
<?php

class Dashboard extends SessionController{
/* Controlador para las sesiones del administrador */
    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
    }

     function render(){
         /* Extraccion de los modelos de los productos almacenados en BD */
        $expensesModel          = new ExpensesModel();
        $expenses               = $this->getExpenses(5);
        $totalThisMonth         = $expensesModel->getTotalAmountThisMonth($this->user->getId());
        $maxExpensesThisMonth   = $expensesModel->getMaxExpensesThisMonth($this->user->getId());
        $categories             = $this->getCategories();

        $this->view->render('dashboard/index', [
            'user'                 => $this->user,
            'expenses'             => $expenses,
            'totalAmountThisMonth' => $totalThisMonth,
            'maxExpensesThisMonth' => $maxExpensesThisMonth,
            'categories'           => $categories
        ]);
    }
    
    /*Donde se obtiene la lista de productos y  el número de transacciones*/
    private function getExpenses($n = 0){
        if($n < 0) return NULL;
        $expenses = new ExpensesModel();
        return $expenses->getByUserIdAndLimit($this->user->getId(), $n);   
    }

    /* Obtencion de las categorias */
    function getCategories(){
        $res = [];
        $categoriesModel = new CategoriesModel();
        $expensesModel = new ExpensesModel();

        $categories = $categoriesModel->getAll();

        foreach ($categories as $category) {
            $categoryArray = [];
            /*se obtiene el monto de los productos por categoria*/
            $total = $expensesModel->getTotalByCategoryThisMonth($category->getId(), $this->user->getId());
            /* se obtiene el número de productos por categoria por mes*/
            $numberOfExpenses = $expensesModel->getNumberOfExpensesByCategoryThisMonth($category->getId(), $this->user->getId());
            
            if($numberOfExpenses > 0){
                $categoryArray['total'] = $total;
                $categoryArray['count'] = $numberOfExpenses;
                $categoryArray['category'] = $category;
                array_push($res, $categoryArray);
            }
            
        }
        return $res;
    }
}

?>