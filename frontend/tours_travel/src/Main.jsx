import React from "react";
import Dashboard from "./content/Dashboard"
import Profile from "./content/profile/Profile"
import Editprofile from "./content/profile/Editprofile"
import User from "./content/user/User"
import Cshow from "./content/coupon/Cshow"
import Ccreate from "./content/coupon/Ccreate"
import Empshow from "./content/employee/Empshow"
import Settings from "./content/Settings"
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

const Main = () => {
	return (
		<><div class="wrapper">
			<Navbar />
			<Sidebar />
			<div className="content-wrapper">
				{/* Content Header (Page header) */}
				{/* /.content-header */}
				<div className="container">
					<Main/>
				</div>
			</div>

			<Footer />
		</div>
			
		</>
	);
};
export default Main;
