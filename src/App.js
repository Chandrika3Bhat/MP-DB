import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Login from './components/Login'; // Adjust path as needed
import EventList from './components/EventList'; // Adjust path as needed
import EventRegistration from './components/EventRegistration'; // Adjust path as needed

function App() {
  console.log('App is rendered');
  return (
    <Router>
      <Routes>
        <Route path="/login" element={<Login />} />
        <Route path="/events" element={<EventList />} />
        <Route path="/register/:eventId" element={<EventRegistration />} />
      </Routes>
    </Router>
  );
}

export default App;
