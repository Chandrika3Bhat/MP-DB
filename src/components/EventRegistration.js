import React, { useState, useEffect } from 'react';
import axios from 'axios';

function EventRegistration({ match }) {
  const [event, setEvent] = useState(null);

  useEffect(() => {
    const fetchEvent = async () => {
      const result = await axios(`http://localhost/your_php_path/events.php?id=${match.params.eventId}`);
      setEvent(result.data);
    };
    fetchEvent();
  }, [match.params.eventId]);

  const handleRegister = async () => {
    await axios.post('http://localhost/your_php_path/register.php', { eventId: event.id });
    alert('Registration successful');
  };

  if (!event) return <div>Loading...</div>;

  return (
    <div>
      <h2>{event.title}</h2>
      <p>{event.description}</p>
      <button onClick={handleRegister}>Register</button>
    </div>
  );
}

export default EventRegistration;
