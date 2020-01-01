<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script src="<?= base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/js/bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('.myModal').click(function(event) {
            event.preventDefault();
            $('.modal a').attr('href', $(this).attr('href'))
        });
    });
</script>
<script>
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var s_year = parseInt($('#year').val(), 10);
            var year = parseFloat(data[5]) || 0; // use data for the age column

            return true;
        }
    );

    $(document).ready(function() {
        var mytable = $('#mytable').DataTable({
            // "searching": false,
            columnDefs: [{
                targets: 0,
                checkboxes: {
                    'selectRow': true
                }
            }],
            select: {
                style: 'multi'
            },
            order: [
                [1, 'asc']
            ]
        })


        $('.checkitem').change(function() {
            if ($(this).is(':checked')) {
                $('#del').prop('disabled', false);
                $('#terima').prop('disabled', false);
            } else {
                $('#del').prop('disabled', true);
                $('#terima').prop('disabled', true);
            }

            // $('#del').attr('value', 'keren')
        })

        $('#checkall').change(function() {
            $('.checkitem').prop("checked", $(this).prop("checked"))
            if ($('.checkitem').is(':checked')) {
                $('#del').prop('disabled', false);
                $('#terima').prop('disabled', false);
            } else {
                $('#del').prop('disabled', true);
                $('#terima').prop('disabled', true);
            }
        })
        // $('#terima').click(function() {
        //     $('#myform').attr('action', '<?= base_url('/lolos/index/') ?>')
        //     $("#myform").submit(); // Submit form
        // })
        $("#del").click(function(e) {
            var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?");
            if (confirm) // Jika user mengklik tombol "Ok"
                $('#myform').attr('action', '<?= base_url('/lolos/delete/') ?>')
            $('#terima').attr('name', '')
            $("#myform").submit(); // Submit form
        });
    })
</script>

</body>

</html>