<?php
    $expenses               = $this->d['expenses'];
    $totalThisMonth         = $this->d['totalAmountThisMonth'];
    $maxExpensesThisMonth   = $this->d['maxExpensesThisMonth'];
    $user                   = $this->d['user'];
    $categories             = $this->d['categories'];

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claritaps - Tablero</title>
    <link rel="shortcut icon" href="https://claritaps.com/img/logo.ico">
</head>
<body>
    <?php require 'header.php'; ?>

    <div id="main-container">
        <?php $this->showMessages();?>
        <div id="expenses-container" class="container">
        
            <div id="left-container">
                
                <div id="expenses-summary">
                    <div>
                        <h2>Canastilla de <?php echo $user->getName() ?></h2>
                    </div>
                    <div class="cards-container">
                        <div class="card w-100">
                            <div class="total-budget">
                                <span class="total-budget-text">
                                    Total en canastilla de compras.    
                                </span>
                            </div>
                            <div class="total-expense">
                                <?php
                                    if($totalThisMonth === NULL){
                                        showError('Hubo un problema al cargar la información');
                                    }else{?>
                                        <span class="<?php echo ($user->getBudget() < $totalThisMonth)? 'broken': '' ?>">$<?php
                                        echo number_format($totalThisMonth, 2);?>
                                        </span>
                                <?php }?>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="cards-container">
                        <div class="card w-50">
                            <div class="total-budget">
                                <span class="total-budget-text">
                                    de
                                    $<?php 
                                        echo number_format($user->getBudget(),2) . ' mensuales te restan';
                                    ?>
                                </span>
                            </div>
                            <div class="total-expense">
                                <?php
                                    if($totalThisMonth === NULL){
                                        showError('Hubo un problema al cargar la información');
                                    }else{?>
                                        <span>
                                            <?php
                                                $gap = $user->getBudget() - $totalThisMonth;
                                                if($gap < 0){
                                                    echo "-$" . number_format(abs($user->getBudget() - $totalThisMonth), 2);
                                                }else{
                                                    echo "$" . number_format($user->getBudget() - $totalThisMonth, 2);
                                                }
                                            
                                        ?>
                                        </span>
                                <?php }?>
                            </div>
                        </div>
                        
                        <div class="card w-50">
                            <div class="total-budget">
                            <span class="total-budget-text">Tu gasto más grande este mes</span>
                            
                            </div>
                            <div class="total-expense">
                                <?php
                                    if($totalThisMonth === NULL){
                                        showError('Hubo un problema al cargar la información');
                                    }else{?>
                                        <span>$<?php
                                        echo number_format($maxExpensesThisMonth, 2);?>
                                        </span>
                                <?php }?>
                            </div>
                        </div>

                    </div>
                </div>


                <div id="expenses-category">
                    <h2>Canastilla desglosada por categoria</h2>
                    <div id="categories-container">
                        <?php
                            if($categories === NULL){
                                showError('Datos no disponibles por el momento.');
                            }else{
                                foreach ($categories as $category ) { ?>
                                    <div class="card w-30 bs-1" style="background-color: <?php echo $category['category']->getColor() ?>">
                                        <div class="content category-name">
                                            <?php echo $category['category']->getName() ?>
                                        </div>
                                        <div class="title category-total">$<?php echo $category['total'] ?></div>
                                        <div class="content category-count">
                                            <p><?php
                                                $count = $category['count'];
                                                if($count == 1){
                                                    echo $count . " transacción";
                                                }else{
                                                    echo $count . " transacciones";
                                                }
                                            ?></p>
                                        </div>
                                    </div>
                        <?php   }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div id="right-container">
                <div class="transactions-container">
                    <section class="operations-container">
                                              
                        <button class="btn-main" id="new-expense">
                            <i class="material-icons">add</i>
                            <span>Registrar nueva compra</span>
                        </button>
                          </section>

                    <section id="expenses-recents">
                    <h2>Registros:</h2>
                    <?php
                         if($expenses === NULL){
                            showError('Error al cargar los datos');
                        }else if(count($expenses) == 0){
                            showInfo('No hay transacciones');
                        }else{
                            foreach ($expenses as $expense) { ?>
                            <div class='preview-expense'>
                                <div class="left">
                                    <div class="expense-date"><?php echo $expense->getDate(); ?></div>
                                    <div class="expense-title"><?php echo $expense->getTitle(); ?></div>
                                </div>
                                <div class="right">
                                    <div class="expense-amount">$<?php echo number_format($expense->getAmount(), 2);?></div>
                                </div>
                            </div>
                            
                            <?php
                            }
                            echo '<div class="more-container"><a href="expenses">Ver todos los productos<i class="material-icons">keyboard_arrow_right</i></a></div>';
                        } 
                     ?>
                    </section>
                </div>
            </div>
            

        </div>

    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script >
        
const btnExpense = document.querySelector('#new-expense');

btnExpense.addEventListener('click', async e =>{
  const background = document.createElement('div');
  const panel = document.createElement('div');
  const titlebar = document.createElement('div');
  const closeButton = document.createElement('a');
  const closeButtonText = document.createElement('i');
  const ajaxcontent = document.createElement('div');


  background.setAttribute('id', 'background-container');
  panel.setAttribute('id', 'panel-container');
  titlebar.setAttribute('id', 'title-bar-container');
  closeButton.setAttribute('class', 'close-button');
  //closeButton.setAttribute('href', '#');
  closeButtonText.setAttribute('class', 'material-icons');
  ajaxcontent.setAttribute('id', 'ajax-content');

  background.appendChild(panel);
  panel.appendChild(titlebar);
  panel.appendChild(ajaxcontent);
  titlebar.appendChild(closeButton);
  closeButton.appendChild(closeButtonText);
  closeButtonText.appendChild(document.createTextNode('close'));
  document.querySelector('#main-container').appendChild(background);

  closeButton.addEventListener('click', e =>{
    background.remove();
  });

  
  const html = await getContent();
  ajaxcontent.innerHTML+= html;
  
});

async function getContent(){
  const html = await fetch('https://claritaps.com/expense-app/expenses/create').then(res => res.text());
  return html;
}

google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      async function drawChart() {
        const http = await fetch('https://claritaps.com/expense-app/expenses/getExpensesJSON')
        .then(json => json.json())
        .then(res => res);

        let expenses = [...http];
        expenses.shift();
        console.log(expenses);

        let colors = [...http][0];
        colors.shift();
        

        var data = google.visualization.arrayToDataTable(expenses);

        var options = {
          colors: colors
        };

        var chart = new google.charts.Bar(document.getElementById('chart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
</body>
</html>