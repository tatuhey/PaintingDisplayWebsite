
<?php include('database/db_query.php'); ?>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <table class="table mx-auto" cellspacing="0">
            <thead>
                <tr>
                    <th>Painting Title</th>
                    <th>Finished Year</th>
                    <th>Media</th>
                    <th>Artist</th>
                    <th>Style</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $stmt->rowCount() > 0) {
                    foreach ($result as $row) {
                        include('table_content.php');
                    }
                } else {
                    echo '<tr><td colspan="6">0 results</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

