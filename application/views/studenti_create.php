<a href="<?php echo base_url() ?>studenti" class="btn btn-danger float-right">Späť</a>
<h1>Pridať nového študenta</h1>
<p>Pre pridanie nového študenta vyplnte formulár nižšie.</p>

<?php echo validation_errors('<div class="row"><div class="col"><div class="alert alert-danger">', '</div></div></div>'); ?>
<?php echo form_open(base_url() . 'studenti/create') ?>

<div class="form-group">
    <?php echo form_label('Meno', 'meno'); ?>
    <?php echo form_input('meno', set_value('meno'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Priezvisko', 'priezvisko'); ?>
    <?php echo form_input('priezvisko', set_value('priezvisko'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Preferencie', 'preferencie'); ?>
    <?php echo form_textarea('preferencie', set_value('preferencie'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Predchádzajúce skúsenosti', 'predchadzajuce_skusenosti'); ?>
    <?php echo form_textarea('predchadzajuce_skusenosti', set_value('predchadzajuce_skusenosti'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Zručnosti', 'zrucnosti'); ?>
    <?php echo form_textarea('zrucnosti', set_value('zrucnosti'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Adresa', 'adresa'); ?>
    <?php echo form_input('adresa', set_value('adresa'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Krajina', 'krajina'); ?>
    <?php echo form_dropdown('krajina', $krajina, set_value('krajina'), 'class="form-control"') ?>
</div>

<?php echo form_submit('submit', 'Odoslať', 'class="btn btn-primary"') ?>
<?php echo form_close() ?>