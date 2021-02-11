/*Practica de creacion de extension*/

/// Directiva: indicación para los navegadores web que la ejecución debe ser en 
//             modo estricto o se debe utilizar las variables no declaradas

'use strict';
/// Importación: Incluir el modulo para las extensiones desde el VS Code
import * as vscode from 'vscode';

/// Metodo: Activacion de la extensión creada
//         Se manda a invocar cuando se inicializa la activación del proyecto
export function activate(context: vscode.ExtensionContext) {
    // ---
    let disposable = vscode.commands.registerCommand('extension.gapline', () => {
        // Activacion del editor de texto de JavaScript
        var editor = vscode.window.activeTextEditor;
        /// Condicional: En caso de que la variable editor se encuentre false por que no contenga ningún componente activo y/o declarado como null
        if (!editor) 
        {
            // Se mostrar mensaje en consola
            console.log("Error: No se puede abrir el editor de texto");
            /// Retorno: Se establece como un retorno de cierre de la funcion 
            return;
         }
        // Dentro del editor de texto, se creara una variable con la funcion de seleccion
        var selection = editor.selection;
        // Obtención del texto obtenido en la variable de 'selection'
        var text = editor.document.getText(selection);
        // Mediante una ventana emergente se mostrará el mensaje instanciado en el parametro de prompt
        vscode.window.showInputBox({ prompt: 'Ingrese el número de lineas:' }).then(value => {
             /// Cuando: Todo lo que se encuentre en este proceso se ejecutara despues de aceptar o cerrar la ventana emergente
            // Establecer el numero obtenido en la respuesta de la ventana emergente
            let numberOfLines = +value;
            // Instanciar un arreglo vacío de tipo de cadenas o string
            var textInChunks: Array<string> = [];
            // Dentro de la variable 'text' se buscara el parametro establecido dentro de la función de split que son salto de lineas
            text.split('\n').forEach((currentLine: string, lineIndex) => {
                // Se agrega al arreglo de string, el valor de cada respuesta de la funcion split mediante el forEach
                textInChunks.push(currentLine);
                /// Condicional: Dentro de la condicional se establece que si ---
                if ((lineIndex+1) % numberOfLines === 0) 
                {
                    // Se agregara al arreglo de string un campo vacio para diferenciar el termino de lineas
                    textInChunks.push('');
                }
            });
            // join-- Salto de lineas
            text = textInChunks.join('\n');
            // Funcion de editar instanciado en el objeto de editor de texto de VS Code
            editor.edit((editBuilder) => {
                // Instanciar la variable de rango con los paramentros de acuerdo a los valores obtenidos mediante el metodo de seleccion
                //   y la variable de tamaño que se establecio anteriormente para conocer el inicio (posicion) y el final (posicion) del documento
                var range = new vscode.Range(
                    selection.start.line, 0, 
                    selection.end.line,
                    editor.document.lineAt(selection.end.line).text.length
                );
                // Se replaza los datos del objeto de editBuilder con los paramentros del rango y el texto obtenido previamente
                editBuilder.replace(range, text);
            });
        });
    });
    /// Contexto: Agregar --
    context.subscriptions.push(disposable);
}

/// Metodo: Desactivación de la extensión creada
// Se manda a invocar cuando se desactiva la activación de la extensión
export function deactivate() { }
