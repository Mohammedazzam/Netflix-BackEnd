$(document).ready(function () {

    $('#movie__file-input').on('change',function () {

        $('#movie__upload-wrapper').css('display','none');
        $('#movie__properties').css('display','block');

        var url = $(this).data('url'); //هذه بتجيبلي ال url الخاصة بال الصورة أو الفيديو المرفوع



        var movie = this.files[0];

        var movieId = $(this).data('movie-id');//هذه خاصة لإظهار الفيديو أو الصورة المختارة حسب ال id

        var movieName = movie.name.split('.').slice(0, -1).join('.');//هذه بتجيبلي اسم الفيديو

        $('#movie__name').val(movieName); //هنا راح يستدعي الاسم في ال input المخصص له


        // console.log(movieName);
        // console.log(movie);
        // console.log(movieId)
        // console.log(url)

        var formData = new FormData();
        formData.append('movie_id', movieId); //إرسال ال id
        formData.append('name',movieName);//إرسال اسم الصورة أو الفلم
        formData.append('movie',movie);//إرسال الفلم أو الصورة نفسها


        $.ajax({

            url: url,
            data: formData, //بمعنى هتلي الداتا وهي عبارة عن ال formData إلي محفوظة فوق من id و اسم و الصورة أو الفيديو نفسه
            method: 'POST',

            processData:false,
            contentType:false,
            cache:false,

            success:function (movie) { //هنا رجعلي

            },

            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.round(evt.loaded / evt.total * 100) + "%";
                    }
                }, false);
                return xhr;
            },
        })



    })//end of file input change

})//end document ready