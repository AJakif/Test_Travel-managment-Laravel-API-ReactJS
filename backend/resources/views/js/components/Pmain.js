import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import PNav from "./PNav"
import Form from "./packages/Form"


import {
  BrowserRouter as Router,
  Switch,
  Route
} from "react-router-dom";
  
function Pmain(){
  return (
    <Router>
      <pmain>
        <PNav/>
        <Switch>
          <Route path="/packages/index" exact component={List} />
          <Route path="/packages/form"  component={Form} />
          <Route path="/packages/edit/:id" component={Edit} />
        </Switch>
      </pmain>
    </Router>
  )
}

export default Pmain;
// for <div id="main-employee"></div>
ReactDOM.render(<Pmain />, document.getElementById('pmain-packages'));
