/**De la funcion para nuevos productos */
const btnExpense = document.querySelector('#new-expense');
/**Al dar clic en boton */
btnExpense.addEventListener('click', async e =>{
  const background = document.createElement('div');
  const panel = document.createElement('div');
  const titlebar = document.createElement('div');
  const closeButton = document.createElement('a');
  const closeButtonText = document.createElement('i');
  const ajaxcontent = document.createElement('div');

/**Se crean los elements de textos en las secciones con los siguiente atributos */
/**Cambio en color de fondo */
  background.setAttribute('id', 'background-container');
    /**Se agregan atributos */
  panel.setAttribute('id', 'panel-container');
  /**El titulo cambia de texto */
  titlebar.setAttribute('id', 'title-bar-container');
  /**Se muestra el boton de cerrar */
  closeButton.setAttribute('class', 'close-button');
  closeButtonText.setAttribute('class', 'material-icons');
  /**El componente se adjunta el atributo para el AJAX */
  ajaxcontent.setAttribute('id', 'ajax-content');

/**Se agrega el panel con las modificaciones */
  background.appendChild(panel);
  panel.appendChild(titlebar);
  panel.appendChild(ajaxcontent);
  titlebar.appendChild(closeButton);
  closeButton.appendChild(closeButtonText);
  closeButtonText.appendChild(document.createTextNode('close'));
  /**Se agregan a la pagina */
  document.querySelector('#main-container').appendChild(background);

  /**En caso de presionar el boton de cerrar que es la X, se cierra la alerta */
  closeButton.addEventListener('click', e =>{
    background.remove();
  });

  
  const html = await getContent();
  ajaxcontent.innerHTML+= html;
  
});

async function getContent(){
  /**El flujo muestra el siguiente direccionamiento en la barra de direcciones del portal */
    const html = await fetch('https://claritaps.com/expense-app/expenses/create').then(res => res.text());
  return html;
}

