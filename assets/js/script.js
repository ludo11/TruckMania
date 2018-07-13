/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getNotifications()
{
$.ajax({

type: 'POST',
url: 'notification.php',
success: function(data){
if(data>0){
$('.notification').attr('data-notification', data);
}
}
});

setTimeout('getNotifications()', 5000);

}


$(document).ready(function(){
setTimeout(getNotifications,3000);
});

