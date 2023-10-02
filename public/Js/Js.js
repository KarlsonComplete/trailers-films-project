$("#genre").change(function () {
    var id_genre = $(this).val();
    var token = $("input[name='_token']").val();
    console.log(id_genre);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "films",
        method: 'POST',
        data: {id_genre: id_genre, _token: token},
        success: function (data) {
            $("#subgenre").empty()
            $("#subgenre").html(data[0]);
            $("#films").empty()
            $("#films").html(data[1]);
        }
    });
});

$("#genre ,#subgenre").change(function () {
    if ($("#genre").val() !== '' && $("#subgenre").val() !== '') {
        var id_genre = $("#genre").val();
        var id_subgenre = $("#subgenre").val();
        var token = $("input[name='_token']").val();
        console.log(id_genre)
        console.log(id_subgenre)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "films",
            method: 'POST',
            data: {
                id_genre: id_genre,
                id_subgenre: id_subgenre,
                _token: token
            },
            success: function (data) {
                $("#films").empty()
                $("#films").html(data);
            }
        });
    }
});

$("#genre ,#subgenre, #country, #year").change(function () {
    if ($("#genre").val() !== '' && $("#subgenre").val() !== '' && $("#country").val() !== '' && $("#year").val() !== '') {
        var id_genre = $("#genre").val();
        var id_subgenre = $("#subgenre").val();
        var id_country = $("#country").val();
        var id_year = $("#year").val();
        var token = $("input[name='_token']").val();
        console.log(id_genre)
        console.log(id_subgenre)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "films",
            method: 'POST',
            data: {
                id_genre: id_genre,
                id_subgenre: id_subgenre,
                id_country: id_country,
                id_year: id_year,
                _token: token
            },
            success: function (data) {
                $("#films").empty()
                $("#films").html(data);
            }
        });
    }
});

$("#year").change(function () {
    var id_year = $(this).val();
    var token = $("input[name='_token']").val();
    console.log(id_year);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "films",
        method: 'POST',
        data: {id_year: id_year, _token: token},
        success: function (data) {
            $("#films").empty()
            $("#films").html(data);
        }
    });
});