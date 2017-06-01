<a href="<?php echo base_url() ?>kategorie" class="btn btn-danger float-right">Späť</a>
<h1>Upraviť kategóriu</h1>
<p>Nižšie upravíte zvolenú kategóriu.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>

<?php foreach ($query->result() as $row): ?>
    <?php echo form_open(base_url() . 'kategorie/edit/' . $row->id) ?>

    <div class="form-group">
        <?php echo form_label('Názov', 'nazov'); ?>
        <?php echo form_input('nazov', $row->nazov, 'class="form-control"'); ?>
    </div>

    <?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
    <?php echo form_close() ?>
<?php endforeach; ?>
