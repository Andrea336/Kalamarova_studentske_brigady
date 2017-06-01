<a href="<?php echo base_url() ?>brigady" class="btn btn-danger float-right">Späť</a>
<h1>Pridať novú brigádu</h1>
<p>Vytvorte si novú brigádku.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>
<?php echo form_open(base_url() . 'brigady/create') ?>
<div class="form-group">
    <?php echo form_label('Názov', 'nazov'); ?>
    <?php echo form_input('nazov', set_value('nazov'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Náplň práce', 'napln_prace'); ?>
    <?php echo form_textarea('napln_prace', set_value('napln_prace'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Hodinová sadzba', 'hodinova_sadzba'); ?>
    <?php echo form_input('hodinova_sadzba', set_value('hodinova_sadzba'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Kategória', 'kategoria'); ?>
    <?php echo form_dropdown('kategoria', $kategoria, set_value('kategoria'), 'class="form-control"') ?>
</div>

<div class="form-group">
    <?php echo form_label('Zamestnávateľ', 'zamestnavatel'); ?>
    <?php echo form_dropdown('zamestnavatel', $zamestnavatel, set_value('zamestnavatel'), 'class="form-control"') ?>
</div>

<?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
<?php echo form_close() ?>