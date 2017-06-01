<a href="<?php echo base_url() ?>studenti" class="btn btn-danger float-right">Späť</a>
<h1>Upraviť brigádu študenta</h1>
<p>Upravovanie brigády študenta.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>

<?php echo form_open(base_url() . 'brigady_studenti/create/') ?>

<div class="form-group">
    <?php echo form_label('Študent', 'student'); ?>
    <?php echo form_dropdown('student', $student, set_value('student'), 'class="form-control"') ?>
</div>

<div class="form-group">
    <?php echo form_label('Brigáda', 'brigada'); ?>
    <?php echo form_dropdown('brigada', $brigada, set_value('brigada'), 'class="form-control"') ?>
</div>

<div class="form-group">
    <?php echo form_label('Odkedy', 'odkedy'); ?>
    <?php echo form_input('odkedy', set_value('odkedy'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Dokedy', 'dokedy'); ?>
    <?php echo form_input('dokedy', set_value('dokedy'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Provízia', 'provizia'); ?>
    <?php echo form_input('provizia', set_value('provizia'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Počet hodín', 'pocet_hodin'); ?>
    <?php echo form_input('pocet_hodin', set_value('pocet_hodin'), 'class="form-control"'); ?>
</div>

<?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
<?php echo form_close() ?>