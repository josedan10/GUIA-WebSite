// import './navbar.js';
// import './scroll.js';
// import './responsive.js';
// 


import React from "react";
import ReactDOM from "react-dom";

class Salida extends React.Component{

	render() {
		return(
			<h1>React está funcionando</h1>
		);
	}
}

const app = document.getElementById('app');

ReactDOM.render(<Salida />, app);