 <?php
    if (!empty($all_data)) {
        foreach ($all_data as $row) {
            
            product($row,'3');
        }
    }else{
        echo '<span class="text-warning">No matched Dresses found. Help us add more.  Send us a request in our contact form </span>';
    }
    ?>