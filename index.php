<?php
    $request_url = file_get_contents('https://www.codeschool.com/users/ianmayfire.json');
    $json_data = json_decode($request_url, true);
    $completed_courses = $json_data['courses']['completed'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code School Badge Viewer App of <?php echo $json_data['user']['username']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1 class="text-center">My Code School Badges</h1>
        <?php
            
            foreach($completed_courses as $completed_course) {
                echo '<div class="col-sm-4 text-center"><div class="course">';
                echo '<h2 class="title"><a href="' . $completed_course['url'] . '">' . $completed_course['title'] . '</a></h2><br>';
                echo '<img src="' . $completed_course['badge'] . '" class="img-responsive">';
                echo '</div></div>';
            }

        ?>
    </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>