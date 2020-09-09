import React, { useEffect, useState } from 'react';
import Axios from 'axios';

const ShowRoomPage = (props) => {
    
    const [room, setRoom] = useState([])

    useEffect(() => {
        const fetchRoom = async () =>{
            const id = +props.match.params.id;
            const data = await Axios.get("http://localhost:8000/api/rooms/"+id).then( response => response.data)

            setRoom(data)
        }
        fetchRoom()
    }, [])
    console.log(room);
    return ( 
        <>
            <h1>{room.title}</h1>
        </>
     );
}
 
export default ShowRoomPage;