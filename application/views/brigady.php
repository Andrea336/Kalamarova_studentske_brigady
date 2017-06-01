<h1>Brigády</h1>
<p>Nižšie je zobrazený zoznam všetkých dostupných brigád v našej agentúre.</p>

<table class="table" id="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Názov</th>
        <th>Kategória</th>
        <th>Zamestnávateľ</th>
        <th>Akcia</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($query->result() as $row): ?>
        <tr>
            <th scope="row"><?php echo $row->id ?></th>
            <td><a href="<?php echo base_url() ?>brigady/show/<?php echo $row->id ?>"><?php echo $row->nazov ?></td>
            <td><?php echo $row->kategoria ?></td>
            <td><?php echo $row->zamestnavatel ?></td>
            <td>
                <a href="<?php echo base_url() ?>brigady/edit/<?php echo $row->id ?>" class="btn btn-primary btn-sm">Upraviť</a>
                <a href="<?php echo base_url() ?>brigady/destroy/<?php echo $row->id ?>" class="btn btn-danger btn-sm">Odstrániť</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo base_url() ?>brigady/create" class="btn btn-success btn-lg mt-4">Vytvoriť novú brigádu</a>