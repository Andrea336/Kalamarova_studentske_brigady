<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>">Brigády</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>brigady">Zoznam brigád</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>zamestnavatelia">Zamestnávatelia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>kategorie">Kategórie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>studenti">Študenti</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="template">
    <div class="container">
        <?php if (isset($flash)): ?>
        <div class="alert alert-<?php echo $flash_class ?>" role="alert">
            <?php echo $flash ?>
        </div>
<?php endif; ?>