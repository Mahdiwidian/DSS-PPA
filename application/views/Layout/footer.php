<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.myModal').click(function(event) {
            event.preventDefault();
            $('.modal a').attr('href', $(this).attr('href'))
        });
    });
</script>
<script>
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
        $('#checkall').change(function() {
            $('.checkitem').prop("checked", $(this).prop("checked"))
        })
        // $('#view').click(function(e){
        //     var id = $('.checkitem:checked').map(function(){
        //         return $(this).val()
        //     }).get().join(',')
        //     // alert(id)
        //     $("#view-rows").text(id)
        //     e.preventDefault()
        // })
        // $("#myform").on('submit', function(e) {
        //     var form = this;
        //     var rowsel = $('.checkitem:checked').map(function() {
        //         return $(this).val()
        //     }).get().join(',')

        //     // $.each(rowsel, function(index, rowId){
        //     //     $(form).append(
        //     //         $('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId)
        //     //     )
        //     // })

        //     $("#view-rows").text(rowsel)
        //     $("#view-form").text($(form).serialize())
        //     $('input[name="id\[\]"]', form).remove()
        //     e.preventDefault()
        // })
        $("#del").click(function(e) {
            var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?");
            if (confirm) // Jika user mengklik tombol "Ok"
                $("#myform").submit(); // Submit form
        });
    })
</script>

</body>

</html>