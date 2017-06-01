<a href="<?php echo base_url() ?>studenti" class="btn btn-danger float-right">Späť</a>
<h1>Upraviť študenta</h1>
<p>Upravovanie študenta.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>

<?php foreach ($query->result() as $row): ?>
    <?php echo form_open(base_url() . 'studenti/edit/' . $row->id) ?>

    <div class="form-group">
        <?php echo form_label('Meno', 'meno'); ?>
        <?php echo form_input('meno', $row->meno, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Priezvisko', 'priezvisko'); ?>
        <?php echo form_input('priezvisko', $row->priezvisko, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Preferencie', 'preferencie'); ?>
        <?php echo form_textarea('preferencie', $row->preferencie, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Predchádzajúce skúsenosti', 'predchadzajuce_skusenosti'); ?>
        <?php echo form_textarea('predchadzajuce_skusenosti', $row->predchadzajuce_skusenosti, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Zručnosti', 'zrucnosti'); ?>
        <?php echo form_textarea('zrucnosti', $row->zrucnosti, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Adresa', 'adresa'); ?>
        <?php echo form_input('adresa', $row->adresa, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Krajina', 'krajina'); ?>
        <?php echo form_dropdown('krajina', $krajina, $row->krajina, 'class="form-control"') ?>
    </div>

    <?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
    <?php echo form_close() ?>
<?php endforeach; ?>
