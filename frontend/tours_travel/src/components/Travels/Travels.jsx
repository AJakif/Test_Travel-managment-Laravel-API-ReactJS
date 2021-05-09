import React from "react";
import { Link } from "react-router-dom";

const Travels = () => {
    
    return (
        <div className="container">
            <div className="text-center "> 
               
                    <Link className="btn btn-primary " to="/asia">Asia</Link> &nbsp; &nbsp;
               

                <Link className="btn btn-primary" to="/america">America</Link> &nbsp; &nbsp;

                <Link className="btn btn-primary" to="/europe">Europe</Link> &nbsp; &nbsp;

                <Link className="btn btn-primary" to="canada">Canada</Link> &nbsp; &nbsp;
            </div>
            
        </div>
    );
};
export default Travels;
