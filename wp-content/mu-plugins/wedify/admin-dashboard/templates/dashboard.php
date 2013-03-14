<?php
$user = AdminDashboard::getUserData();
?>

<div class="wrap">
    <h2>Hallo <?php echo $user['firstName'] ?></h2>

    <div class="dashboard">

        <div class="accordion" id="dashboard-accordion">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="dashboard-accordion" href="#demo1">
                        Bildergalerie erstellen
                    </a>
                </div>
                <div id="demo1" class="accordion-body collapse">
                    <div class="accordion-inner">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="dashboard-accordion" href="#demo2">
                        Standesamt Daten eingeben
                    </a>
                </div>
                <div id="demo2" class="accordion-body collapse">
                    <div class="accordion-inner">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>