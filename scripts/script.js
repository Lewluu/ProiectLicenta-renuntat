$(document).ready(function(){
    //redirect on testsession.php on first acces of the page
    var url = 'https://www.googleapis.com/plus/v1/people/me?access_token={access_token}';
    $.ajax({
        type:'GET',
        url:url,
        async:false,
        success:function(userInfo){
            console.log(userInfo),
            console.log('test')
        },
        error:function(e){
            console.log('error');
        }
    })
});

