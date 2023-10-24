<tr>
    <td><?php echo $row["artistName"]?></td>
    <td><?php echo $row["lifespan"]; ?></td>
    <td><?php echo $row["nationality"]; ?></td>
    <td>
        <img src="data:image/png;base64,<?php echo base64_encode($row['image']); ?>" alt="Painting" class="img-thumbnail">
    </td>
    <td>
        <!-- BUTTONS -->
        <div class="d-flex flex-row justify-content-center">
            <form method="get" action="../html/artist.php">
                <input type="hidden" name="artistName" value="<?php echo $row["artistName"]; ?>">
                <button type="submit" class="btn btn-primary mr-2" name="viewEntry">
                    <i class="bi bi-eye"></i> View
                </button>
            </form>

        	<form method="get" action="../html/edit_artists.php">
                <input type="hidden" name="artistId" value="<?php echo $row["artistId"]; ?>">
                <button type="submit" class="btn btn-warning mr-2" name="editEntry">
                    <i class="bi bi-pencil"></i> Edit
                </button>
            </form>

            <form method="POST" action="../html/database/db_delete_artists.php">
                <input type="hidden" name="artistName" value="<?php echo $row["artistName"]; ?>">
                <button type="submit" class="btn btn-danger" name="deleteEntry">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>

    </td>
</tr>
