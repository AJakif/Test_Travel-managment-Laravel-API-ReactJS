import React from "react";
import { Link,useHistory } from "react-router-dom";
import { Navbar, Nav, NavDropdown } from "react-bootstrap";

function Header() {
  let user = JSON.parse(localStorage.getItem('User-Info'))
  const history = useHistory();
function logOut(){
 localStorage.clear();
 history.push('/login')
}

  console.warn(user)
  return (
    <div>
      <Navbar bg="dark" variant="dark">
        <Navbar.Brand href="#home">Tours And Travels</Navbar.Brand>
        <Nav className="mr-auto navbar_warapper">
          {localStorage.getItem("User-Info") ? (
            <>
            <Link to="/">Package List</Link>
              <Link to="/add">Add Package</Link>
              <Link to="/update">Update Package</Link>
              <Link to="/register">Add Customer</Link>
            </>
          ) : (
            <>
              <Link to="/login">Login</Link>
            </>
          )}
        </Nav>
        {localStorage.getItem("User-Info") ?
        <Nav>
          <NavDropdown title={user && user.fullname}>
            <NavDropdown.Item onClick={logOut}>Logout</NavDropdown.Item>
          </NavDropdown>
            </Nav>
            :null
          }
      </Navbar>
      <br />
    </div>
  );
}

export default Header;
