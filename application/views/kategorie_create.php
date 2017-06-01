<a href="<?php echo base_url() ?>kategorie" class="btn btn-danger float-right">Späť</a>
<h1>Pridať novú kategóriu</h1>
<p>Vytvárate si novú kategóriu.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>
<?php echo form_open(base_url() . 'kategorie/create') ?>

<div class="form-group">
    <?php echo form_label('Názov', 'nazov'); ?>
    <?php echo form_input('nazov', set_value('nazov'), 'class="form-control"'); ?>
</div>

<?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
<?php echo form_close() ?>