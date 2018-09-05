/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
   $('.controls-btns li').click(function(){
       var list_bg_img = 'url('+$(this).attr('data-bg_img')+')';
       $('.controls-btns li').css({'background-image':'url(assets/img/slider/fnt-btn.png)'});
       $('.controls-btns li').removeClass('active');
       $('.slider-container .slides img').attr('src',$(this).data('img'));   
       $(this).css({'background-image':list_bg_img});
       $(this).addClass('active');
   }); 
});
