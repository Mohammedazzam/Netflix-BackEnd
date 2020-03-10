$(document).ready(function () {

    $('#movie__file-input').on('change',function () {

        $('#movie__upload-wrapper').css('display','none');
        $('#movie__properties').css('display','block');


        var movie = this.files[0];

        var movieId = $(this).data('movie-id');

        var movieName = movie.name.split('.').slice(0, -1).join('.');//هذه بتجيبلي اسم الفيديو

        $('#movie__name').val(movieName); //هنا راح يستدعي الاسم في ال input المخصص له


        // console.log(movieName);
        // console.log(movie);
        console.log(movieId)


    })//end of file input change

})//end document ready