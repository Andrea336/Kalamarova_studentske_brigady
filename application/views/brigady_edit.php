<a href="<?php echo base_url() ?>brigady" class="btn btn-danger float-right">Späť</a>
<h1>Upraviť brigádu</h1>
<p>Nižšie upravíte aktuálnu brigádu.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>

<?php foreach ($query->result() as $row): ?>
    <?php echo form_open(base_url() . 'brigady/edit/' . $row->id) ?>
    <div class="form-group">
        <?php echo form_label('Názov', 'názov'); ?>
        <?php echo form_input('nazov', $row->nazov, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Náplň práce', 'napln_prace'); ?>
        <?php echo form_textarea('napln_prace', $row->napln_prace, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Hodinová sadzba', 'hodinova_sadzba'); ?>
        <?php echo form_input('hodinova_sadzba', $row->hodinova_sadzba, 'class="form-control"'); ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Kategória', 'kategoria'); ?>
        <?php echo form_dropdown('kategoria', $kategoria, $row->kategoria, 'class="form-control"') ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Zamestnávateľ', 'zamestnavatel'); ?>
        <?php echo form_dropdown('zamestnavatel', $zamestnavatel, $row->zamestnavatel, 'class="form-control"') ?>
    </div>

    <?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
    <?php echo form_close() ?>
<?php endforeach; ?>