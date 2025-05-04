<?php
require_once 'assets/php/functions.php';
if(isset($_GET['newfp'])){
    unset($_SESSION['auth_temp']);
    unset($_SESSION['forgot_email']);
    unset($_SESSION['forgot_code']);
}
if(isset($_SESSION['Auth'])){
    $user = getUser($_SESSION['userdata']['id']);//current user information
    $posts = filterPosts();//posts to show the user
    $follow_suggestions = filterFollowSuggestion();//followers suggestion

}

$pagecount = count($_GET);

//manage pages
if(isset($_SESSION['Auth']) && $user['ac_status']==1 && !$pagecount){//after login active account
    showPage('header',['page_title'=>'UCMS | Home']);
    showPage('navbar');
    showPage('wall');
}elseif(isset($_SESSION['Auth']) && $user['ac_status']==0 && !$pagecount){//Not Verified login active account

    showPage('header',['page_title'=>'Verify Your Email']);
    showPage('verify_email');
}elseif(isset($_SESSION['Auth']) && $user['ac_status']==2 && !$pagecount){//blocked Account
    showPage('header',['page_title'=>'Blocked']);
    showPage('blocked');
}elseif(isset($_GET['signup'])){
    showPage('header', ['page_title'=>'Ucms - signup']);
    showPage('signup');
    
}elseif(isset($_GET['login'])){
   
    showPage('header',['page_title'=>'UCMS - Login']);
    showPage('login');
}
elseif(isset($_GET['forgotpassword'])){
   
    showPage('header',['page_title'=>'UCMS - Forgot Password']);
    showPage('forgot_password');
}elseif(isset($_SESSION['Auth']) && isset($_GET['editprofile']) && $user['ac_status']==1){
    showPage('header',['page_title'=>'Edit Profile']);
    showPage('navbar');
    showPage('edit_profile');
    //profile selection
}elseif(isset($_SESSION['Auth']) && isset($_GET['u']) && $user['ac_status']==1){
    $profile = getUserByUsername($_GET['u']);
    if(!$profile){
        showPage('header',['page_title'=>'User Not Found']);
        showPage('navbar');
        showPage('user_not_found');

    }else{
     $profile_post = getPostById($profile['id']);  
     $profile['followers']=getFollowers($profile['id']);
     $profile['following']=getFollowing($profile['id']);
        showPage('header',['page_title'=>$profile['first_name'].' '.$profile['last_name']]);
        showPage('navbar');
        showPage('profile');
    }
}else{
    if(isset($_SESSION['Auth']) && $user['ac_status']==1){
        showPage('header',['page_title'=>'Home']);
        showPage('navbar');
        showPage('wall');
    }elseif(isset($_SESSION['Auth']) && $user['ac_status']==0){

        showPage('header',['page_title'=>'Verify Your Email']);
        showPage('verify_email');
    }elseif(isset($_SESSION['Auth']) && $user['ac_status']==2){
        showPage('header',['page_title'=>'Blocked']);
        showPage('blocked');
    }else{
        showPage('header',['page_title'=>'UCMS - Login']);
        showPage('login');
    }
    
}

showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);