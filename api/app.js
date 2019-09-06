$(document).ready(function(){

    // FUNCTION DELETE
    $(".delete-btn").on('click', del);
    function del(){
        var rep = confirm('Êtes vous sûr de vouloir supprimer ce contact ??');
        if(rep){
            var ID = $(this).data('value');
            var data = "id="+ID;
            console.log(data);
            console.log('Suppression confirmée');
        	$.ajax({
                context: this,
        		type: 'get',
        		url: window.location+'api/delete-contact.php?'+data,
        		//data: data,
        		dataType: 'json',
        		success: function(response){
        			if(response.success){
                        $(".card-header").after('<div class="alert alert-danger alert-dismissible aria-label="Close"">'+response.message+'</div>');
                        $(".alert-danger").delay(2000).hide("slow");
        				$(this).parent().parent().fadeOut(800);
                        console.log('deleted');
                        count--;
                        $('.card-header > h5 > #span1').text(count);
        			}
                    else {
                        $(".card-header").after('<div class="alert alert-warning">'+response.message+'</div>');
                        console.log('Erreur suppression');

                    }
        		}
        	});
        }
        else {
            console.log('Annulé');
        }
    };
    // END FUNCTION DELETE


    // FUNCTION ADD
    $(".form-inline").on('submit', function(e){
		e.preventDefault();
		$('.alert').remove();
        var data = $(this).serialize();

		$.ajax({
			type: 'POST',
			url: window.location+'api/add-contact.php',
			data: data,
			dataType: 'json',
			success: function(response){
				if(response.success == false){
					console.log(response);
                    $(".card-header").after('<div class="alert alert-danger">'+response.message+'</div>');
				}
				else if(response.success){
                    $(".card-header").after('<div class="alert alert-success alert-dismissible aria-label="Close"">'+response.message+'</div>');
                    $('.alert-success').delay(2000).hide("slow");

                    $('.tbody').prepend('<tr class="contact-line" ><td class="name-column">'+response.results['name']+'</td><td class="phone-column">'+response.results['phone']+'</td><td class="action-column"><button data-value="'+response.results['id']+'"  class="btn btn-info modify-btn">Modifier</button><button data-value="'+response.results['id']+'" class="btn btn-danger delete-btn">Supprimer</button></td></tr>');

                    $('.form-inline').find('input[type=text]').val('');

					console.log(response.results);
                    console.log('Contact enregistré');
                    count++;
                    $('.card-header > h5 > #span1').text(count);
                    $('.modify-btn').on('click', updateContact);
                    $('.delete-btn').on('click', del);
				}
			}
		});
	});
    // END FUNCTION ADD

    // FUNCTION UPDATE
    $('.modify-btn').on('click',updateContact);
    function updateContact(){
		$(this).parent().prev().prev().attr('contenteditable', true);
		$(this).parent().prev().attr('contenteditable', true);
		$(this).parent().parent().css('border', '4px solid yellow');
        $(this).text('Valider');
        $(this).next().text('Annuler');
        $(this).next().unbind();
        $(this).next().on('click', finishAdd);

        id = $(this).data('value');
        name = $(this).parent().prev().prev().text();
        phone = $(this).parent().prev().text();

        $(this).on('click', function(){
            $.ajax({
                context: this,
                type: 'post',
                url: window.location+'api/update-contact.php',
                data: {id: id, name: name, phone: phone},
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        $(".card-header").after('<div class="alert alert-info">'+response.message+'</div>');
                        $('.alert-info').delay(2000).hide("slow");
                        console.log(response.message);;
                        $(this).parent().prev().prev().removeAttr('contenteditable');
                        $(this).parent().prev().removeAttr('contenteditable');
                        $(this).text('Modifier');
                        $(this).next().text('Supprimer');
                        $(this).parent().parent().css('border', 'unset');

                        $(this).next().on('click', del);
                        $(this).on('click', updateContact);
                    }
                    else {
                        $(".card-header").after('<div class="alert alert-danger">'+response.message+'</div>');
                        console.log(response.message);}
                    }
            });
        });
        function finishAdd(){
            $(this).text('Supprimer');
            $(this).prev().text('Modifier');
            $(this).prev().prev().removeAttr('contenteditable');
            $(this).prev().removeAttr('contenteditable');
            $(this).parent().parent().css('border', 'unset');
            $(this).unbind();
            $(this).prev().unbind();
            $(this).on('click', del);
            $(this).prev().on('click', updateContact);
        };
    };
    // END FUNCTION UPDATE

    // FUNCTION COUNT
    var count = $('.tbody > tr').length;
        if(count <= 1){
            $("#span2").text('contact');
        }else{
            $("#span2").text('contacts');
        }
        $('.card-header > h5 > #span1').text(count);
    // END COUNT
});
