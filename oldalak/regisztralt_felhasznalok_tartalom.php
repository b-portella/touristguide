<div class="container">
    <table class="table table-hover mt-5 text-center">
        <thead>
            <th>Id</th>
            <th>Felhasználónév</th>
            <th>Email</th>
            <th>Jogosultság</th>
        </thead>
        <tbody>
            <?php
                foreach ($eredmenyek as $row) {
                    echo "<tr>";           
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["felhasznalonev"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["jogosultsag"]."</td>"."<br>";
                    "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>