<h1>Zamestnávatelia</h1>
<p>Nižšie sú zobrazení všetci zamestnávatelia.</p>

<table class="table" id="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Meno</th>
        <th>Priezvisko</th>
        <th>Firma</th>
        <th>Akcia</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($query->result() as $row): ?>
        <tr>
            <th scope="row"><?php echo $row->id ?></th>
            <td><?php echo $row->meno ?></td>
            <td><?php echo $row->priezvisko ?></td>
            <td><?php echo $row->firma ?></td>
            <td>
                <a href="<?php echo base_url() ?>zamestnavatelia/edit/<?php echo $row->id ?>" class="btn btn-primary btn-sm">Upraviť</a>
                <a href="<?php echo base_url() ?>zamestnavatelia/destroy/<?php echo $row->id ?>" class="btn btn-danger btn-sm">Odstrániť</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo base_url() ?>zamestnavatelia/create" class="btn btn-success btn-lg mt-4">Vytvoriť nového zamestnávateľa</a>