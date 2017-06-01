<a href="<?php echo base_url() ?>zamestnavatelia" class="btn btn-danger float-right">Späť</a>
<h1>Pridať nového zamestnávateľa</h1>
<p>Vytvorte si nového zamestnávateľa.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>
<?php echo form_open(base_url() . 'zamestnavatelia/create') ?>

<div class="form-group">
    <?php echo form_label('Meno', 'meno'); ?>
    <?php echo form_input('meno', set_value('meno'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Priezvisko', 'priezvisko'); ?>
    <?php echo form_input('priezvisko', set_value('priezvisko'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Firma', 'firma'); ?>
    <?php echo form_input('firma', set_value('firma'), 'class="form-control"'); ?>
</div>

<?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
<?php echo form_close() ?>