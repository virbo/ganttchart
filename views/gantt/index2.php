<?php
use yii\helpers\Json;
$this->title = 'Gantt Chart';
?>

<!-- Sertakan library dhtmlxGantt -->
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
<link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">

<style>
    html, body {
        height: 100%;
        padding: 0;
        margin: 0;
        overflow: hidden;
    }

    #gantt_here {
        width: 100%;
        height: 800px;
    }
</style>

<div id="gantt_here"></div>

<script type="text/javascript">
    // Data dari controller
    var tasks = {
        data: <?= Json::encode($tasks) ?>
    };

    // Konfigurasi Gantt Chart
    gantt.config.columns = [
        {name: "text", label: "Task name", width: "*", tree: true},
        {name: "start_date", label: "Start date", align: "center"},
        {name: "end_date", label: "End date", align: "center"},
        {name: "progress", label: "Progress", align: "center"}
    ];

    // Inisialisasi Gantt Chart
    gantt.init("gantt_here");

    // Parsing data ke Gantt Chart
    gantt.parse({
        data: tasks.data.map(function(task) {
            return {
                id: task.task_id,
                text: task.name,
                start_date: task.start_date,
                end_date: task.end_date,
                progress: task.progress / 100,
                parent: task.parent_id ? task.parent_id : 0
            };
        })
    });
</script>
