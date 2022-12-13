<?php 
$xmlFile = simplexml_load_file("../lab4/data/data.xml");
$xmlFile->formatOutput = true;

$id = $_GET['id'];
foreach($xmlFile as $user){
    if ($id == $user->id){
        $name = $user->name;
        $surname = $user->surname;
        $birthday = $user->birthday;
        $city = $user->city;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social site</title>
    <link rel="stylesheet" href="../lab4/assets/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="content">
            <div class="page_header">
                <div class="logo">Nastan</div>
                <nav class="h_nav">
                    <a class="text_navigation" href='update.php?id=<?php echo($id) ?>'>Edit</a>
                    <a class="text_navigation" href="delete.php?id=<?php echo($id) ?>">Logout</a>
                </nav>
            </div>
        </div>
    </header>
    <div class="personal_page">
        <div class="content_personal">
            <div class="content_menu">
                <div class="menu">
                    <nav>
                        <ul class="nav_menu">
                            <li class="nav_point">
                                <a href="#">
                                    <span class="text_navigation">My page</span>
                                </a>
                                <div class="line"></div>
                            </li>
                            <li class="nav_point">
                                <a href="#">
                                    <span class="text_navigation">News</span>
                                </a>
                                <div class="line"></div>
                            </li>
                            <li class="nav_point">
                                <a href="#">
                                    <span class="text_navigation">Messenger </span>
                                </a>
                                <div class="line"></div>
                            </li>
                            <li class="nav_point">
                                <a href="#">
                                    <span class="text_navigation">Friends</span>
                                </a>
                                <div class="line"></div>
                            </li>
                            <li class="nav_point">
                                <a href="#">
                                    <span class="text_navigation">Community</span>
                                </a>
                                <div class="line"></div>
                            </li>
                            <li class="nav_point">
                                <a href="#">
                                    <span class="text_navigation">Photo</span>
                                </a>
                                <div class="line"></div>
                            </li>
                            <li class="nav_point">
                                <a href="#">
                                    <span class="text_navigation">Video</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
            </div>
            <div class="mobile_content">

            </div>
            <div class="main">
                <div class="narrow_column">
                    <div class="page_photo">
                        <div class="photo">
                            <img src="assets/images/photo_2022-09-28_01-34-09.jpg" 
                            alt="avatar.jpg" width="100%">
                        </div>
                        <div class="line"></div>
                        <div class="buttons_photo">
                            <ul class="buttons_list">
                                <li class="button_photo"><a href='#'>Send messege</a></li>
                                <li class="button_photo"><a href='#'>Add to friends</a></li>
                            </ul>
                        </div>
                        <div class="line"></div>
                        <div class="subscribers">
                            <div class="text_subs">Subscribers: <a href="#">85216</a></div>                
                        </div>
                    </div>
                    <div class="friends_page">
                        <a href="#">
                            <span class="friends_page_name">Friends</span> 
                            <span class="friends_page_count">5428</span>
                        </a>
                        <div class="line"></div>
                        <div class="friends_list">
                            <div class="row">
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat1.jpeg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#" >dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat2.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat3.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat4.jpeg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat5.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat6.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="friends_page online_friends">
                        <a href="#">
                            <span class="friends_page_name">Friends online</span> 
                            <span class="friends_page_count">983</span>
                        </a>
                        <div class="line"></div>
                        <div class="friends_online_list">
                            <div class="row">
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat5.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#" >dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat4.jpeg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat1.jpeg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat3.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat2.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                                <div class="people_cell">
                                    <a href="#" class="people_box">
                                        <img src="assets/images/cat6.jpg" class="around">
                                    </a>
                                    <div class="friend_name">
                                        <a href="#">dawda</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_column"> 
                    <div class="block">
                        <div class="name_status">
                            <span class="name"><?php echo($name);?> <?php echo($surname); ?></span>
                            <span class="status">online</span>
                        </div>
                        <div class="line"></div>
                        <div class="main_information">
                            <input class="more_information_check" type="checkbox" id="more_information_check">
                            <ul>
                                <li>
                                    <div class="row_information">
                                        <span class="name_information">Birtday:</span>
                                        <span class="info"><?php echo($birthday)?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="row_information">
                                    <span class="name_information">City:</span>
                                    <span class="info"><?php echo($city)?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="row_information">
                                    <span class="name_information">About me:</span>
                                    <span class="info">I'm a cute cat :3</span>
                                    </div>
                                </li>
                                <li>
                                    <label class="more_information_button" for="more_information_check">
                                        <div class="load_info">
                                            <div class="row_information">
                                                <span class="name_information"></span>
                                                <span class="info">Show more information</span>
                                            </div>
                                        </div>
                                        <div class="unload_info">
                                            <div class="row_information">
                                                <span class="name_information"></span>
                                                <span class="info">Hide more information</span>
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <div class="row_information">
                                        <span class="name_information">Life position:</span>
                                        <span class="info">Lonely</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="block">
                        <div class="last_photos_page">
                            <a href="#">
                                <span class="last_photos_name">Photos</span> 
                                <span class="last_photos_count">4</span>
                            </a>
                            <div class="line"></div>
                            <div class="row_last_photos">
                                <a class="last_photo" href="#"><img src="assets/images/last_photo_1.jpg" alt="last_photo"></a>
                                <a class="last_photo" href="#"><img src="assets/images/last_photo_2.jpg" alt="last_photo"></a>
                                <a class="last_photo" href="#"><img src="assets/images/last_photo_3.jpg" alt="last_photo"></a>
                                <a class="last_photo" href="#"><img src="assets/images/last_photo_4.jpg" alt="last_photo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="post_page">
                            <div class="post_page_name">
                                <input type="checkbox" id="search">
                                <div class="post_amount_block">
                                    <span>Amount posts:</span>
                                    <span class="post_amount">1</span>
                                </div>
                                <label for="search" class="search_btn"></label>
                                <div class="post_search">
                                    <form>
                                        <label for="search_line">
                                            <img src="assets/images/Лупа.png" alt="post_search" width="15px" height="15px"></label>
                                        <input type="text" id="search_line" placeholder="Enter a phrase or word">
                                    </form>
                                </div>
                                <label for="search" class="search_btn_close"></label>
                            </div>
                            <div class="full_line"></div>
                            <div class="post">
                                <div class="post_header">
                                    <div class="post_header_photo">
                                        <a href="#"><img src="assets/images/photo_2022-09-28_01-34-09.jpg" alt="ava"></a>
                                    </div>
                                    <div class="author_post_date">
                                        <span class="author_post under_block">Night Lovelas</span>
                                        <span class="date_post">September 4, 2022</span>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <div class="post_main">
                                        <div class="post_text">Yesterday I saw the Leathers sorting through my old photographs. What a cutie I was, just look at this</div>
                                        <div class="post_photo"><a href="#"><img src="assets/images/little_cat.jpg" alt="little_cat"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>

