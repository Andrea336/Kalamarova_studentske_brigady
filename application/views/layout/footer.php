</div>
</div>

<?php if (!$this->uri->segment(1)): ?>
<script>
    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [
                <?php foreach ($first_chart->result() as $row): ?>
                <?php echo '"' . $row->meno . '", '; ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                label: "Študenti, ktorí zarobili najviac peňazí",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php foreach ($first_chart->result() as $row): ?>
                    <?php echo $row->zarobok . ', '; ?>
                    <?php endforeach; ?>
                ],
            }]
        },

        // Configuration options go here
        options: {
        }
    });


    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var chart2 = new Chart(ctx2, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [
                <?php foreach ($second_chart->result() as $row): ?>
                <?php echo '"' . $row->krajina . '", '; ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                label: "Študenti podľa krajín",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php foreach ($second_chart->result() as $row): ?>
                    <?php echo $row->pocet . ', '; ?>
                    <?php endforeach; ?>
                ],
            }]
        },

        // Configuration options go here
        options: {
        }
    });
</script>
<?php endif; ?>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/app.js"></script>
</body>
</html>