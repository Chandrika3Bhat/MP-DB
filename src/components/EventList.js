import React, { useState, useEffect } from 'react';

function EventList() {
  const [events, setEvents] = useState([]);

  useEffect(() => {
    // Fetch events data from the backend
    fetch('http://localhost:8000/events.php')
      .then(response => response.json())
      .then(data => {
        console.log('Fetched events:', data);  // Log data to check the result
        setEvents(data);
      })
      .catch(error => console.error('Error fetching events:', error));
  }, []);

  return (
    <div>
      <h1>Event List</h1>
      {events.length > 0 ? (
        <ul>
          {events.map(event => (
            <li key={event.event_id}>
              <h3>{event.name}</h3>
              <p>{event.date} at {event.time}</p>
              <p>Location: {event.venue}</p>
            </li>
          ))}
        </ul>
      ) : (
        <p>No events available.</p>
      )}
    </div>
  );
}

export default EventList;
