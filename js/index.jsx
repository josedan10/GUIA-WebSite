//import './scroll.js';
import './responsive.js';
//import NavBar from './nav';
import {MenuNav} from './nav';
import React from "react";
import ReactDOM from "react-dom";	

const app = document.getElementById("app");
const menuNav = document.getElementById("menu-nav");

ReactDOM.render(<MenuNav />, menuNav);


$(document).ready(function(){

	var nav = $('#nav');
	var menu = $("#menu");

	//Redimensionamiento automático
	$(window).resize(function(){

		nav.removeClass('nav1');
		nav.removeClass('nav2');
		menu.css("height",$(this).height());

		ReactDOM.render(<MenuNav />, menuNav);

	})

});
