


$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        autoplay: true,
        autoplayTimeout: 2000,
        items:1,   
        autoplayHoverPause:true
    })

})
function tampil(){
    const target = document.querySelector('.detail')
    target.classList.add('active')
}
function off_tampil(){
    const target = document.querySelector('.detail')
    target.classList.remove('active')
}
$(document).ready(function(){
    $(document).scroll(function(){
        var tinggi = $(window).scrollTop()
        if(tinggi > 100){
            $('#keatas').addClass('active')
        }else{
            $('#keatas').removeClass('active')
        }
    })
    $('#keatas').click(function(){
        $('html, body').animate({ scrollTop :0 }, 400)
        return false;
    })
})