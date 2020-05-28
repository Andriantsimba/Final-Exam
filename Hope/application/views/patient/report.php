<html>
<head>
<title>Report Table</title>
<style type="text/css">

#outtable{
    padding: 20px;
    border:1px solid #e3e3e3";
    width: 900px;
    border-radius: 5px;
}
.short{
    width: 30px;
}
.normal{
    width:100px;
}
table{
    border-collapse: collapse;
    font-family: arial;
    color: #5ESB5C;
}
thead th{
    text-align: left;
    padding: 10px;
}
tbody td{
    border:1px solid #e3e3e3";
    padding: 10px;
}
tbody tr:hover{
    background: #EAE9F5
}
</style>
</head>
<body>
    <div id="outtable">
        <table>
        <thead>
            <tr>
            <th class="short">#</th>
            <th class="normal">Name</th>
            <th class="short">Email</th>
            <th class="normal">Phone</th>
            <th class="normal">departement</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            <?php foreach($patient as $user): ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $user->Name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->Phone; ?></td>
                    <td><?php echo $user->departement; ?></td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</body>
</html>