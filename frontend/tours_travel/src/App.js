import React from 'react';
import './App.css';
import {BrowserRouter,Route,Switch} from 'react-router-dom';
import AddCustomer from './employee/AddCustomer';
import AddPackage from './employee/AddPackage';
import UpdatePackage from './employee/UpdatePackage';
import Login from './employee/Login';
import Protected from './employee/Protected';
import ViewPackage from './employee/ViewPackage'
import Asia from "./components/Asia/Asia";
import Europe from "./components/Europe/Europe";
import America from "./components/America/America";
import Canada from "./components/Canada/Canada";
import Travels from "./components/Travels/Travels";
import Login from "./components/Login/Login";
import Registration from "./components/Registration/Registration";
import Blog from "./components/Blog/Blog";
import logo from "./logo.svg";
import "./App.css";
import NavBar from "./components/NavBar/NavBar";
import Home from "./components/Home/Home";
import Sidebar from "./Components/Sidebar";
import Footer from "./Components/Footer";
import Navbar from "./Components/Navbar";
import Main from "./Main"
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

function App() {
    return ( 
      <div className="App">
      <BrowserRouter>
     <Switch>
	 
	 <Route path="/" exact component={Dashboard} />
					<Route path="/profile" component={Profile} />
                    <Route path="/profile/edit" component={Editprofile} />
                    <Route path="/user" component={User} />
                    <Route path="/coupon" component={Cshow} />
                    <Route path="/coupon/create" component={Ccreate} />
                    <Route path="/employee" component={Empshow} />
                    <Route path="/settings" component={Settings} />
	 
     <Route path="/login">
      <Login/>
     </Route>

     <Route path="/register">
       <Protected Cmp={AddCustomer}/>
    {/*   <AddCustomer/> */}
     </Route>
    
     <Route path="/add">
       <Protected Cmp={AddPackage} />
      {/* <AddPackage/> */}
     </Route>
    

     <Route path="/update/:p_id">
       <Protected Cmp={UpdatePackage}/>
   {/*    <UpdatePackage/> */}
     </Route>
     <Route path="/">
       <Protected Cmp={ViewPackage} />
    
     </Route>
     </Switch>
     </BrowserRouter>
     </div>
	 
	  <div >
      <Router>
         
            <NavBar></NavBar>
          
        <Switch>
          <Route path="/home">
            <Home></Home>
          </Route>
          
           <Route path="/login">
            <Login></Login>
          </Route>
           <Route path="/registration">
            <Registration></Registration>
          </Route>
           <Route path="/travel">
            <Travels></Travels>
          </Route>
           <Route path="/blog">
            <Blog></Blog>
          </Route>
          {/* <Route path="/home">
            <Home></Home>
          </Route> */}
          <Route path="/navbar">
            <NavBar></NavBar>
          </Route>
          <Route path="/asia">
            <Asia></Asia>
          </Route>
          <Route path="/europe">
            <Europe></Europe>
          </Route>
          <Route path="/america">
            <America></America>
          </Route>
          <Route path="/canada">
            <Canada></Canada>
          </Route>
        </Switch>
      </Router>
    </div>
    );
}

export default App;