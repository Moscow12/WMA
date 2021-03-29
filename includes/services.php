<style>


table{
    border:1px solid #ccc;
    border-collapse:collapse;

}

table ,th,td{
    padding:3px !important;
    border:1px solid #ccc;
    border-collapse:collapse;
}

</style>

<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>

    <script scr='https://code.jquery.com/jquery-3.5.1.js'></script>
    <script scr='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>
    <script scr='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js'></script>

    <div class="form-container">
        <h2 style="padding:10px;font-weight:bold">Sevices Report</h2>


        <table id="example" class="table table-striped table-condensed table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Customer Name</th>
                    <th>Service</th>
                    <th>Reference Number</th>
                    <th>Amount Paid</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Juma Mlevi</td>
                    <td>none</td>
                    <td>2324334342</td>
                    <td><?=number_format(20000); ?></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Asha Abdallah</td>
                    <td>none</td>
                    <td>2324334342</td>
                    <td><?=number_format(20000); ?></td>
                </tr>

            </tbody>
        </table>
                
    </div>
</div>
<script src="">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>