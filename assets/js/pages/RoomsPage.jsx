import React, { useEffect, useState } from 'react';
import axios from 'axios';
import RoomCard from '../components/roomCard';

const RoomPage = (props) => {

    const [rooms, setRooms] = useState([])

    useEffect(() => {
        axios.get("http://localhost:8000/api/rooms").then(response => response.data['hydra:member']).then(data => {
            setRooms(data)
        })

    }, [])

    return (
        <>
            <h1 className="mb-4">Chambres disponibles</h1>
            <div className="row">
                {rooms.map(room => (
                    <div className="col-md-4 mb-4" key={room.id}>
                        <RoomCard room={room}/>
                    </div>
                ) )}
            </div>
        </>
    );
}

export default RoomPage;