// src/calendar.js
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin],
        initialView: 'dayGridMonth',
        events: [
            {
                title: 'Holiday',
                start: '2024-05-01'
            },
            {
                title: 'Annual Day Celebration',
                start: '2024-05-15'
            },
            {
                title: 'Art Exhibition',
                start: '2024-05-25'
            }
        ]
    });
    calendar.render();
});
