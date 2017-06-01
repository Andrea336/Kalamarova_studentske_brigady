<h1>Študenti</h1>
<p>Nižšie je zobrazený zoznam všetkých študentov v našej agentúre.</p>

<table class="table" id="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Meno</th>
        <th>Adresa</th>
        <th>Krajina</th>
        <th>Akcia</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($query->result() as $row): ?>
        <tr>
            <th scope="row"><?php echo $row->id ?></th>
            <td><a href="<?php echo base_url() ?>studenti/show/<?php echo $row->id ?>"><?php echo $row->meno ?>&nbsp<?php echo $row->priezvisko; ?></a></td>
            <td><?php echo $row->adresa ?></td>
            <td><?php echo $row->krajina ?></td>
            <td>
                <a href="<?php echo base_url() ?>studenti/edit/<?php echo $row->id ?>" class="btn btn-primary btn-sm">Upraviť</a>
                <a href="<?php echo base_url() ?>studenti/destroy/<?php echo $row->id ?>" class="btn btn-danger btn-sm">Odstrániť</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo base_url() ?>studenti/create" class="btn btn-success btn-lg mt-4">Vytvoriť nového študenta</a>
<a href="<?php echo base_url() ?>brigady_studenti/create" class="btn btn-info btn-lg mt-4">Prideliť študentovi brigádu</a>