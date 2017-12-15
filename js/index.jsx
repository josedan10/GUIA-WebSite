import './navbar.js';
import './scroll.js';
import './responsive.js';
import Menu from './nav.jsx';
import React from "react";
import ReactDOM from "react-dom";	

const nav = document.getElementById("nav");

ReactDOM.render(<Menu />, nav);