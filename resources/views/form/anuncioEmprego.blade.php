<!doctype html>
<html lang="pt-br">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Classificados Barueri | Anúncio</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">

        <!--JS-->
        <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/utils.js') }}"></script>
        <script src="{{ asset('js/anuncio_emprego.js') }}"></script>


  </head>
  <body class="bg-light">
    
    <div class="container">
    <main>
        <div class="py-5 text-start">
            <h2 class="display-6">Qual vaga você quer anunciar?</h2>
        </div>
    </main>
    <main class="container borda">
        <div class="row g-5">
            <div class="col-md">
                <form class="needs-validation" method="POST" action="{{ route('anuncio_emprego_salvar') }}">
                    @csrf
                    <div class="row my-4">
                        <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control {{$errors->has('titulo') ? 'is-invalid' : ''}}" name="titulo" id="titulo" value="{{old('titulo')}}">
                            <small style="color: red;">{{$errors->has('titulo') ? $errors->first('titulo') : ''}}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                        <textarea class="form-control {{$errors->has('descricao') ? 'is-invalid' : ''}}" rows="6" id="descricao" name="descricao">{{old('descricao')}}</textarea>
                        <small style="color: red;">{{$errors->has('descricao') ? $errors->first('descricao') : ''}}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label for="regime" class="form-label">Regime</label>
                            <select class="form-control {{$errors->has('regime') ? 'is-invalid' : ''}}" id="regime" name="regime">
                                <option selected disabled>Selecione o regime</option>
                            </select>
                            <small style="color: red;">{{$errors->has('regime') ? $errors->first('regime') : ''}}</small>
                        </div>
                        <div class="col-md-3">
                            <label for="salario" class="form-label">Salário</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control {{$errors->has('salario') ? 'is-invalid' : ''}}" id="salario" name="salario" value="{{old('salario')}}">
                            </div>
                                <small style="color: red;">{{$errors->has('salario') ? $errors->first('salario') : ''}}</small>

                        </div>
                        <div class="col-md-2">
                        <br><br>
                            <input class="form-check-input" type="checkbox" id="combinar" name="combinar" onclick="AnuncioEmprego.editSalario()">
                            <label class="form-check-label" for="combinar">
                                a combinar
                            </label>
                        </div>
                    </div>

                    <div class="row my-4">
                        <label for="empresa" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control {{$errors->has('empresa') ? 'is-invalid' : ''}}" name="empresa" id="empresa" value="{{old('empresa')}}" placeholder="Confidencial">
                            <small>Deixe em branco para Confidencial</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control {{$errors->has('cidade') ? 'is-invalid' : ''}}" id="cidade" name="cidade" value="{{old('cidade')}}">
                            <small style="color: red;">{{$errors->has('cidade') ? $errors->first('cidade') : ''}}</small>
                        </div>

                        <div class="col-md-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-control {{$errors->has('estado') ? 'is-invalid' : ''}}" id="estado" name="estado">
                                <option selected disabled>Selecione o estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="EX">Estrangeiro</option>
                            </select>
                            <small style="color: red;">{{$errors->has('estado') ? $errors->first('estado') : ''}}</small>
                        </div>

                        <div class="col-md-2">
                            <label for="qtd_vagas" class="form-label">Qtd Vagas</label>
                            <input type="number" class="form-control {{$errors->has('qtd_vagas') ? 'is-invalid' : ''}}" id="qtd_vagas" name="qtd_vagas" value="{{old('qtd_vagas')}}" min="1" maxlength="11">
                            <small style="color: red;">{{$errors->has('qtd_vagas') ? $errors->first('qtd_vagas') : ''}}</small>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="data_inicio" class="form-label">Início Previsto</label>
                            <input type="date" class="form-control {{$errors->has('data_inicio') ? 'is-invalid' : ''}}" id="data_inicio" name="data_inicio" value="{{old('data_inicio')}}">
                            <small style="color: red;">{{$errors->has('data_inicio') ? $errors->first('data_inicio') : ''}}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-4 ml-4">
                        <br><br>
                            <input class="form-check-input" type="checkbox" id="exibir_contato" name="exibir_contato">
                            <label class="form-check-label" for="combinar">
                                Exibir meus dados de contato no anúncio
                            </label>
                        </div>
                    </div>                    

                                    
                    <div class="row">
                        <div class="col-md-10"></div>
                        <button class="btn btn-anuncio" type="submit">Anunciar</button>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-3 text-muted"><span>&copy; Classificados Barueri. Todos os direitos reservados.</span></p>
    </footer>
    </div>

  </body>
</html>
