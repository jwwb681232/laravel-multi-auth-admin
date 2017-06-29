/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 2.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v2.0/admin/html/
*/

var handleCalendarDemo = function() {
    
	$('#external-events .fc-event').each(function() {
	
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true, // maintain when user navigates (see docs on the renderEvent method)
            color: ($(this).attr('data-color')) ? $(this).attr('data-color') : ''
        });
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
    });
    
    var date = new Date();
    var currentYear = date.getFullYear();
    var currentMonth = date.getMonth() + 1;
        currentMonth = (currentMonth < 10) ? '0' + currentMonth : currentMonth;
    
    $('#calendar').fullCalendar({
        header: {
            left: 'month,agendaWeek,agendaDay',
            center: 'title',
            right: 'prev,today,next '
        },
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function() {
            $(this).remove();
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end
                };
                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            $('#calendar').fullCalendar('unselect');
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [{
            title: 'All Day Event',
            start: currentYear + '-'+ currentMonth +'-01',
            color: '#00acac'
        }, {
            title: 'Long Event',
            start: currentYear + '-'+ currentMonth +'-07',
            end: currentYear + '-'+ currentMonth +'-10'
        }, {
            id: 999,
            title: 'Repeating Event',
            start: currentYear + '-'+ currentMonth +'-09T16:00:00',
            color: '#00acac'
        }, {
            id: 999,
            title: 'Repeating Event',
            start: currentYear + '-'+ currentMonth +'-16T16:00:00'
        }, {
            title: 'Conference',
            start: currentYear + '-'+ currentMonth +'-11',
            end: currentYear + '-'+ currentMonth +'-13'
        }, {
            title: 'Meeting',
            start: currentYear + '-'+ currentMonth +'-12T10:30:00',
            end: currentYear + '-'+ currentMonth +'-12T12:30:00',
            color: '#00acac'
        }, {
            title: 'Lunch',
            start: currentYear + '-'+ currentMonth +'-12T12:00:00',
            color: '#348fe2'
        }, {
            title: 'Meeting',
            start: currentYear + '-'+ currentMonth +'-12T14:30:00'
        }, {
            title: 'Happy Hour',
            start: currentYear + '-'+ currentMonth +'-12T17:30:00'
        }, {
            title: 'Dinner',
            start: currentYear + '-'+ currentMonth +'-12T20:00:00'
        }, {
            title: 'Birthday Party',
            start: currentYear + '-'+ currentMonth +'-13T07:00:00'
        }, {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: currentYear + '-'+ currentMonth +'-28',
            color: '#ff5b57'
        }]

    });
};

var Calendar = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleCalendarDemo();
        }
    };
}();