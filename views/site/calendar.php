
<?php
//index.php
use yii\bootstrap4\Html;



?>
<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ru.min.js" integrity="sha512-+yvkALwyeQtsLyR3mImw8ie79H9GcXkknm/babRovVSTe04osQxiohc1ukHkBCIKQ9y97TAf2+17MxkIimZOdw==" crossorigin="anonymous"></script>
 <script src="/assets/js/moment.js"></script>
     <script src="/assets/js/ru.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/locales-all.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:false,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay',

            },
       code: 'ru',
       locale: 'ru',
       // monthNames: ['Январь','Февраль','Март','Апрель','Май','οюнь','οюль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
       // monthNamesShort: ['Янв.','Фев.','Март','Апр.','Май','Июнь','Июль','Авг.','Сент.','Окт.','Ноя.','Дек.'],
       // dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
       // dayNamesShort: ["ВС","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
       buttonText: {
           prev: "Назад",
           next: "Вперед",
           prevYear: "Предыдущий год",
           nextYear: "Следующий год",
           today: "Сегодня",
           month: "Месяц",
           week: "Неделя",
           day: "День",

       },

    events: '/web/load.php',
        selectable:true,
    selectHelper:true,
       timeFormat: 'HH:mm' // uppercase H for 24-hour clock
   });
  });

  </script>

 </head>
 <section class="about" data-aos="fade-up">
     <div class="container">
         <a href="/uploads/План%20мероприятий%20УРО%20МООО%20РСО.pdf" class="button_plan"><div class="button_plan_knopka">Скачать план мероприятий</div></a>

     </>
 </section><!-- конец истории -->
</html>