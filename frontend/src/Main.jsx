import React from "react";
import Dashboard from "./content/Dashboard"
import Profile from "./content/profile/Profile"
import Editprofile from "./content/profile/Editprofile"
import User from "./content/user/User"
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

const Main = () => {
	return (
		<>
			<Router>
				<Switch>
					<Route path="/" exact component={Dashboard} />
					<Route path="/profile" component={Profile} />
                    <Route path="/profile/edit" component={Editprofile} />
                    <Route path="/user" component={User} />
				</Switch>
			</Router>
		</>
	);
};
export default Main;
