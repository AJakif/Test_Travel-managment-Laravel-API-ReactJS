import "./App.css";
import Sidebar from "./Components/Sidebar";
import Footer from "./Components/Footer";
import Navbar from "./Components/Navbar";
import Main from "./Main"
function App() {
	return (
		<div class="wrapper">
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
	);
}

export default App;
