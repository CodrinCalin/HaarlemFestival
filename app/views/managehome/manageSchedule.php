<?php
include __DIR__ . '/../header.php';
$service = new \App\Services\homeService();
$currentMonthYear = $service->getTextById(1);
$events = $service->getAllEvents();
?>
    <link href="/css/management_style.css" rel="stylesheet">
    <div class="mainManageBody">
        <a href="/managehome"><button class="backButton">< Go Back</button></a>

        <h1>Manage Schedule</h1>
        <h2>Change month and year</h2>
        <div class="row">
            <div class="col-6">
                <h4>Current month and year: </h4>
                <p><?=$currentMonthYear->text?></p>
            </div>
            <div class="col-6">
                <h4>New month and year: </h4>
                <form action="/upload" method="post">
                    <label for="monthYear">New: </label>
                    <input type="text" name="monthYear">
                    <button class="uploadButton" type="submit">Change</button>
                </form>
            </div>

        </div>
        <h2>Change event schedules</h2>
        <?php
        foreach ($events as $event) { ?>
            <div class="row">
                <h4><?= $event->name ?></h4>
                <div class="col-6">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Day</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($event->dates as $date) {?>
                            <tr>
                                <td>
                                    <?=date("d", strtotime($date))?>
                                </td>
                                <td>
                                    <?=date("m", strtotime($date))?>
                                </td>
                                <td>
                                    <?=date("Y", strtotime($date))?>
                                </td>
                                <td>
                                    <a href="">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <button>Add Date</button>
                </div>
            </div>
        <?php }
        ?>


    </div>
<?php
include __DIR__ . '/../footer.php';
?>