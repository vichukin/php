function getCities(selectid, parentselectid,extrahotelid)
{
    

    $(`#${parentselectid}`).on('change', (e) => {
        // console.log(extrahotelid);
        if(extrahotelid!=undefined)
        {
            $(`#${extrahotelid}`).empty().append("<option value='0'  selected>Choose hotel</option>").prop("disabled", true);
        }
        let val = $(`#${parentselectid} option:selected`).val();
        // console.log(val);
        if (val != 0) {
            $.ajax({
                url: "Pages/Admin/getCities.php", // Путь к вашему PHP-скрипту
                method: 'POST',
                data: {
                    "getcities": $(`#${parentselectid} option:selected`).val()
                },
                success: function(response) {
                    // Обработка успешного ответа от сервера
                    // console.log(response);
                    if (response == "") {
                        $(`#${selectid}`).empty().append("<option value='0'  selected>No cities available yet</option>").prop("disabled", true);
                    } else {
                        $(`#${selectid}`).empty().append("<option value='0'  selected>Choose city</option>").append(response).prop("disabled", false);
                    }
    
    
                },
                error: function(xhr, status, error) {
                    // Обработка ошибок
                    console.log(error);
                }
            });
        } else {
            $(`#${selectid}`).empty().append("<option value='0'  selected>Choose city</option>").prop("disabled", true);
        }
    });
}
function getHotels(selectid, parentselectid)
{
    $(`#${parentselectid}`).on('change', (e) => {

        let val = $(`#${parentselectid} option:selected`).val();
        // console.log(val);
        console.log(val);
        if (val != 0) {
            $.ajax({
                url: "Pages/Admin/getHotels.php", // Путь к вашему PHP-скрипту
                method: 'POST',
                data: {
                    "gethotels": $(`#${parentselectid} option:selected`).val()
                },
                success: function(response) {
                    // Обработка успешного ответа от сервера
                    // console.log(response);
                    if (response == "") {
                        $(`#${selectid}`).empty().append("<option value='0'  selected>No hotels available yet</option>").prop("disabled", true);
                    } else {
                        $(`#${selectid}`).empty().append("<option value='0'  selected>Choose hotel</option>").append(response).prop("disabled", false);
                    }
    
    
                },
                error: function(xhr, status, error) {
                    // Обработка ошибок
                    console.log(error);
                }
            });
        } else {
            $(`#${selectid}`).empty().append("<option value='0'  selected>Choose hotel</option>").prop("disabled", true);
        }
    });
}

