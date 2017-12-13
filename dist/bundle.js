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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__navbar_js__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__navbar_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__navbar_js__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__scroll_js__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__scroll_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__scroll_js__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__responsive_js__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__responsive_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__responsive_js__);




/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
__webpack_require__(0);
module.exports = __webpack_require__(5);


/***/ }),
/* 2 */
/***/ (function(module, exports) {

$(document).ready(function(){

	var menu = $("#menu");

	$('#menu-icon').click(function(){
		/*Desplegamos el menu*/

		menu.css("display", "flex");
		menu.height($(window).height());
		$('body').css("overflow", "hidden");
		
	});

	//Redimensionamiento automático
	$(window).resize(function(){

		menu.css("height",$(this).height());
	})

	//Cerramos el menu
	var cerrarIcon = $("#cerrar-menu");
	cerrarIcon.click(function(){
		menu.css("display", "none");
		$('body').css("overflow", "scroll");
	})

});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

$(document).ready(function(){

	//Este script controla la animación de slide de los enlaces que hay en la nav-bar

	var	linkInicio = $("a[href='#inicio']"),
		linkNosotros = $("a[href='#nosotros']"),
		linkMiembros = $("a[href='#miembros']"),
		linkContacto = $("a[href='#contacto']");

	var menu = $("#menu");


	linkInicio.click(animacionDeScroll);
	linkNosotros.click(animacionDeScroll);
	linkMiembros.click(animacionDeScroll);
	linkContacto.click(animacionDeScroll);

	function animacionDeScroll(){

		// Verificamos que el hash no sea nulo o undefined
	    if (this.hash !== "") {
		    // Prevent default anchor click behavior
		    event.preventDefault();

		    // Guardamos el hash
		    var hash = this.hash;
		    menu.css("display", "none");

	    	if(hash == "#inicio"){
		      	
	      		//En este la posicion es 0 absoluta
	      		$('html, body').animate({
			        scrollTop: 0
			    }, 800, function(){
			   
			    // Agregamos el hash (#) al URL cuando haga scroll (default click behavior)
			        window.location.hash = "";
			   		
			    });

	      	}else{


		    	var posicionDelHash = $(hash).offset().top;

			    // El valor (800) es el tiempo de la animacion en ms
			    $('html, body').animate({
			        scrollTop: posicionDelHash
			    	}, 800, function(){
			   
			    // Agregamos el hash (#) al URL cuando haga scroll (default click behavior)
			        window.location.hash = hash;
			        
			    });
			}
	     
	    } 

	}

});

/***/ }),
/* 4 */
/***/ (function(module, exports) {

//Ajuste de la barra de busqueda
$(document).ready(function(){

	var barra = $('#input-buscar');
	var mapa = $("#mapa");
	var moduloContacto = $("#contacto");
	var formulario = $("#formulario");
	var swiperContainer = $('#inicio');

	function responsive(){

		var anchoNavegador = $(window).width();
		var largoNavegador = $(window).height();

		//Barra de búsqueda del blog
		if(barra != null && barra != undefined){
			barra.css("width",$("#blog").width() - 60);
		}
		
		//Mapa de modulo de Contacto
		if(mapa != null && mapa != undefined){
			
			if(anchoNavegador < 500){
				mapa.width(anchoNavegador - 50);
				mapa.height((anchoNavegador * 3) / 4);
			}else{
				mapa.width(anchoNavegador - 100);
				mapa.height(330);
			}
		}

		//Formulario del modulo de Contacto
		if(formulario != null && formulario != undefined){

			if (anchoNavegador < 300){
				formulario.width(anchoNavegador - 120);
			}

		}

		//Ajuste del tamaño del swiper
		if(swiperContainer != null && swiperContainer != undefined){

			if(largoNavegador > 460){

				swiperContainer.height(largoNavegador - 74);
			}
		}


	}

	responsive();

	$(window).resize(responsive);
});

		

/***/ }),
/* 5 */
/***/ (function(module, exports) {

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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "/dist";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__navbar_js__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__navbar_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__navbar_js__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__scroll_js__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__scroll_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__scroll_js__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__responsive_js__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__responsive_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__responsive_js__);




/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
__webpack_require__(0);
(function webpackMissingModule() { throw new Error("Cannot find module \"./dist/bundle.js\""); }());


/***/ }),
/* 2 */
/***/ (function(module, exports) {

$(document).ready(function(){

	var menu = $("#menu");

	$('#menu-icon').click(function(){
		/*Desplegamos el menu*/

		menu.css("display", "flex");
		menu.height($(window).height());
		$('body').css("overflow", "hidden");
		
	});

	//Redimensionamiento automático
	$(window).resize(function(){

		menu.css("height",$(this).height());
	})

	//Cerramos el menu
	var cerrarIcon = $("#cerrar-menu");
	cerrarIcon.click(function(){
		menu.css("display", "none");
		$('body').css("overflow", "scroll");
	})

});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

$(document).ready(function(){

	//Este script controla la animación de slide de los enlaces que hay en la nav-bar

	var	linkInicio = $("a[href='#inicio']"),
		linkNosotros = $("a[href='#nosotros']"),
		linkMiembros = $("a[href='#miembros']"),
		linkContacto = $("a[href='#contacto']");

	var menu = $("#menu");


	linkInicio.click(animacionDeScroll);
	linkNosotros.click(animacionDeScroll);
	linkMiembros.click(animacionDeScroll);
	linkContacto.click(animacionDeScroll);

	function animacionDeScroll(){

		// Verificamos que el hash no sea nulo o undefined
	    if (this.hash !== "") {
		    // Prevent default anchor click behavior
		    event.preventDefault();

		    // Guardamos el hash
		    var hash = this.hash;
		    menu.css("display", "none");

	    	if(hash == "#inicio"){
		      	
	      		//En este la posicion es 0 absoluta
	      		$('html, body').animate({
			        scrollTop: 0
			    }, 800, function(){
			   
			    // Agregamos el hash (#) al URL cuando haga scroll (default click behavior)
			        window.location.hash = "";
			   		
			    });

	      	}else{


		    	var posicionDelHash = $(hash).offset().top;

			    // El valor (800) es el tiempo de la animacion en ms
			    $('html, body').animate({
			        scrollTop: posicionDelHash
			    	}, 800, function(){
			   
			    // Agregamos el hash (#) al URL cuando haga scroll (default click behavior)
			        window.location.hash = hash;
			        
			    });
			}
	     
	    } 

	}

});

/***/ }),
/* 4 */
/***/ (function(module, exports) {

//Ajuste de la barra de busqueda
$(document).ready(function(){

	var barra = $('#input-buscar');
	var mapa = $("#mapa");
	var moduloContacto = $("#contacto");
	var formulario = $("#formulario");
	var swiperContainer = $('#inicio');

	function responsive(){

		var anchoNavegador = $(window).width();
		var largoNavegador = $(window).height();

		//Barra de búsqueda del blog
		if(barra != null && barra != undefined){
			barra.css("width",$("#blog").width() - 60);
		}
		
		//Mapa de modulo de Contacto
		if(mapa != null && mapa != undefined){
			
			if(anchoNavegador < 500){
				mapa.width(anchoNavegador - 50);
				mapa.height((anchoNavegador * 3) / 4);
			}else{
				mapa.width(anchoNavegador - 100);
				mapa.height(330);
			}
		}

		//Formulario del modulo de Contacto
		if(formulario != null && formulario != undefined){

			if (anchoNavegador < 300){
				formulario.width(anchoNavegador - 120);
			}

		}

		//Ajuste del tamaño del swiper
		if(swiperContainer != null && swiperContainer != undefined){

			if(largoNavegador > 460){

				swiperContainer.height(largoNavegador - 74);
			}
		}


	}

	responsive();

	$(window).resize(responsive);
});

		

/***/ })
/******/ ]);

/***/ })
/******/ ]);