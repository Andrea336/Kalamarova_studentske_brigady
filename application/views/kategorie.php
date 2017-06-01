<h1>Kategórie</h1>
<p>Kategórie brigád.</p>

<table class="table" id="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Názov</th>
        <th>Akcia</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($query->result() as $row): ?>
        <tr>
            <th scope="row"><?php echo $row->id ?></th>
            <td><?php echo $row->nazov ?></td>
            <td>
                <a href="<?php echo base_url() ?>kategorie/edit/<?php echo $row->id ?>" class="btn btn-primary btn-sm">Upraviť</a>
                <a href="<?php echo base_url() ?>kategorie/destroy/<?php echo $row->id ?>" class="btn btn-danger btn-sm">Odstrániť</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo base_url() ?>kategorie/create" class="btn btn-success btn-lg mt-4">Vytvoriť novú kategóriu</a>