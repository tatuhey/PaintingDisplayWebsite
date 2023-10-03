<section id="tabs" class="project-tab">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                    
                    <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Painting Title</th>
                                    <th>Finished Year</th>
                                    <th>Media</th>
                                    <th>Artist</th>
                                    <th>Style</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        include('displayTableBody.php');
                                    }
                                } else {
                                    echo '<tr><td colspan="6">0 results</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>


        </div>


    </div>
</section>

