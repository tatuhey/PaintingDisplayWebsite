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
        <div class="d-flex flex-column">
            <button class="btn btn-primary mb-2" onclick="viewDetails()">View</button>
            <button class="btn btn-warning mb-2" onclick="editDetails()">Edit</button>
            <button class="btn btn-danger" onclick="deleteEntry()">Delete</button>
        </div>
    </td>
</tr>
