<a href="<?php echo base_url() ?>studenti" class="btn btn-danger float-right">Späť</a>
<?php foreach ($query->result() as $row): ?>
    <h1><?php echo $row->meno; ?>&nbsp<?php echo $row->priezvisko ?></h1>
    <hr>
    <h5>Preferencie:</h5>
    <p><?php echo $row->preferencie; ?></p>

    <h5>Predchádzajúce skúsenosti:</h5>
    <p><?php echo $row->predchadzajuce_skusenosti; ?></p>

    <h5>Zručnosti:</h5>
    <p><?php echo $row->zrucnosti; ?></p>

<?php endforeach; ?>
<hr>
<h3 class="mt-5 mb-4">Brigády študenta</h3>
<div class="row">

    <?php foreach ($brigady_studenti->result() as $row): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><?php echo $row->nazov ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Začiatok:</strong>&nbsp;<?php echo $row->odkedy ?></li>
                    <li class="list-group-item"><strong>Koniec:</strong>&nbsp;<?php echo $row->dokedy ?></li>
                    <li class="list-group-item"><strong>Hodinová sadzba:</strong>&nbsp;<?php echo $row->hodinova_sadzba ?> EUR</li>
                    <li class="list-group-item"><strong>Provízia:</strong>&nbsp;<?php echo $row->cisty_zarobok * ($row->provizia * 0.01) . '&nbspEUR&nbsp;(' . $row->provizia . '%)' ?></li>
                    <li class="list-group-item"><strong>Počet hodín:</strong>&nbsp;<?php echo $row->pocet_hodin ?></li>
                    <li class="list-group-item"><strong>Čistý zárobok:</strong>&nbsp;<?php echo $row->cisty_zarobok - ($row->cisty_zarobok * ($row->provizia * 0.01)) ?> EUR</li>
                </ul>
                <div class="card-block">
                    <a href="<?php echo site_url() ?>/brigady_studenti/edit/<?php echo $row->id ?>" class="btn btn-primary">Upraviť</a>
                    <a href="<?php echo site_url() ?>/brigady_studenti/destroy/<?php echo $row->id ?>" class="btn btn-danger">Odstrániť</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>