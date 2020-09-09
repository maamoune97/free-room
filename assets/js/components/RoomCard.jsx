import React from 'react';
import parse from 'html-react-parser'
import { Link } from 'react-router-dom';

const RoomCard = ({room}) => {
    return ( 
        <div className="card card-room">
                
                <div className="card-header text-center">
                    {room.owner.firstName + ' ' + room.owner.lastName}
                    {/* <small>Pas encore notée!</small> */}
                </div>
                <img src={room.coverImage} className="card-img-top" alt="chambre" />
                <div className="card-body text-center">
                    {/* <h5 className="card-title">{room.title}</h5> */}
                    {/* <p className="card-text">{parse(room.description)}</p> */}
                    {room.surface} m² à <strong>{room.price}</strong> Dh/ mois <br/>
                    {/* <a href="#" className="btn btn-primary">Visiter</a> */}
                </div>
                <div className="card-footer">
                    <a href="#" className="btn btn-outline-danger"> <i className="far fa-heart"></i> m'intersse</a>
                    <Link to={"/room/"+room.id} className="btn btn-primary float-right">Visiter</Link>
                    {/* <a href="#" className="btn btn-primary float-right">Visiter</a> */}
                </div>
            </div>
     );
}
 
export default RoomCard;