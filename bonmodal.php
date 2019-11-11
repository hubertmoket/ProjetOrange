<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>jQuery UI Dialog - Modal formulaire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.2.4/jquery.contextMenu.min.css" />
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.2.4/jquery.contextMenu.js"></script>
    <script type='text/javascript'>
        $(function() {
        //var content;
            $(".context-menu-one").contextMenu({
                selector: 'td',
                callback: function(key, options) {
                    switch (key) {
                        case 'edit':
                             sda = $(this).parent().find("td:eq(0)").text();
                             service=$(this).parent().find("td:eq(1)").text();
                             $("#sda").val(sda);
                             $("#service").val(service);
                            $('#myModal').modal('show');
                            break;
     
                        case 'delete':
                          break;
                    }
                },
                items: {
                    "edit": {name: "Modifier", icon: "edit"},
                    "delete": {name: "Supprimer", icon: "delete"}
                }
            });
            $('.context-menu-one').on('click',"td", function(e){// td éléments dynamiques : faut passer par délégate.
                console.log('clicked', this);
            });
            
                        /* getHtmlData*/
                        getHtmlData=function(){
                                var html="";
                                $.ajax({
                                        url:'traitementHtml.php',
                                        type:'post',
                                        dataType:'html',
                                        success:function(retour){
                                                $("#_table tbody").html(retour);
                                        },
                                        error:function(e){
                                                alert("erreur Ajax :"+e.responseText);
                                        }
                                });//fin ajax
                        };
                        getHtmlData(); 
        });
    
    </script>
 
</head>
<body>
<div class="container">
 
        <table id="_table" border="1" width="100%">
          <tbody class="context-menu-one">
 
          </tbody>
		</table>
 
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Test</h4>
              </div>
              <div class="modal-body">
                <form class="my-form">                                      
                    <label>SDA
                        <input type="text" id="sda" name="sda" value="" required="required" class="form-control col-md-7 col-xs-12" />
                    </label>
                    <label>Service
                    <input type="text" id="service" name="service" value="" required="required" class="form-control col-md-7 col-xs-12" />
                    </label>
                    <label id="label-id"></label>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add">Add</button>
               </div> <!-- ne pas oublier de fermer cette div !-->
 
              </div> <!-- modal-content !-->
            </div> <!-- modal-dialog !-->
          </div><!-- modal !-->
 
 
          <!-- Bouton execution modal -->
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Lancer la modal
        </button>
</div><!-- .container!-->
</body>
</html>