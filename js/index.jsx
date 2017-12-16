import './scroll.js';
import './responsive.js';
import Menu from './nav.jsx';
import React from "react";
import ReactDOM from "react-dom";	

const menuNav = document.getElementById("menu-nav");

ReactDOM.render(<Menu />, menuNav);


$(document).ready(function(){

	var nav = $('#nav');
	var menu = $("#menu");

	//Redimensionamiento automático
	$(window).resize(function(){

		nav.removeClass('nav1');
		nav.removeClass('nav2');
		menu.css("height",$(this).height());

		ReactDOM.render(<Menu />, menuNav);

	})

});