$(document).ready(function() {

    // page is now ready, initialize the calendar...

  $('#calendar').fullCalendar({
    defaultView: 'month', //Possible Values: month, basicWeek, basicDay, agendaWeek, agendaDay
    header: { 
      left:   'title',
      center: '',
      right:  'today prevYear,prev,next,nextYear', //Possible Values: month, basicWeek, basicDay, agendaWeek, agendaDay, today prevYear,prev,next,nextYear
    },
    buttonIcons :{
      prev: 'left-single-arrow',
      next: 'right-single-arrow',
      prevYear: 'left-double-arrow',
      nextYear: 'right-double-arrow'
    }
    });

});