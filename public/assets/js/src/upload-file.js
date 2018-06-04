let photoDefault = $('#imgPhoto').attr('src');

function readURL(input) {
    if (input.files && input.files[0]) {
        var img = input.files[0];
        baseMg = 1000000;

        if(img.type == "image/png"  || 
           img.type == "image/jpeg" || 
           img.type == "image/jpg"  )
        { // Validación del tipo de archivo

            if((img.size / baseMg) > 0.7){ // Validación del peso
                    alert('', 'La imagen pesa mas de 600 KB', 'warning')
                    cleanPhoto();
            }else { 
                var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imgPhoto').attr('src', e.target.result);
                    } 
                reader.readAsDataURL(img);
                //$('.previus-' + id).remove()
            }      

        }else{      
            alert('', 'Formato inválido', 'warning')
            cleanPhoto();
        }
    }
}


function cleanPhoto(){
    $('#inputPhoto').val('');
    $('#imgPhoto').attr('src', photoDefault);
}

function activateInput()
{
    $('#inputPhoto').trigger("click");
}

