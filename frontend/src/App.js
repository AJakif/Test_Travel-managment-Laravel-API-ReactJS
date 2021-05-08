import React from 'react';
import './App.css';
import {BrowserRouter,Route,Switch} from 'react-router-dom';
import AddCustomer from './employee/AddCustomer';
import AddPackage from './employee/AddPackage';
import UpdatePackage from './employee/UpdatePackage';
import Login from './employee/Login';
import Protected from './employee/Protected';
import ViewPackage from './employee/ViewPackage'

function App() {
    return ( 
      <div className="App">
      <BrowserRouter>
     <Switch>
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
    );
}

export default App;