<a href="<?php echo base_url() ?>zamestnavatelia" class="btn btn-danger float-right">Späť</a>
<h1>Pridať nového zamestnávateľa</h1>
<p>Vytvorte si nového zamestnávateľa.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>

<?php foreach ($query->result() as $row): ?>
    <?php echo form_open(base_url() . 'zamestnavatelia/edit/' . $row->id) ?>

    <div class="form-group">
        <?php echo form_label('Meno', 'meno'); ?>
        <?php echo form_input('meno', $row->meno, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Priezvisko', 'priezvisko'); ?>
        <?php echo form_input('priezvisko', $row->priezvisko, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Firma', 'firma'); ?>
        <?php echo form_input('firma', $row->firma, 'class="form-control"'); ?>
    </div>

    <?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
    <?php echo form_close() ?>
<?php endforeach; ?>