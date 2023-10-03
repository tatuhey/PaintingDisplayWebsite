<tr>
    <td><?php echo $row["paintingTitle"]; ?></td>
    <td><?php echo $row["finishedYear"]; ?></td>
    <td><?php echo $row["paintMedia"]; ?></td>
    <td><?php echo $row["artistName"]; ?></td>
    <td><?php echo $row["style"]; ?></td>
    <td>
        <img src="data:image/png;base64,<?php echo base64_encode($row['paintingImage']); ?>" alt="Painting" class="img-thumbnail">
    </td>
    <td>
        <!-- BUTTONS -->
        <div class="d-flex flex-row">
            <form method="POST" action="../html/database/db_search.php">
                <input type="hidden" name="paintingTitle" value="<?php echo $row["paintingTitle"]; ?>">
                <button type="submit" class="btn btn-primary mr-2" name="viewEntry">
                    <i class="bi bi-eye"></i> View
                </button>
            </form>

            <a class="btn btn-warning mr-2" href="edit.php?paintingID=<?php echo urlencode($row["paintingID"]); ?>">
                <i class="bi bi-pencil"></i> Edit
            </a>

            <form method="POST" action="../html/database/db_delete.php">
                <input type="hidden" name="paintingTitle" value="<?php echo $row["paintingTitle"]; ?>">
                <button type="submit" class="btn btn-danger" name="deleteEntry">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>

    </td>
</tr>
