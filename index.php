<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <title>API Receita federal</title>
</head>

<body>
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <div class="col-md-12"><br><br>
                    <label for="">CNPJ</label>
                    <input type="text" onblur="buscarCnpj(this.value)" data-mask="00.000.000/0000-00" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="razaoSocial">Razão Social</label>
                    <input type="text" id="razaoSocial" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Fantasia</label>
                    <input type="text" id="fantasia" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">logradouro</label>
                    <input type="text" id="logradouro" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Número</label>
                    <input type="text" id="numero" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">município</label>
                    <input type="text" id="municipio" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">UF</label>
                    <input type="text" id="uf" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
  
    <script>

        function buscarCnpj( cnpj){

            $.ajax({
                'url': 'https://receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
                'type': "GET",
                'dataType': 'jsonp',
                'success': function(data){
                    if(data.nome == undefined){
                        alert(data.status + ' ' + data.message)
                    }else{
                        document.getElementById('razaoSocial').value = data.nome;
                        document.getElementById('fantasia').value = data.fantasia;
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('numero').value = data.numero;
                        document.getElementById('municipio').value = data.municipio;
                        document.getElementById('uf').value = data.uf;

                    }
                    console.log(data.municipio);
                }

            })
        }



    </script>

</body>
</html>