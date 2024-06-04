/**
 * App Calendar Events
 */

'use strict';

let date = new Date();
let nextDay = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
// prettier-ignore
let nextMonth = date.getMonth() === 11 ? new Date(date.getFullYear() + 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() + 1, 1);
// prettier-ignore
let prevMonth = date.getMonth() === 11 ? new Date(date.getFullYear() - 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() - 1, 1);

let events = [
  {
    id: 1,
    url: '',
    title: 'Design Review',
    start: date,
    end: nextDay,
    allDay: false,
    extendedProps: {
      calendar: 'Disetujui'
    }
  },
  {
    id: 2,
    url: '',
    title: 'Take Video PKKMB',
    start: new Date(date.getFullYear(), date.getMonth() + 1, -11),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -10),
    allDay: true,
    extendedProps: {
      calendar: 'Disetujui'
    }
  },
  {
    id: 3,
    url: '',
    title: 'Liputan Wisuda',
    allDay: true,
    start: new Date(date.getFullYear(), date.getMonth() + 1, -9),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -7),
    extendedProps: {
      calendar: 'Pending'
    }
  },
  {
    id: 4,
    url: '',
    title: "Editing Video IST Pak Arie",
    start: new Date(date.getFullYear(), date.getMonth() + 1, -11),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -10),
    extendedProps: {
      calendar: 'Disetujui'
    }
  },
  {
    id: 5,
    url: '',
    title: 'Design Banner',
    start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
    allDay: true,
    extendedProps: {
      calendar: 'Disetujui'
    }
  },
  {
    id: 6,
    url: '',
    title: 'Meditation',
    start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
    allDay: true,
    extendedProps: {
      calendar: 'Personal'
    }
  },
  {
    id: 7,
    url: '',
    title: 'Take Video DN 65',
    start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
    extendedProps: {
      calendar: 'Disetujui'
    }
  },
  {
    id: 8,
    url: '',
    title: 'Product Review',
    start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
    allDay: true,
    extendedProps: {
      calendar: 'Business'
    }
  },
  {
    id: 9,
    url: '',
    title: 'Monthly Meeting',
    start: nextMonth,
    end: nextMonth,
    allDay: true,
    extendedProps: {
      calendar: 'Business'
    }
  },
  {
    id: 10,
    url: '',
    title: 'Monthly Checkup',
    start: prevMonth,
    end: prevMonth,
    allDay: true,
    extendedProps: {
      calendar: 'Personal'
    }
  },
  {
    id: 11,
    url: '',
    title: 'Monthly Pelatihan',
    start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
    allDay: true,
    extendedProps: {
      calendar: 'Pending'
    }
  },
  {
    id: 12,
    url: '',
    title: 'Take Video PKKMB',
    start: new Date(date.getFullYear(), date.getMonth() + 1, -11),
    end: new Date(date.getFullYear(), date.getMonth() + 1, -10),
    allDay: true,
    extendedProps: {
      calendar: 'Pending'
    }
  }
];

