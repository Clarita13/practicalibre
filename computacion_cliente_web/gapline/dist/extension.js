module.exports =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*Practica de creacion de extension*/
/// Directiva: indicación para los navegadores web que la ejecución debe ser en 
//             modo estricto o se debe utilizar las variables no declaradas

Object.defineProperty(exports, "__esModule", { value: true });
exports.deactivate = exports.activate = void 0;
/// Importación: Incluir el modulo para las extensiones desde el VS Code
const vscode = __webpack_require__(1);
/// Metodo: Activacion de la extensión creada
//         Se manda a invocar cuando se inicializa la activación del proyecto
function activate(context) {
    // ---
    let disposable = vscode.commands.registerCommand('extension.gapline', () => {
        // Activacion del editor de texto de JavaScript
        var editor = vscode.window.activeTextEditor;
        /// Condicional: En caso de que la variable editor se encuentre false por que no contenga ningún componente activo y/o declarado como null
        if (!editor) {
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
            var textInChunks = [];
            // Dentro de la variable 'text' se buscara el parametro establecido dentro de la función de split que son salto de lineas
            text.split('\n').forEach((currentLine, lineIndex) => {
                // Se agrega al arreglo de string, el valor de cada respuesta de la funcion split mediante el forEach
                textInChunks.push(currentLine);
                /// Condicional: Dentro de la condicional se establece que si ---
                if ((lineIndex + 1) % numberOfLines === 0) {
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
                var range = new vscode.Range(selection.start.line, 0, selection.end.line, editor.document.lineAt(selection.end.line).text.length);
                // Se replaza los datos del objeto de editBuilder con los paramentros del rango y el texto obtenido previamente
                editBuilder.replace(range, text);
            });
        });
    });
    /// Contexto: Agregar --
    context.subscriptions.push(disposable);
}
exports.activate = activate;
/// Metodo: Desactivación de la extensión creada
// Se manda a invocar cuando se desactiva la activación de la extensión
function deactivate() { }
exports.deactivate = deactivate;


/***/ }),
/* 1 */
/***/ (function(module, exports) {

module.exports = require("vscode");

/***/ })
/******/ ]);
//# sourceMappingURL=extension.js.map