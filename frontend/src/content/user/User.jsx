import React, { useEffect, useState } from "react";
import userservice from "../Services/User";

const User = () => {
	const [listUser, setListUser] = useState([]);

	useEffect(() => {
		async function fetchDataUser() {
			const res = await userservice.listUser();
			setListUser(res.data);
		}

		fetchDataUser();
	}, []);

	return (
		<>
			<div>
				<section className="content-header">
					<div className="container-fluid">
						<div className="row mb-2">
							<div className="col-sm-6">
								<h1>User Information</h1>
							</div>
							<div className="col-sm-6">
								<ol className="breadcrumb float-sm-right">
									<li className="breadcrumb-item">
										<a href="/">Home</a>
									</li>
									<li className="breadcrumb-item">
										<a href="/account/dashboard">Dashboard</a>
									</li>
									<li className="breadcrumb-item active">User List</li>
								</ol>
							</div>
						</div>
					</div>
					{/* /.container-fluid */}
				</section>
				{/* Main content */}
				<section className="content">
					<div className="container-fluid">
						<div className="row">
							<div className="col-12">
								<div className="card">
									{/* /.card-header */}
									<div className="card-body">
										<table
											id="example2"
											className="table table-bordered table-hover table-striped"
										>
											<thead>
												<tr>
													<th>Full Name</th>
													<th>User Name</th>
													<th>email</th>
													<th>Phone</th>
													<th>Bloodgroup</th>
													<th>Facebook</th>
													<th>Role</th>
												</tr>
											</thead>
											<tbody>
												{listUser.map((item, i) => {
													return (
														<tr>
															<td>{item.fullname}</td>
															<td>{item.username}</td>
															<td>{item.email}</td>
															<td>{item.phone}</td>
															<td>{item.bloodgroup}</td>
															<td>{item.facebook}</td>
															<td>{item.role}</td>
														</tr>
													);
												})}
												
											</tbody>
										</table>
									</div>
									{/* /.card-body */}
								</div>
								{/* /.card */}
							</div>
							{/* /.col */}
						</div>
						{/* /.row */}
					</div>
					{/* /.container-fluid */}
				</section>
			</div>
		</>
	);
};
export default User;
