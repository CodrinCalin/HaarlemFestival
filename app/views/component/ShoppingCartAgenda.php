<div class="container" style="background: #f3f3f3">
    <div id="calendar" data-events='<?php echo htmlspecialchars(json_encode($events), ENT_QUOTES, 'UTF-8'); ?>'></div>
</div>

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<script src="/js/agendaCalendar.js"></script>