import React from "react";
import { Link } from "react-router-dom";

const NavBar = () => {
  return (
    <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <Link class="nav-link " aria-current="page" to="/home">Home</Link>
        </li>
         <li class="nav-item">
          <Link class="nav-link" aria-current="page" to="/travel">Travels</Link>
        </li>
         <li class="nav-item">
          <Link class="nav-link" aria-current="page" to="/login">Login</Link>
        </li>
         <li class="nav-item">
          <Link class="nav-link " aria-current="page" to="/registration">Registration</Link>
              </li>
           <li class="nav-item">
          <Link class="nav-link " aria-current="page" to="/blog">Blog</Link>
        </li>
        
        
        
       
      </ul>
     
    </div>
  </div>
</nav>
    </div>
  );
};

export default NavBar;
