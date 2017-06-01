<a href="<?php echo base_url() ?>brigady" class="btn btn-danger float-right">Späť</a>
<?php foreach ($query->result() as $row): ?>
    <h1><?php echo $row->nazov; ?></h1>
    <p><?php echo $row->napln_prace; ?></p>
    <div class="row">
        <div class="col-md-4"><strong>Hodinová sadzba:</strong>&nbsp<?php echo $row->hodinova_sadzba ?>&nbspEUR</div>
        <div class="col-md-4"><strong>Kategória:</strong>&nbsp<?php echo $row->kategoria ?></div>
        <div class="col-md-4"><strong>Zamestnávateľ:</strong>&nbsp<?php echo $row->zamestnavatel ?></div>
    </div>
<?php endforeach; ?>